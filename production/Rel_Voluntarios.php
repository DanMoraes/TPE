

<?php

        
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//include ('../../conexao/conexao_fb.php');
//$con = new conecta_bd();

function formataData($data) {
    $i = explode('/', $data);
    $out = $i[1] . '/' . $i[0] . '/' . $i[2];
    return $out;
}

if (isset($_POST['acao'])) {
    $acao = $_POST['acao']; 
    //echo $acao;
} else
    exit;

if (isset($_POST['dias'])) {
    $dias = $_POST['dias'];
    //echo $acao;
} else
    exit;

if (isset($_POST['dia_semana'])) {
    $dia_semana = $_POST['dia_semana'];
    //echo $acao;
} else
    exit;

include 'conexao.php';


    $condicao = '';
    $filtro = '';
    $resultado = explode("A", $dia_semana);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $condicao = " AND ( (v.SEGUNDA <> '') AND (v.SEGUNDA <> 'F') )";
        $filtro = 'Segunda';
    }

    $resultado = explode("B", $dia_semana);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        
        $separador = ' AND ';
        if ($condicao > '') {
            $separador = ' OR ';
            $filtro = $filtro . ',';
        }
        $condicao = $condicao . $separador . " ( (v.TERCA <> '')  AND (v.TERCA <> 'F') )";
        $filtro = $filtro . 'Terça';
        
    }

    $quarta = '';
    $resultado = explode("C", $dia_semana);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = ' AND ';
        if ($condicao > '') {
            $separador = ' OR ';
            $filtro = $filtro . ',';
        }
        $condicao = $condicao . $separador . " ( (v.QUARTA <> '')  AND (v.QUARTA <> 'F') )";
        $filtro = $filtro . 'Quarta';

    }
    
    $quinta = '';
    $resultado = explode("D", $dia_semana);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = ' AND ';
        if ($condicao > '') {
            $separador = ' OR ';
            $filtro = $filtro . ',';
        }
        $condicao = $condicao . $separador . " ( (v.QUINTA <> '')  AND (v.QUINTA <> 'F') )";
        $filtro = $filtro . 'Quinta';

    }
    
    $sexta = '';
    $resultado = explode("E", $dia_semana);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = ' AND ';
        if ($condicao > '') {
            $separador = ' OR ';
            $filtro = $filtro . ',';
        }
        $condicao = $condicao . $separador . " ( (v.SEXTA <> '')  AND (v.SEXTA <> 'F') )";
        $filtro = $filtro . 'Sexta';

    }
    
    $sabado = '';
    $resultado = explode("F", $dia_semana);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = ' AND ';
        if ($condicao > '') {
            $separador = ' OR ';
            $filtro = $filtro . ',';
        }
        $condicao = $condicao . $separador . " ( (v.SABADO <> '')  AND (v.SABADO <> 'F') )";
        $filtro = $filtro . 'Sábado';

    }

    $domingo = '';
    $resultado = explode("G", $dia_semana);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = ' AND ';
        if ($condicao > '') {
            $separador = ' OR ';
            $filtro = $filtro . ',';
        }
        $condicao = $condicao . $separador . " ( (v.DOMINGO <> '')  AND (v.DOMINGO <> 'F') )";
        $filtro = $filtro . 'Domingo';

    }

        if ($filtro > '') {
            $filtro = ' - Seleção : (' . $filtro . ')';
        }


if ($acao == 'Escalado') {

   
    $sql = "SELECT v.NOME,
                v.EMAIL,
                v.TELEFONE_1,
                v.TELEFONE_2,
                v.CONGREGACAO,
                v.SEGUNDA,
                v.TERCA,
                v.QUARTA,
                v.QUINTA,
                v.SEXTA,
                v.SABADO,
                v.DOMINGO,
                v.SABADO_QTD,
                v.DOMINGO_QTD
         FROM voluntarios v
         left join pontos_voluntarios pv on (pv.CODIGO_VOLUNTARIO=v.CODIGO) 
         WHERE (COALESCE(pv.CODIGO_VOLUNTARIO,0)=0)".$condicao."   
         ORDER BY v.NOME";


    $sth = $db->prepare($sql);
    //$sth->bindParam(':ESCALADO', $escalado, PDO::PARAM_STR);
}

