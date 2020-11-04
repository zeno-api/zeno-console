<template>
    <jet-action-section>
        <template #title>
            Delete User
        </template>

        <template #description>
            Permanently delete user.
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                Once user is deleted, all of its resources and data will be permanently deleted. Before deleting user, please download any data or information that you wish to retain.
            </div>

            <div class="mt-5">
                <jet-danger-button @click.native="confirmUserDeletion">
                    Delete User
                </jet-danger-button>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <jet-confirmation-modal :show="confirmingUserDeletion" @close="confirmingUserDeletion = false">
                <template #title>
                    Delete User
                </template>

                <template #content>
                    Are you sure you want to delete user? Once user is deleted, all of its resources and data will be permanently deleted.
                </template>

                <template #footer>
                    <jet-secondary-button @click.native="confirmingUserDeletion = false">
                        Nevermind
                    </jet-secondary-button>

                    <jet-danger-button class="ml-2" @click.native="deleteUser" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
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
        'user',
    ],

    data() {
        return {
            confirmingUserDeletion: false,
            deleting: false,

            form: this.$inertia.form({
                '_method': 'DELETE',
                password: '',
            }, {
                bag: 'deleteUser'
            })
        }
    },

    methods: {
        confirmUserDeletion() {
            this.confirmingUserDeletion = true;
        },

        deleteUser() {
            this.form.post(route('user.destroy', [this.user.id]), {
                preserveScroll: true
            }).then(response => {
                if (! this.form.hasErrors()) {
                    this.confirmingUserDeletion = false;
                }
            })
        },
    },
}
</script>

<style scoped>

</style>
