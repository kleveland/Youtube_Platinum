module.exports = function (app, passport) {
	var User = require('../models/user');
	//add song to playlist with "name" and "songid" provided as follows: /playlist/{name}/{songid}/?imgurl={thumbnail image}
	app.post('/playlist/add/:playlistid/:songid', function (req, res) {
		if (req.params.playlistid && req.params.songid) {
			console.log("ADDING VIDEO TO PLAYLIST" + req.params.playlistid + ":", req.params.songid);
			// input video thumbnail from youtube's api or page source parsing
			// var video = { id: req.params.songid, thumb: req.params.imgurl };
			User.addSong(req.params.playlistid, req.params.songid, function(id) {
				res.sendStatus(200);
			});
		}
	});

	app.post('/playlist/remove/:playlistid/:songid', function (req, res) {
		if (req.params.playlistid && req.params.songid) {
			console.log("REMOVING VIDEO FROM PLAYLIST" + req.params.playlistid + ":", req.params.songid);
			// input video thumbnail from youtube's api or page source parsing
			// var video = { id: req.params.songid, thumb: req.params.imgurl };
			User.removeSong(req.params.playlistid, req.params.songid, function(id) {
				console.log("success!", id);
				res.sendStatus(200);
			});
		}
	});

	app.post('/playlist/copy/:playlistname', function (req, res) {
		console.log("ATTEMPTING LOG", req.params.playlistname, req.body.arr);
		var songs = JSON.parse(req.body.arr);
		if (req.params.playlistname && songs) {
			//console.log("ADDING QUEUE " + req.params.playlistname + ":", req.body.arr);
			// input video thumbnail from youtube's api or page source parsing
			// var video = { id: req.params.songid, thumb: req.params.imgurl };
			User.addQueue(req.user.id,req.params.playlistname, songs, function(id) {
				console.log("success!", id);
				res.sendStatus(200);
			});
		}
	});

	app.post('/playlist/delete/:playlistid', function(req, res) {
		if(req.params.playlistid) {
			User.deletePlaylist(req.params.playlistid,function(id) {
				console.log("Playlist removed");
				res.sendStatus(200);
			})
		}
	})

	//create playlist with "name" using: /playlist/{name}
	app.post('/playlist/:name', function (req, res) {
		if (req.params.name) {
			console.log("ADDING PLAYLIST: ", req.params.name);
			User.createPlaylist(req.user.id, decodeURI(req.params.name), function(id) {
				console.log("success!", id);
				res.sendStatus(200);
			});
		}
	});

	//get all playlists of user
	app.get('/playlists', function(req,res) {
		User.retrievePlaylists(req.user.id,function(data) {
			res.send(data);
		})
	});


	app.get('/playlists/:playlistid',function(req,res) {
		User.retrieveSongs(req.params.playlistid,function(data) {
			res.send(data);
		})
	});
}
