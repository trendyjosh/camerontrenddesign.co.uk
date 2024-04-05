<script setup>
import { useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/ActionMessage.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    projects: Array,
});

const form = useForm({
    _method: "PUT",
    projects: props.projects,
});

/**
 * Submit the project content form.
 */
const updatePositions = () => {
    console.log("Sending");
    form.post(route("admin.projects.update-order"), {
        errorBag: "updatePositionsContent",
        preserveScroll: true,
    });
};

/**
 * Swap array value in index position with value
 * in newIndex position.
 */
const swap = (index, newIndex) => {
    if (form.projects[newIndex]) {
        const temp = form.projects[newIndex];
        form.projects[newIndex] = form.projects[index];
        form.projects[index] = temp;
    }
};
</script>

<template>
    <table class="table table-auto w-full text-left">
        <thead>
            <tr class="border-b">
                <th class="p-4">Id</th>
                <th class="p-4">Title</th>
                <th class="p-4">Position</th>
            </tr>
        </thead>
        <tbody>
            <tr
                v-for="(project, index) in form.projects"
                class="hover:bg-slate-100"
            >
                <td class="p-4 pt-2 pb-2">{{ project.id }}</td>
                <td class="p-4 pt-2 pb-2">{{ project.title }}</td>
                <td class="p-4 pt-2 pb-2">
                    <div class="flex flex-col items-center">
                        <button
                            @click.prevent="swap(index, index - 1)"
                            class="triangle-up bg-gray-200 hover:bg-gray-300 w-12"
                        ></button>
                        <span>Move</span>
                        <button
                            @click.prevent="swap(index, index + 1)"
                            class="triangle-down bg-gray-200 hover:bg-gray-300 w-12"
                        ></button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="border-t p-4">
        <form class="flex justify-end w-full" @submit.prevent="updatePositions">
            <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </ActionMessage>
            <PrimaryButton> Save </PrimaryButton>
        </form>
    </div>
</template>
