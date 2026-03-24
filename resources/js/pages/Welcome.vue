<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Kaffah - Quran Quiz">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link
            rel="preconnect"
            href="https://fonts.gstatic.com"
            crossorigin=""
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap"
            rel="stylesheet"
        />
    </Head>
    <div
        class="flex min-h-screen flex-col items-center justify-center bg-gray-50 p-6 dark:bg-gray-950"
    >
        <div class="max-w-lg text-center">
            <h1
                class="font-arabic mb-4 text-6xl font-bold text-emerald-600 dark:text-emerald-400"
                dir="rtl"
                lang="ar"
            >
                كافة
            </h1>
            <h2 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">
                Kaffah
            </h2>
            <p class="mb-2 text-lg text-gray-600 dark:text-gray-400">
                Understand. Love. Implement. Spread.
            </p>
            <p
                class="font-arabic mb-8 text-xl text-gray-500 dark:text-gray-500"
                dir="rtl"
                lang="ar"
            >
                ادْخُلُوا فِي السِّلْمِ كَافَّةً
            </p>

            <div class="mb-8 rounded-xl bg-white p-6 shadow-sm dark:bg-gray-800">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    A gamified quiz app to make the Quran the center of your
                    life. Test your knowledge of the last 10 surahs, track your
                    progress, and build consistent habits.
                </p>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row sm:justify-center">
                <Link
                    href="/surahs"
                    class="rounded-lg bg-emerald-600 px-8 py-3 font-semibold text-white shadow-sm transition hover:bg-emerald-700"
                >
                    Start Learning
                </Link>
            </div>

            <div class="mt-12 grid grid-cols-3 gap-6 text-center">
                <div>
                    <p
                        class="text-2xl font-bold text-emerald-600 dark:text-emerald-400"
                    >
                        10
                    </p>
                    <p class="text-sm text-gray-500">Surahs</p>
                </div>
                <div>
                    <p
                        class="text-2xl font-bold text-emerald-600 dark:text-emerald-400"
                    >
                        48
                    </p>
                    <p class="text-sm text-gray-500">Verses</p>
                </div>
                <div>
                    <p
                        class="text-2xl font-bold text-emerald-600 dark:text-emerald-400"
                    >
                        5
                    </p>
                    <p class="text-sm text-gray-500">Quiz Types</p>
                </div>
            </div>
        </div>
    </div>
</template>
