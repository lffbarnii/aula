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

    public function selecionar()
    {
        $dispositivos = Dispositivo::where('status', true)
            ->with('setor')
            ->orderBy('id')
            ->get();
        
        $dispositivoAtual = request()->cookie('dispositivo_id');
        
        return view('dispositivos.selecionar', compact('dispositivos', 'dispositivoAtual'));
    }

    public function definir(Request $request)
    {
        $request->validate([
            'dispositivo_id' => 'required|exists:dispositivos,id'
        ]);
        
        $dispositivo = Dispositivo::findOrFail($request->dispositivo_id);
        
        return redirect()
            ->route('dispositivos.selecionar')
            ->withCookie(cookie('dispositivo_id', $dispositivo->id, 60 * 24 * 365))
            ->with('success', "Dispositivo '{$dispositivo->descricao}' selecionado com sucesso!");
    }
}
