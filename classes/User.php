<?php
class User{
	private $db;
	
	function __Construct($DB_conn){
		$this->db = $DB_conn;
	}

	public function Register($email, $password, $loginType){
		$hashed_password = sha1($password);
		$active_hash = hash("sha256", $this->randomString());
		if($loginType === "staff"){
			
			$stmt = $this->db->query("INSERT INTO staff (email, passkey, active_hash)VALUES('$email', '$hashed_password', '$active_hash')");
			if($stmt){
				echo "Success Your Registered";
			}
		}else{

		}
	}
	function randomString($length = 6) {
		$str = "";
		$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}
}
?>