<?php 
session_start();
    include_once '../view/../includes/sidebar.php';
    include_once '../controller/conection.php';
    include_once '../includes/header.php';
    ?>

    <title>Boletim Online - Editar</title>
    
<?php

$per = $_GET['per'];
$alu = $_GET['alu'];
$tp = $_GET['tp'];

ob_start();

// SELECT DAS NOTAS

$editNotas = "SELECT nota_período, nota_port, nota_mat, nota_cie, nota_geo, nota_hist,
nota_EC, nota_EF, nota_arte, nota_ing, Faltas FROM tb_nota WHERE alu_id = :id AND nota_tipo = :tp AND nota_período = :per";
$queryNotas = $pdo->prepare($editNotas);
$queryNotas->bindParam(':per', $per, PDO::PARAM_STR);
$queryNotas->bindParam(':tp', $tp, PDO::PARAM_STR);
$queryNotas->bindParam(':id', $alu, PDO::PARAM_INT); 
$queryNotas->execute();

    if(($queryNotas) AND ($queryNotas->rowCount() != 0)){
        $row = $queryNotas->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "sem notas encontradas";
        exit();
    }

?>
<?php 
        $chg = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($chg['editNt'])) { //validação dos campos
            $empty_input = false;
            array_map('trim', $chg);
            if (in_array("", $chg)) {
                $empty_input = true;
                echo "preencha todos os campos";
            }
    
            if (!$empty_input) {
    
    
                $up = "UPDATE tb_nota SET nota_port = :port, nota_mat = :mat, nota_cie = :cie, nota_geo = :geo, 
                nota_hist = :hist, nota_EC = :EC, nota_EF = :EF, nota_arte = :arte , nota_ing = :ing, Faltas = :faltas WHERE alu_id = :id AND 
                nota_período = :per AND nota_tipo = :tp";
                $upQuery = $pdo->prepare($up);
                $upQuery->bindParam(':port', $chg['port'], PDO::PARAM_STR);
                $upQuery->bindParam(':mat', $chg['mat'], PDO::PARAM_STR);
                $upQuery->bindParam(':cie', $chg['cie'], PDO::PARAM_STR);
                $upQuery->bindParam(':geo', $chg['geo'], PDO::PARAM_STR);
                $upQuery->bindParam(':hist', $chg['hist'], PDO::PARAM_STR);    
                $upQuery->bindParam(':EC', $chg['ec'], PDO::PARAM_STR);    
                $upQuery->bindParam(':EF', $chg['ef'], PDO::PARAM_STR);    
                $upQuery->bindParam(':arte', $chg['arte'], PDO::PARAM_STR);    
                $upQuery->bindParam(':ing', $chg['ing'], PDO::PARAM_STR);    
                $upQuery->bindParam(':faltas', $chg['faltas'], PDO::PARAM_STR); 
                $upQuery->bindParam(':id', $alu, PDO::PARAM_INT);
                $upQuery->bindParam(':per', $per, PDO::PARAM_STR);
                $upQuery->bindParam(':tp', $tp, PDO::PARAM_STR);      
                if ($upQuery->execute()) {
                    // header('location: ../model/editarN.php');
                    // echo "mudança feita com sucesso";

                }
    
            } else {
                $up = "DELETE FROM tb_nota WHERE alu_id = :id AND 
                nota_período = :per AND nota_tipo = :tp";
                $upQuery = $pdo->prepare($up);
                $upQuery->bindParam(':id', $alu, PDO::PARAM_INT);
                $upQuery->bindParam(':per', $per, PDO::PARAM_STR);
                $upQuery->bindParam(':tp', $tp, PDO::PARAM_STR);      
                if ($upQuery->execute()) {
                    echo "mudança feita com sucesso";

                }
            }
            exit();
        }

        ?>
