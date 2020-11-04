<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Auth Service Details
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <edit-auth-form :auth="auth" :available-drivers="availableDrivers" />

                <jet-section-border />

                <delete-auth-form :auth="auth" class="mt-10 sm:mt-0" />
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import EditAuthForm from "@/Pages/Auth/EditAuthForm";
import DeleteAuthForm from "@/Pages/Auth/DeleteAuthForm";
import JetSectionBorder from '@/Jetstream/SectionBorder';

export default {
    components: {
        DeleteAuthForm,
        EditAuthForm,
        AppLayout,
        JetSectionBorder,
    },

    props: [
        'availableDrivers',
        'auth',
    ],
}
</script>

<style scoped>

</style>
