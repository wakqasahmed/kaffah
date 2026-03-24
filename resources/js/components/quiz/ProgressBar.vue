<script setup lang="ts">
defineProps<{
    current: number;
    total: number;
}>();
</script>

<template>
    <div class="mb-6">
        <div class="mb-2 flex items-center justify-between text-sm text-gray-600 dark:text-gray-400">
            <span>Question {{ current }} of {{ total }}</span>
            <span>{{ Math.round((current / total) * 100) }}%</span>
        </div>
        <div class="h-2 overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700">
            <div
                class="h-full rounded-full bg-emerald-500 transition-all duration-500"
                :style="{ width: `${(current / total) * 100}%` }"
            />
        </div>
    </div>
</template>
