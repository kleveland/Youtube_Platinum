module.exports = function (app, passport) {
	var User = require('../models/user');
	//add song to playlist with "name" and "songid" provided as follows: /playlist/{name}/{songid}/?imgurl={thumbnail image}
	app.post('/playlist/:name/:songid', function (req, res) {
		if (req.param.name && req.param.songid) {
			console.log("ADDING VIDEO TO PLAYLIST" + req.param.name + ":", req.param.id);
			var video = { id: req.param.songid, thumb: req.param.imgurl };
			User.addSong(req.user.id, req.param.name, video, function(id) {
				console.log("success!", id);
			});
		}
	});

	//create playlist with "name" using: /playlist/{name}
	app.post('/playlist/:name', function (req, res) {
		if (req.param.name) {
			console.log("ADDING PLAYLIST: ", req.param.name);
			User.createPlaylist(req.user.id, req.param.name, function(id) {
				console.log("success!", id);
			});
		}
	});
}
