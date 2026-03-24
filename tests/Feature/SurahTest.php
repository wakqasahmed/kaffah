<?php

use App\Models\Surah;

beforeEach(function () {
    $this->withoutVite();
    $this->seed();
});

test('surah index page returns successful response', function () {
    $response = $this->get(route('surahs.index'));

    $response->assertOk();
});

test('database has correct surah count after seeding', function () {
    expect(Surah::query()->count())->toBe(10);
});
