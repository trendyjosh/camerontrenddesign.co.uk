<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import ActionSection from "@/Components/ActionSection.vue";
import DangerButton from "@/Components/DangerButton.vue";
import DialogModal from "@/Components/DialogModal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const props = defineProps({
    project: Object,
});

const confirmingProjectDeletion = ref(false);

const form = useForm({});

const confirmProjectDeletion = () => {
    confirmingProjectDeletion.value = true;
};

const deleteProject = () => {
    form.delete(
        route("admin.projects.destroy", { project: props.project.slug }),
        {
            preserveScroll: true,
            onSuccess: () => closeModal(),
        }
    );
};

const closeModal = () => {
    confirmingProjectDeletion.value = false;
};
</script>

<template>
    <ActionSection>
        <template #title> Delete Project </template>

        <template #description> Permanently delete your project. </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                Once this project is deleted, all of its content and data will
                be permanently deleted. Before deleting your project, please
                download any data or information that you wish to retain.
            </div>

            <div class="mt-5">
                <DangerButton @click="confirmProjectDeletion">
                    Delete Project
                </DangerButton>
            </div>

            <!-- Delete Project Confirmation Modal -->
            <DialogModal :show="confirmingProjectDeletion" @close="closeModal">
                <template #title> Delete Project </template>

                <template #content>
                    Are you sure you want to delete this project? Once the
                    project is deleted, all of its content and data will be
                    permanently deleted.
                </template>

                <template #footer>
                    <SecondaryButton @click="closeModal">
                        Cancel
                    </SecondaryButton>

                    <DangerButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteProject"
                    >
                        Delete Project
                    </DangerButton>
                </template>
            </DialogModal>
        </template>
    </ActionSection>
</template>
