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




if (isset($_POST['codigo_ponto'])) {
    
    $codigo_ponto = $_POST['codigo_ponto'];

    //echo 'breno -'.$codigo_ponto;
} else
   exit;



    $table="pontos_voluntarios";
    $primaryKey = 'PONTO';
    $swhere ='';

            
    $columns = array(
        array( 
            'db' => 'ponto',  
            'dt' => 0,
            ),
        array( 
            'db' => 'voluntario',   
            'dt' => 1,
            ),
        array( 
            'db' => 'periodo',   
            'dt' => 2,
            ),
        array( 
            'db' => 'codigo',   
            'dt' => 3,
            )
        
        
    );

    $request['start'] = -1;
    $request['length']= -1;
    
    $request['columns']= array( 
                        array( 'data'=> 'ponto'      , 'searchable' => 'true','search'=>array( 'value' => '' )),
                        array( 'data'=> 'voluntario' , 'searchable' => 'true','search'=>array( 'value' => '' )),
                        array( 'data'=> 'periodo'    , 'searchable' => 'true','search'=>array( 'value' => '' )),
                        array( 'data'=> 'codigo'     , 'searchable' => 'true','search'=>array( 'value' => '' ))
    );      
    $request['draw']='1';

    $whereAll="(codigo_ponto=".$codigo_ponto.")";
    
    $whereResult='';

    include "conexao.php";

    require( 'ssp.class.php' );


    echo json_encode(        
            SSP::complex($request, $conn, $table, $primaryKey, $columns, $whereResult, $whereAll )
    );
  

    

?>