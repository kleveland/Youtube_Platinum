var time_update_interval = 0;
var selectedplaylist;

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

var time_update_interval = setInterval(function () {
	//updateTimerDisplay();
	updateProgressBar();
}, 500);

function vidReady() {
	console.log("READY!!");
	// Update the controls on load
	updateTimerDisplay();
	updateProgressBar();

	// Clear any old interval.
	clearInterval(time_update_interval);

	// Start interval to update elapsed time display and
	// the elapsed part of the progress bar every second.


	$('#volume-input').val(Math.round(player.getVolume()));
}

// This function is called by initialize()
function updateTimerDisplay() {
	// Update current time text display.
	$('#current-time').text(formatTime(player.getCurrentTime()));
	$('#duration').text(formatTime(player.getDuration()));
}


// This function is called by initialize()
function updateProgressBar() {
	// Update the value of our progress bar accordingly.
	if (player) {
		$('#progress-bar').val((player.getCurrentTime() / player.getDuration()) * 100);
	}
}

$('#progress-bar').on('mouseup touchend', function (e) {

	// Calculate the new time for the video.
	// new time in seconds = total duration in seconds * ( value of range input / 100 )
	var newTime = player.getDuration() * (e.target.value / 100);

	// Skip video to new time.
	player.seekTo(newTime);
});

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

function vidStateChange() {
	console.log("STATE WAS CHANGED");
	console.log("TIME: ", player.getCurrentTime());
	updateProgressBar();
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


	$(document.body).on('click', '.playlisttitle', function () {
		$('#playlistcontrols').empty();
		$('#playlistcontrols').html('<div>' + $(this).text() + '</div');

		console.log($(this).text(), $(this).attr('id'));
	});

	$("#submitbut").click(function () {
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
						player.loadVideoById(val.id.videoId, 0, "large");
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
