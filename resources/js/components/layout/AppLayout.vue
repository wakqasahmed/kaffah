<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-950">
        <nav
            class="border-b border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-gray-900"
        >
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center gap-8">
                        <Link
                            href="/"
                            class="text-xl font-bold text-emerald-600 dark:text-emerald-400"
                        >
                            <span class="font-arabic text-2xl">كافة</span>
                            <span class="ml-2 text-sm font-normal text-gray-500"
                                >Kaffah</span
                            >
                        </Link>
                        <div class="hidden gap-6 sm:flex">
                            <Link
                                href="/surahs"
                                class="text-sm font-medium text-gray-600 transition hover:text-emerald-600 dark:text-gray-300"
                            >
                                Quiz by Surah
                            </Link>
                            <Link
                                href="/major-sins"
                                class="text-sm font-medium text-gray-600 transition hover:text-red-600 dark:text-gray-300"
                            >
                                Major Sins Quiz
                            </Link>
                            <Link
                                href="/progress"
                                class="text-sm font-medium text-gray-600 transition hover:text-emerald-600 dark:text-gray-300"
                            >
                                Progress
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <slot />
        </main>
    </div>
</template>
