<template>
    <app-layout>
        <template #header>
            <div class="flex items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Manage Services
                </h2>
                <div class="ml-auto">
                    <div class="flex items-center">
                        <inertia-link :href="route('service.create')" class="px-3 py-1 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white">
                            New Service
                        </inertia-link>
                    </div>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h3 class="text-lg leading-6 font-medium text-gray-900 px-4 sm:px-0">
                    Overview
                </h3>
                <service-stats class="mt-5" />
                <h3 class="mt-15 text-lg leading-6 font-medium text-gray-900 px-4 sm:px-0">
                    Services
                </h3>
                <service-table :services="services" class="mt-5"  />
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import ServiceStats from './ServiceStats';
import ServiceTable from "@/Pages/Service/ServiceTable";

export default {
    components: {
        AppLayout,
        ServiceStats,
        ServiceTable,
    },

    props: [
        'services',
    ],
}
</script>

<style scoped>

</style>
