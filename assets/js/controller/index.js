
(async() => {
const db = require ("./connection");
console.log("connection on");

const aluno = await db.selectCustomer();
console.log(aluno);

})();