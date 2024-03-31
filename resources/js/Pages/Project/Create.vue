<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import CreateProjectForm from "@/Pages/Project/Partials/CreateProjectForm.vue";

const links = [
    { title: "Projects", url: route("admin.projects.index") },
    {
        title: "Create",
        url: route("admin.projects.create"),
    },
];
</script>
<template>
    <AppLayout title="Create Project">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                New Project
            </h2>
            <Breadcrumbs :links />
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-5 sm:px-6 lg:px-8">
                <CreateProjectForm />
            </div>
        </div>
    </AppLayout>
</template>
