<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue';
import NavBar from '@/components/layout/NavBar.vue';
import { useVerseRotation } from '@/composables/useVerseRotation';

const isStartingMajorSins = ref(false);

function startMajorSinsQuiz() {
    isStartingMajorSins.value = true;
    router.visit('/major-sins');
}

/* ─── Rotating hero statements ─── */
const statements = [
    { english: 'Ever wondered how much you follow the Quran?' },
    { english: 'Ever wondered how the Sahaba treated the Quran?' },
    { english: 'Ever wondered how the Sahaba memorized the Quran?' },
    { english: 'Ever wondered how the Sahaba implemented the Quran?' },
    { arabic: 'حَاسِبُوا أَنْفُسَكُمْ قَبْلَ أَنْ تُحَاسَبُوا', english: "— ʿUmar ibn al-Khaṭṭāb  رضي الله عنه" },
    { english: 'Know and follow the way of the Sahaba & Ahlul Bayt' },
    { english: 'Take the first steps towards Jannat al-Firdous' },
];

const { currentVerse, transitioning, goTo } = useVerseRotation(statements, 5000);

/* ─── Rotating measure-word banner ─── */
const flipWords = ['manage', 'improve', 'fix', 'achieve'];
const currentWord = ref(0);
let wordInterval: ReturnType<typeof setInterval>;

onMounted(() => {
    wordInterval = setInterval(() => {
        currentWord.value = (currentWord.value + 1) % flipWords.length;
    }, 2000);
});

onUnmounted(() => {
    clearInterval(wordInterval);
});
</script>

