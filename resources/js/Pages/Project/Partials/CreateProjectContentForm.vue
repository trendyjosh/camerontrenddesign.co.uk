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
import Skeleton from "@/Components/Skeleton.vue";

const props = defineProps({
    project: Object,
});

const form = useForm({
    content: props.project.content ?? [],
});

console.log(props.content);

const updateProject = () => {
    // form.post(
    //     route("admin.projects.content.create", { project: props.project.slug }),
    //     {
    //         errorBag: "createProjectContent",
    //         preserveScroll: true,
    //         onSuccess: () => clearFileInput(),
    //     }
    // );
};

const addContent = () => {
    props.content.push({
        content: "",
        full: 0,
    });
};

const removeContent = (index) => {
    props.content.splice(index, 1);
};
</script>

<template>
    <FormSection @submitted="updateProject">
        <template #title>Project Content</template>

        <template #description> Add new project content. </template>

        <template #form>
            <template v-for="(projectContent, index) in content">
                <div
                    v-if="index > 0"
                    class="col-span-6 border-t border-gray-200"
                ></div>
                <!-- Content -->
                <div class="col-span-6 sm:col-span-3">
                    <InputLabel :for="'content_' + index" value="Content" />
                    <TextArea
                        v-model="projectContent.content"
                        class="mt-1 block w-full h-36"
                    />
                    <!-- <InputError :message="form.errors.sub_title" class="mt-2" /> -->
                </div>
                <div class="col-span-3 sm:col-span-2 flex flex-col">
                    <div class="mb-5">
                        <InputLabel :for="'full_' + index" value="Full width" />
                        <input
                            type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            v-model="projectContent.full"
                            :true-value="1"
                            :false-value="0"
                            :id="'full_' + index"
                        />
                    </div>
                    <div class="flex gap-4 items-center">
                        <template v-if="projectContent.full">
                            <Skeleton class="w-36 h-16" />
                        </template>
                        <template v-else>
                            <Skeleton class="size-16" />
                            <div class="flex flex-col gap-4">
                                <Skeleton class="h-4 w-10" />
                                <Skeleton class="h-4 w-16" />
                            </div>
                        </template>
                    </div>
                </div>
                <div class="col-span-3 sm:col-span-1 flex items-center">
                    <DangerButton @click="removeContent(index)">
                        Remove
                    </DangerButton>
                </div>
            </template>
        </template>

        <template #actions>
            <SecondaryButton @click="addContent">Add content</SecondaryButton>
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
