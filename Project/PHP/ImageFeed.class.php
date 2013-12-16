<?php
	require 'Database.class.php';
	require_once 'Credential.class.php';
	
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
					'image_id',
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
				$id = $value[0];
				$name = $value[1];
				$description = $value[2];
				$directory = $value[3];
				$date = $value[4];
				$tag.= "<div id ='".$id."'class='image_results'>\n";
				$tag.= "<img class='images'src='".$directory."'/>";
				$tag.= "<span class='name'>".$name."</span>";
				$tag.= "<span class='description'>".$description."</span>";
				$tag.= "<span class='date'>".$date."</span>";
				$tag.= "<button class='remove_button' onclick=removeImage('".$id."');> Remove Image</button>";
				$tag.= "</div>\n";
			}
			return $tag;
		}
		function displayPublicUserImages()
		{
			$tag ='';
			$this->generateUserValueArray();
			foreach($this->resultArray['values'] as $value)
			{
				$id = $value[0];
				$name = $value[1];
				$description = $value[2];
				$directory = $value[3];
				$date = $value[4];
				$tag.= "<div id ='".$id."'class='image_results'>\n";
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
			$tag.= "<div id='image_results'>\n";
			$this->generateMostRecentValueArray();
			foreach($this->resultArray['values'] as $value)
			{
				$imageId = $value[0];
				$userID = $value[1];
				$name = $value[2];
				$description = $value[3];
				$directory = $value[4];
				$date = $value[5];
				$profileUrl = "http://pixelgraphy.net/viewprofile.php?id=".$userID;
				$tag.= "<div class='post_container'>";
				$tag.= "<img class='images'src='".$directory."'/>";
				$tag.= "<span class='name'>".$name."</span>";
				$tag.= "<span class='description'>".$description."</span>";
				$tag.= "<span class='poster'>Posted by "."<a href='".$profileUrl."'>"
				.$this->database->getUsername($userID)."</a></span>";
				$tag.= "<span class='date'>".$date."</span>";
				$tag.= "<span id='".$imageId."'class=comments></span>";
				$tag.= "<button class='viewcomments' id='".$imageId
						."_button'onclick=displayComment('".$imageId
						."')>Show Comments</button>";
				$tag.= "</div>\n";
								
			}
			$tag.= "</div>\n";
			return $tag;
		}
	}
?>