<?php 
	class DbConnect {
		private $host = 'localhost';
		private $dbName = 'registration';
		private $user = 'buckyron';
		private $pass = 'M99445867@l';

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