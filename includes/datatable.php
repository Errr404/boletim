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
                <th>Matrícula</th>
                <th>Nome</th>
                <th>Série</th>
                <th>Turno</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
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

    <div class="modal fade" id="visAluModal" tabindex="-1" aria-labelledby="visAluModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visAluModalLabel">Detalhes do Aluno</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-3">Matrícula</dt>
                        <dd class="col-sm-9"><span id="idAlu"></span></dd>

                        <dt class="col-sm-3">Nome</dt>
                        <dd class="col-sm-9"><span id="nomeAlu"></span></dd>

                        <dt class="col-sm-3">Turno</dt>
                        <dd class="col-sm-9"><span id="turnoAlu"></span></dd>

                        <dt class="col-sm-3">Ano</dt>
                        <dd class="col-sm-9"><span id="anoAlu"></span></dd>
                        <dt class="col-sm-3">Detalhes</dt>
                        <dd class="col-sm-9" id='acoesAlu'></dd>
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