<?php
session_start();
if($_SESSION['logado'] != true){
    header("Location: Usuario_Login.php?url=".$_SERVER['PHP_SELF']);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--         Bootstrap -->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!--         Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <!--         iCheck --> 
        <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

        <!--         Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">
        
        <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">        

        <link type="text/css" rel="stylesheet" href="../build/css/DataTables/jquery.dataTables.css" />
        <link type="text/css" rel="stylesheet" href="../build/css/DataTables/extensions/dataTables.colVis.css" />
        <link type="text/css" rel="stylesheet" href="../build/css/DataTables/extensions/extensions/dataTables.tableTools.css" />

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
<!--                                            <button type="button" id="btnPesquisar" name="btnPesquisar" class="btn btn-primary  fa fa-search "> Pesquisar</button>-->

                                            <button type="button" id="btnImprimir" name="btnImprimir" class="btn btn-primary  fa fa-print "> Imprimir Não Escalados</button>
                                            <button type="button" id="btnImprimir_T" name="btnImprimir_T" class="btn btn-success  fa fa-print "> Imprimir Todos</button>                                            

<!--                                            <button type="button" id="btnExcluir" name="btnExcluir" class="btn btn-danger  fa fa-trash-o "> Excluir</button>-->

                                                           <div class="ln_solid"></div>
                                            
                                                            <div class="col-md-3 col-sm-3 col-xs-12">                      
                                                                <div class="checkbox">
                                                                    <div class="form-group">
                                                                        <label><input value="A" type="checkbox" id="dias_sim_nao" name="dias_sim_nao"> Listagem com Disponibilidade de Dias</label>
                                                                    </div>
                                                                    
                                                                    <div class="ln_solid"></div>
                                                                    
                                                                    <div class="form-group">
                                                                       <label>Selecionar abaixo o dia da Semana para filtrar</label>
                                                                       <br />
                                                                       <br />
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                        <label><input value="A" type="checkbox" id="segunda" name="segunda"> Segunda </label>
                                                                        <label><input value="A" type="checkbox" id="terca" name="terca"> Terça </label>
                                                                        <label><input value="A" type="checkbox" id="quarta" name="quarta"> Quarta </label>
                                                                        <label><input value="A" type="checkbox" id="quinta" name="quinta"> Quinta </label>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label><input value="A" type="checkbox" id="sexta" name="sexta"> Sexta </label>
                                                                        <label><input value="A" type="checkbox" id="sabado" name="sabado"> Sábado </label>
                                                                        <label><input value="A" type="checkbox" id="domingo" name="domingo"> Domingo </label>
                                                                    </div>

                                                                </div>
                                                            </div>                                            

                                                           
                                                           
                                        </div>





                                        
                                        

                                        <table id="datatable-voluntarios"  name="datatable-voluntarios" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                            <thead>
                                                <tr>
                                                    
                                                    <th>Nome</th>
                                                    <th>Escalado</th>
                                                    <th>Email</th>
                                                    <th>Telefone 1</th>
                                                    <th>Telefone 2</th>
                                                    <th>Congregacao</th>
                                                    <th>Circuito</th>
                                                    <th>Treinamento</th>
                                                    <th>Codigo</th>
                                                    
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


        <!--         jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>

        <!--         Bootstrap -->
        <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>

        <!--         Datatables -->
        <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

        <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>

        <script src="Rel_Voluntarios_C001_ajax.js"></script>

        <!--         Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>

    </body>
</html>