<script setup>
import { ref } from "vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const imageInput = defineModel();

const props = defineProps({
    name: String,
    src: String,
    class: String,
});

const imagePreview = ref(null);

const selectNewImage = () => {
    imageInput.value.click();
};

const updateImagePreview = () => {
    const image = imageInput.value.files[0];

    console.log(image);

    if (!image) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        imagePreview.value = e.target.result;
    };

    reader.readAsDataURL(image);
};
</script>

<template>
    <!-- Image File Input -->
    <input
        id="image"
        ref="imageInput"
        type="file"
        class="hidden"
        @change="updateImagePreview"
    />

    <InputLabel for="image" value="Image" />

    <!-- Current Image -->
    <div v-if="src" v-show="!imagePreview" class="mt-2" :class="class">
        <img
            :src="'/storage/' + src"
            :alt="name + ' image'"
            class="w-full h-full object-cover"
        />
    </div>

    <!-- New Image Preview -->
    <div v-show="imagePreview" class="mt-2" :class="[props.class]">
        <span
            class="block w-full h-full bg-cover bg-no-repeat bg-center"
            :style="'background-image: url(\'' + imagePreview + '\');'"
        />
    </div>

    <SecondaryButton
        class="mt-2 me-2"
        type="button"
        @click.prevent="selectNewImage"
    >
        Select A New {{ name }}
    </SecondaryButton>
</template>
