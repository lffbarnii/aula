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
            'login' => 'required|string|max:50|unique:usuarios',
            'senha' => 'required|string|min:4'
        ]);

        Usuario::create([
            'login' => $request->login,
            'senha' => Hash::make($request->senha)
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuário criado!');
    }

    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'login' => 'required|string|max:50|unique:usuarios,login,' . $usuario->id
        ]);

        $data = ['login' => $request->login];

        if ($request->filled('senha')) {
            $data['senha'] = Hash::make($request->senha);
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado!');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuário removido!');
    }
}
