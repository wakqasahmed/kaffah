<script setup lang="ts">
defineProps<{
    label: string;
    index: number;
    selected: boolean;
    correct: boolean | null;
    disabled: boolean;
}>();

defineEmits<{
    select: [index: number];
}>();
</script>

<template>
    <button
        :disabled="disabled"
        class="w-full rounded-lg border-2 px-4 py-3 text-left transition-all"
        :class="{
            'border-gray-200 bg-white hover:border-brand-300 hover:bg-brand-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:border-brand-600':
                !selected && correct === null,
            'border-brand-500 bg-brand-50 dark:border-brand-400 dark:bg-brand-900/30':
                selected && correct === null,
            'border-brand-500 bg-brand-100 dark:border-brand-400 dark:bg-brand-900/50':
                correct === true,
            'border-danger-500 bg-danger-100 dark:border-danger-400 dark:bg-danger-900/50':
                selected && correct === false,
            'cursor-not-allowed opacity-60': disabled && !selected && correct !== true,
        }"
        @click="$emit('select', index)"
    >
        <div class="flex items-center gap-3">
            <span
                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full text-sm font-bold"
                :class="{
                    'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300':
                        correct === null && !selected,
                    'bg-brand-500 text-white': correct === true || (selected && correct === null),
                    'bg-danger-500 text-white': selected && correct === false,
                }"
            >
                {{ String.fromCharCode(65 + index) }}
            </span>
            <span class="text-sm font-medium text-gray-800 dark:text-gray-200">
                {{ label }}
            </span>
        </div>
    </button>
</template>
