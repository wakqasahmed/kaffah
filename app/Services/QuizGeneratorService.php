<?php

namespace App\Services;

use App\Enums\QuizType;
use App\Models\QuizAttempt;
use App\Models\QuizQuestion;
use App\Models\Surah;
use Illuminate\Support\Collection;

class QuizGeneratorService
{
    /**
     * @return Collection<int, QuizQuestion>
     */
    public function generateQuiz(Surah $surah, QuizType $type, int $count = 10): Collection
    {
        return QuizQuestion::query()
            ->whereHas('verse', fn ($q) => $q->where('surah_id', $surah->id))
            ->where('type', $type)
            ->inRandomOrder()
            ->limit($count)
            ->get();
    }

    /**
     * @return Collection<int, QuizQuestion>
     */
    public function generateMixedQuiz(Surah $surah, int $count = 10): Collection
    {
        return QuizQuestion::query()
            ->whereHas('verse', fn ($q) => $q->where('surah_id', $surah->id))
            ->inRandomOrder()
            ->limit($count)
            ->get();
    }

    /**
     * @return array{score: float, correct: int, total: int, percentage: float}
     */
    public function calculateScore(QuizAttempt $attempt): array
    {
        $attempt->loadMissing('answers.quizQuestion');

        $totalPoints = 0.0;

        $streak = 0;
        foreach ($attempt->answers as $answer) {
            if ($answer->is_correct) {
                $streak++;
                $difficultyMultiplier = match ($answer->quizQuestion->difficulty_level) {
                    1 => 1.0,
                    2 => 1.5,
                    3 => 2.0,
                    default => 1.0,
                };

                $streakMultiplier = min($streak, 5);
                $basePoints = 10.0;

                $totalPoints += $basePoints * $difficultyMultiplier * $streakMultiplier;
            } else {
                $streak = 0;
            }
        }

        $correct = $attempt->answers->where('is_correct', true)->count();
        $total = $attempt->answers->count();

        return [
            'score' => round($totalPoints, 2),
            'correct' => $correct,
            'total' => $total,
            'percentage' => $total > 0 ? round(($correct / $total) * 100, 2) : 0,
        ];
    }
}
