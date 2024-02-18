<script setup>
const props = defineProps({
    id: String,
    name: String,
    placeholder: String,
    value: String,
    modelValue: String
})

const emit = defineEmits(['update:modelValue'])

</script>

<template>
    <textarea :name="name" :id="id"
              class="block w-full rounded-md border py-1.5 text-gray-900 shadow-sm placeholder:text-gray-400 sm:text-sm sm:leading-6"
              :placeholder="placeholder" :value="modelValue" @input="emit('update:modelValue', $event.target.value)">
    </textarea>
</template>
