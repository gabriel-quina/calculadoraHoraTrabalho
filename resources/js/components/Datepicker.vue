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
        <h3>Horário entrada</h3>
        <Datepicker v-model="horaEntrada"
            time-picker
            disable-time-range-validation
            placeholder="Selecione horario de entrada no Trabalho">
        </Datepicker>
        <h3>Horário saida</h3>
        <Datepicker v-model="horaSaida"
            time-picker
            disable-time-range-validation
            placeholder="Selecione horario de saida no Trabalho">
        </Datepicker>
    </div>
</template>
<script setup>
    import { ref } from 'vue';

    const horaEntrada = ref({
        entrada_hours: new Date().getHours(),
        saida_minutes: new Date().getMinutes()
    });
    const horaSaida = ref({
        hours: new Date().getHours(),
        minutes: new Date().getMinutes()
    });
</script>
<script>
import DatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

export default {
    components: { DatePicker },
    data() {
        return {
            horaEntrada: null,
            horaSaida: null,
        };
    },
    methods: {
        calcular(){
            axios.post('/calcular', this.horarios).then( response => {
                alert('Sucesso');
            }, error => {
                console.log('erro');
            });
        },
    }
}
</script>
