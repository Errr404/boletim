<?php 

require_once '../vendor/autoload.php';


use \App\entity\Aluno;

    
    
    if(isset($_POST['alu_nome'], $_POST['alu_turno'], $_POST['alu_ano'], $_POST['alu_foto'])) {

        $cadAlu = new Aluno();
        $cadAlu->alu_nome = $_POST['alu_nome'];
        $cadAlu->alu_turno = $_POST['alu_turno'];
        $cadAlu->alu_ano = $_POST['alu_ano'];
        $cadAlu->alu_foto = $_POST['alu_foto'];
        $cadAlu->cadastrar();
        
        // var_dump($cadAlu);

        echo "<div class='alert alert-success' role='alert' style='margin: 30px 500px; width: 500px; '>
        Inserido com sucesso no sistema
  </div>";

        // header('location: index.php?status=success');
        // exit;

         
    }

    $listagem = Aluno::getAluno();

    // include_once '../includes/listagem.php';


   


  

   

   
