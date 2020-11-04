<template>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Protocol
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Latency
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 bg-gray-50"></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="service in services">
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 font-medium text-gray-900">
                                        {{ service.name }}
                                    </div>
                                    <div class="text-sm leading-5 text-gray-500">
                                        {{ service.description }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <span class="text-sm leading-5 text-gray-500">
                                        {{ service.driver }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="flex items-center space-x-3">
                                        <span aria-label="Running" class="h-4 w-4 bg-green-100 rounded-full flex items-center justify-center">
                                            <span class="h-2 w-2 bg-green-400 rounded-full"></span>
                                        </span>
                                        <span class="block">
                                            <h2 class="text-sm font-medium leading-5">
                                                {{ service.latency }} seconds
                                            </h2>
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    <span :class="{
                                            'bg-green-100 text-green-800': service.available,
                                            'bg-red-100 text-red-800': !service.available
                                          }"
                                          class="px-2 capitalize inline-flex text-xs leading-5 font-semibold rounded-full">
                                        {{ service.available ? 'Available' : 'Not Available' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                    <inertia-link :href="route('service.show', [service.id])" class="text-blue-600 hover:text-blue-900">
                                        View
                                    </inertia-link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'services',
    ],
}
</script>

<style scoped>

</style>
