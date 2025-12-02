<?php

use App\Models\Usuario;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\PerguntaController;


Route::get('/', function () {

    return view('questoes.index', ['dispositivo_id' => (int) 1]);
});


Route::get('/usuarios', function () {
    $usuarios = Usuario::all();

    return view('usuarios.index', compact('usuarios'));
});

Route::resource('usuarios', UsuarioController::class);
Route::resource('setores', SetorController::class)
    ->parameters(['setores' => 'setor']);
Route::resource('dispositivos', DispositivoController::class);
Route::resource('perguntas', PerguntaController::class);
