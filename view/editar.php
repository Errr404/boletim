<?php

include_once '../controller/conection.php';


session_start();
ob_start();
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);



$edit = "SELECT alu_id, alu_nome, alu_turno, alu_ano FROM tb_aluno WHERE alu_id = $id LIMIT 1";
$editR = $pdo->prepare($edit);
$editR->execute();

if (($editR) and ($editR->rowCount() != 0)) {
    $row = $editR->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Aluno não encontrado";
    header('location: aluno.php');
    exit();
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boletim Online - Editar</title>

    <link rel="stylesheet" href="../vendor/bootstrap-5.2.0-dist/css/bootstrap-grid.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="../vendor/bootstrap-5.2.0-dist/js/bootstrap.bundle.min.js">

    <link rel="stylesheet" type="text/css" href="../assets/css/editStyle.css">
    <link type="text/js" href="../assets/js/scripts.js">
</head>

<body>

    <?php    //var_dump($chg);
    $chg = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($chg['editAlu'])) { //validação dos campos
        $empty_input = false;
        array_map('trim', $chg);
        if (in_array("", $chg)) {
            $empty_input = true;
            echo "preencha todos os campos";
        }

        if (!$empty_input) {


            $up = "UPDATE tb_aluno SET alu_nome = :nome, alu_turno = :turno, alu_ano = :ano WHERE alu_id = :id";
            $upQuery = $pdo->prepare($up);
            $upQuery->bindParam(':nome', $chg['nome'], PDO::PARAM_STR);
            $upQuery->bindParam(':turno', $chg['turno'], PDO::PARAM_STR);
            $upQuery->bindParam(':ano', $chg['serie'], PDO::PARAM_STR);
            $upQuery->bindParam(':id', $id, PDO::PARAM_INT);
            if ($upQuery->execute()) {
                header('location: aluno.php');
                echo "mudança feita com sucesso";
                exit();
            }
        }
    }

    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="POST" id="editAluno" action="" class="col" style="margin: 100px 100px;">
                    <small>Nome</small>
                    <span class="text-danger">*</span>
                    <input type="text" name="nome" placeholder="nome" value="<?php
                    if (isset($row['alu_nome'])) {
                        echo $row['alu_nome'];
                    } elseif (isset($chg['alu_nome'])) {
                        echo $chg['alu_nome'];
                    } ?>" class="form-control mt-2" style="margin-top: 5px;">
                    <small>Turno</small>
                    <span class="text-danger">*</span>
                    <input type="text" name="turno" placeholder="turno" value="<?php
                    if (isset($row['alu_turno'])) {
                        echo $row['alu_turno'];
                    } elseif (isset($chg['alu_turno'])) {
                        echo $chg['alu_turno'];
                    } ?>" class="form-control mt-2" style="margin-top: 5px;">
                    <small>Ano</small>
                    <span class="text-danger">*</span>
                    <input type="text" name="serie" placeholder="serie" value="<?php
                    if (isset($row['alu_ano'])) {
                        echo $row['alu_ano'];
                    } elseif (isset($chg['alu_ano'])) {
                        echo $chg['alu_ano'];
                    } ?>" class="form-control mt-2" style="margin-top: 5px;">
                    <input type="submit" name="editAlu" class="btn btn-success mt-2" value="Salvar">
                </form>
            </div>
        </div>
    </div>
</body>

</html>