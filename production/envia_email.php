<?php
//error_reporting(0);
if (isset($_GET['valores'])) {
    include '../inc/funcoes.php';

    $valores = $_GET['valores'];
   
    include 'conexao.php';
    
    $sth = ibase_query($dbh, "SELECT v.CODIGO, v.NOME, v.EMAIL FROM voluntarios v WHERE (v.CODIGO IN ($valores))");

//    $host = "127.0.0.1";
//    $usuario = "root";
//    $senha = "";
//    $dbname = "locacao_web";    
//    $db = conectar_mysql();
    
    $sql = $db->prepare("INSERT INTO voluntarios (CODIGO, SELETOR, VALIDADOR) VALUES(:CODIGO, :SELETOR, :VALIDADOR)");
    $sql->bindParam(':CODIGO', $codigo);
    $sql->bindParam(':SELETOR', $seletor);
    $sql->bindParam(':VALIDADOR', $validador);    
    
    $erros = 0;
    while ($row = ibase_fetch_object($sth)) {
        $pessoa = $row->CODIGO;
        $seletor = generateSelector();
        $validador = generateValidator();
        $data_formatada = date('d.m.y');

        $url = sprintf('email=%s&uid=%s&key=%s', urlencode(encrypt($row->EMAIL)), $seletor.$validador, urlencode(encrypt($data_formatada)));
        $mensagem = 'Para confirmar seu cadastro acesse o link:' . "\n";
        $mensagem .= sprintf('http://localhost/TPE/PRODUCTION/Confirmacao_Cadastro_M001.php?%s', $url);

        $to = 'teste@localhost';        
        if (mail($to, 'Confirmacao de cadastro TPE', $mensagem)) {
            $update = ibase_prepare("UPDATE voluntarios SET DATA_EMAIL_SITE = ?, UID = ? WHERE CODIGO = ?");
            $transacao = ibase_trans();
            ibase_execute($update, $data_formatada, $seletor.$validador, $row->CODIGO);
            ibase_commit($transacao);
            
            $sql->execute();
        } else {
            $erros++;
        }
    }
    $db = null;
    ibase_free_result($sth);
    ibase_close($dbh);
    echo $erros;
}
?>
