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
	<link href="assets/css/simple-sidebar.css" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.5.3/css/bootstrap-slider.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<!-- Modal -->
	<div class="modal fade" id="modalcont" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
					<h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button id="modal-button" type="button" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Sidebar -->
	<div id="wrapper">
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<li class="sidebar-brand">
					<div class="brand-name"></div>
					<img class="profile-picture" alt="profile image">
				</li>
				<li class="sidebar-logout">
					<a href="/logout">Logout</a>
				</li>
				<li id="playlisthead">
					<div class="headernav">My Playlists</div>
				</li>
				<li id="addnewplaylist">
					<a href="#" id="addplaylist" data-toggle="modal" data-target="#modalcont"> + Add Playlist</a>
				</li>
				<li>
					<div class="headernav">Settings</div>
				</li>
				<li>
					<a href="#" id="changeName" data-toggle="modal" data-target="#modalcont">Change Display Name</a>
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
								<h2><b>YouTube</b> Platinum</h2>
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
					<div class="col-md-12">
						<div class="searchq">
							<div class="texthead">Search Results<i id="closesearch" class="float-right glyphicon glyphicon-remove"></i></div>
							<div id="searchvids">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<div class="playlistq">
							<div class="texthead">Manage Playlist</div>
							<div id="playlistcontrols">
								<div id="songs">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="currentvideo">
							<iframe id="vidplayer" class="video" width="640" height="360" src="https://www.youtube.com/embed/UqyT8IEBkvY?enablejsapi=1&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
					<div class="col-md-2">

						<div class="playq">
							<div class="texthead">Play Queue</div>
							<div id="queuevids">
								<button id="playqueue" type="button" class="songbut btn btn-primary">Start Queue</button>
								<button id="stopqueue" type="button" class="songbut btn btn-primary">Stop Queue</button>
								<button id="exportqueue" type="button" class="songbut btn btn-primary">Export Queue</button>
								<div class="songbutcont">
									<button id="addqueue" type="button" class="songbut50 btn btn-primary">Add</button>
									<button id="removequeue" type="button" class="songbut50 btn btn-primary">Remove</button>
								</div>
								<div class="songbutcont">
									<button id="upqueue" type="button" class="songbut50 btn btn-success">Up</button>
									<button id="downqueue" type="button" class="songbut50 btn btn-success">Down</button>
								</div>
								<div id="queuevideos">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="footerfiller">
							</div>
						</div>
					</div>
					<div class="row">
						<!-- FOOTER -->
						<div class="footer">
							<div class="footer-bar text-center">
								<div class="progress-bar-new">
									<div class="videotime">
                                        <input id="progress-bar" data-slider-id='progress-bar' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1"  data-slider-tooltip="hide" />
								</div>
								</div>
								<div class="controls-container">
									<div class="row">
										<div class="thumbnail">
											<div id="videothumb">

											</div>
										</div>
										<div class="controls">
											<button id="backward" type="button" class="btn btn-danger btn-circle btn-lg btn-left"><i class="glyphicon glyphicon-backward"></i></button>
											<button id="playpause" type="button" class="btn btn-danger btn-circle btn-xl"><i class="glyphicon glyphicon-play"></i></button>
											<button id="forward" type="button" class="btn btn-danger btn-circle btn-lg btn-right"><i class="glyphicon glyphicon-forward"></i></button>
										</div>

										<div class="time">
											<ul>
												<li>
													<p><span id="current-time">0:00</span> / <span id="duration">0:00</span></p </li>
											</ul>

										</div>
									</div>
								</div>
								<!-- END OF FOOTER -->
							</div>
						</div>
						<!-- END OF APP CONTAINER -->
					</div>
					<!-- END OF PAGE CONTENT WRAPPER -->
					<div>
						<!-- END OF WRAPPER -->

				<!-- jQuery -->
				<script src="assets/js/jquery.js"></script>
				<!-- Bootstrap Core JavaScript -->
				<script src="assets/js/bootstrap.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.5.3/bootstrap-slider.js"></script>
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
