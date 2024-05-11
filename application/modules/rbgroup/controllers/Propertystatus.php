<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Propertystatus extends Admin_Controller {	

	public function __construct()
	{
		parent::__construct();
		$this -> load -> model ('Propertystatus_model', 'propertystatus');
		$this -> data['page'] = 'propertystatus';
	}

	public function index()
	{
		$this -> data['mode'] = 'all';
		$this -> data['propertystatus'] = $this -> propertystatus -> get_all();
		$this->load->view('template',$this -> data);
	}

	public function add()
	{
		$image_content = array(
		'name' => $this -> input -> post ('name')
		);
		
		$result = $this -> propertystatus -> insert ($image_content);
		redirect(site_url().admin.'propertystatus');
	}

	public function update($id)
	{
		if(empty($_POST) && $id = $this->uri->segment(4))
		{	
			$this -> data['propertystatus'] = $this -> propertystatus -> get($id);
			if(is_object($this -> data['propertystatus'])){
				$this -> data['mode'] = 'edit';
				$this -> load -> view ('template', $this -> data);
			}
		}
		else if(!empty($_POST))
		{
			$image_content = array(
			'name' => $this -> input -> post ('name')
			);
			
			
			$result = $this -> propertystatus -> update ($this -> input -> post ('id'),$image_content);
			redirect(site_url().admin.'propertystatus');
		}
		else redirect(site_url().admin.'propertystatus');
		
	}

	public function delete($id)
	{
		if(empty($_POST) && $id = $this->uri->segment(4))
		{	
			$this -> propertystatus -> delete($id);
			$this->session->set_flashdata('message', 'Successfully Deleted');
			redirect(site_url().admin.'propertystatus');
		}
		else
			redirect(site_url().admin.'propertystatus');
	}
}