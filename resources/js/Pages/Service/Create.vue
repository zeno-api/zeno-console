<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create New Service
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <create-service-form :available-protocols="availableProtocols" />
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import CreateServiceForm from "@/Pages/Service/CreateServiceForm";

export default {
    components: {
        CreateServiceForm,
        AppLayout,
    },

    props: [
        'availableProtocols',
    ],
}
</script>

<style scoped>

</style>
