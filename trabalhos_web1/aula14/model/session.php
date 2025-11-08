<?php

namespace aula14\model;

use aula14\model\Usuario;
use Exception;

class Session {
    private $sessionId;
    private $status;
    private $usuario;
    private $dataHoraInicio;
    private $dataHoraUltimoAcesso;

    public function iniciaSessao(){
        try{
            session_start();

            $this->sessionId = session_id();

            if($this->getDadoSessao('datahorainicio')){
                $this->dataHoraInicio = $this->getDadoSessao('datahorainicio');

                $this->dataHoraUltimoAcesso = date('Y-m-d H:i:s');
                $this->setDadoSessao('datahoraultimoacesso', $this->dataHoraUltimoAcesso);

                $this->usuario = $this->getDadoSessao('usuario');
            }
            else{
                $this->dataHoraInicio = date('Y-m-d H:i:s');
                $this->setDadoSessao('datahorainicio', $this->dataHoraInicio);
            }

            return true;
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        
    }

    public function finalizaSessao(){
        session_destroy();
    }
    
    public function getUsuarioSessao(){
        return $this->usuario;
    }

    public function setUsuarioSessao($usuario){
        $this->usuario = $usuario;
        $this->setDadoSessao('usuario', var_dump($usuario));
    }

    public function getDadoSessao($chave){
        if(isset($_SESSION[$chave])){
            return $_SESSION[$chave];
        }
        else{
            return null;
        }
    }

    public function setDadoSessao($chave, $valor){
        $_SESSION[$chave] = $valor;
    }
   
}
