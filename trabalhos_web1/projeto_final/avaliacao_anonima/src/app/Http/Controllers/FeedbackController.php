<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Setor;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        $setorId = $request->get('setor_id');
        
        $setores = Setor::all();
        $setorSelecionado = $setorId ? Setor::find($setorId) : null;

        $feedbacks = Feedback::with(['dispositivo.setor'])
            ->when($setorId, function($query) use ($setorId) {
                $query->whereHas('dispositivo', function($q) use ($setorId) {
                    $q->where('setor_id', $setorId);
                });
            })
            ->orderBy('data_feedback', 'desc')
            ->paginate(20);

        $totalFeedbacks = Feedback::when($setorId, function($query) use ($setorId) {
            $query->whereHas('dispositivo', function($q) use ($setorId) {
                $q->where('setor_id', $setorId);
            });
        })->count();

        $feedbacksPorSetor = Feedback::selectRaw('setores.descricao, COUNT(feedbacks.id) as total')
            ->join('dispositivos', 'feedbacks.dispositivo_id', '=', 'dispositivos.id')
            ->join('setores', 'dispositivos.setor_id', '=', 'setores.id')
            ->groupBy('setores.id', 'setores.descricao')
            ->orderBy('total', 'desc')
            ->get();

        return view('feedbacks.index', compact(
            'feedbacks',
            'setores',
            'setorSelecionado',
            'totalFeedbacks',
            'feedbacksPorSetor'
        ));
    }
}