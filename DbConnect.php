<?php 
	class DbConnect {
		private $host = 'http://sql6.freemysqlhosting.net/';
		private $dbName = 'sql6398911';
		private $user = 'sql6398911';
		private $pass = 'GZxUrGwg9F';

		public function connect() {
			try {
				$conn = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->dbName, $this->user, $this->pass);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conn;
			} catch( PDOException $e) {
				echo 'Database Error: ' . $e->getMessage();
			}
		}
	}
 ?>
