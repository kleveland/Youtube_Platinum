module.exports = function (app, passport) {
	var User = require('../models/user');
	//add song to playlist with "name" and "songid" provided as follows: /playlist/{name}/{songid}/?imgurl={thumbnail image}
	app.post('/playlist/:playlistid/:songid', function (req, res) {
		if (req.params.playlistid && req.params.songid) {
			console.log("ADDING VIDEO TO PLAYLIST" + req.params.playlistid + ":", req.params.songid);
			// input video thumbnail from youtube's api or page source parsing
			// var video = { id: req.params.songid, thumb: req.params.imgurl };
			User.addSong(req.user.id, req.params.playlistid, req.params.songid, function(id) {
				console.log("success!", id);
			});
		}
	});

	//create playlist with "name" using: /playlist/{name}
	app.post('/playlist/:name', function (req, res) {
		if (req.params.name) {
			console.log("ADDING PLAYLIST: ", req.params.name);
			User.createPlaylist(req.user.id, decodeURI(req.params.name), function(id) {
				console.log("success!", id);
			});
		}
	});

	//get all playlists of user
	app.get('/playlists', function(req,res) {
		User.retrievePlaylists(req.user.id,function(data) {
			res.send(data);
		})
	});
}
