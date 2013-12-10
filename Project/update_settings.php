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
mysql_connect("Pixelgraphy.db.11837707.hostedresource.com", "Pixelgraphy", "P@web2013") or die (mysql_error()); 
mysql_select_db("Pixelgraphy")or die(mysql_error());

$uuid = $_SESSION['id'];
$fullname = $_POST['fullname'];
$gender = $_POST['gender'];
$DOB = $_POST['DOB']; //Working on it
$nickname = $_POST['nickname'];
$major = $_POST['major'];
$personal_email = $_POST['personal_email'];
$hometown = $_POST['hometown'];
$homestate = $_POST['homestate'];
$relaionship = $_POST['relationship'];
$biography = $_POST['biography'];
$hobbies = $_POST['hobbies'];
try
{
	$query = mysql_query("SELECT * FROM uprofile WHERE user_id='$uuid'");
	if(mysql_num_rows($query)>=1)
	{
		mysql_query("UPDATE uprofile SET fullname='$fullname', gender='$gender', nickname='$nickname', major='$major', personal_email='$personal_email', hometown='$hometown', homestate='$homestate', relationship='$relaionship', biography='$biography', hobbies='$hobbies' WHERE user_id='$uuid'");
		header("location:profile.php");
	}
	else
	{
		mysql_query("INSERT INTO uprofile (user_id, fullname, gender, nickname, major, personal_email, hometown, homestate, relationship, biography, hobbies) VALUES ('$uuid','$fullname', '$gender', '$nickname', '$major', '$personal_email', '$hometown', '$homestate', '$relaionship', '$biography', '$hobbies')") or die(mysql_error());
		header("location:profile.php");
	}
}
catch(Exception $ex)
{
	echo "Oh fiddlesticks...an error has occured: " . $ex->getMessage();
}

?>