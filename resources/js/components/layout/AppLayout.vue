<script setup lang="ts">
import NavBar from '@/components/layout/NavBar.vue';
</script>

<template>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-950">
        <NavBar theme="light" />
        <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <slot />
        </main>
    </div>
</template>
