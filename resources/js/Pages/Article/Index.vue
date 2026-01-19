<script setup>
import PrimaryButtonLink from "@/Components/PrimaryButtonLink.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import ArticlesTable from "@/Pages/Article/Partials/ArticlesTable.vue";

const props = defineProps({
    articles: Array,
});
</script>

<template>
    <AppLayout title="Press Features">
        <template #header>
            <div class="flex">
                <h2
                    class="font-semibold text-xl text-gray-800 leading-tight grow"
                >
                    Press Features
                </h2>
                <PrimaryButtonLink :href="route('admin.articles.create')">
                    Create
                </PrimaryButtonLink>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <ArticlesTable :articles />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
