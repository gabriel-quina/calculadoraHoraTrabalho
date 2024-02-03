<script>
import { ref } from 'vue';
import axios from "axios";
import TimePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

export default {
    components: { TimePicker },
    data() {

        const time = ref()

        return {
            payload: { entrada: null, saida: null },
            time: null,
            showResult: null,
        };

        /*
        return {
            time: { entrada: null, saida: null },
            showResult: null,
            timedata: null,
        };*/
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
            placeholder="Selecione horário de entrada e saida">
        </TimePicker>
        <p>
            <button @click="calcular">Enviar</button>
        </p>

        <h2>{{ showResult }}</h2>


       <!-- <form @submit.prevent="calcular">
            <h3>Horário entrada</h3>
            <input type="time" id="horaEntrada" v-model="time.entrada">
            <h3>Horário saida</h3>
            <input type="time" id="horaSaida" v-model="time.saida">
            <p><input type="submit" value="Enviar"></p>
        </form>
        <h2>{{ showResult }}</h2> -->
    </div>
</template>
<style>
    div.container {
        padding: 10px;
        margin: auto;
        min-width: 170px;
        width: 20%;
    }
    .d__input_wrap {
        max-width: 100px;
    }
</style>
