<?php

function getMediaNotas($notas){
    $quantidadeNotas = 0;
    $totalNotas = 0;

    foreach($notas as $nota){
        $quantidadeNotas++;
        $totalNotas += $nota;
    }

    return $totalNotas / $quantidadeNotas;
}

function isAprovado($media){
    return $media >= 7 ? true : false;
}

function getFrequencia($aulas){
    $quantidadeTotalAulas = 0;
    $quantidadePresencas = 0;

    foreach($aulas as $presenca){
        $quantidadeTotalAulas++;
        if($presenca){
            $quantidadePresencas++;
        }
    }

    return $quantidadePresencas / $quantidadeTotalAulas;
}

function isAprovadoFrequencia($frequencia){
    return $frequencia >= 0.7 ? true : false;
}
