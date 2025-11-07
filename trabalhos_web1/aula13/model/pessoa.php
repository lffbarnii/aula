<?php

namespace aula13\model;

include_once 'contato.php';
include_once 'endereco.php';

use DateTime;
use JsonSerializable;

class Pessoa implements JsonSerializable{
    private $nome;
    private $sobrenome;
    private $dataNascimento;
    private $cpfCnpj;
    private $tipo; // 1 -Física 2 - Jurídica
    private $telefone;
    private $endereco;

    public function __construct(){
        $this->inicializaClasse();
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getSobrenome(){
        return $this->sobrenome;
    }

    public function setSobrenome($sobrenome){
        $this->sobrenome = $sobrenome;
    }

    public function getDataNascimento(){
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento){
        $this->dataNascimento = $dataNascimento;
    }

    public function getCpfCnpj(){
        return $this->cpfCnpj;
    }

    public function setCpfCnpj($cpfCnpj){
        $this->cpfCnpj = $cpfCnpj;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getTelefone(){
        if(!isset($this->telefone)){
            $this->telefone = new Contato();
        }

        return $this->telefone;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function getEndereco(){
        if(!isset($this->endereco)){
            $this->endereco = new Endereco();
        }

        return $this->endereco;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    public function getNomeCompleto(){
        return $this->getNome() + ' ' + $this->getSobrenome();
    }

    public function getIdade(){
        if(!$this->dataNascimento){
            return null;
        }

        $dataNascimento = new DateTime($this->dataNascimento);
        $hoje = new DateTime();
        $idade = $hoje->diff($dataNascimento)->y;

        return $idade;
    }

    private function inicializaClasse(){
        $this->setTipo(1);
    }

    public function jsonSerialize(){
        return [
            'nome' => $this->nome,
            'sobrenome' => $this->sobrenome,
            'dataNascimento' => $this->dataNascimento,
            'cpfCnpj' => $this->cpfCnpj,
            'tipo' => $this->tipo,
            'telefone' => $this->telefone,
            'endereco' => $this->endereco
        ];
    }

}