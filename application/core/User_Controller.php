<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('rbgroup/Contactus_model', 'contactus');
		$this->load->model('rbgroup/Reguser_model', 'users');
		$this->load->model('Common_model','common_model');
		$this->load->model('rbgroup/Cities_model', 'citydetails');
		$this->load->model('rbgroup/States_model', 'statedetails');
		$this->load->model('rbgroup/Categories_model', 'cats');
		$this->load->model ('rbgroup/Propertyownership_model', 'propertyownership');
		$this->load->model ('rbgroup/Propertytype_model', 'propertytype');
		$this -> data['ownershiptype'] = $this -> propertyownership -> dropdown('id','name');
		$this -> data['propertytype'] = $this -> propertytype -> dropdown('id','name');

		if($user_details=$this -> session -> userdata('user'))
		{
			$userdetailslog = $this ->users->get($user_details->id);
			if(is_object($userdetailslog)){
				$this -> data['rguser_details'] = $userdetailslog;
			} else {
				$this->session->set_flashdata('error_message', 'User data not found in our record');
				redirect(site_url('users/logout'), 'refresh');
			}
			
		}

		$this->data['statedtl'] = $this -> statedetails -> dropdown('id','state');
		$this -> data['menu_categories'] = $this -> cats -> get_all('parent_id','0');
		$this -> data['productmenu'] = $this -> cats -> getCategoryTrees(1);
		$this->data['contactus'] = $this -> contactus -> get();
		$this->data['majorcity'] 	= $this ->citydetails->majorcities();

		$this->data['footerArea'] 	= $this ->citydetails->footerArea();
		$this->data['footerCity'] 	= $this ->citydetails->footerCity();
		
		$this ->data['page_title']="RB Group - Real Estate";
	}


}