<?php

namespace aula13\atividade1;

require_once '../model/pessoa.php';

use aula13\model\Pessoa;

$oLuis = new Pessoa();

$oLuis->setNome('Luis Felipe');
$oLuis->setSobrenome('Frutuoso Barni');
$oLuis->setDataNascimento('2005-20-04');
$oLuis->setCpfCnpj('07185482992');
$oLuis->getTelefone()->setTipo(1);
$oLuis->getTelefone()->setNome('Telefone');
$oLuis->getTelefone()->setValor('4799573329');
$oLuis->getEndereco()->setLogradouro('Rua Tarcísio Juttel, 77');
$oLuis->getEndereco()->setBairro('Centro');
$oLuis->getEndereco()->setCidade('Vidal Ramos');
$oLuis->getEndereco()->setEstado('SC');
$oLuis->getEndereco()->setCep('88443-000');