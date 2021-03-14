<?php
    class Users {

        protected $id;
        protected $username;
        protected $firstname;
        protected $lastname;
        protected $email;
        protected $password;
        protected $website;
        protected $phone;
        protected $age;
        protected $dob;
        protected $conn;

        function setId($id) { $this->id = $id; }
        function getId() { return $this->id; }
        function setUsername($username) { $this->username = $username; }
        function getUsername() { return $this->username; }
        function setFirstname($firstname) { $this->firstname = $firstname; }
        function getFirstname() { return $this->firstname; }
        function setLastname($lastname) { $this->lastname = $lastname; }
        function getLastname() { return $this->lastname; }
        function setEmail($email) { $this->email = $email; }
        function getEmail() { return $this->email; }
        function setPassword($password) { $this->password = $password; }
        function getPassword() { return $this->password; }
        function setWebsite($website) { $this->website = $website; }
        function getWebsite() { return $this->website; }
        function setPhone($phone) { $this->phone = $phone; }
        function getPhone() { return $this->phone; }
        function setAge($age) { $this->age = $age; }
        function getAge() { return $this->age; }
        function setDob($dob) { $this->dob = $dob; }
        function getDob() { return $this->dob; }

        function __construct() {
            require 'DbConnect.php';
            $db = new DbConnect();
            $this->conn = $db->connect();
        }

        public function getUserByEmail() {
			$stmt = $this->conn->prepare('SELECT * FROM Users WHERE email = :email');
			$stmt->bindParam(':email', $this->email);
			try {
				if($stmt->execute()) {
					$user = $stmt->fetch(PDO::FETCH_ASSOC);
				}
			} catch (Exception $e) {
				echo $e->getMessage();
			}
			return $user;
		}

        public function save() {
            $sqlInsert = "INSERT INTO `Users`(`id`, `username`, `firstname`, `lastname`, `email`, `password`, `website`, `phone`, `age`, `dob`) VALUES (null,:username,:firstname,:lastname,:email,:password,:website,:phone,:age,:dob)";
            $stmt = $this->conn->prepare($sqlInsert);

            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':firstname',$this->firstname);
            $stmt->bindParam(':lastname', $this->lastname);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':website', $this->website);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':age', $this->age);
            $stmt->bindParam(':dob', $this->dob);

            try {
				if($stmt->execute()) {
					return true;
				} else {
					return false;
				}
			} catch (Exception $e) {
				echo $e->getMessage();
			}
        }

        public function createJSON(){
            $query = "select * from Users";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $json = json_encode($result, true);
            $fo = fopen("data.json", "w");
            $fr = fwrite($fo, $json);
            echo("erroe");
        }

        public function update() {
            $sqlInsert = "UPDATE Users SET firstname= :firstname, lastname= :lastname, phone= :phone, website= :website, age= :age, dob= :dob  WHERE email= :email";
            $stmt = $this->conn->prepare($sqlInsert);

            $stmt->bindParam(':firstname',$this->firstname);
            $stmt->bindParam(':lastname', $this->lastname);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':website', $this->website);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':age', $this->age);
            $stmt->bindParam(':dob', $this->dob);


            

            try {
				if($stmt->execute()) {
					return true;
				} else {
					return false;
				}
			} catch (Exception $e) {
				echo $e->getMessage();
			}
        }
        
    }
?>