<?php
class User{
	private $db;
	protected $active_hash;
	
	function __Construct($DB_conn){
		$this->db = $DB_conn;
		$this->active_hash = '';
		$this->mailer = '';
	}

	public function Register($email, $password, $userType){
		$hashed_password = sha1($password);
		$this->active_hash = hash("sha256", $this->randomString());
		$encryptedHash = base64_encode($this->active_hash);
		if($userType === "staff"){
			
			$stmt = $this->db->query("INSERT INTO staff (email, passkey, active_hash)VALUES('$email', '$hashed_password', '$this->active_hash')");
			if($stmt){
				$firstName = 'Steve';
				$lastName = "Turcotte";
				try{
				$this->mailer = new myMailer;
				$this->mailer->Subject = "Welcome to Reservd activate your account";
				// html email 
				$this->mailer->Body = '<h2>Hello ' . $firstName . '&nbsp;' . $lastName . '</h2>
				<p>Thankyou for registering for the reservd app to better your business and manage your client bookings to activate your account please follow the link below</p>
				<br />
				<a href="https://cdn.icealleymedia.com/api/activate.php?activateCode=' . $encryptedHash . '" title="Activate your Reservd Account">Activate your account Now</a>
				<p>or</p>
				<p>Copy the url below in to your browsers address field</p>
				<p>https://cdn.icealleymedia.com/api/activate.php?activateCode=' . $encryptedHash . '</p>';
				// Plain Textail
				$this->mailer->AltBody = "Plain Text Here";
				// set user email and ishtml format to true
				$this->mailer->addAddress($email);
				$this->mailer->isHTML(true);

				// send email
				$this->mailer->Send();
				echo "Registration Successful Mail is on its way";
				}catch(Exception $e){
					echo 'Message could not be sent.';
    				echo 'Mailer Error: ' . $this->mailer->ErrorInfo;
				}

				
			}
		}else{
			echo "error Registering user";
		}
	}
	public function randomString($length = 6) {
		$str = "";
		$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}

	public function Login($user, $password, $userType){
		
	}
}
?>