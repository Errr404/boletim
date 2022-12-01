<?php 
include 'header.php';

$list = '';
foreach ($listagem as $lista){
  $list .= "<tr>
  <td id='alu'><a href='../model/editar.php?id=".$lista->alu_id."'>".$lista->alu_id."</a></td>
  <td id='alu'>".$lista->alu_nome."</td>
  <td id='alu'>".$lista->alu_turno."</td>  
  <td id='alu'>".$lista->alu_ano."º ano</td>
  <td id='alu'><a href='../model/delete.php?id=".$lista->alu_id."'><i class='bx bxs-user-x'></i></a></td>
  </tr>";
}
?>
<div class="container">
 <ul class="pagination justify-content-center mt-2">
    <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->
    <li class="page-item"><a class="page-link" id="alu_ano" href="#" value = "1" onchange="pesqano()">1</a></li>
    <li class="page-item"><a class="page-link" id="alu_ano" href="#" value = "2" onchange="pesqano()">2</a></li>
    <li class="page-item"><a class="page-link" id="alu_ano" href="#" value = "3" onchange="pesqano()">3</a></li>
    <li class="page-item"><a class="page-link" id="alu_ano" href="#" value = "4" onchange="pesqano()">4</a></li>
    <li class="page-item"><a class="page-link" id="alu_ano" href="#" value = "5" onchange="pesqano()">5</a></li>
    <li class="page-item"><a class="page-link" id="alu_ano" href="#" value = "6" onchange="pesqano()">6</a></li>
    <li class="page-item"><a class="page-link" id="alu_ano" href="#" value = "7" onchange="pesqano()">7</a></li>
    <li class="page-item"><a class="page-link" id="alu_ano" href="#" value = "8" onchange="pesqano()">8</a></li>
    <li class="page-item"><a class="page-link" id="alu_ano" href="#" value = "9" onchange="pesqano()">9</a></li>
    <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
 </ul>
 </div>
<div class="container mt-3 d-flex justify-content-center" id="table">

 

<table class="table ml-3 w-50">
  <thead>
  <th class = "table-dark">Matrícula</th>
    <th class = "table-dark">Nome</th>
    <th class = "table-dark">Turno</th>
    <th class = "table-dark">Série</th>
    <th class = "table-dark"></th>
    
  </thead>

  <tbody>

  <?=$list?>
 
  </tbody>

</table>

</div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="../assets/js/jquery-3.51.min.js"></script>
<script type="text/javascript">
    function pesqalu(){
           var alu = $("#alu_ano").val()
           res(alu)
           }
    function res(a) { 
            var dados = new FormData();
            dados.append('alu_ano', a);
            $.ajax({
                url: 'http://localhost/boletim/model/listagem.php',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false
            }).done(function(resposta){
                $('#alu').html(resposta);
            });
        }       
</script>  
