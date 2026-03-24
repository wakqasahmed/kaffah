<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import AppLayout from '@/components/layout/AppLayout.vue';
import ArabicText from '@/components/ui/ArabicText.vue';

defineProps<{
    totalQuestions: number;
}>();

const questionCount = ref(10);
const isStarting = ref(false);

function startQuiz() {
    isStarting.value = true;
    router.post('/major-sins/start', { question_count: questionCount.value }, {
        onError: () => { isStarting.value = false; },
    });
}
</script>

<template>
    <Head title="Ashab ush-Shimaal — Major Sins Quiz" />
    <AppLayout>
        <div class="mx-auto max-w-2xl">
            <!-- Header -->
            <div class="mb-8 overflow-hidden rounded-2xl bg-gradient-to-br from-red-950 via-rose-900 to-red-800 p-8 text-center shadow-xl">
                <div class="mb-4 inline-flex items-center gap-2 rounded-full bg-red-800/60 px-4 py-1.5 text-sm font-medium text-red-200">
                    <span>⚠️</span>
                    <span>حِزْبُ الشَّيْطَانِ — Hizb ush-Shaitan</span>
                </div>
                <ArabicText
                    text="أَصْحَابُ الشِّمَالِ"
                    size="4xl"
                    class="mb-3 block text-rose-200"
                />
                <h1 class="mb-2 text-2xl font-bold text-white">
                    Ashab ush-Shimaal
                </h1>
                <p class="text-rose-300">The People of the Left — Major Sins Quiz</p>
                <p class="mt-2 text-sm text-rose-400">Based on Al-Kaba'ir by Imam Dhahabi (d. 748 AH)</p>
            </div>

            <!-- About the quiz -->
            <div class="mb-6 rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <h2 class="mb-3 text-lg font-semibold text-gray-900 dark:text-white">
                    About This Quiz
                </h2>
                <p class="mb-4 text-sm leading-relaxed text-gray-600 dark:text-gray-400">
                    Imam Shams ad-Din al-Dhahabi's <em>Al-Kaba'ir</em> (الكبائر) is a classical Islamic
                    text cataloguing the major sins — those carrying specific Quranic punishments, curses,
                    or warnings of Hellfire. Knowing what to avoid is the first step of the Straight Path.
                </p>
                <div class="grid grid-cols-3 gap-4 text-center">
                    <div class="rounded-lg bg-red-50 p-3 dark:bg-red-950/30">
                        <p class="text-2xl font-bold text-red-700 dark:text-red-400">30</p>
                        <p class="text-xs text-gray-500">Major Sins</p>
                    </div>
                    <div class="rounded-lg bg-amber-50 p-3 dark:bg-amber-950/30">
                        <p class="text-2xl font-bold text-amber-700 dark:text-amber-400">{{ totalQuestions }}</p>
                        <p class="text-xs text-gray-500">Questions Available</p>
                    </div>
                    <div class="rounded-lg bg-gray-50 p-3 dark:bg-gray-700">
                        <p class="text-2xl font-bold text-gray-700 dark:text-gray-300">3</p>
                        <p class="text-xs text-gray-500">Difficulty Levels</p>
                    </div>
                </div>
            </div>

            <!-- Quranic warning -->
            <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 p-6 dark:border-rose-900/50 dark:bg-rose-950/20">
                <ArabicText
                    text="وَمَن يَتَّخِذِ الشَّيْطَانَ وَلِيًّا مِّن دُونِ اللَّهِ فَقَدْ خَسِرَ خُسْرَانًا مُّبِينًا"
                    size="lg"
                    class="mb-3 block text-rose-800 dark:text-rose-300"
                />
                <p class="text-center text-sm text-rose-700 dark:text-rose-400">
                    "And whoever takes Shaytan as an ally instead of Allah has certainly suffered a clear loss." — Quran 4:119
                </p>
            </div>

            <!-- Quiz settings -->
            <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <h2 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">
                    Start the Quiz
                </h2>

                <div class="mb-6">
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Number of Questions
                    </label>
                    <div class="flex gap-3">
                        <button
                            v-for="count in [5, 10, 15, 20]"
                            :key="count"
                            class="flex-1 rounded-lg border px-4 py-2.5 text-sm font-semibold transition"
                            :class="questionCount === count
                                ? 'border-red-600 bg-red-600 text-white'
                                : 'border-gray-300 text-gray-700 hover:border-red-400 dark:border-gray-600 dark:text-gray-300'"
                            @click="questionCount = count"
                        >
                            {{ count }}
                        </button>
                    </div>
                </div>

                <button
                    :disabled="isStarting"
                    class="w-full rounded-lg bg-gradient-to-r from-red-700 to-rose-700 px-6 py-3.5 font-semibold text-white shadow-sm transition hover:from-red-800 hover:to-rose-800 disabled:opacity-60"
                    @click="startQuiz"
                >
                    {{ isStarting ? 'Starting...' : '⚠️ Begin Major Sins Quiz' }}
                </button>
                <p class="mt-3 text-center text-xs text-gray-400 dark:text-gray-500">
                    Learn what to avoid — Hizb Allah never commits these.
                </p>
            </div>
        </div>
    </AppLayout>
</template>
