<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Propertyage extends Admin_Controller {	

	public function __construct()
	{
		parent::__construct();
		$this -> load -> model ('Propertyage_model', 'propertyage');
		$this -> data['page'] = 'propertyage';
	}

	public function index()
	{
		$this -> data['mode'] = 'all';
		$this -> data['propertyage'] = $this -> propertyage -> get_all();
		$this->load->view('template',$this -> data);
	}

	public function add()
	{
		$image_content = array(
		'name' => $this -> input -> post ('name')
		);
		
		$result = $this -> propertyage -> insert ($image_content);
		redirect(site_url().admin.'propertyage');
	}

	public function update($id)
	{
		if(empty($_POST) && $id = $this->uri->segment(4))
		{	
			$this -> data['propertyage'] = $this -> propertyage -> get($id);
			if(is_object($this -> data['propertyage'])){
				$this -> data['mode'] = 'edit';
				$this -> load -> view ('template', $this -> data);
			}
		}
		else if(!empty($_POST))
		{
			$image_content = array(
			'name' => $this -> input -> post ('name')
			);
			
			
			$result = $this -> propertyage -> update ($this -> input -> post ('id'),$image_content);
			redirect(site_url().admin.'propertyage');
		}
		else redirect(site_url().admin.'propertyage');
		
	}

	public function delete($id)
	{
		if(empty($_POST) && $id = $this->uri->segment(4))
		{	
			$this -> propertyage -> delete($id);
			$this->session->set_flashdata('message', 'Successfully Deleted');
			redirect(site_url().admin.'propertyage');
		}
		else
			redirect(site_url().admin.'propertyage');
	}
}