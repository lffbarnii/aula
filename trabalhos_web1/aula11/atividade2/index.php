<?php
include_once '../funcoes_db.php';

function criaTabela($aPessoas) {
    echo '<table border="1">';
    echo '<tr><td>Código</td><td>Nome</td><td>Sobrenome</td><td>Email</td><td>Senha</td><td>Cidade</td><td>Estado</td></tr>';
    foreach ($aPessoas as $aPessoa) {
        echo '<tr>';
        foreach ($aPessoa as $sInformacao) {
            echo '<td>' . htmlspecialchars($sInformacao, ENT_QUOTES, 'UTF-8') . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

function criaCampoPesquisa() {
    echo '<form method="post" action="index.php">';
    echo '<label for="nome">Nome:</label>';
    echo '<input type="text" name="nome" id="nome">';
    echo '<input type="submit" value="Pesquisar">';
    echo '</form>';
}

try {
    $oSql = new SQL();
    $oConexao = $oSql->getConexao();

    $sCondicao = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($nome) {
            $nomeEscapado = pg_escape_string($oConexao, $nome);
            $sCondicao = "WHERE pesnome ILIKE '%$nomeEscapado%'";
        }
    }

    $aPessoas = $oSql->select($oConexao, 'public', 'tbpessoa', ['*'], $sCondicao);
    criaTabela($aPessoas);
    criaCampoPesquisa();
} catch (Exception $e) {
    echo htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
}
