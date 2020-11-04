<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <dashboard-overview />
                <dashboard-engine :latencies="latencies" :hits="hits" class="mt-10" />
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import DashboardOverview from "@/Pages/Dashboard/DashboardOverview";
import DashboardEngine from "@/Pages/Dashboard/DashboardEngine";

export default {
    components: {
        AppLayout,
        DashboardOverview,
        DashboardEngine,
    },

    props: [
        'latencies',
        'hits',
    ],
}
</script>
