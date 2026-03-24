<?php

namespace App\Models;

use Database\Factories\VerseFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['surah_id', 'verse_number', 'text_arabic', 'translation_en'])]
class Verse extends Model
{
    /** @use HasFactory<VerseFactory> */
    use HasFactory;

    /**
     * @return BelongsTo<Surah, $this>
     */
    public function surah(): BelongsTo
    {
        return $this->belongsTo(Surah::class);
    }

    /**
     * @return HasMany<Action, $this>
     */
    public function actions(): HasMany
    {
        return $this->hasMany(Action::class);
    }

    /**
     * @return HasMany<QuizQuestion, $this>
     */
    public function quizQuestions(): HasMany
    {
        return $this->hasMany(QuizQuestion::class);
    }
}
