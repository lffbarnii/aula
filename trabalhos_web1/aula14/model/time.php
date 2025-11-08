<?php

namespace aula14\model;

require_once 'jogador.php';

use aula14\model\Jogador;

class Time{
    private $nome;
    private $anoFundacao;
    private $jogadores;

    public function __construct(){
        $this->jogadores = [];
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getAnoFundacao(){
        return $this->anoFundacao;
    }

    public function setAnoFundacao($anoFundacao){
        $this->anoFundacao = $anoFundacao;
    }

    public function adicionaJogador($nome, $posicao, $dataNascimento){
        $oJogador = new Jogador();

        $oJogador->setNome($nome);
        $oJogador->setPosicao($posicao);
        $oJogador->setDataNascimento($dataNascimento);

        $this->jogadores[] = $oJogador;
    }

    public function listaJogadores(){
        foreach($this->jogadores as $oJogador){
            echo 'Nome: ' . $oJogador->getNome() . '<br>';
            echo 'Posição: ' . $oJogador->getPosicao() . '<br>';
            echo 'Data de Nascimento: ' . $oJogador->getDataNascimento() . '<br>';
            echo '--------------------------------------------------------------<br>';
        }
    }
}