<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\PerguntaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RelatorioController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/', function () {
    $dispositivoId = request()->cookie('dispositivo_id', 1);
    return view('questoes.index', ['dispositivo_id' => (int) $dispositivoId]);
})->middleware('verificar.dispositivo');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('setores', SetorController::class)->parameters(['setores' => 'setor']);
    Route::resource('perguntas', PerguntaController::class);
    Route::get('/dispositivos/selecionar', [DispositivoController::class, 'selecionar'])->name('dispositivos.selecionar');
    Route::post('/dispositivos/definir', [DispositivoController::class, 'definir'])->name('dispositivos.definir');
    Route::resource('dispositivos', DispositivoController::class);
    Route::get('/relatorios', [RelatorioController::class, 'index'])->name('relatorios.index');
    Route::get('/relatorios/dados', [RelatorioController::class, 'dados'])->name('relatorios.dados');
});