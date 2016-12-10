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
                <div class="main-container col-md-9 col-sm-3 col-xs-3">
                    <header id="topNav">
                        <div class="navheader container">
                            <div class="col-md-2">
                                <button id="menu-toggle" class="menu pull-left navtext" data-toggle="collapse" data-target=".nav-main-collapse">
                                    <i class="fa fa-bars fa-3x"></i>
                                </button>
                            </div>
                            <div class="col-md-5">
                                <h1>YouTube Platinum</h1>
                            </div>
                            <div class="col-md-5">
                                <ul class="nav pull-right navtext">
                                    <div class="searchbar">
                                        <div class="input-group search-bar">
                                            <input type="text" ng-model="search" class="form-control" ng-enter="send(search)" />
                                            <span id="submitbut" class="input-group-addon bar-style"><i class="glyphicon glyphicon-search"></i></span>
                                        </div>
                                    </div>
                                </ul>
                            </div>
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
                <div class="play-queue col-md-3 col-sm-3 col-xs-3"">
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
    <script>
        $.post( "/playlist/testplaylist/4", function() {
        });
    </script>


</body>

</html>
