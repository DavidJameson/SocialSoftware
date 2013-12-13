<html>
<head>
<title>Friendly Fire</title>

<link href="fireStyle.css" rel="stylesheet" type="text/css">

</head>
<body>


<?php 

/*install and initialize Facebook SDK 
set parameters and ids */

  require_once("php-sdk/src/facebook.php");

  $config = array(
      'appId' => '583960988319419',
      'secret' => '9fc219efec511a64a6cabaceb5342331',
      'fileUpload' => false, // optional
      'allowSignedRequest' => false, // optional, but should be set to false for non-canvas apps
  );

  $facebook = new Facebook($config); 

  // Get the current access token
  $access_token = $facebook->getAccessToken();

  //Get user id
  $user_id = $facebook->getUser();


  ?>
<div id="header">

  <a class="logo" href="index.php">Friendly Fire</a>

  <ul id="nav">
    <li><a href="#">Start Over</a></li>
    <li><a href="#">Contact Us</a></li>
  </ul>

</div>
<!--end of header-->

<div id="userlog">
<!--Begin login to Facebook function-->

<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '583960988319419',
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });

  // Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
  // for any authentication related change, such as login, logout or session refresh. This means that
  // whenever someone who was previously logged out tries to log in again, the correct case below 
  // will be handled. 
  FB.Event.subscribe('auth.authResponseChange', function(response) {
    // Here we specify what we do with the response anytime this event occurs. 
    if (response.status === 'connected') {
      // The response object is returned with a status field that lets the app know the current
      // login status of the person. In this case, we're handling the situation where they 
      // have logged in to the app.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // In this case, the person is logged into Facebook, but not into the app, so we call
      // FB.login() to prompt them to do so. 
      // In real-life usage, you wouldn't want to immediately prompt someone to login 
      // like this, for two reasons:
      // (1) JavaScript created popup windows are blocked by most browsers unless they 
      // result from direct interaction from people using the app (such as a mouse click)
      // (2) it is a bad experience to be continually prompted to login upon page load.
      FB.login();
    } else {
      // In this case, the person is not logged into Facebook, so we call the login() 
      // function to prompt them to do so. Note that at this stage there is no indication
      // of whether they are logged into the app. If they aren't then they'll see the Login
      // dialog right after they log in to Facebook. 
      // The same caveats as above apply to the FB.login() call here.
      FB.login();
    }
  });
  };

  // Load the SDK asynchronously
  (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
  }(document));

  // Here we run a very simple test of the Graph API after login is successful. 
  // This testAPI() function is only called in those cases. 
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Good to see you, ' + response.name + '.');
    });
  }
</script>

<!--  Below we include the Login Button social plugin. This button uses the JavaScript SDK to
  present a graphical Login button that triggers the FB.login() function when clicked. -->

<fb:login-button show-faces="true" width="200" max-rows="1"></fb:login-button>

<!--end of Facebook Login -->

</div>
<!--end of userlog-->


<br><br>

<div id ="container">


<?php 
if($user_id){ //if there's a user ID available, user is likely logged in

  try{
    //grabs a random person from friends list
    $ret_a = $facebook->api( array(
                         'method' => 'fql.query',
                         'query' => 'SELECT uid, name, pic FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1=me()) order by rand()'
                     ));
    //grabs a second random person from friends list
   $ret_b = $facebook->api( array(
                         'method' => 'fql.query',
                         'query' => 'SELECT uid, name, pic FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1=me()) order by rand()'
                     ));
    //grabs a SPECIFIC person from friends list
    $ret_c = $facebook->api( array(
                         'method' => 'fql.query',
                         'query' => 'SELECT uid, name, pic FROM user WHERE uid = 576991428'
                     ));



  //echo '<div id="subHead"> Round '.$round. '</div>';


  //display random person 1 info
    echo '<div id="fA"><img src="'.$ret_a[0]['pic'].'"><br><br>';
    //echo $ret_a[0]['uid'].'<br>';
    echo $ret_a[0]['name'].'</div>';


  //display random person 2 info
    echo '<div id="fB"><img src="'.$ret_b[0]['pic'].'"><br><br>';
    //echo $ret_b[0]['uid'].'<br>';
    echo $ret_b[0]['name'].'</div>';

    //display specific person info
    /*echo '<br><br>'.$ret_c[0]['name'].'<br>';
    echo $ret_c[0]['uid'].'<br>';
    echo '<img src="'.$ret_c[0]['pic'].'"><br>';
    */
    
  }
  catch(FacebookApiException $e) {  //if user is logged out, request log in
    $login_url = $facebook->getLoginUrl(); 
    echo 'Please <a href="' . $login_url . '">login.</a>';
    error_log($e->getType());
    error_log($e->getMessage());

  }
} 
else{
   // No user, so print a link for the user to login
      $login_url = $facebook->getLoginUrl();
      echo 'Please <a href="' . $login_url . '">login.</a>';

}



?>

</div>
<!--end of container-->

</body>
</html>