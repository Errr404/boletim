var pdf = require("html-pdf");
var ejs = require("ejs");

var nome = "Pedro";

ejs.renderFile("C:/xampp/htdocs/boletim/assets/pdf/MODELO DE BOLETIM.ejs", {nome: nome}, (err,html) => {
    if(err){
        console.log("erro")
    } else {
        pdf.create(html,{}).toFile("./boletins/hahaha_woman.pdf",(err,res) => {
    if (err){
        console.log("Error created :(");
    } else {
        console.log(res);
    }
})

    }
})
 


