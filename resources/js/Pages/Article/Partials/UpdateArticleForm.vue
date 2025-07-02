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
import TextArea from "@/Components/TextArea.vue";

const props = defineProps({
    article: Object,
});

const form = useForm({
    _method: "PUT",
    title: props.article.title ?? "",
    image: null,
    description: props.article.description ?? "",
    link: props.article.link ?? "",
    status: props.article.status ?? 0,
});

const imagePreview = ref(null);
const imageInput = ref(null);

const updateArticle = () => {
    if (imageInput.value) {
        form.image = imageInput.value.files[0];
    }

    form.post(route("admin.articles.update", { article: props.article.id }), {
        errorBag: "updateArticle",
        preserveScroll: true,
        onSuccess: () => clearImageFileInput(),
    });
};

const selectNewImage = () => {
    imageInput.value.click();
};

const updateImagePreview = () => {
    const image = imageInput.value.files[0];

    if (!image) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        imagePreview.value = e.target.result;
    };

    reader.readAsDataURL(image);
};

const clearImageFileInput = () => {
    if (imageInput.value?.value) {
        imageInput.value.value = null;
    }
};
</script>

<template>
    <FormSection @submitted="updateArticle">
        <template #title>Article Details</template>

        <template #description> Update the article information. </template>

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

            <!-- Article Image -->
            <div class="col-span-6 sm:col-span-4">
                <!-- Article Image File Input -->
                <input
                    id="image"
                    ref="imageInput"
                    type="file"
                    class="hidden"
                    @change="updateImagePreview"
                />

                <InputLabel for="image" value="Image" />

                <!-- Current Image -->
                <div v-show="!imagePreview" class="mt-2">
                    <img
                        :src="'/storage/' + article.image"
                        :alt="article.title"
                        class="w-full h-full object-cover"
                    />
                </div>

                <!-- New Image Preview -->
                <div v-show="imagePreview" class="mt-2">
                    <span
                        class="block w-full h-full bg-cover bg-no-repeat bg-center"
                        :style="
                            'background-image: url(\'' + imagePreview + '\');'
                        "
                    />
                </div>

                <SecondaryButton
                    class="mt-2 me-2"
                    type="button"
                    @click.prevent="selectNewImage"
                >
                    Select A New Image
                </SecondaryButton>

                <InputError :message="form.errors.image" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="description" value="Description" />
                <TextArea
                    id="description"
                    v-model="form.description"
                    class="mt-1 block w-full h-36"
                />
                <InputError :message="form.errors.description" class="mt-2" />
            </div>

            <!-- Article Link -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="link" value="Link" />
                <TextInput
                    id="link"
                    v-model="form.link"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="link"
                />
                <InputError :message="form.errors.link" class="mt-2" />
            </div>

            <!-- Status -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="status" value="Active" />
                <input
                    type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    v-model="form.status"
                    :true-value="1"
                    :false-value="0"
                    id="status"
                />
                <InputError :message="form.errors.status" class="mt-2" />
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
