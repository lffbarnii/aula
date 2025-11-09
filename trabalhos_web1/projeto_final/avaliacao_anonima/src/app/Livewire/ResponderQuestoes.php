<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pergunta;
use App\Models\Resposta;

class ResponderQuestoes extends Component
{
    public $dispositivoId;
    public $perguntas = [];      
    public $index = 0;
    public $perguntaAtual = null;
    public $nota = null;
    public $texto = '';
    public $finalizado = false;

    public function mount($dispositivoId)
    {
        $this->dispositivoId = $dispositivoId;

        $query = Pergunta::query();

        if (\Schema::hasColumn((new Pergunta)->getTable(), 'ordem')) {
            $query->orderBy('ordem');
        } else {
            $query->orderBy('id');
        }

        $this->perguntas = $query->where('status', true)->get()->all();

        $this->perguntaAtual = $this->perguntas[$this->index] ?? null;

        if (!$this->perguntaAtual) {
            $this->finalizado = true;
        }
    }

    public function responder()
    {
        if ($this->finalizado) {
            return;
        }

        $this->validate([
            'nota' => 'required|integer|between:0,10',
            'texto' => 'nullable|string|max:2000',
        ]);

        if (!$this->perguntaAtual) {
            $this->finalizado = true;
            return;
        }

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
            $this->finalizado = true;
        }
    }

    public function render()
    {
        return view('livewire.responder-questoes');
    }
}
