<?php
session_start();

if(!isset($_SESSION['usuario'])){
    $_SESSION['usuario'] = 'Luis';

    echo 'Sessão iniciada e usuário registrado: Olá, '.$_SESSION['usuario']. '!<br>';
    echo '<a href="session_continua.php">Clique aqui para continuar!</a>';
}
else{
    echo 'ID da sessão: '.session_id();
    echo '<a href="session_continua">Clique aqui para continuar!</a>';
}