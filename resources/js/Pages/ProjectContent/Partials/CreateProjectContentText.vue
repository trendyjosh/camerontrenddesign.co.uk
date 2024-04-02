<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import Skeleton from "@/Components/Skeleton.vue";
import TextArea from "@/Components/TextArea.vue";

const model = defineModel();

const props = defineProps({
    index: Number,
});
</script>

<template>
    <div class="col-span-6 sm:col-span-3">
        <InputLabel :for="'content_' + index" value="Content" />
        <TextArea v-model="model.content" class="mt-1 block w-full h-36" />
        <!-- <InputError :message="form.errors.sub_title" class="mt-2" /> -->
    </div>
    <div class="col-span-3 sm:col-span-2 flex flex-col">
        <div class="mb-5">
            <InputLabel :for="'full_' + index" value="Full width" />
            <input
                type="checkbox"
                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                v-model="model.full"
                :true-value="1"
                :false-value="0"
                :id="'full_' + index"
            />
        </div>
        <div class="flex gap-4 items-center">
            <template v-if="model.full">
                <div class="flex flex-col gap-4">
                    <Skeleton class="h-4 w-28" />
                    <Skeleton class="h-4 w-36" />
                </div>
            </template>
            <template v-else>
                <div class="flex flex-col gap-4">
                    <Skeleton class="h-4 w-10" />
                    <Skeleton class="h-4 w-16" />
                </div>
                <div class="flex flex-col gap-4">
                    <Skeleton class="h-4 w-10" />
                    <Skeleton class="h-4 w-16" />
                </div>
            </template>
        </div>
    </div>
</template>
