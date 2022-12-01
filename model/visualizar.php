<?php 

include '../controller/conection.php';

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)){
    $view = "SELECT * FROM tb_aluno";
    $viewReturn = $pdo->prepare($view);
    $viewReturn->execute();

    $rowView = $viewReturn->fetch(PDO::FETCH_ASSOC);
    $return = ['status' => true, 'data' => $rowView];
} else {
    $return = ['status' => false, 'msg' => "nenhum usuario encontrado"];
}

echo json_encode($return);

// // $select = "SELECT a.alu_id, a.alu_nome, a.alu_ano, a.alu_turno, n.nota_período, n.nota_tipo, n.nota_port, 
// // n.nota_arte, n.nota_EF, n.nota_hist, n.nota_geo, n.nota_mat, n.nota_cie, n.nota_EC, n.Faltas 
// // FROM tb_aluno a INNER JOIN tb_nota n ON a.alu_id = n.alu_id WHERE a.alu_id = $id ORDER BY n.nota_período ASC";
// // $query = $pdo->prepare($select);
// // $query->execute();

// if (!empty($id)) {
//     $select = "SELECT a.alu_id, a.alu_nome, a.alu_ano, a.alu_turno, n.nota_período, n.nota_tipo, n.nota_port, 
//     n.nota_arte, n.nota_EF, n.nota_hist, n.nota_geo, n.nota_mat, n.nota_cie, n.nota_EC, n.Faltas 
//     FROM tb_aluno a INNER JOIN tb_nota n ON a.alu_id = n.alu_id WHERE a.alu_id = $id ORDER BY n.nota_período ASC";
//     $query = $pdo->prepare($select);
//     $query->execute();

//     if (($query) and ($query->rowCount() != 0)) {
//         $rowQuery = $query->fetch(PDO::FETCH_ASSOC);
//         $return = ['status' => true, 'dados' => $rowQuery];
//     } else {
//         $return = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuário encontrado!</div>"];
//     }
// } else {
//     $return = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuário encontrado!</div>"];
// }
// echo json_encode($return);

// if (($query) AND ($query->rowCount() != 0)){
//     while($row = $query->fetch(PDO::FETCH_ASSOC)){
        
        
//     $p = 200 - $row['Faltas'];
//     $p2 = $p*100;
//     $p3 = $p2/200;
    
//         echo "<center>";
//         echo "<div class='mt-2'>";
//         echo "matricula: " . $row['alu_id']. "<br>";
//         echo "aluno: " . $row['alu_nome']."<br>";
//         echo "periodo relativo as notas e as faltas: " . $row['nota_período']."<br>";
//         echo "nota de portuges: " . $row['nota_port'] . "<br>";
//         echo "nota de matemática: " . $row['nota_mat'] . "<br>";
//         echo "nota de EC: " . $row['nota_EC'] . "<br>";
//         echo "nota de EF: " . $row['nota_EF'] . "<br>";
//         echo "nota de Ciencias: " . $row['nota_cie'] . "<br>";
//         echo "nota de Historia: " . $row['nota_hist'] . "<br>";
//         echo "nota de Geo: " . $row['nota_geo'] . "<br>";
//         echo "Faltas: " . $row['Faltas']."<br>";
//         echo "<span class='text-success'>".$p3. "</span>% de presença";
//         echo "</div>";
//         echo "</center>";

    
//     }
// }
       
?>
