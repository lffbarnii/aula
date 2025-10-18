<?php

if(file_exists('dados.txt')){
    $sConteudo = file_get_contents('dados.txt');

    echo nl2br($sConteudo);
}