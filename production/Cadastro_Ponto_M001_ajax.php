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


        $ponto = $_POST['ponto'];
        $nome_ponto = $_POST['nome_ponto'];
        $codigo_responsavel = $_POST['codigo_responsavel'];

        $sth = $db->prepare('INSERT INTO pontos
                                        (ponto           
                                        ,nome_ponto
                                        ,codigo_responsavel) 
                                        
                                VALUES
                                        (:ponto           
                                        ,:nome_ponto
                                        ,:codigo_responsavel)');


        $sth->bindParam(':ponto', $ponto, PDO::PARAM_STR, 04);
        $sth->bindParam(':nome_ponto', $nome_ponto, PDO::PARAM_STR, 40);
        $sth->bindParam(':codigo_responsavel', $codigo_responsavel, PDO::PARAM_INT);


        try {
            $sth->execute();
        } catch (PDOException $e) {
            echo json_encode(array(
                "error" => "erro na execução do sql: " . $e->getMessage()
            ));
            exit(0);
        }
        header("Location: Alterar_Excluir_Ponto_C001.php");
        //header("Location:../pages/gerencial_empresas_c001.php"); 
        //echo 'sucesso - novo';
        break;

    case 'salvarEditar':

        $ponto = $_POST['ponto'];
        $nome_ponto = $_POST['nome_ponto'];
        $codigo_responsavel = $_POST['codigo_responsavel'];

        $sth = $db->prepare('UPDATE pontos
                                SET      ponto              =:ponto
                                        ,nome_ponto         =:nome_ponto
                                        ,codigo_responsavel =:codigo_responsavel 
                                        
                                WHERE (codigo=:codigo)');



        $sth->bindParam(':codigo', $codigo, PDO::PARAM_INT);
        $sth->bindParam(':ponto', $ponto, PDO::PARAM_STR, 04);
        $sth->bindParam(':nome_ponto', $nome_ponto, PDO::PARAM_STR, 40);
        $sth->bindParam(':codigo_responsavel', $codigo_responsavel, PDO::PARAM_INT);


        try {
            $sth->execute();
        } catch (PDOException $e) {
            echo json_encode(array(
                "error" => "erro na execução do sql: " . $e->getMessage()
            ));
            exit(0);
        }
        header("Location: Alterar_Excluir_Ponto_C001.php");

        //header("Location:../pages/gerencial_empresas_c001.php"); 
        //echo 'sucesso - editar';
        break;

    case 'editar':
        //echo 'date_format(cadastro,'+" '%d/%m/%Y '"+')';
        $sth = $db->prepare('SELECT  codigo
                                        ,ponto           
                                        ,nome_ponto
                                        ,codigo_responsavel
                                FROM pontos
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

        $sth = $db->prepare('DELETE FROM pontos
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
        header("Location: Alterar_Excluir_Ponto_C001.php");
        break;
}
?>
