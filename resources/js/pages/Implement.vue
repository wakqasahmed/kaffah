<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import NavBar from '@/components/layout/NavBar.vue';

const features = [
    'All Quran quizzes — Surah by Surah (105–114)',
    'Major Sins quiz + full learning card library',
    'Personalised Quran-following % score',
    'Journey tracker: Islam → Iman → Ihsan → السابقون',
    'Community leaderboard (Masjid / family)',
    'Full access to all four group learning paths',
];

const monthlyPrice = 6.99;
const annualTotal = 50.28;
const annualMonthly = 4.19;
</script>

<template>
    <Head title="Implement — Your Path to Jannah al-Firdous | Amal" />

    <div class="min-h-screen bg-gray-950 text-white">
        <NavBar theme="dark" />

        <!-- ─── HERO ─── -->
        <section class="relative overflow-hidden">
            <div class="pointer-events-none absolute inset-0">
                <div class="absolute inset-0 bg-gradient-to-b from-amber-950/60 via-gray-950 to-gray-950"></div>
                <div class="absolute top-1/3 left-1/2 h-[600px] w-[600px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-gold-500/5 blur-3xl"></div>
            </div>

            <div class="relative z-10 px-6 py-20 text-center lg:py-28 lg:px-12">
                <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-gold-500/30 bg-gold-500/10 px-5 py-2 text-sm text-gold-400">
                    <span class="font-arabic text-base">حَيَّ عَلَىٰ خَيْرِ الْعَمَلِ</span>
                </div>

                <h1 class="mb-4 text-4xl font-bold text-white lg:text-5xl">
                    Your Path to<br />
                    <span class="text-amber-300">Jannah al-Firdous</span>
                </h1>
                <p class="mx-auto max-w-xl text-lg text-gray-400">
                    Structured Qur'anic guidance along the full spiritual ladder —
                    from Islam to Iman to Ihsan to
                    <span class="font-arabic text-amber-400">السَّابِقُونَ</span>
                </p>
            </div>
        </section>

        <!-- ─── PRICING CARDS ─── -->
        <section class="px-6 pb-16 lg:px-12">
            <div class="mx-auto grid max-w-2xl gap-5 sm:grid-cols-2">

                <!-- Monthly -->
                <div class="flex flex-col rounded-2xl border border-gray-700/50 bg-gray-900/60 p-8">
                    <div class="mb-6">
                        <p class="mb-1 text-sm font-semibold uppercase tracking-widest text-gray-500">Monthly</p>
                        <div class="flex items-end gap-1">
                            <span class="text-5xl font-bold text-white">${{ monthlyPrice }}</span>
                            <span class="mb-2 text-gray-500">/ month</span>
                        </div>
                        <p class="mt-1 text-xs text-gray-600">Billed monthly — cancel anytime</p>
                    </div>

                    <ul class="mb-8 flex-1 space-y-3">
                        <li
                            v-for="feature in features"
                            :key="feature"
                            class="flex items-start gap-2.5 text-sm text-gray-300"
                        >
                            <span class="mt-0.5 shrink-0 text-brand-500">✦</span>
                            <span>{{ feature }}</span>
                        </li>
                    </ul>

                    <div>
                        <button
                            disabled
                            class="w-full cursor-not-allowed rounded-xl border border-gray-700 bg-gray-800/60 px-4 py-3.5 text-sm font-semibold text-gray-500 opacity-60"
                        >
                            Subscribe Monthly
                        </button>
                        <p class="mt-2 text-center text-xs text-gray-700">Stripe integration — coming soon</p>
                    </div>
                </div>

                <!-- Annual — Best Value -->
                <div class="relative flex flex-col rounded-2xl border border-amber-500/40 bg-gradient-to-b from-amber-950/60 to-gray-900 p-8 shadow-2xl shadow-amber-900/20">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2">
                        <span class="rounded-full bg-gradient-to-r from-amber-500 to-gold-400 px-4 py-1 text-xs font-bold text-gray-950">
                            ✦ Best Value — 40% Off
                        </span>
                    </div>

                    <div class="mb-6 mt-2">
                        <p class="mb-1 text-sm font-semibold uppercase tracking-widest text-amber-600">Annual</p>
                        <div class="flex items-end gap-1">
                            <span class="text-5xl font-bold text-amber-200">${{ annualMonthly }}</span>
                            <span class="mb-2 text-amber-700">/ month</span>
                        </div>
                        <p class="mt-1 text-sm font-semibold text-amber-500">
                            ${{ annualTotal }} / year
                            <span class="ml-1 text-xs text-amber-700 line-through">${{ (monthlyPrice * 12).toFixed(2) }}</span>
                        </p>
                        <p class="mt-0.5 text-xs text-amber-800">Billed ${{ annualTotal }} annually — save 40%</p>
                    </div>

                    <ul class="mb-8 flex-1 space-y-3">
                        <li
                            v-for="feature in features"
                            :key="feature"
                            class="flex items-start gap-2.5 text-sm text-amber-100/80"
                        >
                            <span class="mt-0.5 shrink-0 text-amber-400">✦</span>
                            <span>{{ feature }}</span>
                        </li>
                    </ul>

                    <div>
                        <button
                            disabled
                            class="w-full cursor-not-allowed rounded-xl border border-amber-700/40 bg-amber-900/40 px-4 py-3.5 text-sm font-semibold text-amber-600 opacity-60"
                        >
                            Subscribe Annually
                        </button>
                        <p class="mt-2 text-center text-xs text-amber-900">Stripe integration — coming soon</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- ─── FREE TIER NOTE ─── -->
        <section class="border-t border-gray-900 px-6 py-12 text-center lg:px-12">
            <p class="mb-2 text-gray-500">Quizzes are always free — no account needed.</p>
            <Link
                href="/surahs"
                class="text-sm font-semibold text-brand-500 hover:text-brand-400 transition"
            >
                Take a free quiz →
            </Link>
        </section>

        <!-- ─── JOURNEY REMINDER ─── -->
        <section class="px-6 pb-16 text-center lg:px-12">
            <div class="mx-auto max-w-lg rounded-2xl border border-gray-800 bg-gray-900/40 px-8 py-8">
                <p class="font-arabic mb-3 text-2xl text-gold-400" lang="ar" dir="rtl">
                    وَالسَّابِقُونَ السَّابِقُونَ ۞ أُولَٰئِكَ الْمُقَرَّبُونَ
                </p>
                <p class="text-sm text-gray-500 italic">
                    "And the forerunners, the forerunners — those are the ones brought near to Allah."
                    <span class="block mt-1 text-gray-700">— Al-Waqi'ah 56:10–11</span>
                </p>
            </div>
        </section>

        <!-- ─── FOOTER NAV ─── -->
        <section class="border-t border-gray-900 px-6 py-8 text-center lg:px-12">
            <Link href="/" class="text-sm font-semibold text-gray-600 hover:text-gray-400 transition">
                ← Back to Home
            </Link>
        </section>
    </div>
</template>
