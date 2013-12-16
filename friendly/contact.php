<?php 
$your_email ='henry.leah@gmail.com';// <<=== update to your email address

session_start();
$errors = '';
$name = '';
$visitor_email = '';
$user_message = '';

if(isset($_POST['submit']))
{
    
	$name = $_POST['name'];
	$visitor_email = $_POST['email'];
	$user_message = $_POST['message'];
	///------------Do Validations-------------
	if(empty($name)||empty($visitor_email))
	{
		$errors .= "\n Name and Email are required fields. ";	
	}
	if(IsInjected($visitor_email))
	{
		$errors .= "\n Bad email value!";
	}
	if(empty($_SESSION['6_letters_code'] ) ||
	  strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
	{
	//Note: the captcha code is compared case insensitively.
	//if you want case sensitive match, update the check above to
	// strcmp()
		$errors .= "\n The captcha code does not match!";
	}
	
	if(empty($errors))
	{
		//send the email
		$to = $your_email;
		$subject="Contact Form";
		$from = $your_email;
		$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		
		$body = "$name submitted the contact form:\n".
		"Name: $name\n".
		"Email: $visitor_email \n".
		"Message: \n ".
		"$user_message\n".
		"IP: $ip\n";	
		
		$headers = "From: $from \r\n";
		$headers .= "Reply-To: $visitor_email \r\n";
		
		//mail($to, $subject, $body,$headers);
	   	//$thanks = 'Got it! I\'ll get back to you soon.';
       // header('location: index.php');
        
       if (mail($to, $subject, $body,$headers)){
    	$thanks = '<font style="font-weight:bold; color:#ff0000;">Your message was received</font>';
	}else 
	{
		$thanks = '<font style=" font-weight:bold; color:#ff0000;">There was a problem receiving your message.</font>';
	}
}
		
	}


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Contact Us</title>
</head>

<body>
<div id='contact_form_errorloc' class='err'></div>
<h3 class="fontpro">Contact Me</h3>
<?php
if(!empty($errors)){
echo "<p class='err'>".nl2br($errors)."</p>";
}
echo '<p>'.$thanks.'</p>';
?>
<form method="POST" name="contact_form" 
action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"> 

<label for='name'>Name: </label>
<input type="text" name="name" value='<?php  htmlentities($name) ?>'>

<label for='email'>Email: </label>
<input type="text" name="email" value='<?php  htmlentities($visitor_email) ?>'>

<label for='message'>Message:</label>
<textarea name="message" rows=8 cols=30 value='<?php  htmlentities($visitor_email) ?>'</textarea><br />

<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' >
<label for='message'>Enter the code above here :</label><br>
<input id="6_letters_code" name="6_letters_code" type="text">
<small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>

<input type="submit" value="Submit" name='submit'>
</form>
<script language="JavaScript">
// Code for validating the form
// Visit http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
// for details
var frmvalidator  = new Validator("contact_form");
//remove the following two lines if you like error message box popups
frmvalidator.EnableOnPageErrorDisplaySingleBox();
frmvalidator.EnableMsgsTogether();

frmvalidator.addValidation("name","req","Please provide your Name"); 
frmvalidator.addValidation("tel","req","Please provide your Telephone Number"); 
frmvalidator.addValidation("email","req","Please provide your email"); 
frmvalidator.addValidation("email","email","Please enter a valid email address"); 
</script>
<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>

</div>

</body>
</html>