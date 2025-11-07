<?php

namespace aula13\model;

use JsonSerializable;

class Contato implements JsonSerializable{
    private $tipo; // 1 - Telefone 2 - Email
    private $nome;
    private $valor;

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function jsonSerialize(){
        return [
            'tipo' => $this->tipo,
            'nome' => $this->nome,
            'valor' => $this->valor
        ];
    }
}