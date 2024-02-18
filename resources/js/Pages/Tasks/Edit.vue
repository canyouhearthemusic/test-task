<script setup>
import Input from "@/Components/Inputs/Input.vue";
import Fieldset from "@/Shared/Inputs/Fieldset.vue";
import Button from "@/Components/Buttons/PrimaryButton.vue";
import Textarea from "@/Components/Inputs/Textarea.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    task: Object
})

const form = useForm({
    title: props.task.title,
    text: props.task.text
});

function submit() {
    form.put(route('task.update', props.task.id),{
        preserveState: true,
        preserveScroll: true,
    })
}
</script>

<template>
    <div class="w-96 mt-80">
        <form @submit.prevent="submit">
            <Fieldset title="Title">
                <Input type="text" id="title" name="title"
                       v-model="form.title"
                       :class="form.errors.title ? 'border-red-500 border-2' : ''"
                />
            </Fieldset>

            <Fieldset title="Text" class="mt-4">
                <Textarea id="text" name="text" placeholder="1x milk, 10x eggs, 1x bread"
                          v-model="form.text"
                          :class="form.errors.text ? 'border-red-500 border-2' : ''"
                />
            </Fieldset>

            <Button type="submit" class="w-full mt-6" :disabled="form.processing"
                    :class="{' opacity-20': form.processing}">
                Update
            </Button>
        </form>
    </div>
</template>
