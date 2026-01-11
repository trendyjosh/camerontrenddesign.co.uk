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
    site_facebook: props.settings.site_facebook,
    site_pinterest: props.settings.site_pinterest,
    site_linkedin: props.settings.site_linkedin,
    site_instagram: props.settings.site_instagram,
});

const updateSocialSettings = () => {
    form.post(route("admin.settings.update-social"), {
        errorBag: "updateSocialSettings",
        preserveScroll: true,
    });
};
</script>

<template>
    <FormSection @submitted="updateSocialSettings">
        <template #title> Social Links </template>

        <template #description>
            Update social media links. Empty links will not appear on the
            website.
        </template>

        <template #form>
            <!-- Facebook -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="site_facebook" value="Facebook" />
                <TextInput
                    id="site_facebook"
                    v-model="form.site_facebook"
                    class="mt-1 block w-full"
                    autocomplete="site_facebook"
                />
                <InputError :message="form.errors.site_facebook" class="mt-2" />
            </div>

            <!-- Pinterest -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="site_pinterest" value="Pinterest" />
                <TextInput
                    id="site_pinterest"
                    v-model="form.site_pinterest"
                    class="mt-1 block w-full"
                    autocomplete="site_pinterest"
                />
                <InputError
                    :message="form.errors.site_pinterest"
                    class="mt-2"
                />
            </div>

            <!-- LinkedIn -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="site_linkedin" value="LinkedIn" />
                <TextInput
                    id="site_linkedin"
                    v-model="form.site_linkedin"
                    class="mt-1 block w-full"
                    autocomplete="site_linkedin"
                />
                <InputError :message="form.errors.site_linkedin" class="mt-2" />
            </div>

            <!-- Instagram -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="site_instagram" value="Instagram" />
                <TextInput
                    id="site_instagram"
                    v-model="form.site_instagram"
                    class="mt-1 block w-full"
                    autocomplete="site_instagram"
                />
                <InputError
                    :message="form.errors.site_instagram"
                    class="mt-2"
                />
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
