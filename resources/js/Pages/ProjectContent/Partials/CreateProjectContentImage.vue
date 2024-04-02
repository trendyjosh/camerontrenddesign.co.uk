<script setup>
import InputLabel from "@/Components/InputLabel.vue";
import Skeleton from "@/Components/Skeleton.vue";
import ImageInput from "@/Components/ImageInput.vue";
import TextInput from "@/Components/TextInput.vue";

const model = defineModel();

const props = defineProps({
    index: Number,
});
</script>

<template>
    <div class="col-span-6 sm:col-span-3">
        <InputLabel :for="'src_' + index" value="Image" />
        <ImageInput
            v-model="model.fileObj"
            name="Image"
            :src="model.src"
            class="w-full h-36"
        />
        <InputLabel :for="'caption_' + index" value="Image caption" />
        <TextInput
            :id="'caption_' + index"
            v-model="model.caption"
            type="text"
            class="mt-1 block w-full"
        />
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
                <Skeleton class="w-36 h-16" />
            </template>
            <template v-else>
                <Skeleton class="size-16" />
                <div class="flex flex-col gap-4">
                    <Skeleton class="h-4 w-10" />
                    <Skeleton class="h-4 w-16" />
                </div>
            </template>
        </div>
    </div>
</template>
