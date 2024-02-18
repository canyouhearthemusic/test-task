<script setup>
const props = defineProps({
    id: String,
    name: String,
    placeholder: String,
    type: String,
})

const model = defineModel()
</script>

<template>
    <input :type="type" :name="name" :id="id"
           class="block w-full rounded-md border py-1.5 text-gray-900 shadow-sm placeholder:text-gray-400 sm:text-sm sm:leading-6"
           :placeholder="placeholder" v-model="model">
    </input>
</template>
