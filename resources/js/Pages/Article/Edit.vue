<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import UpdateArticleForm from "@/Pages/Article/Partials/UpdateArticleForm.vue";

const props = defineProps({
    article: Object,
});
const links = [
    { title: "Articles", url: route("admin.articles.index") },
    {
        title: props.article.title,
        url: route("admin.articles.show", { article: props.article.id }),
    },
    {
        title: "Edit",
        url: route("admin.articles.edit", { article: props.article.id }),
    },
];
</script>

<template>
    <AppLayout title="Edit Article">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ article.title }} Article
            </h2>
            <Breadcrumbs :links />
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <UpdateArticleForm :article />
            </div>
        </div>
    </AppLayout>
</template>
