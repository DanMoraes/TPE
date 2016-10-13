<html>
	<head>
<title> Cadastrando...</title>
</head>
<Body>
	
<?php

$host = "localhost";
$user = "root";
$pass = "";
$banco = "tpe";
$conexao = mysql_connect($host, $user, $pass) OR die(mysql_error());
mysql_select_db($banco) OR die(mysql_error());
            
        
           $nome           =$_POST['nome'];
           $email          =$_POST['email'];
           $telefone_1     =$_POST['telefone_1'];
           $telefone_2     =$_POST['telefone_2'];
           $cadastro       =$_POST['cadastro'];
           $congregacao    =$_POST['congregacao'];
           $circuito       =$_POST['circuito'];
           $treinamento    =$_POST['treinamento'];
           $sc_avaliacao_1 =$_POST['sc_avaliacao_1'];
           $sc_avaliacao_2 =$_POST['sc_avaliacao_2'];
           $sc_avaliacao_3 =$_POST['sc_avaliacao_3'];
           $sc_avaliacao_4 =$_POST['sc_avaliacao_4'];
           $cca_avaliacao_1=$_POST['cca_avaliacao_1'];
           $cca_avaliacao_2=$_POST['cca_avaliacao_2'];
           $cca_avaliacao_3=$_POST['cca_avaliacao_3'];
           $cca_avaliacao_4=$_POST['cca_avaliacao_4'];
           $sec_avaliacao_1=$_POST['sec_avaliacao_1'];
           $sec_avaliacao_2=$_POST['sec_avaliacao_2'];
           $sec_avaliacao_3=$_POST['sec_avaliacao_3'];
           $sec_avaliacao_4=$_POST['sec_avaliacao_4'];
           $ss_avaliacao_1 =$_POST['ss_avaliacao_1'];
           $ss_avaliacao_2 =$_POST['ss_avaliacao_2'];
           $ss_avaliacao_3 =$_POST['ss_avaliacao_3'];
           $ss_avaliacao_4 =$_POST['ss_avaliacao_4'];
            
            $sql = mysql_query("INSERT INTO voluntarios
                                        (nome           
                                        ,email          
                                        ,telefone_1     
                                        ,telefone_2     
                                        ,cadastro       
                                        ,congregacao    
                                        ,circuito       
                                        ,treinamento    
                                        ,sc_avaliacao_1 
                                        ,sc_avaliacao_2 
                                        ,sc_avaliacao_3 
                                        ,sc_avaliacao_4
                                        ,cca_avaliacao_1
                                        ,cca_avaliacao_2
                                        ,cca_avaliacao_3
                                        ,cca_avaliacao_4
                                        ,sec_avaliacao_1
                                        ,sec_avaliacao_2
                                        ,sec_avaliacao_3
                                        ,sec_avaliacao_4
                                        ,ss_avaliacao_1 
                                        ,ss_avaliacao_2 
                                        ,ss_avaliacao_3 
                                        ,ss_avaliacao_4) 
                                        
                                VALUES
                                        ('$nome'
                                        ,'$email'
                                        ,'$telefone_1'
                                        ,'$telefone_2'
                                        ,'$cadastro'
                                        ,'$congregacao'
                                        ,'$circuito'
                                        ,'$treinamento'
                                        ,'$sc_avaliacao_1'
                                        ,'$sc_avaliacao_2'
                                        ,'$sc_avaliacao_3'
                                        ,'$sc_avaliacao_4'
                                        ,'$cca_avaliacao_1'
                                        ,'$cca_avaliacao_2'
                                        ,'$cca_avaliacao_3'
                                        ,'$cca_avaliacao_4'
                                        ,'$sec_avaliacao_1'
                                        ,'$sec_avaliacao_2'
                                        ,'$sec_avaliacao_3'
                                        ,'$sec_avaliacao_4'
                                        ,'$ss_avaliacao_1'
                                        ,'$ss_avaliacao_2'
                                        ,'$ss_avaliacao_3'
                                        ,'$ss_avaliacao_4')");

  
?>

</body>
</html>
