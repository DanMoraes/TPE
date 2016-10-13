//src = "../../assets/js/libs/jquery-ui/jquery-ui.min.js"


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



$('#datatable-voluntarios').DataTable({    
    "destroy": true,
    "dom": 'lCfrtip',
    "serverSide": false,
    "ajax" : 'Rel_Voluntarios_C001_ajax.php',
    "columns": [
        { "searchable": true },
        null,
        null,
        null,
        null,
        null,
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

$('#datatable-voluntarios tbody').on('click', 'tr', function () {
    
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









//$('#btnListaProprietario').click(function(){
//    $('#datatable_proprietario').DataTable().ajax.reload();
//});



$('#btnImprimir').click(function(){
    var tabela = $('#datatable-voluntarios').DataTable(); //pega a tabela pelo ID
    var Valores = [];
    var rowData = tabela.rows('.selected').data();
    var dias_sim_nao='';
    var segunda='';
    var terca='';
    var quarta='';
    var quinta='';
    var sexta='';
    var sabado='';
    var domingo='';
    var semana='';
    //    var teste;


    dias_sim_nao='N';
    if ( $("#dias_sim_nao").prop('checked') ) {
        dias_sim_nao='S';
    } 

    if ( $("#segunda").prop('checked') ) {
        segunda='A';
    } 

    if ( $("#terca").prop('checked') ) {
        terca='B';
    } 

    if ( $("#quarta").prop('checked') ) {
        quarta='C';
    } 

    if ( $("#quinta").prop('checked') ) {
        quinta='D';
    } 
    
    if ( $("#sexta").prop('checked') ) {
        sexta='E';
    } 

    if ( $("#sabado").prop('checked') ) {
        sabado='F';
    } 

    if ( $("#domingo").prop('checked') ) {
        domingo='G';
    } 
    
    semana=segunda+terca+quarta+quinta+sexta+sabado+domingo;
    
    $.each($(rowData),function(key,value){
        Valores.push(value[0]); //"name" being the value of your first column.
    });
    
    
    open('POST', 'Rel_Voluntarios.php', {codigo:Valores[0],acao:'Escalado',dias:dias_sim_nao,dia_semana:semana}, '_new');
    
    
//    if ($dias_sim_nao) {
//        open('POST', 'rel_Voluntarios.php', {codigo:Valores[0],acao:'Escalado',dias:'S'}, '_new');
//    } else {
//        open('POST', 'rel_Voluntarios.php', {codigo:Valores[0],acao:'Escalado',dias:'N'}, '_new');
//    }
    
        
});


$('#btnImprimir_T').click(function(){
    var dias_sim_nao='';
    var segunda='';
    var terca='';
    var quarta='';
    var quinta='';
    var sexta='';
    var sabado='';
    var domingo='';
    var semana='';
    
    if ( $("#segunda").prop('checked') ) {
        segunda='A';
    } 

    if ( $("#terca").prop('checked') ) {
        terca='B';
    } 

    if ( $("#quarta").prop('checked') ) {
        quarta='C';
    } 

    if ( $("#quinta").prop('checked') ) {
        quinta='D';
    } 
    
    if ( $("#sexta").prop('checked') ) {
        sexta='E';
    } 

    if ( $("#sabado").prop('checked') ) {
        sabado='F';
    } 

    if ( $("#domingo").prop('checked') ) {
        domingo='G';
    } 
    
    semana=segunda+terca+quarta+quinta+sexta+sabado+domingo;
    

    dias_sim_nao='N';
    if ( $("#dias_sim_nao").prop('checked') ) {
        dias_sim_nao='S';
    }
    
    
   
    open('POST', 'Rel_Voluntarios.php', {codigo:0,acao:'Todos',dias:dias_sim_nao,dia_semana:semana}, '_new');
});


              



$('#btnEnviarEmails').click(function () {

    var tabela = $('#datatable-voluntarios').DataTable(); //pega a tabela pelo ID
    var Valores = [];
    var rowData = tabela.rows('.selected').data();

    $.each($(rowData), function (key, value) {
        Valores.push(value["CODIGO"]); //"name" being the value of your first column.
    });

});

//    if (Valores.length <= 0) {
//        $('#alertaModal').modal('show')
//    } else {
//        window.location.href = "selecao_proprietarios.php?valores=" + Valores;
//    }
//});

