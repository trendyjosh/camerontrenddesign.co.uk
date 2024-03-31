<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import UpdateProjectForm from "@/Pages/Project/Partials/UpdateProjectForm.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import DeleteProjectForm from "@/Pages/Project/Partials/DeleteProjectForm.vue";

const props = defineProps({
    project: Object,
});

const links = [
    { title: "Projects", url: route("admin.projects.index") },
    {
        title: props.project.title,
        url: route("admin.projects.show", { project: props.project.slug }),
    },
    {
        title: "Edit",
        url: route("admin.projects.edit", { project: props.project.slug }),
    },
];
</script>

<template>
    <AppLayout title="Project">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ project.title }} Project
            </h2>
            <Breadcrumbs :links />
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <UpdateProjectForm :project />

                <SectionBorder />

                <DeleteProjectForm :project class="mt-10 sm:mt-0" />
            </div>
        </div>
    </AppLayout>
</template>
