//$(document).ready(function() {
//    
//   alert("create");
//} );

src = "../../assets/js/libs/jquery-ui/jquery-ui.min.js"


var codigo_ponto=0;
codigo_ponto=$('#codigo_ponto').val();


$('#btnCancelar').click(function () {
    var codigo = 0;
//    var codigo_ponto = '';
    var acao = '';
//    codigo_ponto = $('#codigo_ponto').val();
//    codigo = $('#codigo').val();
    
    //open('POST', 'Alterar_Excluir_Voluntario_Ponto_C001.php', {codigo:codigo,acao:'',codigo_ponto:codigo_ponto}, '_self');
    window.open('Selecionar_Ponto_C001.php', '_self');
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
        url:'Cadastro_Voluntario_Ponto_M001_ajax.php', 
        datatype:"json", 
        data: {acao: "editar", codigo: codigo, codigo_ponto: codigo_ponto},
        success: function (json) {
            // Transforma o JSON recebido em um objeto
            var data = JSON.parse(json);
            // Atribui valor aos campos com o objeto recebido
            $("#codigo_ponto").attr("value", codigo_ponto);
            $("#codigo_voluntario").attr("value", data.codigo_voluntario);
            $("#codigo").attr("value", codigo);            

            if(data.periodo == 'M'){ $("#periodo_a").prop('selected', true);} 
            if(data.periodo == 'T'){ $("#periodo_b").prop('selected', true);}   
            if(data.periodo == 'N'){ $("#periodo_c").prop('selected', true);}   
            
            $dia_semana_a=data.dia_semana.indexOf("A");
            if($dia_semana_a>=0){ $("#dia_semana_a").prop('checked', true);}   

            $dia_semana_b=data.dia_semana.indexOf("B");
            if($dia_semana_b>=0){ $("#dia_semana_b").prop('checked', true);}   
            
            $dia_semana_c=data.dia_semana.indexOf("C");
            if($dia_semana_c>=0){ $("#dia_semana_c").prop('checked', true);}   

            $dia_semana_d=data.dia_semana.indexOf("D");
            if($dia_semana_d>=0){ $("#dia_semana_d").prop('checked', true);}   

            $dia_semana_e=data.dia_semana.indexOf("E");
            if($dia_semana_e>=0){ $("#dia_semana_e").prop('checked', true);}   
            
            $dia_semana_f=data.dia_semana.indexOf("F");
            if($dia_semana_f>=0){ $("#dia_semana_f").prop('checked', true);}   

            $dia_semana_g=data.dia_semana.indexOf("G");
            if($dia_semana_g>=0){ $("#dia_semana_g").prop('checked', true);}   
            

        }
    });

});

