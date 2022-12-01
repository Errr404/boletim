<?php 

include_once '../controller/conection.php';


$sql = "SELECT nota_período, nota_tipo, nota_port, nota_mat, nota_hist, nota_geo, nota_EC, nota_EF, nota_cie, nota_arte
    FROM tb_nota WHERE alu_id = 16;";
$sql_query = $pdo->prepare($sql);
$sql_query->execute();

// $notas = array( "Matemática" => $_POST["nota_mat"], "Português" => $_POST["nota_port"],
//             "Artes" => $_POST["nota_arte"], "Ciencia" => $_POST["nota_cie"], 
//             "Geografia" => $_POST["nota_geo"], "História" => $_POST["nota_hist"], "Etica" => $_POST["nota_EC"],
//                 "Educação Fisica" => $_POST["nota_EF"]);


// if(($sql_query) AND ($sql_query->rowCount() != 0)){
//     $row = $sql_query->fetch(PDO::FETCH_ASSOC);

//     $periodos = $row['nota_período'];
//     $periodos = array('1', '2', '3', '4');

//     $notas = array( "Matemática" => $row["nota_mat"], "Português" => $row["nota_port"],
//         "Artes" => $row["nota_arte"], "Ciencia" => $row["nota_cie"], 
//         "Geografia" => $row["nota_geo"], "História" => $row["nota_hist"], "Etica" => $row["nota_EC"],
//             "Educação Fisica" => $row["nota_EF"]);
    
//         function getMedia($periodos, $notas){
        
//     }

// }

// $per = "SELECT nota_port, nota_período, alu_id FROM tb_nota WHERE nota_período = 1 and alu_id = 16;";
// $perR = $pdo->prepare($per);
// $perR->bindParam(':id', $id);
// $perR->bindParam(':per', $per);
// $perR->bindParam(':mat', $mat);
// $perR->execute();

// if(($perR) AND ($perR->rowCount() != 0)){
//     $row = $perR->fetch(PDO::FETCH_ASSOC);
//     var_dump($row);

// }
// ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <span id="alu_nota" class="nota"></span>
</body>
</html>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="../assets/js/jquery-3.51.min.js"></script>
<script type="text/javascript">
    function pesqalu(){
           var alu = $("#alu_nota").val()
           res(alu)
           }
    function res(a) { 
            var dados = new FormData();
            dados.append('alu_ano', a);
            $.ajax({
                url: 'http://localhost/boletim/model/consulta.php',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false
            }).done(function(resposta){
                $('#alu').html(resposta);
            });
        }       
</script>  
