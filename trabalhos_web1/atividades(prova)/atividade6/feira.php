<?php
$dinheiro = 50;

$maca     = $_POST['preco_maca'] * $_POST['qtd_maca'];
$melancia = $_POST['preco_melancia'] * $_POST['qtd_melancia'];
$laranja  = $_POST['preco_laranja'] * $_POST['qtd_laranja'];
$repolho  = $_POST['preco_repolho'] * $_POST['qtd_repolho'];
$cenoura  = $_POST['preco_cenoura'] * $_POST['qtd_cenoura'];
$batata   = $_POST['preco_batata'] * $_POST['qtd_batata'];

$total = $maca + $melancia + $laranja + $repolho + $cenoura + $batata;

echo '<h2>Resumo da compra:</h2>';
echo 'Maçã: R$ '.$maca.'<br>';
echo 'Melancia: R$ '.$melancia.'<br>';
echo 'Laranja: R$ '.$laranja.'<br>';
echo 'Repolho: R$ '.$repolho.'<br>';
echo 'Cenoura: R$ '.$cenoura.'<br>';
echo 'Batata: R$ '.$batata.'<br><br>';

echo 'Total da compra: R$ '.$total.'<br><br>';

if ($total > $dinheiro) {
    $dif = $total - $dinheiro;
    echo '<p style=\'color:red;\'>Faltaram R$ '.$dif.'.</p>';
} else if ($total < $dinheiro) {
    $dif = $dinheiro - $total;
    echo '<p style=\'color:blue;\'>'.$dif.' para gastar.</p>';
} else {
    echo '<p style=\'color:green;\'>Saldo exato</p>';
}
?>
