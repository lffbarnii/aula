<?php

namespace aula14\atividade2;

include_once '../model/time.php';

use aula14\model\Time;

$oTime = new Time();

$oTime->setNome('Vasco da Gama');
$oTime->setAnoFundacao(1889);
$oTime->adicionaJogador('Lucas Ribeiro', 'AT', '2025-03-10');
$oTime->adicionaJogador('Pedro Santos', 'ME', '2025-05-22');
$oTime->adicionaJogador('Mateus Oliveira', 'DF', '2025-07-18');
$oTime->adicionaJogador('Gabriel Costa', 'GK', '2025-01-30');
$oTime->adicionaJogador('Ricardo Lima', 'AT', '2025-09-12');
$oTime->adicionaJogador('Henrique Almeida', 'ME', '2025-06-05');
$oTime->adicionaJogador('Felipe Martins', 'DF', '2025-04-27');
$oTime->adicionaJogador('Bruno Carvalho', 'ME', '2025-08-14');
$oTime->adicionaJogador('Rafael Dias', 'DF', '2025-02-20');
$oTime->adicionaJogador('Vinicius Souza', 'AT', '2025-11-09');

$oTime->listaJogadores();