<?php

namespace aula14\atividade3;

require_once '../model/session.php';
require_once '../model/usuario.php';

use aula14\model\Session;
use aula14\model\Usuario;

$session = new Session();

if($session->iniciaSessao()){
    echo 'Sessão iniciada com sucesso!';

    if(!$session->getUsuarioSessao()){
        $usuario = new Usuario();
        $usuario->setUserLogin('luis1234');
        $usuario->setUserName('Luis');
        $usuario->setUserPass('senha');
        $session->setUsuarioSessao($usuario);
    }
    else{
        echo 'Sessão já iniciada com o usuario: ' . $session->getUsuarioSessao()->getUserName();
    }
}