if ($acao == 'Todos') {

    $sql = "SELECT v.NOME,
                v.EMAIL,
                v.TELEFONE_1,
                v.TELEFONE_2,
                v.CONGREGACAO,
                v.SEGUNDA,
                v.TERCA,
                v.QUARTA,
                v.QUINTA,
                v.SEXTA,
                v.SABADO,
                v.DOMINGO,
                v.SABADO_QTD,
                v.DOMINGO_QTD
         FROM voluntarios v
         WHERE (1=1)" .$condicao."  
         ORDER BY v.NOME";


    $sth = $db->prepare($sql);
}



//$sql =  "SELECT v.NOME,
//                v.EMAIL,
//                v.TELEFONE_1,
//                v.TELEFONE_2,
//                v.CONGREGACAO
//         FROM voluntarios v
//         WHERE ((v.ESCALADO=:ESCALADO))
//         ORDER BY v.NOME";
//
//
//$sth =$db->prepare($sql);
//$sth->bindParam(':ESCALADO', $escalado, PDO::PARAM_STR);



try {
    $sth->execute();
} catch (PDOException $e) {
    echo json_encode(array(
        "error" => "erro na execução do sql: " . $e->getMessage()
    ));
    exit(0);
}

//echo 'breno - <br>';
//$row=$sth->fetch(PDO::FETCH_OBJ);  
//   echo $row->CODIGO; 
//while ($row=$sth->fetch(PDO::FETCH_OBJ)) { 
//   echo $row->IMOVEL .'-' ; 
//} 
//$row = $sth->fetch(PDO::FETCH_OBJ);
//echo    $row->EMPRESA.'';
//echo    $row->IMOVEL.'';
//echo    $row->SEQUENCIA.'';
//echo    $row->PARCELA.'';
//exit;
include('mpdf/mpdf.php');
$mpdf = new mPDF();
$mpdf->SetDisplayMode('fullpage');
//$css = file_get_contents("../../../assets/css/theme-default/relatorios.css");
$mpdf->WriteHTML($css, 1);





$pagina = 0;

$html_tracado = '';
$html_tracado = $html_tracado .
        '<table border="0" width="100%" align="right" class="pontilhado">
            <tbody>
                <tr>
                    <td width="100%">_____________________________________________________________________________________________________________________________________________________________' . '</td>
            </tbody>                
        </table>';


$html_qtd_voluntarios = '';
$html_dias_disponiveis = '';



