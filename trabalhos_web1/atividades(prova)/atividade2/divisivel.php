<?php

$iNumero = $_POST['numero'];

if($iNumero % 2 == 0){
    echo "<p>O número $iNumero é divisível por 2.</p>";
} else {
    echo "<p>O número $iNumero não é divisível por 2.</p>";
}