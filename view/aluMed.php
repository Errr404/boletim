<?php

include_once '../controller/conection.php';
include_once '../includes/header.php';
include_once '../includes/sidebar.php';

$per = $_GET['id'];
$alu = $_GET['alu'];

$media = "SELECT (SUM(nota_port)/2) as port FROM tb_nota WHERE nota_período = 1 AND alu_id = $alu";
$resultM = $pdo->prepare($media);
$resultM->execute();
if (($resultM) and ($resultM->rowCount() != 0)) {
    while ($rowM = $resultM->fetch(PDO::FETCH_ASSOC)) {
        echo " <center><p>
            <a class='btn btn-primary mt-2' data-bs-toggle='collapse' href='#collapseExample' role='button' aria-expanded='false' aria-controls='collapseExample'
             href='aluNI.php?per=1&mat=nota_port&alu=$alu'>medPort 1a P: " . $rowM['port'] . "
              
            </a>
          </p>
          <div class='collapse' id='collapseExample'>
  <div class='card card-body w-25' id='AluNote'>
    
  </div>
</div>
           </center>";
    }
}


?>

<span class="" id="cabeçalho"></span>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="../assets/js/jquery-3.51.min.js"></script>
<script type="text/javascript">
            $.ajax({
        url: 'http://localhost/boletim/view/AluNI.php',
        type: 'POST',
        data: '{(<?php echo 'aluNI.php?per=1&mat=nota_port&alu='.$alu.''?>)',
        success: function(res) {
            var headline = $(res).text('#textN'); 
            $("#AluNote").html(res);
        }
    });        
</script>