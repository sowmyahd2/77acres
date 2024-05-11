<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Majorcities extends Admin_Controller {	

	public function __construct()
	{
		parent::__construct();
		$this -> load -> model ('Cities_model', 'city');
		$this -> load -> model ('States_model', 'state');
		$this -> data['page'] = 'majorcities';
		$this -> data['states'] = $this -> state -> dropdown('id','state');
		$this -> data['cities'] = $this -> city -> dropdown('id','city');
	}

	public function index()
	{
		$this -> data['city'] 	= $this ->city->majorcities();
		$this -> data['mode'] = 'all';
        $this->load->view('template',$this -> data);
		
	}
	public function cities($country_id)
	{
		$options = $this-> city->custom_dropdown('id','city',array('state'=>$country_id));
		$result = '<option value="" selected="selected">Select City</option>';
		foreach ($options as $key => $value) {
			$result.='<option value="'.$key.'">'.$value.'</option>';
		}
		echo $result;
	}
	public function add()
	{
		if(empty($_POST))
		{
			$this -> data['mode'] = 'add';
			$this -> load -> view ('template', $this -> data);
		}
		else
		{
			$city_content = array(
				'state' => $this -> input -> post ('state_name')
			);
			if(isset($_FILES['city_image']) && $_FILES['city_image']['error'] != '4'){
				$image = $this -> city -> do_upload_image('city_image');
				if(is_array($image)){
					$this->session->set_flashdata('error', $image['upload_error']);
				}else
				{
					$old_image = $this -> input -> post ('old_image');
					$city_content['image'] = $image;
				}
			}
			$this -> city -> update ($this -> input -> post('city_name'),$city_content);
			$this->session->set_flashdata('message', 'Successfully Added');
			redirect(site_url().admin.'majorcities/index');
		}
	}
	public function edit()
	{
		if(empty($_POST) && $id = $this->uri->segment(4))
		{	
			$this -> data['cities'] = $this -> city -> dropdown('city','city');
			$this -> data['city'] = $this -> city -> get($id);
			if(is_object($this -> data['city'])){
				$this -> data['mode'] = 'edit';
				$this -> load -> view ('template', $this -> data);
			}
		}
		else if(!empty($_POST))
		{
			$citycontent = array(
				'state' => $this -> input -> post ('state_name')
			);
			if(isset($_FILES['city_image']) && $_FILES['city_image']['error'] != '4'){
				$image = $this -> city -> do_upload_image('city_image',163,245);
				if(is_array($image)){
					$this->session->set_flashdata('error', $image['upload_error']);
					echo $image['upload_error'];
				} else {
					$citycontent['city_image'] = $image;
				}
			}
			/*if(isset($_FILES['city_image']) && $_FILES['city_image']['error'] != '4'){
				$image = $this -> city -> do_upload_image('city_image');
				$citycontent['image'] = $image;
				if(is_array($image)){
					$this->session->set_flashdata('error', $image['upload_error']);
				} else {
					$old_image = $this -> input -> post ('old_image');
					if($old_image!='' && $old_image!=NULL && file_exists($this -> city ->original_path.'/city/'.$old_image)){
						unlink($this -> city ->original_path.'/city/'.$old_image);
					}
				}
			}*/
			$this -> city -> update ($this -> input -> post('id'),$citycontent);
			$this->session->set_flashdata('message', 'Successfully Updated');
			redirect(site_url().admin.'majorcities/index');
		}
		else redirect(site_url().admin.'majorcities/index');
	}



	public function delete()
	{
		if(empty($_POST) && $id = $this->uri->segment(4))
		{	
			$citycontent = array(
				'image' => ''
			);
			$this -> city -> update ($this -> input -> post('id'),$citycontent);
			$this->session->set_flashdata('message', 'Successfully Removed');
			redirect(site_url().admin.'majorcities/index');
		}
		else
			redirect(site_url().admin.'majorcities/index');
	}
}