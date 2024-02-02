<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::post('calcular', 'App\Http\Controllers\CalculadoraController@index');

Route::get('get-message', function (){
    return response()->json([
        'message' => 'Hello there, it\'s your first response.'
    ], 200);
});

Route::post('post-data', function (\Illuminate\Http\Request $request){
    return response()->json([
        'message' => 'Your requested data is : ' . $request->full_name
    ]);
});
