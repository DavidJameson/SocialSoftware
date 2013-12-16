<?php
	require 'Credential.class.php'; //stores host info
	require 'Database.class.php';
	class ImageServerUpload
	{
		
		private $credential;
		private $database;
		private $user;
		private $file;
		private $name;
		private $description;
		private $isProfile;
		private $directory;
		private $domain;
		private $image_id;
		
		function __construct($user,$file,$name,$description,$isProfile)
		{
			$this->credential = new Credential();
			$this->database = new Database
								(
								$this->credential->getHost(),
								$this->credential->getUsername(),
								$this->credential->getPassword(),
								$this->credential->getDBName()
								);
								
			$this->user = $user;
			$this->file = $file;
			$this->name = $name;
			$this->description = $description;
			$this->image_id = uniqid();
			$this->isProfile = $isProfile;
			$this->directory = $this->generateDirectory();
			$this->domain = 'pixelgraphy.net';
		}
		public function toString()
		{
			$str = "";
			$str .=$this->image_id."<br/>";
			$str .=$this->file['name'].'<br/>';
			$str .=$this->directory.'<br/>';
			$str .=$this->user.'<br/>';
			return $str;
		}
		public function updateProfilePicture($table,$setting,$data,$user)
		{
			$this->database->updateUserSettings($table,$setting,$data,$user);
		}
		public function uploadImageFile()
		{
			$ext = $this->getFileExtension($this->name);
			
			if($this->isImageFile($ext) && $this->noFileError() && $this->noDuplicate())
			{
				if(move_uploaded_file($this->file['tmp_name'],"../".$this->directory))
				{
					if($this->isProfile == 'true')
					{
						$this->database->updateUserSettings('uprofile','profile_picture',$this->directory,$this->user);
					}
					else
					{
						$this->database
						->insertImage($this->image_id,$this->name,$this->user,
						$this->directory,$this->description,0);
					}
					
					echo "File Uploaded";
				}
			}
			elseif(!$this->isImageFile($ext))
			{
				echo "not an image file.";
			}
			elseif(!$this->noFileError())
			{
				echo "there's a file error."."<br/>".$file['error'];
			}
			elseif(!$this->noDuplicate())
			{
				echo "Already exists";
			}
		}
		private function removeFileExtension()
		{
			$temp = explode(".", $this->file['name']);
			$extension = $temp[0];
			return $extension;
		}
		private function getFileExtension()
		{
			$temp = explode(".", $this->file['name']);
			$extension = end($temp);
			return $extension;
		}
		private function isImageFile()
		{
			$extension = $this->getFileExtension();
			$isImageFile = false;
			$allowedExts = array("gif", "jpeg", "jpg", "png","JPG");
			
			if(in_array($extension, $allowedExts))
			{
				$isImageFile = true;
			}
			
			return $isImageFile;
		}
		private function noFileError()
		{
			$noError = true;
			if ($this->file["error"] > 0)
			{
				$noError = true;
			}
			return $noError;
		}
		private function noDuplicate()
		{
			$noDuplicate = true;
			if (file_exists($this->directory))
			{
				$noDuplicate = false;
			}
			return $noDuplicate;
		}
		public function generateDirectory()
		{
			$dir = $this->database->getUserHome($this->user).'/'.
			$this->image_id.'.'.$this->getFileExtension();
			return $dir;
		}
		//Getters and Setters
		public function getCredential()
		{
			return $this->credential;
		}
		public function getDatabase()
		{
			return $this->database;
		}
		public function getFile()
		{
			return $this->file;
		}
		public function getImage()
		{
			return $this->image_id;
		}
		public function getDirectory()
		{
			return $this->directory;
		}
		
		public function setCredential($credential)
		{
			$this->credential = $credential;
		}
		public function setDatabase($database)
		{
			$this->database = $database;
		}
		public function setFile($file)
		{
			$this->file = $file;
		}
		
	}
?>