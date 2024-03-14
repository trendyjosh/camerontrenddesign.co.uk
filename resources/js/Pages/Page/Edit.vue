<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import UpdatePageForm from "@/Pages/Page/Partials/UpdatePageForm.vue";

const props = defineProps({
    page: Object,
});
</script>

<template>
    <AppLayout title="Page">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ page.title }} Page
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <UpdatePageForm :page />
            </div>
        </div>
    </AppLayout>
</template>
