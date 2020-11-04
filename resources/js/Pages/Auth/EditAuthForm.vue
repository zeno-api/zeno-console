<template>
    <auth-form :form="form"
               :available-drivers="availableDrivers"
               @submitted="updateAuth" />
</template>

<script>
import AuthForm from "@/Pages/Auth/AuthForm";

export default {
    components: {
        AuthForm,
    },

    props: [
        'availableDrivers',
        'auth',
    ],

    data() {
        return {
            form: this.$inertia.form({
                name: this.auth.name,
                driver: this.auth.driver,
                cache: this.auth.cache,
                cache_ttl: this.auth.cache_ttl,
                options: {
                    endpoint: this.auth.options.endpoint,
                },
            }, {
                bag: 'updateAuth',
                resetOnSuccess: false,
            }),
        }
    },

    methods: {
        updateAuth() {
            this.form.patch(route('auth.update', [this.auth.id]), {
                preserveScroll: true
            });
        }
    },
}
</script>
