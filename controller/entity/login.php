<?php 

namespace App\entity;

use App\Db\Database;
use \PDO;

// class Login{

//     public function index(){
//         $logDatabase = new Database('tb_prof');
//         $this->id = $logDatabase->validate([
            
//         ]);
//     }
// }

class login{

    //LOGAR O USÚARIO

    public function login($login, $senha){
        session_start();
        global $pdo;


        $sqlEm = "SELECT * FROM tb_prof WHERE prof_login = :profLogin AND prof_pass = :profSenha";
        $sqlEm = $pdo->prepare($sqlEm);
        $sqlEm->bindValue("profLogin", $login);
        $sqlEm->bindValue("profSenha", $senha);
        $sqlEm->execute();

 

        //VERIFICANDO SE OS DADOS COLOCADOS EXISTEM NO BANCO DE DADOS
        if($sqlEm->rowCount()>0){
            $dado = $sqlEm->fetch();
            
            $_SESSION['iduser'] = $dado['prof_id'];

            return true;
        }
        else{
            return false;
        }
    }
}