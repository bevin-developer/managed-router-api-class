<?php 
class ManagedRouterAPI {
	protected $url;
	protected $username;
	protected $password;
	protected $display_errors;
	protected $token;

	function __construct($url, $username, $password, $display_errors = false) {

		$this->url = $url;
		$this->username = $username;
		$this->password = $password;
		$this->display_errors = $display_errors;
		$this->connect();
	}

	private function connect(){

		$data = array("username" => $this->username, "password" => $this->password);
		$data_string = json_encode($data);                                                                                       
		$ch = curl_init($this->url);    
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");   
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(        
		    'Content-Type: application/json',                  
		    'Content-Length: ' . strlen($data_string))         
		);                                                 
		$result_string = curl_exec($ch);
		$result = json_decode($result_string);
		$this->token = $result->token;
	}

	
}
?>