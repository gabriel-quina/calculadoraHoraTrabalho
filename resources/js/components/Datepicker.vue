<script>
import axios from "axios";
import TimePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

export default {
    components: { TimePicker },
    data() {
        return {
            payload: { entrada: null, saida: null },
            time: null,
            showResult: null,
        };
    },
    methods: {
        log(){
            console.log([this.payload.entrada = this.time[0], this.payload.saida = this.time[1]]);
        },
        calcular(){
            this.payload.entrada = this.time[0]
            this.payload.saida = this.time[1]
            axios
            .post('/calcular', this.payload)
            .then((response) => this.showResult = (response.data))
            //.then((response) => this.showResult = (response))
        }
    }
}
</script>
<template>

    <div class="container">
        <TimePicker
            v-model="time"
            time-picker
            disable-time-range-validation
            range
            dark
            placeholder="Hora entrada e saida">
        </TimePicker>
        <p>
            <button @click="calcular">Enviar</button>
        </p>

        <h2>{{ showResult }}</h2>

    </div>
</template>
<style>
    .container {
        padding: 10px;
        margin: auto;
        min-width: 220px;
        width: 40%;
    }
    .dp__main {
        max-width: 260px;
        margin: auto;
    }
    .dp__main input::placeholder {
        text-align: center;
    }
</style>
