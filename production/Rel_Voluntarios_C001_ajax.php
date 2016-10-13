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


    $table="voluntarios";
    $primaryKey = 'CODIGO';
    $swhere ='';

    $columns = array(
        array( 
            'db' => 'nome',  
            'dt' => 0,
            ),
        array( 
            'db' => 'escalado',   
            'dt' => 1, 
        ),
        array( 
            'db' => 'email',   
            'dt' => 2,
            ),
        array( 
            'db' => 'telefone_1',  
            'dt' => 3, 
            ),
        array( 
            'db' => 'telefone_2',  
            'dt' => 4, 
            ),
        array( 
            'db' => 'congregacao',  
            'dt' => 5, 
            ),
        array( 
            'db' => 'circuito',  
            'dt' => 6, 
            ),
        array( 
            'db' => 'treinamento',  
            'dt' => 7, 
            ),
        array( 
            'db' => 'codigo', 
            'dt' => 8,
        )
        
    );

    $request['start'] = -1;
    $request['length']= -1;


    $request['columns']= array( 
                        array( 'data'=> 'codigo'     , 'searchable' => 'true','search'=>array( 'value' => '' )),
                        array( 'data'=> 'nome'       , 'searchable' => 'true','search'=>array( 'value' => '' )),
                        array( 'data'=> 'email'      , 'searchable' => 'true','search'=>array( 'value' => '' )),
                        array( 'data'=> 'telefone_1' , 'searchable' => 'true','search'=>array( 'value' => '' )),
                        array( 'data'=> 'telefone_2' , 'searchable' => 'true','search'=>array( 'value' => '' )),
                        array( 'data'=> 'congregacao', 'searchable' => 'true','search'=>array( 'value' => '' )),
                        array( 'data'=> 'circuito'   , 'searchable' => 'true','search'=>array( 'value' => '' )),
                        array( 'data'=> 'treinamento', 'searchable' => 'true','search'=>array( 'value' => '' )),
                        array( 'data'=> 'escalado'   , 'searchable' => 'true','search'=>array( 'value' => '' ))
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