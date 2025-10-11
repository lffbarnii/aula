<?php
include_once('funcoes.php');

iniciaSessao();
setaDadoIfNaoExiste('usuario');
setaDadoIfNaoExiste('senha');
setaUltimaRequisicao();

if(count($_COOKIE['usuario']) < 0){
    setcookie('usuario', $_SESSION['usuario'], time() + 60*5, '/');
}

?>

<div style="border: 1px solid black; padding: 2px; width: 200px;">
    <p>Olá, <?=$_SESSION['usuario']?></p>
    <p>Início: <?=$_SESSION['dataInicio']?></p>
    <p>Ultima requisição <?=$_SESSION['ultimaRequisicao']?></p>
    <p>Tempo de sessão <?=strtotime($_SESSION['ultimaRequisicao']) - strtotime($_SESSION['dataInicio'])?></p>
    <a href="login.php">Recarregar</a>
</div>