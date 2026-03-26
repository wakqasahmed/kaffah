<?php

use App\Http\Controllers\MajorSinsController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SurahController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::get('/surahs', SurahController::class)->name('surahs.index');

Route::prefix('major-sins')->name('major-sins.')->group(function () {
    Route::get('/', [MajorSinsController::class, 'show'])->name('show');
    Route::post('/start', [MajorSinsController::class, 'start'])->name('start');
    Route::get('/learn', [MajorSinsController::class, 'learn'])->name('learn');
});

Route::prefix('quiz')->name('quiz.')->group(function () {
    Route::get('/{surah}', [QuizController::class, 'show'])->name('show');
    Route::post('/{surah}/start', [QuizController::class, 'start'])->name('start');
    Route::post('/attempt/{quizAttempt}/answer', [QuizController::class, 'answer'])->name('answer');
    Route::get('/attempt/{quizAttempt}', [QuizController::class, 'play'])->name('play');
    Route::get('/attempt/{quizAttempt}/results', [QuizController::class, 'results'])->name('results');
});

Route::get('/progress', ProgressController::class)->name('progress');

Route::inertia('/implement', 'Implement')->name('implement');

Route::inertia('/sabiqun', 'Groups/Sabiqun')->name('sabiqun');
Route::inertia('/ashab-al-yameen', 'Groups/AshabAlYameen')->name('ashab-al-yameen');
Route::inertia('/ashab-al-shimaal', 'Groups/AshabAlShimaal')->name('ashab-al-shimaal');
Route::inertia('/al-darakil-asfal', 'Groups/AlDarakilAsfal')->name('al-darakil-asfal');