while ($row = $sth->fetch(PDO::FETCH_OBJ)) {


//    
//    $html_qtd_voluntarios=$html_qtd_voluntarios.
//        '<table border="1" width="100%" align="center">
//            <tbody>
//                <tr>
//                    <td WIDTH="30%"> '.utf8_encode($row->nome).' </td>
//                    <td WIDTH="20%"> '.$row->email.' </td>
//                    <td WIDTH="20%" align="left"> '.$row->telefone_1.' </td>
//                    <td WIDTH="20%" align="left"> '.$row->telefone_2.' </td>
//                    <td WIDTH="10%" align="left"> '.$row->congregacao.' </td>
//                </tr>
//            </tbody>
//        </table>';

    $dia_segunda = '';
    $texto = $row->SEGUNDA;
    $resultado = explode("A", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $dia_segunda = 'M';
    }

    $resultado = explode("B", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_segunda > '') {
            $separador = ' / ';
        }
        $dia_segunda = $dia_segunda . $separador . 'T';
    }

    $resultado = explode("C", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_segunda > '') {
            $separador = ' / ';
        }
        $dia_segunda = $dia_segunda . $separador . 'N';
    }

    $resultado = explode("D", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_segunda > '') {
            $separador = ' / ';
        }
        $dia_segunda = $dia_segunda . $separador . 'MD';
    }

    $resultado = explode("E", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_segunda > '') {
            $separador = ' / ';
        }
        $dia_segunda = $dia_segunda . $separador . 'DI';
    }
    $resultado = explode("F", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_segunda > '') {
            $separador = ' / ';
        }
        $dia_segunda = $dia_segunda . $separador . 'ND';
    }

    $dia_terca = '';
    $texto = $row->TERCA;
    $resultado = explode("A", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $dia_terca = 'M';
    }

    $resultado = explode("B", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_terca > '') {
            $separador = ' / ';
        }
        $dia_terca = $dia_terca . $separador . 'T';
    }

    $resultado = explode("C", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_terca > '') {
            $separador = ' / ';
        }
        $dia_terca = $dia_terca . $separador . 'N';
    }

    $resultado = explode("D", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_terca > '') {
            $separador = ' / ';
        }
        $dia_terca = $dia_terca . $separador . 'MD';
    }

    $resultado = explode("E", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_terca > '') {
            $separador = ' / ';
        }
        $dia_terca = $dia_terca . $separador . 'DI';
    }
    $resultado = explode("F", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_terca > '') {
            $separador = ' / ';
        }
        $dia_terca = $dia_terca . $separador . 'ND';
    }
    
    $dia_quarta = '';
    $texto = $row->QUARTA;
    $resultado = explode("A", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $dia_quarta = 'M';
    }

    $resultado = explode("B", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_quarta > '') {
            $separador = ' / ';
        }
        $dia_quarta = $dia_quarta . $separador . 'T';
    }

    $resultado = explode("C", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_quarta > '') {
            $separador = ' / ';
        }
        $dia_quarta = $dia_quarta . $separador . 'N';
    }

    $resultado = explode("D", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_quarta > '') {
            $separador = ' / ';
        }
        $dia_quarta = $dia_quarta . $separador . 'MD';
    }

    $resultado = explode("E", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_quarta > '') {
            $separador = ' / ';
        }
        $dia_quarta = $dia_quarta . $separador . 'DI';
    }
    $resultado = explode("F", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_quarta > '') {
            $separador = ' / ';
        }
        $dia_quarta = $dia_quarta . $separador . 'ND';
    }    

    $dia_quinta = '';
    $texto = $row->QUINTA;
    $resultado = explode("A", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $dia_quinta = 'M';
    }

    $resultado = explode("B", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_quinta > '') {
            $separador = ' / ';
        }
        $dia_quinta = $dia_quinta . $separador . 'T';
    }

    $resultado = explode("C", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_quinta > '') {
            $separador = ' / ';
        }
        $dia_quinta = $dia_quinta . $separador . 'N';
    }

    $resultado = explode("D", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_quinta > '') {
            $separador = ' / ';
        }
        $dia_quinta = $dia_quinta . $separador . 'MD';
    }

    $resultado = explode("E", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_quinta > '') {
            $separador = ' / ';
        }
        $dia_quinta = $dia_quinta . $separador . 'DI';
    }
    $resultado = explode("F", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_quinta > '') {
            $separador = ' / ';
        }
        $dia_quinta = $dia_quinta . $separador . 'ND';
    }

    $dia_sexta = '';
    $texto = $row->SEXTA;
    $resultado = explode("A", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $dia_sexta = 'M';
    }

    $resultado = explode("B", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_sexta > '') {
            $separador = ' / ';
        }
        $dia_sexta = $dia_sexta . $separador . 'T';
    }

    $resultado = explode("C", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_sexta > '') {
            $separador = ' / ';
        }
        $dia_sexta = $dia_sexta . $separador . 'N';
    }

    $resultado = explode("D", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_sexta > '') {
            $separador = ' / ';
        }
        $dia_sexta = $dia_sexta . $separador . 'MD';
    }

    $resultado = explode("E", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_sexta > '') {
            $separador = ' / ';
        }
        $dia_sexta = $dia_sexta . $separador . 'DI';
    }
    $resultado = explode("F", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_sexta > '') {
            $separador = ' / ';
        }
        $dia_sexta = $dia_sexta . $separador . 'ND';
    }

    $dia_sabado = '';
    $texto = $row->SABADO;
    $resultado = explode("A", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $dia_sabado = 'M';
    }

    $resultado = explode("B", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_sabado > '') {
            $separador = ' / ';
        }
        $dia_sabado = $dia_sabado . $separador . 'T';
    }

    $resultado = explode("C", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_sabado > '') {
            $separador = ' / ';
        }
        $dia_sabado = $dia_sabado . $separador . 'N';
    }

    $resultado = explode("D", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_sabado > '') {
            $separador = ' / ';
        }
        $dia_sabado = $dia_sabado . $separador . 'MD';
    }

    $resultado = explode("E", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_sabado > '') {
            $separador = ' / ';
        }
        $dia_sabado = $dia_sabado . $separador . 'DI';
    }
    $resultado = explode("F", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_sabado > '') {
            $separador = ' / ';
        }
        $dia_sabado = $dia_sabado . $separador . 'ND';
    }    
    
    $dia_domingo = '';
    $texto = $row->DOMINGO;
    $resultado = explode("A", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $dia_domingo = 'M';
    }

    $resultado = explode("B", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_domingo > '') {
            $separador = ' / ';
        }
        $dia_domingo = $dia_domingo . $separador . 'T';
    }

    $resultado = explode("C", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_domingo > '') {
            $separador = ' / ';
        }
        $dia_domingo = $dia_domingo . $separador . 'N';
    }

    $resultado = explode("D", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_domingo > '') {
            $separador = ' / ';
        }
        $dia_domingo = $dia_domingo . $separador . 'MD';
    }

    $resultado = explode("E", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_domingo > '') {
            $separador = ' / ';
        }
        $dia_domingo = $dia_domingo . $separador . 'DI';
    }
    
    $resultado = explode("F", $texto);
    if (count($resultado) > 1) { //aqui significa que ele "explodiu", se não tivesse "explodido" o comprimento do array seria 0, ok?
        $separador = '';
        if ($dia_domingo > '') {
            $separador = ' / ';
        }
        $dia_domingo = $dia_domingo . $separador . 'ND';
    }    
    
    $texto = $row->SABADO_QTD;
    $sabado_qtd='';
        if ($texto > '') {
            $sabado_qtd = $texto;
        }
    
    $texto = $row->DOMINGO_QTD;
    $domingo_qtd='';
        if ($texto > '') {
            $domingo_qtd = $texto;
        }
        
    $html_sabado_domingo='';    
    
    if (($sabado_qtd > '') or ($domingo_qtd > '')) {        
        
        $html_sabado_domingo = $html_sabado_domingo .
        '<table border="0" width="100%" align="center">
            <tbody>
                <tr>
                    <td WIDTH="14%" align="center">  </td>
                    <td WIDTH="14%" align="center">  </td>
                    <td WIDTH="14%" align="center">  </td>
                    <td WIDTH="14%" align="center">  </td>
                    <td WIDTH="14%" align="center">  </td>
                    <td WIDTH="14%" align="center"> ' . $sabado_qtd . ' </td>
                    <td WIDTH="14%" align="center"> ' . $domingo_qtd . ' </td>
                </tr>
            </tbody>
        </table>';
            
    }
        
    $html_disponibilidade='';    
    
    if ($dias=='S') {
        $html_disponibilidade = $html_disponibilidade . 
        '<table border="0" width="100%" align="center">
            <tbody>
                <tr>
                    <td WIDTH="100%" align="center"> DISPONIBILIDADE </td>
                </tr>
            </tbody>
        </table>        
        <table border="0" width="100%" align="center">
            <tbody>
                <tr>
                    <td WIDTH="14%" align="center"> Segunda </td>
                    <td WIDTH="14%" align="center"> Terça </td>
                    <td WIDTH="14%" align="center"> Quarta </td>
                    <td WIDTH="14%" align="center"> Quinta </td>
                    <td WIDTH="14%" align="center"> Sexta </td>
                    <td WIDTH="14%" align="center"> Sábado </td>
                    <td WIDTH="14%" align="center"> Domingo </td>
                    
                </tr>
            </tbody>
        </table>
        <table border="0" width="100%" align="center">
            <tbody>
                <tr>
                    <td WIDTH="14%" align="center"> ' . $dia_segunda . ' </td>
                    <td WIDTH="14%" align="center"> ' . $dia_terca . ' </td>
                    <td WIDTH="14%" align="center"> ' . $dia_quarta . ' </td>
                    <td WIDTH="14%" align="center"> ' . $dia_quinta . ' </td>
                    <td WIDTH="14%" align="center"> ' . $dia_sexta . ' </td>
                    <td WIDTH="14%" align="center"> ' . $dia_sabado . ' </td>
                    <td WIDTH="14%" align="center"> ' . $dia_domingo . ' </td>
                    
                </tr>
            </tbody>
        </table>' .$html_sabado_domingo . $html_tracado;                
                
    }
         
            
    $html_qtd_voluntarios = $html_qtd_voluntarios .
            '<table border="0" width="100%" align="center">
            <tbody>
                <tr>
                    <td WIDTH="30%"> ' . $row->NOME . ' </td>
                    <td WIDTH="30%"> ' . $row->EMAIL . ' </td>
                    <td WIDTH="20%"> ' . $row->TELEFONE_1 . ' </td>
                    <td WIDTH="20%"> ' . $row->TELEFONE_2 . ' </td>
                </tr>
            </tbody>
        </table>
        <table border="0" width="100%" align="center">
            <tbody>
                <tr>
                    <td WIDTH="100%">  </td>
                </tr>
            </tbody>
        </table>'.$html_disponibilidade;        
        
