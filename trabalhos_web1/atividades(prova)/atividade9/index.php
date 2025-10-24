<?php

$valorMoto = 8654;

$valorParcela24 = ($valorMoto * pow(1.02, 24))/24;
$valorParcela36 = ($valorMoto * pow(1.023, 36))/36;
$valorParcela48 = ($valorMoto * pow(1.026, 48))/48;
$valorParcela60 = ($valorMoto * pow(1.029, 60))/60;

echo '<br>Valor a vista '.$valorMoto;
echo '<br>parcelado 24x de '.$valorParcela24;
echo '<br>parcelado 36x de '.$valorParcela36;
echo '<br>parcelado 48x de '.$valorParcela48;
echo '<br>parcelado 60x de '.$valorParcela60;