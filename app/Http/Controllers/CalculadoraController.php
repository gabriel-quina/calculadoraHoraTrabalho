<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Request;

class CalculadoraController extends Controller
{
    public function calcular(Request $request)
    {

        $horainicial = $request->entrada;
        $horafinal = $request->saida;

        echo $horainicial, $horafinal;

        /*
        $result = 0;

        if ($horafinal < $horainicial) {
            $result = $horainicial - $horafinal;
            echo $result;
        }
        if ($horainicial < $horafinal) {
            $result = $horafinal - $horainicial;
            echo $result;
        }
        */
    }
}
