<?php

namespace App\Models;

use App\Enums\QuizType;
use Database\Factories\QuizAttemptFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'user_id', 'surah_id', 'quiz_type', 'question_ids', 'score', 'total_questions',
    'correct_answers', 'time_spent_seconds', 'completed_at',
])]
class QuizAttempt extends Model
{
    /** @use HasFactory<QuizAttemptFactory> */
    use HasFactory;

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'quiz_type' => QuizType::class,
            'question_ids' => 'array',
            'score' => 'decimal:2',
            'completed_at' => 'datetime',
        ];
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo<Surah, $this>
     */
    public function surah(): BelongsTo
    {
        return $this->belongsTo(Surah::class);
    }

    /**
     * @return HasMany<QuizAnswer, $this>
     */
    public function answers(): HasMany
    {
        return $this->hasMany(QuizAnswer::class);
    }
}
