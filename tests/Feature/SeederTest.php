<?php

use App\Models\Action;
use App\Models\QuizQuestion;
use App\Models\Surah;
use App\Models\Verse;

beforeEach(function () {
    $this->seed();
});

test('seeder creates 10 surahs', function () {
    expect(Surah::query()->count())->toBe(10);
});

test('seeder creates correct number of verses', function () {
    expect(Verse::query()->count())->toBe(48);
});

test('seeder creates actions for all verses', function () {
    expect(Action::query()->count())->toBeGreaterThan(0);

    $versesWithActions = Verse::query()->has('actions')->count();
    expect($versesWithActions)->toBe(Verse::query()->count());
});

test('seeder generates quiz questions', function () {
    expect(QuizQuestion::query()->count())->toBeGreaterThan(0);
});

test('each surah has correct verse count', function () {
    $expectedCounts = [
        105 => 5, 106 => 4, 107 => 7, 108 => 3, 109 => 6,
        110 => 3, 111 => 5, 112 => 4, 113 => 5, 114 => 6,
    ];

    foreach ($expectedCounts as $number => $count) {
        $surah = Surah::query()->where('number', $number)->first();
        expect($surah->verse_count)->toBe($count);
        expect($surah->verses()->count())->toBe($count);
    }
});
