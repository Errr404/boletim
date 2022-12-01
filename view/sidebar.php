<!-- Coding by CodingLab | www.codinglabweb.com -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
   <link rel="stylesheet" href="..\assets\css\sidebars.css">
  <link rel="stylesheet" href="../assets/css/styles.css">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Dashboard Sidebar Menu</title> 
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="logo.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Boletim Online</span>
                    <span class="profession">Colégio Arco-Íris</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="notas.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Aluno</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="insert.php">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Gerenciar Boletim</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="aluno.php">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Gerenciar Alunos</span>
                        </a>
                    </li>
                    
            </div>
        </div>

    </nav>


    <script src="../assets/js/script.js"></script>

</body>
</html>