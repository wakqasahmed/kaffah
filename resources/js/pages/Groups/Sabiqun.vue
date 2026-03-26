<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import NavBar from '@/components/layout/NavBar.vue';
import { useVerseRotation } from '@/composables/useVerseRotation';

const verses = [
    {
        arabic: 'سَابِقُوا إِلَىٰ مَغْفِرَةٍ مِّن رَّبِّكُمْ وَجَنَّةٍ عَرْضُهَا كَعَرْضِ السَّمَاءِ وَالْأَرْضِ',
        english: 'Race toward forgiveness from your Lord and a Garden whose width is like the width of the heavens and earth.',
        ref: 'Al-Hadid 57:21',
    },
    {
        arabic: 'وَسَارِعُوا إِلَىٰ مَغْفِرَةٍ مِّن رَّبِّكُمْ وَجَنَّةٍ عَرْضُهَا السَّمَاوَاتُ وَالْأَرْضُ أُعِدَّتْ لِلْمُتَّقِينَ',
        english: 'And hasten to forgiveness from your Lord and a garden as wide as the heavens and earth, prepared for the righteous.',
        ref: 'Aal-Imran 3:133',
    },
    {
        arabic: 'يُؤْمِنُونَ بِاللَّهِ وَالْيَوْمِ الْآخِرِ وَيَأْمُرُونَ بِالْمَعْرُوفِ وَيَنْهَوْنَ عَنِ الْمُنكَرِ وَيُسَارِعُونَ فِي الْخَيْرَاتِ',
        english: 'They believe in Allah and the Last Day, enjoin what is right, forbid what is wrong, and hasten to good deeds.',
        ref: 'Aal-Imran 3:114',
    },
    {
        arabic: 'فَاسْتَبِقُوا الْخَيْرَاتِ ۚ أَيْنَ مَا تَكُونُوا يَأْتِ بِكُمُ اللَّهُ جَمِيعًا',
        english: 'So race to all that is good. Wherever you may be, Allah will bring you forth all together.',
        ref: 'Al-Baqarah 2:148',
    },
    {
        arabic: 'أُولَٰئِكَ يُسَارِعُونَ فِي الْخَيْرَاتِ وَهُمْ لَهَا سَابِقُونَ',
        english: 'It is those who hasten to good deeds, and they outstrip others therein.',
        ref: "Al-Mu'minun 23:61",
    },
    {
        arabic: 'وَالسَّابِقُونَ السَّابِقُونَ ۞ أُولَٰئِكَ الْمُقَرَّبُونَ',
        english: 'And the forerunners, the forerunners — those are the ones brought near to Allah.',
        ref: "Al-Waqi'ah 56:10-11",
    },
    {
        arabic: 'إِنَّهُمْ كَانُوا يُسَارِعُونَ فِي الْخَيْرَاتِ وَيَدْعُونَنَا رَغَبًا وَرَهَبًا',
        english: 'Indeed, they used to hasten to good deeds and supplicate Us in hope and fear.',
        ref: "Al-Anbiya' 21:90",
    },
    {
        arabic: 'فَاسْتَبِقُوا الْخَيْرَاتِ ۚ إِلَى اللَّهِ مَرْجِعُكُمْ جَمِيعًا',
        english: 'So race to all that is good. To Allah is your return all together.',
        ref: "Al-Ma'idah 5:48",
    },
];

const traits = [
    { arabic: 'يُسَارِعُونَ فِي الْخَيْرَاتِ', meaning: 'Hasten to good deeds', ref: '23:61' },
    { arabic: 'وَهُمْ لَهَا سَابِقُونَ', meaning: 'They are foremost in them', ref: '23:61' },
    { arabic: 'يَدْعُونَنَا رَغَبًا وَرَهَبًا', meaning: 'Supplicate in hope and fear', ref: '21:90' },
    { arabic: 'ثُمَّ اسْتَقَامُوا', meaning: 'Remained steadfast', ref: '46:13' },
    { arabic: 'لَا يَخَافُونَ لَوْمَةَ لَائِمٍ', meaning: 'Fear no blame in doing right', ref: '5:54' },
    { arabic: 'يُؤْمِنُونَ بِاللَّهِ وَالْيَوْمِ الْآخِرِ', meaning: 'Believe in Allah and the Last Day, and act', ref: '3:114' },
];

const { currentVerse, transitioning, goTo } = useVerseRotation(verses);
</script>

