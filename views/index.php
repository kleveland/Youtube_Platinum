<!DOCTYPE html>
      <head>
          <meta charset="utf-8" />
          <title>YouTube Platinum</title>
          <meta name="keywords" content="" />
          <meta name="description" content="" />
          <meta name="Author" content="Brandon Kang" />
          <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
          <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
          <!-- mobile settings -->
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <!--<link href="assets/css/responsive.css" rel="stylesheet" /> -->
          <link href="assets/css/mobile.css" rel="stylesheet" type="text/css" />
          <!-- FONTS -->
          <link href='http://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>
          <!-- CORE CSS -->
          <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
          <link href="assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
          <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
      </head>
      <body>
		  TEST
		  <?php print $_GET['name'] ?>
		  <img src="<?php print $_GET['image'] ?>" alt="profile image"/>
            <header id="topNav">
                  <!-- NAVIGATION BAR -->
                  <div class="navheader container">
                        <!-- Mobile Menu Button -->
                        <button class="btn pull-left" data-toggle="collapse" data-target=".nav-main-collapse">
                              <i class="fa fa-bars"></i>
                        </button>
                        <a class="pull-left logo" href="/">
                              <img alt="Brand" src="assets/images/speckle-banner.png" width="15%">
                        </a>
                  </div>
                  <!-- COLLAPSABLE NAVIGATION BAR -->
                        <div class="navbar-collapse nav-main-collapse collapse pull-left">
                              <nav class="nav-main mega-menu">
                                    <ul class="nav nav-pills nav-main scroll-menu" id="topMain">
                                        <li class="text-small text-white hidetext">
                                            <a href="/">Home</a>
                                        </li>
                                    </ul>
                              </nav>
                        </div>
                  <!-- END OF NAVIGATION BAR -->
            </header>

            <!-- HEADER CONTAINER -->
            <div class="header-container">
                  <!-- INFO OVERLAY -->
                  <div class="info-overlay">
                        <!-- MIDDLE TEXT -->
                        <div class="row-fluid info-middle">
                            <h1 class="text-center text-large uppercase text-white">
                                Search Redefined
                            </h1>
                            <p class="text-center text-small text-white">
                                Find housing from every listing available.
                            </p>
                            <div class="signup-banner">
                                <div class="signup-overlay" style="text-align:center;">
                                </div>
                            </div>
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

            <!-- FOOTER -->
            <div class="footer">
                <div class="footer-bar">
                    <div class="row">
                        <div class="col-md-4">
                            <p>
                                <img src="assets/images/speckle-logo.png" style="width:100px;">
                            </p>
                        </div>
                        <div class="col-md-4 text-center text-xs">
                            <p>Connect With Us!</p>
                            <a class="btn-footer" href="" target="_blank">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a class="btn-footer" href="" target="_blank">
                                <i class="fa fa-youtube"></i>
                            </a>
                            <a class="btn-footer" href="" target="_blank">
                                <i class="fa fa-instagram"></i>
                            </a>
                            <a class="btn-footer" href="">
                                <i class="fa fa-envelope"></i>
                            </a>
                        </div>
                        <div class="col-md-4 text-right text-xs">
                            <p>Contact</p>
                            <ul class="text-xxs">
                                <li>
                                    <i class="fa fa-phone contact"></i>(123) 456-7890
                                </li>
                                <li>
                                    <i class="fa fa-envelope contact"></i>biz@speckle.com
                                </li>
                                <li>
                                    <i class="fa fa-map-marker contact"></i>University of North Carolina
                                    <br>
                                    Chapel Hill, NC 27514
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-end" style="margin-top:15px;">
                        &#169 2016 SPECKLE. ALL RIGHTS RESERVED.
                    </div>
                </div>
            </div>
            <!-- END OF FOOTER -->

            <!-- JAVASCRIPT FILES -->
            <script type="text/javascript" src="http://www.youtube.com/player_api"></script>
            <script type="text/javascript" src="assets/plugins/js/jquery-2.1.4.min.js"></script>
            <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      </body>
</html>
