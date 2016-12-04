var mysql = require('mysql');
var connection = mysql.createConnection({
	host: 'localhost',
	user: 'root',
	password: '',
	database: "youtube_platinum"
});

exports.findOrCreate = function (prof, callback) {
	
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