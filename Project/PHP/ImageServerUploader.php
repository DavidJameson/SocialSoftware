<?php
	$file = ($_FILES['myFile']);
	$upload_dir = "../uploads/";

	uploadImageFile($file,$upload_dir);
	
	function uploadImageFile($file,$dir)
	{
		$ext = getFileExtension($file['name']);
		
		if(isImageFile($ext) && noFileError($file) && noDuplicate($file,$dir))
		{
			if(move_uploaded_file($file['tmp_name'],$dir.$file['name']))
			{
				echo "File Uploaded";
			}
		}
		elseif(!isImageFile($ext))
		{
			echo "not an image file.";
		}
		elseif(!noFileError($file))
		{
			echo "there's a file error."."<br/>".$file['error'];
		}
		elseif(!noDuplicate($file,$dir))
		{
			echo "Already exists";
		}
	}
	function removeFileExtension($file_name)
	{
		$temp = explode(".", $file_name);
		$extension = $temp[0];
		return $extension;
	}
	function getFileExtension($file_name)
	{
		$temp = explode(".", $file_name);
		$extension = end($temp);
		return $extension;
	}
	function isImageFile($extension)
	{
		$isImageFile = false;
		$allowedExts = array("gif", "jpeg", "jpg", "png","JPG");
		
		if(in_array($extension, $allowedExts))
		{
			$isImageFile = true;
		}
		
		return $isImageFile;
	}
	function noFileError($file)
	{
		$noError = true;
		if ($file["error"] > 0)
		{
			$noError = true;
		}
		return $noError;
	}
	function noDuplicate($file,$dir)
	{
		$noDuplicate = true;
		if (file_exists($dir . $file["name"]))
		{
			$noDuplicate = false;
		}
		return $noDuplicate;
	}
?>