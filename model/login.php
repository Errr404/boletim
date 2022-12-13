<?php

require_once '../vendor/autoload.php';


use \App\entity\login;


session_start();
$_SESSION['iduser'] = false;

if (isset($_POST['login']) && !empty($_POST['pass'])) {

    $logProf = new login();
    $login = addslashes($_POST['login']);
    $senha = addslashes($_POST['pass']);


    if ($logProf->login($login, $senha) == true) {
        $_SESSION['login'] = $login;
        $_SESSION['pass'] = $senha;
        header('location: ../view/home.php');
    }
} else {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    // header('location:index.php');
}
// exit('falha ao logar');
