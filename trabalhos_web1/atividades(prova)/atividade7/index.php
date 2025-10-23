<?php

$valorCarro = 22500;
$valorParcela = 489.65;
$quantidadeParcela = 60;

function calculaValorJuros($valorCarro, $valorParcela, $quantidadeParcela) {
    return ($valorParcela*$quantidadeParcela) - $valorCarro;
}

echo 'Valor Juros: '.calculaValorJuros($valorCarro, $valorParcela, $quantidadeParcela);