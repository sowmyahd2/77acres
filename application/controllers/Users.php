<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Common_model','common_model');
		$this->load->model('rbgroup/Contents_model','contents');
       $this -> load -> model ('Categories_model', 'cats');
		$this->load->model('rbgroup/Products_model','products');
		$this->load->model('rbgroup/Reguser_model', 'users');
		$this->load->model('rbgroup/Cities_model', 'citydetails');
		$this->load->model('rbgroup/States_model', 'statedetails');
		//$this->load->model('rbgroup/Products_model','products');
		$this->load->model('rbgroup/Proenquiry_model','proenquiry');
		$this->data['statedtl'] = $this -> statedetails -> dropdown('id','state');
		$this->data['headerpage'] = 'header';
	}

	public function index()
	{
		$this -> data['page_title']="Terms Condition | RB Group";
		$this->data['terms_condition'] = $this-> contents ->get_all('page_id','4');
		$this->data['page'] = 'terms';
		$this->load->view('template',$this->data,FALSE);
	}

public function testing1(){
    $this->load->helper('cookie');

// Define your data
$userData = array(
    'user_id'   => 123,
    'username'  => 'john_doe',
    'email'     => 'john@example.com'
);

// Set the cookie with a distant future expiration date
$cookieExpiration = time() + (10 * 365 * 24 * 60 * 60); // 10 years into the future
set_cookie('user_data', json_encode($userData), $cookieExpiration);

$jsonResponse = json_encode(array('status' => 'success', 'message' => 'Cookie set successfully','data'=>$userData));
        $this->output->set_content_type('application/json')->set_output($jsonResponse);
        
}
public function getpropertype()
	{
		
		$category = $this -> cats ->getCategoryTrees($_POST['number']);
	
		$html='<select id="option-droup-demo" id="category" name="category[]" multiple="multiple">';
		
                  
                    foreach ($category as $smkey => $smvalue) {
                    $mainmenu = explode("@", $smkey);
                    $subcatcount = count($smvalue);
                    $html.="<optgroup label='".$mainmenu[1]."'>";
                    
                    
                    if(is_array($smvalue) && count($smvalue)){
                      foreach ($smvalue as $key1 => $value1) {
                        $sm_subpart = explode("@", $key1);
                     $html.="<option value=".$sm_subpart[1].">".$sm_subpart[1]."</option>";   
                        
                       
                       
                      }
                    }
					$html.="</optgroup>";
                    
                     } 
					 $html.="</select>";
					 echo $html;
                    
		
		
	}
	public function getpropertypes()
	{
		
		$category = $this -> cats ->getCategoryTrees($_POST['number']);
                    foreach ($category as $smkey => $smvalue) {
                    $mainmenu = explode("@", $smkey);
                    $subcatcount = count($smvalue);
                    
                     $html.="<div class='panel-group' id='accordion'>";
                      $html.="<div class='panel-default'>";
                      $html.="<div class='panel-heading'>";
                      $html.="<label class='panel-title'>";
                    $html.="<a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion' href='#". $mainmenu[1]."'>
                    <span class='glyphicon glyphicon-minus'></span> +".$mainmenu[1]."</a>";
                    $html.="</label></div>";
                    $html.="<div id=".$mainmenu[1]." class='panel-collapse collapse in'>";
                    $html.="<div class='panel-body'><div class='checkbox-container'>";
                    
                    if(is_array($smvalue) && count($smvalue)){
                      foreach ($smvalue as $key1 => $value1) {
                        $sm_subpart = explode("@", $key1);
						
                         $html.="<div class='checkbox-item'>";
						 $html.="<label for='genMale_".$mainmenu[1]. $sm_subpart[1]."' class='category-label'>";
						 $html.=" <input name='category[]' id='genMale_".$mainmenu[1].$sm_subpart[1]."' class='category' type='checkbox' value=".$sm_subpart[1].">";
                     
                        $html.=$sm_subpart[1];
                       $html.="</label>";
                        $html.="</div>";
                       
                      }
                    }	$html.="</div></div>";
                    	$html.="</div></div>";
					$html.="</div>";
                    
                     } 
					
					 echo $html;
                    
		
		
	}
	public function setGenerateOTP($type='')
	{
		$phonenumber = $_POST['number'];
	//	$otp = $this -> generatePIN();
	//	$userotpData = array('phonenumber'=>$phonenumber,'otp'=>$otp);
	//	$this->session->set_userdata('usergenerateotp',$userotpData);
		//----- temp -------
		$user = $this -> users -> get('phone',$phonenumber);
		if($user){
		    echo 0;
		}
	
		//$fuser_email = $user->email;
		//----- temp ends here -----
		// End SMS Gateway code //
		else{
		 		if(empty($type)){
			$sms_message="Welcome to RB Group, Enter the ".$otp.", to Connect with us.";
		} else if($type == "CallusDetails"){
			$sms_message="Welcome to RB Group, validate your ".$otp." to get call from us.";
		} else if($type == "PropertyEnquiry"){
			$sms_message="Welcome to RB Group, validate your ".$otp." for property details.";
		}
        
		$result = $this -> common_model -> register_sms($phonenumber,$sms_message); 	
		//print_r($result);
		// End SMS Gateway code //

		//$message = $this -> load -> view('email/otp',$userotpData,TRUE);      
		//print_r($message); exit();  
		//$this -> common_model -> send_mail(admin_email,$fuser_email,'RB Group Account - Login with OTP!',$message);
		echo 1;   
		}

	}

	public function forgotpassword()
	{
		$this -> data['page_title']="Forgot Password | RB Group";
		$this->data['terms_condition'] = $this-> contents ->get_all('page_id','4');
		$this->data['page'] = 'forgotpassword';
		$this->load->view('template',$this->data,FALSE);
	}

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
public function sendotp1(){
     $this->session->unset_userdata('usergenerateotp');
    $number=$_POST['number'];
  
		   $otp = $this -> generatePIN();
		   
		  
		$userotpData = array('phonenumber'=>$number,'otp'=>$otp);
		$this->session->set_flashdata('userotp', $otp);
		$this->session->set_userdata('usergenerateotp',$userotpData); 
		$apiKey = urlencode('NTY3NzQ1Nzk1NDY1Nzg0YzU5NGQ2ZjRiNGE2YTc2NTM=');
	
	// Message details

	$sender = urlencode('TAKECS');
	$message = rawurlencode("Dear customer, OTP for R B Group login is ".$otp." . Please do not share it with anyone.-Takecareserives -Takecareserives");
 

 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => "91".$number, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch); 
	curl_close($ch); 
	
	// Process your response here
	echo $otp;
		
}

