<?php 

    include_once '../includes/header.php';
    include_once '../includes/sidebar.php';
    include_once '../controller/conection.php';


$per = $_GET['per'];
$mat = $_GET['mat'];
$alu = $_GET['alu'];

$n = "SELECT $mat as nota FROM tb_nota WHERE nota_período = $per AND alu_id = $alu;";
$ne = $pdo->prepare($n);
$ne->execute();

if($ne->rowCount() == 0) {
    echo "nada aqui";
} while ($row_ano = $ne->fetch(PDO::FETCH_ASSOC)){

    ?>
    <style>
        .notes{
            text-align: center;
            align-items: center;
            margin-top: 2vh;
        }
    </style>
<div class="notes">
    <div class='n1 badge bg-primary text-wrap'>
        <span class='mt-1 valor-nota'>
            <?php echo  $row_ano['nota'] ?>
        </span>
    </div>
</div>
<?php 
}
?>


<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="../assets/js/jquery-3.51.min.js"></script>
<script type="text/javascript">
   
    $.each($(".valor-nota"), function () {
        var valorNota = $(this).html()

        if (valorNota < 6) {
            $(this).parent().removeClass('bg-primary').addClass('bg-danger')
        } else {
            $(this).parent().removeClass('bg-danger').addClass('bg-primary')
        }
    });
</script>