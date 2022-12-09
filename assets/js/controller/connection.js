// const Sequelize = require('sequelize');
// const sequelize = new Sequelize('aluno', 'root', '', {
//     host: "localhost",
//     dialect: "mysql"
// })

// sequelize.sync().then(function(){
//     tb_nota.findAll().then(function(tb_nota){
//         console.log(tb_nota.dataValues);
//     })
// })

// sequelize.authenticate().then(function(){
//     console.log('deu certo')
// }).catch(function(error){
//     console.log('n deu certo')
// })

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
        conn.query('SELECT alu_nome FROM tb_aluno limit 1', 
            function (err, results, fields) {
                if (err) throw err;
                else console.log('Selecionado ' + results.length + ' linhas.');
                for (i = 0; i < results.length; i++) {
                    var nome = JSON.stringify(results[i]);
                    console.log(nome);
                }
                console.log('done.');
            })
        conn.end(
            function (err) { 
                if (err) throw err;
                else  console.log('Closing connection.') 
        });
    };

