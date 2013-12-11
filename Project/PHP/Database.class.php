<?php
	class Database
	{
		private $host;
		private $username;
		private $password;
		private $dbName;
		
		private $connection;
		
		function __construct($h_entry,$u_entry,$p_entry,$db_entry)
		{
			$this->host = $h_entry;
			$this->username = $u_entry;
			$this->password = $p_entry;
			$this->dbName = $db_entry;
			$this->connect();
		}
		public function connect()
		{
			$successful = true;
			$this->connection = mysqli_connect
			($this->host,$this->username,$this->password,$this->dbName);
			
			if(mysqli_connect_errno($this->connection))
			{
				$successful = false;
			}
			return $successful;
		}
		public function getConnection()
		{
			return $this->connection;
		}
		function retrieveImageData($userID)
		{
			$query = "select name,description,directory,date from images where user_id = '".$userID."'";
			$result = mysqli_query($this->connection,$query);
			$resultArray = array();
			while($row = mysqli_fetch_array($result))
			{
				$name = $row['name'];
				$description = $row['description'];
				$directory = $row['directory'];
				$date = $row['date'];
				
				array_push($resultArray,array($name,$description,$directory,$date));
			}
			return $resultArray;
		}
		public function getUsers()
		{
			$query = "select * from users";
			$result = mysqli_query($this->connection,$query);
			
			while($row = mysqli_fetch_array($result))
			{
				$userID = $row['user_id'];
				$username = $row['username'];
				$password = $row['password'];
				
				echo 'ID: '.$userID.'	Username: '.$username.
				'	Password: '.$password.'<br/>';
			}
		}
		public function getUserHome($username)
		{
			$field = 'home_path';
			$query = "select ".$field." from users where username ='".$username."'";
			$result = mysqli_query($this->connection,$query);
			$row = mysqli_fetch_array($result);
			return $row['home_path'];
		}
		public function getUserEmail($username)
		{
			$field = 'email';
			$query = "select ".$field." from users where username ='".$username."'";
			$result = mysqli_query($this->connection,$query);
			$row = mysqli_fetch_array($result);
			return $row['home_path'];
		}
		public function getUserID($username)
		{
			$field = 'user_id';
			$query = "select ".$field." from users where username ='".$username."'";
			$result = mysqli_query($this->connection,$query);
			$row = mysqli_fetch_array($result);
			return $row['user_id'];
		}
		public function getUsername($userID)
		{
			$field = 'username';
			$query = "select ".$field." from users where username ='".$userID."'";
			$result = mysqli_query($this->connection,$query);
			$row = mysqli_fetch_array($result);
			return $row['username'];
		}
		public function getTime()
		{
			return date('l jS \of F Y h:i:s A');
		}
		public function insertImage($image_id,$name,$username,
		$directory,$description,$privacy)
		{
			$table = 'images';
			$values = array
			(
				"columns"=>array
				(
					'id',
					'name',
					'user_id',
					'description',
					'privacy',
					'directory',
					'date'
				),
				"values"=>array
				(
					array
					(
						"'".$image_id."'",
						"'".$name."'",
						"'".$this->getUserID($username)."'",
						"'".$description."'",
						"'".$privacy."'",
						"'".$directory."'",
						"'".$this->getTime()."'"
						
					)
				)
			);
			
			$query = $this->createInsertSQL($values,$table);

			if(!mysqli_query($this->getConnection(),$query))
			{
				echo mysqli_error($this->getConnection());
			}
		}
		public function createInsertSQL($arrayData,$table)
		{
			$query = $this->generateInsertInto($arrayData['columns'],$table);
			$query = $query.$this->generateValues($arrayData['values']);
			
			return $query;
		}
		public function generateInsertInto($arrayColumns,$table)
		{
			$query = "INSERT INTO ".$table."(";
			
			foreach($arrayColumns as $column)
			{
				
				 $query = $query.$column;
				 if($this->isLastIndex($arrayColumns,$column))
				 {
				 	$query = $query.')';
				 }
				 else
				 {
				 	$query = $query.',';
				 }
			}
			
			return $query; 
		}
		public function generateValues($arrayFieldValues)
		{
			$query = '';
			foreach($arrayFieldValues as $valueField)
			{
				$query2 = " VALUES(";
				foreach($valueField as $fieldData)
				{
					$query2 = $query2.$fieldData;
					if($this->isLastIndex($valueField,$fieldData))
				 	{
				 		$query2 = $query2.')';
				 	}
				 	else
				 	{
				 		$query2 = $query2.',';
				 	}
				}
				
				/*if(!$this->isLastIndex($arrayFieldValues,$valueField))
				{
					$query2 = $query2.',';
				}*/
				$query = $query.$query2;
				
			}
			return $query;
		}
		public function isLastIndex($array,$element)
		{
			//echo "element: ".$element." end: ".end($array).'<br/>';
			return ($element == end($array));
		}
		
	}
	
?>