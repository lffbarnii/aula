<?php

namespace aula13\atividade2;

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

$oIasmim = new Pessoa();
$oIasmim->setNome('Iasmim');
$oIasmim->setSobrenome('Frutuoso Barni');
$oIasmim->setDataNascimento('2010-04-15');
$oIasmim->setCpfCnpj('12345678901');
$oIasmim->getTelefone()->setTipo(1);
$oIasmim->getTelefone()->setNome('Celular');
$oIasmim->getTelefone()->setValor('47999998888');
$oIasmim->getEndereco()->setLogradouro('Rua Tarcísio Juttel, 77');
$oIasmim->getEndereco()->setBairro('Centro');
$oIasmim->getEndereco()->setCidade('Vidal Ramos');
$oIasmim->getEndereco()->setEstado('SC');
$oIasmim->getEndereco()->setCep('88443-000');

$oKatia = new Pessoa();
$oKatia->setNome('Katia Cristina');
$oKatia->setSobrenome('Frutuoso Barni');
$oKatia->setDataNascimento('1980-09-20');
$oKatia->setCpfCnpj('98765432100');
$oKatia->getTelefone()->setTipo(1);
$oKatia->getTelefone()->setNome('Celular');
$oKatia->getTelefone()->setValor('47988887777');
$oKatia->getEndereco()->setLogradouro('Rua Tarcísio Juttel, 77');
$oKatia->getEndereco()->setBairro('Centro');
$oKatia->getEndereco()->setCidade('Vidal Ramos');
$oKatia->getEndereco()->setEstado('SC');
$oKatia->getEndereco()->setCep('88443-000');

$oMurilo = new Pessoa();
$oMurilo->setNome('Murilo');
$oMurilo->setSobrenome('Juttel Barni');
$oMurilo->setDataNascimento('2008-11-10');
$oMurilo->setCpfCnpj('19283746500');
$oMurilo->getTelefone()->setTipo(1);
$oMurilo->getTelefone()->setNome('Celular');
$oMurilo->getTelefone()->setValor('47997776666');
$oMurilo->getEndereco()->setLogradouro('Rua Tarcísio Juttel, 77');
$oMurilo->getEndereco()->setBairro('Centro');
$oMurilo->getEndereco()->setCidade('Vidal Ramos');
$oMurilo->getEndereco()->setEstado('SC');
$oMurilo->getEndereco()->setCep('88443-000');

$aPessoas = [$oLuis, $oKatia, $oMurilo, $oIasmim];

file_put_contents('pessoas.txt', json_encode($aPessoas));