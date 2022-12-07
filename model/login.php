<?php 

require_once '../vendor/autoload.php';


use \App\entity\login;


session_start();
    if(isset($_POST['login']) && !empty($_POST['pass'])){
        $logProf = new login();
        $login = addslashes($_POST['login']);
        $senha = addslashes($_POST['pass']);
        
        if ($logProf->login($login, $senha)==true){
            if(isset($_SESSION['iduser'])){
                header('location: ../view/index.php');
            }
        }

        else {
                // header('location: ../view/login.php');
                echo "Falha ao logar";
        }
        
        
    } 