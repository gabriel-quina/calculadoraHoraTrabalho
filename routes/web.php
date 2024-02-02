<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::post('calcular', 'App\Http\Controllers\CalculadoraController@calcular');
