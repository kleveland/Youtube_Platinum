<div>
                <?php
                $nextButton = false;
                $prevButton = false;
                if(isset($_GET['nextpage'])) {
                    $YTdata = file_get_contents("https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=24&channelId=UC7FyY2h_IbIpYfeNkY47Zgw&maxResults=25&key=AIzaSyDQFUj3-7WxjvVMz3RsodqsB1DUu-370Gw&order=date&pageToken=".$_GET['nextpage']);
                } elseif(isset($_GET['prevpage'])) {
                    $YTdata = file_get_contents("https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=24&channelId=UC7FyY2h_IbIpYfeNkY47Zgw&maxResults=25&key=AIzaSyDQFUj3-7WxjvVMz3RsodqsB1DUu-370Gw&order=date&pageToken=".$_GET['prevpage']);
                } else {
                    $YTdata = file_get_contents("https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=24&channelId=UC7FyY2h_IbIpYfeNkY47Zgw&maxResults=25&key=AIzaSyDQFUj3-7WxjvVMz3RsodqsB1DUu-370Gw&order=date");
                }
                //https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=UCAiNcL913XR2IaHxzRXyBIQ&type=video%2Cchannel%2Cplaylist&maxResults=50&key={YOUR_API_KEY}
                $YTdata = json_decode($YTdata, true);
                if($YTdata['pageInfo']['totalResults'] >= $YTdata['pageInfo']['maxResults'] ) {
                    $nextButton = true;
                    $prevButton = true;
                } else {
                    $nextButton = false;
                    $prevButton = false;
                }
                $idlast = 4;
                $id = 1;
                foreach ($YTdata['items'] as $info) {
                    ?>
                    <a class="reversible" href="#vs<?php echo $id ?>">
                        <ul class="img-container img-responsive" id="<?php echo $id ?>">
                            <img src="<?php echo $info['snippet']['thumbnails']['high']['url']; ?>" class="img-responsive">
                        </ul>
                    </a>
                    <div class="video-show" id="vs<?php echo $id ?>" style="display:none;">
                        <?php echo $info['snippet']['title']; ?>
                        <div class="full-video">
                        </div>
                    </div>
                <?php
                    $id++;
                }
                ?>
            </div>
            <!--
            <ul class="list-inline list-unstyled">
                <?php
                if($nextButton == true) {
                    ?>
                    <li>
                        <a href="https://127.0.0.1/?nextpage=<?php echo $YTdata['nextPageToken']; ?>"><button class="btn btn-info btn-block">Next page</button> </a>
                    </li>
                <?php
                } else {
                }
                if($prevButton == true) {
                    ?>
                    <li>
                        <a href="https://127.0.0.1/testpage?prevpage=<?php echo $YTdata['prevPageToken']; ?>"><button class="btn btn-info btn-block">Previous page</button> </a>
                    </li>
                <?php
                } else {
                }
                ?>
            </ul>
            -->

            <!-- SHOW/HIDE FUNCTION | Modernizr -->
            <script>
                $( document ).ready(function() {
                    checkMq();
                    $('.reversible').on("click",function(e) {
                        e.preventDefault();
                        $(this.hash).toggle("slow");
                    });
                });
                $(window).resize(function() {
                    checkMq();
                });
                function checkMq() {
                    var ww = document.body.clientWidth;
                    /*if (ww >= 1280) {
                        $('.video-show').insertBefore($('#vs4'));
                    }
                    if (ww>=767 && ww <1280) {
                        $('.video-show').insertBefore($('#vs3'));
                    })
                    else{
                        $('.video-show').insertBefore($('#vs2'));
                    }*/
                    if (Modernizr.mq('only screen and (min-width: 1280px)')) {
                        $('.video-show').insertBefore($('#vs4'));
                    }
                    if (Modernizr.mq('only screen and (min-width: 767px) and (max-width: 1280px)')) {
                        $('.video-show').insertBefore($('#vs3'));
                    }
                    if (Modernizr.mq('only screen and (max-width: 767px)')) {
                        $('.video-show').insertBefore($('#vs2'));
                    }
                }
            </script>
