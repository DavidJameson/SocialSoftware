<?php

   require_once "HttpManager.php";
   require_once "ArgManager.php";

   class GoogleManager
   {

      private $httpManager;
      private $argManager;

      function __construct()
      {
         $this->httpManager = new HttpManager;
         $this->httpManager->SetURLprefix("http://google.com/search");
         $this->argManager = new ArgManager;
         $this->httpManager->SetArgManager($this->argManager);
      }


      function Query($searchTerm)
      {
         $this->argManager->Clear();
         $this->argManager->AddArg("q", $searchTerm);
         $page = $this->httpManager->GetPage();
         return $page;
      }
   }

?>
