const { query } = require("connection");

module.exports = {
  get: function (req, res) {
    query("SELECT * FROM tb_nota", function (error, result, field) {
      console.log(result); // resultado obtido
      if (error) {
        res.json(error);
      } else {
        res.json(result);
      }
    });
  },
};