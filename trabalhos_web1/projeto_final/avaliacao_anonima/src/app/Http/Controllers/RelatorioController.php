<?php

namespace App\Http\Controllers;

use App\Models\Resposta;
use App\Models\Setor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    public function index(Request $request)
    {
        $setorId = $request->get('setor_id');
        
        $setores = Setor::all();
        $setorSelecionado = $setorId ? Setor::find($setorId) : null;

        $totalRespostas = Resposta::when($setorId, function($query) use ($setorId) {
            $query->whereHas('dispositivo', function($q) use ($setorId) {
                $q->where('setor_id', $setorId);
            });
        })->count();

        $mediaGeral = Resposta::when($setorId, function($query) use ($setorId) {
            $query->whereHas('dispositivo', function($q) use ($setorId) {
                $q->where('setor_id', $setorId);
            });
        })->avg('nota');

        $mediasPorPergunta = Resposta::select(
                'pergunta_id',
                'perguntas.texto as pergunta_texto',
                DB::raw('AVG(nota) as media'),
                DB::raw('COUNT(*) as total')
            )
            ->join('perguntas', 'respostas.pergunta_id', '=', 'perguntas.id')
            ->when($setorId, function($query) use ($setorId) {
                $query->whereHas('dispositivo', function($q) use ($setorId) {
                    $q->where('setor_id', $setorId);
                });
            })
            ->groupBy('pergunta_id', 'perguntas.texto')
            ->orderBy('pergunta_id')
            ->get();

        $mediasPorSetor = Resposta::select(
                'setores.id',
                'setores.descricao',
                DB::raw('AVG(respostas.nota) as media'),
                DB::raw('COUNT(respostas.id) as total')
            )
            ->join('dispositivos', 'respostas.dispositivo_id', '=', 'dispositivos.id')
            ->join('setores', 'dispositivos.setor_id', '=', 'setores.id')
            ->groupBy('setores.id', 'setores.descricao')
            ->orderBy('setores.descricao')
            ->get();

        $respostasRecentes = Resposta::with(['pergunta', 'dispositivo.setor'])
            ->when($setorId, function($query) use ($setorId) {
                $query->whereHas('dispositivo', function($q) use ($setorId) {
                    $q->where('setor_id', $setorId);
                });
            })
            ->orderBy('data_resposta', 'desc')
            ->limit(20)
            ->get();

        return view('relatorios.index', compact(
            'setores',
            'setorSelecionado',
            'totalRespostas',
            'mediaGeral',
            'mediasPorPergunta',
            'mediasPorSetor',
            'respostasRecentes'
        ));
    }

    public function dados(Request $request)
    {
        $setorId = $request->get('setor_id');

        $mediasPorPergunta = Resposta::select(
                'perguntas.texto as pergunta',
                DB::raw('AVG(nota) as media')
            )
            ->join('perguntas', 'respostas.pergunta_id', '=', 'perguntas.id')
            ->when($setorId, function($query) use ($setorId) {
                $query->whereHas('dispositivo', function($q) use ($setorId) {
                    $q->where('setor_id', $setorId);
                });
            })
            ->groupBy('perguntas.id', 'perguntas.texto')
            ->orderBy('perguntas.id')
            ->get();

        $mediasPorSetor = Resposta::select(
                'setores.descricao as setor',
                DB::raw('AVG(respostas.nota) as media')
            )
            ->join('dispositivos', 'respostas.dispositivo_id', '=', 'dispositivos.id')
            ->join('setores', 'dispositivos.setor_id', '=', 'setores.id')
            ->groupBy('setores.id', 'setores.descricao')
            ->orderBy('setores.descricao')
            ->get();

        return response()->json([
            'mediasPorPergunta' => $mediasPorPergunta,
            'mediasPorSetor' => $mediasPorSetor
        ]);
    }
}