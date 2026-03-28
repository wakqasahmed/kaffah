<script setup lang="ts">
import { computed } from 'vue';
import { useVerseRotation, type Verse } from '@/composables/useVerseRotation';

interface Props {
    verses: Verse[];
    theme: 'amber' | 'emerald' | 'red' | 'dark';
    badgeArabic: string;
    badgeLabel?: string;
    title: string;
    subtitle: string;
}

const props = defineProps<Props>();

const { currentVerse, transitioning, goTo } = useVerseRotation(props.verses);

const themes = {
    amber: {
        gradient: 'from-amber-950/80',
        glow: 'bg-amber-500/8',
        badgeBorder: 'border-amber-500/30',
        badgeBg: 'bg-amber-500/10',
        badgeText: 'text-amber-400',
        badgeSep: 'text-amber-600',
        arabicText: 'text-amber-200',
        englishText: 'text-amber-100/80',
        refText: 'text-amber-500',
        dotActive: 'bg-amber-400',
        dotInactive: 'bg-amber-800 hover:bg-amber-600',
        titleText: 'text-amber-200',
        subtitleText: 'text-amber-300/70',
    },
    emerald: {
        gradient: 'from-emerald-950/80',
        glow: 'bg-emerald-500/6',
        badgeBorder: 'border-emerald-500/30',
        badgeBg: 'bg-emerald-500/10',
        badgeText: 'text-emerald-400',
        badgeSep: 'text-emerald-600',
        arabicText: 'text-emerald-200',
        englishText: 'text-emerald-100/80',
        refText: 'text-emerald-500',
        dotActive: 'bg-emerald-400',
        dotInactive: 'bg-emerald-800 hover:bg-emerald-600',
        titleText: 'text-emerald-200',
        subtitleText: 'text-emerald-300/70',
    },
    red: {
        gradient: 'from-red-950/80',
        glow: 'bg-red-500/6',
        badgeBorder: 'border-red-500/30',
        badgeBg: 'bg-red-500/10',
        badgeText: 'text-red-400',
        badgeSep: 'text-red-600',
        arabicText: 'text-orange-200',
        englishText: 'text-orange-100/80',
        refText: 'text-red-500',
        dotActive: 'bg-red-400',
        dotInactive: 'bg-red-900 hover:bg-red-700',
        titleText: 'text-orange-200',
        subtitleText: 'text-orange-300/70',
    },
    dark: {
        gradient: 'from-gray-900/90',
        glow: 'bg-red-900/10',
        badgeBorder: 'border-gray-700/50',
        badgeBg: 'bg-gray-800/50',
        badgeText: 'text-gray-400',
        badgeSep: 'text-gray-600',
        arabicText: 'text-gray-300',
        englishText: 'text-gray-200/70',
        refText: 'text-gray-500',
        dotActive: 'bg-gray-400',
        dotInactive: 'bg-gray-800 hover:bg-gray-600',
        titleText: 'text-gray-300',
        subtitleText: 'text-gray-400/70',
    },
} as const;

const t = computed(() => themes[props.theme]);
</script>

<template>
    <section class="relative overflow-hidden">
        <div class="pointer-events-none absolute inset-0">
            <div :class="['absolute inset-0 bg-gradient-to-b via-gray-950 to-gray-950', t.gradient]"></div>
            <div :class="['absolute top-1/3 left-1/2 h-[500px] w-[500px] -translate-x-1/2 -translate-y-1/2 rounded-full blur-3xl', t.glow]"></div>
        </div>

        <div class="relative z-10 px-6 py-20 text-center lg:py-28 lg:px-12">
            <!-- Badge -->
            <div :class="['mb-8 inline-flex items-center gap-2 rounded-full border px-5 py-2 text-sm', t.badgeBorder, t.badgeBg, t.badgeText]">
                <span class="font-arabic text-base" lang="ar" dir="rtl">{{ badgeArabic }}</span>
                <span v-if="badgeLabel" :class="['mx-0.5', t.badgeSep]">·</span>
                <span v-if="badgeLabel">{{ badgeLabel }}</span>
            </div>

            <!-- Rotating verse -->
            <div class="mx-auto mb-8 max-w-3xl">
                <div
                    class="transition-opacity duration-400"
                    :class="transitioning ? 'opacity-0' : 'opacity-100'"
                >
                    <p
                        v-if="verses[currentVerse].arabic"
                        :class="['font-arabic mb-4 text-3xl leading-relaxed lg:text-4xl', t.arabicText]"
                        lang="ar"
                        dir="rtl"
                    >{{ verses[currentVerse].arabic }}</p>
                    <p :class="['mb-3 text-base lg:text-lg italic', t.englishText]">
                        "{{ verses[currentVerse].english }}"
                    </p>
                    <p
                        v-if="verses[currentVerse].ref"
                        :class="['text-sm font-semibold tracking-wider uppercase', t.refText]"
                    >— {{ verses[currentVerse].ref }}</p>
                </div>
            </div>

            <!-- Dots -->
            <div class="mb-10 flex justify-center gap-2">
                <button
                    v-for="(_, i) in verses"
                    :key="i"
                    class="h-2 rounded-full transition-all"
                    :class="i === currentVerse ? ['w-6', t.dotActive] : ['w-2', t.dotInactive]"
                    @click="goTo(i)"
                    :aria-label="`Go to verse ${i + 1}`"
                />
            </div>

            <!-- Title + subtitle -->
            <h1 :class="['mb-3 text-4xl font-bold lg:text-5xl', t.titleText]">{{ title }}</h1>
            <p :class="['mx-auto max-w-xl text-lg', t.subtitleText]">{{ subtitle }}</p>
        </div>
    </section>
</template>
