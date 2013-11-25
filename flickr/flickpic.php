<html>
<head>
	<title>Flickr Collage! </title>

<style type="text/css">

	@font-face{
		font-family: bird;
		src: url('LittleBird.ttf');
	}


	@font-face{
		font-family: neo;
		src: url('neoubold.ttf');
	}

	body{
		background-image: url(fabric_plaid.png);
	}

	#collage{
		background-color: #DCFAE0;
		width: 700px;
		margin: 0 auto;
		margin-top: 30px;
		margin-bottom: 50px;
		border:thin black dashed;
		padding-left: 100px;
		padding-top: 10px;
		padding-bottom: 10px;
		box-shadow: -10px 10px 3px #888888;


	}


	#header{
		text-align: center;
		margin-top: 50px;
		font-size: 55px;
		font-family: bird;
	}

	#pic{
		transition: all ease-in-out 0.55s;
		-webkit-transition: all 0.55s ease-in-out;
		-moz-transition: all ease-in-out 0.55s;
	}

	#pic:hover{
		opacity: .5;
	}

	#jump{
		font-family: neo;
		font-size: 20px;
		text-align: center;
		margin-bottom: 10px;
	}

	a:link{
		color: white;
		text-decoration: none;
		
	}
	a:visited{
		color:#222;
		text-decoration:none;
	}

	a:hover{
		color:teal;
		text-decoration:none;
	
	}

	a:active{
		color:#999;
		text-decoration:none;
	}

</style>



</head>
<body>

<?php

$topic = $_GET['topic'];
echo '<div id="header">'. $topic. ' Collage <br/> <span style="font-size: 30px">powered by Flickr </span></div>';
$topic = str_replace(" ", "+", $topic);


$params = array(
	'api_key' => "dd6b66141b99d4022ec8683456193d21",
	'format' => 'json',
	'method' => 'flickr.photos.search', 
	'per_page' => '16',
	'tags' => $topic,
	);

$encoded_params = array();

foreach($params as $k => $v){
	$encoded_params[] = urlencode($k).'='.urlencode($v);
}

#$url = "http://api.flickr.com/services/rest/?".implode('&', $encoded_params);
$url = 'http://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=dd6b66141b99d4022ec8683456193d21&tags='.$topic.'&per_page=16&format=json';
$rsp = file_get_contents($url);

#remove prefix

$rsp = str_replace("jsonFlickrApi(", "", $rsp);
$rsp = substr($rsp, 0, -1);


$rsp_obj = json_decode($rsp,true);
//echo var_dump($rsp_obj);

//$rsp_obj = array_slice();
/*
foreach ($rsp_obj['photos']['photo']['id'] as $var)
{
	echo $var.'<br>';
} */
$arrayLength = sizeof($rsp_obj['photos']['photo']);
$arrayLength--;


echo '<div id="collage">';
for ($i = 0;$i <= $arrayLength; $i++)
{
	$tempPhotoID = $rsp_obj['photos']['photo'][$i]['id'];
	$tempPhotoFarm = $rsp_obj['photos']['photo'][$i]['farm'];
	$tempPhotoServer = $rsp_obj['photos']['photo'][$i]['server'];
	$tempPhotoSecret = $rsp_obj['photos']['photo'][$i]['secret'];

	echo "<object id='pic'> <a href='http://farm". $tempPhotoFarm.".staticflickr.com/". $tempPhotoServer."/"
	.$tempPhotoID."_".$tempPhotoSecret.".jpg'><img src='http://farm" . $tempPhotoFarm . ".staticflickr.com/" . 
    $tempPhotoServer . "/" . $tempPhotoID."_". $tempPhotoSecret . "_s.jpg' width='150px' border='0'/></a> </object>"; 

}

echo '</div>';
 ?>


<div id="jump">
	<a href="flickpic.html"><b>Choose another collage topic</b></a>
</div>

</body>
</html>
