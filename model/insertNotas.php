<?php 

include_once '../controller/conection.php';

    $sub = filter_input_array(INPUT_POST, FILTER_DEFAULT);


    //envia tudo
    if(!empty($sub['enviar'])){ 
        $prd = filter_input(INPUT_POST, 'nota_período'); //nota do perido
        $nt = filter_input(INPUT_POST, 'nota_tipo');   //tipo da nota
        $n1 = filter_input(INPUT_POST, 'nota_port');       //nota1
        $n2 = filter_input(INPUT_POST, 'nota_mat');       //nota2
        $n3 = filter_input(INPUT_POST, 'nota_EF');       //nota3
        $n4 = filter_input(INPUT_POST, 'nota_hist');       //nota4
        $n5 = filter_input(INPUT_POST, 'nota_geo');       //nota5
        $n6 = filter_input(INPUT_POST, 'nota_cie');       //nota6
        $n7 = filter_input(INPUT_POST, 'nota_EC');       //nota7
        $n8 = filter_input(INPUT_POST, 'nota_arte');       //nota8             
        $n9 = filter_input(INPUT_POST, 'nota_ing');       //nota9             
        $flt = filter_input(INPUT_POST, 'Faltas');  //faltas
        $mtr = filter_input(INPUT_POST, 'alu_id');    //mtr 

        //validação dos campos obrigatórios
        if( empty($prd) || empty($mtr) || empty($nt)){
            echo "<div class='alert alert-danger d-flex justify-content-center w-50 ' role='alert'>
                Preencha os campos de perído, tipo de nota e matricula. São campos obrigatórios.
          </div>";
            return;   //executa  e retorna para página
        }   

        $nV = "SELECT alu_id FROM tb_aluno WHERE alu_id = $mtr";
        $nR = $pdo->prepare($nV);
        $nR->execute();

        //validação de existencia do aluno no bd
            if($nR->rowCount() == 0){
                echo "<div class='alert alert-danger' role='alert' style='margin: 30px 500px; width: 500px; '>
                Esse aluno não existe no banco de dados.
          </div>";
            }
            else {
        $insert = "INSERT INTO `tb_nota` (`nota_id`, `nota_período`, `nota_tipo`, `nota_port`, `nota_arte`, `nota_EF`, `nota_hist`, `nota_geo`, `nota_mat`, `nota_cie`, `nota_EC`, `nota_ing`, `Faltas`, `alu_id`) VALUES
         (NULL, :prd, :nt, :n1, :n2, :n3, :n4, :n5, :n6, :n7, :n8, n9, :flt, :mtrl )";  //inserção dos dados no BD caso o aluno exista
 
                //bindagem dos parâmetros
        $result = $pdo->prepare($insert);
        $result->bindParam("prd", $prd, PDO::PARAM_INT);
        $result->bindParam("nt", $nt, PDO::PARAM_STR);
        $result->bindParam("n1", $n1, PDO::PARAM_STR);
        $result->bindParam("n2", $n2, PDO::PARAM_STR);
        $result->bindParam("n3", $n3, PDO::PARAM_STR);
        $result->bindParam("n4", $n4, PDO::PARAM_STR);
        $result->bindParam("n5", $n5, PDO::PARAM_STR);
        $result->bindParam("n6", $n6, PDO::PARAM_STR);
        $result->bindParam("n7", $n7, PDO::PARAM_STR);
        $result->bindParam("n8", $n8, PDO::PARAM_STR);
        $result->bindParam("n9", $n9, PDO::PARAM_STR);
        $result->bindParam("flt", $flt, PDO::PARAM_INT);
        $result->bindParam("mtrl", $mtr, PDO::PARAM_INT);
        if($result->execute()){
            echo "<div class='alert alert-success' role='alert' style='margin: 30px 500px; width: 500px; '>
                Inserido com sucesso no sistema
          </div>";
        }
    }
    }
?>