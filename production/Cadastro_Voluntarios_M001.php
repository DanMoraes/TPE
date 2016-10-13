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
        <!--         Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>TPE! | </title>


        <!-- Bootstrap -->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- bootstrap-wysiwyg -->
        <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">

        <!-- bootstrap-wysiwyg -->
        <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
        <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
        <script src="../vendors/google-code-prettify/src/prettify.js"></script>


        <!-- Select2 -->
        <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
        <!-- Switchery -->
        <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">

        <!-- Parsley -->
        <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>

        <!-- Autosize -->
        <script src="../vendors/autosize/dist/autosize.min.js"></script>

        <!-- jQuery autocomplete -->
        <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>

        <!-- starrr -->
        <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    </head>

    <body class="nav-md">

        <form class="form-horizontal form-label-left" id="formulario" action="Cadastro_Voluntarios_M001_ajax.php" method="post">

            <div class="container body">

                <div class="main_container">


                    <?php include 'menu.php'; ?>


                    <!-- page content -->
                    <div class="right_col" role="main">

                        <div class="clearfix"></div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel">

                                <div class="x_content">
                                    <button type="submit" id="btnSalvar" class="btn btn-success  fa fa-check "> Salvar</button>

                                    <button type="Button" id="btnCancelar" class="btn btn-warning  fa fa-close"> Cancelar</button>

                                    <div class="ln_solid"></div>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" id="codigo" name="codigo" 
                                           value="  <?php
                                           if ($_POST['codigo'] > 0) {
                                               $codigo = $_POST['codigo'];
                                               echo $codigo;
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


                                <div class="x_content">

                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#tab_content1" id="Candidato-tab" role="tab" data-toggle="tab" aria-expanded="true">Vol.</a>
                                            </li>
                                            <li role="presentation" class=""><a href="#tab_content2 <?php echo $_SESSION['tipo_acesso'] ?>" role="tab" id="Sup-Circuito-tab" data-toggle="tab" aria-expanded="false">Circuito</a>
                                            </li>
                                            <li role="presentation" class=""><a href="#tab_content3 <?php echo $_SESSION['tipo_acesso'] ?>" role="tab" id="Congregacao-tab2" data-toggle="tab" aria-expanded="false">Cong.</a>
                                            </li>
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="Candidato-tab">


                                                <div class="row">


                                                    <div class="x_title">
                                                        <h2>Dados do Voluntário <small></small></h2>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="x_content">
                                                        <br />

                                                        <!--                                                    <form class="form-horizontal form-label-left">-->


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nome do Voluntário</label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input type="Text" class="form-control" id="nome" name="nome" placeholder="Digite o Nome">
                                                                <!-- <input type="text" class="form-control" placeholder="Digite o nome"> -->
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input type="email" class="form-control" id="email" name="email" placeholder="email@exemplo.com">
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Residencial</label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
<!--                                                                <input type="text" class="form-control" id="telefone_1" name="telefone_1" data-inputmask="'mask' : '(99) 9999-9999'" placeholder="Telefone 1">-->
                                                                <input type="text" class="form-control" id="telefone_1" name="telefone_1"  placeholder="Telefone 1 - (99) 9999-9999">
                                                                <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Celular</label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
<!--                                                                <input type="text" class="form-control" id="telefone_2" name="telefone_2" data-inputmask="'mask' : '(99) 99999-9999'" placeholder="Telefone 2">-->
                                                                <input type="text" class="form-control" id="telefone_2" name="telefone_2" placeholder="Telefone 2 - (99) 99999-9999">
                                                                <span class="fa fa-mobile-phone form-control-feedback right" aria-hidden="true"></span>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Data de Cadastro</label>
                                                            <div class="col-md-9 col-sm-9 col-xs-9">

                                                                <input id="cadastro" name="cadastro"  class="form-control col-md-7 col-xs-12" required="required" type="text"  placeholder="99/99/9999">


<!--                                                                <input type="text" class="form-control"  id="cadastro" name="cadastro" data-inputmask="'mask': '99/99/9999'">-->


                                                                <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="ln_solid"></div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Congregação</label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" id="congregacao" name="congregacao" placeholder="Digite o nome da congregação">
                                                            </div>
                                                        </div>

                                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Serve atualmente</label>

                                                        <div class="col-md-9 col-sm-9 col-xs-12">                      
                                                            <div class="checkbox">
                                                                <div class="form-group">
                                                                    <label><input value="A" type="checkbox" id="privilegio_1" name="privilegio_1"> Ancião </label>
                                                                    <label><input value="S" type="checkbox" id="privilegio_2" name="privilegio_2"> Servo </label>
                                                                    <label><input value="P" type="checkbox" id="privilegio_3" name="privilegio_3"> Pioneiro </label>
                                                                    <label><input value="B" type="checkbox" id="privilegio_4" name="privilegio_4"> Betelita </label>
                                                                    <label><input value="V" type="checkbox" id="privilegio_5" name="privilegio_5"> Viajante </label>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Qual Circuíto</label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <select class="form-control" id="circuito" name="circuito">
                                                                    <option value=" "></option>
                                                                    <option value="A" id="circuito_a">SP-90</option>
                                                                    <option value="B" id="circuito_b">SP-113</option>
                                                                    <option value="C" id="circuito_c">LS-004</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="ln_solid"></div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Recebeu Treinamento</label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <select class="form-control" id="treinamento" name="treinamento">
                                                                    <option value=" "></option>
                                                                    <option value="S" id="treinamento_s">Sim</option>
                                                                    <option value="N" id="treinamento_n">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="ln_solid"></div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Foi Designado</label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <select class="form-control" id="escalado" name="escalado">
                                                                    <option value=" "></option>
                                                                    <option value="S" id="escalado_s">Sim</option>
                                                                    <option value="N" id="escalado_n">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="ln_solid"></div>

                                                        <div class="form-group">

                                                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Segunda</label>

                                                            <div class="col-md-9 col-sm-9 col-xs-12">                      
                                                                <div class="checkbox">
                                                                    <div class="form-group">
                                                                        <label><input value="A" type="checkbox" id="segunda_a" name="segunda_a"> Manhã</label>
                                                                        <label><input value="B" type="checkbox" id="segunda_b" name="segunda_b"> Tarde</label>
                                                                        <label><input value="C" type="checkbox" id="segunda_c" name="segunda_c"> Noite</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <label class="col-md-3 col-sm-3 col-xs-12 control-label"></label>

                                                            <div class="col-md-9 col-sm-9 col-xs-12">                      
                                                                <div class="checkbox">
                                                                    <div class="form-group">
                                                                        <label><input value="D" type="checkbox" id="segunda_d" name="segunda_d"> Meio Dia</label>
                                                                        <label><input value="E" type="checkbox" id="segunda_e" name="segunda_e"> Dia Inteiro</label>
                                                                        <label><input value="F" type="checkbox" id="segunda_f" name="segunda_f"> Não Disponível</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="ln_solid"></div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Terça</label>

                                                            <div class="col-md-9 col-sm-9 col-xs-12">                      
                                                                <div class="checkbox">
                                                                    <div class="form-group">
                                                                        <label><input value="A" type="checkbox" id="terca_a" name="terca_a"> Manhã</label>
                                                                        <label><input value="B" type="checkbox" id="terca_b" name="terca_b"> Tarde</label>
                                                                        <label><input value="C" type="checkbox" id="terca_c" name="terca_c"> Noite</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <label class="col-md-3 col-sm-3 col-xs-12 control-label"></label>

                                                            <div class="col-md-9 col-sm-9 col-xs-12">                      
                                                                <div class="checkbox">
                                                                    <div class="form-group">
                                                                        <label><input value="D" type="checkbox" id="terca_d" name="terca_d"> Meio Dia</label>
                                                                        <label><input value="E" type="checkbox" id="terca_e" name="terca_e"> Dia Inteiro</label>
                                                                        <label><input value="F" type="checkbox" id="terca_f" name="terca_f"> Não Disponível</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>


                                                        <div class="ln_solid"></div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Quarta</label>

                                                            <div class="col-md-9 col-sm-9 col-xs-12">                      
                                                                <div class="checkbox">
                                                                    <div class="form-group">
                                                                        <label><input value="A" type="checkbox" id="quarta_a" name="quarta_a"> Manhã</label>
                                                                        <label><input value="B" type="checkbox" id="quarta_b" name="quarta_b"> Tarde</label>
                                                                        <label><input value="C" type="checkbox" id="quarta_c" name="quarta_c"> Noite</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <label class="col-md-3 col-sm-3 col-xs-12 control-label"></label>

                                                            <div class="col-md-9 col-sm-9 col-xs-12">                      
                                                                <div class="checkbox">
                                                                    <div class="form-group">
                                                                        <label><input value="D" type="checkbox" id="quarta_d" name="quarta_d"> Meio Dia</label>
                                                                        <label><input value="E" type="checkbox" id="quarta_e" name="quarta_e"> Dia Inteiro</label>
                                                                        <label><input value="F" type="checkbox" id="quarta_f" name="quarta_f"> Não Disponível</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="ln_solid"></div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Quinta</label>

                                                            <div class="col-md-9 col-sm-9 col-xs-12">                      
                                                                <div class="checkbox">
                                                                    <div class="form-group">
                                                                        <label><input value="A" type="checkbox" id="quinta_a" name="quinta_a"> Manhã</label>
                                                                        <label><input value="B" type="checkbox" id="quinta_b" name="quinta_b"> Tarde</label>
                                                                        <label><input value="C" type="checkbox" id="quinta_c" name="quinta_c"> Noite</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <label class="col-md-3 col-sm-3 col-xs-12 control-label"></label>

                                                            <div class="col-md-9 col-sm-9 col-xs-12">                      
                                                                <div class="checkbox">
                                                                    <div class="form-group">
                                                                        <label><input value="D" type="checkbox" id="quinta_d" name="quinta_d"> Meio Dia</label>
                                                                        <label><input value="E" type="checkbox" id="quinta_e" name="quinta_e"> Dia Inteiro</label>
                                                                        <label><input value="F" type="checkbox" id="quinta_f" name="quinta_f"> Não Disponível</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>


                                                        <div class="ln_solid"></div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Sexta</label>

                                                            <div class="col-md-9 col-sm-9 col-xs-12">                      
                                                                <div class="checkbox">
                                                                    <div class="form-group">
                                                                        <label><input value="A" type="checkbox" id="sexta_a" name="sexta_a"> Manhã</label>
                                                                        <label><input value="B" type="checkbox" id="sexta_b" name="sexta_b"> Tarde</label>
                                                                        <label><input value="C" type="checkbox" id="sexta_c" name="sexta_c"> Noite</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <label class="col-md-3 col-sm-3 col-xs-12 control-label"></label>

                                                            <div class="col-md-9 col-sm-9 col-xs-12">                      
                                                                <div class="checkbox">
                                                                    <div class="form-group">
                                                                        <label><input value="D" type="checkbox" id="sexta_d" name="sexta_d"> Meio Dia</label>
                                                                        <label><input value="E" type="checkbox" id="sexta_e" name="sexta_e"> Dia Inteiro</label>
                                                                        <label><input value="F" type="checkbox" id="sexta_f" name="sexta_f"> Não Disponível</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>


                                                        <div class="ln_solid"></div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Sábado</label>

                                                            <div class="col-md-9 col-sm-9 col-xs-12">                      
                                                                <div class="checkbox">
                                                                    <div class="form-group">
                                                                        <label><input value="A" type="checkbox" id="sabado_a" name="sabado_a"> Manhã</label>
                                                                        <label><input value="B" type="checkbox" id="sabado_b" name="sabado_b"> Tarde</label>
                                                                        <label><input value="C" type="checkbox" id="sabado_c" name="sabado_c"> Noite</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <label class="col-md-3 col-sm-3 col-xs-12 control-label"></label>

                                                            <div class="col-md-9 col-sm-9 col-xs-12">                      
                                                                <div class="checkbox">
                                                                    <div class="form-group">
                                                                        <label><input value="D" type="checkbox" id="sabado_d" name="sabado_d"> Meio Dia</label>
                                                                        <label><input value="E" type="checkbox" id="sabado_e" name="sabado_e"> Dia Inteiro</label>
                                                                        <label><input value="F" type="checkbox" id="sabado_f" name="sabado_f"> Não Disponível</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Dias por mês</label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" id="sabado_qtd" name="sabado_qtd" >
                                                            </div>
                                                        </div>
                                                        

                                                        <div class="ln_solid"></div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Domingo</label>

                                                            <div class="col-md-9 col-sm-9 col-xs-12">                      
                                                                <div class="checkbox">
                                                                    <div class="form-group">
                                                                        <label><input value="A" type="checkbox" id="domingo_a" name="domingo_a"> Manhã</label>
                                                                        <label><input value="B" type="checkbox" id="domingo_b" name="domingo_b"> Tarde</label>
                                                                        <label><input value="C" type="checkbox" id="domingo_c" name="domingo_c"> Noite</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <label class="col-md-3 col-sm-3 col-xs-12 control-label"></label>

                                                            <div class="col-md-9 col-sm-9 col-xs-12">                      
                                                                <div class="checkbox">
                                                                    <div class="form-group">
                                                                        <label><input value="D" type="checkbox" id="domingo_d" name="domingo_d"> Meio Dia</label>
                                                                        <label><input value="E" type="checkbox" id="domingo_e" name="domingo_e"> Dia Inteiro</label>
                                                                        <label><input value="F" type="checkbox" id="domingo_f" name="domingo_f"> Não Disponível</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Dias por mês</label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" class="form-control" id="domingo_qtd" name="domingo_qtd" >
                                                            </div>
                                                        </div>
                                                        

                                                        <!--</form>-->


                                                    </div>
                                                </div>


                                            </div>
                                            <div role="tabpanel"  class="tab-pane fade" id="tab_content2"  aria-labelledby="Sup-Circuito-tab">

                                                <div class="x_title">
                                                    <h2>Avaliação <small></small></h2>
                                                    <div class="clearfix"></div>
                                                </div>

                                                <br />

                                                <div class="form-group">

                                                    <h4>Aparência Pessoal Digna</h4>


                                                    <select class="form-control" id="sc_avaliacao_1" name="sc_avaliacao_1">
                                                        <option value=" "></option>
                                                        <option value="A" id="sc_avaliacao_1_a">A - Excelente</option>
                                                        <option value="B" id="sc_avaliacao_1_b">B - Bom</option>
                                                        <option value="C" id="sc_avaliacao_1_c">C - Mediano(qualifica-se)</option>
                                                        <option value="D" id="sc_avaliacao_1_d">D - Fraco(talvez não se qualifique)</option>
                                                        <option value="E" id="sc_avaliacao_1_e">E - Não se qualifica</option>
                                                    </select>


                                                    <h4>Confiável e Organizado</h4>

                                                    <select class="form-control" id="sc_avaliacao_2" name="sc_avaliacao_2">
                                                        <option value=" "></option>
                                                        <option value="A" id="sc_avaliacao_2_a">A - Excelente</option>
                                                        <option value="B" id="sc_avaliacao_2_b">B - Bom</option>
                                                        <option value="C" id="sc_avaliacao_2_c">C - Mediano(qualifica-se)</option>
                                                        <option value="D" id="sc_avaliacao_2_d">D - Fraco(talvez não se qualifique)</option>
                                                        <option value="E" id="sc_avaliacao_2_e">E - Não se qualifica</option>
                                                    </select>


                                                    <h4>Equilíbrio no Critério e Discernimento</h4>


                                                    <select class="form-control" id="sc_avaliacao_3" name="sc_avaliacao_3">
                                                        <option value=" "></option>
                                                        <option value="A" id="sc_avaliacao_3_a">A - Excelente</option>
                                                        <option value="B" id="sc_avaliacao_3_b">B - Bom</option>
                                                        <option value="C" id="sc_avaliacao_3_c">C - Mediano(qualifica-se)</option>
                                                        <option value="D" id="sc_avaliacao_3_d">D - Fraco(talvez não se qualifique)</option>
                                                        <option value="E" id="sc_avaliacao_3_e">E - Não se qualifica</option>
                                                    </select>



                                                    <h4>Vigor Físico</h4>



                                                    <select class="form-control" id="sc_avaliacao_4" name="sc_avaliacao_4">
                                                        <option value=" "></option>
                                                        <option value="A" id="sc_avaliacao_4_a">A - Excelente</option>
                                                        <option value="B" id="sc_avaliacao_4_b">B - Bom</option>
                                                        <option value="C" id="sc_avaliacao_4_c">C - Mediano(qualifica-se)</option>
                                                        <option value="D" id="sc_avaliacao_4_d">D - Fraco(talvez não se qualifique)</option>
                                                        <option value="E" id="sc_avaliacao_4_e">E - Não se qualifica</option>
                                                    </select>

                                                </div>                                            

                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="Congregacao-tab2">


                                                <div class="x_title">
                                                    <h2>Avaliação <small></small></h2>
                                                    <div class="clearfix"></div>
                                                </div>

                                                <ul  class="nav navbar-right panel_toolbox">
                                                    <h4>COORDENADOR</h4>
                                                </ul>

                                                <br />
                                                <br />


                                                <div class="form-group">

                                                    <h4>Aparência Pessoal Digna</h4>
                                                    <select class="form-control" id="cca_avaliacao_1" name="cca_avaliacao_1">
                                                        <option value=" "></option>
                                                        <option value="A" id="cca_avaliacao_1_a">A - Excelente</option>
                                                        <option value="B" id="cca_avaliacao_1_b">B - Bom</option>
                                                        <option value="C" id="cca_avaliacao_1_c">C - Mediano(qualifica-se)</option>
                                                        <option value="D" id="cca_avaliacao_1_d">D - Fraco(talvez não se qualifique)</option>
                                                        <option value="E" id="cca_avaliacao_1_e">E - Não se qualifica</option>
                                                    </select>

                                                    <h4>Confiável e Organizado</h4>
                                                    <select class="form-control" id="cca_avaliacao_2" name="cca_avaliacao_2">
                                                        <option value=" "></option>
                                                        <option value="A" id="cca_avaliacao_2_a">A - Excelente</option>
                                                        <option value="B" id="cca_avaliacao_2_b">B - Bom</option>
                                                        <option value="C" id="cca_avaliacao_2_c">C - Mediano(qualifica-se)</option>
                                                        <option value="D" id="cca_avaliacao_2_d">D - Fraco(talvez não se qualifique)</option>
                                                        <option value="E" id="cca_avaliacao_2_e">E - Não se qualifica</option>
                                                    </select>

                                                    <h4>Equilíbrio no Critério e Discernimento</h4>
                                                    <select class="form-control" id="cca_avaliacao_3" name="cca_avaliacao_3">
                                                        <option value=" "></option>
                                                        <option value="A" id="cca_avaliacao_3_a">A - Excelente</option>
                                                        <option value="B" id="cca_avaliacao_3_b">B - Bom</option>
                                                        <option value="C" id="cca_avaliacao_3_c">C - Mediano(qualifica-se)</option>
                                                        <option value="D" id="cca_avaliacao_3_d">D - Fraco(talvez não se qualifique)</option>
                                                        <option value="E" id="cca_avaliacao_3_e">E - Não se qualifica</option>
                                                    </select>

                                                    <h4>Vigor Físico</h4>
                                                    <select class="form-control" id="cca_avaliacao_4" name="cca_avaliacao_4">
                                                        <option value=" "></option>
                                                        <option value="A" id="cca_avaliacao_4_a">A - Excelente</option>
                                                        <option value="B" id="cca_avaliacao_4_b">B - Bom</option>
                                                        <option value="C" id="cca_avaliacao_4_c">C - Mediano(qualifica-se)</option>
                                                        <option value="D" id="cca_avaliacao_4_d">D - Fraco(talvez não se qualifique)</option>
                                                        <option value="E" id="cca_avaliacao_4_e">E - Não se qualifica</option>
                                                    </select>

                                                </div>

                                                <div class="form-group">

                                                    <br />
                                                    <div class="ln_solid"></div>

                                                    <ul  class="nav navbar-right panel_toolbox">
                                                        <h4>SECRETÁRIO</h4>
                                                    </ul>

                                                    <br /><br />

                                                    <h4>Aparência Pessoal Digna</h4>
                                                    <select class="form-control" id="sec_avaliacao_1" name="sec_avaliacao_1">
                                                        <option value=" "></option>
                                                        <option value="A" id="sec_avaliacao_1_a">A - Excelente</option>
                                                        <option value="B" id="sec_avaliacao_1_b">B - Bom</option>
                                                        <option value="C" id="sec_avaliacao_1_c">C - Mediano(qualifica-se)</option>
                                                        <option value="D" id="sec_avaliacao_1_d">D - Fraco(talvez não se qualifique)</option>
                                                        <option value="E" id="sec_avaliacao_1_e">E - Não se qualifica</option>
                                                    </select>

                                                    <h4>Confiável e Organizado</h4>
                                                    <select class="form-control" id="sec_avaliacao_2" name="sec_avaliacao_2">
                                                        <option value=" "></option>
                                                        <option value="A" id="sec_avaliacao_2_a">A - Excelente</option>
                                                        <option value="B" id="sec_avaliacao_2_b">B - Bom</option>
                                                        <option value="C" id="sec_avaliacao_2_c">C - Mediano(qualifica-se)</option>
                                                        <option value="D" id="sec_avaliacao_2_d">D - Fraco(talvez não se qualifique)</option>
                                                        <option value="E" id="sec_avaliacao_2_e">E - Não se qualifica</option>
                                                    </select>

                                                    <h4>Equilíbrio no Critério e Discernimento</h4>
                                                    <select class="form-control" id="sec_avaliacao_3" name="sec_avaliacao_3">
                                                        <option value=" "></option>
                                                        <option value="A" id="sec_avaliacao_3_a">A - Excelente</option>
                                                        <option value="B" id="sec_avaliacao_3_b">B - Bom</option>
                                                        <option value="C" id="sec_avaliacao_3_c">C - Mediano(qualifica-se)</option>
                                                        <option value="D" id="sec_avaliacao_3_d">D - Fraco(talvez não se qualifique)</option>
                                                        <option value="E" id="sec_avaliacao_3_e">E - Não se qualifica</option>
                                                    </select>

                                                    <h4>Vigor Físico</h4>
                                                    <select class="form-control" id="sec_avaliacao_4" name="sec_avaliacao_4">
                                                        <option value=" "></option>
                                                        <option value="A" id="sec_avaliacao_4_a">A - Excelente</option>
                                                        <option value="B" id="sec_avaliacao_4_b">B - Bom</option>
                                                        <option value="C" id="sec_avaliacao_4_c">C - Mediano(qualifica-se)</option>
                                                        <option value="D" id="sec_avaliacao_4_d">D - Fraco(talvez não se qualifique)</option>
                                                        <option value="E" id="sec_avaliacao_4_e">E - Não se qualifica</option>
                                                    </select>

                                                </div>


                                                <div class="form-group">

                                                    <br />

                                                    <div class="ln_solid"></div>

                                                    <ul  class="nav navbar-right panel_toolbox">
                                                        <h4>SUPERINTENDENTE DE SERVIÇO</h4>
                                                    </ul>

                                                    <br /><br />

                                                    <h4>Aparência Pessoal Digna</h4>
                                                    <select class="form-control" id="ss_avaliacao_1" name="ss_avaliacao_1">
                                                        <option value=" "></option>
                                                        <option value="A" id="ss_avaliacao_1_a">A - Excelente</option>
                                                        <option value="B" id="ss_avaliacao_1_b">B - Bom</option>
                                                        <option value="C" id="ss_avaliacao_1_c">C - Mediano(qualifica-se)</option>
                                                        <option value="D" id="ss_avaliacao_1_d">D - Fraco(talvez não se qualifique)</option>
                                                        <option value="E" id="ss_avaliacao_1_e">E - Não se qualifica</option>
                                                    </select>

                                                    <h4>Confiável e Organizado</h4>
                                                    <select class="form-control" id="ss_avaliacao_2" name="ss_avaliacao_2">
                                                        <option value=" "></option>
                                                        <option value="A" id="ss_avaliacao_2_a">A - Excelente</option>
                                                        <option value="B" id="ss_avaliacao_2_b">B - Bom</option>
                                                        <option value="C" id="ss_avaliacao_2_c">C - Mediano(qualifica-se)</option>
                                                        <option value="D" id="ss_avaliacao_2_d">D - Fraco(talvez não se qualifique)</option>
                                                        <option value="E" id="ss_avaliacao_2_e">E - Não se qualifica</option>
                                                    </select>

                                                    <h4>Equilíbrio no Critério e Discernimento</h4>
                                                    <select class="form-control" id="ss_avaliacao_3" name="ss_avaliacao_3">
                                                        <option value=" "></option>
                                                        <option value="A" id="ss_avaliacao_3_a">A - Excelente</option>
                                                        <option value="B" id="ss_avaliacao_3_b">B - Bom</option>
                                                        <option value="C" id="ss_avaliacao_3_c">C - Mediano(qualifica-se)</option>
                                                        <option value="D" id="ss_avaliacao_3_d">D - Fraco(talvez não se qualifique)</option>
                                                        <option value="E" id="ss_avaliacao_3_e">E - Não se qualifica</option>
                                                    </select>

                                                    <h4>Vigor Físico</h4>
                                                    <select class="form-control" id="ss_avaliacao_4" name="ss_avaliacao_4">
                                                        <option value=" "></option>
                                                        <option value="A" id="ss_avaliacao_4_a">A - Excelente</option>
                                                        <option value="B" id="ss_avaliacao_4_b">B - Bom</option>
                                                        <option value="C" id="ss_avaliacao_4_c">C - Mediano(qualifica-se)</option>
                                                        <option value="D" id="ss_avaliacao_4_d">D - Fraco(talvez não se qualifique)</option>
                                                        <option value="E" id="ss_avaliacao_4_e">E - Não se qualifica</option>
                                                    </select>

                                                </div>

                                            </div>

                                        </div>
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

        </form>

        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>

        <!--        jQuery -->
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

        <!--        Bootstrap -->
        <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!--        FastClick -->
        <script src="../vendors/fastclick/lib/fastclick.js"></script>
        <!--        NProgress -->
        <script src="../vendors/nprogress/nprogress.js"></script>

        <!--        iCheck -->
        <script src="../vendors/iCheck/icheck.min.js"></script>

<!--        <script src="//code.jquery.com/jquery-1.10.2.js"></script>-->

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


        <!--        jQuery Tags Input -->
        <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
        <!--        Switchery -->
        <script src="../vendors/switchery/dist/switchery.min.js"></script>
        <!--        Select2 -->
        <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
        <!--        Parsley -->
        <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
        <!--        Autosize -->
        <script src="../vendors/autosize/dist/autosize.min.js"></script>
        <!--        jQuery autocomplete -->
        <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
        <!--        starrr -->
        <script src="../vendors/starrr/dist/starrr.js"></script>



        <!--        Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>



        <script src="Cadastro_Voluntarios_M001_ajax.js"></script>


        bootstrap-daterangepicker 
        <script>
            $(document).ready(function () {
                $('#cadastro').datepicker(
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










        <!-- bootstrap-daterangepicker -->
<!--        <script>
            $(document).ready(function () {
                var cb = function (start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                    $('#reportrange_right span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                };

                var optionSet1 = {
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment(),
                    minDate: '01/01/2012',
                    maxDate: '12/31/2015',
                    dateLimit: {
                        days: 60
                    },
                    showDropdowns: true,
                    showWeekNumbers: true,
                    timePicker: false,
                    timePickerIncrement: 1,
                    timePicker12Hour: true,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    opens: 'right',
                    buttonClasses: ['btn btn-default'],
                    applyClass: 'btn-small btn-primary',
                    cancelClass: 'btn-small',
                    format: 'DD/MM/YYYY',
                    separator: ' to ',
                    locale: {
                        applyLabel: 'Submit',
                        cancelLabel: 'Clear',
                        fromLabel: 'From',
                        toLabel: 'To',
                        customRangeLabel: 'Custom',
                        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        firstDay: 1
                    }
                };

                $('#reportrange_right span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

                $('#reportrange_right').daterangepicker(optionSet1, cb);

                $('#reportrange_right').on('show.daterangepicker', function () {
                    console.log("show event fired");
                });
                $('#reportrange_right').on('hide.daterangepicker', function () {
                    console.log("hide event fired");
                });
                $('#reportrange_right').on('apply.daterangepicker', function (ev, picker) {
                    console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
                });
                $('#reportrange_right').on('cancel.daterangepicker', function (ev, picker) {
                    console.log("cancel event fired");
                });

                $('#options1').click(function () {
                    $('#reportrange_right').data('daterangepicker').setOptions(optionSet1, cb);
                });

                $('#options2').click(function () {
                    $('#reportrange_right').data('daterangepicker').setOptions(optionSet2, cb);
                });

                $('#destroy').click(function () {
                    $('#reportrange_right').data('daterangepicker').remove();
                });

            });
        </script>-->

<!--        <script>
            $(document).ready(function () {
                var cb = function (start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                };

                var optionSet1 = {
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment(),
                    minDate: '01/01/2012',
                    maxDate: '12/31/2015',
                    dateLimit: {
                        days: 60
                    },
                    showDropdowns: true,
                    showWeekNumbers: true,
                    timePicker: false,
                    timePickerIncrement: 1,
                    timePicker12Hour: true,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    opens: 'left',
                    buttonClasses: ['btn btn-default'],
                    applyClass: 'btn-small btn-primary',
                    cancelClass: 'btn-small',
                    format: 'DD/MM/YYYY',
                    separator: ' to ',
                    locale: {
                        applyLabel: 'Submit',
                        cancelLabel: 'Clear',
                        fromLabel: 'From',
                        toLabel: 'To',
                        customRangeLabel: 'Custom',
                        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        firstDay: 1
                    }
                };
                $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
                $('#reportrange').daterangepicker(optionSet1, cb);
                $('#reportrange').on('show.daterangepicker', function () {
                    console.log("show event fired");
                });
                $('#reportrange').on('hide.daterangepicker', function () {
                    console.log("hide event fired");
                });
                $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
                    console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
                });
                $('#reportrange').on('cancel.daterangepicker', function (ev, picker) {
                    console.log("cancel event fired");
                });
                $('#options1').click(function () {
                    $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
                });
                $('#options2').click(function () {
                    $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
                });
                $('#destroy').click(function () {
                    $('#reportrange').data('daterangepicker').remove();
                });
            });
        </script>-->

<!--        <script>
            $(document).ready(function () {
                $('#single_cal1').daterangepicker({
                    singleDatePicker: true,
                    calender_style: "picker_1"
                }, function (start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                });
                $('#single_cal2').daterangepicker({
                    singleDatePicker: true,
                    calender_style: "picker_2"
                }, function (start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                });
                $('#single_cal3').daterangepicker({
                    singleDatePicker: true,
                    calender_style: "picker_3"
                }, function (start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                });
                $('#single_cal4').daterangepicker({
                    singleDatePicker: true,
                    calender_style: "picker_4"
                }, function (start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                });
            });
        </script>

        <script>
            $(document).ready(function () {
                $('#reservation').daterangepicker(null, function (start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                });
            });
        </script>-->
        <!-- /bootstrap-daterangepicker -->

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

        <!-- Cropper -->
        <script>
            $(document).ready(function () {
                var $image = $('#image');
                var $download = $('#download');
                var $dataX = $('#dataX');
                var $dataY = $('#dataY');
                var $dataHeight = $('#dataHeight');
                var $dataWidth = $('#dataWidth');
                var $dataRotate = $('#dataRotate');
                var $dataScaleX = $('#dataScaleX');
                var $dataScaleY = $('#dataScaleY');
                var options = {
                    aspectRatio: 16 / 9,
                    preview: '.img-preview',
                    crop: function (e) {
                        $dataX.val(Math.round(e.x));
                        $dataY.val(Math.round(e.y));
                        $dataHeight.val(Math.round(e.height));
                        $dataWidth.val(Math.round(e.width));
                        $dataRotate.val(e.rotate);
                        $dataScaleX.val(e.scaleX);
                        $dataScaleY.val(e.scaleY);
                    }
                };


                // Tooltip
                $('[data-toggle="tooltip"]').tooltip();


                // Cropper
                $image.on({
                    'build.cropper': function (e) {
                        console.log(e.type);
                    },
                    'built.cropper': function (e) {
                        console.log(e.type);
                    },
                    'cropstart.cropper': function (e) {
                        console.log(e.type, e.action);
                    },
                    'cropmove.cropper': function (e) {
                        console.log(e.type, e.action);
                    },
                    'cropend.cropper': function (e) {
                        console.log(e.type, e.action);
                    },
                    'crop.cropper': function (e) {
                        console.log(e.type, e.x, e.y, e.width, e.height, e.rotate, e.scaleX, e.scaleY);
                    },
                    'zoom.cropper': function (e) {
                        console.log(e.type, e.ratio);
                    }
                }).cropper(options);


                // Buttons
                if (!$.isFunction(document.createElement('canvas').getContext)) {
                    $('button[data-method="getCroppedCanvas"]').prop('disabled', true);
                }

                if (typeof document.createElement('cropper').style.transition === 'undefined') {
                    $('button[data-method="rotate"]').prop('disabled', true);
                    $('button[data-method="scale"]').prop('disabled', true);
                }


                // Download
                if (typeof $download[0].download === 'undefined') {
                    $download.addClass('disabled');
                }


                // Options
                $('.docs-toggles').on('change', 'input', function () {
                    var $this = $(this);
                    var name = $this.attr('name');
                    var type = $this.prop('type');
                    var cropBoxData;
                    var canvasData;

                    if (!$image.data('cropper')) {
                        return;
                    }

                    if (type === 'checkbox') {
                        options[name] = $this.prop('checked');
                        cropBoxData = $image.cropper('getCropBoxData');
                        canvasData = $image.cropper('getCanvasData');

                        options.built = function () {
                            $image.cropper('setCropBoxData', cropBoxData);
                            $image.cropper('setCanvasData', canvasData);
                        };
                    } else if (type === 'radio') {
                        options[name] = $this.val();
                    }

                    $image.cropper('destroy').cropper(options);
                });


                // Methods
                $('.docs-buttons').on('click', '[data-method]', function () {
                    var $this = $(this);
                    var data = $this.data();
                    var $target;
                    var result;

                    if ($this.prop('disabled') || $this.hasClass('disabled')) {
                        return;
                    }

                    if ($image.data('cropper') && data.method) {
                        data = $.extend({}, data); // Clone a new one

                        if (typeof data.target !== 'undefined') {
                            $target = $(data.target);

                            if (typeof data.option === 'undefined') {
                                try {
                                    data.option = JSON.parse($target.val());
                                } catch (e) {
                                    console.log(e.message);
                                }
                            }
                        }

                        result = $image.cropper(data.method, data.option, data.secondOption);

                        switch (data.method) {
                            case 'scaleX':
                            case 'scaleY':
                                $(this).data('option', -data.option);
                                break;

                            case 'getCroppedCanvas':
                                if (result) {

                                    // Bootstrap's Modal
                                    $('#getCroppedCanvasModal').modal().find('.modal-body').html(result);

                                    if (!$download.hasClass('disabled')) {
                                        $download.attr('href', result.toDataURL());
                                    }
                                }

                                break;
                        }

                        if ($.isPlainObject(result) && $target) {
                            try {
                                $target.val(JSON.stringify(result));
                            } catch (e) {
                                console.log(e.message);
                            }
                        }

                    }
                });

                // Keyboard
                $(document.body).on('keydown', function (e) {
                    if (!$image.data('cropper') || this.scrollTop > 300) {
                        return;
                    }

                    switch (e.which) {
                        case 37:
                            e.preventDefault();
                            $image.cropper('move', -1, 0);
                            break;

                        case 38:
                            e.preventDefault();
                            $image.cropper('move', 0, -1);
                            break;

                        case 39:
                            e.preventDefault();
                            $image.cropper('move', 1, 0);
                            break;

                        case 40:
                            e.preventDefault();
                            $image.cropper('move', 0, 1);
                            break;
                    }
                });

                // Import image
                var $inputImage = $('#inputImage');
                var URL = window.URL || window.webkitURL;
                var blobURL;

                if (URL) {
                    $inputImage.change(function () {
                        var files = this.files;
                        var file;

                        if (!$image.data('cropper')) {
                            return;
                        }

                        if (files && files.length) {
                            file = files[0];

                            if (/^image\/\w+$/.test(file.type)) {
                                blobURL = URL.createObjectURL(file);
                                $image.one('built.cropper', function () {

                                    // Revoke when load complete
                                    URL.revokeObjectURL(blobURL);
                                }).cropper('reset').cropper('replace', blobURL);
                                $inputImage.val('');
                            } else {
                                window.alert('Please choose an image file.');
                            }
                        }
                    });
                } else {
                    $inputImage.prop('disabled', true).parent().addClass('disabled');
                }
            });
        </script>
        <!-- /Cropper -->





        <!-- bootstrap-wysiwyg -->
        <script>
            $(document).ready(function () {
                function initToolbarBootstrapBindings() {
                    var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                        'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                        'Times New Roman', 'Verdana'
                    ],
                            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
                    $.each(fonts, function (idx, fontName) {
                        fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
                    });
                    $('a[title]').tooltip({
                        container: 'body'
                    });
                    $('.dropdown-menu input').click(function () {
                        return false;
                    })
                            .change(function () {
                                $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                            })
                            .keydown('esc', function () {
                                this.value = '';
                                $(this).change();
                            });

                    $('[data-role=magic-overlay]').each(function () {
                        var overlay = $(this),
                                target = $(overlay.data('target'));
                        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
                    });

                    if ("onwebkitspeechchange" in document.createElement("input")) {
                        var editorOffset = $('#editor').offset();

                        $('.voiceBtn').css('position', 'absolute').offset({
                            top: editorOffset.top,
                            left: editorOffset.left + $('#editor').innerWidth() - 35
                        });
                    } else {
                        $('.voiceBtn').hide();
                    }
                }

                function showErrorAlert(reason, detail) {
                    var msg = '';
                    if (reason === 'unsupported-file-type') {
                        msg = "Unsupported format " + detail;
                    } else {
                        console.log("error uploading file", reason, detail);
                    }
                    $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
                }

                initToolbarBootstrapBindings();

                $('#editor').wysiwyg({
                    fileUploadError: showErrorAlert
                });

                window.prettyPrint;
                prettyPrint();
            });
        </script>
        <!-- /bootstrap-wysiwyg -->


        <!-- Select2 -->
        <script>
            $(document).ready(function () {
                $(".select2_single").select2({
                    placeholder: "Select a state",
                    allowClear: true
                });
                $(".select2_group").select2({});
                $(".select2_multiple").select2({
                    maximumSelectionLength: 4,
                    placeholder: "With Max Selection limit 4",
                    allowClear: true
                });
            });
        </script>
        <!-- /Select2 -->



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



        <!-- Parsley -->
        <script>
            $(document).ready(function () {
                $.listen('parsley:field:validate', function () {
                    validateFront();
                });
                $('#demo-form .btn').on('click', function () {
                    $('#demo-form').parsley().validate();
                    validateFront();
                });
                var validateFront = function () {
                    if (true === $('#demo-form').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };
            });

            $(document).ready(function () {
                $.listen('parsley:field:validate', function () {
                    validateFront();
                });
                $('#demo-form2 .btn').on('click', function () {
                    $('#demo-form2').parsley().validate();
                    validateFront();
                });
                var validateFront = function () {
                    if (true === $('#demo-form2').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };
            });
            try {
                hljs.initHighlightingOnLoad();
            } catch (err) {
            }
        </script>
        <!-- /Parsley -->



        <!-- Autosize -->
        <script>
            $(document).ready(function () {
                autosize($('.resizable_textarea'));
            });
        </script>
        <!-- /Autosize -->




        <!-- jQuery autocomplete -->
        <script>
            $(document).ready(function () {
                var countries = {AD: "Andorra", A2: "Andorra Test", AE: "United Arab Emirates", AF: "Afghanistan", AG: "Antigua and Barbuda", AI: "Anguilla", AL: "Albania", AM: "Armenia", AN: "Netherlands Antilles", AO: "Angola", AQ: "Antarctica", AR: "Argentina", AS: "American Samoa", AT: "Austria", AU: "Australia", AW: "Aruba", AX: "Åland Islands", AZ: "Azerbaijan", BA: "Bosnia and Herzegovina", BB: "Barbados", BD: "Bangladesh", BE: "Belgium", BF: "Burkina Faso", BG: "Bulgaria", BH: "Bahrain", BI: "Burundi", BJ: "Benin", BL: "Saint Barthélemy", BM: "Bermuda", BN: "Brunei", BO: "Bolivia", BQ: "British Antarctic Territory", BR: "Brazil", BS: "Bahamas", BT: "Bhutan", BV: "Bouvet Island", BW: "Botswana", BY: "Belarus", BZ: "Belize", CA: "Canada", CC: "Cocos [Keeling] Islands", CD: "Congo - Kinshasa", CF: "Central African Republic", CG: "Congo - Brazzaville", CH: "Switzerland", CI: "Côte d’Ivoire", CK: "Cook Islands", CL: "Chile", CM: "Cameroon", CN: "China", CO: "Colombia", CR: "Costa Rica", CS: "Serbia and Montenegro", CT: "Canton and Enderbury Islands", CU: "Cuba", CV: "Cape Verde", CX: "Christmas Island", CY: "Cyprus", CZ: "Czech Republic", DD: "East Germany", DE: "Germany", DJ: "Djibouti", DK: "Denmark", DM: "Dominica", DO: "Dominican Republic", DZ: "Algeria", EC: "Ecuador", EE: "Estonia", EG: "Egypt", EH: "Western Sahara", ER: "Eritrea", ES: "Spain", ET: "Ethiopia", FI: "Finland", FJ: "Fiji", FK: "Falkland Islands", FM: "Micronesia", FO: "Faroe Islands", FQ: "French Southern and Antarctic Territories", FR: "France", FX: "Metropolitan France", GA: "Gabon", GB: "United Kingdom", GD: "Grenada", GE: "Georgia", GF: "French Guiana", GG: "Guernsey", GH: "Ghana", GI: "Gibraltar", GL: "Greenland", GM: "Gambia", GN: "Guinea", GP: "Guadeloupe", GQ: "Equatorial Guinea", GR: "Greece", GS: "South Georgia and the South Sandwich Islands", GT: "Guatemala", GU: "Guam", GW: "Guinea-Bissau", GY: "Guyana", HK: "Hong Kong SAR China", HM: "Heard Island and McDonald Islands", HN: "Honduras", HR: "Croatia", HT: "Haiti", HU: "Hungary", ID: "Indonesia", IE: "Ireland", IL: "Israel", IM: "Isle of Man", IN: "India", IO: "British Indian Ocean Territory", IQ: "Iraq", IR: "Iran", IS: "Iceland", IT: "Italy", JE: "Jersey", JM: "Jamaica", JO: "Jordan", JP: "Japan", JT: "Johnston Island", KE: "Kenya", KG: "Kyrgyzstan", KH: "Cambodia", KI: "Kiribati", KM: "Comoros", KN: "Saint Kitts and Nevis", KP: "North Korea", KR: "South Korea", KW: "Kuwait", KY: "Cayman Islands", KZ: "Kazakhstan", LA: "Laos", LB: "Lebanon", LC: "Saint Lucia", LI: "Liechtenstein", LK: "Sri Lanka", LR: "Liberia", LS: "Lesotho", LT: "Lithuania", LU: "Luxembourg", LV: "Latvia", LY: "Libya", MA: "Morocco", MC: "Monaco", MD: "Moldova", ME: "Montenegro", MF: "Saint Martin", MG: "Madagascar", MH: "Marshall Islands", MI: "Midway Islands", MK: "Macedonia", ML: "Mali", MM: "Myanmar [Burma]", MN: "Mongolia", MO: "Macau SAR China", MP: "Northern Mariana Islands", MQ: "Martinique", MR: "Mauritania", MS: "Montserrat", MT: "Malta", MU: "Mauritius", MV: "Maldives", MW: "Malawi", MX: "Mexico", MY: "Malaysia", MZ: "Mozambique", NA: "Namibia", NC: "New Caledonia", NE: "Niger", NF: "Norfolk Island", NG: "Nigeria", NI: "Nicaragua", NL: "Netherlands", NO: "Norway", NP: "Nepal", NQ: "Dronning Maud Land", NR: "Nauru", NT: "Neutral Zone", NU: "Niue", NZ: "New Zealand", OM: "Oman", PA: "Panama", PC: "Pacific Islands Trust Territory", PE: "Peru", PF: "French Polynesia", PG: "Papua New Guinea", PH: "Philippines", PK: "Pakistan", PL: "Poland", PM: "Saint Pierre and Miquelon", PN: "Pitcairn Islands", PR: "Puerto Rico", PS: "Palestinian Territories", PT: "Portugal", PU: "U.S. Miscellaneous Pacific Islands", PW: "Palau", PY: "Paraguay", PZ: "Panama Canal Zone", QA: "Qatar", RE: "Réunion", RO: "Romania", RS: "Serbia", RU: "Russia", RW: "Rwanda", SA: "Saudi Arabia", SB: "Solomon Islands", SC: "Seychelles", SD: "Sudan", SE: "Sweden", SG: "Singapore", SH: "Saint Helena", SI: "Slovenia", SJ: "Svalbard and Jan Mayen", SK: "Slovakia", SL: "Sierra Leone", SM: "San Marino", SN: "Senegal", SO: "Somalia", SR: "Suriname", ST: "São Tomé and Príncipe", SU: "Union of Soviet Socialist Republics", SV: "El Salvador", SY: "Syria", SZ: "Swaziland", TC: "Turks and Caicos Islands", TD: "Chad", TF: "French Southern Territories", TG: "Togo", TH: "Thailand", TJ: "Tajikistan", TK: "Tokelau", TL: "Timor-Leste", TM: "Turkmenistan", TN: "Tunisia", TO: "Tonga", TR: "Turkey", TT: "Trinidad and Tobago", TV: "Tuvalu", TW: "Taiwan", TZ: "Tanzania", UA: "Ukraine", UG: "Uganda", UM: "U.S. Minor Outlying Islands", US: "United States", UY: "Uruguay", UZ: "Uzbekistan", VA: "Vatican City", VC: "Saint Vincent and the Grenadines", VD: "North Vietnam", VE: "Venezuela", VG: "British Virgin Islands", VI: "U.S. Virgin Islands", VN: "Vietnam", VU: "Vanuatu", WF: "Wallis and Futuna", WK: "Wake Island", WS: "Samoa", YD: "People's Democratic Republic of Yemen", YE: "Yemen", YT: "Mayotte", ZA: "South Africa", ZM: "Zambia", ZW: "Zimbabwe", ZZ: "Unknown or Invalid Region"};

                var countriesArray = $.map(countries, function (value, key) {
                    return {
                        value: value,
                        data: key
                    };
                });

                // initialize autocomplete with custom appendTo
                $('#autocomplete-custom-append').autocomplete({
                    lookup: countriesArray
                });
            });
        </script>
        <!-- /jQuery autocomplete -->



        <!-- Starrr -->
        <script>
            $(document).ready(function () {
                $(".stars").starrr();

                $('.stars-existing').starrr({
                    rating: 4
                });

                $('.stars').on('starrr:change', function (e, value) {
                    $('.stars-count').html(value);
                });

                $('.stars-existing').on('starrr:change', function (e, value) {
                    $('.stars-count-existing').html(value);
                });
            });
        </script>
        <!-- /Starrr -->








    </body>
</html>