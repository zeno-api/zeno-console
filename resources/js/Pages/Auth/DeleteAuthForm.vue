<template>
    <jet-action-section>
        <template #title>
            Delete Auth Service
        </template>

        <template #description>
            Permanently delete authentication service.
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                Once auth service is deleted, all of its resources and data will be permanently deleted. Before deleting auth service, please download any data or information that you wish to retain.
            </div>

            <div class="mt-5">
                <jet-danger-button @click.native="confirmUserDeletion">
                    Delete Auth Service
                </jet-danger-button>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <jet-confirmation-modal :show="confirmingAuthDeletion" @close="confirmingAuthDeletion = false">
                <template #title>
                    Delete Auth Service
                </template>

                <template #content>
                    Are you sure you want to delete user? Once auth service is deleted, all of its resources and data will be permanently deleted. Before deleting auth service, please download any data or information that you wish to retain.
                </template>

                <template #footer>
                    <jet-secondary-button @click.native="confirmingAuthDeletion = false">
                        Nevermind
                    </jet-secondary-button>

                    <jet-danger-button class="ml-2" @click.native="deleteAuth" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
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
        'auth',
    ],

    data() {
        return {
            confirmingAuthDeletion: false,
            deleting: false,

            form: this.$inertia.form({
                '_method': 'DELETE',
                password: '',
            }, {
                bag: 'deleteAuth'
            })
        }
    },

    methods: {
        confirmUserDeletion() {
            this.confirmingAuthDeletion = true;
        },

        deleteAuth() {
            this.form.post(route('auth.destroy', [this.auth.id]), {
                preserveScroll: true
            }).then(response => {
                if (! this.form.hasErrors()) {
                    this.confirmingAuthDeletion = false;
                }
            })
        },
    },
}
</script>

<style scoped>

</style>
