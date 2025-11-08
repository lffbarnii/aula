<?php

namespace aula14\model;

class Computador{
    private $status;

    public function getStatus(){
        return $this->status;
    }

    public function ligar(){
        $this->status = 'Ligado';

        echo $this->getStatus();
    }

    public function desligar(){
        $this->status = 'Desligado';

        echo $this->getStatus();
    }
}