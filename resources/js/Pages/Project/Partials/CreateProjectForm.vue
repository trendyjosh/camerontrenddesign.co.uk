<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import ImageInput from "@/Components/ImageInput.vue";

const props = defineProps({
    page: Object,
});

const form = useForm({
    title: "",
    hero: null,
    sub_title: "",
});

const heroInput = ref(null);

const createProject = () => {
    if (heroInput.value) {
        form.hero = heroInput.value.files[0];
    }

    form.post(route("admin.projects.store"), {
        errorBag: "createProject",
        preserveScroll: true,
        onSuccess: () => clearFileInput(),
    });
};

const clearFileInput = () => {
    if (heroInput.value?.value) {
        heroInput.value.value = null;
    }
};
</script>

<template>
    <FormSection @submitted="createProject">
        <template #title>Project Details</template>

        <template #description>
            Update the project sub title, hero and thumb image.
        </template>

        <template #form>
            <!-- Title -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="title" value="Title" />
                <TextInput
                    id="title"
                    v-model="form.title"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="title"
                />
                <InputError :message="form.errors.title" class="mt-2" />
            </div>

            <!-- Project Hero -->
            <div class="col-span-6 sm:col-span-4">
                <ImageInput
                    v-model="heroInput"
                    name="Hero"
                    class="aspect-hero"
                />

                <InputError :message="form.errors.hero" class="mt-2" />
            </div>

            <!-- Subtitle -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="sub_title" value="Subtitle" />
                <TextInput
                    id="sub_title"
                    v-model="form.sub_title"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="sub_title"
                />
                <InputError :message="form.errors.sub_title" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Created.
            </ActionMessage>

            <PrimaryButton
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Create
            </PrimaryButton>
        </template>
    </FormSection>
</template>
