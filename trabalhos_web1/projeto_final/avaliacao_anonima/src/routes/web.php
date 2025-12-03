<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\PerguntaController;
use App\Http\Controllers\LoginController;


Route::get('/', function () {

    return view('questoes.index', ['dispositivo_id' => (int) 1]);
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Proteger rotas administrativas
Route::middleware('auth')->group(function () {
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('setores', SetorController::class)->parameters(['setores' => 'setor']);
    Route::resource('dispositivos', DispositivoController::class);
    Route::resource('perguntas', PerguntaController::class);
});

// Rota pública (avaliação)
Route::get('/', function () {
    return view('questoes.index', ['dispositivo_id' => 1]);
});

// web.php (REMOVA DEPOIS DE USAR!)
Route::get('/criptografar-senhas', function() {
    $usuarios = \App\Models\Usuario::all();
    foreach ($usuarios as $usuario) {
        // Só criptografa se ainda não estiver
        if (strlen($usuario->senha) < 60) {
            $usuario->senha = bcrypt($usuario->senha);
            $usuario->save();
        }
    }
    return 'Senhas criptografadas!';
});