<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps<{
    theme?: 'light' | 'dark';
}>();

const mobileOpen = ref(false);
const mobileQuizOpen = ref(false);
const mobileLearningOpen = ref(false);
</script>

<template>
    <nav
        class="border-b"
        :class="theme === 'dark'
            ? 'border-white/10'
            : 'border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-gray-900'"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <!-- Logo -->
                <Link
                    href="/"
                    class="flex items-center gap-2 shrink-0"
                    :class="theme === 'dark' ? '' : 'text-emerald-600 dark:text-emerald-400'"
                >
                    <span
                        class="font-arabic text-2xl font-bold"
                        :class="theme === 'dark' ? 'text-emerald-400' : 'text-emerald-600 dark:text-emerald-400'"
                    >كافة</span>
                    <span
                        class="text-sm font-medium"
                        :class="theme === 'dark' ? 'text-gray-400' : 'text-gray-500 dark:text-gray-400'"
                    >Kaffah</span>
                </Link>

                <!-- Desktop Nav links -->
                <div class="hidden items-center gap-1 sm:flex">

                    <!-- Take a Quiz dropdown -->
                    <div class="group relative">
                        <button
                            class="flex items-center gap-1 rounded-md px-3 py-2 text-sm font-medium transition"
                            :class="theme === 'dark'
                                ? 'text-gray-400 hover:text-white'
                                : 'text-gray-600 hover:text-emerald-600 dark:text-gray-300 dark:hover:text-emerald-400'"
                        >
                            Take a Quiz
                            <svg class="h-3.5 w-3.5 transition-transform group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div
                            class="invisible absolute left-0 top-full z-50 w-48 translate-y-1 rounded-lg border py-1 opacity-0 shadow-lg transition-all group-hover:visible group-hover:translate-y-0 group-hover:opacity-100"
                            :class="theme === 'dark'
                                ? 'border-white/10 bg-gray-900'
                                : 'border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800'"
                        >
                            <Link
                                href="/surahs"
                                class="flex items-center gap-2.5 px-4 py-2.5 text-sm transition"
                                :class="theme === 'dark'
                                    ? 'text-gray-300 hover:bg-white/5 hover:text-white'
                                    : 'text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 dark:text-gray-300 dark:hover:bg-emerald-900/20 dark:hover:text-emerald-400'"
                            >
                                <span class="font-arabic text-base text-emerald-500">سُوَر</span>
                                Quiz by Surah
                            </Link>
                            <Link
                                href="/major-sins"
                                class="flex items-center gap-2.5 px-4 py-2.5 text-sm transition"
                                :class="theme === 'dark'
                                    ? 'text-gray-300 hover:bg-white/5 hover:text-white'
                                    : 'text-gray-700 hover:bg-red-50 hover:text-red-700 dark:text-gray-300 dark:hover:bg-red-900/20 dark:hover:text-red-400'"
                            >
                                <span class="font-arabic text-base text-red-500">كبائر</span>
                                Major Sins Quiz
                            </Link>
                        </div>
                    </div>

                    <!-- Learning dropdown -->
                    <div class="group relative">
                        <button
                            class="flex items-center gap-1 rounded-md px-3 py-2 text-sm font-medium transition"
                            :class="theme === 'dark'
                                ? 'text-gray-400 hover:text-white'
                                : 'text-gray-600 hover:text-emerald-600 dark:text-gray-300 dark:hover:text-emerald-400'"
                        >
                            Learning
                            <svg class="h-3.5 w-3.5 transition-transform group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div
                            class="invisible absolute left-0 top-full z-50 w-56 translate-y-1 rounded-lg border py-1 opacity-0 shadow-lg transition-all group-hover:visible group-hover:translate-y-0 group-hover:opacity-100"
                            :class="theme === 'dark'
                                ? 'border-white/10 bg-gray-900'
                                : 'border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800'"
                        >
                            <Link
                                href="/major-sins/learn"
                                class="flex items-center gap-2.5 px-4 py-2.5 text-sm transition"
                                :class="theme === 'dark'
                                    ? 'text-gray-300 hover:bg-white/5 hover:text-white'
                                    : 'text-gray-700 hover:bg-rose-50 hover:text-rose-700 dark:text-gray-300 dark:hover:bg-rose-900/20 dark:hover:text-rose-400'"
                            >
                                <span class="font-arabic text-base text-red-500">كبائر</span>
                                Major Sins
                            </Link>

                            <div
                                class="my-1 border-t"
                                :class="theme === 'dark' ? 'border-white/10' : 'border-gray-100 dark:border-gray-700'"
                            />

                            <div class="px-4 pb-1 pt-0.5">
                                <span
                                    class="text-xs font-semibold uppercase tracking-wider"
                                    :class="theme === 'dark' ? 'text-gray-600' : 'text-gray-400'"
                                >Coming Soon</span>
                            </div>

                            <div
                                v-for="item in [
                                    { arabic: 'حسنات الأبرار', label: 'Good Deeds — Abrar' },
                                    { arabic: 'حسنات المقربين', label: 'Good Deeds — Muqarrabeen' },
                                    { arabic: 'المنافقون', label: 'The Hypocrites' },
                                ]"
                                :key="item.arabic"
                                class="flex cursor-not-allowed items-center gap-2.5 px-4 py-2.5 opacity-40"
                            >
                                <span class="font-arabic text-base text-amber-500">{{ item.arabic }}</span>
                                <span
                                    class="text-sm"
                                    :class="theme === 'dark' ? 'text-gray-400' : 'text-gray-500'"
                                >{{ item.label }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Progress -->
                    <Link
                        href="/progress"
                        class="rounded-md px-3 py-2 text-sm font-medium transition"
                        :class="theme === 'dark'
                            ? 'text-gray-400 hover:text-white'
                            : 'text-gray-600 hover:text-emerald-600 dark:text-gray-300 dark:hover:text-emerald-400'"
                    >
                        Progress
                    </Link>
                </div>

                <!-- Mobile hamburger -->
                <button
                    class="flex items-center justify-center rounded-md p-2 sm:hidden"
                    :class="theme === 'dark'
                        ? 'text-gray-400 hover:text-white'
                        : 'text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200'"
                    @click="mobileOpen = !mobileOpen"
                    aria-label="Toggle menu"
                >
                    <svg v-if="!mobileOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg v-else class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div
            v-if="mobileOpen"
            class="border-t sm:hidden"
            :class="theme === 'dark'
                ? 'border-white/10'
                : 'border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-900'"
        >
            <div class="space-y-1 px-4 py-3">

                <!-- Take a Quiz section -->
                <button
                    class="flex w-full items-center justify-between rounded-md px-3 py-2.5 text-sm font-medium transition"
                    :class="theme === 'dark'
                        ? 'text-gray-300 hover:bg-white/5 hover:text-white'
                        : 'text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-800'"
                    @click="mobileQuizOpen = !mobileQuizOpen"
                >
                    <span>Take a Quiz</span>
                    <svg
                        class="h-4 w-4 transition-transform"
                        :class="mobileQuizOpen ? 'rotate-180' : ''"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div v-if="mobileQuizOpen" class="ml-4 space-y-1">
                    <Link
                        href="/surahs"
                        class="flex items-center gap-2.5 rounded-md px-3 py-2.5 text-sm transition"
                        :class="theme === 'dark'
                            ? 'text-gray-400 hover:bg-white/5 hover:text-white'
                            : 'text-gray-600 hover:bg-emerald-50 hover:text-emerald-700'"
                        @click="mobileOpen = false"
                    >
                        <span class="font-arabic text-base text-emerald-500">سُوَر</span>
                        Quiz by Surah
                    </Link>
                    <Link
                        href="/major-sins"
                        class="flex items-center gap-2.5 rounded-md px-3 py-2.5 text-sm transition"
                        :class="theme === 'dark'
                            ? 'text-gray-400 hover:bg-white/5 hover:text-white'
                            : 'text-gray-600 hover:bg-red-50 hover:text-red-700'"
                        @click="mobileOpen = false"
                    >
                        <span class="font-arabic text-base text-red-500">كبائر</span>
                        Major Sins Quiz
                    </Link>
                </div>

                <!-- Learning section -->
                <button
                    class="flex w-full items-center justify-between rounded-md px-3 py-2.5 text-sm font-medium transition"
                    :class="theme === 'dark'
                        ? 'text-gray-300 hover:bg-white/5 hover:text-white'
                        : 'text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-800'"
                    @click="mobileLearningOpen = !mobileLearningOpen"
                >
                    <span>Learning</span>
                    <svg
                        class="h-4 w-4 transition-transform"
                        :class="mobileLearningOpen ? 'rotate-180' : ''"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div v-if="mobileLearningOpen" class="ml-4 space-y-1">
                    <Link
                        href="/major-sins/learn"
                        class="flex items-center gap-2.5 rounded-md px-3 py-2.5 text-sm transition"
                        :class="theme === 'dark'
                            ? 'text-gray-400 hover:bg-white/5 hover:text-white'
                            : 'text-gray-600 hover:bg-rose-50 hover:text-rose-700'"
                        @click="mobileOpen = false"
                    >
                        <span class="font-arabic text-base text-red-500">كبائر</span>
                        Major Sins
                    </Link>
                    <div
                        v-for="item in [
                            { arabic: 'حسنات الأبرار', label: 'Good Deeds — Abrar' },
                            { arabic: 'حسنات المقربين', label: 'Good Deeds — Muqarrabeen' },
                            { arabic: 'المنافقون', label: 'The Hypocrites' },
                        ]"
                        :key="item.arabic"
                        class="flex cursor-not-allowed items-center gap-2.5 rounded-md px-3 py-2.5 opacity-40"
                    >
                        <span class="font-arabic text-base text-amber-500">{{ item.arabic }}</span>
                        <span class="text-sm"
                            :class="theme === 'dark' ? 'text-gray-400' : 'text-gray-500'"
                        >{{ item.label }}</span>
                    </div>
                </div>

                <!-- Progress -->
                <Link
                    href="/progress"
                    class="flex rounded-md px-3 py-2.5 text-sm font-medium transition"
                    :class="theme === 'dark'
                        ? 'text-gray-300 hover:bg-white/5 hover:text-white'
                        : 'text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-800'"
                    @click="mobileOpen = false"
                >
                    Progress
                </Link>
            </div>
        </div>
    </nav>
</template>
