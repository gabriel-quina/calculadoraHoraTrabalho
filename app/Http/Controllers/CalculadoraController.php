<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Request;

class CalculadoraController extends Controller
{
    public function index(Request $request)
    {
        $horainicial = $request->input('horainicial');
        $horafinal = $request->input('horafinal');
        $result = 0;

        if ($horafinal < $horainicial) {
            $result = $horainicial - $horafinal;
            echo $result;
        }
        if ($horainicial < $horafinal) {
            $result = $horafinal - $horainicial;
            echo $result;
        }

        echo $request;
    }
}