//        '<table border="0" width="100%" align="center">
//            <tbody>
//                <tr>
//                    <td WIDTH="100%" align="center"> DISPONIBILIDADE </td>
//                </tr>
//            </tbody>
//        </table>        
//        <table border="0" width="100%" align="center">
//            <tbody>
//                <tr>
//                    <td WIDTH="14%" align="center"> Segunda </td>
//                    <td WIDTH="14%" align="center"> Terça </td>
//                    <td WIDTH="14%" align="center"> Quarta </td>
//                    <td WIDTH="14%" align="center"> Quinta </td>
//                    <td WIDTH="14%" align="center"> Sexta </td>
//                    <td WIDTH="14%" align="center"> Sábado </td>
//                    <td WIDTH="14%" align="center"> Domingo </td>
//                    
//                </tr>
//            </tbody>
//        </table>
//        <table border="0" width="100%" align="center">
//            <tbody>
//                <tr>
//                    <td WIDTH="14%" align="center"> ' . $dia_segunda . ' </td>
//                    <td WIDTH="14%" align="center"> ' . $dia_terca . ' </td>
//                    <td WIDTH="14%" align="center"> ' . $dia_quarta . ' </td>
//                    <td WIDTH="14%" align="center"> ' . $dia_quinta . ' </td>
//                    <td WIDTH="14%" align="center"> ' . $dia_sexta . ' </td>
//                    <td WIDTH="14%" align="center"> ' . $dia_sabado . ' </td>
//                    <td WIDTH="14%" align="center"> ' . $dia_domingo . ' </td>
//                    
//                </tr>
//            </tbody>
//        </table>' .$html_sabado_domingo . $html_tracado;
    
}





