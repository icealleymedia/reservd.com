<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require_once(dirname(INC_ROOT) . "/classes/PHPMailer/src/Exception.php");
require_once(dirname(INC_ROOT) . "/classes/PHPMailer/src/PHPMailer.php");
require_once(dirname(INC_ROOT) . "/classes/PHPMailer/src/SMTP.php");

class myMailer extends PHPMailer{

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
		$this->SMTPDebug = 0;
	}
	public function send(){
        $r = parent::send();
        return $r;
    }
}
?>