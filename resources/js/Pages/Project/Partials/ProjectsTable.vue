<script setup>
import PrimaryButtonLink from "@/Components/PrimaryButtonLink.vue";

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
                <th class="p-4">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="project in projects" class="hover:bg-slate-100">
                <td class="p-4 pt-2 pb-2">{{ project.id }}</td>
                <td class="p-4 pt-2 pb-2">{{ project.title }}</td>
                <td class="p-4 pt-2 pb-2">
                    <PrimaryButtonLink
                        :href="
                            route('projects.show', {
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
