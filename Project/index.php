<?php
require 'PHP/Credential.class.php';
$connectionData = new Credential();
mysql_connect($connectionData->getHost(), $connectionData->getUsername(), $connectionData->getPassword()) or die (mysql_error()); 
mysql_select_db($connectionData->getDBName())or die(mysql_error());
if(session_id() == "")
{
	session_start();
}
function getUserName()
{
	return $_SESSION['usr'];
}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example that shows off a responsive photo gallery.">
	<title>Pixelgraphy: A social network for students!</title>
<!-- External links for Yahoo! CSS -->
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/pure-min.css">
<link rel="stylesheet" href="style/layouts/gallery.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<style>
	
</style>
<script>
	//AJAX STUFF LOGIN
	function log_in()
	{
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				if((xmlhttp.responseText).substring(0,2) == "Oh")
				{
					document.getElementById("achtung").innerHTML=xmlhttp.responseText;
					$(function() {
					$( "#dialog-confirm" ).dialog({
					  resizable: false,
					  show: {
						effect: "bounce",
						duration: 500
					  },
					  hide: {
						effect: "fade",
						duration: 750
					  },
					  height:340,
					  width:340,
					  modal: true,
					  buttons: {
						"Okay": function() {
						  $( this ).dialog( "close" );
						}
					  }
					});
				  });
				}
				else
				{
					Redirect();
				}
			}
		  }
		xmlhttp.open("POST","login_check.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("username=" + document.getElementById('N1').value + "&password=" + document.getElementById('P1').value);
		xmlhttp.send();
	}
	
	function Redirect()
	{
    window.location="http://www.pixelgraphy.net/profile.php";
	}
</script>

