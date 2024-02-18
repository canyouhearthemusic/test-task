<script setup>
const props = defineProps({
    id: String,
    name: String,
})

const emit = defineEmits(['update:modelValue'])
</script>

<template>
    <select :id="id" :name="name"
            class="w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-800 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6 font-semibold"
            @input="emit('update:modelValue', $event.target.value)"
    >
        <option selected value="latest">Latest</option>
        <option value="oldest">Oldest</option>
        <option value="completed">Completed</option>
        <option value="in-progress">In-Progress</option>
    </select>
</template>

<style scoped>

</style>
