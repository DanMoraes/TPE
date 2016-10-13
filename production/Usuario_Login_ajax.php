<?php

session_start();
//include '../inc/funcoes.php';


function formataData($data) {
    $i = explode('/', $data);
    $out = $i[2] . '/' . $i[1] . '/' . $i[0];
    return $out;
}

$email = $_POST['email'];
$senha = $_POST['senha'];

include 'conexao.php';

        $sth = $db->prepare('SELECT  email
                                    ,senha
                                    ,nome
                                    ,usuario
                                FROM voluntarios
                                where (email=:email)');
        $sth->bindParam(':email', $email, PDO::PARAM_STR);
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
        

$nome_usuario = $jRow->nome;
$tipo_acesso = $jRow->usuario;
$encontrar   = ' ';
$pos = strpos($nome_usuario, $encontrar);
$usuario = '';

// Note o uso de ===.  Simples == não funcionaria como esperado
// por causa da posição de 'a' é 0 (primeiro) caractere.
if ($pos >0) {
    $usuario = substr($nome_usuario, 0, $pos);
    echo $usuario;
}

        
        
if ($jRow->senha == $senha) {
    $_SESSION['logado'] = true;
    $_SESSION['usuario'] = $usuario;
    
    $_SESSION['tipo_acesso'] = 'disabled';
    $_SESSION['tipo_acesso_button'] = 'disabled="disabled"';
    $_SESSION['tipo_usuario'] = 'Usuário';
    if ($tipo_acesso == 'A') {
        $_SESSION['tipo_acesso'] = '';
        $_SESSION['tipo_acesso_button'] ='';
        $_SESSION['tipo_usuario'] = 'Administrador';
    }
    
 header("Location: index.php");   
} else
    header("Location: Erro_Email.php");   
    
 

    

//echo $senha;
//        
//if (isset($_POST['acao'])) {
//    $acao = $_POST['acao'];
//    //echo $acao;
//} else
//    exit;
//
//if (isset($_POST['senha'])) {
//    $senha = $_POST['senha'];
//    //echo 'breno -'.$codigo;
//} else
//    exit;






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


//
//switch ($acao) {
//
//
//
//    case 'salvarNovo':
//
//
//        $nome = $_POST['nome'];
//        $email = $_POST['email'];
//        $telefone_1 = $_POST['telefone_1'];
//        $telefone_2 = $_POST['telefone_2'];
//        $cadastro = $_POST['cadastro'];
//        $congregacao = $_POST['congregacao'];
//        $circuito = $_POST['circuito'];
//        $treinamento = $_POST['treinamento'];
//        $escalado = $_POST['escalado'];
//
//        $privilegio_1 = '';
//        $privilegio_2 = '';
//        $privilegio_3 = '';
//
//        if (isset($_POST['privilegio_1']))
//            $privilegio_1 = $_POST['privilegio_1'];
//        if (isset($_POST['privilegio_2']))
//            $privilegio_2 = $_POST['privilegio_2'];
//        if (isset($_POST['privilegio_3']))
//            $privilegio_3 = $_POST['privilegio_3'];
//
//
//
//        $sc_avaliacao_1 = $_POST['sc_avaliacao_1'];
//        $sc_avaliacao_2 = $_POST['sc_avaliacao_2'];
//        $sc_avaliacao_3 = $_POST['sc_avaliacao_3'];
//        $sc_avaliacao_4 = $_POST['sc_avaliacao_4'];
//        $cca_avaliacao_1 = $_POST['cca_avaliacao_1'];
//        $cca_avaliacao_2 = $_POST['cca_avaliacao_2'];
//        $cca_avaliacao_3 = $_POST['cca_avaliacao_3'];
//        $cca_avaliacao_4 = $_POST['cca_avaliacao_4'];
//        $sec_avaliacao_1 = $_POST['sec_avaliacao_1'];
//        $sec_avaliacao_2 = $_POST['sec_avaliacao_2'];
//        $sec_avaliacao_3 = $_POST['sec_avaliacao_3'];
//        $sec_avaliacao_4 = $_POST['sec_avaliacao_4'];
//        $ss_avaliacao_1 = $_POST['ss_avaliacao_1'];
//        $ss_avaliacao_2 = $_POST['ss_avaliacao_2'];
//        $ss_avaliacao_3 = $_POST['ss_avaliacao_3'];
//        $ss_avaliacao_4 = $_POST['ss_avaliacao_4'];
//
//        $sabado_qtd  = $_POST['sabado_qtd'];
//        $domingo_qtd = $_POST['domingo_qtd'];
//        
//        $segunda_a = '';
//        $segunda_b = '';
//        $segunda_c = '';
//        $segunda_d = '';
//        $segunda_e = '';
//        $segunda_f = '';
//
//        $terca_a = '';
//        $terca_b = '';
//        $terca_c = '';
//        $terca_d = '';
//        $terca_e = '';
//        $terca_f = '';
//
//        $quarta_a = '';
//        $quarta_b = '';
//        $quarta_c = '';
//        $quarta_d = '';
//        $quarta_e = '';
//        $quarta_f = '';
//
//        $quinta_a = '';
//        $quinta_b = '';
//        $quinta_c = '';
//        $quinta_d = '';
//        $quinta_e = '';
//        $quinta_f = '';
//
//        $sexta_a = '';
//        $sexta_b = '';
//        $sexta_c = '';
//        $sexta_d = '';
//        $sexta_e = '';
//        $sexta_f = '';
//
//        $sabado_a = '';
//        $sabado_b = '';
//        $sabado_c = '';
//        $sabado_d = '';
//        $sabado_e = '';
//        $sabado_f = '';
//
//        $domingo_a = '';
//        $domingo_b = '';
//        $domingo_c = '';
//        $domingo_d = '';
//        $domingo_e = '';
//        $domingo_f = '';
//
//        if (isset($_POST['segunda_a']))
//            $segunda_a = $_POST['segunda_a'];
//        if (isset($_POST['segunda_b']))
//            $segunda_b = $_POST['segunda_b'];
//        if (isset($_POST['segunda_c']))
//            $segunda_c = $_POST['segunda_c'];
//        if (isset($_POST['segunda_d']))
//            $segunda_d = $_POST['segunda_d'];
//        if (isset($_POST['segunda_e']))
//            $segunda_e = $_POST['segunda_e'];
//        if (isset($_POST['segunda_f']))
//            $segunda_f = $_POST['segunda_f'];
//
//        if (isset($_POST['terca_a']))
//            $terca_a = $_POST['terca_a'];
//        if (isset($_POST['terca_b']))
//            $terca_b = $_POST['terca_b'];
//        if (isset($_POST['terca_c']))
//            $terca_c = $_POST['terca_c'];
//        if (isset($_POST['terca_d']))
//            $terca_d = $_POST['terca_d'];
//        if (isset($_POST['terca_e']))
//            $terca_e = $_POST['terca_e'];
//        if (isset($_POST['terca_f']))
//            $terca_f = $_POST['terca_f'];
//
//        if (isset($_POST['quarta_a']))
//            $quarta_a = $_POST['quarta_a'];
//        if (isset($_POST['quarta_b']))
//            $quarta_b = $_POST['quarta_b'];
//        if (isset($_POST['quarta_c']))
//            $quarta_c = $_POST['quarta_c'];
//        if (isset($_POST['quarta_d']))
//            $quarta_d = $_POST['quarta_d'];
//        if (isset($_POST['quarta_e']))
//            $quarta_e = $_POST['quarta_e'];
//        if (isset($_POST['quarta_f']))
//            $quarta_f = $_POST['quarta_f'];
//
//        if (isset($_POST['quinta_a']))
//            $quinta_a = $_POST['quinta_a'];
//        if (isset($_POST['quinta_b']))
//            $quinta_b = $_POST['quinta_b'];
//        if (isset($_POST['quinta_c']))
//            $quinta_c = $_POST['quinta_c'];
//        if (isset($_POST['quinta_d']))
//            $quinta_d = $_POST['quinta_d'];
//        if (isset($_POST['quinta_e']))
//            $quinta_e = $_POST['quinta_e'];
//        if (isset($_POST['quinta_f']))
//            $quinta_f = $_POST['quinta_f'];
//
//        if (isset($_POST['sexta_a']))
//            $sexta_a = $_POST['sexta_a'];
//        if (isset($_POST['sexta_b']))
//            $sexta_b = $_POST['sexta_b'];
//        if (isset($_POST['sexta_c']))
//            $sexta_c = $_POST['sexta_c'];
//        if (isset($_POST['sexta_d']))
//            $sexta_d = $_POST['sexta_d'];
//        if (isset($_POST['sexta_e']))
//            $sexta_e = $_POST['sexta_e'];
//        if (isset($_POST['sexta_f']))
//            $sexta_f = $_POST['sexta_f'];
//
//        if (isset($_POST['sabado_a']))
//            $sabado_a = $_POST['sabado_a'];
//        if (isset($_POST['sabado_b']))
//            $sabado_b = $_POST['sabado_b'];
//        if (isset($_POST['sabado_c']))
//            $sabado_c = $_POST['sabado_c'];
//        if (isset($_POST['sabado_d']))
//            $sabado_d = $_POST['sabado_d'];
//        if (isset($_POST['sabado_e']))
//            $sabado_e = $_POST['sabado_e'];
//        if (isset($_POST['sabado_f']))
//            $sabado_f = $_POST['sabado_f'];
//
//        if (isset($_POST['domingo_a']))
//            $domingo_a = $_POST['domingo_a'];
//        if (isset($_POST['domingo_b']))
//            $domingo_b = $_POST['domingo_b'];
//        if (isset($_POST['domingo_c']))
//            $domingo_c = $_POST['domingo_c'];
//        if (isset($_POST['domingo_d']))
//            $domingo_d = $_POST['domingo_d'];
//        if (isset($_POST['domingo_e']))
//            $domingo_e = $_POST['domingo_e'];
//        if (isset($_POST['domingo_f']))
//            $domingo_f = $_POST['domingo_f'];
//
//        $data_cadastro = formataData($cadastro);
//        $privilegio = $privilegio_1 . $privilegio_2 . $privilegio_3;
//
//        $segunda = $segunda_a . $segunda_b . $segunda_c . $segunda_d . $segunda_e . $segunda_f;
//        $terca = $terca_a . $terca_b . $terca_c . $terca_d . $terca_e . $terca_f;
//        $quarta = $quarta_a . $quarta_b . $quarta_c . $quarta_d . $quarta_e . $quarta_f;
//        $quinta = $quinta_a . $quinta_b . $quinta_c . $quinta_d . $quinta_e . $quinta_f;
//        $sexta = $sexta_a . $sexta_b . $sexta_c . $sexta_d . $sexta_e . $sexta_f;
//        $sabado = $sabado_a . $sabado_b . $sabado_c . $sabado_d . $sabado_e . $sabado_f;
//        $domingo = $domingo_a . $domingo_b . $domingo_c . $domingo_d . $domingo_e . $domingo_f;
//
//        $sth = $db->prepare('INSERT INTO voluntarios
//                                        (nome           
//                                        ,email          
//                                        ,telefone_1     
//                                        ,telefone_2     
//                                        ,cadastro       
//                                        ,congregacao    
//                                        ,circuito       
//                                        ,treinamento
//                                        ,escalado
//                                        ,privilegio
//                                        ,sc_avaliacao_1 
//                                        ,sc_avaliacao_2 
//                                        ,sc_avaliacao_3 
//                                        ,sc_avaliacao_4
//                                        ,cca_avaliacao_1
//                                        ,cca_avaliacao_2
//                                        ,cca_avaliacao_3
//                                        ,cca_avaliacao_4
//                                        ,sec_avaliacao_1
//                                        ,sec_avaliacao_2
//                                        ,sec_avaliacao_3
//                                        ,sec_avaliacao_4
//                                        ,ss_avaliacao_1 
//                                        ,ss_avaliacao_2 
//                                        ,ss_avaliacao_3 
//                                        ,ss_avaliacao_4
//                                        ,segunda
//                                        ,terca
//                                        ,quarta
//                                        ,quinta
//                                        ,sexta
//                                        ,sabado
//                                        ,sabado_qtd
//                                        ,domingo
//                                        ,domingo_qtd) 
//                                        
//                                VALUES
//                                        (:nome           
//                                        ,:email          
//                                        ,:telefone_1     
//                                        ,:telefone_2     
//                                        ,:cadastro       
//                                        ,:congregacao    
//                                        ,:circuito       
//                                        ,:treinamento
//                                        ,:escalado
//                                        ,:privilegio
//                                        ,:sc_avaliacao_1 
//                                        ,:sc_avaliacao_2 
//                                        ,:sc_avaliacao_3 
//                                        ,:sc_avaliacao_4
//                                        ,:cca_avaliacao_1
//                                        ,:cca_avaliacao_2
//                                        ,:cca_avaliacao_3
//                                        ,:cca_avaliacao_4
//                                        ,:sec_avaliacao_1
//                                        ,:sec_avaliacao_2
//                                        ,:sec_avaliacao_3
//                                        ,:sec_avaliacao_4
//                                        ,:ss_avaliacao_1 
//                                        ,:ss_avaliacao_2 
//                                        ,:ss_avaliacao_3 
//                                        ,:ss_avaliacao_4
//                                        ,:segunda
//                                        ,:terca
//                                        ,:quarta
//                                        ,:quinta
//                                        ,:sexta
//                                        ,:sabado
//                                        ,:sabado_qtd
//                                        ,:domingo
//                                        ,:domingo_qtd)');
//
//
//        $sth->bindParam(':nome', $nome, PDO::PARAM_STR, 70);
//        $sth->bindParam(':email', $email, PDO::PARAM_STR, 70);
//        $sth->bindParam(':telefone_1', $telefone_1, PDO::PARAM_STR, 15);
//        $sth->bindParam(':telefone_2', $telefone_2, PDO::PARAM_STR, 15);
//        $sth->bindParam(':cadastro', $data_cadastro, PDO::PARAM_STR);
//        $sth->bindParam(':congregacao', $congregacao, PDO::PARAM_STR, 50);
//        $sth->bindParam(':circuito', $circuito, PDO::PARAM_STR, 15);
//        $sth->bindParam(':treinamento', $treinamento, PDO::PARAM_STR, 01);
//        $sth->bindParam(':escalado', $escalado, PDO::PARAM_STR, 01);
//        $sth->bindParam(':privilegio', $privilegio, PDO::PARAM_STR, 05);
//        $sth->bindParam(':sc_avaliacao_1', $sc_avaliacao_1, PDO::PARAM_STR, 1);
//        $sth->bindParam(':sc_avaliacao_2', $sc_avaliacao_2, PDO::PARAM_STR, 1);
//        $sth->bindParam(':sc_avaliacao_3', $sc_avaliacao_3, PDO::PARAM_STR, 1);
//        $sth->bindParam(':sc_avaliacao_4', $sc_avaliacao_4, PDO::PARAM_STR, 1);
//        $sth->bindParam(':cca_avaliacao_1', $cca_avaliacao_1, PDO::PARAM_STR, 1);
//        $sth->bindParam(':cca_avaliacao_2', $cca_avaliacao_2, PDO::PARAM_STR, 1);
//        $sth->bindParam(':cca_avaliacao_3', $cca_avaliacao_3, PDO::PARAM_STR, 1);
//        $sth->bindParam(':cca_avaliacao_4', $cca_avaliacao_4, PDO::PARAM_STR, 1);
//        $sth->bindParam(':sec_avaliacao_1', $sec_avaliacao_1, PDO::PARAM_STR, 1);
//        $sth->bindParam(':sec_avaliacao_2', $sec_avaliacao_2, PDO::PARAM_STR, 1);
//        $sth->bindParam(':sec_avaliacao_3', $sec_avaliacao_3, PDO::PARAM_STR, 1);
//        $sth->bindParam(':sec_avaliacao_4', $sec_avaliacao_4, PDO::PARAM_STR, 1);
//        $sth->bindParam(':ss_avaliacao_1', $ss_avaliacao_1, PDO::PARAM_STR, 1);
//        $sth->bindParam(':ss_avaliacao_2', $ss_avaliacao_2, PDO::PARAM_STR, 1);
//        $sth->bindParam(':ss_avaliacao_3', $ss_avaliacao_3, PDO::PARAM_STR, 1);
//        $sth->bindParam(':ss_avaliacao_4', $ss_avaliacao_4, PDO::PARAM_STR, 1);
//
//        $sth->bindParam(':segunda', $segunda, PDO::PARAM_STR, 6);
//        $sth->bindParam(':terca', $terca, PDO::PARAM_STR, 6);
//        $sth->bindParam(':quarta', $quarta, PDO::PARAM_STR, 6);
//        $sth->bindParam(':quinta', $quinta, PDO::PARAM_STR, 6);
//        $sth->bindParam(':sexta', $sexta, PDO::PARAM_STR, 6);
//        $sth->bindParam(':sabado', $sabado, PDO::PARAM_STR, 6);
//        $sth->bindParam(':sabado_qtd', $sabado_qtd, PDO::PARAM_STR, 30);        
//        $sth->bindParam(':domingo', $domingo, PDO::PARAM_STR, 6);
//        $sth->bindParam(':domingo_qtd', $domingo_qtd, PDO::PARAM_STR, 30);        
//
//
//        try {
//            $sth->execute();
//        } catch (PDOException $e) {
//            echo json_encode(array(
//                "error" => "erro na execução do sql: " . $e->getMessage()
//            ));
//            exit(0);
//        }
//        header("Location: Alterar_Excluir_Voluntario_C001.php");
//        //header("Location:../pages/gerencial_empresas_c001.php"); 
//        //echo 'sucesso - novo';
//        break;
//
//    case 'salvarEditar':
//
//
//        $nome = $_POST['nome'];
//        $email = $_POST['email'];
//        $telefone_1 = $_POST['telefone_1'];
//        $telefone_2 = $_POST['telefone_2'];
//        $cadastro = $_POST['cadastro'];
//        $congregacao = $_POST['congregacao'];
//        $circuito = $_POST['circuito'];
//        $treinamento = $_POST['treinamento'];
//        $escalado = $_POST['escalado'];
//
//        $privilegio_1 = '';
//        $privilegio_2 = '';
//        $privilegio_3 = '';
//
//        if (isset($_POST['privilegio_1']))
//            $privilegio_1 = $_POST['privilegio_1'];
//        if (isset($_POST['privilegio_2']))
//            $privilegio_2 = $_POST['privilegio_2'];
//        if (isset($_POST['privilegio_3']))
//            $privilegio_3 = $_POST['privilegio_3'];
//
//        $sc_avaliacao_1 = $_POST['sc_avaliacao_1'];
//        $sc_avaliacao_2 = $_POST['sc_avaliacao_2'];
//        $sc_avaliacao_3 = $_POST['sc_avaliacao_3'];
//        $sc_avaliacao_4 = $_POST['sc_avaliacao_4'];
//        $cca_avaliacao_1 = $_POST['cca_avaliacao_1'];
//        $cca_avaliacao_2 = $_POST['cca_avaliacao_2'];
//        $cca_avaliacao_3 = $_POST['cca_avaliacao_3'];
//        $cca_avaliacao_4 = $_POST['cca_avaliacao_4'];
//        $sec_avaliacao_1 = $_POST['sec_avaliacao_1'];
//        $sec_avaliacao_2 = $_POST['sec_avaliacao_2'];
//        $sec_avaliacao_3 = $_POST['sec_avaliacao_3'];
//        $sec_avaliacao_4 = $_POST['sec_avaliacao_4'];
//        $ss_avaliacao_1 = $_POST['ss_avaliacao_1'];
//        $ss_avaliacao_2 = $_POST['ss_avaliacao_2'];
//        $ss_avaliacao_3 = $_POST['ss_avaliacao_3'];
//        $ss_avaliacao_4 = $_POST['ss_avaliacao_4'];
//
//        $sabado_qtd  = $_POST['sabado_qtd'];
//        $domingo_qtd = $_POST['domingo_qtd'];
//        
//
//        $segunda_a = '';
//        $segunda_b = '';
//        $segunda_c = '';
//        $segunda_d = '';
//        $segunda_e = '';
//        $segunda_f = '';
//
//        $terca_a = '';
//        $terca_b = '';
//        $terca_c = '';
//        $terca_d = '';
//        $terca_e = '';
//        $terca_f = '';
//
//        $quarta_a = '';
//        $quarta_b = '';
//        $quarta_c = '';
//        $quarta_d = '';
//        $quarta_e = '';
//        $quarta_f = '';
//
//        $quinta_a = '';
//        $quinta_b = '';
//        $quinta_c = '';
//        $quinta_d = '';
//        $quinta_e = '';
//        $quinta_f = '';
//
//        $sexta_a = '';
//        $sexta_b = '';
//        $sexta_c = '';
//        $sexta_d = '';
//        $sexta_e = '';
//        $sexta_f = '';
//
//        $sabado_a = '';
//        $sabado_b = '';
//        $sabado_c = '';
//        $sabado_d = '';
//        $sabado_e = '';
//        $sabado_f = '';
//
//        $domingo_a = '';
//        $domingo_b = '';
//        $domingo_c = '';
//        $domingo_d = '';
//        $domingo_e = '';
//        $domingo_f = '';
//
//        if (isset($_POST['segunda_a']))
//            $segunda_a = $_POST['segunda_a'];
//        if (isset($_POST['segunda_b']))
//            $segunda_b = $_POST['segunda_b'];
//        if (isset($_POST['segunda_c']))
//            $segunda_c = $_POST['segunda_c'];
//        if (isset($_POST['segunda_d']))
//            $segunda_d = $_POST['segunda_d'];
//        if (isset($_POST['segunda_e']))
//            $segunda_e = $_POST['segunda_e'];
//        if (isset($_POST['segunda_f']))
//            $segunda_f = $_POST['segunda_f'];
//
//        if (isset($_POST['terca_a']))
//            $terca_a = $_POST['terca_a'];
//        if (isset($_POST['terca_b']))
//            $terca_b = $_POST['terca_b'];
//        if (isset($_POST['terca_c']))
//            $terca_c = $_POST['terca_c'];
//        if (isset($_POST['terca_d']))
//            $terca_d = $_POST['terca_d'];
//        if (isset($_POST['terca_e']))
//            $terca_e = $_POST['terca_e'];
//        if (isset($_POST['terca_f']))
//            $terca_f = $_POST['terca_f'];
//
//        if (isset($_POST['quarta_a']))
//            $quarta_a = $_POST['quarta_a'];
//        if (isset($_POST['quarta_b']))
//            $quarta_b = $_POST['quarta_b'];
//        if (isset($_POST['quarta_c']))
//            $quarta_c = $_POST['quarta_c'];
//        if (isset($_POST['quarta_d']))
//            $quarta_d = $_POST['quarta_d'];
//        if (isset($_POST['quarta_e']))
//            $quarta_e = $_POST['quarta_e'];
//        if (isset($_POST['quarta_f']))
//            $quarta_f = $_POST['quarta_f'];
//
//        if (isset($_POST['quinta_a']))
//            $quinta_a = $_POST['quinta_a'];
//        if (isset($_POST['quinta_b']))
//            $quinta_b = $_POST['quinta_b'];
//        if (isset($_POST['quinta_c']))
//            $quinta_c = $_POST['quinta_c'];
//        if (isset($_POST['quinta_d']))
//            $quinta_d = $_POST['quinta_d'];
//        if (isset($_POST['quinta_e']))
//            $quinta_e = $_POST['quinta_e'];
//        if (isset($_POST['quinta_f']))
//            $quinta_f = $_POST['quinta_f'];
//
//        if (isset($_POST['sexta_a']))
//            $sexta_a = $_POST['sexta_a'];
//        if (isset($_POST['sexta_b']))
//            $sexta_b = $_POST['sexta_b'];
//        if (isset($_POST['sexta_c']))
//            $sexta_c = $_POST['sexta_c'];
//        if (isset($_POST['sexta_d']))
//            $sexta_d = $_POST['sexta_d'];
//        if (isset($_POST['sexta_e']))
//            $sexta_e = $_POST['sexta_e'];
//        if (isset($_POST['sexta_f']))
//            $sexta_f = $_POST['sexta_f'];
//
//        if (isset($_POST['sabado_a']))
//            $sabado_a = $_POST['sabado_a'];
//        if (isset($_POST['sabado_b']))
//            $sabado_b = $_POST['sabado_b'];
//        if (isset($_POST['sabado_c']))
//            $sabado_c = $_POST['sabado_c'];
//        if (isset($_POST['sabado_d']))
//            $sabado_d = $_POST['sabado_d'];
//        if (isset($_POST['sabado_e']))
//            $sabado_e = $_POST['sabado_e'];
//        if (isset($_POST['sabado_f']))
//            $sabado_f = $_POST['sabado_f'];
//
//        if (isset($_POST['domingo_a']))
//            $domingo_a = $_POST['domingo_a'];
//        if (isset($_POST['domingo_b']))
//            $domingo_b = $_POST['domingo_b'];
//        if (isset($_POST['domingo_c']))
//            $domingo_c = $_POST['domingo_c'];
//        if (isset($_POST['domingo_d']))
//            $domingo_d = $_POST['domingo_d'];
//        if (isset($_POST['domingo_e']))
//            $domingo_e = $_POST['domingo_e'];
//        if (isset($_POST['domingo_f']))
//            $domingo_f = $_POST['domingo_f'];
//
//
//        $data_cadastro = formataData($cadastro);
//        $privilegio = $privilegio_1 . $privilegio_2 . $privilegio_3;
//
//        $segunda = $segunda_a . $segunda_b . $segunda_c . $segunda_d . $segunda_e . $segunda_f;
//        $terca = $terca_a . $terca_b . $terca_c . $terca_d . $terca_e . $terca_f;
//        $quarta = $quarta_a . $quarta_b . $quarta_c . $quarta_d . $quarta_e . $quarta_f;
//        $quinta = $quinta_a . $quinta_b . $quinta_c . $quinta_d . $quinta_e . $quinta_f;
//        $sexta = $sexta_a . $sexta_b . $sexta_c . $sexta_d . $sexta_e . $sexta_f;
//        $sabado = $sabado_a . $sabado_b . $sabado_c . $sabado_d . $sabado_e . $sabado_f;
//        $domingo = $domingo_a . $domingo_b . $domingo_c . $domingo_d . $domingo_e . $domingo_f;
//
//
//        $sth = $db->prepare('UPDATE voluntarios
//                                SET      nome           =:nome
//                                        ,email          =:email          
//                                        ,telefone_1     =:telefone_1     
//                                        ,telefone_2     =:telefone_2     
//                                        ,cadastro       =:cadastro       
//                                        ,congregacao    =:congregacao    
//                                        ,circuito       =:circuito       
//                                        ,treinamento    =:treinamento 
//                                        ,escalado       =:escalado
//                                        ,privilegio     =:privilegio
//                                        ,sc_avaliacao_1 =:sc_avaliacao_1 
//                                        ,sc_avaliacao_2 =:sc_avaliacao_2 
//                                        ,sc_avaliacao_3 =:sc_avaliacao_3 
//                                        ,sc_avaliacao_4 =:sc_avaliacao_4 
//                                        ,cca_avaliacao_1=:cca_avaliacao_1
//                                        ,cca_avaliacao_2=:cca_avaliacao_2
//                                        ,cca_avaliacao_3=:cca_avaliacao_3
//                                        ,cca_avaliacao_4=:cca_avaliacao_4
//                                        ,sec_avaliacao_1=:sec_avaliacao_1
//                                        ,sec_avaliacao_2=:sec_avaliacao_2
//                                        ,sec_avaliacao_3=:sec_avaliacao_3
//                                        ,sec_avaliacao_4=:sec_avaliacao_4
//                                        ,ss_avaliacao_1 =:ss_avaliacao_1 
//                                        ,ss_avaliacao_2 =:ss_avaliacao_2 
//                                        ,ss_avaliacao_3 =:ss_avaliacao_3 
//                                        ,ss_avaliacao_4 =:ss_avaliacao_4
//                                        ,segunda        =:segunda 
//                                        ,terca          =:terca 
//                                        ,quarta         =:quarta 
//                                        ,quinta         =:quinta 
//                                        ,sexta          =:sexta 
//                                        ,sabado         =:sabado 
//                                        ,sabado_qtd     =:sabado_qtd
//                                        ,domingo        =:domingo 
//                                        ,domingo_qtd    =:domingo_qtd
//                                        
//                                WHERE (codigo=:codigo)');
//
//
//
//        $sth->bindParam(':codigo', $codigo, PDO::PARAM_INT);
//        $sth->bindParam(':nome', $nome, PDO::PARAM_STR, 70);
//        $sth->bindParam(':email', $email, PDO::PARAM_STR, 70);
//        $sth->bindParam(':telefone_1', $telefone_1, PDO::PARAM_STR, 15);
//        $sth->bindParam(':telefone_2', $telefone_2, PDO::PARAM_STR, 15);
//        $sth->bindParam(':cadastro', $data_cadastro, PDO::PARAM_STR);
//        $sth->bindParam(':congregacao', $congregacao, PDO::PARAM_STR, 50);
//        $sth->bindParam(':circuito', $circuito, PDO::PARAM_STR, 15);
//        $sth->bindParam(':treinamento', $treinamento, PDO::PARAM_STR, 01);
//        $sth->bindParam(':escalado', $escalado, PDO::PARAM_STR, 01);
//        $sth->bindParam(':privilegio', $privilegio, PDO::PARAM_STR, 05);
//        $sth->bindParam(':sc_avaliacao_1', $sc_avaliacao_1, PDO::PARAM_STR, 1);
//        $sth->bindParam(':sc_avaliacao_2', $sc_avaliacao_2, PDO::PARAM_STR, 1);
//        $sth->bindParam(':sc_avaliacao_3', $sc_avaliacao_3, PDO::PARAM_STR, 1);
//        $sth->bindParam(':sc_avaliacao_4', $sc_avaliacao_4, PDO::PARAM_STR, 1);
//        $sth->bindParam(':cca_avaliacao_1', $cca_avaliacao_1, PDO::PARAM_STR, 1);
//        $sth->bindParam(':cca_avaliacao_2', $cca_avaliacao_2, PDO::PARAM_STR, 1);
//        $sth->bindParam(':cca_avaliacao_3', $cca_avaliacao_3, PDO::PARAM_STR, 1);
//        $sth->bindParam(':cca_avaliacao_4', $cca_avaliacao_4, PDO::PARAM_STR, 1);
//        $sth->bindParam(':sec_avaliacao_1', $sec_avaliacao_1, PDO::PARAM_STR, 1);
//        $sth->bindParam(':sec_avaliacao_2', $sec_avaliacao_2, PDO::PARAM_STR, 1);
//        $sth->bindParam(':sec_avaliacao_3', $sec_avaliacao_3, PDO::PARAM_STR, 1);
//        $sth->bindParam(':sec_avaliacao_4', $sec_avaliacao_4, PDO::PARAM_STR, 1);
//        $sth->bindParam(':ss_avaliacao_1', $ss_avaliacao_1, PDO::PARAM_STR, 1);
//        $sth->bindParam(':ss_avaliacao_2', $ss_avaliacao_2, PDO::PARAM_STR, 1);
//        $sth->bindParam(':ss_avaliacao_3', $ss_avaliacao_3, PDO::PARAM_STR, 1);
//        $sth->bindParam(':ss_avaliacao_4', $ss_avaliacao_4, PDO::PARAM_STR, 1);
//
//        $sth->bindParam(':segunda', $segunda, PDO::PARAM_STR, 6);
//        $sth->bindParam(':terca', $terca, PDO::PARAM_STR, 6);
//        $sth->bindParam(':quarta', $quarta, PDO::PARAM_STR, 6);
//        $sth->bindParam(':quinta', $quinta, PDO::PARAM_STR, 6);
//        $sth->bindParam(':sexta', $sexta, PDO::PARAM_STR, 6);
//        $sth->bindParam(':sabado', $sabado, PDO::PARAM_STR, 6);
//        $sth->bindParam(':sabado_qtd', $sabado_qtd, PDO::PARAM_STR, 30);        
//        $sth->bindParam(':domingo', $domingo, PDO::PARAM_STR, 6);
//        $sth->bindParam(':domingo_qtd', $domingo_qtd, PDO::PARAM_STR, 30);        
//
//
//        try {
//            $sth->execute();
//        } catch (PDOException $e) {
//            echo json_encode(array(
//                "error" => "erro na execução do sql: " . $e->getMessage()
//            ));
//            exit(0);
//        }
//        header("Location: Alterar_Excluir_Voluntario_C001.php");
//
//        //header("Location:../pages/gerencial_empresas_c001.php"); 
//        //echo 'sucesso - editar';
//        break;
//
//    case 'editar':
//        //echo 'date_format(cadastro,'+" '%d/%m/%Y '"+')';
//        $sth = $db->prepare('SELECT  codigo
//                                        ,nome           
//                                        ,email          
//                                        ,telefone_1     
//                                        ,telefone_2
//                                        './/,cadastro
//                                        ', date_format(cadastro,"%d/%m/%Y") as cadastro'.
//                                        ',congregacao    
//                                        ,circuito       
//                                        ,treinamento 
//                                        ,escalado
//                                        ,privilegio
//                                        ,sc_avaliacao_1 
//                                        ,sc_avaliacao_2 
//                                        ,sc_avaliacao_3 
//                                        ,sc_avaliacao_4 
//                                        ,cca_avaliacao_1
//                                        ,cca_avaliacao_2
//                                        ,cca_avaliacao_3
//                                        ,cca_avaliacao_4
//                                        ,sec_avaliacao_1
//                                        ,sec_avaliacao_2
//                                        ,sec_avaliacao_3
//                                        ,sec_avaliacao_4
//                                        ,ss_avaliacao_1 
//                                        ,ss_avaliacao_2 
//                                        ,ss_avaliacao_3 
//                                        ,ss_avaliacao_4
//                                        ,segunda
//                                        ,terca
//                                        ,quarta
//                                        ,quinta
//                                        ,sexta
//                                        ,sabado
//                                        ,sabado_qtd
//                                        ,domingo
//                                        ,domingo_qtd
//                                FROM voluntarios
//                                where (codigo=:codigo)');
//        $sth->bindParam(':codigo', $codigo, PDO::PARAM_INT);
//        try {
//            $sth->execute();
//        } catch (PDOException $e) {
//            echo json_encode(array(
//                "error" => "erro na execução do sql: " . $e->getMessage()
//            ));
//            exit(0);
//        }
//
//        $jRow = $sth->fetch(PDO::FETCH_OBJ);
//        //$jRow->DATABASE_FILE = decrypt($jRow->DATABASE_FILE);
//        //$jsonGerencialEmpresa = json_encode($jRow);
//        //echo ( $jsonGerencialEmpresa);
//        $jsonGerencialVoluntario = json_encode($jRow);
//        echo ( $jsonGerencialVoluntario);
//        break;
//
//    case 'excluir':
//
//        $sth = $db->prepare('DELETE FROM voluntarios
//                                WHERE (codigo=:codigo)');
//
//        $sth->bindParam(':codigo', $codigo, PDO::PARAM_INT);
//
//        try {
//            $sth->execute();
//        } catch (PDOException $e) {
//            echo json_encode(array(
//                "error" => "erro na execução do sql: " . $e->getMessage()
//            ));
//            exit(0);
//        }
//        //echo 'EXCLUIR - SUCESSO';
//        header("Location: Alterar_Excluir_Voluntario_C001.php");
//        break;
//}
?>