<template>
    <Head title="As-Sābiqūn — The Forerunners | Amal" />

    <div class="min-h-screen bg-gray-950 text-white">
        <NavBar theme="dark" />

        <!-- ─── HERO ─── -->
        <section class="relative overflow-hidden">
            <div class="pointer-events-none absolute inset-0">
                <div class="absolute inset-0 bg-gradient-to-b from-amber-950/80 via-gray-950 to-gray-950"></div>
                <div class="absolute top-1/3 left-1/2 h-[500px] w-[500px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-amber-500/8 blur-3xl"></div>
            </div>

            <div class="relative z-10 px-6 py-20 text-center lg:py-28 lg:px-12">
                <!-- Badge -->
                <div class="mb-8 inline-flex items-center gap-2 rounded-full border border-amber-500/30 bg-amber-500/10 px-5 py-2 text-sm text-amber-400">
                    <span class="font-arabic text-base">السَّابِقُونَ الْمُقَرَّبُونَ</span>
                    <span class="text-amber-600">·</span>
                    <span>Highest Rank</span>
                </div>

                <!-- Rotating verse -->
                <div class="mx-auto mb-8 max-w-3xl">
                    <div
                        class="transition-opacity duration-400"
                        :class="transitioning ? 'opacity-0' : 'opacity-100'"
                    >
                        <p
                            class="font-arabic mb-4 text-3xl leading-relaxed text-amber-200 lg:text-4xl"
                            lang="ar"
                            dir="rtl"
                        >{{ verses[currentVerse].arabic }}</p>
                        <p class="mb-3 text-base text-amber-100/80 lg:text-lg italic">
                            "{{ verses[currentVerse].english }}"
                        </p>
                        <p class="text-sm font-semibold tracking-wider text-amber-500 uppercase">
                            — {{ verses[currentVerse].ref }}
                        </p>
                    </div>
                </div>

                <!-- Dots -->
                <div class="mb-10 flex justify-center gap-2">
                    <button
                        v-for="(_, i) in verses"
                        :key="i"
                        class="h-2 rounded-full transition-all"
                        :class="i === currentVerse ? 'w-6 bg-amber-400' : 'w-2 bg-amber-800 hover:bg-amber-600'"
                        @click="goTo(i)"
                        :aria-label="`Go to verse ${i + 1}`"
                    />
                </div>

                <!-- Title -->
                <h1 class="mb-3 text-4xl font-bold text-amber-200 lg:text-5xl">The Forerunners</h1>
                <p class="mx-auto max-w-xl text-lg text-amber-300/70">
                    Those who race ahead in obedience — the closest to Allah on the Day of Rising.
                </p>
            </div>
        </section>

        <!-- ─── 3 CTAs ─── -->
        <section class="px-6 py-12 lg:px-12">
            <div class="mx-auto grid max-w-5xl gap-5 sm:grid-cols-3">
                <!-- CTA 1: Traits -->
                <a
                    href="#traits"
                    class="group flex flex-col items-center rounded-2xl border border-amber-700/40 bg-gradient-to-b from-amber-950/60 to-gray-950 p-6 text-center transition hover:border-amber-500/60 hover:from-amber-900/60"
                >
                    <span class="mb-3 text-3xl">★</span>
                    <h3 class="mb-2 text-base font-bold text-amber-200">Explore Their Traits</h3>
                    <p class="text-sm text-amber-700">Discover the Quranic qualities of the Forerunners</p>
                    <span class="mt-4 text-xs font-semibold text-amber-500 group-hover:text-amber-400">Scroll down ↓</span>
                </a>

                <!-- CTA 2: Quiz — coming soon -->
                <div class="flex flex-col items-center rounded-2xl border border-gray-800 bg-gray-900/40 p-6 text-center opacity-50 cursor-not-allowed">
                    <span class="mb-3 text-3xl">⚖</span>
                    <h3 class="mb-2 text-base font-bold text-gray-400">Measure Where I Stand</h3>
                    <p class="text-sm text-gray-600">Self-assessment quiz for the Sabiqun traits</p>
                    <span class="mt-4 text-xs font-semibold text-gray-600">Coming Soon</span>
                </div>

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
                    <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-amber-700/30 bg-amber-900/20 px-4 py-1.5 text-xs font-semibold uppercase tracking-widest text-amber-500">
                        Quranic Traits
                    </div>
                    <h2 class="mb-3 text-3xl font-bold text-amber-200">Qualities of the Forerunners</h2>
                    <p class="text-gray-400">These are the attributes Allah describes of those who race ahead in الخير</p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <div
                        v-for="trait in traits"
                        :key="trait.arabic"
                        class="rounded-2xl border border-amber-800/30 bg-gradient-to-b from-amber-950/40 to-gray-950 p-5"
                    >
                        <p class="font-arabic mb-2 text-xl leading-relaxed text-amber-300" lang="ar" dir="rtl">
                            {{ trait.arabic }}
                        </p>
                        <p class="mb-2 text-sm font-medium text-amber-100">{{ trait.meaning }}</p>
                        <p class="text-xs font-semibold text-amber-600">Quran {{ trait.ref }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── FOOTER CTA ─── -->
        <section class="border-t border-gray-900 px-6 py-12 text-center lg:px-12">
            <p class="mb-4 text-gray-500">Continue exploring the four groups</p>
            <Link href="/" class="text-sm font-semibold text-amber-500 hover:text-amber-400 transition">
                ← Back to Home
            </Link>
        </section>
    </div>
</template>
