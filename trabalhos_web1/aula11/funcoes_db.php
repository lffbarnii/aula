<?php
class SQL {
    public const HOST = 'localhost',
                 PORT = '5432',
                 DBNAME = 'local',
                 USER = 'postgres',
                 PASSWORD = 'postgres';

    private $conexao;

    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }

    public function getConexao() {
        if (!isset($this->conexao)) {
            $this->conexao = $this->criaConexao();
        }
        return $this->conexao;
    }

    private function criaConexao() {
        return pg_connect(
            'host=' . self::HOST .
            ' port=' . self::PORT .
            ' dbname=' . self::DBNAME .
            ' user=' . self::USER .
            ' password=' . self::PASSWORD
        );
    }

    public function select($oConexao, $sSchema, $sTabela, $aColunas, $sCondicoes = '') {
        $aColunasEscapadas = array_map(function($coluna) {
            return ($coluna === '*') ? '*' : pg_escape_identifier($coluna);
        }, $aColunas);
    
        $query = 'SELECT ' . implode(',', $aColunasEscapadas) .
                 ' FROM ' . pg_escape_identifier($sTabela) . ' ' . $sCondicoes;
    
        $result = pg_query($oConexao, $query);
        if ($result === false) {
            throw new Exception('Erro ao executar consulta: ' . pg_last_error($oConexao));
        }
    
        $aResultado = [];
        while ($aLinha = pg_fetch_assoc($result)) {
            $aResultado[] = $aLinha;
        }
    
        return $aResultado;
    }

    public function insert($oConexao, $sTabela, $aCampos, $aInformacoes) {
        $sTabela = pg_escape_identifier($sTabela);
        $aCamposEscapados = array_map('pg_escape_identifier', $aCampos);
        $valores = array_map(function ($valor) {
            return array_map(fn($v) => trim(htmlspecialchars($v, ENT_QUOTES, 'UTF-8')), $valor);
        }, $aInformacoes);

        $placeholders = [];
        $params = [];
        $i = 1;
        foreach ($valores as $linha) {
            $linhaPlaceholders = [];
            foreach ($linha as $valor) {
                $linhaPlaceholders[] = '$' . $i++;
                $params[] = $valor;
            }
            $placeholders[] = '(' . implode(',', $linhaPlaceholders) . ')';
        }

        $query = "INSERT INTO $sTabela (" . implode(',', $aCamposEscapados) . ") VALUES " . implode(',', $placeholders);
        return pg_query_params($oConexao, $query, $params);
    }
}
