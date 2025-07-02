<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import PrimaryButtonLink from "@/Components/PrimaryButtonLink.vue";

const props = defineProps({
    article: Object,
});

const links = [
    { title: "Articles", url: route("admin.articles.index") },
    {
        title: props.article.title,
        url: route("admin.articles.show", { article: props.article.id }),
    },
];
</script>

<template>
    <AppLayout title="Article">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ article.title }} Article
            </h2>
            <Breadcrumbs :links />
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white">
                        <h2 class="text-xl font-semibold text-gray-900">
                            Title
                        </h2>
                        <p class="text-lg font-medium text-gray-900">
                            {{ article.title }}
                        </p>

                        <h2
                            v-if="article.image"
                            class="mt-6 text-xl font-semibold text-gray-900"
                        >
                            Image
                        </h2>
                        <div v-if="article.image" class="mt-2 aspect-image">
                            <img
                                :src="'/storage/' + article.image"
                                :alt="article.title"
                                class="w-full h-full object-cover"
                            />
                        </div>

                        <h2 class="mt-6 text-xl font-semibold text-gray-900">
                            Description
                        </h2>
                        <p class="text-lg font-medium text-gray-900">
                            {{ article.description }}
                        </p>

                        <h2
                            v-if="article.link"
                            class="mt-6 text-xl font-semibold text-gray-900"
                        >
                            Link
                        </h2>
                        <p class="text-lg font-medium text-gray-900">
                            {{ article.link }}
                        </p>

                        <h2 class="mt-6 text-xl font-semibold text-gray-900">
                            Status
                        </h2>
                        <p class="text-lg font-medium text-gray-900">
                            {{ article.status == 1 ? "Live" : "Archived" }}
                        </p>
                    </div>
                    <div
                        class="flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md"
                    >
                        <PrimaryButtonLink
                            :href="
                                route('admin.articles.edit', {
                                    article: article.id,
                                })
                            "
                        >
                            Edit
                        </PrimaryButtonLink>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
