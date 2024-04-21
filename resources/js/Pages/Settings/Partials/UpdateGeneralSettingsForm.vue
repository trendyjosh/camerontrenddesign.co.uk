<script setup>
import { useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    settings: Object,
});

const form = useForm({
    _method: "PUT",
    site_phone: props.settings.site_phone,
    site_email: props.settings.site_email,
});

const updateGeneralSettings = () => {
    form.post(route("admin.settings.update"), {
        errorBag: "updateGeneralSettings",
        preserveScroll: true,
    });
};
</script>

<template>
    <FormSection @submitted="updateGeneralSettings">
        <template #title> General Settings </template>

        <template #description> Update general website settings. </template>

        <template #form>
            <!-- Phone -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="site_phone" value="Phone" />
                <TextInput
                    id="site_phone"
                    v-model="form.site_phone"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="site_phone"
                />
                <InputError :message="form.errors.site_phone" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="site_email" value="Email" />
                <TextInput
                    id="site_email"
                    v-model="form.site_email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autocomplete="site_email"
                />
                <InputError :message="form.errors.site_email" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Saved.
            </ActionMessage>

            <PrimaryButton
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Save
            </PrimaryButton>
        </template>
    </FormSection>
</template>
