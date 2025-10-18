<?php

include_once '../funcoes_db.php';

try{
    $oSql = new SQL();

    $oConexao = $oSql->getConexao('local');

    $aDadosPessoa = [$_POST['nome'], $_POST['sobrenome'], $_POST['email'], $_POST['password'], $_POST['cidade'], $_POST['estado']];

    $aCampos = ['pesnome', 'pessobrenome', 'pesemail', 'pespassword', 'pescidade', 'pesestado'];

    $xResultado = $oSql->insert($oConexao, 'tbpessoa', $aCampos, [$aDadosPessoa]);

    if($xResultado){
        echo 'Deu bom!';
    }
}
catch(Exception $e){
    echo $e->getMessage();
}