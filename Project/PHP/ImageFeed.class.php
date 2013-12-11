<?php
	require 'Database.class.php';
	require 'Credential.class.php';
	
	class ImageFeed
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
			//$this->resultArray = $this->generateValueArray();			
			
		}
		function generateUserValueArray()
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
				"values"=>$this->database->retrieveUserImageData($this->userID)
			);
			$this->resultArray = $values;
		}
		function generateMostRecentValueArray()
		{
			$values = array
			(
				"columns"=>array
				(
					'username',
					'name',
					'description',
					'directory',
					'date'
				),
				"values"=>$this->database->retrieveMostRecentImageData()
			);
			$this->resultArray = $values;
		}
		function displayUserImages()
		{
			$tag ='';
			$this->generateUserValueArray();
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
		function displayMostRecent()
		{
			$tag ='';
			$this->generateMostRecentValueArray();
			foreach($this->resultArray['values'] as $value)
			{
				$userID = $value[0];
				$name = $value[1];
				$description = $value[2];
				$directory = $value[3];
				$date = $value[4];
				$tag.= "<div id='image_results'>\n";
				$tag.= "<img class='images'src='".$directory."'/>";
				$tag.= "<span class='name'>".$name."</span>";
				$tag.= "<span class='description'>".$description."</span>";
				$tag.= "<span class='poster'>Posted by ".$this->database->getUsername($userID)."</span>";
				$tag.= "<span class='date'>".$date."</span>";
				$tag.= "</div>\n";
			}
			return $tag;
		}
	}
?>