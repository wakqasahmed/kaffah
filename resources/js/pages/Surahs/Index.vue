<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/components/layout/AppLayout.vue';
import ArabicText from '@/components/ui/ArabicText.vue';

interface Surah {
    id: number;
    number: number;
    name: string;
    name_arabic: string;
    verse_count: number;
    verses_count: number;
}

defineProps<{
    surahs: Surah[];
}>();
</script>

<template>
    <Head title="Surahs" />
    <AppLayout>
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                Last 10 Surahs
            </h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">
                Select a surah to start a quiz and test your understanding.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <Link
                v-for="surah in surahs"
                :key="surah.id"
                :href="`/quiz/${surah.id}`"
                class="group rounded-xl border border-gray-200 bg-white p-6 shadow-sm transition-all hover:border-brand-300 hover:shadow-md dark:border-gray-700 dark:bg-gray-800 dark:hover:border-brand-600"
            >
                <div class="mb-4 flex items-center justify-between">
                    <span
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-brand-100 text-sm font-bold text-brand-700 dark:bg-brand-900/50 dark:text-brand-300"
                    >
                        {{ surah.number }}
                    </span>
                    <span class="text-xs text-gray-400">
                        {{ surah.verses_count || surah.verse_count }} verses
                    </span>
                </div>

                <ArabicText
                    :text="surah.name_arabic"
                    size="2xl"
                    class="mb-2 block text-gray-800 dark:text-gray-200"
                />

                <h3
                    class="text-lg font-semibold text-gray-700 group-hover:text-brand-600 dark:text-gray-300 dark:group-hover:text-brand-400"
                >
                    {{ surah.name }}
                </h3>
            </Link>
        </div>
    </AppLayout>
</template>
