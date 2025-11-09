<?php

use App\Models\Usuario;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return view('perguntas.index', ['dispositivo_id' => (int) 1]);
});


Route::get('/usuarios', function () {
    $usuarios = Usuario::all();

    return view('usuarios.index', compact('usuarios'));
});
