<?php

use App\Enums\QuizType;
use App\Models\QuizAnswer;
use App\Models\QuizAttempt;
use App\Models\QuizQuestion;
use App\Models\Surah;
use App\Services\QuizGeneratorService;

beforeEach(function () {
    $this->seed();
    $this->service = new QuizGeneratorService;
});

test('generates quiz with correct count', function () {
    $surah = Surah::query()->first();
    $questions = $this->service->generateQuiz($surah, QuizType::VerseIdentification, 5);

    expect($questions)->toHaveCount(5);
});

test('generates mixed quiz', function () {
    $surah = Surah::query()->first();
    $questions = $this->service->generateMixedQuiz($surah, 5);

    expect($questions)->toHaveCount(5);
});

test('calculates score correctly for all correct answers', function () {
    $surah = Surah::query()->first();

    $attempt = QuizAttempt::query()->create([
        'surah_id' => $surah->id,
        'quiz_type' => QuizType::VerseIdentification,
        'total_questions' => 3,
    ]);

    $questions = QuizQuestion::query()
        ->whereHas('verse', fn ($q) => $q->where('surah_id', $surah->id))
        ->limit(3)
        ->get();

    foreach ($questions as $question) {
        QuizAnswer::query()->create([
            'quiz_attempt_id' => $attempt->id,
            'quiz_question_id' => $question->id,
            'selected_answer' => ['index' => $question->question_data['correct_index']],
            'is_correct' => true,
        ]);
    }

    $result = $this->service->calculateScore($attempt);

    expect($result['correct'])->toBe(3);
    expect($result['total'])->toBe(3);
    expect($result['percentage'])->toBe(100.0);
    expect($result['score'])->toBeGreaterThan(0);
});
