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
			$this->connection = mysqli_connect($this->host,$this->username,$this->password,$this->dbName);
			
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
	}
	
?>