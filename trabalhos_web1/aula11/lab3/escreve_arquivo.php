<?php

if(file_exists('dados.txt')){
    $sConteudo = file_get_contents('dados.txt');

    file_put_contents('dados2.txt', serialize($sConteudo));
}