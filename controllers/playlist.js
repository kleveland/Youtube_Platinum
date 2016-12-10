module.exports = function (app, passport) {
	var User = require('../models/user');
	//add song to playlist with "name" and "songid" provided as follows: /playlist/{name}/{songid}/?imgurl={thumbnail image}
	app.post('/playlist/:name/:songid', function (req, res) {
		if (req.params.name && req.params.songid) {
			console.log("ADDING VIDEO TO PLAYLIST" + req.params.name + ":", req.params.songid);
			// input video thumbnail from youtube's api or page source parsing
			// var video = { id: req.params.songid, thumb: req.params.imgurl };
			User.addSong(req.user.id, req.params.name, req.params.songid, function(id) {
				console.log("success!", id);
			});
		}
	});

	//create playlist with "name" using: /playlist/{name}
	app.post('/playlist/:name', function (req, res) {
		if (req.params.name) {
			console.log("ADDING PLAYLIST: ", req.params.name);
			User.createPlaylist(req.user.id, req.params.name, function(id) {
				console.log("success!", id);
			});
		}
	});
}
