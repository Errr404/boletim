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
        conn.query('SELECT alu_nome FROM tb_aluno', 
            function (err, results, fields) {
                if (err) throw err;
                else console.log('Selecionado ' + results.length + ' linhas.');
                for (i = 0; i < results.length; i++) {
                    var nome = JSON.stringify(results[i]?.alu_nome);
                    console.log(nome);
                    ejs.renderFile("C:/xampp/htdocs/boletim/assets/pdf/MODELO DE BOLETIM.ejs", {nome: nome}, (err,html) => {
                        if(err){
                            console.log("erro")
                        } else {
                            pdf.create(html,{}).toFile("C:/xampp/htdocs/boletim/boletins/boletin de.pdf",(err,res) => {
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


 


