<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Propertyads extends Admin_Controller {	

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Categories_model','cats');
		$this->load->model ('Propertyads_model', 'propertyads');
		$this->load->model ('Propertytype_model', 'propertytype');
		$this -> data['propertytype'] = $this -> propertytype -> dropdown('id','name');
		$this->data['categories'] = $this->cats->custom_dropdown('id', 'name', array('parent_id' => '0','type'=>'main','status' => '1'));
		$this -> data['page'] = 'propertyads';
	}

	public function index()
	{
		$this -> data['mode'] = 'all';
		$this -> data['propertyads'] = $this -> propertyads -> get_all();
		$this->load->view('template',$this -> data);
	}

	public function add()
	{
		$image_content = array(
			'propertytype' => $this -> input -> post ('propertytype'),
			'cat_id' => $this -> input -> post ('c_id'),
			'name' => $this -> input -> post ('name'),
			'qty' => $this -> input -> post ('qty'),
			'url' => $this -> input -> post ('url'),
			'package' => $this -> input -> post ('package')
		);
		$imga = array('image');
			foreach ($imga as $eimg) {
				if(isset($_FILES[$eimg]) && $_FILES[$eimg]['error'] != '4'){
					$image = $this -> propertyads -> do_upload_image($eimg,163,245);
					if(is_array($image)){
						$this->session->set_flashdata('error', $image['upload_error']);
						echo $image['upload_error'];
					}else
					{
						$image_content[$eimg] = $image;
					}
				}
			}
		$result = $this -> propertyads -> insert ($image_content);
		redirect(site_url().admin.'propertyads');
	}

	public function update($id)
	{
		if(empty($_POST) && $id = $this->uri->segment(4))
		{	
			$this -> data['propertyads'] = $this -> propertyads -> get($id);
			if(is_object($this -> data['propertyads'])){
				$this -> data['mode'] = 'edit';
				$this -> load -> view ('template', $this -> data);
			}
		}
		else if(!empty($_POST))
		{
			$image_content = array(
				'propertytype' => $this -> input -> post ('propertytype'),
				'cat_id' => $this -> input -> post ('c_id'),
				'name' => $this -> input -> post ('name'),
				'qty' => $this -> input -> post ('qty'),
				'url' => $this -> input -> post ('url'),
				'package' => $this -> input -> post ('package')
			);
			
			$imga = array('image');
			foreach ($imga as $eimg) {
				if(isset($_FILES[$eimg]) && $_FILES[$eimg]['error'] != '4'){
					$image = $this -> propertyads -> do_upload_image($eimg,163,245);
					if(is_array($image)){
						$this->session->set_flashdata('error', $image['upload_error']);
						echo $image['upload_error'];
					}else
					{
						$image_content[$eimg] = $image;
					}
				}
			}
			$result = $this -> propertyads -> update ($this -> input -> post ('id'),$image_content);
			redirect(site_url().admin.'propertyads');
		}
		else redirect(site_url().admin.'propertyads');
		
	}

	public function delete($id)
	{
		if(empty($_POST) && $id = $this->uri->segment(4))
		{	
			$this -> propertyads -> delete($id);
			$this->session->set_flashdata('message', 'Successfully Deleted');
			redirect(site_url().admin.'propertyads');
		}
		else
			redirect(site_url().admin.'propertyads');
	}
}