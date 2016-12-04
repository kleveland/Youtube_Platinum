(function () {

	var express = require('express');
	var app = express();
	var path = require('path');
	var passport = require('passport');

	app.set('views', __dirname + '/views');
	app.use(express.static(path.join(__dirname, 'public')));
	app.use(require('express-session')({ secret: 'keyboard cat', resave: true, saveUninitialized: true }));
	app.use(passport.initialize());
	app.use(passport.session());


	require('./middlewares/auth')(passport);
	require('./controllers')(app, passport);

	//DATA RETRIVEAL
	/*app.get("/api/playlists", function (req, res) {

	});

	app.get("/api/videos", function (req, res) {

	});

	app.get("/api/videos", function (req, res) {

	});*/


	app.listen(3000, function () {
		console.log("LISTENING ON PORT 3000.");
	});

	//app.use(app.router);

}).call(this);