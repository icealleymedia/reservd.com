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
		
		public function RegisterMail(){
			
		}
	
		public function send(){
			$r = parent::send();
			return $r;
		}
	}
?>