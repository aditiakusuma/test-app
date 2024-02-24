<script setup>
defineProps({
    title: String,
    content: String,
    commentsCount: Number,
});
</script>

<template>
    <div class="w-full border last:border-b-0 p-6 py-4">
        <h3 class="font-bold text-2xl">{{ title }}</h3>
        <p class="line-clamp-1">{{ content }}</p>
        <div v-if="commentsCount" class="text-gray-500 text-sm">
            Comments ({{ commentsCount }})
        </div>
    </div>
</template>
