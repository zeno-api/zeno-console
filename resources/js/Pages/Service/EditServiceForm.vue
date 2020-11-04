<template>
    <service-form :form="form" :available-protocols="availableProtocols" @submitted="updateService" />
</template>

<script>
import ServiceForm from "@/Pages/Service/ServiceForm";

export default {
    components: {
        ServiceForm,
    },

    props: [
        'service',
        'availableProtocols',
    ],

    data() {
        return {
            form: this.$inertia.form({
                name: this.service.name,
                driver: this.service.driver,
                description: this.service.description,
            }, {
                bag: 'updateService',
                resetOnSuccess: false,
            }),
        };
    },

    methods: {
        updateService() {
            this.form.patch(route('service.update', [this.service.id]), {
                preserveScroll: true,
            });
        }
    },
}
</script>

<style scoped>

</style>
