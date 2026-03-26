<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import NavBar from '@/components/layout/NavBar.vue';
import { useVerseRotation } from '@/composables/useVerseRotation';

const verses = [
    {
        arabic: 'إِنَّ الْمُنَافِقِينَ فِي الدَّرْكِ الْأَسْفَلِ مِنَ النَّارِ وَلَن تَجِدَ لَهُمْ نَصِيرًا',
        english: 'Indeed, the hypocrites will be in the lowest depths of the Fire — and never will you find for them a helper.',
        ref: 'An-Nisa 4:145',
    },
    {
        arabic: 'يُخَادِعُونَ اللَّهَ وَالَّذِينَ آمَنُوا وَمَا يَخْدَعُونَ إِلَّا أَنفُسَهُمْ',
        english: 'They deceive Allah and those who believe, but they deceive not except themselves, and they perceive it not.',
        ref: 'Al-Baqarah 2:9',
    },
    {
        arabic: 'فِي قُلُوبِهِم مَّرَضٌ فَزَادَهُمُ اللَّهُ مَرَضًا',
        english: 'In their hearts is a disease, and Allah has increased their disease.',
        ref: 'Al-Baqarah 2:10',
    },
    {
        arabic: 'إِنَّ الْمُنَافِقِينَ يُخَادِعُونَ اللَّهَ ۞ مُّذَبْذَبِينَ بَيْنَ ذَٰلِكَ لَا إِلَىٰ هَٰؤُلَاءِ وَلَا إِلَىٰ هَٰؤُلَاءِ',
        english: 'The hypocrites try to deceive Allah — wavering between this and that, belonging neither to the believers nor the disbelievers.',
        ref: 'An-Nisa 4:142-143',
    },
    {
        arabic: 'فَوَيْلٌ لِّلْمُصَلِّينَ ۞ الَّذِينَ هُمْ عَن صَلَاتِهِمْ سَاهُونَ ۞ الَّذِينَ هُمْ يُرَاءُونَ',
        english: 'So woe to those who pray but are heedless of their prayers — those who make show of their deeds.',
        ref: 'Al-Ma\'un 107:4-6',
    },
    {
        arabic: 'يَأْمُرُونَ بِالْمُنكَرِ وَيَنْهَوْنَ عَنِ الْمَعْرُوفِ',
        english: 'They enjoin what is wrong and forbid what is right.',
        ref: 'At-Tawbah 9:67',
    },
];

const traits = [
    { arabic: 'يُخَادِعُونَ اللَّهَ وَالَّذِينَ آمَنُوا', meaning: 'Deceive Allah and the believers', ref: '2:9' },
    { arabic: 'فِي قُلُوبِهِم مَّرَضٌ', meaning: 'Sickness deep in their hearts', ref: '2:10' },
    { arabic: 'مُذَبْذَبِينَ بَيْنَ ذَٰلِكَ', meaning: 'Waver between faith and disbelief', ref: '4:143' },
    { arabic: 'لَا يَذْكُرُونَ اللَّهَ إِلَّا قَلِيلًا', meaning: 'Remember Allah only a little', ref: '4:142' },
    { arabic: 'الَّذِينَ هُمْ يُرَاءُونَ', meaning: 'Show off their acts of worship', ref: '107:6' },
    { arabic: 'يَأْمُرُونَ بِالْمُنكَرِ', meaning: 'Enjoin evil and forbid good', ref: '9:67' },
];

const { currentVerse, transitioning, goTo } = useVerseRotation(verses);
</script>

