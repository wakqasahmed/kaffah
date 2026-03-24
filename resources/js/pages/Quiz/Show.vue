<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
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

interface QuizTypeOption {
    value: string;
    label: string;
}

const props = defineProps<{
    surah: Surah;
    quizTypes: QuizTypeOption[];
}>();

const form = useForm({
    quiz_type: props.quizTypes[0]?.value || '',
    question_count: 10,
});

function startQuiz() {
    form.post(`/quiz/${props.surah.id}/start`);
}
</script>

<template>
    <Head :title="`Quiz - ${surah.name}`" />
    <AppLayout>
        <div class="mx-auto max-w-2xl">
            <div
                class="mb-8 rounded-xl border border-gray-200 bg-white p-8 text-center shadow-sm dark:border-gray-700 dark:bg-gray-800"
            >
                <ArabicText
                    :text="surah.name_arabic"
                    size="3xl"
                    class="mb-2 block text-emerald-700 dark:text-emerald-400"
                />
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ surah.name }}
                </h1>
                <p class="mt-1 text-gray-500 dark:text-gray-400">
                    Surah {{ surah.number }} &middot;
                    {{ surah.verses_count || surah.verse_count }} verses
                </p>
            </div>

            <form
                class="rounded-xl border border-gray-200 bg-white p-8 shadow-sm dark:border-gray-700 dark:bg-gray-800"
                @submit.prevent="startQuiz"
            >
                <h2
                    class="mb-6 text-lg font-semibold text-gray-900 dark:text-white"
                >
                    Configure Your Quiz
                </h2>

                <div class="mb-6">
                    <label
                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"
                    >
                        Quiz Type
                    </label>
                    <div class="grid grid-cols-1 gap-3">
                        <label
                            v-for="qt in quizTypes"
                            :key="qt.value"
                            class="flex cursor-pointer items-center gap-3 rounded-lg border-2 px-4 py-3 transition-all"
                            :class="
                                form.quiz_type === qt.value
                                    ? 'border-emerald-500 bg-emerald-50 dark:border-emerald-400 dark:bg-emerald-900/30'
                                    : 'border-gray-200 hover:border-gray-300 dark:border-gray-600'
                            "
                        >
                            <input
                                v-model="form.quiz_type"
                                type="radio"
                                :value="qt.value"
                                class="text-emerald-600"
                            />
                            <span
                                class="text-sm font-medium text-gray-800 dark:text-gray-200"
                            >
                                {{ qt.label }}
                            </span>
                        </label>
                    </div>
                    <p
                        v-if="form.errors.quiz_type"
                        class="mt-1 text-sm text-rose-500"
                    >
                        {{ form.errors.quiz_type }}
                    </p>
                </div>

                <div class="mb-8">
                    <label
                        class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"
                    >
                        Number of Questions: {{ form.question_count }}
                    </label>
                    <input
                        v-model.number="form.question_count"
                        type="range"
                        min="5"
                        max="20"
                        class="w-full accent-emerald-500"
                    />
                    <div
                        class="mt-1 flex justify-between text-xs text-gray-400"
                    >
                        <span>5</span>
                        <span>20</span>
                    </div>
                </div>

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full rounded-lg bg-emerald-600 px-6 py-3 font-semibold text-white transition hover:bg-emerald-700 disabled:opacity-50"
                >
                    {{ form.processing ? 'Starting...' : 'Start Quiz' }}
                </button>
            </form>
        </div>
    </AppLayout>
</template>
