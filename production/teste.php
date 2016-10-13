<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DataTables | Gentellela</title>
        
        
        
        <!-- Bootstrap -->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        
        
        <link href="../build/css/custom.min.css" rel="stylesheet">
		
        <link type="text/css" rel="stylesheet" href="jquery.dataTables.css" />
        <link type="text/css" rel="stylesheet" href="extensions/dataTables.colVis.css" />
        <link type="text/css" rel="stylesheet" href="extensions/dataTables.tableTools.css" />
        
        
    </head>

    <body class="nav-md">
        
        
        
        
        <div class="container body">
            <div class="main_container">

                <?php include 'menu.php'; ?>

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">

                        <div class="clearfix"></div>

                        <div class="row">


                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_content">


                                        <div class="x_content">
                                            <button type="button" id="btnNovo" name="btnNovo" class="btn btn-primary  fa fa-file-o "> Adicionar</button>

                                            <button type="button" id="btnEditar" name="btnEditar" class="btn btn-success  fa fa-edit "> Editar</button>

                                            <button type="button" class="btn btn-danger  fa fa-trash-o "> Excluir</button>

                                            <div class="ln_solid"></div>
                                        </div>


                                        <table id="datatable-voluntarios"  name="datatable-voluntarios" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        
                                            <thead>
                                                <tr>
                                                    <th>Codigo</th>
                                                    <th>Nome</th>
                                                    <th>Email</th>
                                                    <th>Telefone 1</th>
                                                    <th>Telefone 2</th>
                                                    <th>Cadastro</th>
                                                    <th>Congregacao</th>
                                                    <th>Circuito</th>
                                                    <th>Treinamento</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        TPE - Piracicaba - <a href="https://www.jw.org">jw.org</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        
        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
        
        <!-- Bootstrap -->
        <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script> 
        <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        
        <script src="Alterar_Excluir_Voluntarios_ajax.js"></script>

<!--        <script src="../build/js/custom.min.js"></script>-->

    </body>
</html>