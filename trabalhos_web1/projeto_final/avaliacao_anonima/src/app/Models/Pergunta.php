<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    protected $table = 'perguntas';

    protected $fillable = ['texto', 'ordem', 'status', 'setor_id'];

    public $timestamps = false;

    public function respostas()
    {
        return $this->hasMany(Resposta::class, 'pergunta_id');
    }

     public function setor()
    {
        return $this->belongsTo(Setor::class, 'setor_id');
    }
}
