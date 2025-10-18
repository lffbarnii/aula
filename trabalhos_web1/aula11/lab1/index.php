<?php
try{
    $oConexao = pg_connect('host=localhost port=5432 dbname=postgres user=postgres password=postgres');
    
    if($oConexao){
        $oResultado = pg_query('select * from public.tbteste');

        while($aLinha = pg_fetch_assoc($oResultado)){
            echo '<br>Resultado: '.$aLinha['tesnome'];
        }
    }
}
catch(Exception $e){
    echo $e->getMessage();
}