<?php

namespace Database\Seeders;

use App\Models\Action;
use App\Models\Surah;
use App\Models\Verse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SurahSeeder extends Seeder
{
    /**
     * @var array<int, array{name: string, name_arabic: string, revelation_order: int}>
     */
    private array $surahMeta = [
        105 => ['name' => 'Al-Fil', 'name_arabic' => 'الفيل', 'revelation_order' => 19],
        106 => ['name' => 'Quraysh', 'name_arabic' => 'قريش', 'revelation_order' => 29],
        107 => ['name' => "Al-Ma'un", 'name_arabic' => 'الماعون', 'revelation_order' => 17],
        108 => ['name' => 'Al-Kawthar', 'name_arabic' => 'الكوثر', 'revelation_order' => 15],
        109 => ['name' => 'Al-Kafirun', 'name_arabic' => 'الكافرون', 'revelation_order' => 18],
        110 => ['name' => 'An-Nasr', 'name_arabic' => 'النصر', 'revelation_order' => 114],
        111 => ['name' => 'Al-Masad', 'name_arabic' => 'المسد', 'revelation_order' => 6],
        112 => ['name' => 'Al-Ikhlas', 'name_arabic' => 'الإخلاص', 'revelation_order' => 22],
        113 => ['name' => 'Al-Falaq', 'name_arabic' => 'الفلق', 'revelation_order' => 20],
        114 => ['name' => 'An-Nas', 'name_arabic' => 'الناس', 'revelation_order' => 21],
    ];

    public function run(): void
    {
        foreach (range(105, 114) as $surahNumber) {
            $filePath = database_path("data/surah_{$surahNumber}.json");

            if (! File::exists($filePath)) {
                $this->command->warn("Missing data file: surah_{$surahNumber}.json");

                continue;
            }

            /** @var array<int, array<string, mixed>> $versesData */
            $versesData = json_decode(File::get($filePath), true);
            $meta = $this->surahMeta[$surahNumber];

            $surah = Surah::query()->create([
                'number' => $surahNumber,
                'name' => $meta['name'],
                'name_arabic' => $meta['name_arabic'],
                'verse_count' => count($versesData),
                'revelation_order' => $meta['revelation_order'],
            ]);

            foreach ($versesData as $verseData) {
                $verse = Verse::query()->create([
                    'surah_id' => $surah->id,
                    'verse_number' => $verseData['verse_number'],
                    'text_arabic' => $verseData['text'],
                    'translation_en' => $verseData['translation_en'] ?? null,
                ]);

                foreach ($verseData['actions'] as $actionData) {
                    Action::query()->create([
                        'verse_id' => $verse->id,
                        'action_key' => $actionData['action'],
                        'arabic_fragment' => $actionData['arabic'],
                        'weightage' => $actionData['weightage'],
                        'action_type' => $actionData['action_type'][0],
                        'obligation' => $actionData['obligation'][0],
                        'implementation_level' => $actionData['implementation_level'],
                        'difficulty_level' => $actionData['difficulty_level'],
                        'classification' => $actionData['classification'],
                        'jannah_category' => $actionData['jannah_category'],
                        'jahannam_category' => $actionData['jahannam_category'],
                        'gender' => $actionData['gender'],
                        'age_group' => $actionData['age_group'],
                        'frequency' => $actionData['frequency'][0],
                        'action_categories' => $actionData['action_categories'],
                    ]);
                }
            }

            $this->command->info("Seeded Surah {$surahNumber}: {$meta['name']} ({$surah->verse_count} verses)");
        }
    }
}
