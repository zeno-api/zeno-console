<template>
    <jet-form-section @submitted="submitForm">
        <template #title>
            User Details
        </template>

        <template #description>
            <span v-if="fresh">
                Create a new user to collaborate with others.
            </span>
            <span v-if="!fresh">
                Edit a user to collaborate with others.
            </span>
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-3">
                <jet-label for="name" value="Full Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                <jet-input-error :message="form.error('name')" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="text" class="mt-1 block w-full" v-model="form.email" />
                <jet-input-error :message="form.error('email')" class="mt-2" />
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

export default {
    components: {
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
    },

    props: [
        'form',
        'fresh',
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
