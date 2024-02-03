<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request as Request;

class CalculadoraController extends Controller
{
    public function calcular(Request $request)
    {

        $horaEntrada = strtotime($request->entrada);
        $horaSaida = strtotime($request->saida);

        if ($horaEntrada == $horaSaida) return;

        if ($horaEntrada < $horaSaida OR ($horaEntrada > $horaSaida AND $horaSaida > strtotime('00:00:00'))){
            $horatrabalhada = $horaSaida - $horaEntrada;
        }

        $hours = floor($horatrabalhada/ 3600);
        $minutes = floor(($horatrabalhada / 60) % 60);

        echo $hours, ":", $minutes;

    }
}
