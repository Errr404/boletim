$('#cadAlu').submit(function(e){
//    e.preventDefault();

    var a_name = $('#name').val();
    var a_turn = $('#turn').val();
    var a_year = $('#year').val();

    $.ajax({
        url:'http://localhost/boletim/model/aluno.php',
        method:'POST',
        data:{nome: a_name, turno: a_turn, ano: a_year},
        dataType:'json'
    }).done(function(result) {
        console.log(result);

    });
});