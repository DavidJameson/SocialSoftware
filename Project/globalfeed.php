<?php
mysql_connect("Pixelgraphy.db.11837707.hostedresource.com", "Pixelgraphy", "P@web2013") or die (mysql_error()); 
mysql_select_db("Pixelgraphy")or die(mysql_error());
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
<title>Global Feed</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/pure-min.css">
<link rel="stylesheet" href="style/layouts/side-menu.css">
<link rel="stylesheet" href="style/layouts/marketing.css">
<link rel="stylesheet" href="style/global_feed.css"/>
<link rel="stylesheet" href="style/comments.css"/>

<!--Start Javascript Files-->
<script src="lib/ajaxfeed.js"></script>
<script src="lib/jquery-1.9.1.js"></script>
<script src="Javascript/comment_handler.js"></script>
<script src="lib/jquery-1.9.1.js"></script>
<script src="lib/ajaxfeed.js"></script>
<script src=Javascript/CommentBox.class.js></script>
<script src=Javascript/comment_handler.js></script>
		
		
<script>
	$(document).ready(function()
	{
		livefeed('POST','PHP/globalfeed_data.php','global_feed',20000);
	});	
</script>
<!-- End Javascript Files-->
</head>
<body>
<div id="layout">
    <a href="#menu" id="menuLink" class="pure-menu-link">
        <span></span>
    </a>
    <!-- HTML CODE FOR SIDE MENU-->
    <div id="menu">
        <div class="pure-menu pure-menu-open">
            <a class="pure-menu-heading" href="index.php">Pixelgraphy</a>

            <ul>
                <li class="pure-menu-selected"><a id="global_profile" href="#">Global Feed</a></li>
				
                <li class="menu-item-divided">
                    <a id="myprofile_profile" href="profile.php">My  Profile</a>
                </li>
				
                <li><a id="upload_profile" href="upload.php">Upload Image</a></li>
				
                <li class="menu-item-divided">
                    <a id="settings_profile" href="settings.php">Settings</a>
                </li>
				
                <li><a id="logout_profile" href="session_kill.php">Logout</a></li>
            </ul>
        </div>
    </div>
	<!-- GLOBAL FEED SECTION STARTS HERE-->
	<div id="global_feed">
		
	</div>
	<!-- GLOBAL FEED SECTION ENDS HERE-->

</div>
<script src="Javascript/ui.js"></script>
</body>
</html>
