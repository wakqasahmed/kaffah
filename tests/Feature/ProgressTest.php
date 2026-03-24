<?php

use App\Models\User;

beforeEach(function () {
    $this->withoutVite();
    $this->seed();
});

test('guest can view progress page', function () {
    $response = $this->get(route('progress'));

    $response->assertOk();
});

test('authenticated user can view progress', function () {
    $user = User::query()->first();

    $response = $this->actingAs($user)->get(route('progress'));

    $response->assertOk();
});
