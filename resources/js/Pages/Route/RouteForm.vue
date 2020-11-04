<template>
    <jet-form-section @submitted="submitForm">
        <template #title>
            Routing
        </template>

        <template #description>
            Route config like path, methods, etc
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="path" value="Path" />
                <jet-input id="path" type="text" class="mt-1 block w-full" v-model="form.path" autofocus />
                <jet-input-error :message="form.error('path')" class="mt-2" />
            </div>

            <div class="col-span-6">
                <jet-label for="methods" value="Methods" />

                <div class="mt-2 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div v-for="method in methods" :key="method">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" :value="method" v-model="form.methods">
                            <span class="ml-2 text-sm text-gray-600 uppercase">{{ method }}</span>
                        </label>
                    </div>
                </div>

                <jet-input-error :message="form.error('methods')" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="freeze" value="Freeze" />
                <p class="text-xs leading-5 text-gray-500">
                    This option is used to cache response. If TTL is empty, the response will cache forever.
                </p>
                <div class="mt-2 grid grid-cols-6 gap-6">
                    <div class="col-span-4 flex rounded-md shadow-sm">
                        <div class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                            <label class="flex items-center">
                                <input id="freeze" @change="form.freeze_ttl = null" type="checkbox" class="form-checkbox" :value="true" v-model="form.freeze">
                                <span class="ml-2 text-sm text-gray-600">Enable</span>
                            </label>
                        </div>
                        <jet-input :disabled="!form.freeze" id="freeze_ttl" class="flex-1 block w-full px-3 py-2 rounded-none rounded-r-md sm:text-sm sm:leading-5" placeholder="Cache TTL" type="number" v-model="form.freeze_ttl" />
                    </div>
                </div>
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
    ],

    data() {
        return {
            methods: ['get', 'post', 'patch', 'put', 'delete'],
        };
    },

    methods: {
        submitForm() {
            this.$emit('submitted');
        }
    },
}
</script>

<style scoped>

</style>
