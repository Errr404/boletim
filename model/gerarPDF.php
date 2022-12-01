<?php

// Carregar o Composer
require  '../vendor/dompdf/autoload.inc.php';

// Incluir conexao com BD
include_once '../controller/conection.php';

// QUERY para recuperar os registros do banco de dados
$id = $_GET['id'];

$s = "SELECT  a.alu_id, a.alu_nome, a.alu_ano, a.alu_turno, n.nota_período, n.nota_tipo, n.nota_port, 
n.nota_arte, n.nota_EF, n.nota_hist, n.nota_geo, n.nota_mat, n.nota_cie, n.nota_EC, n.Faltas 
FROM tb_aluno a INNER JOIN tb_nota n ON a.alu_id = n.alu_id WHERE a.alu_id = $id ORDER BY n.nota_período ASC";



// Prepara a QUERY
$result_usuarios = $pdo->prepare($s);

// Executar a QUERY
$result_usuarios->execute();

// Informacoes para o PDF
$html = "<!DOCTYPE html>";
$html .= "<html lang='pt-br'>";
$html .= "<head>";
$html .= "<meta charset='UTF-8'>";
$html .= "<link rel='stylesheet' href='http://localhost/boletim/assets/css/dompdf.css'";
$html .= "</head>";
$html .= "<body>";
$html .= "<img src ='http://localhost/boletim/assets/img/bannerpdf.png'";
$html .= "<h1></h1>";

$p = "SELECT * FROM tb_aluno WHERE alu_id = $id";
$resultP = $pdo->prepare($p);
$resultP->execute();

while ($rowUser = $resultP->fetch(PDO::FETCH_ASSOC)) {
    extract($rowUser);
    $html .= "<table class='nomeAlu'>";
    $html .= "<tr><td><th id='nomeAlu'> Nome: $alu_nome </th><td></tr>";
    $html .= "</table>";
    $html .= "<table>";

    $html .= "<tr><th>Materia</th>";
    $html .= "<th>1 periodo</th>";
    $html .= "<th>2 periodo</th>";
    $html .= "<th>3 periodo</th>";
    $html .= "<th>4 periodo</th></tr>";
    $html .= "</table>";
    $html .= "<table>";
    $html .= "<thead>";
    $html .= "<tr>";
    $html .= "<th style='width: 185.5px;'>Tipo de Nota</th>";
    $html .= "<th>P</th>";
    $html .= "<th>G</th>";
    $html .= "<th>P</th>";
    $html .= "<th>G</th>";
    $html .= "<th>P</th>";
    $html .= "<th>G</th>";
    $html .= "<th>P</th>";
    $html .= "<th>G</th>";
    $html .= "</tr>";
    $html .= "</thead>";


    // $html .= "<th>Tipo de nota</th>";
    // $html .= "<th>Português</th>";
    // $html .= "<th>Matemática</th>";
    // $html .= "<th>Geografia</th>";
    // $html .= "<th>História</th>";
    // $html .= "<th>Etica e Cidadania</th>";
    // $html .= "<th>Educação Física</th>";
    // $html .= "<th>Ciencia</th>";
    // $html .= "<th>Artes</th>";
    // $html .= "<th>Faltas</th> </tr>";
}
$mat = array(
    1 => 'Português', 'Matemática',
    'Geografia', 'História', 'Ética e Cidadania', 'Educação Física',
    'Ciencia', 'Artes', 'Faltas'
);

// $html .="<tr><td>$mat[1]</td><td>";
// $html .="<tr><td>$mat[2]</td><td>";
// $html .="<tr><td>$mat[3]</td><td>";
// $html .="<tr><td>$mat[4]</td><td>";
// $html .="<tr><td>$mat[5]</td><td>";
// $html .="<tr><td>$mat[6]</td><td>";
// $html .="<tr><td>$mat[7]</td><td>";
// $html .="<tr><td>$mat[8]</td><td>";
// $html .="<tr><td>$mat[9]</td>";

// $row = 9;
// $col = 9;

// $irow = 1;
// while ($irow <= $row)
// {
//     $html .= "<tr>";
//     $html .= "</tr>";

//     $icol = 1;
//     while ($icol <= $col){
//         $html .= "<td>aa</td>";
//         $html .= "";
//         $icol = $icol + 1;
//     } 
//     $irow = $irow + 1;
// }

$l = 9;
$c = 8;
$il = 1;
$ic = 1;
while ($row = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
    // calculo de faltas 


    extract($row);

    $html .= "<tbody>";
   
    foreach ($mat as $key){
    $html .= "<tr>";
    $html .= "<td>$key</td>";
    $html .= "<td>$nota_port</td>";
    $html .= "<td>$nota_mat</td>";
    $html .= "<td>$nota_geo</td>";
    $html .= "<td>$nota_hist</td>";
    $html .= "<td>$nota_EC</td>";
    $html .= "<td>$nota_EF</td>";
    $html .= "<td>$nota_cie</td>";
    $html .= "<td>$nota_arte</td>";
    }

   
   


}
$il ++;
$ic ++;

// $html.= "</td></tr>";
// $html.= "</td></tr>";
// $html.= "</td></tr>";
// $html.= "</td></tr>";
// $html.= "</td></tr>";
// $html.= "</td></tr>";
// $html.= "</td></tr>";
// $html.= "</td></tr>";
// $html.= "</td></tr>";


// $f = "SELECT (SUM(Faltas) FROM tb_nota WHERE nota_período = 1";
// $resultF = $pdo->prepare($f);
// $resultF->execute();

// while ($rowF = $resultF->fetch(PDO::FETCH_ASSOC)){

// extract($rowF);
// $p = 200 - $Faltas;
// $p2 = $p * 100;
// $p3 = $p2 / 200;
// $html .= "<tr><td>faltas: $Faltas </td>";
// $html .= "<td>frequencia: $p3% </td></tr>";

// }
// Referenciar o namespace Dompdf
use Dompdf\Dompdf;

// Instanciar e usar a classe dompdf
$dompdf = new Dompdf(['enable_remote' => true]);


// Instanciar o metodo loadHtml e enviar o conteudo do PDF
$dompdf->loadHtml($html);

// Configurar o tamanho e a orientacao do papel
// landscape - Imprimir no formato paisagem
//$dompdf->setPaper('A4', 'landscape');
// portrait - Imprimir no formato retrato
$dompdf->setPaper('A4', 'landscape');

// Renderizar o HTML como PDF
$dompdf->render();

header('content-type: application/pdf');
echo $dompdf->output();

// file_put_contents('../boletins/boletim de '.$alu_nome.'.pdf',$dompdf->output());

// Gerar o PDF
// $dompdf->stream();
