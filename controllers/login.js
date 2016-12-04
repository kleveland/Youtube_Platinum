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
	});
	
	app.get('/auth/google/success', function (req, res) {
		console.log("USERSS: ", res.user);
		res.redirect('/');
	});

}