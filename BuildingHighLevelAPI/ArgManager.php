<?php


// Simple mechanism to manage name/value pairs to render as the arguments of a GET URL string
class ArgManager
{
   private $args = []; // This will hold the arguments



   // Create a new name/value pair and add it to the list
   function AddArg($name, $value)
      {
         assert (is_string($name)  || is_int($name) );
         $this->args = array_merge($this->args, [$name => $value]);
      }


   // Return the set of name/value arguments as a string suitable for use in a URL
   function GetArgsAsString()
      {
         $result = http_build_query($this->args);
         return $result;
      }


   function Clear()
      {
         $this->args = [];
      }



   function __construct()
      {
         $this->Clear(); // Empty array created, we will merge arguments into it
      }

}



?>
