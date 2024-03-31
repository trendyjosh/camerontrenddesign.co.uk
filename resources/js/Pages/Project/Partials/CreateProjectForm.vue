<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    page: Object,
});

const form = useForm({
    _method: "POST",
    title: "",
    hero: null,
    sub_title: "",
});

const heroPreview = ref(null);
const heroInput = ref(null);

const createProject = () => {
    if (heroInput.value) {
        form.hero = heroInput.value.files[0];
    }

    form.post(route("admin.projects.store"), {
        errorBag: "createProject",
        preserveScroll: true,
        onSuccess: () => clearHeroFileInput(),
    });
};

const selectNewHero = () => {
    heroInput.value.click();
};

const updateHeroPreview = () => {
    const hero = heroInput.value.files[0];

    if (!hero) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        heroPreview.value = e.target.result;
    };

    reader.readAsDataURL(hero);
};

const clearHeroFileInput = () => {
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
                <!-- Project Hero File Input -->
                <input
                    id="hero"
                    ref="heroInput"
                    type="file"
                    class="hidden"
                    @change="updateHeroPreview"
                />

                <InputLabel for="hero" value="Hero" />

                <!-- New Project Hero Preview -->
                <div v-show="heroPreview" class="mt-2 aspect-hero">
                    <span
                        class="block w-full h-full bg-cover bg-no-repeat bg-center"
                        :style="
                            'background-image: url(\'' + heroPreview + '\');'
                        "
                    />
                </div>

                <SecondaryButton
                    class="mt-2 me-2"
                    type="button"
                    @click.prevent="selectNewHero"
                >
                    Select A New Hero
                </SecondaryButton>

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
