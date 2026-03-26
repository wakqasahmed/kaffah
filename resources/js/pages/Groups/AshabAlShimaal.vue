<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import NavBar from '@/components/layout/NavBar.vue';
import { useVerseRotation } from '@/composables/useVerseRotation';

const verses = [
    {
        arabic: 'وَأَصْحَابُ الشِّمَالِ مَا أَصْحَابُ الشِّمَالِ ۞ فِي سَمُومٍ وَحَمِيمٍ',
        english: 'And the companions of the left — what are the companions of the left? In scorching wind and boiling water.',
        ref: "Al-Waqi'ah 56:41-42",
    },
    {
        arabic: 'إِنَّهُمْ كَانُوا قَبْلَ ذَٰلِكَ مُتْرَفِينَ ۞ وَكَانُوا يُصِرُّونَ عَلَى الْحِنثِ الْعَظِيمِ',
        english: 'Indeed, before that they were living in ease and luxury, and they persisted in the great violation.',
        ref: "Al-Waqi'ah 56:45-46",
    },
    {
        arabic: 'إِنَّ الَّذِينَ كَفَرُوا وَظَلَمُوا لَمْ يَكُنِ اللَّهُ لِيَغْفِرَ لَهُمْ',
        english: 'Indeed, those who disbelieved and committed wrong — Allah would never forgive them.',
        ref: 'An-Nisa 4:168',
    },
    {
        arabic: 'وَيْلٌ يَوْمَئِذٍ لِّلْمُكَذِّبِينَ ۞ الَّذِينَ يُكَذِّبُونَ بِيَوْمِ الدِّينِ',
        english: 'Woe that Day to the deniers — who deny the Day of Recompense.',
        ref: 'Al-Mutaffifin 83:10-11',
    },
    {
        arabic: 'بَلَىٰ مَن كَسَبَ سَيِّئَةً وَأَحَاطَتْ بِهِ خَطِيئَتُهُ فَأُولَٰئِكَ أَصْحَابُ النَّارِ',
        english: 'But yes — whoever commits evil and his sin surrounds him, those are the companions of the Fire.',
        ref: 'Al-Baqarah 2:81',
    },
    {
        arabic: 'أَرَأَيْتَ مَنِ اتَّخَذَ إِلَٰهَهُ هَوَاهُ أَفَأَنتَ تَكُونُ عَلَيْهِ وَكِيلًا',
        english: 'Have you seen the one who takes his own desire as his god? Would you then be a guardian over him?',
        ref: 'Al-Furqan 25:43',
    },
];

const traits = [
    { arabic: 'كَانُوا مُتْرَفِينَ', meaning: 'Lived in excess and heedlessness', ref: '56:45' },
    { arabic: 'يُصِرُّونَ عَلَى الْحِنثِ الْعَظِيمِ', meaning: 'Persisted in grave sin without repentance', ref: '56:46' },
    { arabic: 'يُكَذِّبُونَ بِيَوْمِ الدِّينِ', meaning: 'Denied the Day of Judgment', ref: '83:11' },
    { arabic: 'كَفَرُوا وَظَلَمُوا', meaning: 'Disbelieved and were unjust', ref: '4:168' },
    { arabic: 'اتَّخَذَ إِلَٰهَهُ هَوَاهُ', meaning: 'Took their desires as their god', ref: '25:43' },
    { arabic: 'لَا يَنتَهُونَ عَن مُّنكَرٍ', meaning: 'Did not forbid evil among themselves', ref: '5:79' },
];

const { currentVerse, transitioning, goTo } = useVerseRotation(verses);
</script>

