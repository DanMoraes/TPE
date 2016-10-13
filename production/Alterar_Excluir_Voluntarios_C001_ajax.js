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
    "ajax" : 'Alterar_Excluir_Voluntarios_C001_ajax.php',
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



$('#btnEditar').click(function(){
    var tabela = $('#datatable-voluntarios').DataTable(); //pega a tabela pelo ID
    var Valores = [];
    var rowData = tabela.rows('.selected').data();
//    var teste;
    
    $.each($(rowData),function(key,value){
        Valores.push(value[0]); //"name" being the value of your first column.
    });
    
    if (Valores[0]>0) {    
        open('POST', 'Cadastro_Voluntarios_M001.php', {codigo:Valores[0],acao:'editar'}, '_self');
    }
    else{
        alert('Nenhum Voluntário Selecionado');con
    }
        
});


$('#btnNovo').click(function(){
   
    open('POST', 'Cadastro_Voluntarios_M001.php', {codigo:0,acao:'novo'}, '_self');
});


$('#btnExcluir').click(function(){
    var tabela = $('#datatable-voluntarios').DataTable(); //pega a tabela pelo ID
    var Valores = [];
    var rowData = tabela.rows('.selected').data();
    
    $.each($(rowData),function(key,value){
        Valores.push(value[0]); //"name" being the value of your first column.
    });
    if (Valores[0]>0) {
        open('POST', 'Cadastro_Voluntarios_M001_ajax.php', {codigo:Valores[0],acao:'excluir'}, '_self');
    }
    else{
        alert('Nenhum Voluntário Selecionado');con
    }
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

