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
$uuid = $_SESSION['id'];
$query = mysql_query("SELECT * FROM uprofile WHERE user_id='$uuid'");
$data = mysql_fetch_array($query);
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

<!-- START Uploader files library -->
		<!--CSS files-->
		<link rel="stylesheet" href='style/uploader.css'/>
		<!--Javascript libs-->
		<script src="lib/jquery-1.9.1.js"></script>
		<script src="Javascript/ImageFileContainer.class.js"></script>
		<script src="Javascript/ImageFileUploader.class.js"></script>
		<script src="Javascript/Obj.init.js"></script>
<!-- END Uploader files library -->
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
                <li>
					<a id="global_profile" href="globalfeed.php">Global Feed</a>
				</li>
				
                <li>
                    <a id="myprofile_profile" href="profile.php">My  Profile</a>
                </li>
				
                <li class="pure-menu-selected menu-item-divided">
					<a id="upload_profile" href="upload.php">Upload Image</a>
				</li>
				
                <li class="menu-item-divided">
                    <a id="settings_profile" href="settings.php">Settings</a>
                </li>
				
                <li><a id="logout_profile" href="session_kill.php">Logout</a></li>
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
                        Full Name: <?php echo $data['fullname']; ?>
						<br/>
						Gender: <?php echo $data['gender']; ?>
						<br/>
						Nickname: <?php echo $data['nickname']; ?>
						<br/>
						Major: <?php echo $data['major']; ?>
						<br/>
						Personal e-mail: <?php echo $data['personal_email']; ?>
						<br/>
						Hometown/State: <?php echo $data['hometown'] . ', ' . $data['homestate']; ?>
						<br/>
						Relationship Status: <?php echo $data['relationship']; ?>
                    </h2>
                </div>
            </div>
        </div>
    </div>
	<!-- END USER INFO SECTION-->
	<div id="page_content">
		<div id="uploadArea">
			<div id="uploadMenu">
				<input type='file' id="fileInput" multiple style="display: none;"/>
				<button class="menuButton" id="fileSelect">Add Images</button>
				<button class="menuButton" id="send">Upload All</button>
			</div>
			<span id="dropbox">
				<p>Drop Images Here</p>
				<p>Accepted Image Format: JPG,JPEG, and PNG</p>
			</span>
		    <div id="fileList">
				Files not selected.
			</div>
		</div>
	</div>
</div>
<script src="Javascript/ui.js"></script>
</body>
</html>