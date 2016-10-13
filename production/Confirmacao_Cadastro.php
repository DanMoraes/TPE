<?php
//include '../inc/funcoes.php';
//$db = conectar_mysql();

if (isset($_POST['salvar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sth = $db->prepare('UPDATE voluntarios SET E_MAIL = :EMAIL,
                                                 SENHA = :SENHA
                                WHERE (CODIGO = :CODIGO)');

    $sth->bindParam(':EMAIL', $email, PDO::PARAM_STR, 70);
    $sth->bindParam(':SENHA', $senha, PDO::PARAM_STR, 30);

    try {
        $sth->execute();
        header("Location: Usuario_Login.php");
    } catch (PDOException $e) {
        echo json_encode(array(
            "error" => "erro na execução do sql: " . $e->getMessage()
        ));
        exit(0);
    }
}
if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
    $seletor = substr($uid, 0, 12);
    $validador = substr($uid, 12);
    $sql = $db->prepare("SELECT CODIGO, SELETOR, VALIDADOR FROM voluntarios WHERE (SELETOR = :SELETOR)");
    $sql->execute(array(':SELETOR' => $seletor));
    $row = $sql->fetch(PDO::FETCH_OBJ);

    if ($row->VALIDADOR != $validador) {
        $db = null;
        //header("Location: Erro_Email.php");
    }
} else {
    $db = null;
    //header("Location: Erro_Email.php");
}
//        if (!$valido) {
//            echo "<script>$('#alertaModal').modal('show')</script>";
//        }


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TPE! | </title>

        <!--     Bootstrap 
            <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
             Font Awesome 
            <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
             NProgress 
            <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
             iCheck 
            <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
             bootstrap-wysiwyg 
            <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
             Select2 
            <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
             Switchery 
            <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
             starrr 
            <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
        
             Custom Theme Style 
            <link href="../build/css/custom.min.css" rel="stylesheet">-->
        <!-- Bootstrap -->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- Ion.RangeSlider -->
        <link href="../vendors/normalize-css/normalize.css" rel="stylesheet">
        <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
        <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
        <!-- Bootstrap Colorpicker -->
        <link href="../vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

        <link href="../vendors/cropper/dist/cropper.min.css" rel="stylesheet">

        <!-- Login -->
        <link href="../production/css/Usuario_Login.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
<!--            <div class="col-md-6 col-sm-6 col-xs-12">-->
            <div class="card card-container">
                
                <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->

                <p id="profile-name" class="profile-name-card"></p>
                <form class="form-signin" action="index.php">
                    <span id="reauth-email" class="reauth-email"></span>

                    <input type="hidden" name="usuario" value="<?php
                    if (isset($row)) {
                        echo $row->NOME;
                    }
                    ?>"/>

                    <label for="senha">Nova Senha</label>
                    <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
                    <label for="senha_confirmacao">Confirmar a Senha</label>

                    <input type="password" id="senha_confirmacao" name="senha_confirmacao" class="form-control" placeholder="Senha" required>

                    <button type="submit" class="btn btn-rounded btn-success" name="salvar"><span class="glyphicon glyphicon-ok-sign"></span> Salvar</button>

                </form><!-- /form -->
                </div><!-- /card-container -->
<!--            </div>-->
        </div><!-- /container -->
    </body>
</html>
