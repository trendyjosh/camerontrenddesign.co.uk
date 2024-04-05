<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import PrimaryButtonLink from "@/Components/PrimaryButtonLink.vue";
import ProjectsTable from "@/Pages/Project/Partials/ProjectsTable.vue";
import SecondaryButtonLink from "@/Components/SecondaryButtonLink.vue";

const props = defineProps({
    projects: Array,
});
</script>

<template>
    <AppLayout title="Projects">
        <template #header>
            <div class="flex">
                <h2
                    class="font-semibold text-xl text-gray-800 leading-tight grow"
                >
                    Projects
                </h2>
                <SecondaryButtonLink
                    class="mr-3"
                    :href="route('admin.projects.edit-order')"
                >
                    Re-Order
                </SecondaryButtonLink>
                <PrimaryButtonLink :href="route('admin.projects.create')">
                    Create
                </PrimaryButtonLink>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <ProjectsTable :projects />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
