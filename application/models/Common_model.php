<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this -> result_mode = 'object';
		//Do your magic here
	}

	public function send_mail($from,$to,$subject,$message,$cc='')
	{
	    $this->load->library('email');
$config = array();

$config['smtp_port'] = 'smtp';
$config['smtp_host'] = 'mail.rbrealestate.in';
$config['smtp_user'] = 'info@rbrealestate.in';
$config['smtp_pass'] = ']7&Vl9eYQ#98';
$config['smtp_port'] = 465;
$config['mailtype'] = 'html';
$config['charset'] = 'iso-8859-1';

$this->email->initialize($config);
$this->email->set_newline("\r\n");
        $this->email->from("info@rbrealestate.in", 'RB Group - Real Estate');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        //Send mail
       $this->email->send();
       
    //   if ($this->email->send()) {
    //     echo 'Your email was sent, thanks chamil.';
    // } else {
    //     show_error($this->email->print_debugger());
    // }
              
	 /*	$this->load->library('email'); 
	 	$this->email->set_mailtype("html"); 
		$this->email->from($from,'RB Group - Real Estate');
       	$this->email->to($to);
       	$this->email->subject($subject);
       	$this->email->message($message);  
       	$this->email->send();       
        return $this->email->print_debugger(); */
	}

	public function register_sms($phone,$sms_message)
	{
		// Account details
		$apiKey = urlencode(SMSUSERKEY);
		
		// Message details
		$numbers = array($phone);
		$sender = urlencode(SMSSENDERID);
		$message = rawurlencode($sms_message);
	 
		$numbers = implode(',', $numbers);
	 
		// Prepare data for POST request
		$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
	 
		// Send the POST request with cURL
		$ch = curl_init('https://api.textlocal.in/send/');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		
		// Process your response here
		return $response;

		/*exit;
		$user = SMSUSERKEY; //your username
		$password = SMSPASSKEY; //your password
		$mobilenumbers=$phone; //enter Mobile numbers comma seperated		
		$message = $sms_message; //enter Your Message 
		$senderid = SMSSENDERID; //Your senderid
		$messagetype="N"; //Type Of Your Message
		//$url="http://info.bulksms-service.com/WebserviceSMS.aspx";
		//domain name: Domain name Replace With Your Domain  
		$message = urlencode($message);
		//----------------------------------
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api-alerts.kaleyra.com/v4/?method=sms&sender=".$senderid."&to=".$mobilenumbers."&message=".$message."&api_key=Ad6cf2841bd5f2bdc1d717c23d11dcdfa",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		//----------------------------------
		if ($err) {
			$result = "cURL Error #:" . $err;
		} else {
			$result = $response;
		}*/
		/*return $result;*/
		
	}
	
}