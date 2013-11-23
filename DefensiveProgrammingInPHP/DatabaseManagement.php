<?php


// Note --- an even better way to do this would be to use our own class and define
// the desired methods for our particular application but right now we're just
// focused on defensive programming techniques


// Turn on exception handling for mysqli
mysqli_report(MYSQLI_REPORT_STRICT);


// Connect to a specified MySQL database.
// Return the object if we're successful, otherwise throw an error
function ConnectToDatabase($theHost, $theUser, $thePassword, $theDatabase)
{
   $mysqli = null; // Defensive programming
   assert( strlen($theHost) > 0 );    // If you want, you could do even more validation
   assert( strlen($theUser) > 0 );
   assert( strlen($thePassword) > 0);
   assert( strlen($theDatabase) > 0);

   try
      {
         $mysqli = new mysqli($theHost, $theUser, $thePassword, $theDatabase);
      }
   catch (Exception $e)
      {
         throw new Exception("MySQL connection failed\n\n$e");
      }

   assert( $mysqli instanceof mysqli ); // If you get here, then you should have a valid object
   
   return $mysqli;
}



function GeneralQuery($mysqli, $theQuery)
{

   assert($mysqli != null);
   assert( $mysqli instanceof mysqli );
   assert(strlen(trim($theQuery) ) > 0); // Simple check to make sure we have SOMETHING


   $result = null;

   try
      {
         $result = $mysqli->query($theQuery);
      }
   catch (Exception $e)
      {
         throw new Exception("Query failed\n\n $e");
      }



   assert ( $result instanceof mysqli_result );
   return $result;
}


?>
