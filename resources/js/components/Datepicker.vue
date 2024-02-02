<script setup>
import { ref } from 'vue';
import Datepicker from '@vuepic/vue-datepicker'
import '@vuepic/vue-datepicker/dist/main.css'

const time = ref();
</script>

<template>
    <div class="container">
        <h3>Horário entrada</h3><Datepicker v-model="time" time-picker disable-time-range-validation range placeholder="Selecione seu horário de trabalho" />
    </div>
</template>

<style>
    div.container {
        padding: 10px;
        margin: auto;
        width: 50%;
    }
    .d__input_wrap {
        max-width: 100px;
    }
</style>
