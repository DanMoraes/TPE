<?php
session_start();
if ($_SESSION['logado'] != true) {
    header("Location: Usuario_Login.php?url=" . $_SERVER['PHP_SELF']);
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

        <title>TPE! | </title>
        
        
<!--                 Bootstrap -->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<!--                 Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

<!--                 iCheck -->
        <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

<!--                 Custom Theme Style -->
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
                                            <button type="button" id="btnNovo" name="btnNovo" class="btn btn-primary  fa fa-file-o "> Adicionar</button>

                                            <button type="button" id="btnEditar" name="btnEditar" class="btn btn-success  fa fa-edit "> Editar</button>

                                            <button type="button" id="btnExcluir" name="btnExcluir" class="btn btn-danger  fa fa-trash-o "> Excluir</button>

                                            <div class="ln_solid"></div>

                                        </div>
                                        <div class="x_content">    
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Data de Designação</label>
                                                <div class="col-md-3 col-sm-3 col-xs-12">

                                                    <input id="data_designacao" name="data_designacao"  class="form-control col-md-7 col-xs-12" required="required" type="text"  placeholder="99/99/9999">

<!--                                                                <input type="text" class="form-control"  id="cadastro" name="cadastro" data-inputmask="'mask': '99/99/9999'">-->

                                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="x_content">    

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Período</label>
                                                <div class="col-md-3 col-sm-3 col-xs-12">

                                                    <select class="form-control" id="periodo" name="periodo">
                                                        <option value=" "></option>
                                                        <option value="M" id="periodo_a">Manhã</option>
                                                        <option value="T" id="periodo_b">Tarde</option>
                                                        <option value="N" id="periodo_c">Noite</option>
                                                    </select>

                                                </div>

                                            </div>


                                        </div>


                                        <div class="form-group">
                                            <input type="hidden" id="codigo_ponto" name="codigo_ponto" 
                                                   value="  <?php
                                                   if ($_POST['codigo_ponto'] > 0) {
                                                       $codigo_ponto = $_POST['codigo_ponto'];
                                                       echo $codigo_ponto;
                                                   } else
                                                       echo '0';
                                                   ?>"
                                                   >  <!-- CHAVE DA TABELA-->



                                            <input type="hidden" id="acao" name="acao" 
                                                   value="<?php
                                                   if ($_POST['acao'] > '') {
                                                       $acao = $_POST['acao'];
                                                       echo $acao;
                                                   } else
                                                       echo 'novo';
                                                   ?>"
                                                   >  <!-- ACAO QUE SERA FEITA NA TELA-->                                                

<!--                                                <input type="text" class="form-control input-lg" id="nome" name="nome" required>
<label for="large4">Nome</label>-->

                                        </div>



                                        <table id="datatable-ponto"  name="datatable-ponto" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                            <thead>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Período</th>
                                                    <th>Ponto</th>
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

        
        
        
        
        
        
        <!--        bootstrap-daterangepicker -->
        <script src="js/moment/moment.min.js"></script>
<!--        <script src="js/datepicker/daterangepicker.js"></script>-->
        
        <!--        Ion.RangeSlider -->
        <script src="../vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
        <!--        Bootstrap Colorpicker -->
        <script src="../vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <!--        jquery.inputmask -->
        <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
        <!--        jQuery Knob -->
        <script src="../vendors/jquery-knob/dist/jquery.knob.min.js"></script>
        <!--        Cropper -->
        <script src="../vendors/cropper/dist/cropper.min.js"></script>
        

        <!--         Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
        

        <script src="Selecionar_Ponto_Designacao_C002_ajax.js"></script>

        
        bootstrap-daterangepicker 
        <script>
            $(document).ready(function () {
                $('#designacao').datepicker(
                        {
                            dateFormat: "dd/mm/yy",
                            dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],        
                            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                            nextText: 'Próximo',
                            prevText: 'Anterior'
                        }

                )

            });
        </script>
        /bootstrap-daterangepicker 
        
        
        
        
        
        
        
        
        
        
