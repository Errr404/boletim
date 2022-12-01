<?php

// include_once 'conection.php';

class notas {
public function getAVG($id, $per, $mat) {

    global $pdo;


    $id = $_GET['alu'];
    $per = $_GET['per'];
    $mat = $_GET['mat'];

    

    $per = "SELECT :mat , :per, :id FROM tb_nota WHERE nota_período = :per and alu_id = :id;";
    $perR = $pdo->prepare($per);
    $perR->bindParam(':id', $id);
    $perR->bindParam(':per', $per);
    $perR->bindParam(':mat', $mat);
    $perR->execute();



    if(($perR) AND ($perR->rowCount() != 0)){
        $row = $perR->fetch(PDO::FETCH_ASSOC);
        var_dump($row);
    
    }


}

public function editNotas ($per, $alu, $mat){
    $per = $_GET['per'];
    $alu = $_GET['alu'];
    $mat = $_GET['nota'];

    $per = "";
}
}

