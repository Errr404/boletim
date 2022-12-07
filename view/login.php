<?php

include '../controller/conection.php';
require_once  '../model/login.php';
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../img/logo.svg" rel="icon">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <title>Login</title>
  <style>
    body {
      background-image: url('../img/login.png');
      overflow-x: hidden;
    }

    .f-size {
      font-size: 13px;
    }

    .i-bg {
      background: rgba(0, 0, 0, 0.08);
    }

    .a-text {
      text-decoration: none;
    }

    .vertical {
      border-left: 1px solid black;
      height: 400px;
      position: absolute;
      left: 53%;
    }
  </style>
</head>

<body>

  <div class="row justify-content-center mt-5">


    <div class="row justify-content-center w-25">
      <form method="POST" class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" action="#">

        <p class="h3 mb-3">Entrar</p>
        <div class="col-12 mb-2">
          <div class="col-12 mb-2">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="text" name="login" class="form-control" id="inputEmail">
          </div>
          <div class="col-12 mb-3">
            <label for="inputSenha" class="form-label">Senha</label>
            <input type="text" name="pass" class="form-control" id="inputSenha">
          </div>
          <div class="row mb-3 px-0">
            <div class="col-sm-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  Lembre de mim
                </label>
              </div>
            </div>
          </div>
          <center>
            <button type="submit"  name="submit"class="btn btn-primary px-5 mb-3 ">Entrar</button><br>
          </center>
        </div>
        <div class="text-dark">
          <hr>
        </div>


      </form>
    </div>
  </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>