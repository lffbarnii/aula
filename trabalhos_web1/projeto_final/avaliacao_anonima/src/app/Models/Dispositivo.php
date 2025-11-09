<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    protected $table = 'dispositivos';

    protected $fillable = ['descricao', 'status', 'setor_id'];

    public $timestamps = false;

    public function setor()
    {
        return $this->belongsTo(Setor::class, 'setor_id');
    }

    public function respostas()
    {
        return $this->hasMany(Resposta::class, 'dispositivo_id');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'dispositivo_id');
    }
}
