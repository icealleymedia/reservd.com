<?php
	class spotterMailer extends phpMailer{
		public function __construct(){
			parent::__construct();
			$this->setFrom("no-reply@icealleymedia.com","Ice Alley Media");
			$this->isSMTP();
			$this->isHTML(true);
			$this->SMTPAuth = true;
			$this->Host = "ssl://mail.icealleymedia.com:465; mail.icealleymedia.com:26";
			$this->Username = "no-reply@icealleymedia.com";
			$this->replyTo = "info@icealleymedia.com";
			$this->Password = "Nattie92$";
			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			if(APP_DEBUG == true){
				$this->SMTPDebug = 2;
			}else{
				$this->SMTPDebug = 0;
			}
		}
		
		public function RegisterMail($args){
					// subject of email
					$this->Subject = "Welcome to Spotter activate your account";
					// html email

					$this->Body = '<h2>Hello ' . $args['firstname'] . '&nbsp;' . $args['lastname'] . '</h2>
					<p>Thankyou for registering for Spotter to better your business and manage your client bookings to activate your account please follow the link below</p>
					<br />
					<a href="https://cdn.icealleymedia.com/api/activate.php?activateCode=' . $encryptedHash . '&User=' . base64_encode($args['userType']) . '" title="Activate your Reservd Account">Activate your account Now</a>
					<p>or</p>
					<p>Copy the url below in to your browsers address field</p>
					<p>https://cdn.icealleymedia.com/api/activate.php?activateCode=' . $encryptedHash . '&User=' . base64_encode($args['userType']) .'</p>';

					// Plain Textail
					$this->AltBody = "Plain Text Here";

					// set user email and ishtml format to true
					$this->addAddress($args['email']);

					// send email
					$this->Send();
			
		}
	
		public function send(){
			$r = parent::send();
			return $r;
		}
	}
?>