<?php
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

function formataData($data) {
    $i = explode('/', $data);
    $out = $i[2] . '/' . $i[1] . '/' . $i[0];
    return $out;
}

    
    $table=" pontos";
    $primaryKey = 'PONTO';
    $swhere ='';

            
    $columns = array(
        array( 
            'db' => 'ponto',  
            'dt' => 0,
            ),
        array( 
            'db' => 'nome_ponto',   
            'dt' => 1,
            ),
        array( 
            'db' => 'codigo',   
            'dt' => 2,
            )
        
        
    );

    $request['start'] = -1;
    $request['length']= -1;


    $request['columns']= array( 
                        array( 'data'=> 'ponto'      , 'searchable' => 'true','search'=>array( 'value' => '' )),
                        array( 'data'=> 'nome_ponto' , 'searchable' => 'true','search'=>array( 'value' => '' )),
                        array( 'data'=> 'codigo'     , 'searchable' => 'true','search'=>array( 'value' => '' ))
    );      
    $request['draw']='1';

    $whereAll="";
    $whereResult=NULL;

    include "conexao.php";

    require( 'ssp.class.php' );


    echo json_encode(        
            SSP::simple($request, $conn, $table, $primaryKey, $columns)
    );
  

    

?>