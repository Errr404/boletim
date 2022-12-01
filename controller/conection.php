<?php
    $hostname = "localhost";
    $DB = "aluno";
    $user = "root";
    $pass = "";

    global $pdo;

    try{
        $pdo = new Pdo("mysql:dbname=".$DB."; host=".$hostname,$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo "ERRO:".$e->getMessage();
    }

    ?>