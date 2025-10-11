<?php

function iniciaSessao(){
    date_default_timezone_set('America/Sao_Paulo'); 

    session_start();
    if(!isset($_SESSION['dataInicio'])){
        $_SESSION['dataInicio'] = date('d-m-Y H:i:s');
    }
}

function setaDadoIfNaoExiste($dado){
    if(!isset($_SESSION[$dado])){
        $_SESSION[$dado] = $_POST[$dado];
    }
}

function setaUltimaRequisicao(){
    $_SESSION['ultimaRequisicao'] = date('d-m-Y H:i:s');
}