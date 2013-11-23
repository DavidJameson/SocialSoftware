<?php


require_once "DatabaseManagement.php";


function ProcessRows($rows)
{
   assert ($rows instanceof mysqli_result); // Make sure the type of the incoming variable is correct

   while ($row = $rows->fetch_assoc())
      {
         echo $row['Surname'] . "\n";
      }
}

// Main program

$host = "Address of machine running MySQL goes here";
$username = "Replace with your username";
$password =  "Replace with your password";
$database = "Replace with the name of your database";

try
   {
      $mysqli = ConnectToDatabase($host, $username, $password, $database);

      $rows = GeneralQuery($mysqli, "select * from Addresses order by Surname"); // My database has a table called Addresses and a column named Surname

      if ($rows->num_rows > 0)
         //then
            {
               ProcessRows($rows); // Do whatever we need to do with the rows of info that we got back
            }
         else echo "No rows returned from query";

   }
catch (Exception $e)
   {
      echo "Caught:  $e";
   }

?>
