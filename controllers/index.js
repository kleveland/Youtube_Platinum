module.exports = function (app, passport) {
	
	require('./login')(app, passport);
	
	app.get('/', function (req, res) {
		console.log("USER: ", JSON.stringify(req.user));
		console.log("MAIN PAGE");
	});
	
}