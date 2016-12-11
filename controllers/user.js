

module.exports = function (app, passport) {
	var User = require('../models/user');
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

	app.get('/userinfo', function(req,res) {
		res.send(req.user);
	});

	app.post('/userinfo/update', function(req,res) {
		User.updateUser(req.user.id,req.body,function() {
			console.log("SUCCESS UPDATE");
		});
	})

	app.get('/logout', function (req, res) {
		req.logout();
		req.session.error = "You have logged out.";
		res.redirect('/login');
	});
}
