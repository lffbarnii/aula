<?php

namespace aula14\model;

use Exception;

class Calculadora{
    public static function adiciona($a, $b){
        return $a + $b;
    }

    public static function subtrai($a, $b){
        return $a - $b;
    }

    public static function multiplica($a, $b){
        return $a * $b;
    }

    public static function divide($a, $b){
        if($b == 0){
            throw new Exception('Não se pode fazer uma divisão por zero');
        }

        return $a / $b;
    }
}