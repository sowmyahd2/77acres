<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Propertyownership extends Admin_Controller {	

	public function __construct()
	{
		parent::__construct();
		$this -> load -> model ('Propertyownership_model', 'propertyownership');
		$this -> data['page'] = 'propertyownership';
	}

	public function index()
	{
		$this -> data['mode'] = 'all';
		$this -> data['propertyownership'] = $this -> propertyownership -> get_all();
		$this->load->view('template',$this -> data);
	}

	public function add()
	{
		$image_content = array(
		'name' => $this -> input -> post ('name')
		);
		
		$result = $this -> propertyownership -> insert ($image_content);
		redirect(site_url().admin.'propertyownership');
	}

	public function update($id)
	{
		if(empty($_POST) && $id = $this->uri->segment(4))
		{	
			$this -> data['propertyownership'] = $this -> propertyownership -> get($id);
			if(is_object($this -> data['propertyownership'])){
				$this -> data['mode'] = 'edit';
				$this -> load -> view ('template', $this -> data);
			}
		}
		else if(!empty($_POST))
		{
			$image_content = array(
			'name' => $this -> input -> post ('name')
			);
			
			
			$result = $this -> propertyownership -> update ($this -> input -> post ('id'),$image_content);
			redirect(site_url().admin.'propertyownership');
		}
		else redirect(site_url().admin.'propertyownership');
		
	}

	public function delete($id)
	{
		if(empty($_POST) && $id = $this->uri->segment(4))
		{	
			$this -> propertyownership -> delete($id);
			$this->session->set_flashdata('message', 'Successfully Deleted');
			redirect(site_url().admin.'propertyownership');
		}
		else
			redirect(site_url().admin.'propertyownership');
	}
}