<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import PagesTable from "@/Pages/Page/Partials/PagesTable.vue";

const props = defineProps({
    pages: Array,
});
</script>

<template>
    <AppLayout title="Pages">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pages
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <PagesTable :pages />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
