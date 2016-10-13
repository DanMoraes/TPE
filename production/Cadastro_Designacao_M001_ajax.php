<?php

//include '../inc/funcoes.php';


function formataData($data) {
    $i = explode('/', $data);
    $out = $i[2] . '/' . $i[1] . '/' . $i[0];
    return $out;
}

if (isset($_POST['acao'])) {
    $acao = $_POST['acao'];
    //echo $acao;
} else
    exit;

if (isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];
    //echo 'breno -'.$codigo;
} else
    exit;


if (isset($_POST['codigo_ponto'])) {
    $codigo_ponto = $_POST['codigo_ponto'];
    //echo 'breno -'.$codigo;
    
} else
    exit;


if (isset($_POST['periodo'])) {
    $periodo = $_POST['periodo'];
    //echo 'breno -'.$codigo;
    
} else
    exit;

if (isset($_POST['data_designacao'])) {
    $data_designacao = $_POST['data_designacao'];
    //echo 'breno -'.$codigo;
    
} else
    exit;


include 'conexao.php';


//$conn = array(
//    'user' => 'root',
//    'pass' => '',
//    'host' => 'localhost',
//    'db' => 'tpe'
//);
//if (is_array($conn)) {
//    try {
//        $db = @new PDO(
//                "mysql:host={$conn['host']};dbname={$conn['db']}", $conn['user'], $conn['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
//        );
//    } catch (PDOException $e) {
//        echo json_encode(array(
//            "error" => "An error occurred while connecting to the database. " .
//            "The error reported by the server was: " . $e->getMessage()
//        ));
//        exit(0);
//    }
//}


