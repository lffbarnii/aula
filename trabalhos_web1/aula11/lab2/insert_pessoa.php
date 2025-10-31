<?php
include_once '../funcoes_db.php';

try {
    $oSql = new SQL();
    $oConexao = $oSql->getConexao();

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$nome || !$sobrenome || !$email || !$password || !$cidade || !$estado) {
        throw new Exception('Todos os campos são obrigatórios.');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('E-mail inválido.');
    }

    $aDadosPessoa = [$nome, $sobrenome, $email, password_hash($password, PASSWORD_DEFAULT), $cidade, $estado];
    $aCampos = ['pesnome', 'pessobrenome', 'pesemail', 'pespassword', 'pescidade', 'pesestado'];

    $xResultado = $oSql->insert($oConexao, 'tbpessoa', $aCampos, [$aDadosPessoa]);

    echo $xResultado ? 'Cadastro realizado com sucesso!' : 'Erro ao cadastrar.';
} catch (Exception $e) {
    echo htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
}
