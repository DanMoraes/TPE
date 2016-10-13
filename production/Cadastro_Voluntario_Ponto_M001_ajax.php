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
        $codigo_voluntario = $_POST['codigo_voluntario'];
        $periodo = $_POST['periodo'];
        
        $dia_semana_a = '';
        $dia_semana_b = '';
        $dia_semana_c = '';
        $dia_semana_d = '';
        $dia_semana_e = '';
        $dia_semana_f = '';
        $dia_semana_g = '';
        
        if (isset($_POST['dia_semana_a']))
            $dia_semana_a = $_POST['dia_semana_a'];
        if (isset($_POST['dia_semana_b']))
            $dia_semana_b = $_POST['dia_semana_b'];
        if (isset($_POST['dia_semana_c']))
            $dia_semana_c = $_POST['dia_semana_c'];
        if (isset($_POST['dia_semana_d']))
            $dia_semana_d = $_POST['dia_semana_d'];
        if (isset($_POST['dia_semana_e']))
            $dia_semana_e = $_POST['dia_semana_e'];
        if (isset($_POST['dia_semana_f']))
            $dia_semana_f = $_POST['dia_semana_f'];
        if (isset($_POST['dia_semana_g']))
            $dia_semana_g = $_POST['dia_semana_g'];

        $dia_semana = $dia_semana_a . $dia_semana_b . $dia_semana_c . $dia_semana_d . $dia_semana_e . $dia_semana_f . $dia_semana_g;
        
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

                                                $cod_pequisa=$codigo_voluntario;
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
                                                $voluntario = $jRow->nome;
                                                
        
        $sth = $db->prepare('INSERT INTO pontos_voluntarios
                                        (codigo_ponto
                                        ,ponto
                                        ,codigo_voluntario
                                        ,voluntario
                                        ,periodo
                                        ,dia_semana) 
                                        
                                VALUES
                                        (:codigo_ponto  
                                        ,:ponto
                                        ,:codigo_voluntario
                                        ,:voluntario
                                        ,:periodo
                                        ,:dia_semana)');


        $sth->bindParam(':codigo_ponto', $codigo_ponto, PDO::PARAM_INT);
        $sth->bindParam(':ponto', $ponto, PDO::PARAM_STR, 4);
        $sth->bindParam(':codigo_voluntario', $codigo_voluntario, PDO::PARAM_INT);
        $sth->bindParam(':voluntario', $voluntario, PDO::PARAM_STR, 70);
        $sth->bindParam(':periodo', $periodo, PDO::PARAM_STR, 1);
        $sth->bindParam(':dia_semana', $dia_semana, PDO::PARAM_STR, 7);


        try {
            $sth->execute();
        } catch (PDOException $e) {
            echo json_encode(array(
                "error" => "erro na execução do sql: " . $e->getMessage()
            ));
            exit(0);
        }
        
        echo '
        <form name="fr" action="Alterar_Excluir_Voluntario_Ponto_C001.php" method="POST">
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
        $codigo_voluntario = $_POST['codigo_voluntario'];
        $periodo = $_POST['periodo'];
        
        $dia_semana_a = '';
        $dia_semana_b = '';
        $dia_semana_c = '';
        $dia_semana_d = '';
        $dia_semana_e = '';
        $dia_semana_f = '';
        $dia_semana_g = '';
        
        if (isset($_POST['dia_semana_a']))
            $dia_semana_a = $_POST['dia_semana_a'];
        if (isset($_POST['dia_semana_b']))
            $dia_semana_b = $_POST['dia_semana_b'];
        if (isset($_POST['dia_semana_c']))
            $dia_semana_c = $_POST['dia_semana_c'];
        if (isset($_POST['dia_semana_d']))
            $dia_semana_d = $_POST['dia_semana_d'];
        if (isset($_POST['dia_semana_e']))
            $dia_semana_e = $_POST['dia_semana_e'];
        if (isset($_POST['dia_semana_f']))
            $dia_semana_f = $_POST['dia_semana_f'];
        if (isset($_POST['dia_semana_g']))
            $dia_semana_g = $_POST['dia_semana_g'];

        $dia_semana = $dia_semana_a . $dia_semana_b . $dia_semana_c . $dia_semana_d . $dia_semana_e . $dia_semana_f . $dia_semana_g;
        
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

                                                $cod_pequisa=$codigo_voluntario;
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
                                                $voluntario = $jRow->nome;
                                                
        
        $sth = $db->prepare('UPDATE pontos_voluntarios
                                SET      codigo_ponto              =:codigo_ponto
                                        ,ponto                     =:ponto
                                        ,codigo_voluntario         =:codigo_voluntario
                                        ,voluntario                =:voluntario
                                        ,periodo                   =:periodo
                                        ,dia_semana                =:dia_semana
                                        
                                WHERE (codigo=:codigo)');



        $sth->bindParam(':codigo', $codigo, PDO::PARAM_INT);
        $sth->bindParam(':codigo_ponto', $codigo_ponto, PDO::PARAM_INT);
        $sth->bindParam(':ponto', $ponto, PDO::PARAM_STR, 4);
        $sth->bindParam(':codigo_voluntario', $codigo_voluntario, PDO::PARAM_INT);
        $sth->bindParam(':voluntario', $voluntario, PDO::PARAM_STR, 70);
        $sth->bindParam(':periodo', $periodo, PDO::PARAM_STR, 1);
        $sth->bindParam(':dia_semana', $dia_semana, PDO::PARAM_STR, 7);


        try {
            $sth->execute();
        } catch (PDOException $e) {
            echo json_encode(array(
                "error" => "erro na execução do sql: " . $e->getMessage()
            ));
            exit(0);
        }
        

        echo '
        <form name="fr" action="Alterar_Excluir_Voluntario_Ponto_C001.php" method="POST">
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
        $sth = $db->prepare('SELECT  codigo
                                    ,codigo_ponto 
                                    ,ponto
                                    ,codigo_voluntario
                                    ,voluntario
                                    ,periodo
                                    ,dia_semana
                             FROM pontos_voluntarios
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
        $sth = $db->prepare('DELETE FROM pontos_voluntarios
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
        <form name="fr" action="Alterar_Excluir_Voluntario_Ponto_C001.php" method="POST">
        <input type="hidden" id="codigo_ponto" name="codigo_ponto" value="'.$codigo_ponto.'">
        </form>
        <script type="text/javascript">
        document.fr.submit();        
        </script>
        '; 
        break;
}
?>