</head>
<body>
<div>
	<!-- Menu bar at top -->
    <div class="header">
        <div class="pure-menu pure-menu-open pure-menu-horizontal">
            <a class="pure-menu-heading" href="index.php">Pixelgraphy</a>
            <ul>
				<!-- TEST SHIT -->
				<?php 
					if (isset($_SESSION['usr']))
					{
						echo '<li><a class="pure-button" href="profile.php" style="background: rgb(28, 184, 65);color:white;">Enter - '.$_SESSION['usr'].'</a></li>  <li><a class="pure-button" href="session_kill.php" style="background:rgb(223, 117, 20);color:white;">Not You? Logout.</a></li>';
					}
					else
					{
						echo '<li><input id="N1" type="text" placeholder="Username" name="username" required></li>
							<li><input id="P1" type="password" placeholder="Password" name="password" required></li>
							<li><a class="pure-button" style="background: rgb(28, 184, 65);color:white;" onclick="log_in()">Log In</a></li>  <li><a class="pure-button" style="background:rgb(223, 117, 20);color:white;" href="register.php">Register</a><div id="myDiv2"></div></li>';
					}
					?>
            </ul>
        </div>
    </div>
	<!-- END Menu bar at top -->
	
	<!-- Photo boxes AND container START-->
    <div class="pure-g-r">
		<!-- Photo boxes INDIVIDUAL -->
        <div class="pure-u-1-3 photo-box">
            <a href="http://www.flickr.com/photos/95572727@N00/4070581709/">
                <img src="http://farm3.staticflickr.com/2447/4070581709_1204f25e3b.jpg"
                     alt="Photo of a Bamboo forest in Kyoto.">
            </a>

            <aside class="photo-box-caption">
                The Bamboo Forest, Kyoto
                <span>
                    by <a href="http://www.flickr.com/photos/95572727@N00/4070581709/">Stuck in Customs</a> / <a href="http://creativecommons.org/licenses/by-nc-sa/2.0/">cc</a>
                </span>
            </aside>
        </div>
		<!-- Photo boxes INDIVIDUAL END-->
		
		<!-- Title large top right -->
        <div class="pure-u-2-3 text-box">
            <div class="l-box">
                <h1 class="text-box-head">Pixelgraphy - Welcome!</h1>
                <p class="text-box-subhead">A visiual social network designed for students.</p>
            </div>
        </div>
		<!-- Title large top right END -->
		
		<!-- Photo boxes INDIVIDUAL -->
        <div class="pure-u-1-3 photo-box">
            <a href="http://www.flickr.com/photos/ecstaticist/4015614533/">
                <img src="http://farm3.staticflickr.com/2785/4015614533_3e04ac2c7d.jpg"
                     alt="Photo of Dahlia taken using an HDR technique.">
            </a>

            <aside class="photo-box-caption">
                HDR Dahlia
                <span>
                    by <a href="http://www.flickr.com/photos/ecstaticist/4015614533/">ecstaticist</a> / <a href="http://creativecommons.org/licenses/by-nc-sa/2.0/">cc</a>
                </span>
            </aside>
        </div>
		<!-- Photo boxes INDIVIDUAL END-->
		
		<!-- Photo boxes INDIVIDUAL -->
        <div class="pure-u-1-3 photo-box">
            <a href="http://www.flickr.com/photos/blmiers2/6159637428/">
                <img src="http://farm7.staticflickr.com/6151/6159637428_6bffb5bce1.jpg"
                     alt="Photo of a misty morning sunrise in Alaska.">
            </a>

            <aside class="photo-box-caption">
                Misty Morning Sunrise, Alaska
                <span>
                    by <a href="http://www.flickr.com/photos/blmiers2/6159637428/">blmiers2</a> / <a href="http://creativecommons.org/licenses/by-nc-sa/2.0/">cc</a>
                </span>
            </aside>
        </div>
		<!-- Photo boxes INDIVIDUAL END-->
		
		<!-- Photo boxes INDIVIDUAL -->
        <div class="pure-u-1-3 photo-box">
            <a href="http://www.flickr.com/photos/blmiers2/6167391543/">
                <img src="http://farm7.staticflickr.com/6171/6167391543_395a7cabfd.jpg"
                     alt="Photo of a mountain in Alaska's Denali.">
            </a>

            <aside class="photo-box-caption">
                Mountain, Alaska's Denali
                <span>
                    by <a href="http://www.flickr.com/photos/blmiers2/6159637428/">blmiers2</a> / <a href="http://creativecommons.org/licenses/by-nc-sa/2.0/">cc</a>
                </span>
            </aside>
        </div>
		<!-- Photo boxes INDIVIDUAL END-->
		
		<!-- Photo boxes INDIVIDUAL -->
        <div class="pure-u-2-3 photo-box">
            <a href="http://www.flickr.com/photos/jjjohn/2120309884/">
                <img src="http://farm3.staticflickr.com/2109/2120309884_de48fdb9fe.jpg"
                     alt="Photo of Earth's sky.">
            </a>

            <aside class="photo-box-caption">
                Fire, Air, Earth and Water
                <span>
                    by <a href="http://www.flickr.com/photos/jjjohn/2120309884/">jjjohn</a> / <a href="http://creativecommons.org/licenses/by-nc-sa/2.0/">cc</a>
                </span>
            </aside>
        </div>
		<!-- Photo boxes INDIVIDUAL END-->
		
		<!-- Photo boxes INDIVIDUAL -->
        <div class="pure-u-1-3 photo-box">
            <a href="http://www.flickr.com/photos/betta_design/2086852016/">
                <img src="http://farm3.staticflickr.com/2388/2086852016_5a58dd1881.jpg"
                     alt="Photo of the Taj Mahal at sunset.">
            </a>

            <aside class="photo-box-caption">
                Taj Mahal at sunset
                <span>
                    by <a href="http://www.flickr.com/photos/betta_design/2086852016/">betta_design</a> / <a href="http://creativecommons.org/licenses/by-nc-sa/2.0/">cc</a>
                </span>
            </aside>
        </div>
		<!-- *** Photo boxes END HERE *** -->
		
		<!-- Bottom Description -->
        <div class="pure-u-1">
            <div class="l-box">
			<h2>Pixelgraphy is...</h2>
			<p>A new social network under constant development by students for students. Using modern programming an design technologies to make a seamless and smooth user experience</p>
			<h2>Login or Register!</h2>
			<p>Its easy to login and even easier to register. Just sign in at the top or click the register button to be brought to our simple registration form.</p>
            </div>
        </div>
		<!-- Bottom Description END -->
    </div>
	<div id="dialog-confirm" title="Attention!">
		<p id="achtung"><span style="float:left; margin:0 7px 20px 0;"></span></p>
	</div>
	<!-- Bottom footer bar -->
    <div class="footer">
        Pixelgraphy - designed by Laerte Sousa and Anthony Paveglio - &copy; 1973.
		<br>
		<a href="#">Contact Us</a> - <a href="#">About</a>
    </div>
	<!-- Bottom footer bar END -->

</div>
<!-- Container END -->
<!-- External Script Link -->
<script src="http://yui.yahooapis.com/3.12.0/build/yui/yui.js"></script>
</body>
</html>