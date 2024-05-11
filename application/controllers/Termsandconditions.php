<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Termsandconditions extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load -> library('form_validation');
		$this->load->model('rbgroup/Contents_model','contents');
	}

	public function index()
	{
		$this -> data['page_title']="Terms Condition | RB Group - Real Estate";
		$this->data['page'] = 'terms-and-conditions';
		$this->data['terms_condition'] = $this-> contents ->get_all('page_id','4');
		$this->load->view('template', $this->data, FALSE);
	}

	
	
}
