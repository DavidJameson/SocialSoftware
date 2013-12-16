<?php 

//include configuration for database
require_once('config.php');
//set up question to add to database
$questionName = '';
$formElements = array();



//echo $questionName = array_splice($formElements,$countElement, $counter);

if(isset($_POST['submit'])){	
//$elements = $_POST['countElements'];

foreach ($_POST as $key => $question)
{
	
	if($_POST['submit'] === 'submit question')
	$inputs = array_pop($formElements);
	//echo $question;
  	$sql = mysql_query("INSERT INTO `questions`(`question`) VALUES ('$question')");

	}
	
 //var_dump($formElements);
	
}


?>


<html>
<head>
<title>Friendly Fire - Create</title>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>
<link href="css/fireStyle.css" rel="stylesheet" type="text/css">

</head>
<body>
<!--Header-->

<div id="header">
  <a class="logo" href="index.php">Friendly Fire</a>

  <ul id="nav">
    <li><a href="#">Start Over</a></li>
    <li><a href="http://leah-henry.info/kimle/contact.php">Contact Us</a></li>
  </ul>
</div>
<!--End of Header-->
<br />
<h3 align="center">Create Question(s)</h3>
<br />
<script>
function countElements(){
$('div.x > input').length
  document.writeln(x); 
 
}
</script>
<?php  echo  'Question(s) have successfully been added to the database'; ?>
<form name="createQuestion" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
<div id="p_questions">
    <p>
        <label for="quest">
        <input type="text" id="quest" size="20" name="quest_1" class="question" value="<?php  htmlentities($question) ?>" placeholder="Input Question" />
        </label>
    </p>
</div>
<button><a href="#" id="addQuestion">Add Another Question</a></button>
<input type="submit" name="submit"   value="Submit Question" />
</form>
</body>
</html>