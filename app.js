(function () {

	var express = require('express');
	var app = express();
	var path = require('path');
	var passport = require('passport');
	var phpExpress = require('php-express')({

		// assumes php is in your PATH
		binPath: 'php'
	});

	app.set('views', path.join(__dirname, 'views'));
	app.engine('php', phpExpress.engine);
	app.set('view engine', 'php');
	app.all(/.+\.php$/, phpExpress.router);
	app.use(express.static(path.join(__dirname, 'public')));
	app.use(require('express-session')({
		secret: 'keyboard cat',
		resave: true,
		saveUninitialized: true
	}));
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
