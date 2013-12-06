<?php 
mysql_connect("Pixelgraphy.db.11837707.hostedresource.com", "Pixelgraphy", "P@web2013") or die (mysql_error()); 
mysql_select_db("Pixelgraphy")or die(mysql_error());
$usr = $_GET['usr'];
$hash = $_GET['hash'];
try
{
	$query2 = mysql_query("SELECT * FROM users WHERE username='$usr' and hash='$hash' and verified='1'");
	if(!mysql_num_rows($query2)==1)
	{
		$query = mysql_query("SELECT * FROM users WHERE username='$usr' and hash='$hash'");
		if(mysql_num_rows($query)==1)
		{
			mysql_query("UPDATE users SET verified='1' WHERE username='$usr' and hash='$hash'");
			create_folder($usr);
			echo 'Congratulations ' . $usr . '! Your account has been verified';
		}
		else
		{
			throw new Exception('<font color="red">Verification Error!</font>');
		}
	}
	else
	{
		throw new Exception('<font color="red">You are already verified!</font>');
	}
}
catch(Exception $ex)
{
	echo "Oh fiddlesticks...an error has occured: " . $ex->getMessage();
}

function create_folder($u)
{
	$iddata = mysql_query("SELECT * FROM users WHERE username='$u'");
	$id = mysql_fetch_array($iddata);
	$dir_path = './user_home/'.$id['user_id'].'_home';
	store_directory($dir_path, $u);
	mkdir($dir_path);
}

function store_directory($d, $u)
{
	mysql_query("UPDATE users SET home_path='$d' WHERE username='$u'") or die(mysql_error());
}
?>