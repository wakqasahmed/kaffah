<script setup lang="ts">
import { Head, router, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import AppLayout from '@/components/layout/AppLayout.vue';
import ArabicText from '@/components/ui/ArabicText.vue';
import OptionButton from '@/components/quiz/OptionButton.vue';
import ProgressBar from '@/components/quiz/ProgressBar.vue';

interface QuestionData {
    arabic_text?: string;
    arabic_text_with_blank?: string;
    full_text?: string;
    arabic_fragment?: string;
    verse_text?: string;
    action_key?: string;
    options: (string | Record<string, unknown>)[];
    correct_index: number;
}

interface Question {
    id: number;
    type: string;
    question_text: string;
    question_data: QuestionData;
    difficulty_level: number;
}

interface Attempt {
    id: number;
}

interface Context {
    name: string;
    name_arabic: string;
    id: number | null;
    type: 'surah' | 'major_sins';
}

const props = defineProps<{
    attempt: Attempt;
    context: Context;
    questions: Question[];
}>();

const page = usePage();
const currentIndex = ref(0);
const selectedIndex = ref<number | null>(null);
const answeredCorrectly = ref<boolean | null>(null);
const correctIndex = ref<number | null>(null);
const isSubmitting = ref(false);
const correctCount = ref(0);
const explanation = ref<string | null>(null);
const verseArabic = ref<string | null>(null);
const verseTranslation = ref<string | null>(null);
const quranicRef = ref<string | null>(null);

const currentQuestion = computed(() => props.questions[currentIndex.value]);
const isLastQuestion = computed(
    () => currentIndex.value === props.questions.length - 1,
);

function getOptionLabel(
    option: string | Record<string, unknown>,
    questionType: string,
): string {
    if (typeof option === 'string') {
        return option;
    }
    if (questionType === 'verse_identification') {
        return `${option.surah_name} (${option.surah_name_arabic})`;
    }
    return String(option);
}

function selectOption(index: number) {
    if (answeredCorrectly.value !== null || isSubmitting.value) return;
    selectedIndex.value = index;
}

function submitAnswer() {
    if (selectedIndex.value === null || isSubmitting.value) return;

    isSubmitting.value = true;

    router.post(
        `/quiz/attempt/${props.attempt.id}/answer`,
        {
            question_id: currentQuestion.value.id,
            selected_index: selectedIndex.value,
        },
        {
            preserveState: true,
            preserveScroll: true,
            onSuccess: () => {
                const flash = page.props.flash as
                    | Record<string, unknown>
                    | undefined;
                const result = (flash?.answerResult as Record<string, unknown>) || null;

                if (result) {
                    answeredCorrectly.value = result.is_correct as boolean;
                    correctIndex.value = result.correct_index as number;
                    explanation.value = (result.explanation as string) ?? null;
                    verseArabic.value = (result.verse_arabic as string) ?? null;
                    verseTranslation.value = (result.verse_translation as string) ?? null;
                    quranicRef.value = (result.quranic_ref as string) ?? null;
                    if (result.is_correct) correctCount.value++;
                } else {
                    answeredCorrectly.value =
                        selectedIndex.value ===
                        currentQuestion.value.question_data.correct_index;
                    correctIndex.value =
                        currentQuestion.value.question_data.correct_index;
                    if (answeredCorrectly.value) correctCount.value++;
                }

                isSubmitting.value = false;
            },
            onError: () => {
                isSubmitting.value = false;
            },
        },
    );
}

function nextQuestion() {
    if (isLastQuestion.value) {
        router.get(`/quiz/attempt/${props.attempt.id}/results`);
        return;
    }

    currentIndex.value++;
    selectedIndex.value = null;
    answeredCorrectly.value = null;
    correctIndex.value = null;
    explanation.value = null;
    verseArabic.value = null;
    verseTranslation.value = null;
    quranicRef.value = null;
}
</script>

<template>
    <Head :title="`Quiz - ${context.name}`" />
    <AppLayout>
        <div class="mx-auto max-w-2xl">
            <div class="mb-4 flex items-center justify-between">
                <h1 class="text-lg font-semibold text-gray-900 dark:text-white">
                    <ArabicText :text="context.name_arabic" size="lg" />
                    <span class="ml-2 text-gray-500">{{ context.name }}</span>
                </h1>
                <span
                    class="rounded-full bg-emerald-100 px-3 py-1 text-sm font-medium text-emerald-700 dark:bg-emerald-900/50 dark:text-emerald-300"
                >
                    {{ correctCount }}/{{ currentIndex + (answeredCorrectly !== null ? 1 : 0) }}
                    correct
                </span>
            </div>

            <ProgressBar
                :current="currentIndex + 1"
                :total="questions.length"
            />

            <div
                v-if="currentQuestion"
                class="rounded-xl border border-gray-200 bg-white p-8 shadow-sm dark:border-gray-700 dark:bg-gray-800"
            >
                <div class="mb-2 flex items-center gap-2">
                    <span
                        class="rounded bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-600 dark:bg-gray-700 dark:text-gray-400"
                    >
                        {{ currentQuestion.type.replace(/_/g, ' ') }}
                    </span>
                    <span
                        class="rounded px-2 py-0.5 text-xs font-medium"
                        :class="{
                            'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/50 dark:text-emerald-300':
                                currentQuestion.difficulty_level === 1,
                            'bg-amber-100 text-amber-700 dark:bg-amber-900/50 dark:text-amber-300':
                                currentQuestion.difficulty_level === 2,
                            'bg-rose-100 text-rose-700 dark:bg-rose-900/50 dark:text-rose-300':
                                currentQuestion.difficulty_level === 3,
                        }"
                    >
                        {{
                            currentQuestion.difficulty_level === 1
                                ? 'Islam'
                                : currentQuestion.difficulty_level === 2
                                  ? 'Eemaan'
                                  : 'Ihsan'
                        }}
                    </span>
                </div>

                <p
                    class="mb-4 text-lg font-medium text-gray-900 dark:text-white"
                >
                    {{ currentQuestion.question_text }}
                </p>

                <div
                    v-if="
                        currentQuestion.question_data.arabic_text ||
                        currentQuestion.question_data.arabic_text_with_blank ||
                        currentQuestion.question_data.verse_text
                    "
                    class="mb-6 rounded-lg bg-emerald-50 p-6 text-center dark:bg-emerald-900/20"
                >
                    <ArabicText
                        :text="
                            currentQuestion.question_data
                                .arabic_text_with_blank ||
                            currentQuestion.question_data.arabic_text ||
                            currentQuestion.question_data.verse_text ||
                            ''
                        "
                        size="2xl"
                        class="text-gray-800 dark:text-gray-200"
                    />
                    <p
                        v-if="currentQuestion.question_data.action_key"
                        class="mt-3 text-sm text-gray-500 dark:text-gray-400"
                    >
                        {{
                            currentQuestion.question_data.action_key.replace(
                                /_/g,
                                ' ',
                            )
                        }}
                    </p>
                </div>

                <div class="mb-6 space-y-3">
                    <OptionButton
                        v-for="(option, i) in currentQuestion.question_data
                            .options"
                        :key="i"
                        :label="
                            getOptionLabel(option, currentQuestion.type)
                        "
                        :index="i"
                        :selected="selectedIndex === i"
                        :correct="
                            answeredCorrectly !== null
                                ? i === correctIndex
                                    ? true
                                    : selectedIndex === i && !answeredCorrectly
                                      ? false
                                      : null
                                : null
                        "
                        :disabled="answeredCorrectly !== null"
                        @select="selectOption"
                    />
                </div>

                <div v-if="answeredCorrectly === null">
                    <button
                        :disabled="selectedIndex === null || isSubmitting"
                        class="w-full rounded-lg bg-emerald-600 px-6 py-3 font-semibold text-white transition hover:bg-emerald-700 disabled:opacity-50"
                        @click="submitAnswer"
                    >
                        {{ isSubmitting ? 'Checking...' : 'Submit Answer' }}
                    </button>
                </div>

                <div v-else class="space-y-3">
                    <div
                        class="rounded-lg p-4 text-center font-semibold"
                        :class="
                            answeredCorrectly
                                ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/40 dark:text-emerald-300'
                                : 'bg-rose-100 text-rose-800 dark:bg-rose-900/40 dark:text-rose-300'
                        "
                    >
                        {{ answeredCorrectly ? '✓ Correct!' : '✗ Incorrect' }}
                    </div>

                    <!-- Explanation panel -->
                    <div
                        v-if="verseArabic || explanation"
                        class="rounded-lg border border-amber-200 bg-amber-50 p-4 dark:border-amber-800/50 dark:bg-amber-900/20"
                    >
                        <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-amber-700 dark:text-amber-400">
                            📖 Quranic Reference
                        </p>
                        <div v-if="verseArabic" class="mb-3 text-center">
                            <ArabicText
                                :text="verseArabic"
                                size="xl"
                                class="text-gray-800 dark:text-gray-200"
                            />
                        </div>
                        <p
                            v-if="quranicRef"
                            class="mb-2 text-center text-sm font-medium text-amber-700 dark:text-amber-400"
                        >
                            {{ quranicRef }}
                        </p>
                        <p
                            v-if="verseTranslation"
                            class="mb-3 text-center text-sm italic text-gray-600 dark:text-gray-400"
                        >
                            "{{ verseTranslation }}"
                        </p>
                        <p
                            v-if="explanation"
                            class="text-sm text-gray-700 dark:text-gray-300"
                        >
                            {{ explanation }}
                        </p>
                    </div>

                    <button
                        class="w-full rounded-lg bg-gray-800 px-6 py-3 font-semibold text-white transition hover:bg-gray-900 dark:bg-gray-200 dark:text-gray-900 dark:hover:bg-white"
                        @click="nextQuestion"
                    >
                        {{
                            isLastQuestion ? 'See Results' : 'Next Question →'
                        }}
                    </button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
