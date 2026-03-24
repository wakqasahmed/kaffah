<?php

namespace App\Models;

use Database\Factories\UserProgressFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id', 'surah_id', 'mastery_percentage', 'total_attempts',
    'best_score', 'current_streak', 'longest_streak', 'last_attempted_at',
])]
class UserProgress extends Model
{
    /** @use HasFactory<UserProgressFactory> */
    use HasFactory;

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'mastery_percentage' => 'decimal:2',
            'best_score' => 'decimal:2',
            'last_attempted_at' => 'datetime',
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
}
