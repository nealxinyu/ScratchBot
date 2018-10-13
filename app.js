var express = require('express');
var app = express();

app.get("/",function(req,res) {
	res.render("index.ejs");
	//res.send("hello");
});

app.get("/login", function(req, res) {
	res.render("login.ejs");
});
app.get("/register", function(req, res) {
	res.render("register.ejs");
});
app.get("/help", function(req, res) {
	res.render("help.ejs");
});
app.get("/about", function(req, res) {
	res.render("about.ejs");
});




app.listen(8081, function() {
	console.log("Server has started...")
});