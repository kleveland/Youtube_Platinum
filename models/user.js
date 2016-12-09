var mysql = require('mysql');
var connection = mysql.createConnection({
	host: "localhost",
	user: "root",
	password: "",
	database: "youtube_platinum"
});

exports.findOrCreate = function (prof, callback) {
	console.log("PROFID: ", prof.id);
	connection.query('SELECT * FROM users WHERE google_id=' + prof.id, function (err, rows, fields) {
		if (err) throw err;
		console.log("ROWS: ", JSON.stringify(rows));
		if (rows[0]) {
			callback(err,rows[0]);
		} else {
			var dat = {
				google_id: prof.id,
				first: prof.name.givenName,
				last: prof.name.familyName,
				prof_img: prof._json.image.url
			};
			connection.query('INSERT INTO users SET ?', dat, function (err, result) {
				if (err) throw err;
				console.log("RESULT: ", JSON.stringify(result));
				callback(err,dat);
			});
		}
	});
}

exports.create = function (user, text, cb) {
	var comment = {
		user: user,
		text: text,
		date: new Date().toString()
	}

	db.save(comment, cb)
}

exports.get = function (id, cb) {
	db.fetch({
		id: id
	}, function (err, docs) {
		if (err) return cb(err)
		cb(null, docs[0])
	})
}

// Get all comments
exports.all = function (cb) {
	db.fetch({}, cb)
}

// Get all comments by a particular user
exports.allByUser = function (user, cb) {
	db.fetch({
		user: user
	}, cb)
}
