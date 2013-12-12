<?php
	require 'Database.class.php';
	require 'Credential.class.php';
	
	class UserImageFeed
	{
		private $username;
		private $userID;
		private $database;
		private $credential;

		private $resultArray;
		
		function __construct($user)
		{
			
			$this->credential = new Credential();
			$this->database = new Database
						(
							$this->credential->getHost(),
							$this->credential->getUsername(),
							$this->credential->getPassword(),
							$this->credential->getDBName()
						);
			$this->username = $user;
			$this->userID = $this->database->getUserID($this->username);
			$this->resultArray = $this->generateValueArray();			
			
		}
		function generateValueArray()
		{
			$values = array
			(
				"columns"=>array
				(
					'name',
					'description',
					'directory',
					'date'
				),
				"values"=>$this->database->retrieveImageData($this->userID)
			);
			return $values;
		}
		function displayImages()
		{
			$tag ='';
			foreach($this->resultArray['values'] as $value)
			{
				$name = $value[0];
				$description = $value[1];
				$directory = $value[2];
				$date = $value[3];
				$tag.= "<div id='image_results'>\n";
				$tag.= "<img class='images'src='".$directory."'/>";
				$tag.= "<span class='name'>".$name."</span>";
				$tag.= "<span class='description'>".$description."</span>";
				$tag.= "<span class='date'>".$date."</span>";
				$tag.= "</div>\n";
			}
			return $tag;
		}
	}
?>