<template>
    <Head title="Amal — Hasten to the Best of Deeds" />

    <div class="min-h-screen bg-gray-950 text-white">

        <!-- ─── NAV ─── -->
        <NavBar theme="dark" />

        <!-- ─── HERO with rotating statements ─── -->
        <section class="relative overflow-hidden">
            <div class="pointer-events-none absolute inset-0">
                <div class="absolute inset-0 bg-gradient-to-b from-brand-950/80 via-gray-950 to-gray-950"></div>
                <div class="absolute top-1/3 left-1/2 h-[500px] w-[500px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-gold-500/5 blur-3xl"></div>
            </div>

            <div class="relative z-10 px-6 py-20 text-center lg:py-28 lg:px-12">
                <!-- Quranic opener badge -->
                <div class="mb-2 inline-flex flex-col items-center gap-1 rounded-2xl border border-gold-500/30 bg-gold-500/10 px-6 py-3">
                    <span class="font-arabic text-2xl font-bold text-gold-300 leading-relaxed" lang="ar" dir="rtl">
                        ادْخُلُوا فِي السِّلْمِ كَافَّةً
                    </span>
                    <span class="text-xs text-gold-600 tracking-wide">Allah orders us in the Quran — Al-Baqarah 2:208</span>
                </div>

                <!-- Rotating statement -->
                <div class="mx-auto my-10 min-h-[120px] max-w-3xl flex items-center justify-center">
                    <div
                        class="transition-opacity duration-400 w-full"
                        :class="transitioning ? 'opacity-0' : 'opacity-100'"
                    >
                        <p
                            v-if="statements[currentVerse].arabic"
                            class="font-arabic mb-3 text-2xl leading-relaxed text-gold-300 sm:text-3xl"
                            lang="ar"
                            dir="rtl"
                        >{{ statements[currentVerse].arabic }}</p>
                        <p class="text-2xl font-semibold text-white sm:text-3xl lg:text-4xl">
                            {{ statements[currentVerse].english }}
                        </p>
                    </div>
                </div>

                <!-- Statement dots -->
                <div class="mb-10 flex items-center justify-center gap-2">
                    <button
                        v-for="(_, i) in statements"
                        :key="i"
                        class="h-2 rounded-full transition-all duration-300"
                        :class="i === currentVerse ? 'w-6 bg-gold-400' : 'w-2 bg-gray-700 hover:bg-gray-600'"
                        @click="goTo(i)"
                        :aria-label="'Statement ' + (i + 1)"
                    />
                </div>

                <h1 class="mb-4 text-4xl font-bold tracking-tight text-white sm:text-5xl">
                    Amal — Your Qur'anic Journey
                </h1>
                <p class="mx-auto mb-10 max-w-2xl text-lg text-gray-400">
                    Learn what the Quran commands, avoid what it forbids, and track your journey toward Jannah.
                </p>

                <!-- CTA buttons -->
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

        <!-- ─── MEASURE BANNER ─── -->
        <section class="border-b border-gray-900 bg-gray-950 px-6 py-5 text-center">
            <p class="flex flex-wrap items-center justify-center gap-x-2 gap-y-1 text-lg text-gray-400 sm:text-xl">
                <span>If you can measure it, you can</span>
                <span class="inline-block" style="perspective: 400px">
                    <transition name="word-flip" mode="out-in">
                        <span
                            :key="currentWord"
                            class="inline-block rounded border border-brand-700/60 bg-brand-900/40 px-3 py-0.5 font-bold text-brand-300"
                        >{{ flipWords[currentWord] }}</span>
                    </transition>
                </span>
                <span>it.</span>
            </p>
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

        <!-- ─── QURAN-BASED DESTINATION CARDS ─── -->
        <section class="px-6 pb-12 lg:px-12">
            <div class="mb-10 text-center">
                <h2 class="mb-3 text-3xl font-bold text-white">What Does the Quran Say?</h2>
                <p class="text-gray-400">Four groups defined by Allah's words — which verses describe you?</p>
            </div>

            <div class="grid grid-cols-1 gap-5 lg:grid-cols-4">

                <!-- ══════ CARD 1: AS-SĀBIQŪN ══════ -->
                <div class="relative flex flex-col overflow-hidden rounded-2xl border border-amber-400/30 bg-gradient-to-b from-amber-950 via-yellow-950/60 to-gray-950 shadow-2xl shadow-amber-900/20">
                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-br from-amber-300/8 via-transparent to-transparent"></div>
                    <div class="absolute top-4 right-4 rounded-full bg-amber-400/20 px-3 py-1 text-xs font-semibold text-amber-300">Highest Rank</div>

                    <div class="flex flex-1 flex-col p-6">
                        <!-- Category -->
                        <p class="mb-3 text-xs font-semibold uppercase tracking-widest text-emerald-500">Racing in Good Deeds</p>

                        <!-- Title -->
                        <p class="font-arabic mb-1 text-3xl text-amber-300" lang="ar" dir="rtl">السَّابِقُونَ</p>
                        <h3 class="mb-4 text-xl font-bold text-amber-200">Forerunners</h3>

                        <!-- Anchor verse -->
                        <div class="mb-5 rounded-xl border border-amber-700/30 bg-amber-900/30 p-4">
                            <p class="font-arabic mb-2 text-lg leading-relaxed text-amber-300" lang="ar" dir="rtl">وَالسَّابِقُونَ السَّابِقُونَ • أُولَٰئِكَ الْمُقَرَّبُونَ</p>
                            <p class="mb-1 text-xs font-semibold text-amber-600">Al-Waqi'ah 56:10–11</p>
                            <p class="text-xs text-amber-500 italic">"The forerunners, the forerunners — they are the ones brought near."</p>
                        </div>

                        <!-- Supporting verses -->
                        <div class="mb-5 space-y-3">
                            <div class="rounded-lg bg-amber-900/20 px-3 py-2.5">
                                <p class="font-arabic mb-1 text-sm text-amber-400" lang="ar" dir="rtl">أُولَٰئِكَ يُسَارِعُونَ فِي الْخَيْرَاتِ وَهُمْ لَهَا سَابِقُونَ</p>
                                <p class="text-xs text-amber-700 italic">"They hasten to good deeds, and they are foremost." — 23:61</p>
                            </div>
                            <div class="rounded-lg bg-amber-900/20 px-3 py-2.5">
                                <p class="font-arabic mb-1 text-sm text-amber-400" lang="ar" dir="rtl">فَاسْتَبِقُوا الْخَيْرَاتِ</p>
                                <p class="text-xs text-amber-700 italic">"So compete in good deeds." — 2:148</p>
                            </div>
                        </div>

                        <!-- Bullets -->
                        <ul class="mb-5 space-y-2">
                            <li class="flex items-start gap-2 text-sm text-amber-200">
                                <span class="mt-0.5 shrink-0 text-amber-400">★</span>
                                <span><span class="font-arabic">يُسَارِعُونَ فِي الْخَيْرَاتِ</span> — hasten to good — <span class="text-amber-600">23:61</span></span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-amber-200">
                                <span class="mt-0.5 shrink-0 text-amber-400">★</span>
                                <span><span class="font-arabic">فَاسْتَبِقُوا الْخَيْرَاتِ</span> — compete in good — <span class="text-amber-600">2:148</span></span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-amber-200">
                                <span class="mt-0.5 shrink-0 text-amber-400">★</span>
                                <span><span class="font-arabic">سَابِقُوا إِلَىٰ مَغْفِرَةٍ</span> — race to forgiveness — <span class="text-amber-600">57:21</span></span>
                            </li>
                        </ul>

                        <!-- Note -->
                        <p class="mb-5 rounded-lg bg-amber-900/20 px-3 py-2 text-xs text-amber-700 italic">
                            Represents those who consistently act first in obedience and الخير.
                        </p>

                        <!-- CTA -->
                        <div class="mt-auto">
                            <Link
                                href="/sabiqun"
                                class="block w-full rounded-xl border border-amber-500/50 bg-amber-900/60 px-4 py-3 text-center text-sm font-semibold text-amber-300 transition hover:border-amber-400/70 hover:bg-amber-800/60 hover:text-amber-200"
                            >
                                ✦ Race with the Forerunners →
                            </Link>
                            <p class="mt-2 text-center text-xs text-amber-800">Race toward الخير daily</p>
                        </div>
                    </div>
                </div>

                <!-- ══════ CARD 2: ASHAB AL-YAMEEN ══════ -->
                <div class="relative flex flex-col overflow-hidden rounded-2xl border border-emerald-700/40 bg-gradient-to-b from-emerald-950 via-teal-950/60 to-gray-950 shadow-2xl shadow-emerald-900/20">
                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-br from-emerald-400/5 via-transparent to-transparent"></div>

                    <div class="flex flex-1 flex-col p-6">
                        <p class="mb-3 text-xs font-semibold uppercase tracking-widest text-emerald-500">Believers</p>

                        <p class="font-arabic mb-1 text-3xl text-emerald-300" lang="ar" dir="rtl">أَصْحَابُ الْيَمِينِ</p>
                        <h3 class="mb-4 text-xl font-bold text-emerald-200">People of the Right</h3>

                        <!-- Anchor verse -->
                        <div class="mb-5 rounded-xl border border-emerald-700/30 bg-emerald-900/30 p-4">
                            <p class="font-arabic mb-2 text-lg leading-relaxed text-emerald-300" lang="ar" dir="rtl">فَأَصْحَابُ الْيَمِينِ مَا أَصْحَابُ الْيَمِينِ</p>
                            <p class="mb-1 text-xs font-semibold text-emerald-600">Al-Waqi'ah 56:27</p>
                            <p class="text-xs text-emerald-500 italic">"Then the companions of the right — what are the companions of the right?"</p>
                        </div>

                        <!-- Supporting verses -->
                        <div class="mb-5 space-y-3">
                            <div class="rounded-lg bg-emerald-900/20 px-3 py-2.5">
                                <p class="font-arabic mb-1 text-sm text-emerald-400" lang="ar" dir="rtl">قُوا أَنفُسَكُمْ وَأَهْلِيكُمْ نَارًا</p>
                                <p class="text-xs text-emerald-700 italic">"Protect yourselves and your families from a Fire." — 66:6</p>
                            </div>
                            <div class="rounded-lg bg-emerald-900/20 px-3 py-2.5">
                                <p class="font-arabic mb-1 text-sm text-emerald-400" lang="ar" dir="rtl">وَتَوَاصَوْا بِالْحَقِّ وَتَوَاصَوْا بِالصَّبْرِ</p>
                                <p class="text-xs text-emerald-700 italic">"And enjoin truth and patience." — 103:3</p>
                            </div>
                        </div>

                        <!-- Bullets -->
                        <ul class="mb-5 space-y-2">
                            <li class="flex items-start gap-2 text-sm text-emerald-200">
                                <span class="mt-0.5 shrink-0 text-emerald-400">✓</span>
                                <span><span class="font-arabic">قُوا أَنفُسَكُمْ</span> — protect yourselves — <span class="text-emerald-600">66:6</span></span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-emerald-200">
                                <span class="mt-0.5 shrink-0 text-emerald-400">✓</span>
                                <span><span class="font-arabic">آمَنُوا وَعَمِلُوا الصَّالِحَاتِ</span> — believe &amp; do good — <span class="text-emerald-600">multiple</span></span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-emerald-200">
                                <span class="mt-0.5 shrink-0 text-emerald-400">✓</span>
                                <span><span class="font-arabic">تَوَاصَوْا بِالصَّبْرِ</span> — encourage patience — <span class="text-emerald-600">103:3</span></span>
                            </li>
                        </ul>

                        <p class="mb-5 rounded-lg bg-emerald-900/20 px-3 py-2 text-xs text-emerald-700 italic">
                            Represents the majority of successful believers.
                        </p>

                        <div class="mt-auto">
                            <Link
                                href="/ashab-al-yameen"
                                class="block w-full rounded-xl bg-emerald-700 px-4 py-3 text-center text-sm font-semibold text-white transition hover:bg-emerald-600"
                            >
                                🌿 Explore the People of Right →
                            </Link>
                            <p class="mt-2 text-center text-xs text-emerald-800">Strengthen your foundation</p>
                        </div>
                    </div>
                </div>

                <!-- ══════ CARD 3: ASHAB ASH-SHIMAAL ══════ -->
                <div class="relative flex flex-col overflow-hidden rounded-2xl border border-orange-700/50 bg-gradient-to-b from-orange-950 via-red-950/60 to-gray-950 shadow-2xl shadow-red-950/30 ring-1 ring-red-800/20">
                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-b from-orange-500/5 via-transparent to-transparent"></div>
                    <div class="absolute top-4 right-4 rounded-full bg-red-600 px-3 py-1 text-xs font-bold text-white">⚠️ Warning</div>

                    <div class="flex flex-1 flex-col p-6">
                        <p class="mb-3 text-xs font-semibold uppercase tracking-widest text-red-500">Warning</p>

                        <p class="font-arabic mb-1 text-3xl text-orange-400" lang="ar" dir="rtl">أَصْحَابُ الشِّمَالِ</p>
                        <h3 class="mb-4 text-xl font-bold text-orange-200">People of the Left</h3>

                        <!-- Anchor verse -->
                        <div class="mb-5 rounded-xl border border-red-800/30 bg-red-900/30 p-4">
                            <p class="font-arabic mb-2 text-lg leading-relaxed text-orange-300" lang="ar" dir="rtl">وَأَصْحَابُ الشِّمَالِ مَا أَصْحَابُ الشِّمَالِ</p>
                            <p class="mb-1 text-xs font-semibold text-red-600">Al-Waqi'ah 56:41</p>
                            <p class="text-xs text-orange-500 italic">"And the companions of the left — what are the companions of the left?"</p>
                        </div>

                        <!-- Supporting verses -->
                        <div class="mb-5 space-y-3">
                            <div class="rounded-lg bg-red-900/20 px-3 py-2.5">
                                <p class="font-arabic mb-1 text-sm text-orange-400" lang="ar" dir="rtl">فِي سَمُومٍ وَحَمِيمٍ</p>
                                <p class="text-xs text-red-700 italic">"In scorching wind and boiling water." — 56:42</p>
                            </div>
                            <div class="rounded-lg bg-red-900/20 px-3 py-2.5">
                                <p class="font-arabic mb-1 text-sm text-orange-400" lang="ar" dir="rtl">إِنَّ الَّذِينَ كَفَرُوا</p>
                                <p class="text-xs text-red-700 italic">"Indeed, those who disbelieve..." — multiple</p>
                            </div>
                        </div>

                        <!-- Bullets -->
                        <ul class="mb-5 space-y-2">
                            <li class="flex items-start gap-2 text-sm text-orange-200">
                                <span class="mt-0.5 shrink-0 text-red-500">✗</span>
                                <span><span class="font-arabic">كَفَرُوا</span> — disbelieved — <span class="text-red-600">various</span></span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-orange-200">
                                <span class="mt-0.5 shrink-0 text-red-500">✗</span>
                                <span><span class="font-arabic">ظَلَمُوا</span> — oppression — <span class="text-red-600">various</span></span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-orange-200">
                                <span class="mt-0.5 shrink-0 text-red-500">✗</span>
                                <span><span class="font-arabic">أَصْحَابُ الشِّمَالِ</span> — people of the left — <span class="text-red-600">56:41</span></span>
                            </li>
                        </ul>

                        <p class="mb-5 rounded-lg bg-red-900/20 px-3 py-2 text-xs text-red-700 italic">
                            Represents those who persist in sin without repentance.
                        </p>

                        <div class="mt-auto">
                            <Link
                                href="/ashab-al-shimaal"
                                class="block w-full rounded-xl bg-gradient-to-r from-red-700 to-rose-700 px-4 py-3 text-center text-sm font-bold text-white shadow-lg shadow-red-900/50 transition hover:from-red-600 hover:to-rose-600"
                            >
                                ⚠️ Understand What to Avoid →
                            </Link>
                            <p class="mt-2 text-center text-xs text-red-800">Know what to avoid</p>
                        </div>
                    </div>
                </div>

                <!-- ══════ CARD 4: HYPOCRITES ══════ -->
                <div class="relative flex flex-col overflow-hidden rounded-2xl border border-gray-800/60 bg-gradient-to-b from-gray-950 via-red-950/20 to-black shadow-2xl">
                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-red-950/10 to-transparent"></div>

                    <div class="flex flex-1 flex-col p-6">
                        <p class="mb-3 text-xs font-semibold uppercase tracking-widest text-red-800">Hypocrisy</p>

                        <p class="font-arabic mb-1 text-3xl text-gray-500" lang="ar" dir="rtl">الدَّرْكِ الْأَسْفَلِ</p>
                        <h3 class="mb-4 text-xl font-bold text-gray-400">Lowest Depth of Hell</h3>

                        <!-- Anchor verse -->
                        <div class="mb-5 rounded-xl border border-gray-800 bg-black/40 p-4">
                            <p class="font-arabic mb-2 text-lg leading-relaxed text-gray-500" lang="ar" dir="rtl">إِنَّ الْمُنَافِقِينَ فِي الدَّرْكِ الْأَسْفَلِ مِنَ النَّارِ</p>
                            <p class="mb-1 text-xs font-semibold text-gray-600">An-Nisa 4:145</p>
                            <p class="text-xs text-gray-600 italic">"Indeed, the hypocrites will be in the lowest depths of the Fire."</p>
                        </div>

                        <!-- Supporting verses -->
                        <div class="mb-5 space-y-3">
                            <div class="rounded-lg bg-gray-900 px-3 py-2.5">
                                <p class="font-arabic mb-1 text-sm text-gray-500" lang="ar" dir="rtl">يُخَادِعُونَ اللَّهَ وَالَّذِينَ آمَنُوا</p>
                                <p class="text-xs text-gray-700 italic">"They deceive Allah and the believers." — 2:9</p>
                            </div>
                            <div class="rounded-lg bg-gray-900 px-3 py-2.5">
                                <p class="font-arabic mb-1 text-sm text-gray-500" lang="ar" dir="rtl">الَّذِينَ هُمْ يُرَاءُونَ</p>
                                <p class="text-xs text-gray-700 italic">"Those who show off." — 107:6</p>
                            </div>
                        </div>

                        <!-- Bullets -->
                        <ul class="mb-5 space-y-2">
                            <li class="flex items-start gap-2 text-sm text-gray-500">
                                <span class="mt-0.5 shrink-0 text-gray-700">☠</span>
                                <span><span class="font-arabic">يُخَادِعُونَ</span> — deception — <span class="text-gray-700">2:9</span></span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-gray-500">
                                <span class="mt-0.5 shrink-0 text-gray-700">☠</span>
                                <span><span class="font-arabic">يُرَاءُونَ</span> — showing off — <span class="text-gray-700">107:6</span></span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-gray-500">
                                <span class="mt-0.5 shrink-0 text-gray-700">☠</span>
                                <span><span class="font-arabic">لا يَذْكُرُونَ اللَّهَ إِلَّا قَلِيلًا</span> — little remembrance — <span class="text-gray-700">4:142</span></span>
                            </li>
                        </ul>

                        <p class="mb-5 rounded-lg bg-gray-900 px-3 py-2 text-xs text-gray-700 italic">
                            Hypocrisy refers to outward Islam with inward disbelief.
                        </p>

                        <div class="mt-auto">
                            <Link
                                href="/al-darakil-asfal"
                                class="block w-full rounded-xl border border-gray-700/50 bg-gray-900/60 px-4 py-3 text-center text-sm font-semibold text-gray-400 transition hover:border-gray-600/70 hover:bg-gray-800/60 hover:text-gray-300"
                            >
                                ☠ Recognise the Signs →
                            </Link>
                            <p class="mt-2 text-center text-xs text-gray-800">Purify your intentions</p>
                        </div>
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

        <!-- ─── YOUR JOURNEY ─── -->
        <section class="px-6 pb-16 lg:px-12">
            <div class="mb-10 text-center">
                <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-gold-700/30 bg-gold-900/20 px-4 py-1.5 text-xs font-semibold uppercase tracking-widest text-gold-500">
                    Your Journey
                </div>
                <h2 class="mb-3 text-3xl font-bold text-white">The Qur'anic Spiritual Ladder</h2>
                <p class="text-gray-400">One path — four stages. Every step brings you closer to Allah.</p>
            </div>

            <!-- Ladder -->
            <div class="mx-auto max-w-5xl">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-4 sm:gap-0">

                    <!-- Stage 1: Islam -->
                    <div class="relative flex flex-col items-center text-center">
                        <div class="w-full rounded-2xl border border-brand-800/50 bg-gradient-to-b from-brand-950/80 to-gray-950 p-6 sm:rounded-r-none sm:rounded-l-2xl">
                            <div class="mb-3 inline-flex items-center gap-1 rounded-full bg-brand-900/60 px-2.5 py-1 text-xs font-bold text-brand-400">
                                Level 1
                            </div>
                            <p class="font-arabic mb-1 text-2xl text-brand-300" lang="ar" dir="rtl">الْإِسْلَامُ</p>
                            <h3 class="mb-2 text-base font-bold text-brand-200">Submission</h3>
                            <p class="mb-3 text-xs text-brand-700">Focus: Build your actions</p>
                            <p class="font-arabic text-sm text-brand-600" lang="ar" dir="rtl">عَلَيْكُمْ أَنفُسَكُمْ</p>
                            <p class="text-xs text-brand-800 italic mt-1">5:105</p>
                        </div>
                        <!-- Arrow right (desktop) -->
                        <div class="hidden sm:flex absolute -right-3 top-1/2 z-10 -translate-y-1/2 items-center justify-center h-6 w-6 rounded-full bg-gray-800 border border-gray-700 text-gray-500 text-xs font-bold">
                            →
                        </div>
                        <!-- Arrow down (mobile) -->
                        <div class="sm:hidden my-1 text-gray-600 text-lg">↓</div>
                    </div>

                    <!-- Stage 2: Iman -->
                    <div class="relative flex flex-col items-center text-center">
                        <div class="w-full rounded-2xl border border-gold-800/50 bg-gradient-to-b from-gold-950/80 to-gray-950 p-6 sm:rounded-none">
                            <div class="mb-3 inline-flex items-center gap-1 rounded-full bg-gold-900/60 px-2.5 py-1 text-xs font-bold text-gold-400">
                                Level 2
                            </div>
                            <p class="font-arabic mb-1 text-2xl text-gold-300" lang="ar" dir="rtl">الْإِيمَانُ</p>
                            <h3 class="mb-2 text-base font-bold text-gold-200">Strengthen</h3>
                            <p class="mb-3 text-xs text-gold-700">Focus: Build your heart</p>
                            <p class="font-arabic text-sm text-gold-600" lang="ar" dir="rtl">آمَنُوا وَعَمِلُوا الصَّالِحَاتِ</p>
                            <p class="text-xs text-gold-800 italic mt-1">2:82</p>
                        </div>
                        <div class="hidden sm:flex absolute -right-3 top-1/2 z-10 -translate-y-1/2 items-center justify-center h-6 w-6 rounded-full bg-gray-800 border border-gray-700 text-gray-500 text-xs font-bold">
                            →
                        </div>
                        <div class="sm:hidden my-1 text-gray-600 text-lg">↓</div>
                    </div>

                    <!-- Stage 3: Ihsan -->
                    <div class="relative flex flex-col items-center text-center">
                        <div class="w-full rounded-2xl border border-purple-800/50 bg-gradient-to-b from-purple-950/80 to-gray-950 p-6 sm:rounded-none">
                            <div class="mb-3 inline-flex items-center gap-1 rounded-full bg-purple-900/60 px-2.5 py-1 text-xs font-bold text-purple-400">
                                Level 3
                            </div>
                            <p class="font-arabic mb-1 text-2xl text-purple-300" lang="ar" dir="rtl">الْإِحْسَانُ</p>
                            <h3 class="mb-2 text-base font-bold text-purple-200">Excellence</h3>
                            <p class="mb-3 text-xs text-purple-700">Focus: Refine your intentions</p>
                            <p class="font-arabic text-sm text-purple-600" lang="ar" dir="rtl">تَزَكَّىٰ</p>
                            <p class="text-xs text-purple-800 italic mt-1">87:14</p>
                        </div>
                        <div class="hidden sm:flex absolute -right-3 top-1/2 z-10 -translate-y-1/2 items-center justify-center h-6 w-6 rounded-full bg-gray-800 border border-gray-700 text-gray-500 text-xs font-bold">
                            →
                        </div>
                        <div class="sm:hidden my-1 text-gray-600 text-lg">↓</div>
                    </div>

                    <!-- Stage 4: Sabiqun -->
                    <div class="flex flex-col items-center text-center">
                        <div class="w-full rounded-2xl border border-amber-500/50 bg-gradient-to-b from-amber-950/80 via-yellow-950/40 to-gray-950 p-6 ring-1 ring-amber-700/20 sm:rounded-l-none sm:rounded-r-2xl">
                            <div class="mb-3 inline-flex items-center gap-1 rounded-full bg-amber-900/60 px-2.5 py-1 text-xs font-bold text-amber-400">
                                ✦ Forerunners
                            </div>
                            <p class="font-arabic mb-1 text-2xl text-amber-300" lang="ar" dir="rtl">السَّابِقُونَ</p>
                            <h3 class="mb-2 text-base font-bold text-amber-200">Race to الخير</h3>
                            <p class="mb-3 text-xs text-amber-700">Focus: Lead in every good</p>
                            <p class="font-arabic text-sm text-amber-600" lang="ar" dir="rtl">أُولَٰئِكَ الْمُقَرَّبُونَ</p>
                            <p class="text-xs text-amber-800 italic mt-1">56:11</p>
                        </div>
                    </div>

                </div>

                <!-- CTA -->
                <div class="mt-10 text-center">
                    <Link
                        href="/implement"
                        class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-amber-600 to-gold-500 px-8 py-4 text-base font-bold text-gray-950 shadow-lg shadow-amber-900/30 transition hover:from-amber-500 hover:to-gold-400"
                    >
                        Let's Take a Path to Jannah al-Firdous →
                    </Link>
                    <p class="mt-3 text-sm text-gray-600">Structured guidance — available soon</p>
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

<style scoped>
.word-flip-enter-active { animation: flip-in 0.25s ease-out forwards; }
.word-flip-leave-active  { animation: flip-out 0.2s ease-in forwards; }

@keyframes flip-in {
    from { transform: rotateX(90deg); opacity: 0; }
    to   { transform: rotateX(0deg);  opacity: 1; }
}

@keyframes flip-out {
    from { transform: rotateX(0deg);   opacity: 1; }
    to   { transform: rotateX(-90deg); opacity: 0; }
}
</style>
