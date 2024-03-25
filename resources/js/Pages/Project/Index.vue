<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import ProjectsTable from "@/Pages/Project/Partials/ProjectsTable.vue";

const props = defineProps({
    projects: Array,
});

const links = [{ title: "Projects", url: route("admin.projects.index") }];
</script>

<template>
    <AppLayout title="Projects">
        <template #header>
            <Breadcrumbs :links />
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Projects
            </h2>
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
