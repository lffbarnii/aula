<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function index()
    {
        $setores = Setor::all();
        return view('setores.index', compact('setores'));
    }

    public function create()
    {
        return view('setores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:100'
        ]);

        Setor::create($request->all());

        return redirect()->route('setores.index')->with('success', 'Setor criado!');
    }

    public function edit(Setor $setor)
    {
        return view('setores.edit', compact('setor'));
    }

    public function update(Request $request, Setor $setor)
    {
        $request->validate([
            'descricao' => 'required|string|max:100'
        ]);

        $setor->update($request->all());

        return redirect()->route('setores.index')->with('success', 'Setor atualizado!');
    }

    public function destroy(Setor $setor)
    {
        $setor->delete();

        return redirect()->route('setores.index')->with('success', 'Setor removido!');
    }
}
