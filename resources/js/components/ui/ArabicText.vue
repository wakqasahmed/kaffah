<script setup lang="ts">
defineProps<{
    text: string;
    size?: 'sm' | 'base' | 'lg' | 'xl' | '2xl' | '3xl';
}>();
</script>

<template>
    <span
        dir="rtl"
        lang="ar"
        class="font-arabic leading-relaxed"
        :class="{
            'text-sm': size === 'sm',
            'text-base': size === 'base' || !size,
            'text-lg': size === 'lg',
            'text-xl': size === 'xl',
            'text-2xl': size === '2xl',
            'text-3xl': size === '3xl',
        }"
    >
        {{ text }}
    </span>
</template>
