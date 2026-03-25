<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import AppLayout from '@/components/layout/AppLayout.vue';
import ArabicText from '@/components/ui/ArabicText.vue';

interface Verse {
    surah_number: number;
    surah_name: string;
    verse_number: number;
    arabic: string;
    translation: string;
}

interface Sin {
    number: number;
    slug: string;
    title: string;
    title_arabic: string;
    subtitle: string;
    verses: Verse[];
    brief_explanation: string;
    capital_punishment: string;
}

const props = defineProps<{
    sins: Sin[];
}>();

const currentIndex = ref(0);
const punishmentOpen = ref(false);

const currentSin = computed(() => props.sins[currentIndex.value]);
const isFirst = computed(() => currentIndex.value === 0);
const isLast = computed(() => currentIndex.value === props.sins.length - 1);

function goTo(index: number) {
    currentIndex.value = index;
    punishmentOpen.value = false;
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function prev() {
    if (!isFirst.value) {
        goTo(currentIndex.value - 1);
    }
}

function next() {
    if (!isLast.value) {
        goTo(currentIndex.value + 1);
    }
}
</script>

<template>
    <Head title="Learn Major Sins — Al-Kaba'ir" />
    <AppLayout>
        <div class="mx-auto max-w-3xl">
            <!-- Header -->
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                        Al-Kaba'ir — الكبائر
                    </h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        The Major Sins · Imam al-Dhahabi (d. 748 AH) · {{ sins.length }} sins
                    </p>
                </div>
                <Link
                    href="/major-sins"
                    class="rounded-lg border border-danger-200 bg-danger-50 px-4 py-2 text-sm font-medium text-danger-700 transition hover:bg-danger-100 dark:border-danger-900/50 dark:bg-danger-950/30 dark:text-danger-400"
                >
                    Take the Quiz
                </Link>
            </div>

            <!-- Progress bar -->
            <div class="mb-6">
                <div class="mb-1.5 flex items-center justify-between text-xs text-gray-500">
                    <span>Sin {{ currentIndex + 1 }} of {{ sins.length }}</span>
                    <span>{{ Math.round(((currentIndex + 1) / sins.length) * 100) }}% complete</span>
                </div>
                <div class="h-1.5 w-full overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700">
                    <div
                        class="h-full rounded-full bg-gradient-to-r from-danger-600 to-danger-500 transition-all duration-300"
                        :style="{ width: `${((currentIndex + 1) / sins.length) * 100}%` }"
                    />
                </div>
            </div>

            <!-- Sin card -->
            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <!-- Card header -->
                <div class="bg-gradient-to-br from-danger-950 via-danger-900 to-danger-800 px-8 py-6 text-center">
                    <div class="mb-2 inline-flex items-center gap-2 rounded-full bg-danger-800/60 px-3 py-1 text-xs font-medium text-danger-200">
                        <span>الكبيرة {{ currentSin.number }}</span>
                        <span>·</span>
                        <span>Major Sin #{{ currentSin.number }}</span>
                    </div>
                    <ArabicText
                        :text="currentSin.title_arabic"
                        size="3xl"
                        class="mb-3 block text-danger-100"
                    />
                    <h2 class="text-xl font-bold text-white">{{ currentSin.title }}</h2>
                    <p class="mt-1 text-sm text-danger-300">{{ currentSin.subtitle }}</p>
                </div>

                <!-- Verses -->
                <div class="divide-y divide-gray-100 dark:divide-gray-700">
                    <div
                        v-for="(verse, i) in currentSin.verses"
                        :key="i"
                        class="px-8 py-6"
                    >
                        <div class="mb-1 text-xs font-semibold uppercase tracking-wide text-gold-600 dark:text-gold-400">
                            {{ verse.surah_name }} {{ verse.surah_number }}:{{ verse.verse_number }}
                        </div>
                        <div class="mb-4 text-right">
                            <ArabicText
                                :text="verse.arabic"
                                size="xl"
                                class="leading-loose text-gray-800 dark:text-gray-100"
                            />
                        </div>
                        <p class="text-sm leading-relaxed text-gray-600 italic dark:text-gray-400">
                            "{{ verse.translation }}"
                        </p>
                    </div>
                </div>

                <!-- Explanation -->
                <div class="border-t border-gray-100 bg-gray-50 px-8 py-6 dark:border-gray-700 dark:bg-gray-800/50">
                    <h3 class="mb-3 text-sm font-semibold uppercase tracking-wide text-gray-500 dark:text-gray-400">
                        Explanation
                    </h3>
                    <p class="text-sm leading-relaxed text-gray-700 dark:text-gray-300">
                        {{ currentSin.brief_explanation }}
                    </p>
                </div>

                <!-- Capital punishment accordion -->
                <div class="border-t border-gray-200 dark:border-gray-700">
                    <button
                        class="flex w-full items-center justify-between px-8 py-4 text-left transition hover:bg-gray-50 dark:hover:bg-gray-700/50"
                        @click="punishmentOpen = !punishmentOpen"
                    >
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                            Worldly Ruling &amp; Punishment
                        </span>
                        <svg
                            class="h-4 w-4 text-gray-400 transition-transform"
                            :class="{ 'rotate-180': punishmentOpen }"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div v-if="punishmentOpen" class="px-8 pb-6">
                        <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-400">
                            {{ currentSin.capital_punishment }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="mt-6 flex items-center justify-between gap-4">
                <button
                    :disabled="isFirst"
                    class="flex items-center gap-2 rounded-lg border px-5 py-2.5 text-sm font-medium transition disabled:opacity-40"
                    :class="isFirst
                        ? 'border-gray-200 text-gray-400 cursor-not-allowed dark:border-gray-700'
                        : 'border-gray-300 text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700'"
                    @click="prev"
                >
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Previous
                </button>

                <!-- Sin number jump -->
                <div class="flex flex-wrap justify-center gap-1.5">
                    <button
                        v-for="(sin, i) in sins"
                        :key="sin.number"
                        class="h-7 w-7 rounded text-xs font-semibold transition"
                        :class="i === currentIndex
                            ? 'bg-danger-600 text-white'
                            : 'bg-gray-100 text-gray-600 hover:bg-danger-100 hover:text-danger-700 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-danger-900/40'"
                        :title="sin.title"
                        @click="goTo(i)"
                    >
                        {{ sin.number }}
                    </button>
                </div>

                <button
                    :disabled="isLast"
                    class="flex items-center gap-2 rounded-lg border px-5 py-2.5 text-sm font-medium transition disabled:opacity-40"
                    :class="isLast
                        ? 'border-gray-200 text-gray-400 cursor-not-allowed dark:border-gray-700'
                        : 'border-gray-300 text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700'"
                    @click="next"
                >
                    Next
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!-- Footer note -->
            <p class="mt-6 text-center text-xs text-gray-400 dark:text-gray-500">
                Based on <em>Al-Kaba'ir</em> by Imam Shams al-Din al-Dhahabi (d. 748 AH) — may Allah have mercy on him
            </p>
        </div>
    </AppLayout>
</template>
