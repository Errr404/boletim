var pdf = require("html-pdf");
var ejs = require("ejs");
const mysql = require('mysql');
const fs = require('fs');
var express = require("express");
const puppeteer =  require('puppeteer');

var app = express();
app.listen(3000);


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

 

function readData(idParam) {

    app.get('/pdf', (req, res) => {
        var idParam = req.body.alu_id;
    
    conn.query('SELECT * FROM tb_aluno a INNER JOIN tb_nota n ON a.alu_id = n.alu_id where n.alu_id = ' +idParam,
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
                var ing = (arredondar(results[i]?.nota_ing));
                var falts = results[i]?.Faltas;



                var port = Number(results[0]?.nota_port);
                var port2 = Number(results[1]?.nota_port);
                var Pmed1 =  (port+port2)/2;
                var port3 = Number(results[2]?.nota_port);
                var port4 = Number(results[3]?.nota_port);
                var Pmed2 =  (port3+port4)/2;
                var port5 = Number(results[4]?.nota_port);
                var port6 = Number(results[5]?.nota_port);
                var Pmed3 =  (port5+port6)/2;
                var port7 = Number(results[6]?.nota_port);
                var port8 = Number(results[7]?.nota_port);
                var Pmed4 =  (port7+port8)/2;
                var soma = port + port2 + port3 + port4 + port5 + port6 + port7 + port8;
                var medfP = (Pmed1 + Pmed2 + Pmed3 + Pmed4)/4;

                var mat = Number(results[0]?.nota_mat);
                var mat2 = Number(results[1]?.nota_mat);
                var Mmed1 =  (mat+mat2)/2;
                var mat3 = Number(results[2]?.nota_mat);
                var mat4 = Number(results[3]?.nota_mat);
                var Mmed2 =  (mat3+mat4)/2;
                var mat5 = Number(results[4]?.nota_mat);
                var mat6 = Number(results[5]?.nota_mat);
                var Mmed3 =  (mat5+mat6)/2;
                var mat7 = Number(results[6]?.nota_mat);
                var mat8 = Number(results[7]?.nota_mat);
                var Mmed4 =  (mat7+mat8)/2;
                var somaM = mat+mat2+mat3+mat4+mat5+mat6+mat7+mat8;
                var medfM = (Mmed1 + Mmed2 + Mmed3 + Mmed4)/4;

                var art = Number(results[0]?.nota_arte);
                var art2 = Number(results[1]?.nota_arte);
                var Amed1 =  (art+art2)/2;
                var art3 = Number(results[2]?.nota_arte);
                var art4 = Number(results[3]?.nota_arte);
                var Amed2 =  (art3+art4)/2;
                var art5 = Number(results[4]?.nota_arte);
                var art6 = Number(results[5]?.nota_arte);
                var Amed3 =  (art5+art6)/2;
                var art7 = Number(results[6]?.nota_arte);
                var art8 = Number(results[7]?.nota_arte);
                var Amed4 =  (art7+art8)/2;
                var somaA = art+art2+art3+art4+art5+art6+art7+art8;
                var medfA = (Amed1 + Amed2 + Amed3 + Amed4)/4;

                var ef = Number(results[0]?.nota_EF);
                var ef2 = Number(results[1]?.nota_EF);
                var EFmed1 =  (ef+ef2)/2;
                var ef3 = Number(results[2]?.nota_EF);
                var ef4 = Number(results[3]?.nota_EF);
                var EFmed2 =  (ef3+ef4)/2;
                var ef5 = Number(results[4]?.nota_EF);
                var ef6 = Number(results[5]?.nota_EF);
                var EFmed3 =  (ef5+ef6)/2;
                var ef7 = Number(results[6]?.nota_EF);
                var ef8 = Number(results[7]?.nota_EF);
                var EFmed4 =  (ef7+ef8)/2;
                var somaEF = ef+ef2+ef3+ef4+ef5+ef6+ef7+ef8;
                var medfEF = (EFmed1 + EFmed2 + EFmed3 + EFmed4)/4;

                var ec = Number(results[0]?.nota_EC);
                var ec2 = Number(results[1]?.nota_EC);
                var ECmed1 =  (ec+ec2)/2;
                var ec3 = Number(results[2]?.nota_EC);
                var ec4 = Number(results[3]?.nota_EC);
                var ECmed2 =  (ec3+ec4)/2;
                var ec5 = Number(results[4]?.nota_EC);
                var ec6 = Number(results[5]?.nota_EC);
                var ECmed3 =  (ec5+ec6)/2;
                var ec7 = Number(results[6]?.nota_EC);
                var ec8 = Number(results[7]?.nota_EC);
                var ECmed4 =  (ec7+ec8)/2;
                var somaEC = ec+ec2+ec3+ec4+ec5+ec6+ec7+ec8;
                var medfEC = (ECmed1 + ECmed2 + ECmed3 + ECmed4)/4;

                var geo = Number(results[0]?.nota_geo);
                var geo2 = Number(results[1]?.nota_geo);
                var Gmed1 =  (geo+geo2)/2;
                var geo3 = Number(results[2]?.nota_geo);
                var geo4 = Number(results[3]?.nota_geo);
                var Gmed2 =  (geo3+geo4)/2;
                var geo5 = Number(results[4]?.nota_geo);
                var geo6 = Number(results[5]?.nota_geo);
                var Gmed3 =  (geo5+geo6)/2;
                var geo7 = Number(results[6]?.nota_geo);
                var geo8 = Number(results[7]?.nota_geo);
                var Gmed4 =  (geo7+geo8)/2;
                var somaG = geo+geo2+geo3+geo4+geo5+geo6+geo7+geo8;
                var medfG = (Gmed1 + Gmed2 + Gmed3 + Gmed4)/4;

                var hist = Number(results[0]?.nota_hist);
                var hist2 = Number(results[1]?.nota_hist);
                var Hmed1 =  (hist+hist2)/2;
                var hist3 = Number(results[2]?.nota_hist);
                var hist4 = Number(results[3]?.nota_hist);
                var Hmed2 =  (hist3+hist4)/2;
                var hist5 = Number(results[4]?.nota_hist);
                var hist6 = Number(results[5]?.nota_hist);
                var Hmed3 =  (hist5+hist6)/2;
                var hist7 = Number(results[6]?.nota_hist);
                var hist8 = Number(results[7]?.nota_hist);
                var Hmed4 =  (hist7+hist8)/2;
                var somaH = hist+hist2+hist3+hist4+hist5+hist6+hist7+hist8;
                var medfH = (Hmed1 + Hmed2 + Hmed3 + Hmed4)/4;

                var cie = Number(results[0]?.nota_cie);
                var cie2 = Number(results[1]?.nota_cie);
                var Cmed1 =  (cie+cie2)/2;
                var cie3 = Number(results[2]?.nota_cie);
                var cie4 = Number(results[3]?.nota_cie);
                var Cmed2 =  (cie3+cie4)/2;
                var cie5 = Number(results[4]?.nota_cie);
                var cie6 = Number(results[5]?.nota_cie);
                var Cmed3 =  (cie5+cie6)/2;
                var cie7 = Number(results[6]?.nota_cie);
                var cie8 = Number(results[7]?.nota_cie);
                var Cmed4 =  (cie7+cie8)/2;
                var somaC = cie+cie2+cie3+cie4+cie5+cie6+cie7+cie8;
                var medfC = (Cmed1 + Cmed2 + Cmed3 + Cmed4)/4;

                var ing = Number(results[0]?.nota_ing);
                var ing2 = Number(results[1]?.nota_ing);
                var Imed1 =  (ing+ing2)/2;
                var ing3 = Number(results[2]?.nota_ing);
                var ing4 = Number(results[3]?.nota_ing);
                var Imed2 =  (ing3+ing4)/2;
                var ing5 = Number(results[4]?.nota_ing);
                var ing6 = Number(results[5]?.nota_ing);
                var Imed3 =  (ing5+ing6)/2;
                var ing7 = Number(results[6]?.nota_ing);
                var ing8 = Number(results[7]?.nota_ing);
                var Imed4 =  (ing7+ing8)/2;
                var somaI = ing+ing2+ing3+ing4+ing5+ing6+ing7+ing8;
                var medfI = (Imed1 + Imed2 + Imed3 + Imed4)/4;

                var falts1 = results[0]?.Faltas+results[1]?.Faltas;
                var falts2 = results[2]?.Faltas+results[3]?.Faltas;
                var falts3 = results[4]?.Faltas+results[5]?.Faltas;
                var falts4 = results[6]?.Faltas+results[7]?.Faltas;
                var faltT = falts1+falts2+falts3+falts4;

                var p = 200 - faltT;
                var p2 = p * 100;
                var p3 = p2 / 200;


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
    console.log(ing);
    console.log(falts);
    console.log(soma);
    console.log(faltT);
    console.log(p3);
    console.log(Pmed1);


    console.log(port2);
    console.log(port3);
    console.log(port4);
    console.log(port5);
    console.log(port6);
    console.log(port7);
    console.log(port8);
    console.log(medfP);

    app.get('/pdf', async(request, response) => {

        const browser = await puppeteer.launch();
        const page = await browser.newPage();

        await page.goto('https://localhost:3000/', {
            waitUntil: 'networkindle001'
        })
    })
    

    // app.get('/' , (request, response)=>{
        
        
    ejs.renderFile("C:/xampp/htdocs/boletim/assets/pdf/MODELO DE BOLETIM.ejs", {
        
        nome: nome, turma: turma, turno: turno,
        port: (arredondar(results[0]?.nota_port)),
        port2: (arredondar(results[1]?.nota_port)),
        Pmed1: arredondar(Pmed1),
        port3: (arredondar(results[2]?.nota_port)),
        port4: (arredondar(results[3]?.nota_port)),
        Pmed2: arredondar(Pmed2),
        port5: (arredondar(results[4]?.nota_port)),
        port6: (arredondar(results[5]?.nota_port)),
        Pmed3: arredondar(Pmed3),
        port7: (arredondar(results[6]?.nota_port)),
        port8: (arredondar(results[7]?.nota_port)),
        Pmed4: arredondar(Pmed4),
        portS: soma,
        medfP : medfP,

        mat: (arredondar(results[0]?.nota_mat)),
        mat2: (arredondar(results[1]?.nota_mat)),
        Mmed1 : arredondar(Mmed1),
        mat3: (arredondar(results[2]?.nota_mat)),
        mat4: (arredondar(results[3]?.nota_mat)),
        Mmed2 : arredondar(Mmed2),
        mat5: (arredondar(results[4]?.nota_mat)),
        mat6: (arredondar(results[5]?.nota_mat)),
        Mmed3 : arredondar(Mmed3),
        mat7: (arredondar(results[6]?.nota_mat)),
        mat8: (arredondar(results[7]?.nota_mat)),
        Mmed4 : arredondar(Mmed4),
        matS : somaM,
        medfM : medfM,

        art: (arredondar(results[0]?.nota_arte)),
        art2: (arredondar(results[1]?.nota_arte)),
        Amed1 : arredondar(Amed1),
        art3: (arredondar(results[2]?.nota_arte)),
        art4: (arredondar(results[3]?.nota_arte)),
        Amed2 : arredondar(Amed2),
        art5: (arredondar(results[4]?.nota_arte)),
        art6: (arredondar(results[5]?.nota_arte)),
        Amed3 : arredondar(Amed3),
        art7: (arredondar(results[6]?.nota_arte)),
        art8: (arredondar(results[7]?.nota_arte)),
        Amed4 : arredondar(Amed4),
        artS : somaA,
        medfA : medfA,

        ef: (arredondar(results[0]?.nota_EF)),
        ef2: (arredondar(results[1]?.nota_EF)),
        EFmed1 : arredondar(EFmed1),
        ef3: (arredondar(results[2]?.nota_EF)),
        ef4: (arredondar(results[3]?.nota_EF)),
        EFmed2 : arredondar(EFmed2),
        ef5: (arredondar(results[4]?.nota_EF)),
        ef6: (arredondar(results[5]?.nota_EF)),
        EFmed3 : arredondar(EFmed3),
        ef7: (arredondar(results[6]?.nota_EF)),
        ef8: (arredondar(results[7]?.nota_EF)),
        EFmed4 : arredondar(EFmed4),
        efS: somaEF,
        medfEF : medfEF,

        ec: (arredondar(results[0]?.nota_EC)),
        ec2: (arredondar(results[1]?.nota_EC)),
        ECmed1 : arredondar(ECmed1),
        ec3: (arredondar(results[2]?.nota_EC)),
        ec4: (arredondar(results[3]?.nota_EC)),
        ECmed2 : arredondar(ECmed2),
        ec5: (arredondar(results[4]?.nota_EC)),
        ec6: (arredondar(results[5]?.nota_EC)),
        ECmed3 : arredondar(ECmed3),
        ec7: (arredondar(results[6]?.nota_EC)),
        ec8: (arredondar(results[7]?.nota_EC)),
        ECmed4 : arredondar(ECmed4),
        ecS: somaEC,
        medfEC : medfEC,

        geo: (arredondar(results[0]?.nota_geo)),
        geo2: (arredondar(results[1]?.nota_geo)),
        Gmed1 : arredondar(Gmed1),
        geo3: (arredondar(results[2]?.nota_geo)),
        geo4: (arredondar(results[3]?.nota_geo)),
        Gmed2 : arredondar(Gmed2),
        geo5: (arredondar(results[4]?.nota_geo)),
        geo6: (arredondar(results[5]?.nota_geo)),
        Gmed3 : arredondar(Gmed3),
        geo7: (arredondar(results[6]?.nota_geo)),
        geo8: (arredondar(results[7]?.nota_geo)),
        Gmed4 : arredondar(Gmed4),
        geoS: somaG,
        medfG : medfG,

        hist: (arredondar(results[0]?.nota_hist)),
        hist2: (arredondar(results[1]?.nota_hist)),
        Hmed1 : arredondar(Hmed1),
        hist3: (arredondar(results[2]?.nota_hist)),
        hist4: (arredondar(results[3]?.nota_hist)),
        Hmed2 : arredondar(Hmed2),
        hist5: (arredondar(results[4]?.nota_hist)),
        hist6: (arredondar(results[5]?.nota_hist)),
        Hmed3 : arredondar(Hmed3),
        hist7: (arredondar(results[6]?.nota_hist)),
        hist8: (arredondar(results[7]?.nota_hist)),
        Hmed4 : arredondar(Hmed4),
        histS: somaH,
        medfH : medfH,

        cie: (arredondar(results[0]?.nota_cie)),
        cie2: (arredondar(results[1]?.nota_cie)),
        Cmed1 : arredondar(Cmed1),
        cie3: (arredondar(results[2]?.nota_cie)),
        cie4: (arredondar(results[3]?.nota_cie)),
        Cmed2 : arredondar(Cmed2),
        cie5: (arredondar(results[4]?.nota_cie)),
        cie6: (arredondar(results[5]?.nota_cie)),
        Cmed3 : arredondar(Cmed3),
        cie7: (arredondar(results[6]?.nota_cie)),
        cie8: (arredondar(results[7]?.nota_cie)),
        Cmed4 : arredondar(Cmed4),
        cieS: somaC,
        medfC : medfC,

        ing: (arredondar(results[0]?.nota_ing)),
        ing2: (arredondar(results[1]?.nota_ing)),
        Imed1: arredondar(Imed1),
        ing3: (arredondar(results[2]?.nota_ing)),
        ing4: (arredondar(results[3]?.nota_ing)),
        Imed2: arredondar(Imed2),
        ing5: (arredondar(results[4]?.nota_ing)),
        ing6: (arredondar(results[5]?.nota_ing)),
        Imed3: arredondar(Imed3),
        ing7: (arredondar(results[6]?.nota_ing)),
        ing8: (arredondar(results[7]?.nota_ing)),
        Imed4: arredondar(Imed4),
        ingS: somaI,
        medfI : medfI,

        falts1: falts1,
        falts2: falts2,
        falts3: falts3,
        falts4: falts4,
        faltS: faltT,
        faltP : p3,




    }, (err, html) => {
        if (err) {
            console.log("erro")
        } else {
            pdf.create(html, {}).toFile("C:/xampp/htdocs/boletim/boletins/" + nome + ".pdf", (err, res) => {
                if (err) {
                    console.log("Error created :(");
                } else {
                    console.log(res);
                }
            })

        }
    })
    return response.send('PDF GERADO');

}
console.log('done.');
            })
conn.end(
    function (err) {
        if (err) throw err;
        else console.log('Closing connection.')
    });
    });
}




