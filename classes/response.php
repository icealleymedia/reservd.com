<?php
class response{

	public function __construct($requester){
		$this->requestType = $requester;
	}

	public function getResponse($args){
		$this->statusCode = ((isset($args['status'])))?: 400;
		$this->redirect = ((isset($args['redirect']))) ?: false;
		$this->redirectUrl = ((isset($args['redirectUrl']))) ?: '404.php';
		$this->data = ((isset($args['data']))) ?: 'This is your data';

		if($this->requestType === 'json'){
			header('Content-type: application/json', true, $this->statusCode);
			echo json_encode($this->data); // Data to be encoded and sent back to requester through json
		}else{
			if($this->redirect === true){
				if($this->redirectUrl !== ''){
					header('location:' . $this->redirectUrl);
				}else{
					echo "error no redirect url found";
				}
			}
			echo implode($this->data);
		}

	}

}
?>