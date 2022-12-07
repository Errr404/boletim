<?php


include_once '../controller/conection.php';


$dataRequest = $_REQUEST;


//listagem de registros


$col = [

    0 => 'alu_id',
    1 => 'alu_nome',
    2 => 'alu_ano',
    3 => 'alu_turno'

];



//contagem dos registros


$count = "SELECT COUNT(alu_id) AS qnt FROM tb_aluno";

// Acessa o IF quando ha paramentros de pesquisa   
if (!empty($dataRequest['search']['value'])) {
    $count .= " WHERE alu_id LIKE :id";
    $count .= " OR alu_nome LIKE :nome";
    $count .= " OR alu_ano LIKE :ano";
    $count .= " OR alu_turno LIKE :turno";
}


$countResult = $pdo->prepare($count);

if (!empty($dataRequest['search']['value'])) {
    $searchValue = "%" . $dataRequest['search']['value'] . "%";
    $countResult->bindParam(':id', $searchValue, PDO::PARAM_STR);
    $countResult->bindParam(':nome', $searchValue, PDO::PARAM_STR);
    $countResult->bindParam(':ano', $searchValue, PDO::PARAM_STR);
    $countResult->bindParam(':turno', $searchValue, PDO::PARAM_STR);
}

$countResult->execute();
$RowCount = $countResult->fetch(PDO::FETCH_ASSOC);






//recuperação de dados

//query de pesquisa



$sqlAlu = "SELECT alu_id, alu_nome, alu_ano, alu_turno FROM tb_aluno";


if (!empty($dataRequest['search']['value'])) {

    $sqlAlu .= " WHERE alu_id LIKE :id";
    $sqlAlu .= " OR alu_nome LIKE :nome";
    $sqlAlu .= " OR alu_ano LIKE :ano";
    $sqlAlu .= " OR alu_turno LIKE :turno";
}


$sqlAlu .= " ORDER BY " . $col[$dataRequest['order'][0]['column']] . " " . $dataRequest['order'][0]['dir'] ." LIMIT :inicio , :quantidade";

$sqlResult = $pdo->prepare($sqlAlu);
$sqlResult->bindParam(':inicio', $dataRequest['start'], PDO::PARAM_INT);
$sqlResult->bindParam(':quantidade', $dataRequest['length'], PDO::PARAM_INT);

//preenchimento do if com os parametros
if (!empty($dataRequest['search']['value'])) {
    $searchValue = "%" . $dataRequest['search']['value'] . "%";
    $sqlResult->bindParam(':id', $searchValue, PDO::PARAM_STR);
    $sqlResult->bindParam(':nome', $searchValue, PDO::PARAM_STR);
    $sqlResult->bindParam(':ano', $searchValue, PDO::PARAM_STR);
    $sqlResult->bindParam(':turno', $searchValue, PDO::PARAM_STR);
}






//executa

$sqlResult->execute();
while ($rowSql = $sqlResult->fetch(PDO::FETCH_ASSOC)) {

    // var_dump($rowSql);

    extract($rowSql);

    $listar = [];
    $listar[] = $alu_id;
    $listar[] = $alu_nome;
    $listar[] = $alu_ano;
    $listar[] = $alu_turno;
    $listar[] = "
<button type='button' id='$alu_id' class='btn btn-outline-primary btn-sm' onclick='visAlu($alu_id)'><i class='bx bx-id-card'></i></button>
<a href='../model/editar.php?id=$alu_id><button type='button' id='$alu_id' class='btn btn-outline-warning btn-sm' onclick='editUsuario($alu_id)'><i class='bx bxs-edit'></i></button></a>
<a href='../model/delete.php?id=$alu_id><button type='button' id='$alu_id' class='btn btn-outline-danger btn-sm inline' onclick='editUsuario($alu_id)'><i class='bx bxs-trash'></i></button></a>";
    $dados[] = $listar;
}


$dataResult = [
    "draw" => intval($dataRequest['draw']), // Para cada requisição é enviado um número como parâmetro
    "recordsTotal" => intval($RowCount['qnt']), // Quantidade de registros que há no banco de dados
    "recordsFiltered" => intval($RowCount['qnt']), // Total de registros quando houver pesquisa
    "data" => $dados // Array de dados com os registros retornados da tabela usuarios
];


// var_dump($dataResult);


echo json_encode($dataResult);
