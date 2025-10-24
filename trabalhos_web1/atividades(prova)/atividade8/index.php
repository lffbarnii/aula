<?php

$valorMoto = 8654;

$valorParcela24 = ($valorMoto * 1.015)/24;
$valorParcela36 = ($valorMoto * 1.020)/36;
$valorParcela48 = ($valorMoto * 1.025)/48;
$valorParcela60 = ($valorMoto * 1.030)/60;

echo '<br>Valor a vista '.$valorMoto;
echo '<br>parcelado 24x de '.$valorParcela24;
echo '<br>parcelado 36x de '.$valorParcela36;
echo '<br>parcelado 48x de '.$valorParcela48;
echo '<br>parcelado 60x de '.$valorParcela60;