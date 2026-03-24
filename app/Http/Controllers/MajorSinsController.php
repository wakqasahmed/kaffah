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

    public function learn(): Response
    {
        $sins = [];
        $dataPath = database_path('data/major_sins');

        for ($i = 1; $i <= 30; $i++) {
            $file = $dataPath.'/sin_'.str_pad($i, 2, '0', STR_PAD_LEFT).'.json';
            if (file_exists($file)) {
                $sins[] = json_decode(file_get_contents($file), true);
            }
        }

        return Inertia::render('MajorSins/Learn', [
            'sins' => $sins,
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
