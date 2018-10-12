var express = require('express');
var app = express();

app.get("/",function(req,res) {
	res.render("index.ejs");
	//res.send("hello");
});

app.get("/login", function(req, res) {
	res.render("login.ejs");
});




app.listen(8081, function() {
	console.log("Server has started...")
});