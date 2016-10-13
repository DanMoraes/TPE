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
        header("Location: Erro_Email.php");
    }
} else {
    $db = null;
    header("Location: Erro_Email.php");
}
//        if (!$valido) {
//            echo "<script>$('#alertaModal').modal('show')</script>";
//        }
?><!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Lts Admin - Inicio</title>

        <!-- BEGIN META -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="your,keywords">
        <meta name="description" content="Short explanation about this website">
        <!-- END META -->

        <!-- BEGIN STYLESHEETS --
        <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/bootstrap.css?1422792965" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/materialadmin.css?1425466319" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/font-awesome.min.css?1422529194" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/rickshaw/rickshaw.css?1422792967" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/morris/morris.core.css?1420463396" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/bootstrap-datepicker/datepicker3.css?1424887858" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/select2/select2.css?1424887856" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/multi-select/multi-select.css?1424887857" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/bootstrap-datepicker/datepicker3.css?1424887858" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/jquery-ui/jquery-ui-theme.css?1423393666" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/bootstrap-colorpicker/bootstrap-colorpicker.css?1424887860" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/bootstrap-tagsinput/bootstrap-tagsinput.css?1424887862" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/typeahead/typeahead.css?1424887863" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-default/libs/dropzone/dropzone-theme.css?1424887864" />
        <!-- END STYLESHEETS -->

        <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-5/bootstrap.css?1422792965" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-5/materialadmin.css?1425466319" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-5/font-awesome.min.css?1422529194" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-5/material-design-iconic-font.min.css?1421434286" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-5/libs/select2/select2.css?1424887856" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-5/libs/multi-select/multi-select.css?1424887857" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-5/libs/bootstrap-datepicker/datepicker3.css?1424887858" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-5/libs/jquery-ui/jquery-ui-theme.css?1423393666" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-5/libs/bootstrap-colorpicker/bootstrap-colorpicker.css?1424887860" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-5/libs/bootstrap-tagsinput/bootstrap-tagsinput.css?1424887862" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-5/libs/typeahead/typeahead.css?1424887863" />
        <link type="text/css" rel="stylesheet" href="../../assets/css/theme-5/libs/dropzone/dropzone-theme.css?1424887864" />


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
        <script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
        <![endif]-->
    </head>
    <body class="menubar-visible header-fixed">        
        <?php //include '../inc/header.php'; ?>
        <header id="header">
            <div class="headerbar full-width">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="headerbar-left">
                    <ul class="header-nav header-nav-options">
                        <li class="header-nav-brand" >
                            <div class="brand-holder">
<!--                                <a href="../../html/index/index.php">-->
                                    <span class="text-lg text-bold text-primary">LTS ADMIN</span>
                                
                            </div>
                        </li>
                        <li>
<!--                            <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                                <i class="fa fa-bars"></i>
                            </a>-->
                        </li>
                    </ul>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="headerbar-right">
                    <ul class="header-nav header-nav-options">
                </div><!--end #header-navbar-collapse -->
            </div>
        </header>
        <!-- BEGIN BASE-->
        <div id="base">

            <!-- BEGIN OFFCANVAS LEFT -->
            <div class="offcanvas">
            </div><!--end .offcanvas-->
            <!-- END OFFCANVAS LEFT -->

            <!-- BEGIN CONTENT-->
            <div id="content">
                <section>
                    <div class="section-body">

                        <div class="row">

                            <!-- BEGIN TODOS -->
                            <div class="col-md-12">
                                <div class="card card-outlined style-primary">
                                    <div class="card-head style-primary">
                                        <header>Cadastro Proprietario</header>
  
                                    </div><!--end .card-head -->

                                    <div class="card-body floating-label">
                                        <form class="form form-validate " id="formulario" method="post">
                                            <div class="card-actionbar">
                                                <div class="card-actionbar-ro">
                                                    <!--<button class="btn btn-rounded btn-danger"  data-toggle="modal" data-target="#simpleModal"><i class="glyphicon glyphicon-minus-sign"> </i> Excluir</button>
                                                    <button type="button" class="btn btn-rounded btn-warning"><i class="glyphicon glyphicon-remove-sign"> </i> Cancelar</button>-->
                                                    <button type="submit" class="btn btn-rounded btn-success" name="salvar"><span class="glyphicon glyphicon-ok-sign"></span> Salvar</button>
                                                    <input type="hidden" name="pessoa" value="<?php if (isset($row)) {
            echo $row->PESSOA;
        } ?>"/>
                                                </div>
                                            </div>
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control input-lg" id="nome" name="nome" required>
                                                <label for="nome">Nome</label>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" maxlength="30" class="form-control input-lg" id="usuario" name="usuario" required>
                                                        <label for="usuario">Usuario</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="password" maxlength="30" class="form-control input-lg" id="senha" name="senha" required>
                                                        <label for="senha">Senha</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group floating-label">
                                                <input type="email" class="form-control input-lg" id="email" name="email" required>
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control input-lg" id="endereco" name="endereco" required>
                                                <label for="endereco">Endereço</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control input-lg" id="bairro" name="bairro" required>
                                                <label for="bairro">Bairro</label>
                                            </div>
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control input-lg" id="cidade" name="cidade" required>
                                                <label for="cidade">Cidade</label>
                                            </div>
                                            <div class="form-group floating-label">
                                                <input type="number" class="form-control input-lg" id="cpf_cnpj" name="cpf_cnpj" required>
                                                <label for="cpf_cnpj">CPF/CNPJ</label>
                                            </div>
                                        </form>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->

                            </div><!--end .col -->

                            <!-- END TODOS -->						
                        </div><!--end .row -->
                    </div><!--end .section-body -->
                </section>
                
                <!-- BEGIN SIMPLE MODAL MARKUP -->
                <div class="modal alert fade" id="alertaModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="simpleModalLabel">Mensagem de Alerta</h4>
                            </div>
                            <div class="modal-body">
                                <p>Dados não conferem</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                
                <!-- END SIMPLE MODAL MARKUP -->
            </div><!--end #content-->
            <!-- END CONTENT -->
        </div><!--end #base-->
        <!-- END BASE -->
<?php include '../inc/footer.php'; ?>        
        <script src="../ajax/confirmacao_cadastro_ajax.js"></script>
    </body>
</html>
