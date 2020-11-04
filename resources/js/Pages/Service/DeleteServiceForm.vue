<template>
    <jet-action-section>
        <template #title>
            Delete Service
        </template>

        <template #description>
            Permanently delete service.
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                Once service is deleted, all of its resources, routes and actions will be permanently deleted. Before deleting service, please download any data or information that you wish to retain.
            </div>

            <div class="mt-5">
                <jet-danger-button @click.native="confirmServiceDeletion">
                    Delete Service
                </jet-danger-button>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <jet-confirmation-modal :show="confirmingServiceDeletion" @close="confirmingServiceDeletion = false">
                <template #title>
                    Delete User
                </template>

                <template #content>
                    Are you sure you want to delete service? Once service is deleted, all of its resources, routes and actions will be permanently deleted.
                </template>

                <template #footer>
                    <jet-secondary-button @click.native="confirmingServiceDeletion = false">
                        Nevermind
                    </jet-secondary-button>

                    <jet-danger-button class="ml-2" @click.native="deleteService" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Delete
                    </jet-danger-button>
                </template>
            </jet-confirmation-modal>
        </template>
    </jet-action-section>
</template>

<script>
import JetActionSection from '@/Jetstream/ActionSection'
import JetConfirmationModal from "@/Jetstream/ConfirmationModal"
import JetDangerButton from '@/Jetstream/DangerButton'
import JetInput from '@/Jetstream/Input'
import JetInputError from '@/Jetstream/InputError'
import JetSecondaryButton from '@/Jetstream/SecondaryButton'

export default {
    components: {
        JetActionSection,
        JetConfirmationModal,
        JetDangerButton,
        JetInput,
        JetInputError,
        JetSecondaryButton,
    },

    props: [
        'service',
    ],

    data() {
        return {
            confirmingServiceDeletion: false,
            deleting: false,

            form: this.$inertia.form({
                '_method': 'DELETE',
                password: '',
            }, {
                bag: 'deleteService'
            })
        };
    },

    methods: {
        confirmServiceDeletion() {
            this.confirmingServiceDeletion = true;
        },

        deleteService() {
            this.form.post(route('service.destroy', [this.service.id]), {
                preserveScroll: true,
            }).then(response => {
                if (! this.form.hasErrors()) {
                    this.confirmingServiceDeletion = false;
                }
            });
        }
    },
}
</script>

<style scoped>

</style>
