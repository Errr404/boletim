
<body>
<?php 
include_once '../includes/header.php';
include_once '../controller/conection.php';

$ano_s = $_GET['ano'];


$slct = "SELECT * FROM tb_aluno WHERE alu_ano = '$ano_s'";
$Rslct = $pdo->prepare($slct);
$Rslct->execute();

    if($Rslct->rowCount() == 0){
        echo "nenhum registro encontrado";

    } 
    
    while($row_ano = $Rslct->fetch(PDO::FETCH_ASSOC)){
        $ano = $row_ano['alu_ano'];
        $nome = $row_ano['alu_nome'];
        $id = $row_ano['alu_id'];
        include_once ('../includes/sidebar.php');
    //     echo "<div class='badge bg-primary mx-auto mt-3 mb-4' style='width: 6rem;'>
    //        Ano:  ".$ano."
    //   </div>";

        echo "<div class='card text-white bg-dark w-25 mx-auto mt-3 mb-4'>
        <div class='card-body mx-auto '>
        <a href='aluNota.php?id=$id' role='button' class='text-white'style='text-decoration: none;'>".$nome."<br></a>
        </div>
    </div>";
    }



?>

</body>
</html>
