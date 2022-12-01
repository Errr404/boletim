<?php 



include_once '../controller/conection.php';



    $sub = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        
  
        $nome = filter_input(INPUT_POST, 'alu_nome'); //nome
        $turn = filter_input(INPUT_POST, 'alu_turno');   //turno
        $serie = filter_input(INPUT_POST, 'alu_ano');       //serie
        $fto = filter_input(INPUT_POST, 'alu_foto');       //foto q ainda n funfa
        if(isset($sub['enviar'])){
        if(empty($nome) || empty($turn) || empty($serie)){
          header("location: aluno.php");
          echo "<div class='alert alert-danger' role='alert' style='margin: 30px 500px; width: 500px;'>
          Preencha todos os campos
    </div>";
          exit;
          

        }   
         
        $validator = "SELECT * FROM tb_aluno WHERE alu_nome = :nome";
        $vR = $pdo->prepare($validator);
        $vR->bindParam("nome", $nome, PDO::PARAM_STR);
        $vR->execute();
        
        
        if($vR->rowCount() > 0){
             
        header("location: aluno.php?status=error");
        exit;
     
       
 

        } else {

        // $nome = filter_input(INPUT_POST, 'name'); //nome
        // $turn = filter_input(INPUT_POST, 'turn');   //turno
        // $serie = filter_input(INPUT_POST, 'year');       //serie
        // $fto = filter_input(INPUT_POST, 'pic');       //foto q ainda n funfa
        // $insert = "INSERT INTO `tb_aluno` (`alu_id`,`alu_nome`, `alu_turno`, `alu_ano`, `alu_foto`) VALUES
        //  (NULL, :nome, :turn, :serie, :fto )";



        // $result = $pdo->prepare($insert);
        // $result->bindParam("nome", $nome, PDO::PARAM_STR);
        // $result->bindParam("turn", $turn, PDO::PARAM_STR);
        // $result->bindParam("serie", $serie, PDO::PARAM_STR);
        // $result->bindParam("fto", $fto, PDO::PARAM_STR);
     
        // if($result->execute()){
        //     echo "<div class='alert alert-success' role='alert' style='margin: 30px 500px; width: 500px; '>
        //         Inserido com sucesso no sistema
        //   </div>";
        // }
    }
        }

     

    
        // $table = "SELECT alu_id as Matricula, alu_nome as Nome , alu_ano as Ano, alu_turno as turno FROM tb_aluno";
        // $tr = $pdo->prepare($table);
        // $tr->execute();

        // if(($tr) AND ($tr->rowCount() != 0)){
        //     while($row = $tr->fetch(PDO::FETCH_ASSOC)){
           
        //         echo "<table class='table table-strip' style='margin: 10px 450px; width: 500px;'>
        //                     <thead>
                                
        //                         <th scope='col'>Matrícula</th>
        //                         <th scope='col'>Nome</th>
        //                         <th scope='col'>Ano</th>
        //                         <th scope='col'>Turno</th>
        //                         <th scope='col'></th>
                                
        //                     </thead>";
                            
        //                    echo" <tbody>
                            
        //                     <th scope='row'><a href='../model/editar.php?id=".$row['Matricula']."'>".$row['Matricula']."</a></th>
        //                     <td>".$row['Nome']."</td>
        //                     <td>".$row['Ano']."</td>
        //                     <td>".$row['turno']."</td>
        //                     <td><a href='../model/delete.php?id=".$row['Matricula']."'>(X)</a></td>
                            
        //                     </tbody>
        //                 </table>";
                        
     
                 
        //     }
        // } 

        
?>