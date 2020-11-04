<template>
    <jet-form-section @submitted="submitForm">
        <template #title>
            Service Details
        </template>

        <template #description>
            Authentication service detail information
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                <jet-input-error :message="form.error('name')" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <jet-label for="driver" value="Driver" />
                <jet-select id="driver" v-model="form.driver" :items="availableDrivers" class="mt-1" />
                <jet-input-error :message="form.error('driver')" class="mt-2" />
            </div>

            <div class="col-span-6">
                <jet-label for="endpoint" value="Endpoint" />
                <jet-input type="text" id="endpoint" name="endpoint" class="mt-1" v-model="form.options.endpoint" />
                <jet-input-error :message="form.error('options.endpoint')" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="cache" value="Cache" />
                <p class="text-xs leading-5 text-gray-500">
                    This option is used to cache response. If TTL is empty, the response will cache forever.
                </p>
                <div class="mt-2 grid grid-cols-6 gap-6">
                    <div class="col-span-4 flex rounded-md shadow-sm">
                        <div class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                            <label class="flex items-center">
                                <input id="cache" @change="form.cache_ttl = null" type="checkbox" class="form-checkbox" :value="true" v-model="form.cache">
                                <span class="ml-2 text-sm text-gray-600">Enable</span>
                            </label>
                        </div>
                        <jet-input :disabled="!form.cache" id="cache_ttl" class="flex-1 block w-full px-3 py-2 rounded-none rounded-r-md sm:text-sm sm:leading-5" placeholder="Cache TTL" type="number" v-model="form.cache_ttl" />
                    </div>
                </div>
                <jet-input-error :message="form.error('cache_ttl')" class="mt-2" />
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
        'availableDrivers',
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
