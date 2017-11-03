<?php
class User{
	private $db;
	
	function __Construct($DB_conn){
		$this->db = $DB_conn;
	}

	public function Register($email, $password, $loginType){
		$hashed_password = sha1($password);
		if($loginType === "staff"){
			
			$stmt = $this->db->query("INSERT INTO staff (email, passkey)VALUES('$this->email', '$hashed_password')");
			if($result){
				echo "Success Your Registered";
			}
		}else{

		}
	}

}
?>