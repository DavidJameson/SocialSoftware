<?php
	$num = 0;
	
	for($i = 0; $i < 5; $i++)
	{
		$num += $num+1;
		echo $num;
	}
?>