//    if ($pagina<>$row->X){
//        $pagina=$row->X;
//        $sqlSocios ="   SELECT PRP.COD_CLI,
//                                PRP.NOME_CLI,
//                                PRP.DESCR_F_PAGTO,
//                                PRP.NOME_BANCO,
//                                PRP.BANCO,
//                                PRP.AGENCIA,
//                                PRP.DIGITO,
//                                PRP.FAVORECIDO,
//                                PRP.CONTA_CORRENTE,
//                                PRP.DIG_CONTA,
//                                PRP.PARTICIPACAO,
//                                PRP.TIPO_CONTA,
//                                PRP.DESCR_TIPO_CONTA,
//                                PRP.FORMA_PAGTO,
//                                SUM(PRP.VALOR_SOCIO) AS VALOR_SOCIO
//                        FROM PROC_REC_PROP_SOCIOS(:EMPRESA,:REIMPRESSAO,:DATA_INICIO,:DATA_FIM,:COD_PROP,:PAGINA) PRP
//
//                        GROUP BY 1,2,3,4,5,6,7,8,9,10,11,12,13,14";
//        $sth4 =$db->prepare($sqlSocios);
//        $sth4->bindParam(':EMPRESA', $row->EMPRESA, PDO::PARAM_INT);
//        $sth4->bindParam(':REIMPRESSAO', $reimpressao, PDO::PARAM_INT);
//        $sth4->bindParam(':DATA_INICIO', $data_i, PDO::PARAM_STR, 10);
//        $sth4->bindParam(':DATA_FIM', $data_f, PDO::PARAM_STR, 10);    
//        $sth4->bindParam(':COD_PROP', $row->COD_PROP, PDO::PARAM_INT);
//        $sth4->bindParam(':PAGINA', $row->X, PDO::PARAM_INT);
//        try{
//         $sth4->execute();
//        }
//        catch (PDOException $e) {
//         echo json_encode( array( 
//                 "error" => "erro na execução do sql: ".$e->getMessage()
//         ) );
//         exit(0); 
//        }
//        while ($rowSocios = $sth4->fetch(PDO::FETCH_OBJ)){
//                $htmlSocios=$htmlSocios.'<table border="0" width="100%" align="center">
//                    <tbody>
//                        <tr>
//                            <td WIDTH="80%" align="LEFT"> SOCIO: '.$rowSocios->COD_CLI.'-'.$rowSocios->NOME_CLI.' </td>                        
//                            <td WIDTH="20%" align="right"> '.number_format($rowSocios->VALOR_SOCIO, 2, ',', '.').' </td>                        
//                        </tr>
//                    </tbody>
//                </table>
//                <table border="0" width="100%" align="center">
//                    <tbody>
//                        <tr>
//                            <td WIDTH="50%" align="LEFT"> <b> '.$rowSocios->DESCR_F_PAGTO.' </b>  </td>                        
//                            <td WIDTH="50%" align="LEFT"> BANCO: '.$rowSocios->BANCO.' AGÊNCIA: '.$rowSocios->AGENCIA.' DIGITO: '.$rowSocios->DIGITO.' </td>
//                        </tr>
//                    </tbody>
//                </table>
//                <table border="0" width="100%" align="center">
//                    <tbody>
//                        <tr>
//                            <td WIDTH="50%" align="LEFT"> NOMINAL: '.$rowSocios->FAVORECIDO.'  </td>                        
//                            <td WIDTH="50%" align="LEFT"> C/C.: '.$rowSocios->CONTA_CORRENTE.'  DIGITO: '.$rowSocios->DIG_CONTA.' </td>
//                        </tr>
//                    </tbody>
//                </table>
//                <table border="0" width="100%" align="center">
//                    <tbody>
//                        <tr>
//                            <td WIDTH="20%" align="LEFT"> TIPO: '.$rowSocios->TIPO_CONTA.'-'.$rowSocios->DESCR_TIPO_CONTA.'  </td>                        
//                            <td WIDTH="80%" align="LEFT"> </td>
//                        </tr>
//                    </tbody>
//                </table>';
//        }   
//$mpdf->WriteHTML('errou -'.$row->IMOVEL);


