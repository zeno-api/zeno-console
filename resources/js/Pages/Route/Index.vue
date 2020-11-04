<template>
    <app-layout>
        <template #header>
            <div class="flex items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Manage Routes
                </h2>
                <div class="ml-auto">
                    <div class="flex items-center">
                        <inertia-link :href="route('route.create')" class="px-3 py-1 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white">
                            New Route
                        </inertia-link>
                    </div>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <route-table :routes="routes" />
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import RouteTable from "@/Pages/Route/RouteTable";

export default {
    components: {
        RouteTable,
        AppLayout,
    },

    props: [
        'routes',
    ],
}
</script>
