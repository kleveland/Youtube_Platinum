<!DOCTYPE html>

<head>
	<meta charset="utf-8" />
	<title>YouTube Platinum Login</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="Author" content="" />
	<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>
	<!-- CORE CSS -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Tutorial</h4>
				</div>
				<div class="modal-body">
					<h3>This is how you use YoutubePlatium:</h3>
					<h4>Login using your Gmail</b>
					</h4>
					<h4><b id="pictures">Search up videos via the search bar on the top right</b></h4>
					<div class="pic">
						<img src="/assets/images/Search.png" id="site">
					</div>
					<h4><b id="hamburger">Use the menu on the top left to select playlists and manage your account</b></h4>
					<div class="ham">
						<img src="/assets/images/Hamburger.png" id="site">
					</div>
					<h4><b id="leftist">Manage your existing playlists to the left of the video display</b></h4>
					<div class="left">
						<img src="/assets/images/Left.png" id="site">
					</div>
					<h4><b id="rightist">Create, add, and play your playlists on the right of the video display</b></h4>
					<div class="right">
						<img src="/assets/images/Right.png" id="site">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>
	<!-- HEADER CONTAINER -->
	<div class="header-container">
		<!-- INFO OVERLAY -->
		<div class="info-overlay">
			<!-- MIDDLE TEXT -->
			<div class="row-fluid info-middle">
				<div class="headertextlogin">
					<div class="headerlogintext"><b>YouTube</b> Platinum
					</div>
				</div>
				<div class="alertlogin">
					<?php
					if(!empty($_GET['error'])) {
						echo '<div class="alert alert-danger" id="success-alert"><button type="button" class="close" data-dismiss="alert">x</button>' . $_GET['error'] .
						'</div>';
					}
				?>
				</div>

				<a class="login-btn btn btn-danger btn-lg" href="/auth/google">Login With Google</a>

				<button type="button" class="login-btn btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tutorial</button>


			</div>
			<!-- END OF MIDDLE TEXT -->
		</div>
		<!-- END OF INFO OVERLAY -->
	</div>
	<!-- END OF HEADER -->
	<!-- JAVASCRIPT FILES -->
	<script type="text/javascript" src="http://www.youtube.com/player_api"></script>
	<script type="text/javascript" src="assets/plugins/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

	<script>
		$("#success-alert").fadeTo(1500, 500).slideUp(1000, function(){
			$("#success-alert").alert('close');
		});
	</script>
</body>

</html>
