<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    protected $table = 'perguntas';

    protected $fillable = ['texto', 'ordem', 'status'];

    public $timestamps = false;

    public function respostas()
    {
        return $this->hasMany(Resposta::class, 'pergunta_id');
    }
}
