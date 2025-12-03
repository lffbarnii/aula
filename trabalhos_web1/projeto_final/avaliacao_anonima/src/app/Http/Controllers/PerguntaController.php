<?php

namespace App\Http\Controllers;

use App\Models\Pergunta;
use Illuminate\Http\Request;
use App\Models\Setor;

class PerguntaController extends Controller
{
    public function index()
    {
        $perguntas = Pergunta::all();
        return view('perguntas.index', compact('perguntas'));
    }

    public function create()
    {
        $setores = Setor::all();
        return view('perguntas.create', compact( 'setores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'texto' => 'required|string',
            'ordem' => 'nullable|integer',
            'status' => 'boolean'
        ]);

        Pergunta::create([
            'texto' => $request->texto,
            'ordem' => $request->ordem,
            'status' => $request->status ?? true
        ]);

        return redirect()->route('perguntas.index')->with('success', 'Pergunta criada!');
    }

    public function edit(Pergunta $pergunta)
    {
        $setores = Setor::all();
        return view('perguntas.edit', compact('pergunta', 'setores'));
    }

    public function update(Request $request, Pergunta $pergunta)
    {
        $request->validate([
            'texto' => 'required|string',
            'ordem' => 'nullable|integer',
            'status' => 'boolean'
        ]);

        $pergunta->update([
            'texto' => $request->texto,
            'ordem' => $request->ordem,
            'status' => $request->status ?? true,
            'setor_id' => $request->setor_id
        ]);

        return redirect()->route('perguntas.index')->with('success', 'Pergunta atualizada!');
    }

    public function destroy(Pergunta $pergunta)
    {
        $pergunta->delete();
        return redirect()->route('perguntas.index')->with('success', 'Pergunta removida!');
    }
}
