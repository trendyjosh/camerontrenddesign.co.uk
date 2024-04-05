<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import ProjectsOrderTable from "./Partials/ProjectsOrderTable.vue";

const props = defineProps({
    projects: Array,
});

const links = [
    { title: "Projects", url: route("admin.projects.index") },
    {
        title: "Re-Order",
        url: route("admin.projects.edit-order"),
    },
];
</script>

<template>
    <AppLayout title="Re-order Projects">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight grow">
                Re-order Projects
            </h2>
            <Breadcrumbs :links />
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <ProjectsOrderTable :projects />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
