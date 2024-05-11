<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agents extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load -> library('form_validation');
		$this->load->model('rbgroup/Regusers_model', 'users');
		$this->load->model('rbgroup/Products_model','products');
	}

	public function index()
	{
		$this->data['page'] = 'agents';
		$this->data['dealers'] = $this -> users -> getRBConsultant();
		$this->load->view('template',$this->data,FALSE);
	}

	public function details($dealername='',$dealerid='')
	{
		if(!empty($dealername) && !empty($dealerid)){
			$this->data['page'] = 'agent-details';
			$this->data['protype'] = 'dealers';
			$this->data['dealers'] = $this -> users -> get('id',$dealerid);
			
			$this->data['products'] = $this-> products ->getdealerProductList($dealerid);
			$this->data['propertyCount'] = count($this->data['products']);
			$this->load->view('template',$this->data,FALSE);
		} else {
			redirect(site_url('property/dealers'), 'refresh');
		}
	}
	public function test(){
	   
	 
 
$this->load->library('email');
$config = array();

$config['smtp_port'] = 'smtp';
$config['smtp_host'] = 'smtp.gmail.com';
$config['smtp_user'] = 'kannadaevergreensongs@gmail.com';
$config['smtp_pass'] = 'pzfrgqetfquhitkw';
$config['smtp_port'] = 465;
$this->email->initialize($config);
$this->email->set_newline("\r\n");
        $this->email->from("kannadaevergreensongs@gmail.com", 'Identification');
        $this->email->to("sowmya.hd4@gmail.com");
        $this->email->subject('Send Email Codeigniter');
        $this->email->message('hi');
        //Send mail
        if($this->email->send())
            {
                echo "fds";
            }
            else{
            echo    $this->email->print_debugger();
            }
	}
	
}
