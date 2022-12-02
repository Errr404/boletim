<?php 

require_once '../controller/conection.php';

$query = 'SELECT * FROM tb_nota';
$queryExe = $pdo->prepare($query);
$queryExe->execute();
while ($row = $queryExe->fetch(PDO::FETCH_ASSOC)){
    extract ($row);


$port = array();
$mat = array();

if($row['nota_port']){
    $port[$row['nota_período']][$row['nota_tipo']] = $row['nota_port'];
    $mat[$row['nota_período']][$row['nota_tipo']] = $row['nota_mat'];

}


$html = json_encode($port). $port[1][" "];
$html = json_encode($mat). $mat[2][" "];

$tipos = array();
$tipos = array(0 => "parcial", 1 => "global");

for($j = 1; $j <= 2; $j++) {
    for($i = 1; $i <= 2; $i++) {
        $soma = array_sum($port[$i]);
        $soma .= array_sum($mat[$i]);
        $avg = ($soma) / 2;
        $avg = number_format($avg, 1, '.', '');
        $html = $avg;        // variável responsável por imprimir o valor.
        $i++;
    }

    $j++;
} 
}
