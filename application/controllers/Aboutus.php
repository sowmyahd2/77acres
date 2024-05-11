<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aboutus extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load -> library('form_validation');
		$this->load->model('rbgroup/Contents_model','contents');
	}

	public function index()
	{
		$this->data['page'] = 'about';
		$this -> data['page_title']="AboutUs | RB Group - Real Estate";
		$this->data['aboutus'] = $this-> contents ->get_all('page_id','3');
		$this->data['whychooseus'] = $this-> contents ->get_all('page_id','8');
		$this->load->view('template', $this->data, FALSE);
	}
	
}
