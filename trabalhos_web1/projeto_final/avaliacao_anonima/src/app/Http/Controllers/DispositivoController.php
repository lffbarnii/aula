<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use App\Models\Setor;
use Illuminate\Http\Request;

class DispositivoController extends Controller
{
    public function index()
    {
        $dispositivos = Dispositivo::with('setor')->get();
        return view('dispositivos.index', compact('dispositivos'));
    }

    public function create()
    {
        $setores = Setor::all();
        return view('dispositivos.create', compact('setores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:100',
            'status' => 'boolean',
            'setor_id' => 'nullable|exists:setores,id'
        ]);

        Dispositivo::create([
            'descricao' => $request->descricao,
            'status' => $request->status ?? true,
            'setor_id' => $request->setor_id
        ]);

        return redirect()->route('dispositivos.index')->with('success', 'Dispositivo criado!');
    }

    public function edit(Dispositivo $dispositivo)
    {
        $setores = Setor::all();
        return view('dispositivos.edit', compact('dispositivo','setores'));
    }

    public function update(Request $request, Dispositivo $dispositivo)
    {
        $request->validate([
            'descricao' => 'required|string|max:100',
            'status' => 'boolean',
            'setor_id' => 'nullable|exists:setores,id'
        ]);

        $dispositivo->update([
            'descricao' => $request->descricao,
            'status' => $request->status ?? true,
            'setor_id' => $request->setor_id
        ]);

        return redirect()->route('dispositivos.index')->with('success', 'Dispositivo atualizado!');
    }

    public function destroy(Dispositivo $dispositivo)
    {
        $dispositivo->delete();
        return redirect()->route('dispositivos.index')->with('success', 'Dispositivo removido!');
    }
}
