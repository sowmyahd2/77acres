<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enquery extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Enquire_model','enquery');
	}

	public function index($mode='')
	{	
		$this -> data['enquery'] = $this -> enquery -> get_all();
		$this -> data['page'] = 'enquery';	
		$this -> data['mode'] = 'all';					
		$this->load->view('template',$this->data, FALSE);		
	}

	
	public function view($p_id='')
	{	
		$this->data['enquery']=$this-> enquery ->get('id',$p_id);
		$this -> data['mode'] = 'view';
		$this -> data['page'] = 'enquery';	
		$this-> load -> view('template', $this->data);			
	}

	

}

/* End of file enquery.php */
/* Location: ./application/modules/pv_admin/controllers/enquery.php */