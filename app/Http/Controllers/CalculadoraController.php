<?php

namespace App\Http\Controllers;

use App\Models\HorasTrabalhadas;
use DateTime;
use Illuminate\Http\Request as Request;

class CalculadoraController extends Controller
{
    public function getData(Request $request)
    {
        $calcularHoras = HorasTrabalhadas::calcular(
            new DateTime($request->entrada['hours'].":".$request->entrada['minutes']),
            new DateTime($request->saida['hours'].":".$request->saida['minutes'])
        );

        return $calcularHoras;

        /*$entrada = date_create($request->entrada['hours'].":".$request->entrada['minutes']);
        $saida = date_create($request->saida['hours'].":".$request->saida['minutes']);

        if ($saida < $entrada) {
            $saida = $saida->modify('+1 day');
        }

        $resultado = date_diff($entrada,$saida);

        $resultado = $resultado->format('%H:%I');
        */
    }
}
