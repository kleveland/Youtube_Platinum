var time_update_interval = 0;

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

	function vidReady() {
		console.log("READY!!");
        // Update the controls on load
        updateTimerDisplay();
        updateProgressBar();

        // Clear any old interval.
        clearInterval(time_update_interval);

        // Start interval to update elapsed time display and
        // the elapsed part of the progress bar every second.
        time_update_interval = setInterval(function () {
            updateTimerDisplay();
            updateProgressBar();
        }, 1000);


        $('#volume-input').val(Math.round(player.getVolume()));
    }


    // This function is called by initialize()
    function updateTimerDisplay(){
        // Update current time text display.
        $('#current-time').text(formatTime( player.getCurrentTime() ));
        $('#duration').text(formatTime( player.getDuration() ));
    }


    // This function is called by initialize()
    function updateProgressBar(){
        // Update the value of our progress bar accordingly.
        $('#progress-bar').val((player.getCurrentTime() / player.getDuration()) * 100);
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
		togglePlay();
	}

	$(document).ready(function () {

		$('#playpause').click(function () {
			if (player.getPlayerState() == 2) {
				player.playVideo();
			} else if (player.getPlayerState() == 1) {
				player.pauseVideo();
			}
			togglePlay();
		})


		$("#submitbut").click(function () {
			console.log("INPUT:", $("#searchinput").val());
			var input = $("#searchinput").val();

			$.post("/search", {
				dat: input
			}, function (data) {
				console.log(data.items[0].id.videoId);
				$('.playq').empty();
				$.each(data.items, function (index, val) {
						$('.playq').append('<a class="search-thumb" id="' + val.id.videoId + '" href="#"><img class="thumb"src="http://img.youtube.com/vi/' + val.id.videoId + '/mqdefault.jpg"/></a>');
						$('#' + val.id.videoId).click(function () {
							player.loadVideoById(val.id.videoId, 0, "large");
						})
					})
					//player.loadVideoById(data.items[0].id.videoId, 5, "large");
			});

		})


	})
