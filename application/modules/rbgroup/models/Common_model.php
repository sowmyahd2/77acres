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
	 	$this->email->set_mailtype("html"); 
		$this->email->from($from,'rbgroup');
       	$this->email->to($to);
       	$this->email->subject($subject);
       	$this->email->message($message);  
       	$this->email->send();       
       
	}

	
	
}