<!-- Ion.RangeSlider -->
        <script>
            $(document).ready(function () {
                $("#range_27").ionRangeSlider({
                    type: "double",
                    min: 1000000,
                    max: 2000000,
                    grid: true,
                    force_edges: true
                });
                $("#range").ionRangeSlider({
                    hide_min_max: true,
                    keyboard: true,
                    min: 0,
                    max: 5000,
                    from: 1000,
                    to: 4000,
                    type: 'double',
                    step: 1,
                    prefix: "$",
                    grid: true
                });
                $("#range_25").ionRangeSlider({
                    type: "double",
                    min: 1000000,
                    max: 2000000,
                    grid: true
                });
                $("#range_26").ionRangeSlider({
                    type: "double",
                    min: 0,
                    max: 10000,
                    step: 500,
                    grid: true,
                    grid_snap: true
                });
                $("#range_31").ionRangeSlider({
                    type: "double",
                    min: 0,
                    max: 100,
                    from: 30,
                    to: 70,
                    from_fixed: true
                });
                $(".range_min_max").ionRangeSlider({
                    type: "double",
                    min: 0,
                    max: 100,
                    from: 30,
                    to: 70,
                    max_interval: 50
                });
                $(".range_time24").ionRangeSlider({
                    min: +moment().subtract(12, "hours").format("X"),
                    max: +moment().format("X"),
                    from: +moment().subtract(6, "hours").format("X"),
                    grid: true,
                    force_edges: true,
                    prettify: function (num) {
                        var m = moment(num, "X");
                        return m.format("Do MMMM, HH:mm");
                    }
                });
            });
        </script>
        <!-- /Ion.RangeSlider -->

        <!-- Bootstrap Colorpicker -->
        <script>
            $(document).ready(function () {
                $('.demo1').colorpicker();
                $('.demo2').colorpicker();

                $('#demo_forceformat').colorpicker({
                    format: 'rgba',
                    horizontal: true
                });

                $('#demo_forceformat3').colorpicker({
                    format: 'rgba',
                });

                $('.demo-auto').colorpicker();
            });
        </script>
        <!-- /Bootstrap Colorpicker -->

        <!-- jquery.inputmask -->
        <script>
            $(document).ready(function () {
                $(":input").inputmask();
            });
        </script>
        <!-- /jquery.inputmask -->

        <!-- jQuery Knob -->
        <script>
            $(function ($) {

                $(".knob").knob({
                    change: function (value) {
                        //console.log("change : " + value);
                    },
                    release: function (value) {
                        //console.log(this.$.attr('value'));
                        console.log("release : " + value);
                    },
                    cancel: function () {
                        console.log("cancel : ", this);
                    },
                    /*format : function (value) {
                     return value + '%';
                     },*/
                    draw: function () {

                        // "tron" case
                        if (this.$.data('skin') == 'tron') {

                            this.cursorExt = 0.3;

                            var a = this.arc(this.cv) // Arc
                                    ,
                                    pa // Previous arc
                                    , r = 1;

                            this.g.lineWidth = this.lineWidth;

                            if (this.o.displayPrevious) {
                                pa = this.arc(this.v);
                                this.g.beginPath();
                                this.g.strokeStyle = this.pColor;
                                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
                                this.g.stroke();
                            }

                            this.g.beginPath();
                            this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
                            this.g.stroke();

                            this.g.lineWidth = 2;
                            this.g.beginPath();
                            this.g.strokeStyle = this.o.fgColor;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                            this.g.stroke();

                            return false;
                        }
                    }
                });

                // Example of infinite knob, iPod click wheel
                var v, up = 0,
                        down = 0,
                        i = 0,
                        $idir = $("div.idir"),
                        $ival = $("div.ival"),
                        incr = function () {
                            i++;
                            $idir.show().html("+").fadeOut();
                            $ival.html(i);
                        },
                        decr = function () {
                            i--;
                            $idir.show().html("-").fadeOut();
                            $ival.html(i);
                        };
                $("input.infinite").knob({
                    min: 0,
                    max: 20,
                    stopper: false,
                    change: function () {
                        if (v > this.cv) {
                            if (up) {
                                decr();
                                up = 0;
                            } else {
                                up = 1;
                                down = 0;
                            }
                        } else {
                            if (v < this.cv) {
                                if (down) {
                                    incr();
                                    down = 0;
                                } else {
                                    down = 1;
                                    up = 0;
                                }
                            }
                        }
                        v = this.cv;
                    }
                });
            });
        </script>
        <!-- /jQuery Knob -->











        <!-- jQuery Tags Input -->
        <script>
            function onAddTag(tag) {
                alert("Added a tag: " + tag);
            }

            function onRemoveTag(tag) {
                alert("Removed a tag: " + tag);
            }

            function onChangeTag(input, tag) {
                alert("Changed a tag: " + tag);
            }

            $(document).ready(function () {
                $('#tags_1').tagsInput({
                    width: 'auto'
                });
            });
        </script>
        <!-- /jQuery Tags Input -->











        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

    </body>
</html>