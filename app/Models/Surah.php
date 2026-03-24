<?php

namespace App\Models;

use Database\Factories\SurahFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

#[Fillable(['number', 'name', 'name_arabic', 'verse_count', 'revelation_order'])]
class Surah extends Model
{
    /** @use HasFactory<SurahFactory> */
    use HasFactory;

    /**
     * @return HasMany<Verse, $this>
     */
    public function verses(): HasMany
    {
        return $this->hasMany(Verse::class);
    }

    /**
     * @return HasManyThrough<Action, Verse, $this>
     */
    public function actions(): HasManyThrough
    {
        return $this->hasManyThrough(Action::class, Verse::class);
    }

    /**
     * @return HasMany<QuizAttempt, $this>
     */
    public function quizAttempts(): HasMany
    {
        return $this->hasMany(QuizAttempt::class);
    }

    /**
     * @return HasMany<UserProgress, $this>
     */
    public function userProgress(): HasMany
    {
        return $this->hasMany(UserProgress::class);
    }
}
