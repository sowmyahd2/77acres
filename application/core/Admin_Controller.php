<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends MX_Controller {

	public $data = array();
	
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$this -> load -> model ('Categories_model', 'cats');
		$this -> data['menu_categories'] = $this -> cats -> get_all('parent_id','0');
		$this -> data['productmenu'] = $this -> cats -> getCategoryTree(); 
	}
	
}