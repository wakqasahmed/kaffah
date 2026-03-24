<?php

namespace App\Http\Controllers;

use App\Enums\QuizType;
use App\Http\Requests\AnswerQuizRequest;
use App\Http\Requests\StartQuizRequest;
use App\Models\QuizAnswer;
use App\Models\QuizAttempt;
use App\Models\QuizQuestion;
use App\Models\Surah;
use App\Services\QuizGeneratorService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class QuizController extends Controller
{
    public function __construct(
        private QuizGeneratorService $quizGenerator,
    ) {}

    public function show(Surah $surah): Response
    {
        $surah->loadCount('verses');

        $quizTypes = collect(QuizType::cases())->map(fn (QuizType $type) => [
            'value' => $type->value,
            'label' => str_replace('_', ' ', ucfirst($type->value)),
        ]);

        return Inertia::render('Quiz/Show', [
            'surah' => $surah,
            'quizTypes' => $quizTypes,
        ]);
    }

    public function start(StartQuizRequest $request, Surah $surah): RedirectResponse
    {
        $validated = $request->validated();
        $quizType = QuizType::from($validated['quiz_type']);
        $count = (int) $validated['question_count'];

        if ($quizType === QuizType::Implementation) {
            $questions = $this->quizGenerator->generateMixedQuiz($surah, $count);
        } else {
            $questions = $this->quizGenerator->generateQuiz($surah, $quizType, $count);
        }

        if ($questions->isEmpty()) {
            return back()->withErrors(['quiz_type' => 'No questions available for this quiz type.']);
        }

        $attempt = QuizAttempt::query()->create([
            'user_id' => $request->user()?->id,
            'surah_id' => $surah->id,
            'quiz_type' => $quizType,
            'total_questions' => $questions->count(),
            'question_ids' => $questions->pluck('id')->all(),
        ]);

        return redirect()->route('quiz.play', $attempt);
    }

    public function play(QuizAttempt $quizAttempt): Response
    {
        $questionIds = $quizAttempt->question_ids ?? [];
        $questions = QuizQuestion::query()
            ->findMany($questionIds)
            ->sortBy(fn ($q) => array_search($q->id, $questionIds))
            ->values();

        $quizAttempt->load('surah');

        $context = $quizAttempt->surah
            ? ['name' => $quizAttempt->surah->name, 'name_arabic' => $quizAttempt->surah->name_arabic, 'id' => $quizAttempt->surah->id, 'type' => 'surah']
            : ['name' => 'Major Sins Quiz', 'name_arabic' => 'الْكَبَائِرُ', 'id' => null, 'type' => 'major_sins'];

        return Inertia::render('Quiz/Play', [
            'attempt' => $quizAttempt,
            'context' => $context,
            'questions' => $questions,
        ]);
    }

    public function answer(AnswerQuizRequest $request, QuizAttempt $quizAttempt): Response|RedirectResponse
    {
        $validated = $request->validated();

        $questionData = $quizAttempt->answers()
            ->where('quiz_question_id', $validated['question_id'])
            ->exists();

        if ($questionData) {
            return back()->withErrors(['question_id' => 'This question has already been answered.']);
        }

        $question = QuizQuestion::query()->findOrFail($validated['question_id']);
        $correctIndex = $question->question_data['correct_index'] ?? null;
        $isCorrect = $validated['selected_index'] === $correctIndex;

        QuizAnswer::query()->create([
            'quiz_attempt_id' => $quizAttempt->id,
            'quiz_question_id' => $validated['question_id'],
            'selected_answer' => ['index' => $validated['selected_index']],
            'is_correct' => $isCorrect,
            'time_spent_seconds' => $validated['time_spent_seconds'] ?? null,
        ]);

        if ($isCorrect) {
            $quizAttempt->increment('correct_answers');
        }

        return redirect()->route('quiz.play', $quizAttempt)->with('answerResult', [
            'is_correct' => $isCorrect,
            'correct_index' => $correctIndex,
            'question_id' => $validated['question_id'],
        ]);
    }

    public function results(QuizAttempt $quizAttempt): Response
    {
        $scoreData = $this->quizGenerator->calculateScore($quizAttempt);

        $quizAttempt->update([
            'score' => $scoreData['score'],
            'completed_at' => now(),
        ]);

        $quizAttempt->load('surah', 'answers.quizQuestion');

        $context = $quizAttempt->surah
            ? ['name' => $quizAttempt->surah->name, 'name_arabic' => $quizAttempt->surah->name_arabic, 'id' => $quizAttempt->surah->id, 'type' => 'surah']
            : ['name' => 'Major Sins Quiz', 'name_arabic' => 'الْكَبَائِرُ', 'id' => null, 'type' => 'major_sins'];

        return Inertia::render('Quiz/Results', [
            'attempt' => $quizAttempt,
            'context' => $context,
            'scoreData' => $scoreData,
        ]);
    }
}
