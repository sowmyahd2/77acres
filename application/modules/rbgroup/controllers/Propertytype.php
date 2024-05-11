<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Propertytype extends Admin_Controller {	

	public function __construct()
	{
		parent::__construct();
		$this -> load -> model ('Propertytype_model', 'propertytype');
		$this -> data['page'] = 'propertytype';
	}

	public function index()
	{
		$this -> data['mode'] = 'all';
		$this -> data['propertytype'] = $this -> propertytype -> get_all();
		$this->load->view('template',$this -> data);
	}

	public function add()
	{
		$image_content = array(
		'name' => $this -> input -> post ('name')
		);
		
		$result = $this -> propertytype -> insert ($image_content);
		redirect(site_url().admin.'propertytype');
	}

	public function update($id)
	{
		if(empty($_POST) && $id = $this->uri->segment(4))
		{	
			$this -> data['propertytype'] = $this -> propertytype -> get($id);
			if(is_object($this -> data['propertytype'])){
				$this -> data['mode'] = 'edit';
				$this -> load -> view ('template', $this -> data);
			}
		}
		else if(!empty($_POST))
		{
			$image_content = array(
			'name' => $this -> input -> post ('name')
			);
			
			
			$result = $this -> propertytype -> update ($this -> input -> post ('id'),$image_content);
			redirect(site_url().admin.'propertytype');
		}
		else redirect(site_url().admin.'propertytype');
		
	}

	public function delete($id)
	{
		if(empty($_POST) && $id = $this->uri->segment(4))
		{	
			$this -> propertytype -> delete($id);
			$this->session->set_flashdata('message', 'Successfully Deleted');
			redirect(site_url().admin.'propertytype');
		}
		else
			redirect(site_url().admin.'propertytype');
	}
}