<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boletim Online</title>

    <link rel="stylesheet" href="../vendor/bootstrap-5.2.0-dist/css/bootstrap-grid.min.css">
    <link href="../vendor/bootstrap-5.2.0-dist/js/bootstrap.bundle.min.js">

    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
    <link type="text/js" href="../assets/js/scripts.js">

</head>

<body>

    <?php
    session_start();
    include_once '../includes/header.php';
    include_once '../includes/preloader.php';
    include_once '../controller/conection.php';


    //$alu = $_GET['nome'];
    $alu_id = $_GET['id'];


    $per = "SELECT DISTINCT nota_período FROM tb_nota WHERE alu_id = $alu_id ORDER BY nota_período ASC";
    $resPer = $pdo->prepare($per);
    $resPer->execute();

    if ($resPer->rowCount() == 0) {

        include_once('../includes/sidebar.php');
        echo "<center><span>nenhum registro encontrado</span><center>";
    }

    while ($row_ano = $resPer->fetch(PDO::FETCH_ASSOC)) {
        //$ano = $row_ano['alu_ano'];
        //$aluid = $row_ano['alu_id'];
        $periodo = $row_ano['nota_período'];
        include_once('../includes/sidebar.php');
        //echo "<center>ano: ".$ano."</center>";

        echo "
    <div class='card text-white bg-dark w-25 mx-auto mt-3 mb-4'>
        <div class='card-body mx-auto'>
        
            <a href='aluMed.php?id=$periodo&alu=$alu_id' class='text-white'
                style='text-decoration: none;'>" . $periodo . " período</a><br>
        
        </div>
    </div>";
    }
    echo " 
<div class='card text-white bg-primary w-25 mx-auto mt-3 mb-4'>
    <div class='card-body mx-auto'>
    
        <a  href='http://localhost:3000/'
        class='text-white' onclick='readData(); value=".$alu_id."' style='text-decoration: none;'>Gerar PDF
        </a>
       
    </div>
</div>";
    echo "
<div class='card text-white bg-primary w-25 mx-auto mt-3 mb-4'>
    <div class='card-body mx-auto'>
<cente><a target='_blank' href='../model/VisaoG.php?id=$alu_id' 
        class='text-white' 
        style='text-decoration: none;'>Visao Geral</a>
    </div>
</div>";



    ?>

</body>
<script type="module" src="../assets/js/src/table.js"></script>
<script >
    function readData(idParam) {
        const urlParams = new URLSearchParams(window.location.search);
        const idParam = urlParams.get('id');
        console.log(idParam);

        $.ajax({
        url: 'https://localhost:3000/?id=' + idParam,
        type: 'POST',
        data: JSON.stringify(idParam),
        contentType: false,
        success: () => {
            console.log("Sucesso!!");
        }
    });
}
    
</script>



<script src="../assets/js/preloader.js"></script>


</html>