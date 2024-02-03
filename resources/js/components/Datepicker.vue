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
            <p><input type="submit" value="Enviar"></p>
        </form>
        <h2>{{ showResult }}</h2>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return {
            time: { entrada: null, saida: null },
            showResult: null
        };
    },
    methods: {
        calcular(){
            axios
            .post('/calcular', this.time)
            .then((response) => this.showResult = (response.data))
        }
    }
}
</script>
