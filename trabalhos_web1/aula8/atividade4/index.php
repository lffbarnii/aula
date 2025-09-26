<?php

$salario1;
$salario2;

$salario1 = 1000;
$salario2 = 2000;

$salario2 = $salario1;

$salario2 += 1;

$salario1 *= 1.1;

for ( $i = 0; $i < 100; $i++ ) {
    if($i == 49){
        break;
    }   
    $salario1 ++;
}

if( $salario1 < $salario2 ) {
    echo $salario1;
}