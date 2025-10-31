<?php

const CAMINHO = '../db/pessoas.json';

function getDado($nome){
    if(isset($_POST[$nome])){
        return $_POST[$nome];
    } else {
        throw new Exception('O parâmetro '.$nome.' não foi informado!');
    }
}

function getDadosPessoa(){
    $aPessoa = [];

    $aPessoa['nome'] = getDado('nome');
    $aPessoa['sobrenome'] = getDado('sobrenome');
    $aPessoa['email'] = getDado('email');
    $aPessoa['password'] = getDado('password');
    $aPessoa['cidade'] = getDado('cidade');
    $aPessoa['estado'] = getDado('estado');

    return $aPessoa;
}

function getPessoasCadastradas($sCaminhoArquivo){
    if (!file_exists($sCaminhoArquivo)) {
        return [];
    }

    $conteudo = file_get_contents($sCaminhoArquivo);

    if (empty($conteudo)) {
        return [];
    }

    $dados = json_decode($conteudo, true);
    if (!is_array($dados)) {
        $dados = [];
    }

    return $dados;
}

function gravaDadosPessoa($aPessoa, $sCaminhoArquivo){
    $aPessoasCadastradas = getPessoasCadastradas($sCaminhoArquivo);

    $aPessoasCadastradas[] = $aPessoa;

    $oArquivo = fopen($sCaminhoArquivo, 'w');

    fwrite($oArquivo, json_encode($aPessoasCadastradas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    fclose($oArquivo);
}

gravaDadosPessoa(getDadosPessoa(), CAMINHO);
