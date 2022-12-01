<?php 

include_once '../controller/conection.php';
include_once '../includes/header.php';

ob_start();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

// SELECT DAS NOTAS

$editNotas = "SELECT nota_período, nota_port, nota_mat, nota_cie, nota_geo, nota_hist,
nota_EC, nota_EF, nota_arte, Faltas FROM tb_nota WHERE alu_id = :id";
$queryNotas = $pdo->prepare($editNotas);
$queryNotas->bindParam(':id', $id, PDO::PARAM_INT); 
$queryNotas->execute();

    if(($queryNotas) AND ($queryNotas->rowCount() != 0)){
        $row = $queryNotas->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "sem notas encontradas";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../vendor/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <link href="../vendor/bootstrap-5.2.0-dist/js/bootstrap.bundle.min.js">


    <title> Inserir - Notas</title>
</head>
<style>
    :root{
    /* ===== Colors ===== */
    --body-color: #E4E9F7;
    }
    body{
    min-height: 100vh;
    background-color: var(--body-color);
    }
    .menu-links{
        margin-left: -32px;
        align-items: center;
    }
</style>

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


            $up = "UPDATE tb_nota SET nota_port = :port, nota_mat = :mat, nota_cie = :cie, nota_geo = :geo, 
            nota_hist = :hist, nota_EC = :EC, nota_EF = :EF, nota_arte = :arte , Faltas = :faltas WHERE alu_id = :id";
            $upQuery = $pdo->prepare($up);
            $upQuery->bindParam(':port', $chg['port'], PDO::PARAM_STR);
            $upQuery->bindParam(':mat', $chg['mat'], PDO::PARAM_STR);
            $upQuery->bindParam(':cie', $chg['cie'], PDO::PARAM_STR);
            $upQuery->bindParam(':geo', $chg['geo'], PDO::PARAM_STR);
            $upQuery->bindParam(':hist', $chg['hist'], PDO::PARAM_STR);    
            $upQuery->bindParam(':EC', $chg['ec'], PDO::PARAM_STR);    
            $upQuery->bindParam(':EF', $chg['ef'], PDO::PARAM_STR);    
            $upQuery->bindParam(':arte', $chg['arte'], PDO::PARAM_STR);    
            $upQuery->bindParam(':faltas', $chg['faltas'], PDO::PARAM_STR); 
            $upQuery->bindParam(':id', $id, PDO::PARAM_INT);       
            if ($upQuery->execute()) {
                header('location: ../view/aluno.php');
                echo "mudança feita com sucesso";
                exit();
            }

        } 
    }

    ?>


    <form method="GET" action="editarN.php" class="col w-50 mx-auto" style="margin: 100px 100px;">

    
        <select name="per" class="form-select" aria-label="Default select example" style="margin-top: 5px;">>
            <option selected value="">Selecione o período e o tipo de nota</option>
            <?php 
                            $periodeSelect = "SELECT DISTINCT nota_período FROM tb_nota ORDER BY nota_período ASC;";
                            $periodeSelect = $pdo->prepare($periodeSelect);
                            $periodeSelect->execute();
                            while ($row = $periodeSelect->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value=".$row['nota_período'].">".$row['nota_período']."</option>";
                                $per = $row['nota_período'];
                                
                              }
                        ?>
        </select>
        <select name="tp" class="form-select mt-2" aria-label="Default select example" style="margin-top: 5px;">>
            <option selected>Selecione o tipo de nota</option>
            <?php
                     $tipo = "SELECT DISTINCT nota_tipo FROM tb_nota ORDER BY nota_tipo ASC;";
                     $tipoSelect = $pdo->prepare($tipo);
                     $tipoSelect->execute();
                     while($row = $tipoSelect->fetch(PDO::FETCH_ASSOC))

                     {
                    ?>
            <option value="<?php echo $row['nota_tipo']?>"><?php echo $row['nota_tipo']?></option>
            <?php
                    $tp = $row['nota_tipo']; 
                     }
                    ?>
        </select>
        <?php
                    echo "<input type='hidden' class='btn btn-success' name='alu' value='".$id."'> 
                    <input type='submit' class='btn btn-success mx-auto mt-3' value='enviar' style='margin-left: 200px; color:'>";
                    ?>
    </form>
 
  



    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("jquery", "1.4.2");
    </script>

    <script src="../assets/js/editNotas.js"></script>
</body>