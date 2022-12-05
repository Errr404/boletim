$(document).ready(function() {
    $('#TableList').DataTable({
        "order": [0, "asc"],
        "paging": true,
        "processing": true,
        "serverSide": true,
        "ajax": "../model/listagem.php",
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json"
}
    });
});

async function visAlu(alu_id){
    // console.log("Acessou:" + alu_id);
    const data = await fetch('../model/visualizar.php?id=' + alu_id);
    const res = await data.json();
    console.log(res);

    if(res['status']){
        const visModal = new bootstrap.Modal(document.getElementById('visAluModal'));
        visModal.show();

        document.getElementById('idAlu').innerHTML = res['data'].alu_id;
        document.getElementById('nomeAlu').innerHTML = res['data'].alu_nome;
        document.getElementById('turnoAlu').innerHTML = res['data'].alu_turno;
        document.getElementById('anoAlu').innerHTML = res['data'].alu_ano;
        document.getElementById('acoesAlu').innerHTML = "<a href='aluNota.php?id= "+ alu_id +"' target='_blank'><button type='button' class='btn btn-outline-primary'>Visualizar</button><a>";
    }
}


