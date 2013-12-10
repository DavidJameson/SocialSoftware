<?php

	require 'ImageServerUpload.class.php';
	
	session_start();
	$user = $_SESSION['usr'];

	$file = ($_FILES['myFile']);

	$uploader = new ImageServerUpload($user,$file);
	$uploader->uploadImageFile();	
?>