<?php
require_once("php/ApplicationHandler.php");
class Manager{

    private $_isLoggedIn;
    private $ApplicationHandler;

    function __construct(){
        $this->ApplicationHandler = new ApplicationHandler;
        $this->debugToConsole("balls");
    }

    public function isValidLogin($username,$password){

        if($password == " "){
            $this->_isLoggedIn = false;
        }
        else{
            $this->_isLoggedIn = true;
        }
    }

    public function isLoggedIn(){
        return $this->_isLoggedIn;
    }

    public function debugToConsole($text){
        $output = $text;
        if (is_array($output))
            $output = implode(',', $output);        
            echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }

    public function getCountryList(){
        $curlInstance = curl_init();

		curl_setopt($curlInstance, CURLOPT_URL, "localhost/api/Countries.json"); //set API URL
		curl_setopt($curlInstance, CURLOPT_POST, true);
		curl_setopt($curlInstance, CURLOPT_RETURNTRANSFER, true); //enables returned JSON from execution
		curl_setopt($curlInstance, CURLOPT_SSL_VERIFYPEER, false); //disables SSL/TPL for execution
		curl_setopt($curlInstance, CURLOPT_SSL_VERIFYHOST, false); // **

		//setting header variables for API call. (So API reaches correct Endpoint)
		$headers = array(
			'Content-Type: application/x-www-form-urlencoded',
			'Accept: */*',
			'Host: localhost' //return address
		);
		curl_setopt($curlInstance, CURLOPT_HTTPHEADER, $headers); //provides the CURLOPT_HTTPHEADER with the $header array for the curl request

		//executes the curl request and gets the status code (200) being success
		$requestReturn = curl_exec($curlInstance);
		//ALWAYS CLOSE CONNECTIONS!
		curl_close($curlInstance);

		// Check if a response was given
		if($requestReturn == false){
			$this->_isLoggedIn = false;
			$this->debugToConsole("API Interface","No response from server. The site may be down, or the username or password may be incorrect.");
			return;
		}

        $clist = array();

        foreach(json_decode($requestReturn) as $x)
             array_push($clist,$x->name);

        return $clist;
    }

    public function getVisaList($filters){
        $lengths = array("Up To 6 Months", "Rolling");
        $types = array("Skilled Worker Visa", "Study Visa", "Extended Stay Visa", "Permenant Stay");
        if(!isset($filters)){
            $this->ApplicationHandler->createVisaList($this->getCountryList(),$types, $lengths);
        }if(isset($filters[0]) && !isset($filters[1])){
            $this->ApplicationHandler->createVisaList(array($filters[0]),$types,$lengths);
        }if(isset($filters[1]) && !isset($filters[0])){
            $this->ApplicationHandler->createVisaList($this->getCountryList(),array($filters[1]),$lengths);
        }if(isset($filters[1]) && isset($filters[0])){
            $this->ApplicationHandler->createVisaList(array($filters[0]),array($filters[1]),$lengths);
        }

        return $this->ApplicationHandler->getVisaTypes();
    }
}
?>