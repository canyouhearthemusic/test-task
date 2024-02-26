<script setup>
import { computed } from 'vue';
import { Link, router } from '@inertiajs/vue3'
import { PencilSquareIcon, TrashIcon } from '@heroicons/vue/16/solid'

const props = defineProps({
    task: Object
})

const isCompleted = computed(() => {
    return props.task.done_at != null
})

function patch() {
    router.patch(route('tasks.patch'), {
        'id': props.task.id
    })
}
</script>

<template>
    <div class="relative flex items-start py-4 w-96 max-w-96">
        <div class="flex h-7 items-center">
            <input
                :id="task.id" aria-describedby="task-description" :name="task.id" type="checkbox"
                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
                :checked="isCompleted" @click.prevent="patch"
            />
        </div>
        <div class="ml-3 text-sm leading-6 w-full">
            <div class="flex justify-between">
                <label :for="task.id" class="font-medium text-gray-900 text-lg">
                    {{ task.title }}
                </label>

                <div class="flex items-start gap-x-3">
                    <Link
                        :href="route('tasks.edit', task.id)"
                        method="get"
                        as="button"
                    >
                        <PencilSquareIcon class="w-5 h-5"/>
                    </Link>

                    <Link
                        :href="route('tasks.destroy')"
                        method="delete"
                        as="button"
                        :data="{ 'id': task.id }"
                    >
                        <TrashIcon class="w-5 h-5" />
                    </Link>
                </div>
            </div>

            <p id="task-description" class="text-gray-600">
                {{ task.text }}
            </p>

            <p class="text-right text-xs text-gray-400">
                {{ task.created_at }}
            </p>
        </div>
    </div>
</template>
