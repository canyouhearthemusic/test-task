<script setup>
const props = defineProps({
    title: String
})
</script>

<template>
    <div class="relative">
        <label for="name" class="absolute -top-2.5 left-2 inline-block bg-white px-1 text-sm font-normal text-gray-900">
            {{ title }}
        </label>

        <slot />

    </div>
</template>
