<script setup>
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import TextArea from "@/Components/TextArea.vue";
import ImageInput from "@/Components/ImageInput.vue";
import { useForm } from "@inertiajs/vue3";
import CreateProjectContentText from "@/Pages/ProjectContent/Partials/CreateProjectContentText.vue";
import CreateProjectContentImage from "@/Pages/ProjectContent/Partials/CreateProjectContentImage.vue";

const props = defineProps({
    project: Object,
});

const form = useForm({
    content: props.project.content ?? [],
});

const updateProject = () => {
    for (let index = 0; index < form.content.length; index++) {
        if (form.content[index].fileObj) {
            form.content[index].file = form.content[index].fileObj.files[0];
        } else {
            console.log("No content");
        }
    }
    form.post(
        route("admin.projects.contents.store", { project: props.project.slug }),
        {
            errorBag: "createProjectContent",
            preserveScroll: true,
        }
    );
};

const addTextContent = () => {
    form.content.push({
        content: "",
        full: 0,
    });
};

const addImageContent = () => {
    form.content.push({
        caption: "",
        src: "",
        full: 0,
        file: null,
        fileObj: null,
    });
};

const removeContent = (index) => {
    form.content.splice(index, 1);
};
</script>

<template>
    <FormSection @submitted="updateProject">
        <template #title>Project Content</template>

        <template #description> Add new project content. </template>

        <template #form>
            <template v-for="(projectContent, index) in form.content">
                <div
                    v-if="index > 0"
                    class="col-span-6 border-t border-gray-200"
                ></div>
                <CreateProjectContentText
                    v-if="projectContent.content !== undefined"
                    v-model="form.content[index]"
                    :index
                />
                <CreateProjectContentImage
                    v-else
                    v-model="form.content[index]"
                    :index
                />
                <!-- Content -->
                <div class="col-span-3 sm:col-span-1">
                    <InputLabel value="Actions" />
                    <DangerButton @click="removeContent(index)">
                        Remove
                    </DangerButton>
                </div>
            </template>
        </template>

        <template #actions>
            <SecondaryButton @click="addTextContent" class="mr-3"
                >Add text</SecondaryButton
            >
            <SecondaryButton @click="addImageContent" class="mr-3"
                >Add image</SecondaryButton
            >
            <ActionMessage :on="form.recentlySuccessful" class="mr-3">
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
