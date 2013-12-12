<?php
	session_start();
	require 'ImageFeed.class.php';
	$feed = new ImageFeed($_SESSION['usr']);
	echo $feed->displayMostRecent();
?>