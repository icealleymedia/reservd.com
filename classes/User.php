<?php
class User{
	private $db;
	protected $active_hash;
	
	function __Construct($DB_conn){
		$this->db = $DB_conn;
		$this->active_hash = '';
		$this->mailer = '';
	}

	public function Register($args){ /* old args:  $email, $password, $userType */

		$registerRules = [
			'firstname' => [
				'required',
        		'alpha',
        		'max_length(50)'
			],
			'lastname' => [
				'required',
        		'alpha',
        		'max_length(50)'
			],
			'email' => [
				'required',
				'email'
			],
			'password' => [
				'required',
				'equals(:passwordrepeat)'
			],
			'passwordrepeat' => [
				'required'
			]
		];

		$registerValid = MyValidator::validate($args, $registerRules);
		if ($registerValid->isSuccess() == true) {
			$hashed_password = sha1($args['password']);
			$this->active_hash = hash("sha256", $this->randomString());
			$encryptedHash = base64_encode($this->active_hash);
			if($args['userType'] === "staff"){
				
				$stmt = $this->db->query("INSERT INTO staff (email, passkey, activeHash)VALUES('$args[email]', '$hashed_password', '$this->active_hash')");
				if($stmt){
					try{
					$this->mailer = new myMailer;
					$this->mailer->Subject = "Welcome to Spotter activate your account";
					// html email 
					$this->mailer->Body = '<h2>Hello ' . $args['firstname'] . '&nbsp;' . $args['lastname'] . '</h2>
					<p>Thankyou for registering for Spotter to better your business and manage your client bookings to activate your account please follow the link below</p>
					<br />
					<a href="https://cdn.icealleymedia.com/api/activate.php?activateCode=' . $encryptedHash . '&User=' . base64_encode($args['userType']) . '" title="Activate your Reservd Account">Activate your account Now</a>
					<p>or</p>
					<p>Copy the url below in to your browsers address field</p>
					<p>https://cdn.icealleymedia.com/api/activate.php?activateCode=' . $encryptedHash . '&User=' . base64_encode($args['userType']) .'</p>';
					// Plain Textail
					$this->mailer->AltBody = "Plain Text Here";
					// set user email and ishtml format to true
					$this->mailer->addAddress($args['email']);
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
		}else {
		    echo "validation not ok";
		    var_dump($registerValid->getErrors());
		}
		print_r($args);
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
	public function Login($args){
		print_r($args);
	if(strpos("$args[loginName]", '@') !== false){
			$loginRules = [
				'loginName' => [
					'required',
					'email'
				],
				'loginPass' => [
					'required'
				]
			];
		}else{
			$loginRules = [
				'loginName' => [
					'required',
					'max_length(15)'
				],
				'loginPass' => [
					'required'
				]
			];
		} 
		$loginValid = MyValidator::validate($args, $loginRules);
		if($loginValid->isSuccess() == true){
			$hashed_password = sha1($args['loginPass']);
			if($args['userType'] === "staff"){
				$stmt = $this->db->query("SELECT id FROM staff WHERE email OR username='$args[loginName]' AND passkey='$hashed_password' LIMIT 1");
				if($stmt){
					$count = $stmt->rowCount();
					// create a new response for login to respond in json or html
					$response = new response('html');
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					if($count == 1 && !empty($row)){
						$id = base64_encode($row['id']);
						// if remember me is set set idx cookie
							if(isset($args['remember'])){
								setcookie('idx', $id, time() + 60 * 60 * 24 * 30, "/"); // 86400 = 1 day
						// if not set a session variable of 'id'
							}else{
								$_SESSION['id'] = $id;
							}
							$responseRules = [
									'status' => 200,
									'redirect' => true,
									'redirectUrl' => 'dashboard.php',
									'data' => [
										'success' => true
									]
								];

							$response->getResponse($responseRules);
					}else{
						$responseRules = [
							'status' => 400,
							'data' => [
								'success' => false,
								'message' => 'Invalid Username and Password'
							]
						];
						$response->getResponse($responseRules);

						print_r($response->data);
					}
				}
			}else if($args['userType'] === "consumer"){

			}else{
				echo "Something went wrong unable to login please try again.";
			}
		}else{
		    echo "Login Failed";
		    var_dump($loginValid->getErrors());
		}
	}

	public function Verify($args){
		$hashed_password = sha1($args["Password"]);
		$code = base64_decode($args['activateCode']);
		if(base64_decode($args['userType']) === "staff"){
				$stmt = $this->db->query("UPDATE staff SET active = 1 WHERE passkey = '$hashed_password' AND activeHash = '$code' LIMIT 1");
				if($stmt){
					echo "Thankyou for Verifying your Account Please Login";
				}else{
					echo "Unable to verify";
				}
		}else if(base64_decode($args['userType']) === "consumer"){
			$stmt = $this->db->query("UPDATE consumer SET active=1 WHERE passkey = $hashed_password AND activeHash = $code LIMIT 1");
			if($stmt){
				echo "Thankyou for Verifying your Account Please Login";
			}else{
				echo "Unable to verify";
			}
		}else{
			echo "Unable to verify";
		}

	}
}
?>