//$(document).ready(function() {
//    
//   alert("create");
//} );

src = "../../assets/js/libs/jquery-ui/jquery-ui.min.js"


$('#btnCancelar').click(function () {
    window.open('Alterar_Excluir_Ponto_C001.php', '_self');
});

$('#btnSalvar').click(function () {
    var acao = '';
    var x1 = 'editar';
    var x2 = 'novo';
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
        type: 'post',
        url: 'Cadastro_Ponto_M001_ajax.php',
        data: {acao: "editar", codigo: codigo},
        success: function (json) {
            // Transforma o JSON recebido em um objeto
            var data = JSON.parse(json);
            // Atribui valor aos campos com o objeto recebido
            $("#ponto").attr("value", data.ponto);
            $("#nome_ponto").attr("value", data.nome_ponto);
            $("#codigo").attr("value", codigo);            
           

        }
    });

});