<div class="row d-flex justify-content-center">
<form class="form-control w-50 mt-4" id="editAlu" method="POST" action="">

    <small>Português</small>
    <span class="text-danger">*</span>
    <input type="text" name="port" placeholder="" value="<?php
                    if (isset($row['nota_port'])) {
                        echo $row['nota_port'];
                    } elseif (isset($chg['nota_port'])) {
                        echo $chg['nota_port'];
                    } ?>" class="form-control mt-2" style="margin-top: 5px;">


    <small>Matemática</small>
    <span class="text-danger">*</span>
    <input type="text" name="mat" placeholder="" value="<?php
                    if (isset($row['nota_mat'])) {
                        echo $row['nota_mat'];
                    } elseif (isset($chg['nota_mat'])) {
                        echo $chg['nota_mat'];
                    } ?>" class="form-control mt-2" style="margin-top: 5px;">


    <small>Ciência</small>
    <span class="text-danger">*</span>
    <input type="text" name="cie" placeholder="" value="<?php
                    if (isset($row['nota_cie'])) {
                        echo $row['nota_cie'];
                    } elseif (isset($chg['nota_cie'])) {
                        echo $chg['nota_cie'];
                    } ?>" class="form-control mt-2" style="margin-top: 5px;">


    <small>Geografia</small>
    <span class="text-danger">*</span>
    <input type="text" name="geo" placeholder="" value="<?php
                    if (isset($row['nota_geo'])) {
                        echo $row['nota_geo'];
                    } elseif (isset($chg['nota_geo'])) {
                        echo $chg['nota_geo'];
                    } ?>" class="form-control mt-2" style="margin-top: 5px;">


    <small>História</small>
    <span class="text-danger">*</span>
    <input type="text" name="hist" placeholder="" value="<?php
                    if (isset($row['nota_hist'])) {
                        echo $row['nota_hist'];
                    } elseif (isset($chg['nota_hist'])) {
                        echo $chg['nota_hist'];
                    } ?>" class="form-control mt-2" style="margin-top: 5px;">


    <small>Ética e Cidadania</small>
    <span class="text-danger">*</span>
    <input type="text" name="ec" placeholder="" value="<?php
                    if (isset($row['nota_EC'])) {
                        echo $row['nota_EC'];
                    } elseif (isset($chg['nota_EC'])) {
                        echo $chg['nota_EC'];
                    } ?>" class="form-control mt-2" style="margin-top: 5px;">


    <small>Educação Física</small>
    <span class="text-danger">*</span>
    <input type="text" name="ef" placeholder="" value="<?php
                    if (isset($row['nota_EF'])) {
                        echo $row['nota_EF'];
                    } elseif (isset($chg['nota_EF'])) {
                        echo $chg['nota_EF'];
                    } ?>" class="form-control mt-2" style="margin-top: 5px;">


    <small>Artes</small>
    <span class="text-danger">*</span>
    <input type="text" name="arte" placeholder="" value="<?php
                    if (isset($row['nota_arte'])) {
                        echo $row['nota_arte'];
                    } elseif (isset($chg['nota_arte'])) {
                        echo $chg['nota_arte'];
                    } ?>" class="form-control mt-2" style="margin-top: 5px;">
                        
    <small>Inglês</small>
    <span class="text-danger">*</span>
    <input type="text" name="ing" placeholder="" value="<?php
                    if (isset($row['nota_ing'])) {
                        echo $row['nota_ing'];
                    } elseif (isset($chg['nota_ing'])) {
                        echo $chg['nota_ing'];
                    } ?>" class="form-control mt-2" style="margin-top: 5px;">


    <small>Faltas</small>
    <span class="text-danger">*</span>
    <input type="text" name="faltas" placeholder="" value="<?php
                    if (isset($row['Faltas'])) {
                        echo $row['Faltas'];
                    } elseif (isset($chg['Faltas'])) {
                        echo $chg['Faltas'];
                    } ?>" class="form-control mt-2" style="margin-top: 5px;">


    <input type="submit" name="editNt" class="btn btn-success mt-2" value="Salvar">



</form>
</div>


</body>

</html>