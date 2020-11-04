<template>
    <input class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
           :value="value"
           @input="$emit('input', $event.target.value)" ref="input">
</template>

<script>
    export default {
        props: ['value'],

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    }
</script>

