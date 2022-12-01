<?php 

include_once '../controller/conection.php';

session_start();
ob_start();
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


if(empty($id)){
    echo "Matrícula não encontrada no banco de dados";
    header ('location: aluno.php');
    exit();
}

$d = "SELECT alu_id FROM tb_aluno WHERE alu_id = $id LIMIT 1";
$dQuery = $pdo->prepare($d);
$dQuery->execute();



if(($dQuery) AND ($dQuery->rowCount() != 0)){
    $delete = "DELETE n, a FROM tb_nota as n left join tb_aluno as a on n.alu_id = a.alu_id WHERE n.alu_id = $id";
    $deleteQuery = $pdo->prepare($delete);

    if($deleteQuery->execute()) {
        header ('location: ../view/aluno.php');
        //exit();

    } if(($dQuery) AND ($dQuery->rowCount() != 0)){
        $deleSn = "DELETE FROM `tb_aluno` WHERE `tb_aluno`.`alu_id` = $id";
        $del = $pdo->prepare($deleSn);
            if($del->execute()) {
                header ('location: ../view/aluno.php');
                exit();
            }
     } else{ 
        echo "Falha na hora de apagar o aluno";
        header ('location: ../view/aluno.php');
        exit();
    }

} else {
    echo "Aluno não encontrado";
    header ('location: ../view/aluno.php');
}
