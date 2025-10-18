<?php

/**
 * Classe bem bacana
 */
class SQL{
    public const HOST     = 'localhost',
                 PORT     = '5432',
                 DBNAME   = 'local',
                 USER     = 'postgres',
                 PASSWORD = 'postgres';

    private $conexao;

    public function setConexao($conexao){
        $this->conexao = $conexao;
    }

    public function getConexao(){
        if(!isset($this->conexao)){
            $this->conexao = $this->criaConexao();
        }

        return $this->conexao;
    }

    private function criaConexao(){
        $oConexao = pg_connect('host='.$this::HOST.' port='.$this::PORT.' dbname='.$this::DBNAME.' user='.$this::USER.' password='.$this::PASSWORD);
    
        return $oConexao;
    }
    
    public function select($oConexao, $sSchema, $sTabela, $aColunas, $sCondicoes){
        $oQuery = pg_query($oConexao, 'select '.implode(',', $aColunas).' from '. $sSchema.'.'.$sTabela);
    
        $aResultado = [];
    
        while($aLinha = pg_fetch_assoc($oQuery)){
            $aResultado[] = $aLinha;
        }
    
        return $aResultado;
    }
    
    public function getStringValoresInsert($aInformacoes){
        $aInserts = [];
    
        foreach($aInformacoes as $aInformacao){
            $aArrayTratado = array_map(function($item) {
                return '\'' . $item . '\'';
            }, $aInformacao);

            $aInserts[] = '('.implode(',', $aArrayTratado).')';
        }
    
        return implode(',', $aInserts);
    }
    
    public function insert($oConexao, $sTabela, $aCampos, $aInformacoes){
        $sStringInsert = $this->getStringValoresInsert($aInformacoes);
    
        return pg_query_params($oConexao, "insert into $sTabela (".implode(',', $aCampos).")
                                    values $sStringInsert");
    }
}