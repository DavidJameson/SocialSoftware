<?php


require_once "ArgManager.php";

class HttpManager
{

   private $theURLprefix = null;

   function SetURLprefix($aURL)
   {
      assert(is_string($aURL)); // Maybe add more stuff to check that it starts with http, that it's a valid domain, etc

      $this->theURLprefix = $aURL;
   }


   private $theArgManager = null;

   function SetArgManager($anArgManager)
   {
      assert($anArgManager != null);

      $this->theArgManager = $anArgManager;
   }

   function GetPage()
   {
      assert(is_string($this->theURLprefix));
      assert($this->theArgManager instanceof ArgManager);

      $argsAsString = $this->theArgManager->GetArgsAsString();
      $query = $this->theURLprefix . "?" . $argsAsString;
      $page = file_get_contents($query);
      return $page;
   }
}

?>
