<template>
    <jet-form-section @submitted="submitForm">
        <template #title>
            Service Basic
        </template>

        <template #description>
            Service basic information
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                <jet-input-error :message="form.error('name')" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <jet-label for="driver" value="Protocol" />
                <jet-select id="driver" v-model="form.driver" :items="availableProtocols" class="mt-1" />
                <jet-input-error :message="form.error('driver')" class="mt-2" />
            </div>

            <div class="col-span-6">
                <jet-label for="description" value="Description" />
                <jet-text-area id="description" name="description" class="mt-1" v-model="form.description" />
                <jet-input-error :message="form.error('description')" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
import JetActionMessage from '@/Jetstream/ActionMessage'
import JetButton from '@/Jetstream/Button'
import JetFormSection from '@/Jetstream/FormSection'
import JetInput from '@/Jetstream/Input'
import JetInputError from '@/Jetstream/InputError'
import JetLabel from '@/Jetstream/Label'
import JetTextArea from "@/Jetstream/TextArea"
import JetSelect from '@/Jetstream/Select';

export default {
    components: {
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        JetTextArea,
        JetSelect,
    },

    props: [
        'form',
        'availableProtocols',
    ],

    methods: {
        submitForm() {
            this.$emit('submitted');
        }
    },
}
</script>

<style scoped>

</style>
