<?php
class User{
	private $db;
	protected $active_hash;
	public $data;

	
	function __Construct($DB_conn){
		$this->db = $DB_conn;
		$this->active_hash = '';
		$this->mailer = '';
		$this->data = '';
	}

	public function Register($args){ /* old args:  $email, $password, $userType */
		$response = new response(DATA_REQUEST);
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
					$responseRules = [
									'status' => 200,
									'redirect' => true,
									'redirectUrl' => '/dashboard.php',
									'data' => [
										'is_good' => 1,
										'message' => 'Registration Successful'
									]
								];

							$response->getResponse($responseRules);
					}catch(Exception $e){
						echo 'Message could not be sent.';
	    				$errors = $this->mailer->ErrorInfo;
	    				$responseRules = [
							'status' => 400,
							'data' => [
								'is_good' => 0,
								'message' => 'Invalid email may have been provided if this is the correct email please Contact Support at Support@spotterapp.com',
								'errors' => $errors
							]
						];
						$response->getResponse($responseRules);
					}
						
					
				}
			}else{
				// if not staff registration register consumer
				$stmt = $this->db->query("INSERT INTO users(email, passkey, activeHash)VALUES('$args[email]', '$hashed_password', '$this->active_hash')");
				if($stmt){
					try{
					$this->mailer = new myMailer;
					$this->mailer->Subject = "Welcome activate your Spotter app account";
					// html email 
					$this->mailer->Body = '<h2>Hello ' . $args['firstname'] . '&nbsp;' . $args['lastname'] . '</h2>
					<p>Thankyou for registering for the spotter app to better your business and manage your client bookings to activate your account please follow the link below</p>
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
					$responseRules = [
									'status' => 200,
									'redirect' => true,
									'redirectUrl' => '/dashboard.php',
									'data' => [
										'is_good' => 1,
										'message' => 'Registration Successful',
									]
								];

							$response->getResponse($responseRules);

					}catch(Exception $e){
						
	    				$responseError = json_encode($this->mailer->ErrorInfo);
						$responseRules = [
							'status' => 400,
							'data' => [
								'is_good' => 0,
								'message' => 'Invalid email may have been provided if this is the correct email please Contact Support at Support@spotterapp.com',
								'error' => $responseError
							]
						];
						$response->getResponse($responseRules);
					}
				}
			}
		}else{
		    $errors = json_encode($registerValid->getErrors());
		    $responseRules = [
							'status' => 400,
							'data' => [
								'is_good' => 0,
								'message' => 'Information Missing',
								'errors' => $errors
							]
						];
						$response->getResponse($responseRules);
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

////////// method to log user in to application /////////////
	public function Login($args){
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
				$stmt = $this->db->query("SELECT * FROM staff WHERE username OR email = '$args[loginName]' AND passkey='$hashed_password' AND active = 1 LIMIT 1");
				if($stmt){
					$count = $stmt->rowCount();
					// create a new response for login to respond in json or html
					$response = new response(DATA_REQUEST);
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
									'redirectUrl' => '/dashboard.php',
									'data' => [
										'is_good' => 1,
										'message' => 'Login Successful',
										'id' => $id
									]
								];

							$response->getResponse($responseRules);
					}else{
						$responseRules = [
							'status' => 400,
							'data' => [
								'is_good' => 0,
								'message' => 'Invalid Username and Password'
							]
						];
						$response->getResponse($responseRules);
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
	public function getUser($args){
		$userid = base64_decode($args);
		$stmt = $this->db->query("SELECT * FROM staff INNER JOIN staff_profile ON staff.id = staff_profile.staff_id WHERE staff.id = $userid");
		$count = $stmt->rowCount();
		$response = new response(DATA_REQUEST);
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					if($count <= 1 && !empty($row)){
						$this->data = [
							"id" => $row["id"],
							"email" => $row["email"],
							"username" => $row["username"],
							"firstname" => $row["firstname"],
							"lastname" => $row["lastname"]
						];
							$responseRules = [
									'status' => 200,
									'redirect' => true,
									'redirectUrl' => '/dashboard.php',
									'data' => $this->data
								];

							$response->getResponse($responseRules);
					}else{
						$responseRules = [
							'status' => 400,
							'redirect' => true,
							'redirectUrl' => '/login.php',
							'data' => [
								'is_good' => 0,
								'message' => 'Oops seems we are having difficulty finding what you need'
							]
						];
						$response->getResponse($responseRules);
					}

	}
	public function UpdateUser($args){

	}
}
?>