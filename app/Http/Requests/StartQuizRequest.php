<?php

namespace App\Http\Requests;

use App\Enums\QuizType;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StartQuizRequest extends FormRequest
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
            'quiz_type' => ['required', Rule::enum(QuizType::class)],
            'question_count' => ['required', 'integer', 'min:5', 'max:20'],
        ];
    }
}
