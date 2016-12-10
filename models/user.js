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

exports.addSong = function (userid, playlistname, video, cb) {
	var dat = {
		video_id: video.id,
		thumbnail: video.thumb
	}
	connection.query('SELECT id FROM playlists WHERE name=' + playlistname, function (err, rows, fields) {
		dat.playlist_id = rows[0].id;
	});

	connection.query('INSERT INTO videos SET ?', dat, function (err, result) {
		if (err) throw err;
		cb();
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
exports.retrieveSongs(playlistid,cb){
	connection.query('SELECT id FROM videos WHERE playlist_id=' playlistid, function (err, rows, fields) {
		if (err) throw err;
		cb(rows);
	});
}
exports.retrievePlaylists(userid,cb){
	connection.query('SELECT id FROM playlists WHERE user_id=' userid, function (err, rows, fields) {
		if (err) throw err;
		cb(rows);
	});
}
