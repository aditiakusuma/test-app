<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ArticleCard from '@/Components/ArticleCard.vue'
import Pagination  from '@/Components/Pagination.vue'
defineProps({
    articles: Array
})
</script>

<template>
    <AppLayout title="Articles">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Articles
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <a :href="`/articles/${id}`" v-for="({ title, content, comments_count, id}, index) in articles.data" :key="index">
                        <ArticleCard :title="title" :content="content" :comments-count="comments_count" />
                    </a>
                    <Pagination :to="articles.to" :from="articles.from" :total="articles.total" :links="articles.links" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
