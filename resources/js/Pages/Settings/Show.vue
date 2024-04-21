<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import UpdateGeneralSettingsForm from "@/Pages/Settings/Partials/UpdateGeneralSettingsForm.vue";

defineProps({
    settings: Object,
});
</script>

<template>
    <AppLayout title="Settings">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Settings
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <UpdateGeneralSettingsForm :settings="settings" />
            </div>
        </div>
    </AppLayout>
</template>
