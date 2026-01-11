<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import UpdateGeneralSettingsForm from "@/Pages/Settings/Partials/UpdateGeneralSettingsForm.vue";
import UpdateSocialSettingsForm from "./Partials/UpdateSocialSettingsForm.vue";

defineProps({
    settings: Object,
    socialSettings: Object,
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

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <UpdateSocialSettingsForm :settings="socialSettings" />
            </div>
        </div>
    </AppLayout>
</template>
