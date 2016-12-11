<!DOCTYPE html>

<head>
	<meta charset="utf-8" />
	<title>YouTube Platinum Login</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="Author" content="" />
	<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
	<link href="assets/css/mobile.css" rel="stylesheet" type="text/css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>
	<!-- CORE CSS -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/main.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/simple-sidebar.css" rel="stylesheet" type="text/css" />
</head>

<body>




	<!-- Sidebar -->
	<div id="wrapper">
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<li class="sidebar-brand">
					<?php print $_GET['name'] ?>
					<img class="profile-picture" src="<?php print $_GET['image'] ?>" alt="profile image">
				</li>
				<li>
					<a href="#">My Playlists</a>
				</li>
				<li>
					<a href="#">Settings</a>
				</li>
			</ul>
		</div>
		<!-- /#sidebar-wrapper -->

		<div id="page-content-wrapper">
			<div class="app-container">
				<div class="row">
					<div class="col-md-7">
						<div class="headercont">
							<button id="menu-toggle" class="navbut menu pull-left" data-toggle="collapse" data-target=".nav-main-collapse">
                                    <i class="fa fa-bars fa-3x"></i>
                                </button>
							<div class="headertext">
								<h2>YouTube Platinum</h2>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="searchbar">
							<div class="input-group search-bar">
								<input type="text" id="searchinput" class="form-control" />
								<span id="submitbut" class="input-group-addon bar-style"><i class="glyphicon glyphicon-search"></i></span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="playq">
						<a class="search-thumb" href=""><img class ="thumb" src="http://img.youtube.com/vi/fzQ6gRAEoy0/mqdefault.jpg"/></a>
					</div>
				</div>


				<div class="row">
					<div class="currentvideo">
						<iframe id="vidplayer" width="640" height="360" src="https://www.youtube.com/embed/hQdp7rN6vUs?enablejsapi=1" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
			<div class="footer">
				<div class="footer-bar text-center">
					<div class="controls">
						<button id="backward" type="button" class="btn btn-danger btn-circle btn-lg"><i class="glyphicon glyphicon-backward"></i></button>
						<button id="playpause" type="button" class="btn btn-danger btn-circle btn-xl"><i class="glyphicon glyphicon-play"></i></button>
						<button id="forward" type="button" class="btn btn-danger btn-circle btn-lg"><i class="glyphicon glyphicon-forward"></i></button>
					</div>
				</div>
			</div>
		</div>
		<div>

			<!-- jQuery -->
			<script src="assets/js/jquery.js"></script>
			<!-- Bootstrap Core JavaScript -->
			<script src="assets/js/bootstrap.min.js"></script>
			<script src="assets/js/main.js"></script>
			<!-- Menu Toggle Script -->
			<script>
				$("#menu-toggle ").click(function(e) {
					e.preventDefault();
					$("#wrapper ").toggleClass("toggled ");
				});
			</script>


</body>

</html>
