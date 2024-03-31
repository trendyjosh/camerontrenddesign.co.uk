<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import PrimaryButtonLink from "@/Components/PrimaryButtonLink.vue";

const props = defineProps({
    project: Object,
});

console.log(props);

console.log(props.project);

const links = [
    { title: "Projects", url: route("admin.projects.index") },
    {
        title: props.project.title,
        url: route("admin.projects.show", { project: props.project.slug }),
    },
];
</script>

<template>
    <AppLayout title="Project">
        <template #header>
            <Breadcrumbs :links />
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ project.title }} Project
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
                            {{ project.title }}
                        </p>

                        <h2
                            v-if="project.hero"
                            class="mt-6 text-xl font-semibold text-gray-900"
                        >
                            Hero
                        </h2>
                        <div v-if="project.hero" class="mt-2 aspect-hero">
                            <img
                                :src="'/storage/' + project.hero"
                                :alt="project.title"
                                class="w-full h-full object-cover"
                            />
                        </div>

                        <h2
                            v-if="project.sub_title"
                            class="mt-6 text-xl font-semibold text-gray-900"
                        >
                            Subtitle
                        </h2>
                        <p class="text-lg font-medium text-gray-900">
                            {{ project.sub_title }}
                        </p>
                    </div>
                    <div
                        class="flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md"
                    >
                        <PrimaryButtonLink
                            :href="
                                route('admin.projects.edit', {
                                    project: project.slug,
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