if ($acao == 'Escalado') {

    $titulo = 'TPE - Relação de Voluntários (Não Escalados)' .  $filtro;
    $sql_qtd_voluntarios = "  SELECT count(v.nome) as qtd_voluntarios
                             FROM voluntarios v
                             left join pontos_voluntarios pv on (pv.CODIGO_VOLUNTARIO=v.CODIGO) 
                             WHERE (COALESCE(pv.CODIGO_VOLUNTARIO,0)=0)" .$condicao." 
                             ORDER BY v.NOME";
    
    
    $sth2 = $db->prepare($sql_qtd_voluntarios);
    //$sth2->bindParam(':ESCALADO', $escalado, PDO::PARAM_STR);
}

if ($acao == 'Todos') {

    $titulo = 'TPE - Relação de Voluntários (Todos)' . $filtro;
    $sql_qtd_voluntarios = "  SELECT count(v.nome) as qtd_voluntarios
                             FROM voluntarios v
                             WHERE (1=1)" .$condicao." 
                             ORDER BY v.NOME";

    $sth2 = $db->prepare($sql_qtd_voluntarios);
}




//    $sql_qtd_voluntarios ="  SELECT count(v.nome) as qtd_voluntarios
//                             FROM voluntarios v
//                             WHERE (v.ESCALADO=:ESCALADO)
//                             ORDER BY v.NOME";
//
//    $sth2 =$db->prepare($sql_qtd_voluntarios);
//    $sth2->bindParam(':ESCALADO', $escalado, PDO::PARAM_STR);
//    $sth2->bindParam(':IMOVEL', $row->IMOVEL, PDO::PARAM_INT);
//    $sth2->bindParam(':SEQUENCIA', $row->SEQUENCIA, PDO::PARAM_STR, 5);
//    $sth2->bindParam(':PARCELA', $row->PARCELA, PDO::PARAM_STR, 10);    

