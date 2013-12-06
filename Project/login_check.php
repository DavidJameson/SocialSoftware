<?php
/*
TO ACCESS SESSION DATA:
$_SESSION['usr'] -- username
$_SESSION['pwd'] -- password
$_SESSION['id'] -- user unique ID
$_SESSION['email'] -- user email
*/
mysql_connect("Pixelgraphy.db.11837707.hostedresource.com", "Pixelgraphy", "P@web2013") or die (mysql_error()); 
mysql_select_db("Pixelgraphy")or die(mysql_error());
try
{
	$chkusr=$_POST['username']; 
	$chkpwd = hash("whirlpool", $_POST['password'], false); //CHANGING TO WHIRLPOOL FOR RELEASE
	//BEGIN SQL INJECTION PROTECTION
	$chkusr = stripslashes($chkusr);
	$chkpwd = stripslashes($chkpwd);
	$chkusr = mysql_real_escape_string($chkusr);
	$chkpwd = mysql_real_escape_string($chkpwd);
	//END SQL INJECTION PROTECTION
	$query = mysql_query("SELECT * FROM users WHERE username='$chkusr' and password='$chkpwd' and verified=1");
	$query2 = mysql_query("SELECT * FROM users WHERE username='$chkusr' and password='$chkpwd' and verified=0");
	if(mysql_num_rows($query)==1)
	{
		session_start();
		$iddata = mysql_query("SELECT * FROM users WHERE username='$chkusr'");
		$id = mysql_fetch_array($iddata);
		$_SESSION['usr'] = $chkusr; //Stores username in session
		$_SESSION['pwd'] = $chkpwd; //Stores password in session
		$_SESSION['id'] = $id['user_id']; //Stores user ID in session
		$_SESSION['email'] = $id['email']; //Stores email in session
		echo '<p>Thank you for logging in ' . $chkusr . '</p><a class="pure-button" href="profile.php">Enter</a>  <a class="pure-button" href="session_kill.php">Log Out</a>';
	}
	else if(mysql_num_rows($query2)==1)
	{
		throw new Exception('You have not verified your account ' . $chkusr . '. Please check your email for a verification link.');
	}
	else 
	{
		throw new Exception('<font color="red">Invalid username or password.</font>');
	}
}
catch(Exception $ex)
{
	echo "Oh fiddlesticks...an error has occured: " . $ex->getMessage();
}