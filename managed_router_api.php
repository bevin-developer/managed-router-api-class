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
		$this->login();
		echo "called const";
	}

	public function login(){

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
		curl_close($ch);
		echo "logged in";
	}

	public function startCurl($url, $params = ''){
		if($params != '')
		$params = json_encode($params);
	
		$header = array();
		$header[] = 'Content-Type: application/json';
		$header[] = 'Content-Length: ' . strlen($params);
		$header[] = 'Authorization: Bearer '.$this->token;

		$ch = curl_init($url);    
		var_dump($ch);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");   
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);                                                 
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

	/*public function search($url, $params = ''){

		$result_string = $this->startCurl($url,$params);
		var_dump($result_string);

	}*/

	
}
?>