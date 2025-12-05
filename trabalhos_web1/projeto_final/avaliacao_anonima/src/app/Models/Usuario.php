<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';
    protected $fillable = ['login', 'senha'];
    protected $hidden = ['senha'];
    
    public $timestamps = false;
    
    public function getAuthPassword()
    {
        return $this->senha;
    }
    
    public function getAuthIdentifierName()
    {
        return 'login';
    }
}