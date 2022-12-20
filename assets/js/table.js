var pdf = require("html-pdf");
var ejs = require("ejs");
const mysql = require('mysql');
const fs = require('fs');

var config =
{
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'aluno',
    port: 3306,
    
};

const conn = new mysql.createConnection(config);

conn.connect(
    function (err) { 
        if (err) { 
            console.log("!!! Cannot connect !!! Error:");
            throw err;
        }
        else {
            console.log("Connection established.");
            readData();
        }
    });

   // função para arredondar as notas

   function arredondar(n) {
    return (Math.round(n * 100) / 100).toFixed(2);
}

// fim da função

    function readData(){
        conn.query('SELECT * FROM tb_aluno a INNER JOIN tb_nota n ON a.alu_id = n.alu_id', 
            function (err, results, fields) {
                if (err) throw err;
                else console.log('Selecionado ' + results.length + ' linhas.');
                for (i = 0; i < results.length; i += 1) {

                 


                    var nome = results[i]?.alu_nome;
                    var turma = results[i]?.alu_ano;
                    var turno = results[i]?.alu_turno;
                    var port = (arredondar(results[i]?.nota_port));
                    var mat = (arredondar(results[i]?.nota_mat));
                    var arte = (arredondar(results[i]?.nota_arte));
                    var EF = (arredondar(results[i]?.nota_EF));
                    var EC = (arredondar(results[i]?.nota_EC));
                    var geo = (arredondar(results[i]?.nota_geo));
                    var hist = (arredondar(results[i]?.nota_hist));
                    var cie = (arredondar(results[i]?.nota_cie));
                    var falts = (arredondar(results[i]?.Faltas));
                    // var port2 = (arredondar(results[1]?.nota_port));
                    // var port3 = (arredondar(results[2]?.nota_port));
                    // var port4 = (arredondar(results[3]?.nota_port));
                    // var port5 = (arredondar(results[4]?.nota_port));
                    // var port6 = (arredondar(results[5]?.nota_port));
                    // var port7 = (arredondar(results[6]?.nota_port));
                    // var port8 = (arredondar(results[7]?.nota_port));

                    console.log(nome);
                    console.log(turma);
                    console.log(turno);
                    console.log(port);
                    console.log(mat);
                    console.log(arte);
                    console.log(EF);
                    console.log(EC);
                    console.log(geo);
                    console.log(hist);
                    console.log(cie);
                    console.log(falts);
                    // console.log(port2);
                    // console.log(port3);
                    // console.log(port4);
                    // console.log(port5);
                    // console.log(port6);
                    // console.log(port7);
                    // console.log(port8);
                    // console.log(portP);
                
                    
                    // ejs.renderFile("C:/xampp/htdocs/boletim/assets/pdf/MODELO DE BOLETIM.ejs", {
                    //     nome: nome, turma: turma, turno: turno, port: port, port2: port2, port3: port3, 
                    //     port4: port4, port5: port5, port6: port6, port7: port7, port8: port8
                    // }, (err,html) => {
                    //     if(err){
                    //         console.log("erro")
                    //     } else {
                    //         pdf.create(html,{}).toFile("C:/xampp/htdocs/boletim/boletins/"+nome +".pdf",(err,res) => {
                    //     if (err){
                    //         console.log("Error created :(");
                    //     } else {
                    //         console.log(res);
                    //     }
                    // })
                    
                    //     }
                    // })
                }
                console.log('done.');
            })
        conn.end(
            function (err) { 
                if (err) throw err;
                else  console.log('Closing connection.') 
        });
    };


 


