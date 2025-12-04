<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    protected $fillable = [
        'dispositivo_id',
        'pergunta_id',
        'nota',
        'texto',
        'data_resposta'
    ];
    
    protected $casts = [
        'data_resposta' => 'datetime',
    ];

    public $timestamps = false;

    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class);
    }

    public function pergunta()
    {
        return $this->belongsTo(Pergunta::class);
    }
}