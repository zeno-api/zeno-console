<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create New Route
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <create-route-form />
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import CreateRouteForm from "@/Pages/Route/CreateRouteForm";

export default {
    components: {
        CreateRouteForm,
        AppLayout,
    },
}
</script>

<style scoped>

</style>
