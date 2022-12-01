<?php 
    include_once '../controller/conection.php';
    include_once '../includes/header.php';
    include_once '../includes/sidebar.php';

?>

<body>



    <div class="container">
        <div class="text-center">
            <h1>Boletim Online, bem vindo</h1>
        </div>
        <div class="row d-flex justify-content-center">
        <div id="carouselExampleIndicators" class="carousel slide w-50" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://cdn-icons-png.flaticon.com/512/1088/1088537.png" class="d-block w-100" style="height: 200px;" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://cdn-icons-png.flaticon.com/512/1088/1088537.png" class="d-block w-100" style="height: 200px;" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://cdn-icons-png.flaticon.com/512/1088/1088537.png" class="d-block w-100" style="height: 200px;"alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

</div>
                <div class="container-flex">

                </div>
            </div>
    </div>
 
</body>

</html>