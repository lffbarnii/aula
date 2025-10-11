<?php
function escreveResultado($resultado, $cor){
    echo '<p style="color:'. $cor . '">' . $resultado . '</p>';
}

function decideCor($variavel1, $variavel2, $variavel3){
    $cor = 'black';

    if($variavel1 > 10){
        $cor = 'blue';
    }
    else if($variavel2 < $variavel3){
        $cor = 'green';
    }
    else if($variavel3 < $variavel1 && $variavel3 < $variavel2){
        $cor = 'red';
    }

    return $cor;
}

$variavel1 = $_GET['variavel1'];
$variavel2 = $_GET['variavel2'];
$variavel3 = $_GET['variavel3'];

$resultado = $variavel1 + $variavel2 + $variavel3;

$cor = decideCor($variavel1, $variavel2, $variavel3);

escreveResultado($resultado, $cor);

