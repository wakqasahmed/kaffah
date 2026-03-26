import { onMounted, onUnmounted, ref } from 'vue';

export interface Verse {
    arabic: string;
    english: string;
    ref: string;
}

export function useVerseRotation(verses: Verse[], intervalMs = 7000) {
    const currentVerse = ref(0);
    const transitioning = ref(false);
    let timer: ReturnType<typeof setInterval>;

    function nextVerse() {
        transitioning.value = true;
        setTimeout(() => {
            currentVerse.value = (currentVerse.value + 1) % verses.length;
            transitioning.value = false;
        }, 400);
    }

    function goTo(index: number) {
        transitioning.value = true;
        setTimeout(() => {
            currentVerse.value = index;
            transitioning.value = false;
        }, 400);
    }

    onMounted(() => {
        timer = setInterval(nextVerse, intervalMs);
    });

    onUnmounted(() => {
        clearInterval(timer);
    });

    return { currentVerse, transitioning, goTo };
}
