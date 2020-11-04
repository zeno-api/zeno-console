<template>
    <textarea :value="value"
               class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
               @input="$emit('input', $event.target.value)"
               ref="input"></textarea>
</template>

<script>
export default {
    props: ['value'],

    methods: {
        focus() {
            this.$refs.input.focus();
        }
    },
}
</script>

<style scoped>

</style>
