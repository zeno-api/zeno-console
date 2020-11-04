<template>
    <jet-form-section @submitted="updateOptions">
        <template #title>
            Service Options
        </template>

        <template #description>
            Configure service like endpoint, timeout, etc
        </template>

        <template #form>
            <div class="col-span-6">
                <jet-label for="base_uri" value="Base URI" />
                <jet-input id="base_uri" type="text" class="mt-1 block w-full" v-model="form.base_uri" autofocus />
                <jet-input-error :message="form.error('base_uri')" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <jet-label for="timeout" value="Timeout (Seconds)" />
                <jet-input id="timeout" type="text" class="mt-1 block w-full" v-model="form.timeout" autofocus />
                <jet-input-error :message="form.error('timeout')" class="mt-2" />
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
import JetActionMessage from '@/Jetstream/ActionMessage';
import JetButton from '@/Jetstream/Button';
import JetFormSection from '@/Jetstream/FormSection';
import JetInput from '@/Jetstream/Input';
import JetInputError from '@/Jetstream/InputError';
import JetLabel from '@/Jetstream/Label';

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
        'service',
    ],

    data() {
        return {
            form: this.$inertia.form({
                base_uri: this.service.options.base_uri ?? null,
                timeout: this.service.options.timeout ?? null,
            }, {
                bag: 'updateService',
                resetOnSuccess: false,
            }),
        };
    },

    methods: {
        updateOptions() {
            this.form.patch(route('service.update-options', [this.service.id]), {
                preserveScroll: true,
            });
        }
    },
}
</script>

<style scoped>

</style>
