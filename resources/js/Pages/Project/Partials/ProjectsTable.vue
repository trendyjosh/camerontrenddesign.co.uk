<script setup>
import PrimaryButtonLink from "@/Components/PrimaryButtonLink.vue";
import SecondaryButtonLink from "@/Components/SecondaryButtonLink.vue";

const props = defineProps({
    projects: Array,
});
</script>

<template>
    <table class="table table-auto w-full text-left">
        <thead>
            <tr class="border-b">
                <th class="p-4">Id</th>
                <th class="p-4">Title</th>
                <th class="p-4">Status</th>
                <th class="p-4">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="project in projects" class="hover:bg-slate-100">
                <td class="p-4 pt-2 pb-2">{{ project.id }}</td>
                <td class="p-4 pt-2 pb-2">{{ project.title }}</td>
                <td class="p-4 pt-2 pb-2">
                    <span
                        class="rounded-md px-2 py-1"
                        :class="{
                            'bg-green-50 text-green-700 ring-1 ring-inset ring-green-600':
                                project.status,
                            'bg-red-50 text-red-700 ring-1 ring-inset ring-red-600':
                                !project.status,
                        }"
                        >{{ project.status ? "Live" : "Draft" }}</span
                    >
                </td>
                <td class="p-4 pt-2 pb-2">
                    <SecondaryButtonLink
                        class="mr-3"
                        :href="
                            route('admin.projects.preview', {
                                project: project.slug,
                            })
                        "
                        >Preview</SecondaryButtonLink
                    >
                    <PrimaryButtonLink
                        :href="
                            route('admin.projects.show', {
                                project: project.slug,
                            })
                        "
                        >View</PrimaryButtonLink
                    >
                </td>
            </tr>
        </tbody>
    </table>
</template>
