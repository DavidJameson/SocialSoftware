<?php

$files = reArrayFiles($_FILES['file']);

foreach( $files as $file)
{
	if(upload($file) > 0)
	{
		echo "Something went wrong.".'<br/>';
	}
}
function upload(&$file)
{
	$upload_directory = "upload/";
	$size_limit = 200000000;
	$code = 0;
	
	$allowedExts = array("gif", "jpeg", "jpg", "png","JPG");
	$temp = explode(".", $file["name"]);
	$extension = end($temp);
	if ((($file["type"] == "image/gif")
		|| ($file["type"] == "image/jpeg")
		|| ($file["type"] == "image/jpg")
		|| ($file["type"] == "image/pjpeg")
		|| ($file["type"] == "image/x-png")
		|| ($file["type"] == "image/png"))
		&& ($file["size"] < $size_limit)
		&& in_array($extension, $allowedExts))
	{
		if ($file["error"] > 0)
		{
			echo "Return Code: " . $file["error"] . "<br>";
			$code = $file["error"];
		}
		else
		{
			/*
			echo "Upload: " . $file["name"] . "<br>";
			echo "Type: " . $file["type"] . "<br>";
			echo "Size: " . ($file["size"] / 1024) . " kB<br>";
			echo "Temp file: " . $file["tmp_name"] . "<br>";
			*/
			
			if (file_exists($upload_directory . $file["name"]))
			{
				echo $file["name"]. " already exists. ".'<br/>';
				$code = 2;
			}
			else
			{
				move_uploaded_file($file["tmp_name"],
				$upload_directory. $file["name"]);
				echo "Stored in: " . $upload_directory . $file["name"].'<br/>';
				$code = 0;
			}
		}
	}
	else
	{
		echo "Invalid file".'<br/>';
		echo "Extension ".$extension.'<br/>';
		echo "Size: ".$file['size'].'<br/>';
		$code = 1;
	}
	return $code;
}

function reArrayFiles(&$file_post) 
{
		$file_ary = array();
		$file_count = count($file_post['name']);
		$file_keys = array_keys($file_post);

		for ($i=0; $i<$file_count; $i++) {
			foreach ($file_keys as $key) {
				$file_ary[$i][$key] = $file_post[$key][$i];
			}
		}
		return $file_ary;
}
?>