module.exports = function (app, passport) {

	require('./login')(app, passport);
	require('./user')(app, passport);
	require('./playlist')(app, passport);
	require('./search')(app, passport);

	app.get('/', function (req, res) {
		//console.log("USER: ", JSON.stringify(req.user._json.image.url));
		console.log("MAIN PAGE");
		if (req.user) {
			console.log("USER: ", JSON.stringify(req.user));
			res.render('index.php', {
				get: {
					name: req.user.first + " " + req.user.last,
					image: req.user.prof_img
				}
			});
		} else {
			res.redirect('/login');
		}
	});

}
