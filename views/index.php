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
    <div id="wrapper" class="toggled">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <?php print $_GET['name'] ?>
                    <img class="profile-picture" src="<?php print $_GET['image'] ?>" alt="profile image">
                </li>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <div id="page-content-wrapper">
            <div class="app-container">
                <div class="main-container">
                    <header id="topNav">
                        <div class="navheader container">
                            <button id="menu-toggle" class="menu pull-left navtext" data-toggle="collapse" data-target=".nav-main-collapse">
                                <i class="fa fa-bars fa-3x"></i>
                            </button>
                            <h1>YouTube Platinum</h1>
                            <ul class="nav pull-right navtext">
                                <li class="text-small text-white" style="margin-right: 20px;">
                                    Search Bar Here
                                </li>
                            </ul>
                        </div>
                        <div class="navbar-collapse nav-main-collapse collapse pull-left">
                            <nav class="nav-main mega-menu">
                                <ul class="nav nav-pills nav-main scroll-menu" id="topMain">
                                    <li class="text-small text-white hidetext">
                                        <a href="/">Home</a>
                                    </li>
                                    <li class="text-small text-white hidetext">
                                        <a href="/playlists">My Playlists</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </header>


                    <div class="header-container">
                        <div class="info-overlay">
                            <div class="row-fluid info-middle">
                                <iframe width="640" height="360" src="https://www.youtube.com/embed/hQdp7rN6vUs" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="play-queue">
                    <h1>Play Queue</h1>
                </div>
            </div>
            <div class="footer">
                <div class="footer-bar">
                </div>
            </div>
        </div>
    <div>

    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>
