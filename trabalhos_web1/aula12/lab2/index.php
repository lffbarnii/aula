<?php
namespace app;

use DateTime;
use app\model\Pessoa;


$oLuis = new Pessoa();

$oLuis->setNome('Luis Felipe');
$oLuis->setSobrenome('Frutuoso Barni');

$dataNascimento = new DateTime();
$dataNascimento->setDate(2005, 4, 20);

$oLuis->setDataNascimento($dataNascimento);
$oLuis->setCpfCnpj('071.854.829-92');
$oLuis->setEndereco('Rua tal');
// $oLuis->set