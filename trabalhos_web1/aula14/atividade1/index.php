<?php

namespace aula14\atividade1;

use aula14\model\Calculadora;
use aula14\model\Computador;

include_once '../model/calculadora.php';
include_once '../model/computador.php';

echo Calculadora::adiciona(1,2);
echo Calculadora::subtrai(1,2);
echo Calculadora::multiplica(1,2);
echo Calculadora::divide(1,2);

$oComputador = new Computador();

$oComputador->ligar();
$oComputador->desligar();
$oComputador->getStatus();