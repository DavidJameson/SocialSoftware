<?php
	require 'Credential.class.php';
	require 'Database.class.php';
	
	$image_id = $_POST['image_id'];
	
	$credential = new Credential();
	$database = new Database($credential->getHost(),$credential->getUsername()
	,$credential->getPassword(),$credential->getDBName());
	
	$database->removeImage($image_id);
?>