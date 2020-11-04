<template>
    <select ref="input"
            :value="value"
            @input="$emit('input', $event.target.value)"
            class="form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
        <option v-for="item in items" :value="valueField ? item[valueField] : item">
            {{ displayField ? item[displayField] : item }}
        </option>
    </select>
</template>

<script>
export default {
    props: ['value', 'items', 'valueField', 'displayField'],

    methods: {
        focus() {
            this.$refs.input.focus();
        }
    },
}
</script>

<style scoped>

</style>
