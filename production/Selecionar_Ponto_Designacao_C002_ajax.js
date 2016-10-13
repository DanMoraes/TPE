//src = "../../assets/js/libs/jquery-ui/jquery-ui.min.js"

//session_start();


open = function(verb, url, data, target) {
  var form = document.createElement("form");
  form.action = url;
  form.method = verb;
  form.target = target || "_self";
  if (data) {
    for (var key in data) {
      var input = document.createElement("textarea");
      input.name = key;
      input.value = typeof data[key] === "object" ? JSON.stringify(data[key]) : data[key];
      form.appendChild(input);
    }
  }
  form.style.display = 'none';
  document.body.appendChild(form);
  form.submit();
};


$('#datatable-ponto').DataTable({    
    "destroy": true,
    "dom": 'lCfrtip',
    "serverSide": false,
    //"ajax" : 'Selecionar_Ponto_Designacao_C002_ajax.php',
    "ajax" :{
        "url": 'Selecionar_Ponto_Designacao_C002_ajax.php',
        "type": 'POST',
        "data":{
            "codigo_ponto": $("#codigo_ponto").val()
        }
    },
    "columns": [
        { "searchable": true },
        null,
        null,        
        null
    ],
    
    "colVis": {
        "buttonText": "Colunas",
        "overlayFade": 0,
        "align": "right"
    },
    "language": {
        "lengthMenu": '',
        "search": ' <i class="fa fa-search"></i> ',
        "paginate": {
            "previous": '<i class="fa fa-angle-left"></i>',
            "next": '<i class="fa fa-angle-right"></i>'
        },
        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
        "zeroRecords": "Nenhum registro encontrado com esses parâmetros",
        "loadingRecords": "Carregando...",
        "processing": "Processando...",
        "infoFiltered": ""
    }

});

$('#datatable-ponto tbody').on('click', 'tr', function () {
    
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            $('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    
    
    
    
    
//    /****************************
//     * SELECIONA APENAS UMA LINHA*/
//      if ( $(this).hasClass('selected') ) {
//     $(this).removeClass('selected');
//     }
//     else {
//     $('tr.selected').removeClass('selected');
//     $(this).addClass('selected');
//     }/****************************/
//    /**$(this).toggleClass('selected');//MULTISELEÇÃO*/
    
    
    
    
});



//$(document).ready(function() {
//    var table = $('#datatable-voluntarios').DataTable();
// 
//    $('#datatable-voluntarios tbody').on( 'click', 'tr', function () {
//        if ( $(this).hasClass('selected') ) {
//            $(this).removeClass('selected');
//        }
//        else {
//            table.$('tr.selected').removeClass('selected');
//            $(this).addClass('selected');
//        }
//    } );
// 
//    $('#button').click( function () {
//        table.row('.selected').remove().draw( false );
//    } );
//} );




$('#btnEditar').click(function(){
    var tabela = $('#datatable-ponto').DataTable(); //pega a tabela pelo ID
    var Valores = [];
    var rowData = tabela.rows('.selected').data();
    var codigo_ponto = '';
    var data_designacao = '';
    var periodo = '';
    data_designacao=$('#data_designacao').val();
    periodo=$('#periodo').val();
    codigo_ponto = $('#codigo_ponto').val();
    

//    var teste;
    
    $.each($(rowData),function(key,value){
        Valores.push(value[3]); //"name" being the value of your first column.
        data_designacao=value[0];
    });

    //console.log(data_designacao);
       
    if (Valores[0]>0) {    
        open('POST', 'Cadastro_Designacao_M001.php', {codigo:Valores[0],acao:'editar',codigo_ponto:codigo_ponto,data_designacao:data_designacao,periodo:periodo}, '_self');
    }
    else{
        alert('Nenhum Ponto Selecionado');con
    }
    
        
});


$('#btnNovo').click(function(){
    var codigo_ponto = '';
    var data_designacao = '';
    var periodo = '';
    data_designacao=$('#data_designacao').val();
    periodo=$('#periodo').val();
    
    codigo_ponto = $('#codigo_ponto').val();
    
    if (periodo == ' ') {
        alert('O Período Não Foi Selecionado');con    
    }
    
    if (data_designacao>'') {
       open('POST', 'Cadastro_Designacao_M001.php', {codigo:0,acao:'novo',codigo_ponto:codigo_ponto,data_designacao:data_designacao,periodo:periodo}, '_self');        
    }
    else {
       alert('A Data de Designação Não Foi Digitada');con    
    }
});

$('#btnExcluir').click(function(){
    var tabela = $('#datatable-ponto').DataTable(); //pega a tabela pelo ID
    var Valores = [];
    var rowData = tabela.rows('.selected').data();
    
    $.each($(rowData),function(key,value){
        Valores.push(value[3]); //"name" being the value of your first column.
    });
    if (Valores[0]>0) {
        open('POST', 'Cadastro_Designacao_M001_ajax.php', {codigo:Valores[0],acao:'excluir'}, '_self');
    }
    else{
        alert('Nenhuma Designação Selecionada');con
    }
});                       



$('#btnFiltrar').click(function(){
    var tabela = $('#datatable-ponto').DataTable(); //pega a tabela pelo ID
    var Valores = [];
    var rowData = tabela.rows('.selected').data();
//    var teste;
    var codigo_ponto = 0;
    
    $.each($(rowData),function(key,value){
        Valores.push(value[2]); //"name" being the value of your first column.
    });
   
    codigo_ponto=Valores[0];
    //alert(codigo_ponto);
    
    
    if (Valores[0]>0) {    
        open('POST', 'Alterar_Excluir_Voluntario_Ponto_C001.php', {codigo_ponto:codigo_ponto,acao:'filtrar'}, '_self');
    }
    else{
        alert('Nenhuma Designação Selecionada');con
    }
    
        
});




