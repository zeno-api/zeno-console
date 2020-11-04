<template>
    <route-form :form="form" @submitted="createRoute" />
</template>

<script>
import RouteForm from "@/Pages/Route/RouteForm";

export default {
    components: {
        RouteForm,
    },

    data() {
        return {
            form: this.$inertia.form({
                path: '',
                methods: [],
                freeze: false,
                freeze_ttl: null,
            }, {
                bag: 'createRoute',
                resetOnSuccess: true,
            })
        };
    },

    methods: {
        createRoute() {
            this.form.post(route('route.store'), {
                preserveScroll: true
            }).then(response => {
                if (!this.form.hasErrors('createRoute')) {
                    this.viewRoute();
                }
            });
        },

        viewRoute() {
            this.$inertia.visit(route('route.index'));
        }
    },
}
</script>

<style scoped>

</style>
