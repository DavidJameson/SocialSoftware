<?php
if(session_id() == "")
{
	session_start();
	if (!isset($_SESSION['usr']))
	{
		header("location:index.php");
	}
}
else
{
	if (!isset($_SESSION['usr']))
	{
		header("location:index.php");
	}
}
function getUserName()
{
	return $_SESSION['usr'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">
    <title>User Profile</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/pure-min.css">
<link rel="stylesheet" href="style/layouts/side-menu.css">
<link rel="stylesheet" href="style/layouts/marketing.css">
</head>
<body>
<div id="layout">
    <a href="#menu" id="menuLink" class="pure-menu-link">
        <span></span>
    </a>
    <div id="menu">
        <div class="pure-menu pure-menu-open">
            <a class="pure-menu-heading" href="index.php">Pixelgraphy</a>

            <ul>
                <li><a id="global_profile" href="#">Global Feed</a></li>
				
                <li class="pure-menu-selected menu-item-divided">
                    <a id="myprofile_profile" href="#">My  Profile</a>
                </li>
				
                <li><a id="upload_profile" href="upload.php">Upload Image</a></li>
				
                <li class="menu-item-divided">
                    <a id="settings_profile" href="#">Settings</a>
                </li>
				
                <li><a id="logout_profile" href="#">Logout</a></li>
            </ul>
        </div>
    </div>
		<!-- USER INFO SECTION-->
	    <div class="splash">
        <div class="pure-g-r">
            <div class="pure-u-1-3">
                <div class="l-box splash-image">
                    <img src="http://placehold.it/500x350"
                         alt="Placeholder image for example.">
                </div>
            </div>

            <div class="pure-u-2-3">
                <div class="l-box splash-text">
                    <h1 class="splash-head">
                        <?php echo $_SESSION['usr']; ?>
                    </h1>

                    <h2 class="splash-subhead">
                        User Info.
                    </h2>
                </div>
            </div>
        </div>
    </div>
	<!-- END USER INFO SECTION-->
	<div id="page_content">
		Here
	</div>
</div>
<script src="Javascript/ui.js"></script>
</body>
</html>
