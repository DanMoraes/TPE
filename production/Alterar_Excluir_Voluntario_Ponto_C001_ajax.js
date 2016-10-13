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

var codigo_ponto=0;
codigo_ponto=$('#codigo_ponto').val();

$('#datatable-ponto-voluntario').DataTable({   
    "destroy": true,
    "dom": 'lCfrtip',
    "serverSide": false,
    ajax:({
        type:'POST', 
        url:'Alterar_Excluir_Voluntario_Ponto_C001_ajax.php', 
        datatype:"json", 
        data:{acao: "filtrar", codigo_ponto: codigo_ponto}
    }),
    
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

$('#datatable-ponto-voluntario tbody').on('click', 'tr', function () {
    
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
    var tabela = $('#datatable-ponto-voluntario').DataTable(); //pega a tabela pelo ID
    var Valores = [];
    var rowData = tabela.rows('.selected').data();
    var codigo_ponto = '';
    codigo_ponto = $('#codigo_ponto').val();

//    var teste;
    
    $.each($(rowData),function(key,value){
        Valores.push(value[3]); //"name" being the value of your first column.
    });
   
    
    if (Valores[0]>0) {    
        open('POST', 'Cadastro_Voluntario_Ponto_M001.php', {codigo:Valores[0],acao:'editar',codigo_ponto:codigo_ponto}, '_self');
    }
    else{
        alert('Nenhum Ponto Selecionado');con
    }
    
        
});



$('#btnNovo').click(function(){
    var codigo_ponto = '';
    codigo_ponto = $('#codigo_ponto').val();
   
    open('POST', 'Cadastro_Voluntario_Ponto_M001.php', {codigo:0,acao:'novo',codigo_ponto:codigo_ponto}, '_self');
});


$('#btnExcluir').click(function(){
    var tabela = $('#datatable-ponto-voluntario').DataTable(); //pega a tabela pelo ID
    var Valores = [];
    var rowData = tabela.rows('.selected').data();

    var codigo_ponto = '';
    codigo_ponto = $('#codigo_ponto').val();
    //console.log(codigo_ponto);
    $.each($(rowData),function(key,value){
        Valores.push(value[3]); //"name" being the value of your first column.
    });
    if (Valores[0]>0) {
        open('POST', 'Cadastro_Voluntario_Ponto_M001_ajax.php', {codigo:Valores[0],acao:'excluir',codigo_ponto:codigo_ponto}, '_self');
    }
    else{
        alert('Nenhum Ponto Selecionado');con
    }
});                       



