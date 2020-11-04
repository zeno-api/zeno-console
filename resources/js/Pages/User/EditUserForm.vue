<template>
    <user-form :form="form" @submitted="updateUser" />
</template>

<script>
import UserForm from "@/Pages/User/UserForm";

export default {
    components: {
        UserForm,
    },

    props: [
        'user',
    ],

    data() {
        return {
            form: this.$inertia.form({
                name: this.user.name,
                email: this.user.email,
            }, {
                bag: 'updateUser',
                resetOnSuccess: false,
            }),
        }
    },

    methods: {
        updateUser() {
            this.form.patch(route('user.update', [this.user.id]), {
                preserveScroll: true
            })
        }
    }
}
</script>

<style scoped>

</style>
