<template>
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
        <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6 shadow sm:rounded-lg">
            <h3 class="text-base leading-6 font-medium text-gray-900">
                Engine Stats
            </h3>
            <div class="mt-5">
                <div class="px-4 py-5 sm:p-0">
                    <dl>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:py-2">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Version
                            </dt>
                            <dd class="mt-1 font-medium text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                1.0.0
                            </dd>
                        </div>
                        <div class="sm:grid sm:border-t sm:grid-cols-3 sm:gap-4 sm:py-2">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Online
                            </dt>
                            <dd class="mt-1 font-medium text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                1 node(s)
                            </dd>
                        </div>
                        <div class="sm:grid sm:border-t sm:grid-cols-3 sm:gap-4 sm:py-2">
                            <dt class="text-sm font-medium leading-5 font-medium text-gray-500">
                                Offline
                            </dt>
                            <dd class="mt-1 font-medium text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                0 node(s)
                            </dd>
                        </div>
                        <div class="sm:grid sm:border-t sm:grid-cols-3 sm:gap-4 sm:py-2">
                            <dt class="text-sm font-medium leading-5 font-medium text-gray-500">
                                Gateway
                            </dt>
                            <dd class="mt-1 font-medium text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                <a class="text-blue-500 hover:text-blue-600" href="https://api.kemnaker.go.id">api.kemnaker.go.id</a>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
        <div class="bg-white py-5 border-b border-gray-200 shadow sm:rounded-lg">
            <h3 class="text-base leading-6 font-medium text-gray-900 sm:px-6 px-4">
                Top 5 Service Latency
            </h3>
            <div class="mt-5">
                <ul>
                    <li v-for="(service, index) in latencies" :class="{'border-t border-gray-200': index > 0}">
                        <inertia-link :href="route('service.show', [service.id])" class="block hover:bg-gray-50 sm:px-6 px-4 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                            <div class="flex items-center py-2">
                                <div class="min-w-0 flex-1 md:grid md:grid-cols-3 md:gap-4">
                                    <div class="text-sm leading-5 font-medium text-blue-600 truncate">
                                        {{ service.name }}
                                    </div>
                                    <div>
                                        <span :class="{
                                                'bg-green-100 text-green-800': service.available,
                                                'bg-red-100 text-red-800': !service.available
                                              }"
                                              class="px-2 capitalize inline-flex text-xs font-semibold rounded-full">
                                            {{ service.available ? 'Available' : 'Not Available' }}
                                        </span>
                                    </div>
                                    <div class="text-sm leading-5 font-normal text-gray-500">
                                        {{ service.latency }} seconds
                                    </div>
                                </div>
                                <div>
                                    <!-- Heroicon name: chevron-right -->
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </inertia-link>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6 shadow sm:rounded-lg">
            <h3 class="text-base leading-6 font-medium text-gray-900">
                Top 5 Service Hits
            </h3>
            <div class="mt-5">
                <ul>
                    <li v-for="(service, index) in hits" :class="{'border-t border-gray-200': index > 0}">
                        <inertia-link :href="route('service.show', [service.id])" class="block hover:bg-gray-50 sm:px-6 px-4 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                            <div class="flex items-center py-2">
                                <div class="min-w-0 flex-1 md:grid md:grid-cols-3 md:gap-4">
                                    <div class="text-sm leading-5 font-medium text-blue-600 truncate">
                                        {{ service.name }}
                                    </div>
                                    <div>
                                        <span :class="{
                                                'bg-green-100 text-green-800': service.available,
                                                'bg-red-100 text-red-800': !service.available
                                              }"
                                              class="px-2 capitalize inline-flex text-xs font-semibold rounded-full">
                                            {{ service.available ? 'Available' : 'Not Available' }}
                                        </span>
                                    </div>
                                    <div class="text-sm leading-5 font-normal text-gray-500">
                                        {{ service.latency }}k hits
                                    </div>
                                </div>
                                <div>
                                    <!-- Heroicon name: chevron-right -->
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </inertia-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'latencies',
        'hits',
    ],
}
</script>

<style scoped>

</style>
