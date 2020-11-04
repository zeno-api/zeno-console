<template>
    <div>
        <div class="grid grid-cols-1 sm:rounded-lg bg-white overflow-hidden shadow md:grid-cols-3">
            <div>
                <div class="px-4 py-5 sm:p-6">
                    <dl>
                        <dt class="text-base leading-6 font-normal text-gray-900">
                            Total Hits 30 Last Days
                        </dt>
                        <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                            <div class="flex items-baseline text-2xl leading-8 font-semibold text-indigo-600">
                                25,501
                                <span class="ml-2 text-sm leading-5 font-medium text-gray-500">
                                    from 20,301
                                </span>
                            </div>
                            <div class="inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium leading-5 bg-green-100 text-green-800 md:mt-2 lg:mt-0">
                                <svg class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">
                                    Increased by
                                </span>
                                5%
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
            <div class="border-t border-gray-200 md:border-0 md:border-l">
                <div class="px-4 py-5 sm:p-6">
                    <dl>
                        <dt class="text-base leading-6 font-normal text-gray-900">
                            Latency
                        </dt>
                        <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                            <div class="flex items-baseline text-2xl leading-8 font-semibold text-indigo-600">
                                {{ service.latency }}
                                <span class="ml-2 text-sm leading-5 font-medium text-gray-500">
                                    seconds
                                </span>
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
            <div class="border-t border-gray-200 md:border-0 md:border-l">
                <div class="px-4 py-5 sm:p-6">
                    <dl>
                        <dt class="text-base leading-6 font-normal text-gray-900">
                            Availability
                        </dt>
                        <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                            <div class="flex items-baseline text-2xl leading-8 font-semibold text-indigo-600">
                                99.8%
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'service',
    ],
}
</script>

<style scoped>

</style>