<template>
    <Head title="Ashāb ash-Shimāl — People of the Left | Amal" />

    <div class="min-h-screen bg-gray-950 text-white">
        <NavBar theme="dark" />

        <!-- ─── HERO ─── -->
        <section class="relative overflow-hidden">
            <div class="pointer-events-none absolute inset-0">
                <div class="absolute inset-0 bg-gradient-to-b from-red-950/80 via-gray-950 to-gray-950"></div>
                <div class="absolute top-1/3 left-1/2 h-[500px] w-[500px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-red-500/6 blur-3xl"></div>
            </div>

            <div class="relative z-10 px-6 py-20 text-center lg:py-28 lg:px-12">
                <!-- Badge -->
                <div class="mb-8 inline-flex items-center gap-2 rounded-full border border-red-500/30 bg-red-500/10 px-5 py-2 text-sm text-red-400">
                    <span class="font-arabic text-base">أَصْحَابُ الشِّمَالِ</span>
                    <span class="text-red-600">·</span>
                    <span>⚠ Warning</span>
                </div>

                <!-- Rotating verse -->
                <div class="mx-auto mb-8 max-w-3xl">
                    <div
                        class="transition-opacity duration-400"
                        :class="transitioning ? 'opacity-0' : 'opacity-100'"
                    >
                        <p
                            class="font-arabic mb-4 text-3xl leading-relaxed text-orange-200 lg:text-4xl"
                            lang="ar"
                            dir="rtl"
                        >{{ verses[currentVerse].arabic }}</p>
                        <p class="mb-3 text-base text-orange-100/80 lg:text-lg italic">
                            "{{ verses[currentVerse].english }}"
                        </p>
                        <p class="text-sm font-semibold tracking-wider text-red-500 uppercase">
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
                        :class="i === currentVerse ? 'w-6 bg-red-400' : 'w-2 bg-red-900 hover:bg-red-700'"
                        @click="goTo(i)"
                        :aria-label="`Go to verse ${i + 1}`"
                    />
                </div>

                <!-- Title -->
                <h1 class="mb-3 text-4xl font-bold text-orange-200 lg:text-5xl">People of the Left</h1>
                <p class="mx-auto max-w-xl text-lg text-orange-300/70">
                    A grave warning — those who persist in sin, denial, and heedlessness.
                </p>
            </div>
        </section>

        <!-- ─── 3 CTAs ─── -->
        <section class="px-6 py-12 lg:px-12">
            <div class="mx-auto grid max-w-5xl gap-5 sm:grid-cols-3">
                <!-- CTA 1: Traits -->
                <a
                    href="#traits"
                    class="group flex flex-col items-center rounded-2xl border border-red-800/40 bg-gradient-to-b from-red-950/60 to-gray-950 p-6 text-center transition hover:border-red-600/60 hover:from-red-900/60"
                >
                    <span class="mb-3 text-3xl">✗</span>
                    <h3 class="mb-2 text-base font-bold text-orange-200">Understand What to Avoid</h3>
                    <p class="text-sm text-red-700">Learn the Quranic traits of the People of the Left</p>
                    <span class="mt-4 text-xs font-semibold text-red-500 group-hover:text-red-400">Scroll down ↓</span>
                </a>

                <!-- CTA 2: Quiz -->
                <Link
                    href="/major-sins"
                    class="group flex flex-col items-center rounded-2xl border border-red-800/40 bg-gradient-to-b from-red-950/60 to-gray-950 p-6 text-center transition hover:border-red-600/60 hover:from-red-900/60"
                >
                    <span class="mb-3 text-3xl">⚖</span>
                    <h3 class="mb-2 text-base font-bold text-orange-200">Measure Where I Stand</h3>
                    <p class="text-sm text-red-700">Take the Major Sins quiz — know what the Quran warns against</p>
                    <span class="mt-4 text-xs font-semibold text-red-500 group-hover:text-red-400">Major Sins Quiz →</span>
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
                    <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-red-800/30 bg-red-900/20 px-4 py-1.5 text-xs font-semibold uppercase tracking-widest text-red-500">
                        Quranic Warning Signs
                    </div>
                    <h2 class="mb-3 text-3xl font-bold text-orange-200">Traits to Avoid</h2>
                    <p class="text-gray-400">These are the characteristics Allah warns against — recognise and flee from them</p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <div
                        v-for="trait in traits"
                        :key="trait.arabic"
                        class="rounded-2xl border border-red-900/30 bg-gradient-to-b from-red-950/30 to-gray-950 p-5"
                    >
                        <p class="font-arabic mb-2 text-xl leading-relaxed text-orange-400" lang="ar" dir="rtl">
                            {{ trait.arabic }}
                        </p>
                        <p class="mb-2 text-sm font-medium text-orange-100">{{ trait.meaning }}</p>
                        <p class="text-xs font-semibold text-red-600">Quran {{ trait.ref }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── FOOTER CTA ─── -->
        <section class="border-t border-gray-900 px-6 py-12 text-center lg:px-12">
            <p class="mb-4 text-gray-500">Continue exploring the four groups</p>
            <Link href="/" class="text-sm font-semibold text-red-500 hover:text-red-400 transition">
                ← Back to Home
            </Link>
        </section>
    </div>
</template>
