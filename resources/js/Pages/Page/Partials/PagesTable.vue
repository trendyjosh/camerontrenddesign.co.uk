<script setup>
import PrimaryButtonLink from "@/Components/PrimaryButtonLink.vue";

const props = defineProps({
    pages: Array,
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
            <tr v-for="page in pages" class="hover:bg-slate-100">
                <td class="p-4 pt-2 pb-2">{{ page.id }}</td>
                <td class="p-4 pt-2 pb-2">{{ page.title }}</td>
                <td class="p-4 pt-2 pb-2">
                    <PrimaryButtonLink
                        :href="
                            route('pages.show', {
                                page: page.slug,
                            })
                        "
                        >View</PrimaryButtonLink
                    >
                </td>
            </tr>
        </tbody>
    </table>
</template>
