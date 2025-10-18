<?php

function criaTabela($aPessoas){
    echo '<table border="1">';

    echo '<tr>';
    echo '<td>Código</td>';
    echo '<td>Nome</td>';
    echo '<td>Sobrenome</td>';
    echo '<td>Email</td>';
    echo '<td>Senha</td>';
    echo '<td>Cidade</td>';
    echo '<td>Estado</td>';
    echo '<tr>';

    foreach($aPessoas as $aPessoa){
        echo '<tr>';
        foreach($aPessoa as $sInformacao){
            echo '<td>'.$sInformacao.'</td>';
        }
        echo '</tr>';
    }

    echo '</table>';
}

include_once '../funcoes_db.php';

try{
    $oSql = new SQL();

    $oConexao = $oSql->getConexao();

    $aPessoas = $oSql->select($oConexao, 'public', 'tbpessoa', ['*'], '');

    criaTabela($aPessoas);
}
catch(Exception $e){
    echo $e->getMessage();
}