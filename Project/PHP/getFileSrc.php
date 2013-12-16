<?php
	$file = $_FILES['file'];
	$file_contents = file_get_contents($file);
	//print_r($file);
	header('Content-Type: image/jpeg');
	echo ($file_contents);
?>