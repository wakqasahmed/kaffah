<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import NavBar from '@/components/layout/NavBar.vue';
import VerseHero from '@/components/layout/VerseHero.vue';

const verses = [
    {
        arabic: 'فَأَصْحَابُ الْيَمِينِ مَا أَصْحَابُ الْيَمِينِ',
        english: 'Then the companions of the right — what are the companions of the right?',
        ref: "Al-Waqi'ah 56:27",
    },
    {
        arabic: 'قَدْ أَفْلَحَ الْمُؤْمِنُونَ ۞ الَّذِينَ هُمْ فِي صَلَاتِهِمْ خَاشِعُونَ',
        english: 'Certainly will the believers have succeeded — those who are humble in their prayers.',
        ref: "Al-Mu'minun 23:1-2",
    },
    {
        arabic: 'قُوا أَنفُسَكُمْ وَأَهْلِيكُمْ نَارًا وَقُودُهَا النَّاسُ وَالْحِجَارَةُ',
        english: 'Protect yourselves and your families from a Fire whose fuel is people and stones.',
        ref: 'At-Tahrim 66:6',
    },
    {
        arabic: 'إِنَّ الَّذِينَ آمَنُوا وَعَمِلُوا الصَّالِحَاتِ أُولَٰئِكَ هُمْ خَيْرُ الْبَرِيَّةِ',
        english: 'Indeed, those who have believed and done righteous deeds — they are the best of creatures.',
        ref: 'Al-Bayyinah 98:7',
    },
    {
        arabic: 'إِلَّا الَّذِينَ آمَنُوا وَعَمِلُوا الصَّالِحَاتِ وَتَوَاصَوْا بِالْحَقِّ وَتَوَاصَوْا بِالصَّبْرِ',
        english: 'Except for those who have believed, done righteous deeds, enjoined truth, and enjoined patience.',
        ref: 'Al-Asr 103:3',
    },
    {
        arabic: 'وَالَّذِينَ آمَنُوا وَعَمِلُوا الصَّالِحَاتِ أُولَٰئِكَ أَصْحَابُ الْجَنَّةِ ۖ هُمْ فِيهَا خَالِدُونَ',
        english: 'And those who believe and do righteous deeds — they are the companions of Paradise; they will abide therein eternally.',
        ref: 'Al-Baqarah 2:82',
    },
];

const traits = [
    { arabic: 'آمَنُوا وَعَمِلُوا الصَّالِحَاتِ', meaning: 'Believe and do righteous deeds', ref: 'multiple' },
    { arabic: 'خَاشِعُونَ فِي صَلَاتِهِمْ', meaning: 'Humble in their prayers', ref: '23:2' },
    { arabic: 'يَجْتَنِبُونَ كَبَائِرَ الْإِثْمِ', meaning: 'Avoid major sins', ref: '42:37' },
    { arabic: 'قُوا أَنفُسَكُمْ وَأَهْلِيكُمْ', meaning: 'Protect themselves and their families', ref: '66:6' },
    { arabic: 'تَوَاصَوْا بِالْحَقِّ وَالصَّبْرِ', meaning: 'Enjoin truth and patience upon one another', ref: '103:3' },
    { arabic: 'تَزَكَّى', meaning: 'Purify themselves', ref: '87:14' },
];


</script>

<template>
    <Head title="Ashāb al-Yameen — People of the Right | Amal" />

    <div class="min-h-screen bg-gray-950 text-white">
        <NavBar theme="dark" />

        <!-- ─── HERO ─── -->
        <VerseHero
            :verses="verses"
            theme="emerald"
            badge-arabic="أَصْحَابُ الْيَمِينِ"
            badge-label="Standard Jannah"
            title="People of the Right"
            subtitle="The successful believers — those who fulfil the covenant of faith and righteous deeds."
        />

        <!-- ─── 3 CTAs ─── -->
        <section class="px-6 py-12 lg:px-12">
            <div class="mx-auto grid max-w-5xl gap-5 sm:grid-cols-3">
                <!-- CTA 1: Traits -->
                <a
                    href="#traits"
                    class="group flex flex-col items-center rounded-2xl border border-emerald-700/40 bg-gradient-to-b from-emerald-950/60 to-gray-950 p-6 text-center transition hover:border-emerald-500/60 hover:from-emerald-900/60"
                >
                    <span class="mb-3 text-3xl">✓</span>
                    <h3 class="mb-2 text-base font-bold text-emerald-200">Explore Their Traits</h3>
                    <p class="text-sm text-emerald-700">Discover the Quranic qualities of the People of the Right</p>
                    <span class="mt-4 text-xs font-semibold text-emerald-500 group-hover:text-emerald-400">Scroll down ↓</span>
                </a>

                <!-- CTA 2: Quiz -->
                <Link
                    href="/surahs"
                    class="group flex flex-col items-center rounded-2xl border border-emerald-700/40 bg-gradient-to-b from-emerald-950/60 to-gray-950 p-6 text-center transition hover:border-emerald-500/60 hover:from-emerald-900/60"
                >
                    <span class="mb-3 text-3xl">⚖</span>
                    <h3 class="mb-2 text-base font-bold text-emerald-200">Measure Where I Stand</h3>
                    <p class="text-sm text-emerald-700">Take the Quran quiz to test your knowledge of the Surahs</p>
                    <span class="mt-4 text-xs font-semibold text-emerald-500 group-hover:text-emerald-400">Start Quiz →</span>
                </Link>

                <!-- CTA 3: Track — coming soon -->
                <div class="flex flex-col items-center rounded-2xl border border-gray-800 bg-gray-900/40 p-6 text-center opacity-50 cursor-not-allowed">
                    <span class="mb-3 text-3xl">📈</span>
                    <h3 class="mb-2 text-base font-bold text-gray-400">Track My Journey</h3>
                    <p class="text-sm text-gray-600">Build habits and track your growth over time</p>
                    <span class="mt-4 text-xs font-semibold text-gray-600">Coming Soon</span>
                </div>
            </div>
        </section>

        <!-- ─── TRAITS ─── -->
        <section id="traits" class="scroll-mt-20 px-6 pb-20 lg:px-12">
            <div class="mx-auto max-w-5xl">
                <div class="mb-10 text-center">
                    <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-emerald-700/30 bg-emerald-900/20 px-4 py-1.5 text-xs font-semibold uppercase tracking-widest text-emerald-500">
                        Quranic Traits
                    </div>
                    <h2 class="mb-3 text-3xl font-bold text-emerald-200">Qualities of the People of the Right</h2>
                    <p class="text-gray-400">These are the attributes Allah describes of the successful believers</p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <div
                        v-for="trait in traits"
                        :key="trait.arabic"
                        class="rounded-2xl border border-emerald-800/30 bg-gradient-to-b from-emerald-950/40 to-gray-950 p-5"
                    >
                        <p class="font-arabic mb-2 text-xl leading-relaxed text-emerald-300" lang="ar" dir="rtl">
                            {{ trait.arabic }}
                        </p>
                        <p class="mb-2 text-sm font-medium text-emerald-100">{{ trait.meaning }}</p>
                        <p class="text-xs font-semibold text-emerald-600">Quran {{ trait.ref }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── FOOTER CTA ─── -->
        <section class="border-t border-gray-900 px-6 py-12 text-center lg:px-12">
            <p class="mb-4 text-gray-500">Continue exploring the four groups</p>
            <Link href="/" class="text-sm font-semibold text-emerald-500 hover:text-emerald-400 transition">
                ← Back to Home
            </Link>
        </section>
    </div>
</template>
