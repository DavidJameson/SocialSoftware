<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title></title>
<meta name="" content="">

<!-- Begin Style Sheet -->
<link rel="stylesheet" href="../style/user_image.css"/>
<!-- End Style Sheet -->
<script src="Javascript/ImageDisplayContainer.js"></script>
<!-- Begin Javascript -->

<!-- End Javascript -->
</head>
<body>
	<div id = "main_container">
		<?php
			require 'ImageFeed.php';
			$feed = new UserImageFeed('laerte');
			echo $feed->displayImages();
		?>
	</div>
</body>
</html>