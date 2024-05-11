<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authority extends Admin_Controller {	

	public function __construct()
	{
		parent::__construct();
		$this -> load -> model ('Authority_model', 'authority');
		$this -> data['page'] = 'authority';
	}

	public function index()
	{
		$this -> data['mode'] = 'all';
		$this -> data['authority'] = $this -> authority -> get_all();
		$this->load->view('template',$this -> data);
	}

	public function add()
	{
		$image_content = array(
		'name' => $this -> input -> post ('name')
		);
		
		$result = $this -> authority -> insert ($image_content);
		redirect(site_url().admin.'authority');
	}

	public function update($id)
	{
		if(empty($_POST) && $id = $this->uri->segment(4))
		{	
			$this -> data['authority'] = $this -> authority -> get($id);
			if(is_object($this -> data['authority'])){
				$this -> data['mode'] = 'edit';
				$this -> load -> view ('template', $this -> data);
			}
		}
		else if(!empty($_POST))
		{
			$image_content = array(
			'name' => $this -> input -> post ('name')
			);
			
			
			$result = $this -> authority -> update ($this -> input -> post ('id'),$image_content);
			redirect(site_url().admin.'authority');
		}
		else redirect(site_url().admin.'authority');
		
	}

	public function delete($id)
	{
		if(empty($_POST) && $id = $this->uri->segment(4))
		{	
			$this -> authority -> delete($id);
			$this->session->set_flashdata('message', 'Successfully Deleted');
			redirect(site_url().admin.'authority');
		}
		else
			redirect(site_url().admin.'authority');
	}

	public function duplicatenamecheck()
	{
		if($_POST['name']!='')
		{
			$checkname = array('name'=> $this -> input -> post('name'));
			if($this -> authority->count_all_results($checkname))
			{  
				echo 1;
			}
		}  
		else echo 0;
	}
}