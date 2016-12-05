User = require('../models/user')
	//var passport = require('passport');
var GoogleStrategy = require('passport-google-oauth20').Strategy;
/*
GoogleStrategy.prototype.userProfile = function (token, done) {
	done(null, {})
}*/


module.exports = function (passport) {
	passport.serializeUser(function (user, done) {
		done(null, user);
	});

	passport.deserializeUser(function (user, done) {
		done(null, user);
	});

	passport.use(new GoogleStrategy({
			clientID: "41342813723-r6ilc6hjl3nv4ktonoh5do67tvecfa2d.apps.googleusercontent.com",
			clientSecret: "4_vcGzJ36PRB8LpLnaCnVtwZ",
			callbackURL: "http://localhost:3000/auth/google/callback"
		},
		function (accessToken, refreshToken, profile, cb) {
			User.findOrCreate(profile, function (err,user) {
				console.log("PROFILEID: " + JSON.stringify(err,user));
				return cb(err, user);
			});
		}
	));
}
