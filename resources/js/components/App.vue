<style>
</style>
<template>
    <h1>Olá Mundo com Laravel 10 e VueJS!!!</h1>

    <VueDatePicker v-model="date" time-picker/>
</template>

<script>
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

export default {
components: { VueDatePicker },
data() {
    return {
    date: null,
    };
}
}
</script>
