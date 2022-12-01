<?php 
include_once '../controller/conection.php';
include_once '../model/insertNotas.php';    
include_once '../includes/header.php';
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
    .menu-links{
        margin-left: -32px;
        align-items: center;
    }
</style>
<body>
    <?php 
        include_once '../includes/sidebar.php';
    ?>

    <div class="container">
        <!-- <div class="row"> -->
            <!-- <div class="col-lg-12"> -->
                <!-- <div class="card"> 
                    <div class="card-header"> -->
                        <!-- <div class="card-body card-title">       -->
                <form method="POST" action="" class="w-50 mx-auto" style="margin: 100px ;">

                <select class="form-select" id="alu_ano" name="alu_ano"aria-label="Default select example" style="margin-top: 5px;" onchange="pesqalu()" >
                    <option selected>Selecione a série</option>
                    <?php
                        $selecionar = "SELECT DISTINCT alu_ano FROM tb_aluno ORDER BY alu_ano ASC";
                        $query = $pdo->prepare($selecionar);
                        $query->execute();
                        $listar = $query->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($listar as $option){

                    ?>
                    
                   
                    <option value="<?php echo $option['alu_ano']?>"><?php echo $option['alu_ano']."º ano"?></option>
                    
                            <?php
                        }
                            ?>
                    </select>

                    <select class="form-select" id="alu" name="alu_id"aria-label="Default select example" style="margin-top: 5px;">
                    <option selected>Selecione o aluno</option>

                    </select>

                    <select class="form-select" name="nota_período"aria-label="Default select example" style="margin-top: 5px;">>
                    <option selected value="">Selecione o período</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
                   
                    
                    <select class="form-select" name="nota_tipo"aria-label="Default select example" style="margin-top: 5px;">
                    <option selected>Selecione o tipo de nota</option>
                    <option value="parcial">global</option>
                    <option value="global">parcial</option>
                    </select>


                    <input type="text" name="nota_port" placeholder="Nota de Português" class="form-control" style="margin-top: 5px;">
                    <input type="text" name="nota_mat" placeholder="Nota de Matemática" class="form-control" style="margin-top: 5px;">
                    <input type="text" name="nota_EF" placeholder="Nota de Educação Física" class="form-control" style="margin-top: 5px;">
                    <input type="text" name="nota_hist" placeholder="Nota de História" class="form-control" style="margin-top: 5px;">
                    <input type="text" name="nota_geo" placeholder="Nota de Geografia" class="form-control" style="margin-top: 5px;">
                    <input type="text" name="nota_cie" placeholder="Nota de Ciências" class="form-control" style="margin-top: 5px;">
                    <input type="text" name="nota_EC" placeholder="Nota de Ética e Cidadania" class="form-control" style="margin-top: 5px;">
                    <input type="text" name="nota_arte" placeholder="Nota de Artes" class="form-control" style="margin-top: 5px;">
                    <input type="text" name="Faltas" placeholder="Número de Faltas" class="form-control" style="margin-top: 5px;">
                    



                    
                    <input type="submit" name ="enviar" id="formSend" class="btn btn-success"  value="enviar" style="margin-top: 10px;">
                </form>
                        <!-- </div> -->
                    <!-- </div>
                </div> -->
    </div>
</body>

</html>

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



