<?php

use App\Http\Controllers\CalculadoraController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::post('calcular', [CalculadoraController::class, 'getData']);
