<?php
function calculaValorFinal($valor, $desconto){
    echo $valor - $desconto;
}

calculaValorFinal($_REQUEST['valor'], $_REQUEST['desconto']);