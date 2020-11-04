<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User Details
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <edit-user-form :user="user" />

                <jet-section-border />

                <delete-user-form :user="user" class="mt-10 sm:mt-0" />
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import EditUserForm from "@/Pages/User/EditUserForm";
import DeleteUserForm from "@/Pages/User/DeleteUserForm";
import JetSectionBorder from '@/Jetstream/SectionBorder';

export default {
    components: {
        DeleteUserForm,
        EditUserForm,
        AppLayout,
        JetSectionBorder,
    },

    props: [
        'user',
    ],
}
</script>

<style scoped>

</style>
