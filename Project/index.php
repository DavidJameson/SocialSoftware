<?php
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
					document.getElementById("myDiv2").innerHTML=xmlhttp.responseText;
				}
				else
				{
					document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
					login_success_procedure();
				}
			}
		  }
		xmlhttp.open("POST","login_check.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("username=" + document.getElementById('N1').value + "&password=" + document.getElementById('P1').value);
		xmlhttp.send();
	}
	
	//AJAX STUFF REGISTER ------ IN PROGRESS
	function register()
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
					document.getElementById("msgDiv").innerHTML=xmlhttp.responseText;
				}
				else
				{
					document.getElementById("overlay").innerHTML=xmlhttp.responseText;
				}
			}
		  }
		xmlhttp.open("POST","register_check.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("username=" + document.getElementById('U1').value + "&password1=" + document.getElementById('PW1').value + "&password2=" + document.getElementById('PW2').value + "&email=" + document.getElementById('E1').value);
		xmlhttp.send();
	}
	
	function login_success_procedure()
	{
		document.getElementById("myDiv2").remove();
		document.getElementById("U1").disabled=true;
		document.getElementById("PW1").disabled=true;
		document.getElementById("PW2").disabled=true;
		document.getElementById("E1").disabled=true;
		document.getElementById("cb").disabled=true;
		document.getElementById("sbmt").disabled=true;
		document.getElementById("msgDiv").hidden=true;
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
                <li><a href="#">About</a></li>
                <li><a href="#">Contact Us</a></li>
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
		
		<!-- Login Forms -->
        <div class="pure-u-1-2 form-box">
            <div class="1-box">
				<br/>
                <h2>Login to Pixelgraphy</h2>

                <form method="post" class="pure-form">
					<?php 
					if (isset($_SESSION['usr']))
					{
						echo '<p>Hey! You are logged in as ' . getUserName() . '.</p>';
						echo '<a class="pure-button" href="profile.php">Enter</a> <a class="pure-button" href="session_kill.php">Not You? Logout.</a>';
					}
					else
					{
						echo '<div id="myDiv"><input id="N1" type="text" placeholder="Username" name="username" required>
							<input id="P1" type="password" placeholder="Password" name="password" required>
							<a class="pure-button" onclick="log_in()">Log In</a></div><div id="myDiv2"></div>';
					}
					?>
                </form>
            </div>
		</div>
		<div class="pure-u-1-2 form-box">
			<div class="l-box">
			<h2>Register with Pixelgraphy</h2>
				<form action="register_check.php" method="post" class="pure-form pure-form-aligned">
					<?php
					if (isset($_SESSION['usr']))
					{
						echo '
						<fieldset>
						<div id="overlay">
							<div class="pure-control-group">
								<label for="name">Username</label>
								<input id="U1" name="username" id="name" type="text" placeholder="Username" disabled>
							</div>

							<div class="pure-control-group">
								<label for="password">Password</label>
								<input id="PW1" name="password1" id="password" type="password" placeholder="Password" disabled>
							</div>
							<div class="pure-control-group">
								<label for="password">Verify Password</label>
								<input id="PW2" name="password2" id="password" type="password" placeholder="Password Again" disabled>
							</div>

							<div class="pure-control-group">
								<label for="email">Email Address</label>
								<input id="E1" name="email" id="email" type="email" placeholder="Email Address" disabled>
							</div>

							<div class="pure-controls">
								<label for="cb" class="pure-checkbox">
									<input id="cb" type="checkbox" disabled> I agree with the TOC
								</label>

								<a id="sbmt" class="pure-button" onclick="register()" disabled>Register</a>
							</div>
						</div>
						</fieldset>
						';
					}
					else
					{
						echo '
						<fieldset>
						<div id="overlay">
							<div class="pure-control-group">
								<label for="name">Username</label>
								<input id="U1" name="username" id="name" type="text" placeholder="Username" required>
							</div>

							<div class="pure-control-group">
								<label for="password">Password</label>
								<input id="PW1" name="password1" id="password" type="password" placeholder="Password" required>
							</div>
							<div class="pure-control-group">
								<label for="password">Verify Password</label>
								<input id="PW2" name="password2" id="password" type="password" placeholder="Password Again" required>
							</div>

							<div class="pure-control-group">
								<label for="email">Email Address</label>
								<input id="E1" name="email" id="email" type="email" placeholder="Email Address" required>
							</div>

							<div class="pure-controls">
								<label for="cb" class="pure-checkbox">
									<input id="cb" type="checkbox" required> I agree with the TOC
								</label>

								<a id="sbmt" class="pure-button" onclick="register()">Register</a>
								<div id="msgDiv"></div>
							</div>
						</div>
						</fieldset>
						';
					}
					?>
				</form>
			</div>
        </div>
		<!-- Login Forms END -->
		
		<!-- Bottom Description -->
        <div class="pure-u-1">
            <div class="l-box">
                
            </div>
        </div>
		<!-- Bottom Description END -->
    </div>
	
	<!-- Bottom footer bar -->
    <div class="footer">
        Pixelgraphy - designed by Laerte Sousa and Anthony Paveglio - &copy; 1973.
    </div>
	<!-- Bottom footer bar END -->
</div>
<!-- Container END -->
<!-- External Script Link -->
<script src="http://yui.yahooapis.com/3.12.0/build/yui/yui.js"></script>
</body>
</html>