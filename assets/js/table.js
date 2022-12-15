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

    function readData(){
        conn.query('SELECT * FROM tb_aluno a INNER JOIN tb_nota n ON a.alu_id = n.alu_id', 
            function (err, results, fields) {
                if (err) throw err;
                else console.log('Selecionado ' + results.length + ' linhas.');
                for (i = 0; i < results.length; i++) {
                    var nome = results[i]?.alu_nome;
                    var turma = results[i]?.alu_ano;
                    var turno = results[i]?.alu_turno;
                    var port = results[i]?.nota_port;

                    console.log(nome);
                    console.log(turma);
                    console.log(turno);
                    console.log(port);
                    
                    ejs.renderFile("C:/xampp/htdocs/boletim/assets/pdf/MODELO DE BOLETIM.ejs", {nome: nome, turma: turma, turno: turno, port: port}, (err,html) => {
                        if(err){
                            console.log("erro")
                        } else {
                            pdf.create(html,{}).toFile("C:/xampp/htdocs/boletim/boletins/"+nome +".pdf",(err,res) => {
                        if (err){
                            console.log("Error created :(");
                        } else {
                            console.log(res);
                        }
                    })
                    
                        }
                    })
                }
                console.log('done.');
            })
        conn.end(
            function (err) { 
                if (err) throw err;
                else  console.log('Closing connection.') 
        });
    };


 