public function sendotp(){
     $this->session->unset_userdata('usergenerateotp');
    $number=$_POST['number'];
   
    
    if(!$this -> users->where(array('phone' => $number,'status' => '1'))->count_all_results())
		{
			echo "Invalid Phone Number.";
		
		}
		else{
		   $otp = $this -> generatePIN();
		   
		  
		$userotpData = array('phonenumber'=>$number,'otp'=>$otp);
		$this->session->set_flashdata('userotp', $otp);
		$this->session->set_userdata('usergenerateotp',$userotpData); 
		$apiKey = urlencode('NTY3NzQ1Nzk1NDY1Nzg0YzU5NGQ2ZjRiNGE2YTc2NTM=');
	
	// Message details

	$sender = urlencode('TAKECS');
	$message = rawurlencode("Dear customer, OTP for R B Group login is ".$otp." . Please do not share it with anyone.-Takecareserives -Takecareserives");
 

 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => "91".$number, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch); 
	curl_close($ch); 
	
	// Process your response here
	
		}
}	public function logout()
	{
		$this->session->unset_userdata('user');
		//$this->session->unset_userdata('citysession');
		redirect(site_url(), 'refresh');
	}

	public function userlogin()
	{
	    

	    
		extract($_POST);
   		$login = array(
		'email'=> $email,
		'password' => md5($password),
		'status' =>'1',
		'verified' =>'YES'
		);

		if(!$this -> users->where(array('email' => $email))->count_all_results())
		{
			echo "Invalid username or password.";
			exit;
		} else	if(!$this -> users->where(array('email' => $email,'status' => '1','verified' => 'YES'))->count_all_results())
		{
			echo "Call Customer Care 8884755555 for Account Activation.";
			exit;
		} 
		if($this -> users->count_all_results($login))
   		{
   			$user = $this -> users -> get($login);
   			$this->session->set_userdata('user', $user);
			echo true;
   		} else {
   			echo "Invalid username or password.";
   		}

		 	
	}

	public function userloginphone()
	{
		extract($_POST);
		
	
   		$login = array(
			'phone'=> $loginphonenumber,
			'status' =>'1',
			'verified' =>'YES'
		);
		$sessionphone = $sessionotp = 0;
	
		    $d=$this->session->userdata('usergenerateotp');
		     
		     $sessionotp=$d['otp'];
		     $sessionphone=$d['phonenumber'];
		     


if($this->session->flashdata('userotp')==$phoneotp){
    if($this -> users->count_all_results($login))
   		{
   			$user = $this -> users -> get($login);
   			$this->session->set_userdata('user', $user);
			echo true;
			$this->load->helper('cookie');

			// Define your data
			$userData = array(
				'user_id'   => $user->id,
				'username'  => $user->name,
				'email'     => $user->email
			);
			
			// Set the cookie with a distant future expiration date
			$cookieExpiration = time() + (10 * 365 * 24 * 60 * 60); // 10 years into the future
			set_cookie('user_data', json_encode($userData), $cookieExpiration);
			
   		} else {
   			echo false;
   		}
}
	/*	if(!$phoneotp){
			echo "Invalid request please try again by generating OTP.";
			return false;
		}
		
		if($loginphonenumber != $sessionphone || $phoneotp != $sessionotp){
			echo "Invalid OTP OR Number.";
			return false;
		}
		
		if(!$this -> users->where(array('phone' => $loginphonenumber))->count_all_results())
		{
			echo "Invalid phone number.";
		}
		
		if(!$this -> users->where(array('phone' => $loginphonenumber,'status' => '1','verified' => 'YES'))->count_all_results())
		{
			echo "Your account has not been activated yet.";
		} 
		
		*/
		
		

       
		 	
	}
	public function usermobileregistaion(){
	    extract($_POST);
	   	$otp = $this -> generatePIN();
	    
	    $arr=array(
	        	'type' => 1,
	        	'phone' => $this -> input -> post ('phonenumber'),
	        	'fname' => preg_replace('/[^A-Za-z0-9\-]/', '', $this -> input -> post ('name')),
	        	'name' => preg_replace('/[^A-Za-z0-9\-]/', '', $this -> input -> post ('name')),
	        	'otp' => $otp,
	        	'status'=>"1",
	        	'verified'=>"YES"
	        
	        );
	       	$user_id = $this -> users -> insert($arr); 
			$last_id=$this->db->insert_id();
				$login = array(
			'phone'=> $this -> input -> post ('phonenumber'),
			'status' =>'1',
			'verified' =>'YES'
		);
			if($this -> users->count_all_results($login))
   		{
   			$user = $this -> users -> get($login);
   			$this->session->set_userdata('user', $user);
echo	"<script>
                
                    alert('Thank you for registering with Rb Group.');
                    window.location.href = 'https://rbrealestate.in/'; // Replace with your desired URL
                
            </script>";
				redirect(site_url());
   		}
   		
	    
	}
	public function userregistration()
	{ 
		extract($_POST);
		$otp = $this -> generatePIN();
		$user_content = array(
			'otp' => $otp,
			'name' => preg_replace('/[^A-Za-z0-9\-]/', '', $this -> input -> post ('fname'))." ".preg_replace('/[^A-Za-z0-9\-]/', '', $this -> input -> post ('lname')),
			'fname' => preg_replace('/[^A-Za-z0-9\-]/', '', $this -> input -> post ('fname')),
			'lname' => preg_replace('/[^A-Za-z0-9\-]/', '', $this -> input -> post ('lname')),
			'phone' => $this -> input -> post ('phonenumber'),
		
			'type' => $this -> input -> post ('usertype'),
			'gender' => $this -> input -> post ('gender'),
		
		'status'=>"1",
	        	'verified'=>"YES",
			'hash' => md5(uniqid(rand(), true))
		);
		$user_id = $this -> users -> insert($user_content); 
				$login = array(
			'phone'=> $this -> input -> post ('phonenumber'),
			'status' =>'1',
			'verified' =>'YES'
		);
			if($this -> users->count_all_results($login))
   		{
   			$user = $this -> users -> get($login);
   			$this->session->set_userdata('user', $user);
echo	"<script>
                
                    alert('Thank you for registering with Rb Group.');
                    window.location.href = 'https://rbrealestate.in/'; // Replace with your desired URL
                
            </script>";
   		}
				redirect(site_url());
	}
	public function userregistration1()
	{ 
		extract($_POST);
		$otp = $this -> generatePIN();
		$user_content = array(
			'otp' => $otp,
			'name' => preg_replace('/[^A-Za-z0-9\-]/', '', $this -> input -> post ('fname'))." ".preg_replace('/[^A-Za-z0-9\-]/', '', $this -> input -> post ('lname')),
			'fname' => preg_replace('/[^A-Za-z0-9\-]/', '', $this -> input -> post ('fname')),
			'lname' => preg_replace('/[^A-Za-z0-9\-]/', '', $this -> input -> post ('lname')),
			'phone' => $this -> input -> post ('phonenumber'),
			'email' => $this -> input -> post ('emailid'),
			'dob' => date('Y-m-d',strtotime($this ->input->post ('dob'))),
			'type' => $this -> input -> post ('usertype'),
			'gender' => $this -> input -> post ('gender'),
			'state_id' => $this -> input -> post ('statename'),
			'city_id' => $this -> input -> post ('cityname'),
			'password' => md5($this -> input -> post ('password')),
			'status' => '0',
			'hash' => md5(uniqid(rand(), true))
		);
		if(isset($_FILES['user_image']) && $_FILES['user_image']['error'] != '4'){
			$image = $this -> users -> do_upload_image('user_image',163,245);
			if(is_array($image)){
				$this->session->set_flashdata('error', $image['upload_error']);
				echo $image['upload_error'];
			}else
			{
				$user_content['image'] = $image;
			}
		}
		if($this -> users->where(array('email' => $emailid))->count_all_results())
		{
			$user = $this -> users -> get('email',$emailid);
			$user_id = $user->id;
		} else {
			$user_id = $this -> users -> insert($user_content); 
			$last_id=$this->db->insert_id();
			$user = $this -> users -> get('id',$user_id);
			$user_id = $user->id;
		}


		//echo $this->db->last_query();
		$fuser_email=$user->email;
		$link = '"'.site_url('users/activate').'/'.$user_id.'/'.$user_content['hash'].'"';
		$user_detail = array('email' => $fuser_email,'link' => $link);
		$ty= $this -> input -> post ('usertype');
		if($ty==5){
		    
		  	$message = $this -> load -> view('email/register_user',$user_detail,TRUE);   
		}
	
		else{
		   	$message = $this -> load -> view('email/register_reply',$user_detail,TRUE);  
		}
	//	print_r($message); exit();  
		$admin_email="kannadaevergreensongs@gmail.com";
		$this -> common_model -> send_mail($admin_email,$fuser_email,'RB Group Account Created - Explore your new account now!',$message);
		
	//	$user_info=$this -> users -> get('id',$user_id);
	//$this->db->last_query();
	//	$this->session->set_userdata('user',$user_info);
	//	$this->session->set_flashdata('success_message', 'Self-activate from your inbox link sent or Contact 9620557777 for account activation.');
				redirect(site_url());
	}

	public function activate($x='',$y='')
	{
		if($x!='' && $y!='' && $this -> users->count_all_results(array('id'=>$x,'hash'=>$y)))
		{
			$this -> users -> update($x,array('status'=>'1','verified'=>'YES','hash'=>''));
			$user_info=$this -> users -> get('id',$x);
			$user_email=$user_info-> email;
			$name=$user_info-> name;       
			$user_detail = array('email' => $user_email,'name' => $name);
			$message = $this -> load -> view('email/registration_sucessfull',$user_detail,TRUE);  
			$this -> common_model -> send_mail(admin_email,$user_email,'Welcome to RB Group',$message);
			$this->session->set_userdata('user',$user_info);
			redirect(site_url());
		}
		else{
			$this->session->set_flashdata('error_message', 'This user is already verified or something went wrong, Please try again');
			redirect(site_url());
		}

	}

	public function forgotpassword_submit()
   	{
      extract($_POST);
      
      $email=$this -> input -> post('email');  
      $this -> users->count_all_results('email',$email);
           
      	if($this -> users->count_all_results('email',$email))
      	{         
	        $emailcheck = array(
	            'email'=> $email
	         );

	        if($this -> users->count_all_results($emailcheck))
	        {
				$user = $this -> users -> get($emailcheck);
				//$this -> db -> select('id, first_name, email, phone');
				$user_id=$user->id;
				$this->data['id']=$user->id;
				$active_code=md5(uniqid(rand(), true));
				$this -> users -> update($user_id,array('hash'=>$active_code));
				//echo $active_code;
				$fuser_name=$user->name;
				$this->data['first_name']=$user->name;   
				$fuser_email=$user->email;            
				$link = site_url('users/reset_password').'/'.$user_id.'/'.$active_code;             
			//	$message = $this -> load -> view('forgot_email', $this->data, TREU);
			
				$order = array('fname' => $fuser_name,'email' => $fuser_email,'link' => $link);
				$message = $this -> load -> view('email/forgot_email',$order,TRUE); 

				$this -> common_model -> send_mail(admin_email,$email,'Forgot Password',$message);
				 
				$this->session->set_flashdata('success_message', 'Kindly check you mail to change the password');
				redirect(site_url());
			} else {
				redirect(site_url());
			}        
      	} else {
      		redirect(site_url());
      	}

   	}

   	public function reset_password($x='',$y='')
	{

		if($x!='' && $y!='' && $this -> users->count_all_results(array('id'=>$x))) //,'hash'=>$y
		{
			extract($_POST);
			$this->data['user_info']=$this-> users ->get($x);
			//echo $this->db->last_query();exit();
			$this -> users -> update($x,array('status'=>'1','hash'=>''));
			$this->data['page'] = 'resetpassword';
			$this -> load -> view('template',$this->data);
		}else{
			$this->session->set_flashdata('error_message', 'Something went wrong, Please try again');
			redirect(site_url());
		}
	}
 
	public function password_change()
	{
		extract($_POST);
		$user_id=$this -> input -> post('user_id');    
		$this -> users->count_all_results('id',$user_id);

		if($this -> users->count_all_results('id',$user_id))
		{       
			$pwd = array('password'=>md5($password)); 
			$this -> users -> update($user_id,$pwd);
			$this->session->set_flashdata('success_message', 'Your password has been changed sucess fully'); 
			redirect(site_url(), 'refresh');
		}
		else
		{  
			$this->session->set_flashdata('error_message', 'Sorry! try again');     
			redirect(site_url(), 'refresh');
		}       

	}

	public function profile()
	{
		if($user_details=$this -> session -> userdata('user'))
		{
			$this->data['rguser_details'] = $this ->users->get($user_details->id);
			$this->data['citydtl'] = $this->citydetails->custom_dropdown('id', 'city', array('state' => $this->data['rguser_details']->state_id ));
			$this->data['page'] = 'my-profile';
			$this->load->view('template',$this->data,FALSE);
		}
	}

	public function myenquires()
	{
		if($user_details=$this -> session -> userdata('user'))
		{
			$this->data['rguser_details'] = $this ->users->get($user_details->id);
			$this->data['proenquiry'] = $this ->proenquiry->getConsultantEnquery($user_details->id);

			$this->data['page'] = 'my-enquires';
			$this->load->view('template',$this->data,FALSE);
		}
	}

	public function myshortlisted()
	{
		if($user_details=$this -> session -> userdata('user'))
		{
			$this->data['products'] = $this-> products ->getmyshortlistedList($user_details->id);
			
				$types = $this-> products ->mywishlistpropertytype($user_details->id);
				
				
			$this->data['option']=$types;
			$this->data['rguser_details'] = $this ->users->get($user_details->id);
			$this->data['citydtl'] = $this->citydetails->custom_dropdown('id', 'city', array('state' => $this->data['rguser_details']->state_id ));
			$this->data['page'] = 'my-shortlisted';
			$this->load->view('template',$this->data,FALSE);
		}
	}

	public function myproperties()
	{
		if($user_details=$this -> session -> userdata('user'))
		{	
			$userid = $user_details->id;
			$this->data['page'] = 'my-properties';
			$this->data['buyproducts'] = $this-> products ->getdealerProductList($userid);
			$types = $this-> products ->mydealerpropertytype($user_details->id);
				
			$this->data['option']=$types;
			//$this->data['rentproducts'] = $this-> products ->getdealerProductList('Rent',$userid);
			//$this->data['projectsproducts'] = $this-> products ->getdealerProductList('Project',$userid);
			$this->load->view('template',$this->data,FALSE);
		} else {
			redirect(site_url(), 'refresh');
		}
	}

	public function citysession()
	{
		if(!empty($_POST)){
			extract($_POST);
			$this->session->set_userdata('citysession', $_POST['cityname']);
		} else {
			echo "error";
		}
		
	}

	public function updatedtl()
	{
		$user_content = array(
			'name' => preg_replace('/[^A-Za-z0-9\-]/', '', $this -> input -> post ('firstname'))." ".preg_replace('/[^A-Za-z0-9\-]/', '', $this -> input -> post ('lastname')),
			'fname' => preg_replace('/[^A-Za-z0-9\-]/', '', $this -> input -> post ('firstname')),
			'lname' => preg_replace('/[^A-Za-z0-9\-]/', '', $this -> input -> post ('lastname')),
			'phone' => $this -> input -> post ('mobile'),
			'dob' => date('Y-m-d',strtotime($this ->input->post ('dob'))),
			'type' => $this -> input -> post ('usertype'),
			'gender' => $this -> input -> post ('gender')
		);
		if(isset($_FILES['user_image']) && $_FILES['user_image']['error'] != '4'){
			$image = $this -> users -> do_upload_image('user_image',163,245);
			if(is_array($image)){
				$this->session->set_flashdata('error', $image['upload_error']);
				echo $image['upload_error'];
			}else
			{
				$user_content['image'] = $image;
			}
		}
		$this -> users -> update($this -> input -> post ('userid'),$user_content);
		redirect(site_url('users/profile'), 'refresh');
	}

	public function updateaddress()
	{
		$user_content = array(
			'address1' => $this -> input -> post ('useraddress'),
			'state_id' => $this -> input -> post ('statename'),
			'city_id' => $this -> input -> post ('cityname')
		);
		$this -> users -> update($this -> input -> post ('userid'),$user_content);
		redirect(site_url('users/profile'), 'refresh');
	}

	public function changepassword()
	{
		$this->data['page'] = 'changepassword';
		$this->load->view('template',$this->data,FALSE);
	}

	public function emailduplicatecheck()
	{
		if($_POST['emailid']!='')
		{
			$checkname = array('email'=> $this -> input -> post('emailid'));
			if($this -> users->count_all_results($checkname))
			{  
				echo 1;
			}
		}  
		else echo 0;
	}
		public function numberduplicatecheck()
	{
		if($_POST['phonenumber']!='')
		{
			$checkname = array('phone'=> $this -> input -> post('phonenumber'));
			if($this -> users->count_all_results($checkname))
			{  
				echo 1;
			}
		}  
		else echo 0;
	}
	public function getgroupcategory(){
		$number=$_POST['val'];
		$category = $this -> cats -> get_all('property_type',$number);
		
		$html='<select id="main_id" name="main_id" data-placeholder="Choose a category name...">';
		$html.='<option value="select category  Name">select category</option>';
		foreach($category as $c){
			$html.='<option value='.$c->id.'>'.$c->name.'</option>';
		}
		$html.='</select>';
		echo $html;	
	}
	
}
