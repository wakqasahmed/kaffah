<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

defineProps<{
    theme?: 'light' | 'dark';
}>();
</script>

<template>
    <nav
        class="border-b"
        :class="theme === 'dark'
            ? 'border-white/10'
            : 'border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-gray-900'"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center gap-8">
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

                <!-- Nav links -->
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
                            class="invisible absolute left-0 top-full z-50 w-56 translate-y-1 rounded-lg border py-1 shadow-lg transition-all group-hover:visible group-hover:translate-y-0 group-hover:opacity-100 opacity-0"
                            :class="theme === 'dark'
                                ? 'border-white/10 bg-gray-900'
                                : 'border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800'"
                        >
                            <!-- Major Sins — active -->
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

                            <!-- Divider -->
                            <div
                                class="my-1 border-t"
                                :class="theme === 'dark' ? 'border-white/10' : 'border-gray-100 dark:border-gray-700'"
                            />

                            <!-- Coming soon items -->
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
            </div>
        </div>
    </nav>
</template>
