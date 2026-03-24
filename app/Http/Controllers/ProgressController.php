<?php

namespace App\Http\Controllers;

use App\Models\Surah;
use App\Models\UserProgress;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProgressController extends Controller
{
    public function __invoke(Request $request): Response
    {
        $user = $request->user();

        $surahs = Surah::query()->orderBy('number')->get();

        $progress = $user
            ? UserProgress::query()->where('user_id', $user->id)->get()->keyBy('surah_id')
            : collect();

        $surahProgress = $surahs->map(fn (Surah $surah) => [
            'surah' => $surah,
            'progress' => $progress->get($surah->id),
        ]);

        return Inertia::render('Progress/Index', [
            'surahProgress' => $surahProgress,
        ]);
    }
}
