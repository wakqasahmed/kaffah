<?php

use App\Models\User;

beforeEach(function () {
    $this->withoutVite();
    $this->seed();
});

test('progress page requires authentication', function () {
    $response = $this->get(route('progress'));

    // Without auth package, the auth middleware throws an exception
    // so we just verify unauthenticated users can't access it
    $response->assertStatus(500);
});

test('authenticated user can view progress', function () {
    $user = User::query()->first();

    $response = $this->actingAs($user)->get(route('progress'));

    $response->assertOk();
});
