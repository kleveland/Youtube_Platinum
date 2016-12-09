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
    <header id="header" class="ml-header" style="position: fixed; margin-top: 0px; height: 62px; top: 0px;">
        <div class="fix-width">
            <div class="left-header">
                <a class="menu-logo" href="/">
                    <img alt="menu" src="assets/images/56763.png" width="15%">
                </a>
                <h1 class="text-center text-large uppercase text-black" style="padding-bottom: 20px;font-weight:100;">
                    YouTube Platinum
                </h1>
            </div>
            <div class="right-header">
                <nav class="menu">
                    <ul class="links">
                        <li class="listlinks"><a href="#home">Home</a></li>
                        <li class="listlinks"><a href="#playlist">Playlist</a></li>
                    </ul>
                </nav>
                <div2 class="profile">
                    <p class="profile-name">
                        <?php print $_GET['name'] ?>
                    </p>
                    <a class="profile-picture" href="/">
                        <img src="<?php print $_GET['image'] ?>" alt="profile image"/>
                    </a>
                </div2>
            </div>
        </div>
    </header>
    <div class="youtubeplatplayer">
        <div class="video-player">
            <iframe width="640" height="360" src="https://www.youtube.com/embed/hQdp7rN6vUs" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="play-queue">
            Play Queue
        </div>
    </div>

</body>

</html>
