	var tag = document.createElement('script');
	tag.id = 'iframe-demo';
	tag.src = 'https://www.youtube.com/iframe_api';
	var firstScriptTag = document.getElementsByTagName('script')[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
	var player;

	function onYouTubeIframeAPIReady() {
		player = new YT.Player('vidplayer', {
			events: {
				'onReady': console.log("READY!"),
				'onStateChange': console.log("STATE CHANGED!")
			}
		});
		console.log("APIREADY");
	}

	$(document).ready(function () {

		$("#submitbut").click(function () {
			console.log("INPUT:", $("#searchinput").val());
			var input = $("#searchinput").val();

			$.post("/search", {
				dat: input
			}, function (data) {
				console.log(data.items[0].id.videoId);
				/*player = new YT.Player('vidplayer', {
					width: 1280,
					height: 720,
					videoId: data.items[0].id.videoId,
					events: {
						'onReady': console.log("READY"),
						'onPlaybackQualityChange': console.log("QUALITYCHANGE"),
						'onStateChange': console.log("STATECHANGE"),
						'onError': console.log("ERROR")
					}
				});*/
				player.loadVideoById(data.items[0].id.videoId, 5, "large");
			});

		})


	})
