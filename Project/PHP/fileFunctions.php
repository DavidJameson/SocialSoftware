<?php
	$size = getSize('../img/img1.jpg');
	echo $size;
	//return size of file in bytes
	function getSize($dir)
	{
		$size = false;
		
		if(is_file($dir))
		{
			$size = filesize($dir);
		}
		
		return $size;
	}
?>