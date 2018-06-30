<?php
class User{

	private $db;

	function __construct($DB_Con){
		$this->db = $DB_Con;
	}

	public function login($loginID, $upass, $remember){
		try{
			$stmt = $this->db->prepare("SELECT * FROM Users WHERE email OR Username = :loginID LIMIT 1");

			$stmt->execute(array(':loginID' => $loginID));

			$userRow = $stmt->fetch(PDO::FETCH_ASSOC);

			if($stmt->rowCount() > 0){
				if(password_verify($upass, $userRow["pass_key"])){
	                if(isset($remember) && $remember == true){
	                	// set cookie if remember me is selected.
	                	setcookie("idx", base64_encode($userRow['user_id']));
	                }else{
	                	$_SESSION['user_session'] = base64_encode($userRow['user_id']);
	            	}
	                return true;
				}else{
					return false;
				}
			}
		}catch(PDOException $e){
           echo $e->getMessage();
     	}
    }

    public function registerUser(){
    	
    }
}
?>