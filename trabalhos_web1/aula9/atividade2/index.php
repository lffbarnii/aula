<?php

$pastas = ['bsn' => ['3a fase' => ['desenvWeb', 'bancoDados 1', 'engSoft'],
                     '4a fase' => ['Intro web', 'bancoDados 2', 'engSoft 2']]];

function echoNomePasta($nome, $nivel){
    echo str_repeat('-', $nivel) . $nome . '<br>';
}
function listaPastas($pasta, $nivel = 1){
    if(is_array($pasta)){
        foreach($pasta as $nomePasta => $novaPasta){
            if(is_array($novaPasta)){
                echoNomePasta($nomePasta, $nivel);
                listaPastas($novaPasta, $nivel+1);
            }
            else {
                echoNomePasta($novaPasta, $nivel);
            }
        }
    }
    else{
        echoNomePasta($pasta, $nivel);
    }
}

listaPastas($pastas);