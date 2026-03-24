<?php

namespace Database\Seeders;

use App\Enums\QuizType;
use App\Models\QuizQuestion;
use Illuminate\Database\Seeder;

class MajorSinsSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('data/major_sins_questions.json');
        $questions = json_decode(file_get_contents($path), true);

        foreach ($questions as $questionData) {
            QuizQuestion::query()->create([
                'verse_id' => null,
                'action_id' => null,
                'type' => QuizType::MajorSins->value,
                'difficulty_level' => $questionData['difficulty_level'],
                'question_text' => $questionData['question_text'],
                'question_data' => $questionData['question_data'],
            ]);
        }
    }
}
