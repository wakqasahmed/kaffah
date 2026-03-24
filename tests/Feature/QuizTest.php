<?php

use App\Enums\QuizType;
use App\Models\QuizAttempt;
use App\Models\QuizQuestion;
use App\Models\Surah;

beforeEach(function () {
    $this->withoutVite();
    $this->seed();
});

test('quiz show page returns successful response', function () {
    $surah = Surah::query()->first();

    $response = $this->get(route('quiz.show', $surah));

    $response->assertOk();
});

test('quiz can be started with valid data', function () {
    $surah = Surah::query()->first();

    $response = $this->post(route('quiz.start', $surah), [
        'quiz_type' => QuizType::VerseIdentification->value,
        'question_count' => 5,
    ]);

    $response->assertRedirect();
    expect(QuizAttempt::query()->count())->toBe(1);

    $attempt = QuizAttempt::query()->first();
    $this->get(route('quiz.play', $attempt))->assertOk();
});

test('quiz start fails with invalid quiz type', function () {
    $surah = Surah::query()->first();

    $response = $this->post(route('quiz.start', $surah), [
        'quiz_type' => 'invalid_type',
        'question_count' => 5,
    ]);

    $response->assertSessionHasErrors('quiz_type');
});

test('quiz start fails with invalid question count', function () {
    $surah = Surah::query()->first();

    $response = $this->post(route('quiz.start', $surah), [
        'quiz_type' => QuizType::VerseIdentification->value,
        'question_count' => 100,
    ]);

    $response->assertSessionHasErrors('question_count');
});

test('quiz answer can be submitted', function () {
    $surah = Surah::query()->first();

    $this->post(route('quiz.start', $surah), [
        'quiz_type' => QuizType::VerseIdentification->value,
        'question_count' => 5,
    ]);

    $attempt = QuizAttempt::query()->first();
    $question = QuizQuestion::query()
        ->whereHas('verse', fn ($q) => $q->where('surah_id', $surah->id))
        ->where('type', QuizType::VerseIdentification)
        ->first();

    $response = $this->post(route('quiz.answer', $attempt), [
        'question_id' => $question->id,
        'selected_index' => 0,
    ]);

    $response->assertRedirect();
    expect($attempt->answers()->count())->toBe(1);
});

test('quiz results page shows after completion', function () {
    $surah = Surah::query()->first();

    $this->post(route('quiz.start', $surah), [
        'quiz_type' => QuizType::VerseIdentification->value,
        'question_count' => 5,
    ]);

    $attempt = QuizAttempt::query()->first();

    $response = $this->get(route('quiz.results', $attempt));

    $response->assertOk();
});
