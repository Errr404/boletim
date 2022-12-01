div<?php
    include_once '../controller/conection.php';


    //cat notas (turmas)


    $ano = "SELECT DISTINCT alu_ano FROM tb_aluno WHERE alu_ano < 10 ORDER BY alu_ano ASC";
    $ano_result = $pdo->prepare($ano);
    $ano_result->execute();

    if (($ano_result) and ($ano_result->rowCount() != 0)) {
        while ($row_ano = $ano_result->fetch(PDO::FETCH_ASSOC)) {
            $sre = $row_ano['alu_ano'];
            // echo "<div class='org' style='margin-left: 100px;'>ano<a href=''> ".$row_ano['alu_ano']."</a><br> </div>";
            echo "<div class ='row'>
        <div class='card w-25 mx-auto mt-1'>
                <div class='card-body mx-auto'>
                    <a href='seriesCat.php?ano=$sre' role='button' style='text-decoration: none;'>" . $sre . " Série<br></a>
                </div>
            </div>
        </div>";
        }
    }

    ?>