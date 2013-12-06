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
		public function getUsers()
		{
			$query = "select * from users";
			$result = mysqli_query($this->connection,$query);
			
			while($row = mysqli_fetch_array($result))
			{
				$userID = $row['user_id'];
				$username = $row['username'];
				$password = $row['password'];
				
				echo 'ID: '.$userID.'	Username: '.$username.'	Password: '.$password.'<br/>';
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
			return $row['home_path'];
		}
		public function insertImage()
		{
			
		}
		public function createInsertSQL($arrayData,$table)
		{
			$query = $this->generateInsertInto($arrayData['columns'],$table);
			$query = $query.$this->generateValues($arrayData['values']);
			
			echo $query;
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
				$query2 = "VALUES(";
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
				if($this->isLastIndex($arrayFieldValues,$valueField))
				{
					$query2 = $query2.';';
				}
				else
				{
					$query2 = $query2.',';
				}
				$query = $query.$query2;
			}
			
			return $query;
		}
		public function isLastIndex($array,$element)
		{
			return ($element == end($array));
		}
		
	}
	
?>