<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import CreateArticleForm from "@/Pages/Article/Partials/CreateArticleForm.vue";

const links = [
    { title: "Articles", url: route("admin.articles.index") },
    {
        title: "Create",
        url: route("admin.articles.create"),
    },
];
</script>

<template>
    <AppLayout title="Create Article">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                New Article
            </h2>
            <Breadcrumbs :links />
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <CreateArticleForm />
            </div>
        </div>
    </AppLayout>
</template>
