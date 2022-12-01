<?php 

include_once '../controller/conection.php';

$ano = $_POST['alu_ano'];

$query = "SELECT * FROM tb_aluno WHERE alu_ano = $ano;";
$query_r = $pdo->prepare($query);
$query_r->execute();
 
    while ($row = $query_r->fetch(PDO::FETCH_ASSOC)){
         echo "<option value='".$row['alu_id']."'>".$row['alu_nome']."</option>";

       
       
    }

