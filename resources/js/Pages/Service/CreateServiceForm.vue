<template>
    <service-form :form="form" :available-protocols="availableProtocols" @submitted="createService" />
</template>

<script>
import ServiceForm from "@/Pages/Service/ServiceForm";

export default {
    components: {
        ServiceForm,
    },

    props: [
        'availableProtocols',
    ],

    data() {
        return {
            form: this.$inertia.form({
                name: '',
                driver: '',
                description: '',
            }, {
                bag: 'createService',
                resetOnSuccess: true,
            }),
        }
    },

    methods: {
        createService() {
            this.form.post(route('service.store'), {
                preserveScroll: true
            }).then(response => {
                if (!this.form.hasErrors('createService')) {
                    this.viewService();
                }
            });
        },

        viewService() {
            this.$inertia.visit(route('service.show', [this.$page.jetstream.flash.service.id]));
        }
    },
}
</script>