switch ($acao) {

    


    case 'salvarNovo':


        //$codigo_ponto = $_POST['codigo_ponto'];
        
        $codigo_voluntario_1 = $_POST['codigo_voluntario_1'];
        $codigo_voluntario_2 = $_POST['codigo_voluntario_2'];
        $codigo_voluntario_3 = $_POST['codigo_voluntario_3'];

        $codigo_substituto_1 = $_POST['codigo_substituto_1'];
        $codigo_substituto_2 = $_POST['codigo_substituto_2'];
        $codigo_substituto_3 = $_POST['codigo_substituto_3'];
        
        $data_designacao = formataData($data_designacao);

        
                                                $cod_pequisa=$codigo_ponto;
                                                $sth2 = $db->prepare('SELECT ponto,nome_ponto           
                                                                     FROM pontos 
                                                                     WHERE (codigo=:codigo)');
                                                       $sth2->bindParam(':codigo', $cod_pequisa , PDO::PARAM_INT);
                                                        try {
                                                            $sth2->execute();
                                                        } catch (PDOException $e) {
                                                            echo json_encode(array(
                                                                "error" => "erro na execução do sql: " . $e->getMessage()
                                                            ));
                                                            exit(0);
                                                        }

                                                $jRow = $sth2->fetch(PDO::FETCH_OBJ);
                                                $ponto = $jRow->ponto;

                                                $voluntario_1 = '';
                                                if ($codigo_voluntario_1 > 0) {                                                
                                                
                                                $cod_pequisa=$codigo_voluntario_1;
                                                $sth2 = $db->prepare('SELECT codigo,nome           
                                                                     FROM voluntarios 
                                                                     WHERE (codigo=:codigo)');
                                                       $sth2->bindParam(':codigo', $cod_pequisa , PDO::PARAM_INT);
                                                        try {
                                                            $sth2->execute();
                                                        } catch (PDOException $e) {
                                                            echo json_encode(array(
                                                                "error" => "erro na execução do sql: " . $e->getMessage()
                                                            ));
                                                            exit(0);
                                                        }

                                                $jRow = $sth2->fetch(PDO::FETCH_OBJ);
                                                $voluntario_1 = $jRow->nome;
                                                };

                                                $voluntario_2 = '';
                                                if ($codigo_voluntario_2 > 0) {                                                
                                                
                                                $cod_pequisa=$codigo_voluntario_2;
                                                $sth2 = $db->prepare('SELECT codigo,nome           
                                                                     FROM voluntarios 
                                                                     WHERE (codigo=:codigo)');
                                                       $sth2->bindParam(':codigo', $cod_pequisa , PDO::PARAM_INT);
                                                        try {
                                                            $sth2->execute();
                                                        } catch (PDOException $e) {
                                                            echo json_encode(array(
                                                                "error" => "erro na execução do sql: " . $e->getMessage()
                                                            ));
                                                            exit(0);
                                                        }

                                                $jRow = $sth2->fetch(PDO::FETCH_OBJ);
                                                $voluntario_2 = $jRow->nome;
                                                };
                                                
                                                
                                                $voluntario_3 = '';
                                                if ($codigo_voluntario_3 > 0) {
                                                $cod_pequisa=$codigo_voluntario_3;
                                                $sth2 = $db->prepare('SELECT codigo,nome           
                                                                     FROM voluntarios 
                                                                     WHERE (codigo=:codigo)');
                                                       $sth2->bindParam(':codigo', $cod_pequisa , PDO::PARAM_INT);
                                                        try {
                                                            $sth2->execute();
                                                        } catch (PDOException $e) {
                                                            echo json_encode(array(
                                                                "error" => "erro na execução do sql: " . $e->getMessage()
                                                            ));
                                                            exit(0);
                                                        }

                                                $jRow = $sth2->fetch(PDO::FETCH_OBJ);
                                                $voluntario_3 = $jRow->nome;
                                                };
                                                
                                                $substituto_1 = '';
                                                if ($codigo_substituto_1 > 0) {
                                                $cod_pequisa=$codigo_substituto_1;
                                                $sth2 = $db->prepare('SELECT codigo,nome           
                                                                     FROM voluntarios 
                                                                     WHERE (codigo=:codigo)');
                                                       $sth2->bindParam(':codigo', $cod_pequisa , PDO::PARAM_INT);
                                                        try {
                                                            $sth2->execute();
                                                        } catch (PDOException $e) {
                                                            echo json_encode(array(
                                                                "error" => "erro na execução do sql: " . $e->getMessage()
                                                            ));
                                                            exit(0);
                                                        }

                                                $jRow = $sth2->fetch(PDO::FETCH_OBJ);
                                                $substituto_1 = $jRow->nome;
                                                };
                                                
                                                $substituto_2 = '';
                                                if ($codigo_substituto_2 > 0) {                                                
                                                $cod_pequisa=$codigo_substituto_2;
                                                $sth2 = $db->prepare('SELECT codigo,nome           
                                                                     FROM voluntarios 
                                                                     WHERE (codigo=:codigo)');
                                                       $sth2->bindParam(':codigo', $cod_pequisa , PDO::PARAM_INT);
                                                        try {
                                                            $sth2->execute();
                                                        } catch (PDOException $e) {
                                                            echo json_encode(array(
                                                                "error" => "erro na execução do sql: " . $e->getMessage()
                                                            ));
                                                            exit(0);
                                                        }

                                                $jRow = $sth2->fetch(PDO::FETCH_OBJ);
                                                $substituto_2 = $jRow->nome;
                                                };
                                                
                                                $substituto_3 = '';
                                                if ($codigo_substituto_3 > 0) {                                                
                                                
                                                $cod_pequisa=$codigo_substituto_3;
                                                $sth2 = $db->prepare('SELECT codigo,nome           
                                                                     FROM voluntarios 
                                                                     WHERE (codigo=:codigo)');
                                                       $sth2->bindParam(':codigo', $cod_pequisa , PDO::PARAM_INT);
                                                        try {
                                                            $sth2->execute();
                                                        } catch (PDOException $e) {
                                                            echo json_encode(array(
                                                                "error" => "erro na execução do sql: " . $e->getMessage()
                                                            ));
                                                            exit(0);
                                                        }

                                                $jRow = $sth2->fetch(PDO::FETCH_OBJ);
                                                $substituto_3 = $jRow->nome;
                                                };


                                                
        
        $sth = $db->prepare('INSERT INTO pontos_voluntarios_designacao
                                        (codigo_ponto
                                        ,ponto
                                        ,periodo
                                        ,data
                                        ,codigo_voluntario_1
                                        ,voluntario_1 
                                        ,codigo_voluntario_2
                                        ,voluntario_2 
                                        ,codigo_voluntario_3
                                        ,voluntario_3 
                                        ,codigo_substituto_1
                                        ,substituto_1 
                                        ,codigo_substituto_2
                                        ,substituto_2 
                                        ,codigo_substituto_3
                                        ,substituto_3) 
                                        
                                        

                                VALUES
                                        (:codigo_ponto  
                                        ,:ponto
                                        ,:periodo
                                        ,:data
                                        ,:codigo_voluntario_1
                                        ,:voluntario_1
                                        ,:codigo_voluntario_2
                                        ,:voluntario_2
                                        ,:codigo_voluntario_3
                                        ,:voluntario_3
                                        ,:codigo_substituto_1
                                        ,:substituto_1
                                        ,:codigo_substituto_2
                                        ,:substituto_2
                                        ,:codigo_substituto_3
                                        ,:substituto_3)');
        
        

        $sth->bindParam(':codigo_ponto', $codigo_ponto, PDO::PARAM_INT);
        $sth->bindParam(':ponto', $ponto, PDO::PARAM_STR, 4);
        $sth->bindParam(':periodo', $periodo, PDO::PARAM_STR, 1);
        $sth->bindParam(':data', $data_designacao, PDO::PARAM_STR);
        
        $sth->bindParam(':codigo_voluntario_1', $codigo_voluntario_1, PDO::PARAM_INT);
        $sth->bindParam(':voluntario_1', $voluntario_1, PDO::PARAM_STR, 70);
        $sth->bindParam(':codigo_voluntario_2', $codigo_voluntario_2, PDO::PARAM_INT);
        $sth->bindParam(':voluntario_2', $voluntario_2, PDO::PARAM_STR, 70);
        $sth->bindParam(':codigo_voluntario_3', $codigo_voluntario_3, PDO::PARAM_INT);
        $sth->bindParam(':voluntario_3', $voluntario_3, PDO::PARAM_STR, 70);

        $sth->bindParam(':codigo_substituto_1', $codigo_substituto_1, PDO::PARAM_INT);
        $sth->bindParam(':substituto_1', $substituto_1, PDO::PARAM_STR, 70);
        $sth->bindParam(':codigo_substituto_2', $codigo_substituto_2, PDO::PARAM_INT);
        $sth->bindParam(':substituto_2', $substituto_2, PDO::PARAM_STR, 70);
        $sth->bindParam(':codigo_substituto_3', $codigo_substituto_3, PDO::PARAM_INT);
        $sth->bindParam(':substituto_3', $substituto_3, PDO::PARAM_STR, 70);
        

        try {
            $sth->execute();
        } catch (PDOException $e) {
            echo json_encode(array(
                "error" => "erro na execução do sql: " . $e->getMessage()
            ));
            exit(0);
        }
        
        echo '
        <form name="fr" action="Selecionar_Ponto_Designacao_C002.php" method="POST">
        <input type="hidden" id="codigo_ponto" name="codigo_ponto" value="'.$codigo_ponto.'">        
        </form>
        <script type="text/javascript">
        document.fr.submit();        
        </script>
        '; 
        //header("Location: Alterar_Excluir_Voluntario_Ponto_C001.php");
        //header("Location:../pages/gerencial_empresas_c001.php"); 
        //echo 'sucesso - novo';
        break;

    case 'salvarEditar':

        //$codigo_ponto = $_POST['codigo_ponto'];
        
        $codigo_voluntario_1 = $_POST['codigo_voluntario_1'];
        $codigo_voluntario_2 = $_POST['codigo_voluntario_2'];
        $codigo_voluntario_3 = $_POST['codigo_voluntario_3'];
        
        $codigo_substituto_1 = $_POST['codigo_substituto_1'];
        $codigo_substituto_2 = $_POST['codigo_substituto_2'];
        $codigo_substituto_3 = $_POST['codigo_substituto_3'];
        
        $data_designacao = formataData($data_designacao);
        
                                                $cod_pequisa=$codigo_ponto;
                                                $sth2 = $db->prepare('SELECT ponto,nome_ponto           
                                                                     FROM pontos 
                                                                     WHERE (codigo=:codigo)');
                                                       $sth2->bindParam(':codigo', $cod_pequisa , PDO::PARAM_INT);
                                                        try {
                                                            $sth2->execute();
                                                        } catch (PDOException $e) {
                                                            echo json_encode(array(
                                                                "error" => "erro na execução do sql: " . $e->getMessage()
                                                            ));
                                                            exit(0);
                                                        }

                                                $jRow = $sth2->fetch(PDO::FETCH_OBJ);
                                                $ponto = $jRow->ponto;

                                                $voluntario_1 = '';
                                                if ($codigo_voluntario_1 > 0) {                                                
                                                
                                                $cod_pequisa=$codigo_voluntario_1;
                                                $sth2 = $db->prepare('SELECT codigo,nome           
                                                                     FROM voluntarios 
                                                                     WHERE (codigo=:codigo)');
                                                       $sth2->bindParam(':codigo', $cod_pequisa , PDO::PARAM_INT);
                                                        try {
                                                            $sth2->execute();
                                                        } catch (PDOException $e) {
                                                            echo json_encode(array(
                                                                "error" => "erro na execução do sql: " . $e->getMessage()
                                                            ));
                                                            exit(0);
                                                        }

                                                $jRow = $sth2->fetch(PDO::FETCH_OBJ);
                                                $voluntario_1 = $jRow->nome;
                                                }

                                                $voluntario_2 = '';
                                                if ($codigo_voluntario_2 > 0) {                                                
                                                
                                                $cod_pequisa=$codigo_voluntario_2;
                                                $sth2 = $db->prepare('SELECT codigo,nome           
                                                                     FROM voluntarios 
                                                                     WHERE (codigo=:codigo)');
                                                       $sth2->bindParam(':codigo', $cod_pequisa , PDO::PARAM_INT);
                                                        try {
                                                            $sth2->execute();
                                                        } catch (PDOException $e) {
                                                            echo json_encode(array(
                                                                "error" => "erro na execução do sql: " . $e->getMessage()
                                                            ));
                                                            exit(0);
                                                        }

                                                $jRow = $sth2->fetch(PDO::FETCH_OBJ);
                                                $voluntario_2 = $jRow->nome;
                                                }
                                                
                                                $voluntario_3 = '';
                                                if ($codigo_voluntario_3 > 0) {                                                
                                                
                                                $cod_pequisa=$codigo_voluntario_3;
                                                $sth2 = $db->prepare('SELECT codigo,nome           
                                                                     FROM voluntarios 
                                                                     WHERE (codigo=:codigo)');
                                                       $sth2->bindParam(':codigo', $cod_pequisa , PDO::PARAM_INT);
                                                        try {
                                                            $sth2->execute();
                                                        } catch (PDOException $e) {
                                                            echo json_encode(array(
                                                                "error" => "erro na execução do sql: " . $e->getMessage()
                                                            ));
                                                            exit(0);
                                                        }

                                                $jRow = $sth2->fetch(PDO::FETCH_OBJ);
                                                $voluntario_3 = $jRow->nome;
                                                }

                                                $substituto_1 = '';
                                                if ($codigo_substituto_1 > 0) {

                                                $cod_pequisa=$codigo_substituto_1;
                                                $sth2 = $db->prepare('SELECT codigo,nome           
                                                                     FROM voluntarios 
                                                                     WHERE (codigo=:codigo)');
                                                       $sth2->bindParam(':codigo', $cod_pequisa , PDO::PARAM_INT);
                                                        try {
                                                            $sth2->execute();
                                                        } catch (PDOException $e) {
                                                            echo json_encode(array(
                                                                "error" => "erro na execução do sql: " . $e->getMessage()
                                                            ));
                                                            exit(0);
                                                        }

                                                $jRow = $sth2->fetch(PDO::FETCH_OBJ);
                                                $substituto_1 = $jRow->nome;
                                                }

                                                $substituto_2 = '';
                                                if ($codigo_substituto_2 > 0) {
                                                
                                                $cod_pequisa=$codigo_substituto_2;
                                                $sth2 = $db->prepare('SELECT codigo,nome           
                                                                     FROM voluntarios 
                                                                     WHERE (codigo=:codigo)');
                                                       $sth2->bindParam(':codigo', $cod_pequisa , PDO::PARAM_INT);
                                                        try {
                                                            $sth2->execute();
                                                        } catch (PDOException $e) {
                                                            echo json_encode(array(
                                                                "error" => "erro na execução do sql: " . $e->getMessage()
                                                            ));
                                                            exit(0);
                                                        }

                                                $jRow = $sth2->fetch(PDO::FETCH_OBJ);
                                                $substituto_2 = $jRow->nome;
                                                }
                                                
                                                $substituto_3 = '';
                                                if ($codigo_substituto_3 > 0) {
                                                
                                                $cod_pequisa=$codigo_substituto_3;
                                                $sth2 = $db->prepare('SELECT codigo,nome           
                                                                     FROM voluntarios 
                                                                     WHERE (codigo=:codigo)');
                                                       $sth2->bindParam(':codigo', $cod_pequisa , PDO::PARAM_INT);
                                                        try {
                                                            $sth2->execute();
                                                        } catch (PDOException $e) {
                                                            echo json_encode(array(
                                                                "error" => "erro na execução do sql: " . $e->getMessage()
                                                            ));
                                                            exit(0);
                                                        }

                                                $jRow = $sth2->fetch(PDO::FETCH_OBJ);
                                                $substituto_3 = $jRow->nome;
                                                }
                                                
                                                
        
        $sth = $db->prepare('UPDATE pontos_voluntarios_designacao
                                SET      codigo_ponto              =: codigo_ponto       
                                        ,ponto                     =: ponto              
                                        ,periodo                   =: periodo            
                                        ,data                      =: data               
                                        ,codigo_voluntario_1       =: codigo_voluntario_1
                                        ,voluntario_1              =: voluntario_1       
                                        ,codigo_voluntario_2       =: codigo_voluntario_2
                                        ,voluntario_2              =: voluntario_2       
                                        ,codigo_voluntario_3       =: codigo_voluntario_3
                                        ,voluntario_3              =: voluntario_3       
                                        ,codigo_substituto_1       =: codigo_substituto_1
                                        ,substituto_1              =: substituto_1       
                                        ,codigo_substituto_2       =: codigo_substituto_2
                                        ,substituto_2              =: substituto_2       
                                        ,codigo_substituto_3       =: codigo_substituto_3
                                        ,substituto_3              =: substituto_3
                                        
                                WHERE (codigo=:codigo)');


        $sth->bindParam(':codigo', $codigo, PDO::PARAM_INT);
        $sth->bindParam(':codigo_ponto', $codigo_ponto, PDO::PARAM_INT);
        $sth->bindParam(':ponto', $ponto, PDO::PARAM_STR, 4);
        $sth->bindParam(':periodo', $periodo, PDO::PARAM_STR, 1);
        $sth->bindParam(':data', $data_designacao, PDO::PARAM_STR);
        
        $sth->bindParam(':codigo_voluntario_1', $codigo_voluntario_1, PDO::PARAM_INT);
        $sth->bindParam(':voluntario_1', $voluntario_1, PDO::PARAM_STR, 70);
        $sth->bindParam(':codigo_voluntario_2', $codigo_voluntario_2, PDO::PARAM_INT);
        $sth->bindParam(':voluntario_2', $voluntario_2, PDO::PARAM_STR, 70);
        $sth->bindParam(':codigo_voluntario_3', $codigo_voluntario_3, PDO::PARAM_INT);
        $sth->bindParam(':voluntario_3', $voluntario_3, PDO::PARAM_STR, 70);

        $sth->bindParam(':codigo_substituto_1', $codigo_substituto_1, PDO::PARAM_INT);
        $sth->bindParam(':substituto_1', $substituto_1, PDO::PARAM_STR, 70);
        $sth->bindParam(':codigo_substituto_2', $codigo_substituto_2, PDO::PARAM_INT);
        $sth->bindParam(':substituto_2', $substituto_2, PDO::PARAM_STR, 70);
        $sth->bindParam(':codigo_substituto_3', $codigo_substituto_3, PDO::PARAM_INT);
        $sth->bindParam(':substituto_3', $substituto_3, PDO::PARAM_STR, 70);


        try {
            $sth->execute();
        } catch (PDOException $e) {
            echo json_encode(array(
                "error" => "erro na execução do sql: " . $e->getMessage()
            ));
            exit(0);
        }
        

        echo '
        <form name="fr" action="Selecionar_Ponto_Designacao_C002.php" method="POST">
        <input type="hidden" id="codigo_ponto" name="codigo_ponto" value="'.$codigo_ponto.'">
        </form>
        <script type="text/javascript">
        document.fr.submit();        
        </script>
        ';        
        
        
        
        //header("Location: Alterar_Excluir_Voluntario_Ponto_C001.php");

        //header("Location:../pages/gerencial_empresas_c001.php"); 
        //echo 'sucesso - editar';
        break;

    case 'editar':
        //echo 'date_format(cadastro,'+" '%d/%m/%Y '"+')';
        
        
        $sth = $db->prepare('SELECT      codigo
                                        ,codigo_ponto
                                        ,ponto
                                        ,periodo
                                        ,data
                                        ,codigo_voluntario_1
                                        ,voluntario_1 
                                        ,codigo_voluntario_2
                                        ,voluntario_2 
                                        ,codigo_voluntario_3
                                        ,voluntario_3 
                                        ,codigo_substituto_1
                                        ,substituto_1 
                                        ,codigo_substituto_2
                                        ,substituto_2 
                                        ,codigo_substituto_3
                                        ,substituto_3
                             FROM pontos_voluntarios_designacao
                             where (codigo=:codigo)');
        $sth->bindParam(':codigo', $codigo, PDO::PARAM_INT);
        try {
            $sth->execute();
        } catch (PDOException $e) {
            echo json_encode(array(
                "error" => "erro na execução do sql: " . $e->getMessage()
            ));
            exit(0);
        }

        $jRow = $sth->fetch(PDO::FETCH_OBJ);
        //$jRow->DATABASE_FILE = decrypt($jRow->DATABASE_FILE);
        //$jsonGerencialEmpresa = json_encode($jRow);
        //echo ( $jsonGerencialEmpresa);
        $jsonGerencialVoluntario = json_encode($jRow);
        echo ( $jsonGerencialVoluntario);
        break;

    case 'excluir':       
        $sth = $db->prepare('DELETE FROM pontos_voluntarios_designacao
                                WHERE (codigo=:codigo)');

        $sth->bindParam(':codigo', $codigo, PDO::PARAM_INT);

        try {
            $sth->execute();
        } catch (PDOException $e) {
            echo json_encode(array(
                "error" => "erro na execução do sql: " . $e->getMessage()
            ));
            exit(0);
        }
        //echo 'EXCLUIR - SUCESSO';
        echo '
        <form name="fr" action="Selecionar_Ponto_Designacao_C002.php" method="POST">
        <input type="hidden" id="codigo_ponto" name="codigo_ponto" value="'.$codigo_ponto.'">
        </form>
        <script type="text/javascript">
        document.fr.submit();        
        </script>
        '; 
        break;
}
?>
