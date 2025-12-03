<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';
    protected $fillable = ['login', 'senha'];  // ← Importante!
    protected $hidden = ['senha'];
    
    public $timestamps = false;  // ← Sua tabela não tem created_at/updated_at
    
    public function getAuthPassword()
    {
        return $this->senha;
    }
    
    public function getAuthIdentifierName()
    {
        return 'login';
    }
}