<?php 
include_once '../controller/conection.php';

$ano_s = $_GET['alu_ano'];

$slct = "SELECT * FROM tb_aluno WHERE alu_ano = '$ano_s'";
$Rslct = $pdo->prepare($slct);
$Rslct->execute();

    if($Rslct->rowCount() == 0){
        echo "nenhum registro encontrado";
    } while($rec = $Rslct->fetch(PDO::FETCH_ASSOC)){
        $ano = $rec['alu_ano'];
        $nome = $rec['alu_nome'];

        echo "<center>ano: ".$ano."nome: ".$nome."</center>";
    }

?>