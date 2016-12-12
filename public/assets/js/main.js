var time_update_interval = 0;
var selectedplaylist;
var queue = [];
var playqueue = false;
var queueindex = 0;
var slider;
function resetQueue() {
	playqueue = false;
	$('#playqueue').addClass('btn-primary');
	$('#playqueue').removeClass('btn-success');
	$('#playqueue').text("Start Queue");
}
var tag = document.createElement('script');
tag.id = 'iframe-demo';
tag.src = 'https://www.youtube.com/iframe_api';
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var player;

function onYouTubeIframeAPIReady() {
	player = new YT.Player('vidplayer', {
		events: {
			'onReady': vidReady,
			'onStateChange': vidStateChange
		}
	});
	console.log("APIREADY");
}

var time_update_interval;

function vidReady() {

	// Update the controls on load
	updateThumbnail();
	updateTimerDisplay();
	updateProgressBar();

	// Clear any old interval.
	clearInterval(time_update_interval);
	time_update_interval = setInterval(function () {
		updateTimerDisplay();
		updateProgressBar();
	}, 500);
	// Start interval to update elapsed time display and
	// the elapsed part of the progress bar every second.


	$('#volume-input').val(Math.round(player.getVolume()));
}

// This function is called by initialize()
function updateTimerDisplay() {
	// Update current time text display.
	//console.log(player.getCurrentTime());

	$('#current-time').text(formatTime(player.getCurrentTime()));
	$('#duration').text(formatTime(player.getDuration()));
}

function updateThumbnail() {
	$('#videothumb').empty();
	var videoid = player.getVideoData()['video_id'];
	$('#videothumb').append('<img class="bottomthumb" src="http://img.youtube.com/vi/' + videoid + '/mqdefault.jpg"/>');
}

function populateQueue() {
	$('#queuevideos').empty();
	$.each(queue, function (index, val) {
		$('#queuevideos').append('<a class="playlistsong" id="' + val + '" href="#"><img class="playlist-thumb" src="http://img.youtube.com/vi/' + val + '/mqdefault.jpg"/></a>');
	})
}


// This function is called by initialize()
function updateProgressBar() {
	// Update the value of our progress bar accordingly.
	if (slider) {
		var value = (player.getCurrentTime() / player.getDuration()) * 100;
		/*$('#progress-bar').slider({
		    formatter: function(value) {
		        return 'Current value: ' + value;
		    }
		});*/

		slider.slider('setValue', value);
	}
}

function togglePlay() {
	if (player.getPlayerState() == 2) {
		var element = $('.glyphicon-pause');
		element.removeClass("glyphicon-pause");
		element.addClass("glyphicon-play");
	} else if (player.getPlayerState() == 1) {
		var element = $('.glyphicon-play');
		element.removeClass("glyphicon-play");
		element.addClass("glyphicon-pause");
	}
}

function vidStateChange(event) {
	console.log("STATE WAS CHANGED");
	console.log("TIME: ", player.getCurrentTime());
	if (event.data === 0 && playqueue) {
		console.log("QUEUE", queue);
		queue.splice(0, 1);
		populateQueue();
		if (queue.length == 0) {
			resetQueue();
		} else {
			player.loadVideoById(queue[0], 0, "large");
		}
	}

	updateProgressBar();
	updateTimerDisplay();
	updateThumbnail();
	togglePlay();

}

function populatePlaylists() {
	$('.playlisttitle').remove();
	$.get('/playlists', function (data) {
		console.log(data);
		$.each(data, function (index, val) {
			$('#playlisthead').append('<li id="' + val.id + '" class="playlisttitle"><a href="#">' + val.name + '</a></li>')
		});
	});
}

function updateUser() {
	$('.brand-name').remove();
	$.get('/userinfo', function (data) {
		$('.sidebar-brand').prepend('<div class="brand-name">' + data.first + " " + data.last + '</div>');
	});
}

