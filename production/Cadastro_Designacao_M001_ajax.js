//$(document).ready(function() {
//    
//   alert("create");
//} );

src = "../../assets/js/libs/jquery-ui/jquery-ui.min.js"

var codigo_ponto=0;
codigo_ponto=$('#codigo_ponto').val();

var periodo='';
periodo=$('#periodo').val();

var data_designacao='';
data_designacao=$('#data_designacao').val();


$('#btnCancelar').click(function () {
    var codigo = 0;
//    var codigo_ponto = '';
    var acao = '';
//    codigo_ponto = $('#codigo_ponto').val();
//    codigo = $('#codigo').val();
    
    //open('POST', 'Alterar_Excluir_Voluntario_Ponto_C001.php', {codigo:codigo,acao:'',codigo_ponto:codigo_ponto}, '_self');
    window.open('Selecionar_Ponto_Designacao_C001.php', '_self');
});

$('#btnSalvar').click(function () {
//    var codigo_ponto = '';

    
    var acao = '';
    var x1 = 'editar';
    var x2 = 'novo';
//    codigo_ponto = $('#codigo_ponto').val();
    acao = $("#acao").val();
   
    if (acao == x1) {
        acao = 'salvarEditar';
        $("#acao").attr("value", acao);

    } else if (acao == x2) {
        acao = 'salvarNovo';
        $("#acao").attr("value", acao);
    }
});


$(document).ready(function ()
{
    var codigo = 0;
    //alert('1');

    codigo = $('#codigo').val();
    //alert(codigo);
    // Requisição Ajax para Busca dados do Registro
    $.ajax({
        type:'POST', 
        url:'Cadastro_Designacao_M001_ajax.php', 
        datatype:"json", 
        data: {acao: "editar", codigo: codigo, codigo_ponto: codigo_ponto, data_designacao:data_designacao, periodo:periodo},
        success: function (json) {
            // Transforma o JSON recebido em um objeto
            var data = JSON.parse(json);
            // Atribui valor aos campos com o objeto recebido
            
            $("#codigo").attr("value", codigo);   
            $("#codigo_ponto").attr("value", codigo_ponto);
            $("#data").attr("value", data_designacao);
            $("#periodo").attr("value", periodo);
            
            $("#codigo_voluntario_1").attr("value", data.codigo_voluntario_1);
            $("#codigo_voluntario_2").attr("value", data.codigo_voluntario_2);            
            $("#codigo_voluntario_3").attr("value", data.codigo_voluntario_3);

            $("#codigo_substituto_1").attr("value", data.codigo_substituto_1);
            $("#codigo_substituto_2").attr("value", data.codigo_substituto_2);            
            $("#codigo_substituto_3").attr("value", data.codigo_substituto_3);
            

        }
    });

});

