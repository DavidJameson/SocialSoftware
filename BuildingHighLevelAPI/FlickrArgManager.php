<?php
   require_once "ArgManager.php";

   class FlickrArgManager extends ArgManager
   {

      private $apiKey;

      function __construct($aKey)
      {
         $this->apiKey = $aKey;
         parent::__construct();
      }

      function Clear()
      {
         parent::Clear();
         $this->AddArg("format", "json");
         $this->AddArg("api_key", $this->apiKey);
      }


   }

?>
