<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Contactus_model','contact');
	}

	public function index($mode='')
	{	
		$data['contact'] 		= $this -> contact -> get_all();
		$data['page'] 		= 'contact';						
		$this->load->view('template', $data, FALSE);		
	}

	public function add_edit()
	{ 
		$page = array(			
			'name' => $this ->input->post ('name'),
			'emailid' => $this ->input->post ('email'),
			'address' => $this ->input->post ('address'),
			'mobile' => $this ->input->post('phone')
	
		);
		
				
		$id=$this ->input-> post ('id');
		if($this ->input-> post ('id')==''){
			$result = $this ->contact-> insert ($page);
			$this->session->set_flashdata('message', 'Successfully Added');
		}
		else{
			$result = $this ->contact-> update ($this -> input -> post ('id'),$page);
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		redirect(site_url().admin.'contact');
	}

	public function delete($id='',$old_image='')
	{
		if($old_image!='' && $old_image!=NULL && file_exists($this -> contact ->original_path.'/contact/'.$old_image)){
			unlink($this -> contact ->original_path.'/contact/'.$old_image);
		}
		if($old_image!='' && $old_image!=NULL && file_exists($this -> contact ->original_path.'/contact/thumbs/'.$old_image)){
			unlink($this -> contact ->original_path.'/contact/thumbs/'.$old_image);
		}
		$this -> contact -> delete($id);
		redirect(site_url().admin.'contact');
	}

}

/* End of file contact.php */
/* Location: ./application/modules/pv_admin/controllers/contact.php */