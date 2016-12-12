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
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- HEADER CONTAINER -->
    <div class="header-container">
        <!-- INFO OVERLAY -->
        <div class="info-overlay">
            <!-- MIDDLE TEXT -->
            <div class="row-fluid info-middle">
                <h1 class="text-center text-large uppercase text-white" style="padding-top: 40px; padding-bottom: 20px;font-weight:100;">
					YouTube Platinum
				</h1>
                <?php
					if(!empty($_GET['error'])) {
						echo '<div class="alert alert-danger">' .
							'<strong>Oops!</strong>' . $_GET['error'] .
						'</div>';
					}
				?> <a class="button btn-danger login-btn" href="/auth/google">Login With Google</a>



                            <div id="navthing">
                                <h2><a href="#" id="loginform">About Us</a></h2>
                                <div class="login">
                                    <div class="arrow-up"></div>
                                    <div class="formholder">
                                        <div class="randompad">
                                            <fieldset>
                                                <h3>This is how you use YoutubePlatium:</h3>
                                                <h4>Login using your Gmail</b></h4>
                                                <h4><b id="pictures">Search up you want to watch in the search bar on the top right</b></h4>
                                                <div class="pic">
                                                     <img src="/assets/images/Search.png" id="site">
                                                </div>
                                                <h4><b id="hamburger">Open up Hamburger Menu on the left to select playlists and manage your account</b></h4>
                                                <div class="ham">
                                                     <img src="/assets/images/Hamburger.png" id="site">
                                                </div>
                                                <h4><b id="leftist">Manage your existing playlists to the left of the video</b></h4>
                                                <div class="left">
                                                     <img src="/assets/images/Left.png" id="site">
                                                </div>
                                                <h4><b id="rightist">Create, add and play your playlists to the right of the video</b></h4>
                                                <div class="right">
                                                     <img src="/assets/images/Right.png" id="site">
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>



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
    <script type="text/javascript" src="assets/js/main.js"></script>
</body>

</html>
