<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required',
            'senha' => 'required'
        ]);

        if (Auth::attempt(['login' => $credentials['login'], 'password' => $credentials['senha']], $request->filled('remember'))) {
            $request->session()->regenerate();
            
            // Redireciona para onde estava tentando acessar OU para seleção de dispositivos
            return redirect()->intended(route('dispositivos.selecionar'));
        }

        return back()->withErrors([
            'login' => 'Credenciais inválidas.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')->with('success', 'Logout realizado com sucesso!');
    }
}