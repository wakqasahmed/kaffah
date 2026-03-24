<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AnswerQuizRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'question_id' => ['required', 'exists:quiz_questions,id'],
            'selected_index' => ['required', 'integer', 'min:0'],
            'time_spent_seconds' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
