module.exports = function (app, passport) {
	app.get('/login', function (req, res) {
		console.log("LOGIN PAGE");
		if (req.session.error) {
			console.log("ERRORRR");
			res.render('login.php', {
				get: {
					error: req.session.error
				}
			});
		} else {
			res.render('login.php');
		}
	});

	app.get('/logout', function (req, res) {
		req.logout();
		req.session.error = "You have logged out.";
		res.redirect('/login');
	});
}