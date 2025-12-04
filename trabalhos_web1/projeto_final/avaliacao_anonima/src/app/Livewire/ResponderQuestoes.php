<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pergunta;
use App\Models\Resposta;
use App\Models\Feedback;
use App\Models\Dispositivo;

class ResponderQuestoes extends Component
{
    public $dispositivoId;
    public $perguntas;
    public $index = 0;
    public $nota = null;
    public $texto = '';
    public $finalizado = false;
    public $modoFeedback = false;
    public $feedbackTexto = '';
    public $perguntaAtual = null;

    public function mount($dispositivoId)
{
    $this->dispositivoId = $dispositivoId;

    $dispositivo = Dispositivo::with('setor')->find($dispositivoId);

    $this->perguntas = Pergunta::where('status', true)
        ->where(function($query) use ($dispositivo) {
            if ($dispositivo && $dispositivo->setor_id) {
                $query->where('setor_id', $dispositivo->setor_id)
                      ->orWhereNull('setor_id');
            } else {
                $query->whereNull('setor_id');
            }
        })
        ->orderBy('ordem')
        ->orderBy('id')
        ->get()
        ->all();

    $this->perguntaAtual = $this->perguntas[$this->index] ?? null;
    
    if (!$this->perguntaAtual) {
        $this->finalizado = true;
    }
}

    public function responder()
    {
        if ($this->finalizado || $this->modoFeedback) {
            return;
        }

        $this->validate([
            'nota' => 'required|integer|between:0,10',
            'texto' => 'nullable|string|max:2000'
        ]);

        if (!$this->perguntaAtual) return;

        Resposta::create([
            'dispositivo_id' => $this->dispositivoId,
            'pergunta_id' => $this->perguntaAtual->id,
            'nota' => $this->nota,
            'texto' => $this->texto ?: null,
            'data_resposta' => now(),
        ]);

        $this->nota = null;
        $this->texto = '';

        $this->index++;

        if (isset($this->perguntas[$this->index])) {
            $this->perguntaAtual = $this->perguntas[$this->index];
        } else {
            $this->perguntaAtual = null;
            $this->modoFeedback = true;
        }
    }

    public function enviarFeedback()
    {
        $this->validate([
            'feedbackTexto' => 'nullable|string|max:5000'
        ]);

        if($this->feedbackTexto){
            Feedback::create([
                'dispositivo_id' => $this->dispositivoId,
                'texto' => $this->feedbackTexto ?: null,
                'data_feedback' => now(),
            ]);
        }

        $this->finalizado = true;
        $this->modoFeedback = false;
    }

    public function render()
    {
        return view('livewire.responder-questoes');
    }
}
