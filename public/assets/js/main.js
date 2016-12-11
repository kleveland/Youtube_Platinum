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
	}

	function vidStateChange() {
		console.log("STATE WAS CHANGED");
		console.log("TIME: ", player.getCurrentTime());
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

	$(document).ready(function () {

		$('#playpause').click(function () {
			if (player.getPlayerState() == 2) {
				player.playVideo();
				var element = $('.glyphicon-pause');
				element.removeClass("glyphicon-pause");
				element.addClass("glyphicon-play");
			} else if (player.getPlayerState() == 1) {
				player.pauseVideo();
				var element = $('.glyphicon-play');
				element.removeClass("glyphicon-play");
				element.addClass("glyphicon-pause");
			}
		})


		$("#submitbut").click(function () {
			console.log("INPUT:", $("#searchinput").val());
			var input = $("#searchinput").val();

			$.post("/search", {
				dat: input
			}, function (data) {
				console.log(data.items[0].id.videoId);
				player.loadVideoById(data.items[0].id.videoId, 5, "large");
			});

		})


	})
