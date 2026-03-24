<?php

namespace App\Http\Controllers;

use App\Enums\QuizType;
use App\Models\QuizAttempt;
use App\Models\QuizQuestion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class MajorSinsController extends Controller
{
    public function show(): Response
    {
        $totalQuestions = QuizQuestion::query()
            ->where('type', QuizType::MajorSins->value)
            ->count();

        return Inertia::render('Quiz/MajorSins/Show', [
            'totalQuestions' => $totalQuestions,
        ]);
    }

    public function start(Request $request): RedirectResponse
    {
        $count = min((int) $request->input('question_count', 10), 30);

        $questions = QuizQuestion::query()
            ->where('type', QuizType::MajorSins->value)
            ->inRandomOrder()
            ->limit($count)
            ->get();

        if ($questions->isEmpty()) {
            return back()->withErrors(['quiz' => 'No major sins questions found. Please seed the database.']);
        }

        $attempt = QuizAttempt::query()->create([
            'user_id' => $request->user()?->id,
            'surah_id' => null,
            'quiz_type' => QuizType::MajorSins,
            'total_questions' => $questions->count(),
            'question_ids' => $questions->pluck('id')->all(),
        ]);

        return redirect()->route('quiz.play', $attempt);
    }
}
