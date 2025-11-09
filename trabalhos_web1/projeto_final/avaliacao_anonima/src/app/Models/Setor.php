<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $table = 'setores';

    protected $fillable = ['descricao'];

    public $timestamps = false;

    public function dispositivos()
    {
        return $this->hasMany(Dispositivo::class, 'setor_id');
    }
}