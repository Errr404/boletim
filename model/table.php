<?php 
    include_once '../controller/conection.php';


$s = "SELECT  a.alu_id, a.alu_nome, a.alu_ano, a.alu_turno, n.nota_período, n.nota_tipo, n.nota_port, 
n.nota_arte, n.nota_EF, n.nota_hist, n.nota_geo, n.nota_mat, n.nota_cie, n.nota_EC, n.Faltas 
FROM tb_aluno a INNER JOIN tb_nota n ON a.alu_id = n.alu_id WHERE a.alu_id = 147 ORDER BY n.nota_período ASC";
$result_usuarios = $pdo->prepare($s);
$result_usuarios->execute();


?>


<html>
<!DOCTYPE html>
<html lang='pt-br'>
<head>
<meta charset='UTF-8'>
<link rel='stylesheet' href='http://localhost/boletim/assets/css/dompdf.css'
</head>
<body>
<img src ='http://localhost/boletim/assets/img/bannerpdf.png'
<h1></h1>
<table class='nomeAlu'>
    <tr><td><th id='nomeAlu'> Nome: <?php while ( $row = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
        echo $row['alu_nome'];
    }?> </th><td></tr>
    </table>
    <table>

    <tr><th>Materia</th>
    <th>1 periodo</th>
    <th>2 periodo</th>
    <th>3 periodo</th>
    <th>4 periodo</th></tr>
    </table>
    <table>
    <thead>
    <tr>
    <th style='width: 185.5px;'>Tipo de Nota</th>
    <th>P</th>
    <th>G</th>
    <th>P</th>
    <th>G</th>
    <th>P</th>
    <th>G</th>
    <th>P</th>
    <th>G</th>
    </tr>
    </thead>
    <tbody>
    <?php 
      
        $math = array(
            1 => 'Português', 'Matemática',
            'Geografia', 'História', 'Ética e Cidadania', 'Educação Física',
            'Ciencia', 'Artes', 'Faltas'
        );

    ?>




   
   <?php
   $notas = "SELECT nota_port, nota_mat, nota_geo, nota_hist, nota_EF, nota_EC, nota_cie, nota_arte, Faltas FROM tb_nota";
   $notasRes = $pdo->prepare($notas);
   $notasRes->execute();
   
   while($rowNotas = $notasRes->fetch(PDO::FETCH_ASSOC)){
    
    foreach ($math as $m){
            
        echo "<tr>";
        echo "<td>$m</td>";
        echo "<td>".$rowNotas['nota_port']."</td>";
        echo "<td>".$rowNotas['nota_mat']."</td>";
        echo "<td>".$rowNotas['nota_geo']."</td>";
        echo "<td>".$rowNotas['nota_hist']."</td>";
        echo "<td>".$rowNotas['nota_EF']."</td>";
        echo "<td>".$rowNotas['nota_EC']."</td>";
        echo "<td>".$rowNotas['nota_cie']."</td>";
        echo "<td>".$rowNotas['nota_arte']."</td>";
        echo "</tr>";
    }
    exit();
}


 ?>
 </tbody>
</html>