$(document).ready(function () {
	slider = $('#progress-bar').slider({
		min: 0,
		max: 100
	});


	$('#progress-bar').on('slideStop', function (e) {
		console.log("VALUEOFSLIDER", e);
		// Calculate the new time for the video.
		// new time in seconds = total duration in seconds * ( value of range input / 100 )
		var newTime = player.getDuration() * (e.value / 100);

		// Skip video to new time.
		player.seekTo(newTime);
	});

	$.get('/userinfo', function (data) {
		$('.brand-name').html(data.first + " " + data.last);
		$('.profile-picture').attr("src", data.prof_img);

	});

	populatePlaylists();

	$('#playpause').click(function () {
		if (player.getPlayerState() == 2) {
			player.playVideo();
		} else if (player.getPlayerState() == 1) {
			player.pauseVideo();
		}
		togglePlay();
	});

	$('#addplaylist').click(function () {
		$(".modal-title").text("Add Playlist");
		$(".modal-body").html('<div class="input-group"> <span class="input-group-addon" id="basic-addon1">Playlist Name</span> <input type="text" id="playlist-input" class="form-control" placeholder="Name" aria-describedby="basic-addon1"> </div>');
		$('#modal-button').text("Add Playlist");
		$('#modal-button').off();
		$('#modal-button').click(function () {
			$.post('/playlist/' + encodeURI($('#playlist-input').val()), function (id) {
				console.log("SUCCESS CREATED");
			});
			$('#modalcont').modal('hide');
			populatePlaylists();
		})
	})

	//CONTROLS FOR PLAYLISTS
	var playlist;

	function populateSongs() {
		$('#playlistcontrols #songs').empty();
		$.get('/playlists/' + $(playlist).attr('id'), function (data) {
			$.each(data, function (index, val) {
				$('#playlistcontrols #songs').append('<a class="playlistsong" id="' + val.video_id + '" href="#"><img class="playlist-thumb" src="http://img.youtube.com/vi/' + val.video_id + '/mqdefault.jpg"/></a>');
			})
		});
	}

	$(document.body).on('click', '.playlisttitle', function () {
		playlist = this;
		$('.playlistcont').remove();
		$('#playlistcontrols').prepend('<div class="playlistcont"><div class="selectedplaylist">' + $(playlist).text() + '</div><button id="addsong" type="button" class="songbut btn btn-primary">Add Song</button><button id="removesong" type="button" class="songbut btn btn-primary">Remove Song</button><button id="deleteplaylist" type="button" class="songbut btn btn-danger">Delete Playlist</button></div>');
		populateSongs();
		console.log($(this).text(), $(this).attr('id'));
	});

	$(document.body).on('click', '#addsong', function () {
		$.post('/playlist/add/' + $(playlist).attr('id') + '/' + player.getVideoData()['video_id'], function (data) {
			console.log("ADDED SONG");
			populateSongs();
		})
	})

	$(document.body).on('click', '#removesong', function () {
		$.post('/playlist/remove/' + $(playlist).attr('id') + '/' + player.getVideoData()['video_id'], function (data) {
			console.log("REMOVED SONG");
			$('.playlistsong .selectedvid').remove();
			populateSongs();
		});
	})

	$(document.body).on('click', '#deleteplaylist', function () {
		$.post('/playlist/delete/' + $(playlist).attr('id'), function (data) {
			console.log("REMOVED SONG");
			$('.playlistcont').remove();
			$('#songs').empty();
			populatePlaylists();
		});
	})

	$(document).on("click", ".playlistsong img", function () {
		if (!playqueue) {
			player.loadVideoById($(this).parent().attr('id'), 0, "large");
		}
		$('.selectedvid').each(function () {
			$(this).removeClass('selectedvid');
		})
		$(this).addClass("selectedvid");
	});

	//END CONTROLS FOR PLAYLIST

	//PLAY QUEUE CONTROLS
	$('#addqueue').click(function () {
		console.log("ADDING TO QUEUE");
		queue.push($('.selectedvid').parent().attr('id'));
		populateQueue();
	})

	$('#removequeue').click(function () {
		console.log("REMOVING FROM QUEUE");
		if ($('#queuevideos').has('.selectedvid').length != 0) {
			var index = queue.indexOf($('.selectedvid').attr('id'));
			queue.splice(index, 1);
		}
		populateQueue();
	});

	$('#playqueue').click(function () {
		if (queue.length != 0) {
			playqueue = true;
			$('#playqueue').removeClass('btn-primary');
			$('#playqueue').addClass('btn-success');
			$('#playqueue').text("Stop Queue");
			player.loadVideoById(queue[0], 0, "large");
		}
	})

	$('#export')



	function doSearch() {
		console.log("INPUT:", $("#searchinput").val());
		var input = $("#searchinput").val();
		$.post("/search", {
			dat: input
		}, function (data) {
			//console.log(data.items[0].id.videoId);
			$('#searchvids').empty();
			if (data.items.length == 0) {
				$('#searchvids').append("<div class='errorsearch'>There were no search results for " + $("#searchinput").val() + "!</div>");
			} else {
				$.each(data.items, function (index, val) {
					$('#searchvids').append('<a class="search-thumb" id="' + val.id.videoId + '" href="#"><img class="thumb" src="http://img.youtube.com/vi/' + val.id.videoId + '/mqdefault.jpg"/></a>');
					$('#' + val.id.videoId).click(function () {
						if (!playqueue) {
							player.loadVideoById(val.id.videoId, 0, "large");
						}
						$('.selectedvid').each(function () {
							$(this).removeClass('selectedvid');
						})
						$('#' + val.id.videoId + ' img').addClass("selectedvid");
					})
				})
			}
			$('.searchq').slideDown();
			//player.loadVideoById(data.items[0].id.videoId, 5, "large");
		});
	}
	$('#searchinput').on('keyup', function (e) {
		if (e.keyCode == 13) {
			doSearch();
		}
	});
	$("#submitbut").click(function () {
		doSearch();
	});

	$("#closesearch").click(function () {
		$('.searchq').slideUp();
	});

	$('#changeName').click(function () {
		$(".modal-title").text("Change Display Name");
		$.get('/userinfo', function (data) {
			$(".modal-body").html('' +
				'<div class="input-group">' +
				'<span class="input-group-addon" id="basic-addon1">' +
				'First Name' +
				'</span>' +
				'<input type="text" id="user-first" class="form-control" value="' + data.first + '" aria-describedby="basic-addon1">' +
				'<span class="input-group-addon" id="basic-addon1">' +
				'Last Name' +
				'</span>' +
				'<input type="text" id="user-last" class="form-control" value="' + data.last + '" aria-describedby="basic-addon1">' +
				'</div>'
			);
			var newData = data;
			$('#modal-button').text("Update");
			$('#modal-button').off();
			$('#modal-button').click(function () {
				$.post('/userinfo/update', {
					first: $('#user-first').val(),
					last: $('#user-last').val(),
					prof_img: newData.prof_img
				}, function (data) {
					$('#modalcont').modal('hide');
					$('.brand-name').remove();
					console.log("DATA!!!", data);
					$('.sidebar-brand').prepend('<div class="brand-name">' + data.first + " " + data.last + '</div>');
				});
			})
		});
	});
});


function formatTime(time) {
	time = Math.round(time);

	var minutes = Math.floor(time / 60),
		seconds = time - minutes * 60;

	seconds = seconds < 10 ? '0' + seconds : seconds;

	return minutes + ":" + seconds;

}


$('input[type="submit"]').mousedown(function () {
	$(this).css('background', '#2ecc71');
});
$('input[type="submit"]').mouseup(function () {
	$(this).css('background', '#1abc9c');
});

$('#loginform').click(function () {
	$('.login').fadeToggle('slow');
	$(this).toggleClass('green');
});



$(document).mouseup(function (e) {
	var container = $(".login");

	if (!container.is(e.target) // if the target of the click isn't the container...
		&&
		container.has(e.target).length === 0) // ... nor a descendant of the container
	{
		container.hide();
		$('#loginform').removeClass('green');
	}
});
