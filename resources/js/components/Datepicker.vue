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
<template>
    <div class="container">
        <form @submit.prevent="calcular">
            <h3>Horário entrada</h3>
            <input type="time" id="horaEntrada" v-model="time.entrada">
            <h3>Horário saida</h3>
            <input type="time" id="horaSaida" v-model="time.saida">
            <input type="submit" value="Enviar">
        </form>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            time: { entrada: null, saida: null }
        };
    },
    methods: {
        calcular(){
            axios
            .post('/calcular', this.time)
            .then((response) => console.log(response))
        }
    }
}
</script>
