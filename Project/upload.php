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
	<div id="page_content">
		<div id="uploadArea">
			<div id="uploadMenu">
				<input type='file' id="fileInput" multiple style=""/>
				<button class="menuButton" id="fileSelect">Add Images</button>
				<button class="menuButton" id="send">Upload All</button>
			</div>
			<span id="dropbox">
				<p>Drop Images Here</p>
				<p>Accepted Image Format: JPG,JPEG, and PNG</p>
				<p>Note: If you're using Safari browser, you won't be able to preview your image.</p>
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