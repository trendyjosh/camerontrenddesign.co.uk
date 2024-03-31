<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import UpdateProjectForm from "@/Pages/Project/Partials/UpdateProjectForm.vue";

const props = defineProps({
    project: Object,
});
</script>

<template>
    <AppLayout title="Project">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ project.title }} Project
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <UpdateProjectForm :project />
            </div>
        </div>
    </AppLayout>
</template>
