<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Service Details

                <span :class="{
                        'bg-green-100 text-green-800': service.available,
                        'bg-red-100 text-red-800': !service.available
                      }"
                      class="px-2 capitalize inline-flex text-sm leading-5 font-semibold rounded-full ml-2">
                      {{ service.available ? 'Available' : 'Not Available' }}
                </span>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <service-detail-stats :service="service" />

                <jet-section-border />

                <edit-service-form :service="service" :availableProtocols="availableProtocols" class="mt-10 sm:mt-0" />

                <jet-section-border />

                <manage-service-option-form :service="service" class="mt-10 sm:mt-0" />

                <jet-section-border />

                <delete-service-form :service="service" class="mt-10 sm:mt-0" />
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetSectionBorder from '@/Jetstream/SectionBorder';
import ServiceDetailStats from "@/Pages/Service/ServiceDetailStats";
import EditServiceForm from "@/Pages/Service/EditServiceForm";
import ManageServiceOptionForm from "@/Pages/Service/ManageServiceOptionForm";
import DeleteServiceForm from "@/Pages/Service/DeleteServiceForm";

export default {
    components: {
        DeleteServiceForm,
        EditServiceForm,
        AppLayout,
        ServiceDetailStats,
        JetSectionBorder,
        ManageServiceOptionForm,
    },

    props: [
        'service',
        'availableProtocols',
    ],
}
</script>

<style scoped>

</style>
