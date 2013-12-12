<?php
	require 'Credential.class.php';
	require 'Database.class.php';
	
	class CommentFeed
	{
		private $credential;
		private $database; 
	
		function __construct()
		{
			$this->credential = new Credential();
			$this->database = new Database
						(
							$this->credential->getHost(),
							$this->credential->getUsername(),
							$this->credential->getPassword(),
							$this->credential->getDBName()
						);
			
		}
		public function addComment($image_id,$username,$comment)
		{
			$comment_id = uniqid();
			$this->database->insertComment($comment_id,
											$image_id,
											$this->database->getUserID($username),
											$comment);
		}
		public function getComments($image_id)
		{
			return $this->database->retrieveComments($image_id);
		}
	}
?>