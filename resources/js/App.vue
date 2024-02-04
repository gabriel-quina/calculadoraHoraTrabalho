<script>
    import Datepicker from "./components/Datepicker.vue";
    export default {
        components: { Datepicker: Datepicker},
    }
</script>
<template>
    <h1>
        Calculadora de Horas Trabalhadas
        <p>Noturno/Diurno</p>
    </h1>

    <div>
        <Datepicker />
    </div>

</template>

<style>
    #app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    margin-top: 60px;
    }
</style>
