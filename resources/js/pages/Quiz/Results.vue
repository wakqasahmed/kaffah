<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/components/layout/AppLayout.vue';
import ArabicText from '@/components/ui/ArabicText.vue';

interface Surah {
    id: number;
    name: string;
    name_arabic: string;
    number: number;
}

interface Attempt {
    id: number;
    surah: Surah;
    total_questions: number;
    correct_answers: number;
    score: string;
}

interface ScoreData {
    score: number;
    correct: number;
    total: number;
    percentage: number;
}

defineProps<{
    attempt: Attempt;
    scoreData: ScoreData;
}>();
</script>

<template>
    <Head title="Quiz Results" />
    <AppLayout>
        <div class="mx-auto max-w-2xl">
            <div
                class="rounded-xl border border-gray-200 bg-white p-8 text-center shadow-sm dark:border-gray-700 dark:bg-gray-800"
            >
                <ArabicText
                    :text="attempt.surah.name_arabic"
                    size="3xl"
                    class="mb-2 block text-emerald-700 dark:text-emerald-400"
                />
                <h1
                    class="mb-6 text-2xl font-bold text-gray-900 dark:text-white"
                >
                    Quiz Complete!
                </h1>

                <div class="mb-8">
                    <div
                        class="mx-auto flex h-32 w-32 items-center justify-center rounded-full"
                        :class="
                            scoreData.percentage >= 80
                                ? 'bg-emerald-100 dark:bg-emerald-900/40'
                                : scoreData.percentage >= 50
                                  ? 'bg-amber-100 dark:bg-amber-900/40'
                                  : 'bg-rose-100 dark:bg-rose-900/40'
                        "
                    >
                        <span
                            class="text-4xl font-bold"
                            :class="
                                scoreData.percentage >= 80
                                    ? 'text-emerald-600 dark:text-emerald-400'
                                    : scoreData.percentage >= 50
                                      ? 'text-amber-600 dark:text-amber-400'
                                      : 'text-rose-600 dark:text-rose-400'
                            "
                        >
                            {{ scoreData.percentage }}%
                        </span>
                    </div>
                </div>

                <div
                    class="mb-8 grid grid-cols-3 gap-4 rounded-lg bg-gray-50 p-6 dark:bg-gray-900"
                >
                    <div>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">
                            {{ scoreData.correct }}
                        </p>
                        <p class="text-sm text-gray-500">Correct</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">
                            {{ scoreData.total - scoreData.correct }}
                        </p>
                        <p class="text-sm text-gray-500">Wrong</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">
                            {{ Math.round(scoreData.score) }}
                        </p>
                        <p class="text-sm text-gray-500">Points</p>
                    </div>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row">
                    <Link
                        :href="`/quiz/${attempt.surah.id}`"
                        class="flex-1 rounded-lg bg-emerald-600 px-6 py-3 font-semibold text-white transition hover:bg-emerald-700"
                    >
                        Try Again
                    </Link>
                    <Link
                        href="/surahs"
                        class="flex-1 rounded-lg border border-gray-300 px-6 py-3 font-semibold text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700"
                    >
                        All Surahs
                    </Link>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
