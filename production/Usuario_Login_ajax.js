//$(document).ready(function() {
//    
//   alert("create");
//} );

src = "../../assets/js/libs/jquery-ui/jquery-ui.min.js"


$('#btnCancelar').click(function () {
    window.open('Alterar_Excluir_Voluntario_C001.php', '_self');
});

$('#btnLogin').click(function () {
    
    
    var senha = '';
    //alert('1');

    senha = $('#senha').val();
    alert(senha);
    
    
//    var senha='';
//    senha=$("#senha").val();
    
//    if (senha=='12345') {
//        window.open('index.php', '_self');
//    } else window.open('Erro_email.php', '_self');
    
    acao = $("#acao").val();
    
//    var acao = '';
//    var x1 = 'editar';
//    var x2 = 'novo';
//    acao = $("#acao").val();
//    if (acao == x1) {
//        acao = 'salvarEditar';
//        $("#acao").attr("value", acao);
//
//    } else if (acao == x2) {
//        acao = 'salvarNovo';
//        $("#acao").attr("value", acao);
//    }
        
    
});



$(document).ready(function ()
{
    var senha = '';
    //alert('1');

    senha = $('#senha').val();
    alert(senha);
    
    // Requisição Ajax para Busca dados do Registro
    
//    $.ajax({
//        type: 'post',
//        url: 'Usuario_Login_ajax.php',
//        data: {acao: "editar", codigo: codigo},
//        success: function (json) {
//            // Transforma o JSON recebido em um objeto
//            var data = JSON.parse(json);
//            // Atribui valor aos campos com o objeto recebido
//            $("#codigo").attr("value", codigo);
//            $("#nome").attr("value", data.nome);
//            $("#email").attr("value", data.email);
//            $("#telefone_1").attr("value", data.telefone_1);
//            $("#telefone_2").attr("value", data.telefone_2);
//            
//            $("#cadastro").attr("value", data.cadastro);
//            
//            $("#congregacao").attr("value", data.congregacao);
//            $("#circuito").attr("value", data.circuito);
//
//            $("#sabado_qtd").attr("value", data.sabado_qtd);
//            $("#domingo_qtd").attr("value", data.domingo_qtd);
//            
//            if(data.circuito == 'A'){ $("#circuito_a").prop('selected', true);} 
//            if(data.circuito == 'B'){ $("#circuito_b").prop('selected', true);}   
//            if(data.circuito == 'C'){ $("#circuito_c").prop('selected', true);}   
//            
//            $privilegio_1=data.privilegio.indexOf("A");
//            if($privilegio_1>=0){ $("#privilegio_1").prop('checked', true);}   
//
//            $privilegio_2=data.privilegio.indexOf("S");
//            if($privilegio_2>=0){ $("#privilegio_2").prop('checked', true);}   
//            
//            $privilegio_3=data.privilegio.indexOf("P");
//            if($privilegio_3>=0){ $("#privilegio_3").prop('checked', true);}   
//            
//            //$("#treinamento_s").attr("value", data.treinamento);
//            if(data.treinamento == 'S'){ $("#treinamento_s").prop('selected', true);} 
//            if(data.treinamento == 'N'){ $("#treinamento_n").prop('selected', true);}   
//
//            if(data.escalado == 'S'){ $("#escalado_s").prop('selected', true);} 
//            if(data.escalado == 'N'){ $("#escalado_n").prop('selected', true);}   
//            
//            if(data.sc_avaliacao_1 == 'A'){ $("#sc_avaliacao_1_a").prop('selected', true);} 
//            if(data.sc_avaliacao_1 == 'B'){ $("#sc_avaliacao_1_b").prop('selected', true);} 
//            if(data.sc_avaliacao_1 == 'C'){ $("#sc_avaliacao_1_c").prop('selected', true);} 
//            if(data.sc_avaliacao_1 == 'D'){ $("#sc_avaliacao_1_d").prop('selected', true);} 
//            if(data.sc_avaliacao_1 == 'E'){ $("#sc_avaliacao_1_e").prop('selected', true);} 
//
//            if(data.sc_avaliacao_2 == 'A'){ $("#sc_avaliacao_2_a").prop('selected', true);} 
//            if(data.sc_avaliacao_2 == 'B'){ $("#sc_avaliacao_2_b").prop('selected', true);} 
//            if(data.sc_avaliacao_2 == 'C'){ $("#sc_avaliacao_2_c").prop('selected', true);} 
//            if(data.sc_avaliacao_2 == 'D'){ $("#sc_avaliacao_2_d").prop('selected', true);} 
//            if(data.sc_avaliacao_2 == 'E'){ $("#sc_avaliacao_2_e").prop('selected', true);} 
//
//            if(data.sc_avaliacao_3 == 'A'){ $("#sc_avaliacao_3_a").prop('selected', true);} 
//            if(data.sc_avaliacao_3 == 'B'){ $("#sc_avaliacao_3_b").prop('selected', true);} 
//            if(data.sc_avaliacao_3 == 'C'){ $("#sc_avaliacao_3_c").prop('selected', true);} 
//            if(data.sc_avaliacao_3 == 'D'){ $("#sc_avaliacao_3_d").prop('selected', true);} 
//            if(data.sc_avaliacao_3 == 'E'){ $("#sc_avaliacao_3_e").prop('selected', true);} 
//
//            if(data.sc_avaliacao_4 == 'A'){ $("#sc_avaliacao_4_a").prop('selected', true);} 
//            if(data.sc_avaliacao_4 == 'B'){ $("#sc_avaliacao_4_b").prop('selected', true);} 
//            if(data.sc_avaliacao_4 == 'C'){ $("#sc_avaliacao_4_c").prop('selected', true);} 
//            if(data.sc_avaliacao_4 == 'D'){ $("#sc_avaliacao_4_d").prop('selected', true);} 
//            if(data.sc_avaliacao_4 == 'E'){ $("#sc_avaliacao_4_e").prop('selected', true);} 
//            
//            if(data.cca_avaliacao_1 == 'A'){ $("#cca_avaliacao_1_a").prop('selected', true);} 
//            if(data.cca_avaliacao_1 == 'B'){ $("#cca_avaliacao_1_b").prop('selected', true);} 
//            if(data.cca_avaliacao_1 == 'C'){ $("#cca_avaliacao_1_c").prop('selected', true);} 
//            if(data.cca_avaliacao_1 == 'D'){ $("#cca_avaliacao_1_d").prop('selected', true);} 
//            if(data.cca_avaliacao_1 == 'E'){ $("#cca_avaliacao_1_e").prop('selected', true);} 
//                    
//            if(data.cca_avaliacao_2 == 'A'){ $("#cca_avaliacao_2_a").prop('selected', true);} 
//            if(data.cca_avaliacao_2 == 'B'){ $("#cca_avaliacao_2_b").prop('selected', true);} 
//            if(data.cca_avaliacao_2 == 'C'){ $("#cca_avaliacao_2_c").prop('selected', true);} 
//            if(data.cca_avaliacao_2 == 'D'){ $("#cca_avaliacao_2_d").prop('selected', true);} 
//            if(data.cca_avaliacao_2 == 'E'){ $("#cca_avaliacao_2_e").prop('selected', true);} 
//                    
//            if(data.cca_avaliacao_3 == 'A'){ $("#cca_avaliacao_3_a").prop('selected', true);} 
//            if(data.cca_avaliacao_3 == 'B'){ $("#cca_avaliacao_3_b").prop('selected', true);} 
//            if(data.cca_avaliacao_3 == 'C'){ $("#cca_avaliacao_3_c").prop('selected', true);} 
//            if(data.cca_avaliacao_3 == 'D'){ $("#cca_avaliacao_3_d").prop('selected', true);} 
//            if(data.cca_avaliacao_3 == 'E'){ $("#cca_avaliacao_3_e").prop('selected', true);} 
//                    
//            if(data.cca_avaliacao_4 == 'A'){ $("#cca_avaliacao_4_a").prop('selected', true);} 
//            if(data.cca_avaliacao_4 == 'B'){ $("#cca_avaliacao_4_b").prop('selected', true);} 
//            if(data.cca_avaliacao_4 == 'C'){ $("#cca_avaliacao_4_c").prop('selected', true);} 
//            if(data.cca_avaliacao_4 == 'D'){ $("#cca_avaliacao_4_d").prop('selected', true);} 
//            if(data.cca_avaliacao_4 == 'E'){ $("#cca_avaliacao_4_e").prop('selected', true);} 
//
//
//            if(data.sec_avaliacao_1 == 'A'){ $("#sec_avaliacao_1_a").prop('selected', true);} 
//            if(data.sec_avaliacao_1 == 'B'){ $("#sec_avaliacao_1_b").prop('selected', true);} 
//            if(data.sec_avaliacao_1 == 'C'){ $("#sec_avaliacao_1_c").prop('selected', true);} 
//            if(data.sec_avaliacao_1 == 'D'){ $("#sec_avaliacao_1_d").prop('selected', true);} 
//            if(data.sec_avaliacao_1 == 'E'){ $("#sec_avaliacao_1_e").prop('selected', true);} 
//                                                  
//            if(data.sec_avaliacao_2 == 'A'){ $("#sec_avaliacao_2_a").prop('selected', true);} 
//            if(data.sec_avaliacao_2 == 'B'){ $("#sec_avaliacao_2_b").prop('selected', true);} 
//            if(data.sec_avaliacao_2 == 'C'){ $("#sec_avaliacao_2_c").prop('selected', true);} 
//            if(data.sec_avaliacao_2 == 'D'){ $("#sec_avaliacao_2_d").prop('selected', true);} 
//            if(data.sec_avaliacao_2 == 'E'){ $("#sec_avaliacao_2_e").prop('selected', true);} 
//                                                  
//            if(data.sec_avaliacao_3 == 'A'){ $("#sec_avaliacao_3_a").prop('selected', true);} 
//            if(data.sec_avaliacao_3 == 'B'){ $("#sec_avaliacao_3_b").prop('selected', true);} 
//            if(data.sec_avaliacao_3 == 'C'){ $("#sec_avaliacao_3_c").prop('selected', true);} 
//            if(data.sec_avaliacao_3 == 'D'){ $("#sec_avaliacao_3_d").prop('selected', true);} 
//            if(data.sec_avaliacao_3 == 'E'){ $("#sec_avaliacao_3_e").prop('selected', true);} 
//                                                  
//            if(data.sec_avaliacao_4 == 'A'){ $("#sec_avaliacao_4_a").prop('selected', true);} 
//            if(data.sec_avaliacao_4 == 'B'){ $("#sec_avaliacao_4_b").prop('selected', true);} 
//            if(data.sec_avaliacao_4 == 'C'){ $("#sec_avaliacao_4_c").prop('selected', true);} 
//            if(data.sec_avaliacao_4 == 'D'){ $("#sec_avaliacao_4_d").prop('selected', true);} 
//            if(data.sec_avaliacao_4 == 'E'){ $("#sec_avaliacao_4_e").prop('selected', true);} 
//            
//            
//            if(data.ss_avaliacao_1 == 'A'){ $("#ss_avaliacao_1_a").prop('selected', true);} 
//            if(data.ss_avaliacao_1 == 'B'){ $("#ss_avaliacao_1_b").prop('selected', true);} 
//            if(data.ss_avaliacao_1 == 'C'){ $("#ss_avaliacao_1_c").prop('selected', true);} 
//            if(data.ss_avaliacao_1 == 'D'){ $("#ss_avaliacao_1_d").prop('selected', true);} 
//            if(data.ss_avaliacao_1 == 'E'){ $("#ss_avaliacao_1_e").prop('selected', true);} 
//                                                 
//            if(data.ss_avaliacao_2 == 'A'){ $("#ss_avaliacao_2_a").prop('selected', true);} 
//            if(data.ss_avaliacao_2 == 'B'){ $("#ss_avaliacao_2_b").prop('selected', true);} 
//            if(data.ss_avaliacao_2 == 'C'){ $("#ss_avaliacao_2_c").prop('selected', true);} 
//            if(data.ss_avaliacao_2 == 'D'){ $("#ss_avaliacao_2_d").prop('selected', true);} 
//            if(data.ss_avaliacao_2 == 'E'){ $("#ss_avaliacao_2_e").prop('selected', true);} 
//                                                 
//            if(data.ss_avaliacao_3 == 'A'){ $("#ss_avaliacao_3_a").prop('selected', true);} 
//            if(data.ss_avaliacao_3 == 'B'){ $("#ss_avaliacao_3_b").prop('selected', true);} 
//            if(data.ss_avaliacao_3 == 'C'){ $("#ss_avaliacao_3_c").prop('selected', true);} 
//            if(data.ss_avaliacao_3 == 'D'){ $("#ss_avaliacao_3_d").prop('selected', true);} 
//            if(data.ss_avaliacao_3 == 'E'){ $("#ss_avaliacao_3_e").prop('selected', true);} 
//                                                 
//            if(data.ss_avaliacao_4 == 'A'){ $("#ss_avaliacao_4_a").prop('selected', true);} 
//            if(data.ss_avaliacao_4 == 'B'){ $("#ss_avaliacao_4_b").prop('selected', true);} 
//            if(data.ss_avaliacao_4 == 'C'){ $("#ss_avaliacao_4_c").prop('selected', true);} 
//            if(data.ss_avaliacao_4 == 'D'){ $("#ss_avaliacao_4_d").prop('selected', true);} 
//            if(data.ss_avaliacao_4 == 'E'){ $("#ss_avaliacao_4_e").prop('selected', true);} 
//
//            $segunda_a=data.segunda.indexOf("A");
//            if($segunda_a>=0){ $("#segunda_a").prop('checked', true);}   
//
//            $segunda_b=data.segunda.indexOf("B");
//            if($segunda_b>=0){ $("#segunda_b").prop('checked', true);}   
//            
//            $segunda_c=data.segunda.indexOf("C");
//            if($segunda_c>=0){ $("#segunda_c").prop('checked', true);}   
//
//            $segunda_d=data.segunda.indexOf("D");
//            if($segunda_d>=0){ $("#segunda_d").prop('checked', true);}   
//
//            $segunda_e=data.segunda.indexOf("E");
//            if($segunda_e>=0){ $("#segunda_e").prop('checked', true);}   
//            
//            $segunda_f=data.segunda.indexOf("F");
//            if($segunda_f>=0){ $("#segunda_f").prop('checked', true);}   
//
//
//            $terca_a=data.terca.indexOf("A");
//            if($terca_a>=0){ $("#terca_a").prop('checked', true);}   
//
//            $terca_b=data.terca.indexOf("B");
//            if($terca_b>=0){ $("#terca_b").prop('checked', true);}   
//            
//            $terca_c=data.terca.indexOf("C");
//            if($terca_c>=0){ $("#terca_c").prop('checked', true);}   
//
//            $terca_d=data.terca.indexOf("D");
//            if($terca_d>=0){ $("#terca_d").prop('checked', true);}   
//
//            $terca_e=data.terca.indexOf("E");
//            if($terca_e>=0){ $("#terca_e").prop('checked', true);}   
//            
//            $terca_f=data.terca.indexOf("F");
//            if($terca_f>=0){ $("#terca_f").prop('checked', true);}   
//
//
//            $quarta_a=data.quarta.indexOf("A");
//            if($quarta_a>=0){ $("#quarta_a").prop('checked', true);}   
//
//            $quarta_b=data.quarta.indexOf("B");
//            if($quarta_b>=0){ $("#quarta_b").prop('checked', true);}   
//            
//            $quarta_c=data.quarta.indexOf("C");
//            if($quarta_c>=0){ $("#quarta_c").prop('checked', true);}   
//
//            $quarta_d=data.quarta.indexOf("D");
//            if($quarta_d>=0){ $("#quarta_d").prop('checked', true);}   
//
//            $quarta_e=data.quarta.indexOf("E");
//            if($quarta_e>=0){ $("#quarta_e").prop('checked', true);}   
//            
//            $quarta_f=data.quarta.indexOf("F");
//            if($quarta_f>=0){ $("#quarta_f").prop('checked', true);}   
//
//
//            $quinta_a=data.quinta.indexOf("A");
//            if($quinta_a>=0){ $("#quinta_a").prop('checked', true);}   
//
//            $quinta_b=data.quinta.indexOf("B");
//            if($quinta_b>=0){ $("#quinta_b").prop('checked', true);}   
//            
//            $quinta_c=data.quinta.indexOf("C");
//            if($quinta_c>=0){ $("#quinta_c").prop('checked', true);}   
//
//            $quinta_d=data.quinta.indexOf("D");
//            if($quinta_d>=0){ $("#quinta_d").prop('checked', true);}   
//
//            $quinta_e=data.quinta.indexOf("E");
//            if($quinta_e>=0){ $("#quinta_e").prop('checked', true);}   
//            
//            $quinta_f=data.quinta.indexOf("F");
//            if($quinta_f>=0){ $("#quinta_f").prop('checked', true);}   
//
//
//            $sexta_a=data.sexta.indexOf("A");
//            if($sexta_a>=0){ $("#sexta_a").prop('checked', true);}   
//
//            $sexta_b=data.sexta.indexOf("B");
//            if($sexta_b>=0){ $("#sexta_b").prop('checked', true);}   
//            
//            $sexta_c=data.sexta.indexOf("C");
//            if($sexta_c>=0){ $("#sexta_c").prop('checked', true);}   
//
//            $sexta_d=data.sexta.indexOf("D");
//            if($sexta_d>=0){ $("#sexta_d").prop('checked', true);}   
//
//            $sexta_e=data.sexta.indexOf("E");
//            if($sexta_e>=0){ $("#sexta_e").prop('checked', true);}   
//            
//            $sexta_f=data.sexta.indexOf("F");
//            if($sexta_f>=0){ $("#sexta_f").prop('checked', true);}   
//
//
//            $sabado_a=data.sabado.indexOf("A");
//            if($sabado_a>=0){ $("#sabado_a").prop('checked', true);}   
//
//            $sabado_b=data.sabado.indexOf("B");
//            if($sabado_b>=0){ $("#sabado_b").prop('checked', true);}   
//            
//            $sabado_c=data.sabado.indexOf("C");
//            if($sabado_c>=0){ $("#sabado_c").prop('checked', true);}   
//
//            $sabado_d=data.sabado.indexOf("D");
//            if($sabado_d>=0){ $("#sabado_d").prop('checked', true);}   
//
//            $sabado_e=data.sabado.indexOf("E");
//            if($sabado_e>=0){ $("#sabado_e").prop('checked', true);}   
//            
//            $sabado_f=data.sabado.indexOf("F");
//            if($sabado_f>=0){ $("#sabado_f").prop('checked', true);}   
//
//
//            $domingo_a=data.domingo.indexOf("A");
//            if($domingo_a>=0){ $("#domingo_a").prop('checked', true);}   
//
//            $domingo_b=data.domingo.indexOf("B");
//            if($domingo_b>=0){ $("#domingo_b").prop('checked', true);}   
//            
//            $domingo_c=data.domingo.indexOf("C");
//            if($domingo_c>=0){ $("#domingo_c").prop('checked', true);}   
//
//            $domingo_d=data.domingo.indexOf("D");
//            if($domingo_d>=0){ $("#domingo_d").prop('checked', true);}   
//
//            $domingo_e=data.domingo.indexOf("E");
//            if($domingo_e>=0){ $("#domingo_e").prop('checked', true);}   
//            
//            $domingo_f=data.domingo.indexOf("F");
//            if($domingo_f>=0){ $("#domingo_f").prop('checked', true);}   
//            
//            
//
//        }
//    });

});

