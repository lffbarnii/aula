<?php

$lado1 = $_POST['lado1'];
$lado2 = $_POST['lado2'];

$area = $lado1 * $lado2;

$mensagem = 'A area do retangulo de lados '.$lado1.' e '.$lado2. ' é de '.$area;

if($area > 10){
    echo '<h1>'.$mensagem.'</h1>';
}
else{
    echo '<h3>'.$mensagem.'</h3>';
}