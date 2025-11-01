<?php

namespace app\model;

class Pessoa{
    private $nome;
    private $sobrenome;
    private $dataNascimento;
    private $cpfCnpj;
    private $tipo;
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
        if($tipo != 1 && $tipo != 2){
            throw new Exception('Tipo Inválido');
        }
        else{
            $this->tipo = $tipo;    
        }
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function getEndereco(){
        return $this->endereco;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    public function getNomeCompleto(){
        return $this->getNome() . ' ' . $this->getSobrenome();
    }

    public function getIdade(){
        $hoje = new DateTime();
        $idade = $hoje->diff($this->getDataNascimento())->y;
        return $idade;
    }

    private function inicializaClasse(){
        $this->tipo = 1;
    }

    public function getDescricaoTipo(){
        switch($this->getTipo()){
            case 1:
                return 'Pessoa Física';

            case 2:
                return 'Pessoa Jurídica';
        }
    }
}
