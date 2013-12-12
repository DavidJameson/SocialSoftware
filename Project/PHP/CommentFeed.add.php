<?php
	require 'CommentFeed.class.php';
	session_start();
	$username = $_SESSION['usr'];
	$image_id = $_POST['image_id'];
	$comment = $_POST['comment'];
	
	$commentFeed = new CommentFeed();
	
	$commentFeed->addComment($image_id,$username,$comment);
?>