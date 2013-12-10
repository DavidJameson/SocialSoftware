<?php
	require 'ImageServerUpload.class.php';
	
	session_start();
	$user = $_SESSION['usr'];

	$file = ($_FILES['myFile']);
	$fileName = $_POST['nameInput'];
	$desc = $_POST['descriptionInput'];
	
	$uploader = new ImageServerUpload($user,$file,$fileName,$desc);
	$uploader->uploadImageFile();	
?>