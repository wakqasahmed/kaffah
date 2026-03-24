<?php

namespace App\Http\Controllers;

use App\Models\Surah;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SurahController extends Controller
{
    public function __invoke(Request $request): Response
    {
        $surahs = Surah::query()
            ->withCount('verses')
            ->orderBy('number')
            ->get();

        return Inertia::render('Surahs/Index', [
            'surahs' => $surahs,
        ]);
    }
}
