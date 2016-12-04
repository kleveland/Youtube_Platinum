module.exports = function (app, passport) {
	
	require('./login')(app, passport);
	
	app.get('/', function (req, res) {
		console.log("USER: ", JSON.stringify(req.user._json.image.url));
		console.log("MAIN PAGE");
		res.render('index.php', {
            get: {
                name: req.user.displayName,
				image: req.user._json.image.url
            }
		});
	});
	
}
