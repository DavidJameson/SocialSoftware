<?php
	class Credential
	{
		private $host;
		private $username;
		private $password;
		private $dbName;
		
		function __construct()
		{
			$this->host = 'Pixelgraphy.db.11837707.hostedresource.com';
			$this->username = 'Pixelgraphy';
			$this->password = 'P@web2013';
			$this->dbName = 'Pixelgraphy';
		}
		public function getHost()
		{
			return $this->host;
		}
		public function getUsername()
		{
			return $this->username;
		}
		public function getPassword()
		{
			return $this->password;
		}
		public function getDBName()
		{
			return $this->dbName;
		}
	}
?>