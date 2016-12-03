<?php

$username = "";
$password = "";
$hostname = "";
//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";
//select a database to work with
$selected = mysql_select_db("thebkang_videos",$dbhandle) 
  or die("Could not select examples"); 

if(isset($_POST['submit']))
{
    $youtubevideoid = getYouTubeIdFromURL($_POST["url"]);
    ytdata($youtubevideoid);
}

function getYouTubeIdFromURL($url)
{
    parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
	return $my_array_of_vars['v'];
}

function ytdata($youtubevideoid) {
    $YTdata = file_get_contents("https://www.googleapis.com/youtube/v3/videos?id=".$youtubevideoid."&key=AIzaSyDQFUj3-7WxjvVMz3RsodqsB1DUu-370Gw&fields=items(id,snippet,statistics)&part=snippet,statistics");
    $YTdata = json_decode($YTdata,true);
    
    $vidid = $YTdata['items'][0]['id'];
    $title = mysql_real_escape_string($YTdata['items'][0]['snippet']['title']);
    $description = mysql_real_escape_string($YTdata['items'][0]['snippet']['description']);
	$thumbnail = mysql_real_escape_string($YTdata['items'][0]['snippet']['thumbnails']['maxres']['url']);

    mysql_query("INSERT INTO videos (id,vidid,title,description,thumbnail) VALUES ('','$vidid','$title','$description','$thumbnail')") or die(mysql_error());
}

?>

<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
      <head>
          <meta charset="utf-8" />
          <title>UNC Talent Upload Page</title>
      </head>
      <body>

        <form action="index.php" method="POST" enctype="multiplart/form-data">
            <input type="text" name="url" />
            <input type="submit" name="submit" value="Upload" />
        </form>
        
        <?php
        
        if(isset($_POST['submit']))
        {
            echo "Your video has been uploaded";
        }
        ?>
        
      </body>
</html>