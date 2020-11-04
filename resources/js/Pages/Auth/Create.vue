<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create New Auth Service
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <create-auth-form :available-drivers="availableDrivers" />
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import CreateAuthForm from "@/Pages/Auth/CreateAuthForm";

export default {
    components: {
        CreateAuthForm,
        AppLayout,
    },

    props: [
        'availableDrivers',
    ],
}
</script>

<style scoped>

</style>