<template>
    <Head title="Al-Darakil Asfal — The Lowest Depths | Amal" />

    <div class="min-h-screen bg-gray-950 text-white">
        <NavBar theme="dark" />

        <!-- ─── HERO ─── -->
        <section class="relative overflow-hidden">
            <div class="pointer-events-none absolute inset-0">
                <div class="absolute inset-0 bg-gradient-to-b from-gray-900/90 via-gray-950 to-gray-950"></div>
                <div class="absolute top-1/3 left-1/2 h-[500px] w-[500px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-red-900/10 blur-3xl"></div>
            </div>

            <div class="relative z-10 px-6 py-20 text-center lg:py-28 lg:px-12">
                <!-- Badge -->
                <div class="mb-8 inline-flex items-center gap-2 rounded-full border border-gray-700/50 bg-gray-800/50 px-5 py-2 text-sm text-gray-400">
                    <span class="font-arabic text-base">الدَّرْكُ الْأَسْفَلُ</span>
                    <span class="text-gray-600">·</span>
                    <span>Lowest Depth of Fire</span>
                </div>

                <!-- Rotating verse -->
                <div class="mx-auto mb-8 max-w-3xl">
                    <div
                        class="transition-opacity duration-400"
                        :class="transitioning ? 'opacity-0' : 'opacity-100'"
                    >
                        <p
                            class="font-arabic mb-4 text-3xl leading-relaxed text-gray-300 lg:text-4xl"
                            lang="ar"
                            dir="rtl"
                        >{{ verses[currentVerse].arabic }}</p>
                        <p class="mb-3 text-base text-gray-200/70 lg:text-lg italic">
                            "{{ verses[currentVerse].english }}"
                        </p>
                        <p class="text-sm font-semibold tracking-wider text-gray-500 uppercase">
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
                        :class="i === currentVerse ? 'w-6 bg-gray-400' : 'w-2 bg-gray-800 hover:bg-gray-600'"
                        @click="goTo(i)"
                        :aria-label="`Go to verse ${i + 1}`"
                    />
                </div>

                <!-- Title -->
                <h1 class="mb-3 text-4xl font-bold text-gray-300 lg:text-5xl">The Lowest Depths</h1>
                <p class="mx-auto max-w-xl text-lg text-gray-400/70">
                    The most severe warning — النفاق, hypocrisy, the deepest pit of the Fire.
                </p>
            </div>
        </section>

        <!-- ─── 3 CTAs ─── -->
        <section class="px-6 py-12 lg:px-12">
            <div class="mx-auto grid max-w-5xl gap-5 sm:grid-cols-3">
                <!-- CTA 1: Traits -->
                <a
                    href="#traits"
                    class="group flex flex-col items-center rounded-2xl border border-gray-700/40 bg-gradient-to-b from-gray-900/60 to-gray-950 p-6 text-center transition hover:border-gray-600/60 hover:from-gray-800/60"
                >
                    <span class="mb-3 text-3xl">☠</span>
                    <h3 class="mb-2 text-base font-bold text-gray-300">Recognise the Signs</h3>
                    <p class="text-sm text-gray-600">Learn the Quranic traits of the hypocrites</p>
                    <span class="mt-4 text-xs font-semibold text-gray-500 group-hover:text-gray-400">Scroll down ↓</span>
                </a>

                <!-- CTA 2: Quiz — coming soon -->
                <div class="flex flex-col items-center rounded-2xl border border-gray-800 bg-gray-900/40 p-6 text-center opacity-50 cursor-not-allowed">
                    <span class="mb-3 text-3xl">⚖</span>
                    <h3 class="mb-2 text-base font-bold text-gray-400">Measure Where I Stand</h3>
                    <p class="text-sm text-gray-600">Nifaq awareness quiz — assess your sincerity</p>
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
                    <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-gray-700/30 bg-gray-900/60 px-4 py-1.5 text-xs font-semibold uppercase tracking-widest text-gray-500">
                        Quranic Warning Signs
                    </div>
                    <h2 class="mb-3 text-3xl font-bold text-gray-300">Signs of النفاق to Recognise</h2>
                    <p class="text-gray-500">These are the traits Allah explicitly describes — purify yourself from every one of them</p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <div
                        v-for="trait in traits"
                        :key="trait.arabic"
                        class="rounded-2xl border border-gray-800/60 bg-gradient-to-b from-gray-900/60 to-gray-950 p-5"
                    >
                        <p class="font-arabic mb-2 text-xl leading-relaxed text-gray-400" lang="ar" dir="rtl">
                            {{ trait.arabic }}
                        </p>
                        <p class="mb-2 text-sm font-medium text-gray-300">{{ trait.meaning }}</p>
                        <p class="text-xs font-semibold text-gray-600">Quran {{ trait.ref }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── FOOTER CTA ─── -->
        <section class="border-t border-gray-900 px-6 py-12 text-center lg:px-12">
            <p class="mb-4 text-gray-600">Continue exploring the four groups</p>
            <Link href="/" class="text-sm font-semibold text-gray-500 hover:text-gray-400 transition">
                ← Back to Home
            </Link>
        </section>
    </div>
</template>
