<script setup>
const props = defineProps({
    type: String
})
</script>

<template>
    <button
        :type="type"
        class="rounded-md bg-indigo-600 py-2.5 text-sm font-semibold text-white text-center shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
    >
        <slot />
    </button>
</template>

<style scoped>

</style>
