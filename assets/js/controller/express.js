var express = require("express");
var app = express();

const TodoController = require("allController");

app.get("/", function (req, res) {
  res.send("Service Init ...");
});

app.get("/todo", TodoController.get);

app.listen(3000, function () {
  console.log("Service Web Port 3000!");
});