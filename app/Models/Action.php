<?php

namespace App\Models;

use Database\Factories\ActionFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'verse_id', 'action_key', 'arabic_fragment', 'weightage', 'action_type',
    'obligation', 'implementation_level', 'difficulty_level', 'classification',
    'jannah_category', 'jahannam_category', 'gender', 'age_group', 'frequency',
    'action_categories',
])]
class Action extends Model
{
    /** @use HasFactory<ActionFactory> */
    use HasFactory;

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'gender' => 'array',
            'age_group' => 'array',
            'action_categories' => 'array',
            'weightage' => 'decimal:2',
        ];
    }

    /**
     * @return BelongsTo<Verse, $this>
     */
    public function verse(): BelongsTo
    {
        return $this->belongsTo(Verse::class);
    }

    /**
     * @return HasMany<QuizQuestion, $this>
     */
    public function quizQuestions(): HasMany
    {
        return $this->hasMany(QuizQuestion::class);
    }
}
