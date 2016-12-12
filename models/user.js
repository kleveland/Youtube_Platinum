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
			callback(err, rows[0]);
		} else {
			var dat = {
				google_id: prof.id,
				first: prof.name.givenName,
				last: prof.name.familyName,
				prof_img: prof._json.image.url
			};
			connection.query('INSERT INTO users SET ?', dat, function (err, result) {
				if (err) throw err;
				dat.id = result.insertId;
				console.log("RESULT: ", JSON.stringify(result));
				callback(err, dat);
			});
		}
	});
}

exports.addSong = function (playlist, video, cb) {
	var dat = {
		video_id: video,
		playlist_id: playlist
		// thumbnail: video.thumb
	}
		connection.query('INSERT INTO videos SET ?', dat, function (err, result) {
			if (err) { cb(null) } else { cb(result.insertId); };
		});
}

exports.removeSong = function (playlist, video, cb) {
		connection.query('DELETE FROM videos WHERE playlist_id=' + playlist + ' AND video_id="'+ video + '"', function (err, result) {
			if (err) throw err;
			cb();
		});
}


exports.updateUser = function(userid, user, cb) {
	connection.query('UPDATE users SET first = ?, last = ?, prof_img = ? WHERE id=' + userid, [user.first,user.last,user.prof_img],function(err, result){
		if(err) throw err;
		user.id = result.insertId;
		cb(user);
	});
}

exports.createPlaylist = function (userid, playlistname, cb) {
	var dat = {
		user_id: userid,
		name: playlistname
	}
	connection.query('INSERT INTO playlists SET ?', dat, function (err, result) {
		if (err) throw err;
		cb(result.insertId);
	})
}

exports.retrieveSongs = function (playlistid,cb) {
	connection.query('SELECT * FROM videos WHERE playlist_id="' + playlistid + '"', function (err, rows, fields) {
		if (err) throw err;
		cb(rows);
	});
}

exports.retrievePlaylists = function (userid,cb) {
	connection.query('SELECT * FROM playlists WHERE user_id="' + userid + '"', function (err, rows, fields) {
		if (err) throw err;
		cb(rows);
	});
}
