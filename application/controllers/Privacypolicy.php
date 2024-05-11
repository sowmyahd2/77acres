<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacypolicy extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load -> library('form_validation');
		$this->load->model('rbgroup/Contents_model','contents');
	}

	public function index()
	{
		$this -> data['page_title']="Privacy Policy | RB Group - Real Estate";
		$this->data['page'] = 'privacy-policy';
		$this->data['privacy'] = $this-> contents ->get_all('page_id','2');
		$this->load->view('template', $this->data, FALSE);
	}

	
	
}
