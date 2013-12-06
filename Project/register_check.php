<?php
mysql_connect("Pixelgraphy.db.11837707.hostedresource.com", "Pixelgraphy", "P@web2013") or die (mysql_error()); 
mysql_select_db("Pixelgraphy")or die(mysql_error());
try
{
	$usr = $_POST['username'];
	$pw1 = hash("whirlpool", $_POST['password1'], false); //CHANGING TO WHIRLPOOL FOR RELEASE
	$pw2 = hash("whirlpool", $_POST['password2'], false); //CHANGING TO WHIRLPOOL FOR RELEASE
	$eml = $_POST['email'];
	//BEGIN SQL INJECTION PROTECTION
	$usr = stripslashes($usr);
	$pw1 = stripslashes($pw1);
	$pw2 = stripslashes($pw2);
	$eml = stripslashes($eml);
	$usr = mysql_real_escape_string($usr);
	$pw1 = mysql_real_escape_string($pw1);
	$pw2 = mysql_real_escape_string($pw2);
	$eml = mysql_real_escape_string($eml);
	//END SQL INJECTION PROTECTION
	$query = mysql_query("SELECT * FROM users WHERE username='$usr' OR email ='$eml'");
	if(mysql_num_rows($query)==1)
	{
		throw new Exception("<font color=\"red\">Username or email is already in use.</font>");
	}
	else if($usr == "")
	{
		throw new Exception("<font color=\"red\">Please enter a valid username</font>");
	}
	else if($pw1 == "" || $pw2 == "")
	{
		throw new Exception("<font color=\"red\">Please specify a password</font>");
	}
	else if($pw1 != $pw2)
	{
		throw new Exception("<font color=\"red\">Passwords do not match</font>");
	}
	else if(!filter_var($eml, FILTER_VALIDATE_EMAIL)) 
	{
		throw new Exception("<font color=\"red\">E-Mail is not valid</font>");
	}
	else if(!preg_match("/([\w\-]+\@purchase.edu)/",$eml))
	{
		throw new Exception("<font color=\"red\">E-Mail must be an @purchase.edu email</font>");
	}
	else
	{
		$hash = hash("sha512", $usr, false); //MAXIMUM security hash for verification code -- DO NOT USE MD5 FOR PASSWORD HASH IT SUCKS BALLS.
		$uuid = generate_uuid();
		mysql_query("INSERT INTO users (user_id, username, password, email, hash, verified) VALUES ('$uuid','$usr', '$pw1', '$eml', '$hash', '0')") or die(mysql_error());
		echo '<p>Your account has been created successfully ' . $usr . '! Please check your email to verify your account.</p>';
		email_verify($usr, $eml, $hash);
	}
}
catch(Exception $ex)
{
	echo "Oh fiddlesticks...an error has occured: " . $ex->getMessage();
}

function email_verify($u, $e, $h)
{
	//Code for verification email
	$vurl 	 = 'http://www.pixelgraphy.net/project/Project/verify.php?usr='.$u.'&hash='.$h;
	$to      = $e;
	$subject = 'Verify your account with Pixelgraphy';
	$message = 'Please click the following link to verify your account: ' . $vurl;
	$headers = 'From: noreply@pixelgraphy.net' . "\r\n" . 'Reply-To: support@pixelgraphy.net' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
	mail($to, $subject, $message, $headers);
}

function generate_uuid()
{
	$uuid = uniqid();
	$query = mysql_query("SELECT * FROM users WHERE user_id='$uuid'");
	while(mysql_num_rows($query)==1)
	{
		$uuid = uniqid();
		$query = mysql_query("SELECT * FROM users WHERE user_id='$uuid'");
	}
	return $uuid;
}

?>