<script setup>
defineProps({
    isLive: Boolean,
});
</script>

<template>
    <span
        class="rounded-md px-2 py-1"
        :class="{
            'bg-green-50 text-green-700 ring-1 ring-inset ring-green-600':
                isLive,
            'bg-red-50 text-red-700 ring-1 ring-inset ring-red-600': !isLive,
        }"
        >{{ isLive ? "Live" : "Draft" }}</span
    >
</template>
