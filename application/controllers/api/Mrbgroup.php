<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Mrbgroup extends REST_Controller {
    
      /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       	parent::__construct();
       	$this->load->database();
       	$this->load->model('Common_model','common_model');
       	$this->load->model('rbgroup/Products_model','products');
		$this->load->model('rbgroup/Reguser_model', 'users');
		$this->load->model('rbgroup/Cities_model', 'citydetails');
		$this->load->model('rbgroup/States_model', 'statedetails');
    }
       
    /**
     * Send OTP to user from this method.
     *
     * @return Response
    */
    public function sendotp_post()
    {
        $json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        $user_content = array(
            'number' => $obj['number'],
            'emailId' => $obj['emailId'],
            'otp' => $obj['otp']
        );
        //mail code
            $message = $this -> load -> view('email/otp',$user_content,TRUE);
            $email_result = $this -> common_model -> send_mail(admin_email,$user_content['emailId'],'Account Varefication',$message);
        //mail code ends here
        $this->response(array('isSuccess'=> true,'response'=> 'otp sent successfully'), REST_Controller::HTTP_OK);
    }
     
    /**
     * Register the user from this method.
     *
     * @return Response
    */
    public function register_post(){
        $json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        if($this -> users->where(array('email' => $obj['email']))->count_all_results())
        {
            $this->response(array('isSuccess'=> false,'response'=> 'EmailId is already registered'), REST_Controller::HTTP_BAD_REQUEST );
        } else if($this -> users->where(array('phone' => $obj['number']))->count_all_results())
        {
            $this->response(array('isSuccess'=> false,'response'=> 'Number is already registered'), REST_Controller::HTTP_BAD_REQUEST );
        }
        else
        {
            $otp = $this -> generatePIN();
        	$user_content = array(
				'otp' => $otp,
				'name' => preg_replace('/[^A-Za-z0-9\-]/', '', $obj['fname'])." ".preg_replace('/[^A-Za-z0-9\-]/', '', $obj['lname']),
				'fname' => preg_replace('/[^A-Za-z0-9\-]/', '', $obj['fname']),
				'lname' => preg_replace('/[^A-Za-z0-9\-]/', '', $obj['lname']),
				'phone' => $obj['number'],
				'email' => $obj['email'],
				'dob' => date('Y-m-d',strtotime($obj['dob'])),
				'type' => $obj['usertype'],
				'gender' => $obj['gender'],
				'state_id' => $obj['state'],
				'city_id' => $obj['city'],
				'password' => md5($obj['password']),
				'status' => '0',
				'reg_type' => 'mobile',
				'hash' => md5(uniqid(rand(), true))
			);
            $user_id = $this -> users -> insert($user_content); 
			$last_id=$this->db->insert_id();
			$user = $this -> users -> get('id',$user_id);
			$user_id = $user->id;

            $fuser_email=$user->email;
			$link = '"'.site_url('users/activate').'/'.$user_id.'/'.$user_content['hash'].'"';
			$user_detail = array('email' => $fuser_email,'link' => $link);           
			$message = $this -> load -> view('email/register_reply',$user_detail,TRUE);      
			//print_r($message); exit();  
			$this -> common_model -> send_mail(admin_email,$fuser_email,'RB Group Account Created - Explore your new account now!',$message);

            $this->response(array('isSuccess'=> true,'otp' => $otp,'response'=> 'Registration successfull'), REST_Controller::HTTP_OK);
        }
    }
     
    /**
     * Login user from this method.
     *
     * @return Response
    */
    public function login_post()
    {
        $json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        $validate_response = $this -> users->validateuser($obj['userName'],$obj['password']);
        if(empty($validate_response))
        {
            $this->response(array('isSuccess'=> false,'response'=> 'Please cross check EmailId/Mobile  and password'), REST_Controller::HTTP_BAD_REQUEST);
        }
        else
        {
            $userdetails=$this -> users ->getuseraddress($obj['userName']);
                        
            $user_address[] = array("homeaddress" => $userdetails->address1,"city" => $userdetails->city_id,"state" => $userdetails->state_id,"pincode" => $userdetails->zip_code,"landmark" => "");
          
            $Response = array("isSuccess" => true,"response" => "login successfull","userId" => $userdetails->id,"fname" => $userdetails->fname,"lname"=> $userdetails->lname,"email" => $userdetails->email,"number" => $userdetails->phone,"address" => $user_address);
           $this->response($Response, REST_Controller::HTTP_OK);
        }
    }

    /**
     * Change User password from this method.
     *
     * @return Response
    */
    public function changepassword_post()
    {
    	$json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        if(empty($obj)){
            $this->response(array('isSuccess'=> false,'response'=> 'Post data is empty'), REST_Controller::HTTP_BAD_REQUEST);
        } else {
        	$user_id = $obj['userid'];  
        	$password = $obj['password']; 
        	$newpassword = $obj['newpassword']; 
			
			if($this -> users->count_all_results(array("id" => $user_id,"password" => md5($password))))
			{       
				$pwd = array('password'=>md5($newpassword)); 
				$this -> users -> update($user_id,$pwd);
				$this->response(array('isSuccess'=> true,'response'=> 'Updated successfully'), REST_Controller::HTTP_BAD_REQUEST);
			} else {
				$this->response(array('isSuccess'=> false,'response'=> 'Invalid user id or password, PLease try again!.'), REST_Controller::HTTP_BAD_REQUEST);
			}
        }
    }

    /**
     * Internal Funtion to generate random number
     *
     * @return Response
    */
    public function generatePIN($digits = 4){
	    $i = 0; //counter
	    $pin = ""; //our default pin is blank.
	    while($i < $digits){
	        //generate a random number between 0 and 9.
	        $pin .= mt_rand(0, 9);
	        $i++;
	    }
	    return $pin;
	}

	/**
     * Forgot Password submit from this method.
     *
     * @return Response
    */
	public function forgotpassword_post()
    {
    	$json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        if(empty($obj)){
            $this->response(array('isSuccess'=> false,'response'=> 'Post data is empty'), REST_Controller::HTTP_BAD_REQUEST);
        } else {
        	$email = $obj['emailid'];
            $pone_status = false;
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $usercount = $this -> users->count_all_results('email',$email);
                $emailcheck = array(
                    'email'=> $email
                );       
                $user = $this -> users -> get($emailcheck);
            } else if(preg_match('/^[0-9]{10}+$/', $email)){
                $pone_status = true;
                $usercount = $this -> users->count_all_results('phone',$email);
                $emailcheck = array(
                    'phone'=> $email
                );       
                $user = $this -> users -> get($emailcheck);
            } else {
                $this->response(array('isSuccess'=> false,'response'=> 'Please check the input and try again later'), REST_Controller::HTTP_BAD_REQUEST);
            }
	      	if($usercount)
	      	{  
	      		//$this -> db -> select('id, first_name, email, phone');
				$user_id=$user->id;
				$otp = $this -> generatePIN();
				$this -> users -> update($user_id,array('otp'=>$otp));
				$user_content = array(
	                'number' => $user->phone,
	                'emailId' => $user->email,
	                'otp' => $otp
                );             
				$message = $this -> load -> view('email/otp',$user_content,TRUE);
            	$email_result = $this -> common_model -> send_mail(admin_email,$user_content['emailId'],'Forgot Password',$message);
            	// End SMS Gateway code //
                $sms_message = $otp." is your RB Group verification code. Code valid for 10 minutes only, one time use. Please DO NOT share this OTP with anyone to ensure account's security";
                if($pone_status == true){
                    //$this -> common -> register_sms($email,$sms_message);
                } else {
                    //$this -> common -> register_sms($user->phone,$sms_message);
                }
                                     
                // End SMS Gateway code //
				$this->response(array('isSuccess'=> true,'response'=> 'Kindly check you mail to change the password'), REST_Controller::HTTP_OK);
			} else {
	      		$this->response(array('isSuccess'=> false,'response'=> 'Invalid user id, PLease try again!.'), REST_Controller::HTTP_BAD_REQUEST);
	      	}
        }
    }

    /**
     * Get All user type from this method.
     *
     * @return Response
    */
    public function getUserType_get()
    {
        $data = array('user'=>'User','owner'=>'Owner','rbconsultant'=>'RB consultant','developer'=>'Developer','builder'=>'Builder');
        $res_data = array('Usertype'=>$data);
        $this->response($res_data, REST_Controller::HTTP_OK);
    }

    /**
     * Get All RBConsultant from this method.
     *
     * @return Response
    */
    public function getRBConsultant_get()
    {
        $data = $this -> users -> getRBConsultant();
        $res_data = array('Consultant'=>$data);
        $this->response($res_data, REST_Controller::HTTP_OK);
    }
        
}