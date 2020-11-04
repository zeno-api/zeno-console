<template>
    <div>
        <user-form :form="form" @submitted="createUser" />

        <jet-dialog-modal :show="displayingPassword" @close="viewUser">
            <template #title>
                User Password
            </template>

            <template #content>
                <div>
                    Please copy user password. For your security, it won't be shown again.
                </div>

                <div class="mt-4 bg-gray-100 px-4 py-2 rounded font-mono text-sm text-gray-500" v-if="$page.jetstream.flash.password">
                    {{ $page.jetstream.flash.password }}
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click.native="viewUser">
                    Close
                </jet-secondary-button>
            </template>
        </jet-dialog-modal>
    </div>
</template>

<script>
import UserForm from "@/Pages/User/UserForm";
import JetDialogModal from '@/Jetstream/DialogModal'
import JetSecondaryButton from "@/Jetstream/SecondaryButton";

export default {
    components: {
        UserForm,
        JetDialogModal,
        JetSecondaryButton,
    },

    data() {
        return {
            form: this.$inertia.form({
                name: '',
                email: '',
            }, {
                bag: 'createUser',
                resetOnSuccess: false,
            }),

            displayingPassword: false,
        }
    },

    methods: {
        createUser() {
            this.form.post(route('user.store'), {
                preserveScroll: true
            }).then(response => {
                if (!this.form.hasErrors('createUser')) {
                    this.form.reset();
                    this.displayingPassword = true;
                }
            });
        },

        viewUser() {
            this.displayingPassword = false;
            this.$inertia.visit(route('user.edit', [this.$page.jetstream.flash.user.id]));
        }
    },
}
</script>
