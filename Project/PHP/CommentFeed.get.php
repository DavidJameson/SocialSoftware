<?php
	require 'CommentFeed.class.php';
	
	$image_id = $_POST['image_id'];
	
	$commentFeed = new CommentFeed();
	
	$commentsArray = $commentFeed->getComments($image_id);
	
	echo json_encode($commentsArray);
?>