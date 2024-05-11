<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Regusers extends Admin_Controller {
	
   public function __construct()
	{
		parent::__construct();
		$this->load->model ('Reguser_model','regusers');
		$this->load->model('Common_model','common_model');
		$this -> data['page']='regusers';
			
	}

	public function emailduplicatecheck()
	{
		if($_POST['emailid']!='')
		{
			$checkname = array('email'=> $this -> input -> post('emailid'));
			if($this -> regusers->count_all_results($checkname))
			{  
				echo 1;
			}
		}  
		else echo 0;
	}
          
	public function index()
	{  		
		extract($_POST);
		$userid = "";
		if(isset($_POST['userid'])){
			$userid = $_POST['userid'];
		}
		$this -> data['userid'] = $userid;
		$this->db->order_by('name','ASC');
        $this -> data['regusers'] = $this -> regusers -> get_regusers($userid);  
        $this -> data['mode'] = 'all';    
		$this->load->view('template',$this -> data);
	}
public function filterdata(){
    	if(isset($_POST['search'])){
			$userid = $_POST['search'];
		}
		
	
        $data = $this ->regusers -> filter_regusers($userid);  
        $tb="";
        if(count($data)>0){
           
            $i=1;
            foreach($data  as $d){
                 if($d->status!=0){
                $c="checkmark btn-success";
            }
            else{
                $c="close btn-danger";
            }
            $tb.="<tr><td>".$i++."</td><td>".$d->name."</td><td>".$d->email."</td><td>".$d->phone."</td><td><i data=".$d->id." class='status_checks btn icon-".$c."' ></i></td>
            <td><div class='icons-group'><a href='".site_url().'rbgroup/regusers/view/'.$d->id."' class='tip btn btn-link' title='View'><i class='fa fa-eye'></i></a><a href='".site_url().'rbgroup/regusers/edit/'.$d->id."' class='tip btn btn-link btn'  title='Edit' ><i class='fa fa-edit'></i></a><a class='tip' title='Delete'href='".site_url().'rbgroup/regusers/delete/'.$d->id."'onclick='return confirm('Are you sure to delete')'><i class='fa fa-times'></a></i></div></td></tr>";
            
                
            }
            
            
        }
        echo $tb;
    
}
	public function add()
	{	
		$this -> data['page'] = 'regusers';	
		$this -> data['mode'] = 'add';	
		$this-> load -> view('template', $this->data);			
		
	}
	public function edit($p_id='')
	{	
		$this->data['regusers']=$this-> regusers ->get('id',$p_id);
		
		$this -> data['mode'] = 'edit';
		$this -> data['page'] = 'regusers';	
		$this-> load -> view('template', $this->data);			
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

	public function add_regusers()
	{
		$password = $this -> generatePIN();
		$emailid = $this -> input -> post ('emailid');
		$user_details = array(
			'name' => $this -> input -> post ('fname')." ".$this -> input -> post ('lname'),
			'type' => "Users",
			'fname' => $this -> input -> post ('fname'),
			'lname' => $this -> input -> post ('lname'),
			'phone' => $this -> input -> post ('phonenumber'),
			'email' => $emailid,
			'address1' => $this -> input -> post ('address'),
			'status' => '1',
			'type' => 'admin'
			
		);
		
		if($this -> input -> post('id'))
		{
			$product_id = $this -> input -> post('id');
			$user = $this -> regusers -> get('id',$product_id);
			$this -> regusers -> update($product_id,$user_details);	
			$this->session->set_flashdata('message', 'Successfully Updated');
		} else {
			if($this -> regusers->where(array('email' => $emailid))->count_all_results())
			{
				$user = $this -> regusers -> get('email',$emailid);
				$user_id = $user->id;
			} else {
				$user_details['password'] = md5($password);
				$user_details['hash'] = md5(uniqid(rand(), true));

				$user_id = $this -> regusers -> insert($user_details); 
				$last_id = $this->db->insert_id();
				
				$user = $this -> regusers -> get('id',$last_id);
				$user_id = $user->id;
				$fuser_email = $user->email;
				$link = '"'.site_url('users/activate').'/'.$user_id.'/'.$user_details['hash'].'"';
				$user_detail = array('email' => $fuser_email,'link' => $link,'otp' => $password);           
				$message = $this -> load -> view('email/register_reply',$user_detail,TRUE);      
				//print_r($message); exit();  
				$this -> common_model -> send_mail(admin_email,$fuser_email,'RB Group Account Created - Explore your new account now!',$message);
			}
			$this->session->set_flashdata('message', 'Successfully Added');
		}
		
		redirect($this -> input -> post('curl'));
	}

	public function view($id)
	{    
	    $this->data['regusers'] = $this -> regusers -> get($id);
	    $this -> data['regusers_values'] = $this -> regusers-> reg_users($id);
	    $this -> data['mode'] = 'view';                    
		$this ->load -> view ('template', $this -> data);
		
	}

	/*public function emailduplicatecheck()
	{
		if($_POST['email']!='')
		{
			$checkname = array('email'=> $this -> input -> post('email'));
			if($this -> regusers->count_all_results($checkname))
			{  
				echo 1;
			}
		}  
		else echo 0;
	}*/

	public function active_status()
	{		
	    $statusID = $this -> input -> post ('status');
		$data = array('status' => $statusID );
		$id=$this -> input -> post ('abs_id');
		$result = $this -> regusers ->update ($id,$data);
		if($statusID == 1){
		    $this -> regusers -> update($id,array('status'=>'1','verified'=>'YES'));
			$user_info = $this -> regusers -> get('id',$id);
			$user_email = $user_info-> email;
			$name = $user_info-> name;       
			$user_detail = array('email' => $user_email,'name' => $name);
			$message = $this -> load -> view('email/registration_sucessfull',$user_detail,TRUE);  
			$this -> common_model -> send_mail(admin_email,$user_email,'Welcome to RB Group',$message);
		} else {
		     $this -> regusers -> update($id,array('status'=>$statusID,'verified'=>'NO'));
		}
			   
		echo ($result) ? 1 : 0 ;
	}
	
	

	public function delete($id)
	{	
		$this -> regusers -> delete($id);
		$this->session->set_flashdata('message', 'Successfully Deleted');
		redirect(site_url().admin.'regusers');
	}

}

