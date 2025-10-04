<?php
require_once('funcoes.php');

$notas = [1,2,3,4,5,6,7,8,9,10];
$faltas = [0,1,0,0,1,1,0,0,0,0,0,1];

echo 'Média: ' .                getMediaNotas($notas) .                                                      '<br>';
echo 'Aprovado Média: ' .      (isAprovado(getMediaNotas($notas)) ? 'sim' : 'não') .                  '<br>';
echo 'Frequência: ' .           getFrequencia($faltas) .                                                     '<br>';
echo 'Aprovado Frequência: ' . (isAprovadoFrequencia(getFrequencia($faltas)) ? 'sim' : 'não') .  '<br>';