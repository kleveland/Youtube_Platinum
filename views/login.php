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
    <!-- HEADER CONTAINER -->
    <div class="header-container">
        <!-- INFO OVERLAY -->
        <div class="info-overlay">
            <!-- MIDDLE TEXT -->
            <div class="row-fluid info-middle">
                <h1 class="text-center text-large uppercase text-white">
                    YouTube Platinum
                </h1>
                <button class="btn-danger" href="/auth/google">Login With Google</button>
            </div>
            <!-- END OF MIDDLE TEXT -->

        </div>
        <!-- END OF INFO OVERLAY -->
        <!-- VIDEO HEADER -->
        <div class="video-container">
            <div class="video-pattern"></div>
            <video id="video" poster="assets/images/videostill.jpg" preload="auto" loop="true" autoplay="true" muted>
                <source type="video/webm" src="videoheader/promo2.webm" />
            </video>
        </div>
        <!-- END OF VIDEO HEADER -->
    </div>
    <!-- END OF HEADER -->

    <!-- JAVASCRIPT FILES -->
    <script type="text/javascript" src="http://www.youtube.com/player_api"></script>
    <script type="text/javascript" src="assets/plugins/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>