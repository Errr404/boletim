<?php
//include_once '../controller/conection.php';
include_once '../model/insertAluno.php';
include_once '../model/cadastrar.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../vendor/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <link href="../vendor/bootstrap-5.2.0-dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">


    <title>Boletim Online - Resultados</title>
</head>
<style>
    .menu-links {
        margin-left: -32px;
        align-items: center;
    }
</style>
<?php
include_once '../includes/datatable.php';
?>

<body>
    <?php
    include_once '../includes/sidebar.php';

    ?>

    <div class="container">
        <!-- <div class="row">
            <div class="col-12">
                <div class="card"> 
                    <div class="card-header">       -->
        <form method="POST" id="cadAlu" action="" class="w-50 mx-auto" style="margin: 100px 100px;">
            <input type="text" name="alu_nome" id="name" placeholder="Nome do Aluno" class="form-control" style="margin-top: 5px;">
            <input type="text" name="alu_turno" id="turn" placeholder="Turno" class="form-control" style="margin-top: 5px;">
            <input type="text" name="alu_ano" id="year" placeholder="Ano" class="form-control" style="margin-top: 5px;">
            <input type="text" name="alu_foto" placeholder="foto(n funfa)" class="form-control" style="margin-top: 5px;">
            <input type="submit" form="cadAlu" name="enviar" id="submit" class="btn btn-success" value="enviar" style="margin-top: 10px;">
        </form>
        <!-- </div>
                </div>
            </div>
        </div> -->
    </div>

</body>

<script src="../assets/js/jquery-3.51.min.js"></script>
<script src="../assets/js/reload.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
</script>

</html>