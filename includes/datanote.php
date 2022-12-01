<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Boletim Online</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">

</head>
<div class="container mt-3 d-flex justify-content-center w-50" id="table">

    <table id="TableList" class="table table-dark table-hover display ml-3 w-100">
        <thead>
            <tr>
                <th class="col">Matérias</th>
                <th class="col">1a Per</th>
                <th class="col">2a Per</th>
                <th class="col">3a Per</th>
                <th class="col">4a Per</th>
            </tr>
        </thead>
        <tbody class="table table-striped display ml-3 w-100">
            <tr>
                <th class="col">Português</th>
                <td class="col"> 2</td>
                <td class="col"> 2</td>
                <td class="col"> 2 </td>
                <td class="col"> 2 </td>
            </tr>
            <tr>
                <th class="col">matemática</th>
                <td class="col"> 2</td>
                <td class="col"> 2</td>
                <td class="col"> 2 </td>
                <td class="col"> 2 </td>
            </tr>
            <tr>
                <th class="col">Educação Física</th>
                <td class="col"> 2</td>
                <td class="col"> 2</td>
                <td class="col"> 2 </td>
                <td class="col"> 2 </td>
            </tr>
            <tr>
                <th class="col">Artes e Educação</th>
                <td class="col"> 2</td>
                <td class="col"> 2</td>
                <td class="col"> 2 </td>
                <td class="col"> 2 </td>
            </tr>
            <tr>
                <th class="col">História</th>
                <td class="col"> 2</td>
                <td class="col"> 2</td>
                <td class="col"> 2 </td>
                <td class="col"> 2 </td>
            </tr>
            <tr>
                <th class="col">Geografia</th>
                <td class="col"> 2</td>
                <td class="col"> 2</td>
                <td class="col"> 2 </td>
                <td class="col"> 2 </td>
            </tr>
            <tr>
                <th class="col">Etica e Cidadania</th>
                <td class="col"> 2</td>
                <td class="col"> 2</td>
                <td class="col"> 2 </td>
                <td class="col"> 2 </td>
            </tr>
        </tbody>

    </table>
    
    <div class="modal fade" id="visUsuarioModal" tabindex="-1" aria-labelledby="visUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visUsuarioModalLabel">Detalhes do Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-3">ID</dt>
                        <dd class="col-sm-9"><span id="aluId"></span></dd>

                        <dt class="col-sm-3">Nome</dt>
                        <dd class="col-sm-9"><span id="aluNome"></span></dd>

                        <dt class="col-sm-3">Salário</dt>
                        <dd class="col-sm-9"><span id="aluAno"></span></dd>

                        <dt class="col-sm-3">Idade</dt>
                        <dd class="col-sm-9"><span id="aluTurno"></span></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

</div>

</html>
<!-- <script src = "../assets/js/custom.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script> -->


<script>
    // $(document).ready(function() {
    //     $('#TableList').DataTable({
    //         "processing": true,
    //         "serverSide": true,
    //         "bDestroy": true,
    //         "ajax": "../model/listagem.php"
    //     });
    // });
</script>