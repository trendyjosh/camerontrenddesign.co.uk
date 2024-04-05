<script setup>
const textAreaModel = defineModel();
</script>

<template>
    <textarea
        v-model="textAreaModel"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
    ></textarea>
</template>
