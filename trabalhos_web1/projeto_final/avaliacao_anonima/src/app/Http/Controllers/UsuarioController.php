<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required|string|unique:usuarios',
            'senha' => 'required|string|min:6'
        ]);

        Usuario::create([
            'login' => $request->login,
            'senha' => bcrypt($request->senha)  // ← Adicione bcrypt()
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuário criado com sucesso!');
    }



    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'login' => 'required|string|unique:usuarios,login,' . $usuario->id,
            'senha' => 'nullable|string|min:6'
        ]);

        $usuario->login = $request->login;
        
        if ($request->filled('senha')) {
            $usuario->senha = bcrypt($request->senha);  // ← Adicione bcrypt()
        }
        
        $usuario->save();

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuário removido!');
    }
}
