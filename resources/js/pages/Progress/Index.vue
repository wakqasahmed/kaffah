<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/components/layout/AppLayout.vue';
import ArabicText from '@/components/ui/ArabicText.vue';

interface Surah {
    id: number;
    number: number;
    name: string;
    name_arabic: string;
}

interface Progress {
    mastery_percentage: string;
    total_attempts: number;
    best_score: string;
    current_streak: number;
    longest_streak: number;
}

interface SurahProgress {
    surah: Surah;
    progress: Progress | null;
}

defineProps<{
    surahProgress: SurahProgress[];
}>();
</script>

<template>
    <Head title="Progress" />
    <AppLayout>
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                Your Progress
            </h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">
                Track your mastery across all surahs.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <div
                v-for="sp in surahProgress"
                :key="sp.surah.id"
                class="rounded-xl border border-gray-200 bg-white p-6 dark:border-gray-700 dark:bg-gray-800"
            >
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <ArabicText
                            :text="sp.surah.name_arabic"
                            size="xl"
                            class="text-gray-800 dark:text-gray-200"
                        />
                        <p class="text-sm text-gray-500">
                            {{ sp.surah.name }}
                        </p>
                    </div>
                    <span
                        class="text-2xl font-bold"
                        :class="
                            sp.progress && parseFloat(sp.progress.mastery_percentage) >= 80
                                ? 'text-emerald-600'
                                : sp.progress && parseFloat(sp.progress.mastery_percentage) >= 50
                                  ? 'text-amber-600'
                                  : 'text-gray-400'
                        "
                    >
                        {{
                            sp.progress
                                ? `${Math.round(parseFloat(sp.progress.mastery_percentage))}%`
                                : '0%'
                        }}
                    </span>
                </div>

                <div
                    class="mb-3 h-2 overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700"
                >
                    <div
                        class="h-full rounded-full bg-emerald-500 transition-all"
                        :style="{
                            width: `${sp.progress ? parseFloat(sp.progress.mastery_percentage) : 0}%`,
                        }"
                    />
                </div>

                <div
                    v-if="sp.progress"
                    class="flex gap-4 text-xs text-gray-500 dark:text-gray-400"
                >
                    <span>{{ sp.progress.total_attempts }} attempts</span>
                    <span
                        >Best: {{ Math.round(parseFloat(sp.progress.best_score)) }} pts</span
                    >
                    <span>Streak: {{ sp.progress.current_streak }}</span>
                </div>
                <p
                    v-else
                    class="text-sm text-gray-400 dark:text-gray-500"
                >
                    Not started yet
                </p>
            </div>
        </div>
    </AppLayout>
</template>
