<html>
<head>
	<title>Flickr Collage! </title>

<style type="text/css">
	body{
		width: 700px;
		margin: 0 auto;
		margin-top: 100px;
		margin-bottom: 50px;

	}

	#pic{
		transition: all ease-in-out 0.55s;
		-webkit-transition: all 0.55s ease-in-out;
		-moz-transition: all ease-in-out 0.55s;
	}

	#pic:hover{
		opacity: .5;
	}

</style>



</head>
<body>

<?php 

$topic = $_GET['topic'];
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

for ($i = 0;$i <= $arrayLength; $i++)
{
	$tempPhotoID = $rsp_obj['photos']['photo'][$i]['id'];
	$tempPhotoFarm = $rsp_obj['photos']['photo'][$i]['farm'];
	$tempPhotoServer = $rsp_obj['photos']['photo'][$i]['server'];
	$tempPhotoSecret = $rsp_obj['photos']['photo'][$i]['secret'];

	echo "<object id='pic'> <img src='http://farm" . $tempPhotoFarm . ".staticflickr.com/" . 
    $tempPhotoServer . "/" . $tempPhotoID."_". $tempPhotoSecret . "_s.jpg' width='150px' border='0'/> </object>"; 

}


 ?>


</body>
</html>
