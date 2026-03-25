<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue';
import NavBar from '@/components/layout/NavBar.vue';

const isStartingMajorSins = ref(false);

function startMajorSinsQuiz() {
    isStartingMajorSins.value = true;
    router.visit('/major-sins');
}

/* ─── Rotating hero verses ─── */
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

const currentVerse = ref(0);
let interval: ReturnType<typeof setInterval>;
const transitioning = ref(false);

function nextVerse() {
    transitioning.value = true;
    setTimeout(() => {
        currentVerse.value = (currentVerse.value + 1) % verses.length;
        transitioning.value = false;
    }, 400);
}

onMounted(() => {
    interval = setInterval(nextVerse, 7000);
});

onUnmounted(() => {
    clearInterval(interval);
});
</script>

<template>
    <Head title="Amal — Hasten to the Best of Deeds">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
        <link
            href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap"
            rel="stylesheet"
        />
    </Head>

    <div class="min-h-screen bg-gray-950 text-white">

        <!-- ─── NAV ─── -->
        <NavBar theme="dark" />

        <!-- ─── HERO with rotating verses ─── -->
        <section class="relative overflow-hidden">
            <!-- Warm gradient background -->
            <div class="pointer-events-none absolute inset-0">
                <div class="absolute inset-0 bg-gradient-to-b from-brand-950/80 via-gray-950 to-gray-950"></div>
                <div class="absolute top-1/3 left-1/2 h-[500px] w-[500px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-gold-500/5 blur-3xl"></div>
            </div>

            <div class="relative z-10 px-6 py-20 text-center lg:py-28 lg:px-12">
                <!-- Slogan badge -->
                <div class="mb-8 inline-flex items-center gap-2 rounded-full border border-gold-500/30 bg-gold-500/10 px-5 py-2 text-sm text-gold-400">
                    <span class="font-arabic text-base">حَيَّ عَلَىٰ خَيْرِ الْعَمَلِ</span>
                </div>

                <!-- Rotating verse -->
                <div class="mx-auto mb-10 min-h-[200px] max-w-4xl">
                    <transition name="fade" mode="out-in">
                        <div :key="currentVerse" class="transition-opacity duration-400" :class="transitioning ? 'opacity-0' : 'opacity-100'">
                            <p
                                class="font-arabic mb-4 text-3xl leading-relaxed font-bold text-gold-300 drop-shadow-lg sm:text-4xl lg:text-5xl"
                                dir="rtl"
                                lang="ar"
                            >
                                {{ verses[currentVerse].arabic }}
                            </p>
                            <p class="mb-2 text-lg text-brand-200/80 italic">
                                "{{ verses[currentVerse].english }}"
                            </p>
                            <p class="text-sm text-gold-600">
                                — {{ verses[currentVerse].ref }}
                            </p>
                        </div>
                    </transition>
                </div>

                <!-- Verse dots -->
                <div class="mb-10 flex items-center justify-center gap-2">
                    <button
                        v-for="(_, i) in verses"
                        :key="i"
                        class="h-2 rounded-full transition-all duration-300"
                        :class="i === currentVerse ? 'w-6 bg-gold-400' : 'w-2 bg-gray-700 hover:bg-gray-600'"
                        @click="currentVerse = i"
                        :aria-label="'Verse ' + (i + 1)"
                    />
                </div>

                <h1 class="mb-4 text-4xl font-bold tracking-tight text-white sm:text-5xl">
                    Race to Good Deeds
                </h1>
                <p class="mx-auto mb-10 max-w-2xl text-lg text-gray-400">
                    Learn what the Quran commands, avoid what it forbids, and track your journey toward Jannah.
                </p>

                <!-- Two path buttons -->
                <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
                    <Link
                        href="/surahs"
                        class="inline-flex items-center gap-2 rounded-xl bg-brand-600 px-8 py-3.5 font-semibold text-white shadow-lg shadow-brand-900/50 transition hover:bg-brand-500"
                    >
                        Take Quran Quiz
                    </Link>
                    <Link
                        href="/major-sins"
                        class="inline-flex items-center gap-2 rounded-xl border border-danger-700/50 bg-danger-950/60 px-8 py-3.5 font-semibold text-danger-300 shadow-lg transition hover:bg-danger-900/60"
                    >
                        Test on Major Sins
                    </Link>
                </div>
            </div>
        </section>

        <!-- ─── TWO-CAMP BANNER ─── -->
        <section class="px-6 pb-6 lg:px-12">
            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                <div class="rounded-xl border border-brand-700/40 bg-gradient-to-r from-brand-950 to-brand-900/60 p-5 text-center">
                    <p class="font-arabic mb-1 text-2xl text-brand-400" lang="ar" dir="rtl">حِزْبُ اللَّهِ</p>
                    <p class="font-semibold text-brand-300">Hizb Allah — Party of Allah</p>
                    <p class="mt-1 text-xs text-brand-400">أُولَٰئِكَ حِزْبُ اللَّهِ ۚ أَلَا إِنَّ حِزْبَ اللَّهِ هُمُ الْمُفْلِحُونَ</p>
                    <p class="mt-1 text-xs text-brand-500 italic">"Indeed it is the party of Allah who are the successful" — 58:22</p>
                </div>
                <div class="rounded-xl border border-danger-800/40 bg-gradient-to-r from-danger-950 to-danger-900/60 p-5 text-center">
                    <p class="font-arabic mb-1 text-2xl text-danger-400" lang="ar" dir="rtl">حِزْبُ الشَّيْطَانِ</p>
                    <p class="font-semibold text-danger-300">Hizb ush-Shaitan — Party of Satan</p>
                    <p class="mt-1 text-xs text-danger-200">أَلَا إِنَّ حِزْبَ الشَّيْطَانِ هُمُ الْخَاسِرُونَ</p>
                    <p class="mt-1 text-xs text-danger-400 italic">"Indeed it is the party of Satan who are the losers" — 58:19</p>
                </div>
            </div>
        </section>

        <!-- ─── PRICING / TIER SECTION ─── -->
        <section class="px-6 py-12 lg:px-12">
            <div class="mb-10 text-center">
                <h2 class="mb-3 text-3xl font-bold text-white">Choose Your Destination</h2>
                <p class="text-gray-400">Every action is a vote for your eternal home. Where do your habits place you today?</p>
            </div>

            <div class="grid grid-cols-1 gap-5 lg:grid-cols-4">

                <!-- ══════ CARD 1: PREMIUM JANNAH ══════ -->
                <div class="relative flex flex-col overflow-hidden rounded-2xl border border-gold-400/30 bg-gradient-to-b from-gold-950 via-gold-900/40 to-gray-950 shadow-2xl shadow-gold-900/30">
                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-br from-gold-300/10 via-transparent to-transparent"></div>
                    <div class="absolute top-4 right-4 rounded-full bg-gold-400/20 px-3 py-1 text-xs font-semibold text-gold-300">Highest Rank</div>

                    <div class="p-6">
                        <p class="mb-3 text-xs font-semibold uppercase tracking-widest text-brand-500">حِزْبُ اللَّهِ — Hizb Allah</p>
                        <p class="font-arabic mb-1 text-3xl text-gold-300" lang="ar" dir="rtl">جَنَّةُ الْفِرْدَوْسِ</p>
                        <h3 class="mb-1 text-xl font-bold text-gold-200">Premium Jannah</h3>
                        <p class="mb-4 text-sm text-gold-600">Jannat ul-Firdous — The Highest Paradise</p>

                        <div class="mb-4 flex items-center gap-2 rounded-lg bg-gold-900/40 px-3 py-2">
                            <span class="text-gold-400">✦</span>
                            <div>
                                <p class="text-xs font-semibold text-gold-300">Level 3 — الإحسان</p>
                                <p class="text-xs text-gold-700">Ihsan (Excellence in worship)</p>
                            </div>
                        </div>

                        <div class="mb-5 space-y-2 text-sm">
                            <p class="font-arabic text-base text-gold-400" lang="ar" dir="rtl">ثُمَّ اسْتَقَامُوا</p>
                            <p class="text-xs text-gold-700 italic">"Then they remained steadfast" — 46:13</p>
                        </div>

                        <ul class="mb-6 space-y-2.5">
                            <li class="flex items-start gap-2 text-sm text-gold-200">
                                <span class="mt-0.5 text-gold-400">★</span>
                                <span><strong>السابقون الأولون</strong> — The Forerunners</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-gold-200">
                                <span class="mt-0.5 text-gold-400">★</span>
                                <span><strong>المقربون</strong> — Those Brought Near to Allah</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-gold-200">
                                <span class="mt-0.5 text-gold-400">★</span>
                                <span><strong>الصديقون والشهداء</strong> — The Truthful &amp; Martyrs</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-gold-200">
                                <span class="mt-0.5 text-gold-400">★</span>
                                <span>لا يخافون لومة لائم — Fear no blame</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-gold-200">
                                <span class="mt-0.5 text-gold-400">★</span>
                                <span>Level 1+2+3 implementation — Self, Family &amp; Humanity</span>
                            </li>
                        </ul>

                        <div class="font-arabic mb-2 rounded-lg border border-gold-700/30 bg-gold-900/30 p-3 text-center text-sm text-gold-500" lang="ar" dir="rtl">
                            عَزْمُ الْأُمُورِ
                        </div>
                        <p class="mb-6 text-center text-xs text-gold-800 italic">"The resolve of matters" — steadfast at highest level</p>
                    </div>

                    <div class="mt-auto p-6 pt-0">
                        <button
                            disabled
                            class="w-full cursor-not-allowed rounded-xl border border-gold-600/30 bg-gold-900/40 px-4 py-3 text-sm font-semibold text-gold-600 opacity-60"
                        >
                            ✦ Coming Soon
                        </button>
                        <p class="mt-2 text-center text-xs text-gold-800">Advanced quiz — in development</p>
                    </div>
                </div>

                <!-- ══════ CARD 2: STANDARD JANNAH ══════ -->
                <div class="relative flex flex-col overflow-hidden rounded-2xl border border-brand-700/40 bg-gradient-to-b from-brand-950 via-brand-900/40 to-gray-950 shadow-2xl shadow-brand-900/20">
                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-br from-brand-400/5 via-transparent to-transparent"></div>

                    <div class="p-6">
                        <p class="mb-3 text-xs font-semibold uppercase tracking-widest text-brand-500">حِزْبُ اللَّهِ — Hizb Allah</p>
                        <p class="font-arabic mb-1 text-3xl text-brand-300" lang="ar" dir="rtl">أَصْحَابُ الْيَمِينِ</p>
                        <h3 class="mb-1 text-xl font-bold text-brand-200">Standard Jannah</h3>
                        <p class="mb-4 text-sm text-brand-600">Ashab ul-Yameen — People of the Right</p>

                        <div class="mb-4 flex items-center gap-2 rounded-lg bg-brand-900/40 px-3 py-2">
                            <span class="text-brand-400">◆</span>
                            <div>
                                <p class="text-xs font-semibold text-brand-300">Level 1 &amp; 2 — الإسلام والإيمان</p>
                                <p class="text-xs text-brand-700">Islam (5 pillars) + Eemaan (6 articles)</p>
                            </div>
                        </div>

                        <div class="mb-5 space-y-1 text-sm">
                            <p class="font-arabic text-base text-brand-400" lang="ar" dir="rtl">قُوا أَنفُسَكُمْ وَأَهْلِيكُمْ نَارًا</p>
                            <p class="text-xs text-brand-700 italic">"Save yourselves and your families from Hellfire" — 66:6</p>
                        </div>

                        <ul class="mb-6 space-y-2.5">
                            <li class="flex items-start gap-2 text-sm text-brand-200">
                                <span class="mt-0.5 text-brand-400">✓</span>
                                <span><strong>أَصْحَابُ الْمَيْمَنَةِ</strong> — Companions of the Right Hand</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-brand-200">
                                <span class="mt-0.5 text-brand-400">✓</span>
                                <span>Fulfils 5 Pillars of Islam (Level 1 — self)</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-brand-200">
                                <span class="mt-0.5 text-brand-400">✓</span>
                                <span>Believes in 6 Articles of Eemaan (Level 2 — family)</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-brand-200">
                                <span class="mt-0.5 text-brand-400">✓</span>
                                <span>تَزَكَّى — Purifies the soul</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-brand-200">
                                <span class="mt-0.5 text-brand-400">✓</span>
                                <span>عَلَيْكُمْ أَنفُسَكُمْ — Saves themselves first</span>
                            </li>
                        </ul>

                        <div class="font-arabic mb-2 rounded-lg border border-brand-700/30 bg-brand-900/30 p-3 text-center text-sm text-brand-500" lang="ar" dir="rtl">
                            وَتَوَاصَوْا بِالْحَقِّ وَتَوَاصَوْا بِالصَّبْرِ
                        </div>
                        <p class="mb-6 text-center text-xs text-brand-800 italic">"Enjoin truth &amp; patience upon each other" — Al-Asr</p>
                    </div>

                    <div class="mt-auto p-6 pt-0">
                        <Link
                            href="/surahs"
                            class="block w-full rounded-xl bg-brand-700 px-4 py-3 text-center text-sm font-semibold text-white transition hover:bg-brand-600"
                        >
                            Start Quran Quiz
                        </Link>
                        <p class="mt-2 text-center text-xs text-brand-800">Quiz by Surah — available now</p>
                    </div>
                </div>

                <!-- ══════ CARD 3: ASHAB USH-SHIMAAL (ACTIVE) ══════ -->
                <div class="relative flex flex-col overflow-hidden rounded-2xl border border-danger-700/50 bg-gradient-to-b from-danger-950 via-danger-900/30 to-gray-950 shadow-2xl shadow-danger-950/40 ring-1 ring-danger-800/30">
                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-b from-danger-500/5 via-transparent to-transparent"></div>
                    <div class="absolute top-4 right-4 rounded-full bg-danger-600 px-3 py-1 text-xs font-bold text-white">ACTIVE</div>

                    <div class="p-6">
                        <p class="mb-3 text-xs font-semibold uppercase tracking-widest text-danger-500">حِزْبُ الشَّيْطَانِ — Hizb ush-Shaitan</p>
                        <p class="font-arabic mb-1 text-3xl text-danger-400" lang="ar" dir="rtl">أَصْحَابُ الشِّمَالِ</p>
                        <h3 class="mb-1 text-xl font-bold text-danger-200">Ashab ush-Shimaal</h3>
                        <p class="mb-4 text-sm text-danger-600">People of the Left — The Sinners</p>

                        <div class="mb-4 flex items-center gap-2 rounded-lg bg-danger-900/40 px-3 py-2">
                            <span class="text-danger-400">⚠</span>
                            <div>
                                <p class="text-xs font-semibold text-danger-300">الكبائر — Major Sins</p>
                                <p class="text-xs text-danger-700">30 Major Sins by Imam al-Dhahabi</p>
                            </div>
                        </div>

                        <div class="mb-5 space-y-1 text-sm">
                            <p class="font-arabic text-base text-danger-400" lang="ar" dir="rtl">الْمَاعُونَ — يُخَادِعُونَ اللَّهَ</p>
                            <p class="text-xs text-danger-700 italic">"They deceive Allah and the believers" — 2:9</p>
                        </div>

                        <ul class="mb-6 space-y-2.5">
                            <li class="flex items-start gap-2 text-sm text-danger-200">
                                <span class="mt-0.5 text-danger-500">✗</span>
                                <span><strong>مُشْرِك / كَافِر / ظَالِم</strong> — Polytheist, Disbeliever, Oppressor</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-danger-200">
                                <span class="mt-0.5 text-danger-500">✗</span>
                                <span>Commits the 30 Major Sins (Kaba'ir)</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-danger-200">
                                <span class="mt-0.5 text-danger-500">✗</span>
                                <span>Shirk, Qatl, Sihr, Riba, Zina, Khamr…</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-danger-200">
                                <span class="mt-0.5 text-danger-500">✗</span>
                                <span>أَصْحَابُ الْمَشْأَمَةِ — Left Hand companions</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-danger-200">
                                <span class="mt-0.5 text-danger-500">✗</span>
                                <span>Quran Book: Sijjeen — the record of the wicked</span>
                            </li>
                        </ul>

                        <div class="font-arabic mb-2 rounded-lg border border-danger-800/40 bg-danger-900/30 p-3 text-center text-sm text-danger-500" lang="ar" dir="rtl">
                            فِي سَمُومٍ وَحَمِيمٍ
                        </div>
                        <p class="mb-6 text-center text-xs text-danger-800 italic">"In scorching wind and scalding water" — Al-Waqi'ah 56:42</p>
                    </div>

                    <div class="mt-auto p-6 pt-0">
                        <Link
                            href="/major-sins"
                            class="block w-full rounded-xl bg-gradient-to-r from-danger-700 to-danger-600 px-4 py-3.5 text-center text-sm font-bold text-white shadow-lg shadow-danger-900/50 transition hover:from-danger-600 hover:to-danger-500"
                        >
                            Take Major Sins Quiz
                        </Link>
                        <p class="mt-2 text-center text-xs text-danger-800">Know what to avoid — active now</p>
                    </div>
                </div>

                <!-- ══════ CARD 4: WORST HELLFIRE ══════ -->
                <div class="relative flex flex-col overflow-hidden rounded-2xl border border-gray-800/60 bg-gradient-to-b from-gray-950 via-danger-950/20 to-black shadow-2xl">
                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-danger-950/10 to-transparent"></div>

                    <div class="p-6">
                        <p class="mb-3 text-xs font-semibold uppercase tracking-widest text-danger-800">حِزْبُ الشَّيْطَانِ — Hizb ush-Shaitan</p>
                        <p class="font-arabic mb-1 text-3xl text-gray-500" lang="ar" dir="rtl">الدَّرْكُ الْأَسْفَلُ</p>
                        <h3 class="mb-1 text-xl font-bold text-gray-400">Worst Hellfire</h3>
                        <p class="mb-4 text-sm text-gray-700">Al-Darakil Asfal — The Lowest Depths</p>

                        <div class="mb-4 flex items-center gap-2 rounded-lg bg-gray-900 px-3 py-2">
                            <span class="text-gray-600">☠</span>
                            <div>
                                <p class="text-xs font-semibold text-gray-500">النِّفَاق — Hypocrisy</p>
                                <p class="text-xs text-gray-700">The worst — solitary confinement of Hell</p>
                            </div>
                        </div>

                        <div class="mb-5 space-y-1 text-sm">
                            <p class="font-arabic text-base text-gray-600" lang="ar" dir="rtl">إِنَّ الْمُنَافِقِينَ فِي الدَّرْكِ الْأَسْفَلِ مِنَ النَّارِ</p>
                            <p class="text-xs text-gray-700 italic">"The hypocrites are in the lowest depths of Fire" — 4:145</p>
                        </div>

                        <ul class="mb-6 space-y-2.5">
                            <li class="flex items-start gap-2 text-sm text-gray-500">
                                <span class="mt-0.5 text-gray-700">☠</span>
                                <span><strong>الْمُنَافِقُونَ</strong> — The Hypocrites (claim Islam, deny in heart)</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-gray-500">
                                <span class="mt-0.5 text-gray-700">☠</span>
                                <span><strong>إِبْلِيسُ</strong> — Iblees and his army</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-gray-500">
                                <span class="mt-0.5 text-gray-700">☠</span>
                                <span>أَسْفَلَ سَافِلِينَ — The Lowest of the Low</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-gray-500">
                                <span class="mt-0.5 text-gray-700">☠</span>
                                <span>يُخَادِعُونَ اللَّهَ — Deceive Allah (they only deceive themselves)</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-gray-500">
                                <span class="mt-0.5 text-gray-700">☠</span>
                                <span>الْمَاعُون — Withhold small kindnesses; perform prayer to show off</span>
                            </li>
                        </ul>

                        <div class="font-arabic mb-2 rounded-lg border border-gray-800 bg-black/60 p-3 text-center text-sm text-gray-700" lang="ar" dir="rtl">
                            لَا يَجِدُوا لَهُمْ نَصِيرًا
                        </div>
                        <p class="mb-6 text-center text-xs text-gray-800 italic">"And you will find for them no helper" — 4:145</p>
                    </div>

                    <div class="mt-auto p-6 pt-0">
                        <button
                            disabled
                            class="w-full cursor-not-allowed rounded-xl border border-gray-800 bg-gray-900/60 px-4 py-3 text-sm font-semibold text-gray-700 opacity-50"
                        >
                            ☠ Coming Soon
                        </button>
                        <p class="mt-2 text-center text-xs text-gray-800">Nifaq quiz — in development</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- ─── IMPLEMENTATION LEVELS ─── -->
        <section class="px-6 py-16 lg:px-12">
            <div class="mb-10 text-center">
                <h2 class="mb-3 text-3xl font-bold text-white">Implementation Levels</h2>
                <p class="text-gray-400">The Quran has a layered call — start with yourself, expand to your family, then humanity.</p>
            </div>
            <div class="grid gap-5 sm:grid-cols-3">
                <div class="rounded-2xl border border-brand-800/30 bg-gradient-to-br from-brand-950 to-gray-950 p-6">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-brand-900 text-lg font-bold text-brand-400">1</span>
                        <div>
                            <p class="font-semibold text-brand-300">Save Yourself</p>
                            <p class="text-xs text-gray-500">الفرض — Obligatory</p>
                        </div>
                    </div>
                    <p class="font-arabic mb-2 text-xl text-brand-500" lang="ar" dir="rtl">عَلَيْكُمْ أَنفُسَكُمْ</p>
                    <p class="text-xs text-brand-700 italic mb-3">"Upon you is [responsibility for] yourselves" — 5:105</p>
                    <ul class="space-y-1 text-sm text-gray-400">
                        <li class="flex items-center gap-2"><span class="text-brand-600">•</span> Master the 5 Pillars of Islam</li>
                        <li class="flex items-center gap-2"><span class="text-brand-600">•</span> Establish personal Ibadah</li>
                        <li class="flex items-center gap-2"><span class="text-brand-600">•</span> Difficulty: Islam Level</li>
                    </ul>
                </div>
                <div class="rounded-2xl border border-brand-700/30 bg-gradient-to-br from-brand-900/40 to-gray-950 p-6">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-brand-800/60 text-lg font-bold text-brand-300">2</span>
                        <div>
                            <p class="font-semibold text-brand-200">Save Your Family</p>
                            <p class="text-xs text-gray-500">الفرض — Obligatory</p>
                        </div>
                    </div>
                    <p class="font-arabic mb-2 text-xl text-brand-400" lang="ar" dir="rtl">قُوا أَنفُسَكُمْ وَأَهْلِيكُمْ نَارًا</p>
                    <p class="text-xs text-brand-700 italic mb-3">"Protect yourselves and your families from Fire" — 66:6</p>
                    <ul class="space-y-1 text-sm text-gray-400">
                        <li class="flex items-center gap-2"><span class="text-brand-500">•</span> Teach your household</li>
                        <li class="flex items-center gap-2"><span class="text-brand-500">•</span> Build family upon Eemaan</li>
                        <li class="flex items-center gap-2"><span class="text-brand-500">•</span> Difficulty: Eemaan Level</li>
                    </ul>
                </div>
                <div class="rounded-2xl border border-gold-800/30 bg-gradient-to-br from-gold-950 to-gray-950 p-6">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-gold-900 text-lg font-bold text-gold-400">3</span>
                        <div>
                            <p class="font-semibold text-gold-300">Save Humanity</p>
                            <p class="text-xs text-gray-500">المستحب — Recommended</p>
                        </div>
                    </div>
                    <p class="font-arabic mb-2 text-xl text-gold-500" lang="ar" dir="rtl">كُنتُمْ خَيْرَ أُمَّةٍ أُخْرِجَتْ لِلنَّاسِ</p>
                    <p class="text-xs text-gold-800 italic mb-3">"You are the best nation brought forth for humanity" — 3:110</p>
                    <ul class="space-y-1 text-sm text-gray-400">
                        <li class="flex items-center gap-2"><span class="text-gold-600">•</span> Da'wah and enjoining good</li>
                        <li class="flex items-center gap-2"><span class="text-gold-600">•</span> Establish justice in society</li>
                        <li class="flex items-center gap-2"><span class="text-gold-600">•</span> Difficulty: Ihsan Level</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- ─── DIFFICULTY LADDER ─── -->
        <section class="px-6 pb-16 lg:px-12">
            <div class="overflow-hidden rounded-2xl border border-gray-800 bg-gray-900">
                <div class="border-b border-gray-800 px-8 py-6">
                    <h2 class="text-2xl font-bold text-white">Difficulty Levels</h2>
                    <p class="mt-1 text-gray-500">The deeper your understanding, the closer to Allah.</p>
                </div>
                <div class="grid divide-y divide-gray-800 sm:grid-cols-3 sm:divide-x sm:divide-y-0">
                    <div class="p-8">
                        <div class="mb-4 inline-flex items-center gap-2 rounded-full bg-brand-900/50 px-3 py-1 text-sm font-semibold text-brand-400">
                            Level 1 — الإسلام
                        </div>
                        <h3 class="mb-2 text-lg font-bold text-white">Islam</h3>
                        <p class="mb-4 text-sm text-gray-400">The 5 Pillars: Shahada, Salah, Sawm, Zakat, Hajj. The foundation every Muslim must establish.</p>
                        <div class="space-y-1 text-sm text-gray-500">
                            <p>• Shahada — Declaration of faith</p>
                            <p>• Salah — 5 daily prayers</p>
                            <p>• Sawm — Fasting in Ramadan</p>
                            <p>• Zakat — Obligatory charity</p>
                            <p>• Hajj — Pilgrimage (if able)</p>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="mb-4 inline-flex items-center gap-2 rounded-full bg-gold-900/50 px-3 py-1 text-sm font-semibold text-gold-400">
                            Level 2 — الإيمان
                        </div>
                        <h3 class="mb-2 text-lg font-bold text-white">Eemaan</h3>
                        <p class="mb-4 text-sm text-gray-400">The 6 Articles of faith internalized. Inner conviction that transforms outward action.</p>
                        <div class="space-y-1 text-sm text-gray-500">
                            <p>• Belief in Allah</p>
                            <p>• Belief in Angels</p>
                            <p>• Belief in Books (Quran)</p>
                            <p>• Belief in Messengers</p>
                            <p>• Belief in Last Day</p>
                            <p>• Belief in Qadar</p>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="mb-4 inline-flex items-center gap-2 rounded-full bg-purple-900/50 px-3 py-1 text-sm font-semibold text-purple-400">
                            Level 3 — الإحسان
                        </div>
                        <h3 class="mb-2 text-lg font-bold text-white">Ihsan</h3>
                        <p class="mb-4 text-sm text-gray-400">Worship Allah as though you see Him — excellence in every action, seen and unseen.</p>
                        <div class="space-y-1 text-sm text-gray-500">
                            <p>• Muraqabah — Constant awareness of Allah</p>
                            <p>• Ikhlas — Sincerity in all deeds</p>
                            <p>• Tawakkul — Complete reliance on Allah</p>
                            <p>• Zuhd — Detachment from dunya</p>
                            <p class="font-arabic mt-2 text-base text-purple-700" lang="ar" dir="rtl">تَزَكَّىٰ</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── CTA FOOTER ─── -->
        <section class="border-t border-gray-800 px-6 py-16 text-center lg:px-12">
            <p class="font-arabic mb-3 text-3xl text-gold-400" lang="ar" dir="rtl">وَمَن يَتَوَلَّ اللَّهَ وَرَسُولَهُ وَالَّذِينَ آمَنُوا فَإِنَّ حِزْبَ اللَّهِ هُمُ الْغَالِبُونَ</p>
            <p class="mb-8 text-gold-600 italic">"Whoever allies himself with Allah, His Messenger, and the believers — indeed, the party of Allah, they are the dominant." — 5:56</p>
            <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
                <Link
                    href="/surahs"
                    class="inline-flex items-center gap-2 rounded-xl bg-brand-700 px-8 py-4 text-base font-bold text-white shadow-lg transition hover:bg-brand-600"
                >
                    Start Quran Quiz by Surah
                </Link>
                <Link
                    href="/major-sins"
                    class="inline-flex items-center gap-2 rounded-xl border border-danger-700 bg-danger-950/50 px-8 py-4 text-base font-bold text-danger-400 transition hover:bg-danger-900/50"
                >
                    Test Your Knowledge of Major Sins
                </Link>
            </div>
            <p class="mt-8 text-sm text-gray-700">
                Amal — Last 10 Surahs (105–114) &amp; 30 Major Sins by Imam al-Dhahabi
            </p>
        </section>

    </div>
</template>
