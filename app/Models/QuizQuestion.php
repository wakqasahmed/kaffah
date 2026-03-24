<?php

namespace App\Models;

use App\Enums\QuizType;
use Database\Factories\QuizQuestionFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['verse_id', 'action_id', 'type', 'difficulty_level', 'question_text', 'question_data'])]
class QuizQuestion extends Model
{
    /** @use HasFactory<QuizQuestionFactory> */
    use HasFactory;

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'type' => QuizType::class,
            'question_data' => 'array',
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
     * @return BelongsTo<Action, $this>
     */
    public function action(): BelongsTo
    {
        return $this->belongsTo(Action::class);
    }
}
