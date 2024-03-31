<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import UpdatePageForm from "@/Pages/Page/Partials/UpdatePageForm.vue";

const props = defineProps({
    page: Object,
});
const links = [
    { title: "Pages", url: route("admin.pages.index") },
    {
        title: props.page.title,
        url: route("admin.pages.show", { page: props.page.slug }),
    },
    {
        title: "Edit",
        url: route("admin.pages.edit", { page: props.page.slug }),
    },
];
</script>

<template>
    <AppLayout title="Page">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ page.title }} Page
            </h2>
            <Breadcrumbs :links />
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <UpdatePageForm :page />
            </div>
        </div>
    </AppLayout>
</template>
