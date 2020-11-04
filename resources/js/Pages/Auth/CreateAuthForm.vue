<template>
    <auth-form :form="form"
               :available-drivers="availableDrivers"
               @submitted="createAuth" />
</template>

<script>
import AuthForm from "@/Pages/Auth/AuthForm";

export default {
    components: {
        AuthForm,
    },

    props: [
        'availableDrivers',
    ],

    data() {
        return {
            form: this.$inertia.form({
                name: '',
                driver: '',
                cache: false,
                cache_ttl: null,
                options: {
                    endpoint: null,
                },
            }, {
                bag: 'createAuth',
                resetOnSuccess: true,
            }),
        }
    },

    methods: {
        createAuth() {
            this.form.post(route('auth.store'), {
                preserveScroll: true
            }).then(response => {
                if (!this.form.hasErrors('createAuth')) {
                    this.viewAuth();
                }
            });
        },

        viewAuth() {
            this.$inertia.visit(route('auth.edit', [this.$page.jetstream.flash.auth.id]));
        }
    },
}
</script>
