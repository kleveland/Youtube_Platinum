module.exports = function (app, passport) {
	var auth = require('../middlewares/auth');

	app.get('/auth/google',
		passport.authenticate('google', {
			scope: ['profile']
		})
	);

	app.get('/auth/google/callback',
		passport.authenticate('google', {
			failureRedirect: '/auth/google/failure',
			successRedirect: '/auth/google/success'
		})
	);

	app.get('/auth/google/failure', function (req, res) {
		console.log("fail!");
		req.session.error = "It seems you were unable to login!";
		res.redirect("/login");
	});
	
	app.get('/auth/google/success', function (req, res) {
		console.log("success!");
		req.session.error = undefined;
		res.redirect("/");
	});

}
