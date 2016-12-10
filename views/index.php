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
</head>
<body>
    <div class="app-container">
        <div class="main-container">
            <header id="topNav">
                <div class="navheader container">
                    <button class="menu pull-left navtext" data-toggle="collapse" data-target=".nav-main-collapse">
                        <i class="fa fa-bars fa-3x"></i>
                    </button>
                    <a class="pull-left navtext" href="/" style="margin-left: 20px;text-decoration: none;">
                        <h1>YouTube Platinum</h1>
                    </a>
                    <ul class="nav pull-right navtext">
                        <li class="text-small text-white" style="margin-right: 20px;">
                            Search Bar Here
                        </li>
                    </ul>
                    <ul class="nav pull-right navtext">
                        <li class="text-small text-white" style="margin-right: 20px;">
                            <a href="/playlists">My Playlists</a>
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
        <div class="footer">
            <div class="footer-bar">
                <div class="profile">
                    <p class="profile-name">
                        <?php print $_GET['name'] ?>
                    </p>
                        <img class="profile-picture" src="<?php print $_GET['image'] ?>" alt="profile image">
                        </img>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
