<script setup>
import PrimaryButtonLink from "@/Components/PrimaryButtonLink.vue";

const props = defineProps({
    articles: Array,
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
            <tr v-for="article in articles" class="hover:bg-slate-100">
                <td class="p-4 pt-2 pb-2">{{ article.id }}</td>
                <td class="p-4 pt-2 pb-2">{{ article.title }}</td>
                <td class="p-4 pt-2 pb-2">
                    {{ article.status == 1 ? "Live" : "Archived" }}
                </td>
                <td class="p-4 pt-2 pb-2">
                    <PrimaryButtonLink
                        :href="
                            route('admin.articles.show', {
                                article: article.id,
                            })
                        "
                    >
                        View
                    </PrimaryButtonLink>
                </td>
            </tr>
        </tbody>
    </table>
</template>
