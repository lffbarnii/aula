<?php

/**
 * @var array
 */
$materias = ['Inglês', 'Gerência de Projetos', 'Algoritimos', 'Redes', 'Programação Web'];

/**
 * @var array
 */
$professores = ['Jean', 'Sandro', 'Fernando', 'Fabiano', 'Cleber'];

for($i = 0; $i < 5; $i++){
    echo 'Matéria: ' . $materias[$i] . ', Professor: ' . $professores[$i] . '<br>';
}

