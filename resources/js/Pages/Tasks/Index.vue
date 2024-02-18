<script setup>
import Input from "@/Components/Inputs/Input.vue";
import Fieldset from "@/Shared/Inputs/Fieldset.vue";
import Textarea from "@/Components/Inputs/Textarea.vue";
import Select from "@/Components/Inputs/Select.vue";
import Button from "@/Components/Buttons/PrimaryButton.vue";
import TaskCard from "@/Components/Tasks/TaskCard.vue";
import { router, useForm } from "@inertiajs/vue3";
import { ref, watch } from "vue";

const props = defineProps({
    tasks: Array
})

const form = useForm({
    title: '',
    text: ''
});

const sortingValue = ref('');

watch(sortingValue, (newValue) => {
    router.get(
        route('task.index'),
        { sort: newValue },
        { replace:true, preserveState: true, preserveScroll: true }
    )
})

function submit() {
    form.post(route('task.store'),{
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
            form.reset()
            form.clearErrors()
        }
    })
}
</script>

<template>
    <form @submit.prevent="submit">
        <Fieldset title="Title">
            <Input type="text" id="title" name="title"
                   placeholder="Groceries" v-model="form.title"
                   :class="form.errors.title ? 'border-red-500 border-2' : ''"
            />
        </Fieldset>

        <Fieldset title="Text" class="mt-4">
            <Textarea id="text" name="text" placeholder="1x milk, 10x eggs, 1x bread"
                      v-model="form.text"
                      :class="form.errors.text ? 'border-red-500 border-2' : ''"

            />
        </Fieldset>


        <div class="mt-4 flex justify-left items-end w-full gap-x-4">
            <Button type="submit" class="w-3/5" :disabled="form.processing" :class="{' opacity-20': form.processing}"> Create Task</Button>

            <Fieldset title="Sort By" class="ml-auto">
                <Select id="sort" name="sort" v-model="sortingValue" />
            </Fieldset>
        </div>
    </form>

    <div class="mt-4">
        <p class="text-red-600 text-xs text-center gap-y-20" v-for="error in form.errors" :key="error">
            {{ error }}
        </p>
    </div>

    <br>
    <hr>

    <div class=" flex justify-center">
        <div class="divide-y">
            <TaskCard v-for="task in tasks" :key="task.id" :task="task"/>
        </div>
    </div>
</template>
