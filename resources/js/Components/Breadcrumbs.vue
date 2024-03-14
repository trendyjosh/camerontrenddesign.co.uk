<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    links: Array,
});
</script>

<template>
    <div class="flex items-center pb-4 overflow-x-auto">
        <template v-for="(link, index) in links">
            <span v-if="index > 0" class="mx-3 text-gray-400"> / </span>

            <Link :href="link.url" class="text-gray-500 hover:underline">
                {{ link.title }}
            </Link>
        </template>
    </div>
</template>
