<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    protected $table = 'respostas';

    protected $fillable = [
        'dispositivo_id',
        'pergunta_id',
        'nota',
        'texto'
    ];

    public $timestamps = false;

    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class, 'dispositivo_id');
    }

    public function pergunta()
    {
        return $this->belongsTo(Pergunta::class, 'pergunta_id');
    }
}
