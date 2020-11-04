<template>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Path
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Methods
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Type
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Freeze
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="routeItem in routes.data">
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <a :href="route('route.show', [routeItem.id])" class="text-sm leading-5 font-medium text-blue-600 hover:text-blue-900">
                                    {{ routeItem.path }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <span class="text-sm leading-5 text-gray-500 uppercase">
                                    {{ routeItem.methods.join(' | ') }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <span class="text-sm leading-5 text-gray-900">
                                    {{ routeItem.type }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <span class="text-sm leading-5 text-gray-500">
                                    {{ routeItem.freeze ? (routeItem.freeze_ttl ? routeItem.freeze_ttl + ' seconds' : 'Forever') : '-' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                <span v-if="routeItem.published" :class="{
                                        'bg-green-100 text-green-800': routeItem.available,
                                        'bg-red-100 text-red-800': !routeItem.available
                                      }"
                                      class="px-2 capitalize inline-flex text-xs leading-5 font-semibold rounded-full">
                                    {{ routeItem.available ? 'Available' : 'Not Available' }}
                                </span>
                                <span v-if="!routeItem.published" :class="{
                                        'bg-green-100 text-green-800': routeItem.published,
                                        'bg-gray-100 text-gray-800': !routeItem.published
                                      }"
                                      class="px-2 capitalize inline-flex text-xs leading-5 font-semibold rounded-full">
                                    {{ routeItem.published ? 'Published' : 'Not Published' }}
                                </span>
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
        'routes',
    ],
}
</script>

<style scoped>

</style>
