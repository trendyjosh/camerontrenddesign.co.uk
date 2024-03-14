<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import PrimaryButtonLink from "@/Components/PrimaryButtonLink.vue";
import UpdatePageForm from "@/Pages/Page/Partials/UpdatePageForm.vue";

const props = defineProps({
    page: Object,
});

const links = [
    { title: "Pages", url: route("pages.index") },
    {
        title: props.page.title,
        url: route("pages.show", { page: props.page.slug }),
    },
];
</script>

<template>
    <AppLayout title="Page">
        <template #header>
            <Breadcrumbs :links />
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ page.title }} Page
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white">
                        <h2 class="text-xl font-semibold text-gray-900">
                            Title
                        </h2>
                        <p class="text-lg font-medium text-gray-900">
                            {{ page.title }}
                        </p>

                        <h2
                            v-if="page.hero"
                            class="mt-6 text-xl font-semibold text-gray-900"
                        >
                            Hero
                        </h2>
                        <div v-if="page.hero" class="mt-2 aspect-hero">
                            <img
                                :src="'/storage/' + page.hero"
                                :alt="page.title"
                                class="w-full h-full object-cover"
                            />
                        </div>

                        <h2
                            v-if="page.sub_title"
                            class="mt-6 text-xl font-semibold text-gray-900"
                        >
                            Subtitle
                        </h2>
                        <p class="text-lg font-medium text-gray-900">
                            {{ page.sub_title }}
                        </p>
                    </div>
                    <div
                        class="flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md"
                    >
                        <PrimaryButtonLink
                            :href="
                                route('pages.edit', {
                                    page: page.slug,
                                })
                            "
                            >Edit</PrimaryButtonLink
                        >
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
