<?php
//session_start();
//initiates the variable to connect to database
$host = 'instapair.db.7003830.hostedresource.com';
$user = 'instapair';
$pwd = 'Butt3rKn!f3';
$dbname = 'instapair';
//sets up connect to the database & prints error if can't connect
$link =@ mysql_connect($host,$user,$pwd) or die("Could not connect : ".mysql_error());

//selects the database to use & prints error if can't connect
@mysql_select_db($dbname, $link) or die("Could not select DB : ".mysql_error()); ;

?>