<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Propertyareatype extends Admin_Controller {	

	public function __construct()
	{
		parent::__construct();
		$this -> load -> model ('Propertyareatype_model', 'propertyareatype');
		$this -> data['page'] = 'propertyareatype';
	}

	public function index()
	{
		$this -> data['mode'] = 'all';
		$this -> data['propertyareatype'] = $this -> propertyareatype -> get_all();
		$this->load->view('template',$this -> data);
	}

	public function add()
	{
		$image_content = array(
		'name' => $this -> input -> post ('name')
		);
		
		$result = $this -> propertyareatype -> insert ($image_content);
		redirect(site_url().admin.'propertyareatype');
	}

	public function update($id)
	{
		if(empty($_POST) && $id = $this->uri->segment(4))
		{	
			$this -> data['propertyareatype'] = $this -> propertyareatype -> get($id);
			if(is_object($this -> data['propertyareatype'])){
				$this -> data['mode'] = 'edit';
				$this -> load -> view ('template', $this -> data);
			}
		}
		else if(!empty($_POST))
		{
			$image_content = array(
			'name' => $this -> input -> post ('name')
			);
			
			
			$result = $this -> propertyareatype -> update ($this -> input -> post ('id'),$image_content);
			redirect(site_url().admin.'propertyareatype');
		}
		else redirect(site_url().admin.'propertyareatype');
		
	}

	public function delete($id)
	{
		if(empty($_POST) && $id = $this->uri->segment(4))
		{	
			$this -> propertyareatype -> delete($id);
			$this->session->set_flashdata('message', 'Successfully Deleted');
			redirect(site_url().admin.'propertyareatype');
		}
		else
			redirect(site_url().admin.'propertyareatype');
	}
}