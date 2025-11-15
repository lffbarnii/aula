<?php

namespace aula15\model;

use Exception;

class ConexaoBd{
    private $ip;
    private $porta;
    private $usuario;
    private $senha;
    private $database;
    private $conexao;

    public function __construct($ip, $porta, $usuario, $senha, $database){
        $this->ip = $ip;
        $this->porta = $porta;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->database = $database;
    }

    private function getConectionString(){
        return 'host='. $this->ip.
               ' port='. $this->porta.
               ' dbname='. $this->database.
               ' user='. $this->usuario.
               ' password='. $this->senha;
    }

    public function conecta(){
        if(!isset($this->conexao)){
            try{
                $this->conexao = pg_connect($this->getConectionString());
            }
            catch(Exception $e){
                throw new Exception('Ocorreu um erro ao tentar conectar-se com o banco de dados: '.$e->getMessage());
            }
        }
        
        return $this->conexao;
    }
}