try {
    $sth2->execute();
} catch (PDOException $e) {
    echo json_encode(array(
        "error" => "erro na execução do sql: " . $e->getMessage()
    ));
    exit(0);
}

$rowTotais = $sth2->fetch(PDO::FETCH_OBJ);




$sth = $db->prepare($sql);
//$sth->bindParam(':ESCALADO', $escalado, PDO::PARAM_STR);


try {
    $sth->execute();
} catch (PDOException $e) {
    echo json_encode(array(
        "error" => "erro na execução do sql: " . $e->getMessage()
    ));
    exit(0);
}

$row = $sth->fetch(PDO::FETCH_OBJ);



//if ($row = $sth->fetch(PDO::FETCH_OBJ)) {    
$html = ' <table border="0" width="100%" align="center" class="pontilhado">
                <tbody>    
                    <tr>
                        <td width="90%" align=left style="font-size: 12pt;"> <b>' . $titulo . '</b> </td>
                        <td width="50%" align=right  > ' . date('d/m/Y') . ' </td>
                    </tr>
                </tbody>
            </table>
            ' . $html_tracado . '
            
            <table border="0" width="100%" align="center" class="pontilhado">
                <tbody>
                    <tr>
                        <td WIDTH="30%" bgcolor="#CCCCCC"> Nome </td>
                        <td WIDTH="30%" align=left bgcolor="#CCCCCC"> Email </td>
                        <td WIDTH="20%" align=left bgcolor="#CCCCCC"> Telefone 1 </td>
                        <td WIDTH="20%" align=left bgcolor="#CCCCCC"> Telefone 2 </td>
                    </tr>
                </tbody>
            </table>

            ' . $html_qtd_voluntarios . '
            
            <table border="0" width="100%" align="center">
            </table>   
            <table border="0" width="100%" align="right" class="pontilhado">
                <tbody>
                    <tr>
                        <td whidth="40%">  </td>
                        <td WIDTH="45%" align="right"> <b>TOTAL DE VOLUNTÁRIOS ( ' . number_format($rowTotais->qtd_voluntarios, 0, ',', '.') . ' )</b> </td>                        
                    </tr>
                </tbody>                 
            </table> ';
//echo $html;
$mpdf = new mPDF('utf-8', 'A4-L');

//$mpdf->setHeader('TPE - Relação de Voluntários (Não Escalados)');
$mpdf->WriteHTML($html);
$mpdf->setFooter('{PAGENO}');
//$mpdf->AddPage();
//}    
$mpdf->Output();
//echo $html;
exit;
?>