<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import NavBar from '@/components/layout/NavBar.vue';

const isStartingMajorSins = ref(false);

function startMajorSinsQuiz() {
    isStartingMajorSins.value = true;
    router.visit('/major-sins');
}
</script>

<template>
    <Head title="Kaffah — Enter Islam Completely">
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

        <!-- ─── HERO ─── -->
        <section class="relative overflow-hidden">
            <!-- Split background glow -->
            <div class="pointer-events-none absolute inset-0">
                <div class="absolute top-0 left-0 h-full w-1/2 bg-gradient-to-br from-emerald-950/60 via-teal-950/40 to-transparent"></div>
                <div class="absolute top-0 right-0 h-full w-1/2 bg-gradient-to-bl from-red-950/60 via-rose-950/40 to-transparent"></div>
                <div class="absolute top-1/2 left-1/2 h-96 w-96 -translate-x-1/2 -translate-y-1/2 rounded-full bg-amber-500/5 blur-3xl"></div>
            </div>

            <div class="relative z-10 px-6 py-20 text-center lg:py-28 lg:px-12">
                <!-- Tagline badge -->
                <div class="mb-8 inline-flex items-center gap-2 rounded-full border border-amber-500/30 bg-amber-500/10 px-4 py-1.5 text-sm text-amber-400">
                    <span>✦</span>
                    <span>Gamified Quran Implementation — MVP</span>
                    <span>✦</span>
                </div>

                <!-- Main Arabic title -->
                <div class="mb-6">
                    <p
                        class="font-arabic mb-4 text-5xl font-bold text-amber-300 drop-shadow-lg sm:text-6xl lg:text-7xl"
                        dir="rtl"
                        lang="ar"
                    >
                        ادْخُلُوا فِي السِّلْمِ كَافَّةً
                    </p>
                    <p class="text-lg text-amber-500/80 italic">
                        "Enter into Islam completely" — Al-Baqarah 2:208
                    </p>
                </div>

                <h1 class="mb-4 text-4xl font-bold tracking-tight text-white sm:text-5xl">
                    Which Path Will You Take?
                </h1>
                <p class="mx-auto mb-10 max-w-2xl text-lg text-gray-400">
                    Every action you take places you in one of two groups. Know the difference.
                    Test yourself. Choose your eternal home.
                </p>

                <!-- Two path buttons -->
                <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
                    <Link
                        href="/surahs"
                        class="inline-flex items-center gap-2 rounded-xl bg-emerald-600 px-8 py-3.5 font-semibold text-white shadow-lg shadow-emerald-900/50 transition hover:bg-emerald-500"
                    >
                        🌿 Take Quran Quiz
                    </Link>
                    <Link
                        href="/major-sins"
                        class="inline-flex items-center gap-2 rounded-xl bg-red-800 px-8 py-3.5 font-semibold text-white shadow-lg shadow-red-950/50 transition hover:bg-red-700"
                    >
                        ⚠️ Test on Major Sins
                    </Link>
                </div>
            </div>
        </section>

        <!-- ─── TWO-CAMP BANNER ─── -->
        <section class="px-6 pb-6 lg:px-12">
            <div class="grid grid-cols-2 gap-3">
                <div class="rounded-xl border border-emerald-700/40 bg-gradient-to-r from-emerald-950 to-teal-950 p-5 text-center">
                    <p class="font-arabic mb-1 text-2xl text-emerald-400" lang="ar" dir="rtl">حِزْبُ اللَّهِ</p>
                    <p class="font-semibold text-emerald-300">Hizb Allah — Party of Allah</p>
                    <p class="mt-1 text-xs text-emerald-600">أُولَٰئِكَ حِزْبُ اللَّهِ ۚ أَلَا إِنَّ حِزْبَ اللَّهِ هُمُ الْمُفْلِحُونَ</p>
                    <p class="mt-1 text-xs text-emerald-700 italic">"Indeed it is the party of Allah who are the successful" — 58:22</p>
                </div>
                <div class="rounded-xl border border-red-800/40 bg-gradient-to-r from-red-950 to-rose-950 p-5 text-center">
                    <p class="font-arabic mb-1 text-2xl text-red-400" lang="ar" dir="rtl">حِزْبُ الشَّيْطَانِ</p>
                    <p class="font-semibold text-red-300">Hizb ush-Shaitan — Party of Satan</p>
                    <p class="mt-1 text-xs text-red-700">أَلَا إِنَّ حِزْبَ الشَّيْطَانِ هُمُ الْخَاسِرُونَ</p>
                    <p class="mt-1 text-xs text-red-800 italic">"Indeed it is the party of Satan who are the losers" — 58:19</p>
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
                <div class="relative flex flex-col overflow-hidden rounded-2xl border border-amber-400/30 bg-gradient-to-b from-amber-950 via-yellow-950 to-amber-900/60 shadow-2xl shadow-amber-900/30">
                    <!-- Shine effect -->
                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-br from-amber-300/10 via-transparent to-transparent"></div>
                    <!-- Popular badge -->
                    <div class="absolute top-4 right-4 rounded-full bg-amber-400/20 px-3 py-1 text-xs font-semibold text-amber-300">Highest Rank</div>

                    <div class="p-6">
                        <!-- Group label -->
                        <p class="mb-3 text-xs font-semibold uppercase tracking-widest text-emerald-500">حِزْبُ اللَّهِ — Hizb Allah</p>
                        <!-- Arabic title -->
                        <p class="font-arabic mb-1 text-3xl text-amber-300" lang="ar" dir="rtl">جَنَّةُ الْفِرْدَوْسِ</p>
                        <h3 class="mb-1 text-xl font-bold text-amber-200">Premium Jannah</h3>
                        <p class="mb-4 text-sm text-amber-500">Jannat ul-Firdous — The Highest Paradise</p>

                        <!-- Difficulty level -->
                        <div class="mb-4 flex items-center gap-2 rounded-lg bg-amber-900/40 px-3 py-2">
                            <span class="text-amber-400">✦</span>
                            <div>
                                <p class="text-xs font-semibold text-amber-300">Level 3 — الإحسان</p>
                                <p class="text-xs text-amber-600">Ihsan (Excellence in worship)</p>
                            </div>
                        </div>

                        <!-- Implementation -->
                        <div class="mb-5 space-y-2 text-sm">
                            <p class="font-arabic text-base text-amber-400" lang="ar" dir="rtl">ثُمَّ اسْتَقَامُوا</p>
                            <p class="text-xs text-amber-600 italic">"Then they remained steadfast" — 46:13</p>
                        </div>

                        <ul class="mb-6 space-y-2.5">
                            <li class="flex items-start gap-2 text-sm text-amber-200">
                                <span class="mt-0.5 text-amber-400">★</span>
                                <span><strong>السابقون الأولون</strong> — The Forerunners</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-amber-200">
                                <span class="mt-0.5 text-amber-400">★</span>
                                <span><strong>المقربون</strong> — Those Brought Near to Allah</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-amber-200">
                                <span class="mt-0.5 text-amber-400">★</span>
                                <span><strong>الصديقون والشهداء</strong> — The Truthful &amp; Martyrs</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-amber-200">
                                <span class="mt-0.5 text-amber-400">★</span>
                                <span>لا يخافون لومة لائم — Fear no blame</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-amber-200">
                                <span class="mt-0.5 text-amber-400">★</span>
                                <span>Level 1+2+3 implementation — Self, Family &amp; Humanity</span>
                            </li>
                        </ul>

                        <div class="font-arabic mb-2 rounded-lg border border-amber-700/30 bg-amber-900/30 p-3 text-center text-sm text-amber-500" lang="ar" dir="rtl">
                            عَزْمُ الْأُمُورِ
                        </div>
                        <p class="mb-6 text-center text-xs text-amber-700 italic">"The resolve of matters" — steadfast at highest level</p>
                    </div>

                    <div class="mt-auto p-6 pt-0">
                        <button
                            disabled
                            class="w-full cursor-not-allowed rounded-xl border border-amber-600/30 bg-amber-900/40 px-4 py-3 text-sm font-semibold text-amber-600 opacity-60"
                        >
                            ✦ Coming Soon
                        </button>
                        <p class="mt-2 text-center text-xs text-amber-800">Advanced quiz — in development</p>
                    </div>
                </div>

                <!-- ══════ CARD 2: STANDARD JANNAH ══════ -->
                <div class="relative flex flex-col overflow-hidden rounded-2xl border border-emerald-700/40 bg-gradient-to-b from-emerald-950 via-teal-950 to-emerald-900/60 shadow-2xl shadow-emerald-900/20">
                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-br from-emerald-400/5 via-transparent to-transparent"></div>

                    <div class="p-6">
                        <p class="mb-3 text-xs font-semibold uppercase tracking-widest text-emerald-500">حِزْبُ اللَّهِ — Hizb Allah</p>
                        <p class="font-arabic mb-1 text-3xl text-emerald-300" lang="ar" dir="rtl">أَصْحَابُ الْيَمِينِ</p>
                        <h3 class="mb-1 text-xl font-bold text-emerald-200">Standard Jannah</h3>
                        <p class="mb-4 text-sm text-emerald-600">Ashab ul-Yameen — People of the Right</p>

                        <div class="mb-4 flex items-center gap-2 rounded-lg bg-emerald-900/40 px-3 py-2">
                            <span class="text-emerald-400">◆</span>
                            <div>
                                <p class="text-xs font-semibold text-emerald-300">Level 1 &amp; 2 — الإسلام والإيمان</p>
                                <p class="text-xs text-emerald-700">Islam (5 pillars) + Eemaan (6 articles)</p>
                            </div>
                        </div>

                        <div class="mb-5 space-y-1 text-sm">
                            <p class="font-arabic text-base text-emerald-400" lang="ar" dir="rtl">قُوا أَنفُسَكُمْ وَأَهْلِيكُمْ نَارًا</p>
                            <p class="text-xs text-emerald-700 italic">"Save yourselves and your families from Hellfire" — 66:6</p>
                        </div>

                        <ul class="mb-6 space-y-2.5">
                            <li class="flex items-start gap-2 text-sm text-emerald-200">
                                <span class="mt-0.5 text-emerald-400">✓</span>
                                <span><strong>أَصْحَابُ الْمَيْمَنَةِ</strong> — Companions of the Right Hand</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-emerald-200">
                                <span class="mt-0.5 text-emerald-400">✓</span>
                                <span>Fulfils 5 Pillars of Islam (Level 1 — self)</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-emerald-200">
                                <span class="mt-0.5 text-emerald-400">✓</span>
                                <span>Believes in 6 Articles of Eemaan (Level 2 — family)</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-emerald-200">
                                <span class="mt-0.5 text-emerald-400">✓</span>
                                <span>تَزَكَّى — Purifies the soul</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-emerald-200">
                                <span class="mt-0.5 text-emerald-400">✓</span>
                                <span>عَلَيْكُمْ أَنفُسَكُمْ — Saves themselves first</span>
                            </li>
                        </ul>

                        <div class="font-arabic mb-2 rounded-lg border border-emerald-700/30 bg-emerald-900/30 p-3 text-center text-sm text-emerald-500" lang="ar" dir="rtl">
                            وَتَوَاصَوْا بِالْحَقِّ وَتَوَاصَوْا بِالصَّبْرِ
                        </div>
                        <p class="mb-6 text-center text-xs text-emerald-800 italic">"Enjoin truth &amp; patience upon each other" — Al-Asr</p>
                    </div>

                    <div class="mt-auto p-6 pt-0">
                        <Link
                            href="/surahs"
                            class="block w-full rounded-xl bg-emerald-700 px-4 py-3 text-center text-sm font-semibold text-white transition hover:bg-emerald-600"
                        >
                            🌿 Start Quran Quiz
                        </Link>
                        <p class="mt-2 text-center text-xs text-emerald-800">Quiz by Surah — available now</p>
                    </div>
                </div>

                <!-- ══════ CARD 3: ASHAB USH-SHIMAAL (ACTIVE) ══════ -->
                <div class="relative flex flex-col overflow-hidden rounded-2xl border border-orange-700/50 bg-gradient-to-b from-orange-950 via-red-950 to-rose-950 shadow-2xl shadow-red-950/40 ring-1 ring-red-800/30">
                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-b from-orange-500/5 via-transparent to-transparent"></div>
                    <!-- Active badge -->
                    <div class="absolute top-4 right-4 rounded-full bg-red-600 px-3 py-1 text-xs font-bold text-white">⚠️ ACTIVE</div>

                    <div class="p-6">
                        <p class="mb-3 text-xs font-semibold uppercase tracking-widest text-red-500">حِزْبُ الشَّيْطَانِ — Hizb ush-Shaitan</p>
                        <p class="font-arabic mb-1 text-3xl text-orange-400" lang="ar" dir="rtl">أَصْحَابُ الشِّمَالِ</p>
                        <h3 class="mb-1 text-xl font-bold text-orange-200">Ashab ush-Shimaal</h3>
                        <p class="mb-4 text-sm text-orange-600">People of the Left — The Sinners</p>

                        <div class="mb-4 flex items-center gap-2 rounded-lg bg-red-900/40 px-3 py-2">
                            <span class="text-red-400">⚠</span>
                            <div>
                                <p class="text-xs font-semibold text-red-300">الكبائر — Major Sins</p>
                                <p class="text-xs text-red-700">30 Major Sins by Imam al-Dhahabi</p>
                            </div>
                        </div>

                        <div class="mb-5 space-y-1 text-sm">
                            <p class="font-arabic text-base text-orange-500" lang="ar" dir="rtl">الْمَاعُونَ — يُخَادِعُونَ اللَّهَ</p>
                            <p class="text-xs text-orange-700 italic">"They deceive Allah and the believers" — 2:9</p>
                        </div>

                        <ul class="mb-6 space-y-2.5">
                            <li class="flex items-start gap-2 text-sm text-orange-200">
                                <span class="mt-0.5 text-red-500">✗</span>
                                <span><strong>مُشْرِك / كَافِر / ظَالِم</strong> — Polytheist, Disbeliever, Oppressor</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-orange-200">
                                <span class="mt-0.5 text-red-500">✗</span>
                                <span>Commits the 30 Major Sins (Kaba'ir)</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-orange-200">
                                <span class="mt-0.5 text-red-500">✗</span>
                                <span>Shirk, Qatl, Sihr, Riba, Zina, Khamr…</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-orange-200">
                                <span class="mt-0.5 text-red-500">✗</span>
                                <span>أَصْحَابُ الْمَشْأَمَةِ — Left Hand companions</span>
                            </li>
                            <li class="flex items-start gap-2 text-sm text-orange-200">
                                <span class="mt-0.5 text-red-500">✗</span>
                                <span>Quran Book: Sijjeen — the record of the wicked</span>
                            </li>
                        </ul>

                        <div class="font-arabic mb-2 rounded-lg border border-red-800/40 bg-red-900/30 p-3 text-center text-sm text-red-500" lang="ar" dir="rtl">
                            فِي سَمُومٍ وَحَمِيمٍ
                        </div>
                        <p class="mb-6 text-center text-xs text-red-800 italic">"In scorching wind and scalding water" — Al-Waqi'ah 56:42</p>
                    </div>

                    <div class="mt-auto p-6 pt-0">
                        <Link
                            href="/major-sins"
                            class="block w-full rounded-xl bg-gradient-to-r from-red-700 to-rose-700 px-4 py-3.5 text-center text-sm font-bold text-white shadow-lg shadow-red-900/50 transition hover:from-red-600 hover:to-rose-600"
                        >
                            ⚠️ Take Major Sins Quiz
                        </Link>
                        <p class="mt-2 text-center text-xs text-red-800">Know what to avoid — active now</p>
                    </div>
                </div>

                <!-- ══════ CARD 4: WORST HELLFIRE ══════ -->
                <div class="relative flex flex-col overflow-hidden rounded-2xl border border-gray-800/60 bg-gradient-to-b from-gray-950 via-red-950/30 to-black shadow-2xl">
                    <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-red-950/20 to-transparent"></div>

                    <div class="p-6">
                        <p class="mb-3 text-xs font-semibold uppercase tracking-widest text-red-800">حِزْبُ الشَّيْطَانِ — Hizb ush-Shaitan</p>
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
                <div class="rounded-2xl border border-emerald-800/30 bg-gradient-to-br from-emerald-950 to-gray-950 p-6">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-900 text-lg font-bold text-emerald-400">1</span>
                        <div>
                            <p class="font-semibold text-emerald-300">Save Yourself</p>
                            <p class="text-xs text-gray-500">الفرض — Obligatory</p>
                        </div>
                    </div>
                    <p class="font-arabic mb-2 text-xl text-emerald-500" lang="ar" dir="rtl">عَلَيْكُمْ أَنفُسَكُمْ</p>
                    <p class="text-xs text-emerald-800 italic mb-3">"Upon you is [responsibility for] yourselves" — 5:105</p>
                    <ul class="space-y-1 text-sm text-gray-400">
                        <li class="flex items-center gap-2"><span class="text-emerald-600">•</span> Master the 5 Pillars of Islam</li>
                        <li class="flex items-center gap-2"><span class="text-emerald-600">•</span> Establish personal Ibadah</li>
                        <li class="flex items-center gap-2"><span class="text-emerald-600">•</span> Difficulty: Islam Level</li>
                    </ul>
                </div>
                <div class="rounded-2xl border border-teal-800/30 bg-gradient-to-br from-teal-950 to-gray-950 p-6">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-teal-900 text-lg font-bold text-teal-400">2</span>
                        <div>
                            <p class="font-semibold text-teal-300">Save Your Family</p>
                            <p class="text-xs text-gray-500">الفرض — Obligatory</p>
                        </div>
                    </div>
                    <p class="font-arabic mb-2 text-xl text-teal-500" lang="ar" dir="rtl">قُوا أَنفُسَكُمْ وَأَهْلِيكُمْ نَارًا</p>
                    <p class="text-xs text-teal-800 italic mb-3">"Protect yourselves and your families from Fire" — 66:6</p>
                    <ul class="space-y-1 text-sm text-gray-400">
                        <li class="flex items-center gap-2"><span class="text-teal-600">•</span> Teach your household</li>
                        <li class="flex items-center gap-2"><span class="text-teal-600">•</span> Build family upon Eemaan</li>
                        <li class="flex items-center gap-2"><span class="text-teal-600">•</span> Difficulty: Eemaan Level</li>
                    </ul>
                </div>
                <div class="rounded-2xl border border-cyan-800/30 bg-gradient-to-br from-cyan-950 to-gray-950 p-6">
                    <div class="mb-4 flex items-center gap-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-cyan-900 text-lg font-bold text-cyan-400">3</span>
                        <div>
                            <p class="font-semibold text-cyan-300">Save Humanity</p>
                            <p class="text-xs text-gray-500">المستحب — Recommended</p>
                        </div>
                    </div>
                    <p class="font-arabic mb-2 text-xl text-cyan-500" lang="ar" dir="rtl">كُنتُمْ خَيْرَ أُمَّةٍ أُخْرِجَتْ لِلنَّاسِ</p>
                    <p class="text-xs text-cyan-800 italic mb-3">"You are the best nation brought forth for humanity" — 3:110</p>
                    <ul class="space-y-1 text-sm text-gray-400">
                        <li class="flex items-center gap-2"><span class="text-cyan-600">•</span> Da'wah and enjoining good</li>
                        <li class="flex items-center gap-2"><span class="text-cyan-600">•</span> Establish justice in society</li>
                        <li class="flex items-center gap-2"><span class="text-cyan-600">•</span> Difficulty: Ihsan Level</li>
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
                        <div class="mb-4 inline-flex items-center gap-2 rounded-full bg-emerald-900/50 px-3 py-1 text-sm font-semibold text-emerald-400">
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
                        <div class="mb-4 inline-flex items-center gap-2 rounded-full bg-amber-900/50 px-3 py-1 text-sm font-semibold text-amber-400">
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
            <p class="font-arabic mb-3 text-3xl text-amber-400" lang="ar" dir="rtl">وَمَن يَتَوَلَّ اللَّهَ وَرَسُولَهُ وَالَّذِينَ آمَنُوا فَإِنَّ حِزْبَ اللَّهِ هُمُ الْغَالِبُونَ</p>
            <p class="mb-8 text-amber-600 italic">"Whoever allies himself with Allah, His Messenger, and the believers — indeed, the party of Allah, they are the dominant." — 5:56</p>
            <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
                <Link
                    href="/surahs"
                    class="inline-flex items-center gap-2 rounded-xl bg-emerald-700 px-8 py-4 text-base font-bold text-white shadow-lg transition hover:bg-emerald-600"
                >
                    🌿 Start Quran Quiz by Surah
                </Link>
                <Link
                    href="/major-sins"
                    class="inline-flex items-center gap-2 rounded-xl border border-red-800 bg-red-950/50 px-8 py-4 text-base font-bold text-red-400 transition hover:bg-red-900/50"
                >
                    ⚠️ Test Your Knowledge of Major Sins
                </Link>
            </div>
            <p class="mt-8 text-sm text-gray-700">
                Kaffah MVP — Last 10 Surahs (105–114) &amp; 30 Major Sins by Imam al-Dhahabi
            </p>
        </section>

    </div>
</template>
