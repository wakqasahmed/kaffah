<?php

namespace Database\Seeders;

use App\Enums\QuizType;
use App\Models\QuizQuestion;
use App\Models\Surah;
use App\Models\Verse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class QuizQuestionSeeder extends Seeder
{
    public function run(): void
    {
        $surahs = Surah::query()->with('verses.actions')->get();

        foreach ($surahs as $surah) {
            $this->generateVerseIdentificationQuestions($surah, $surahs);
            $this->generateVerseCompletionQuestions($surah);
            $this->generateActionClassificationQuestions($surah);
            $this->generateTranslationMatchingQuestions($surah, $surahs);
        }

        $this->command->info('Generated '.QuizQuestion::query()->count().' quiz questions.');
    }

    /**
     * @param  Collection<int, Surah>  $allSurahs
     */
    private function generateVerseIdentificationQuestions(Surah $surah, $allSurahs): void
    {
        $otherSurahs = $allSurahs->where('id', '!=', $surah->id)->values();

        foreach ($surah->verses as $verse) {
            $distractors = $otherSurahs->random(min(3, $otherSurahs->count()));
            $options = $distractors->map(fn (Surah $s) => [
                'surah_name' => $s->name,
                'surah_name_arabic' => $s->name_arabic,
                'surah_number' => $s->number,
            ])->toArray();

            $correctOption = [
                'surah_name' => $surah->name,
                'surah_name_arabic' => $surah->name_arabic,
                'surah_number' => $surah->number,
            ];

            $correctIndex = random_int(0, count($options));
            array_splice($options, $correctIndex, 0, [$correctOption]);

            QuizQuestion::query()->create([
                'verse_id' => $verse->id,
                'type' => QuizType::VerseIdentification,
                'difficulty_level' => 1,
                'question_text' => 'Which surah does this verse belong to?',
                'question_data' => [
                    'arabic_text' => $verse->text_arabic,
                    'options' => $options,
                    'correct_index' => $correctIndex,
                ],
            ]);
        }
    }

    private function generateVerseCompletionQuestions(Surah $surah): void
    {
        foreach ($surah->verses as $verse) {
            $words = explode(' ', $verse->text_arabic);

            if (count($words) < 3) {
                continue;
            }

            $blankIndex = random_int(1, count($words) - 2);
            $correctWord = $words[$blankIndex];
            $words[$blankIndex] = '____';
            $textWithBlank = implode(' ', $words);

            $allWords = $surah->verses
                ->flatMap(fn (Verse $v) => explode(' ', $v->text_arabic))
                ->unique()
                ->filter(fn (string $w) => $w !== $correctWord && mb_strlen($w) > 1)
                ->values();

            $distractors = $allWords->random(min(3, $allWords->count()))->values()->toArray();

            $options = $distractors;
            $correctIndex = random_int(0, count($options));
            array_splice($options, $correctIndex, 0, [$correctWord]);

            QuizQuestion::query()->create([
                'verse_id' => $verse->id,
                'type' => QuizType::VerseCompletion,
                'difficulty_level' => 2,
                'question_text' => 'Complete the missing word in this verse.',
                'question_data' => [
                    'arabic_text_with_blank' => $textWithBlank,
                    'full_text' => $verse->text_arabic,
                    'options' => $options,
                    'correct_index' => $correctIndex,
                ],
            ]);
        }
    }

    private function generateActionClassificationQuestions(Surah $surah): void
    {
        foreach ($surah->verses as $verse) {
            foreach ($verse->actions as $action) {
                $isDoAction = $action->classification === 'do';

                QuizQuestion::query()->create([
                    'verse_id' => $verse->id,
                    'action_id' => $action->id,
                    'type' => QuizType::ActionClassification,
                    'difficulty_level' => $action->difficulty_level,
                    'question_text' => 'Is this action something to do or avoid?',
                    'question_data' => [
                        'action_key' => $action->action_key,
                        'arabic_fragment' => $action->arabic_fragment,
                        'verse_text' => $verse->text_arabic,
                        'options' => [
                            'Do (حزب الله)',
                            "Don't (حزب الشيطان)",
                        ],
                        'correct_index' => $isDoAction ? 0 : 1,
                    ],
                ]);
            }
        }
    }

    /**
     * @param  Collection<int, Surah>  $allSurahs
     */
    private function generateTranslationMatchingQuestions(Surah $surah, $allSurahs): void
    {
        $allVerses = $allSurahs->flatMap->verses;

        foreach ($surah->verses as $verse) {
            if (! $verse->translation_en) {
                continue;
            }

            $distractorVerses = $allVerses
                ->where('id', '!=', $verse->id)
                ->filter(fn (Verse $v) => $v->translation_en !== null)
                ->random(min(3, $allVerses->count() - 1));

            $options = $distractorVerses->pluck('translation_en')->values()->toArray();
            $correctIndex = random_int(0, count($options));
            array_splice($options, $correctIndex, 0, [$verse->translation_en]);

            QuizQuestion::query()->create([
                'verse_id' => $verse->id,
                'type' => QuizType::TranslationMatching,
                'difficulty_level' => 1,
                'question_text' => 'Which translation matches this Arabic verse?',
                'question_data' => [
                    'arabic_text' => $verse->text_arabic,
                    'options' => $options,
                    'correct_index' => $correctIndex,
                ],
            ]);
        }
    }
}
