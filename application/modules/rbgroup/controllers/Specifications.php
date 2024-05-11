<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Specifications extends Admin_Controller {
	
   public function __construct()
	{
		parent::__construct();
		$this ->load -> model ('Specifications_model','specifications');
		$this ->load -> model ('Specifications_model','specifications');
		$this ->load -> model ('Specifications_values_model','specifications_values');
	    $this -> data['page']='specifications';
	}
          
	public function index()
	{  		
        $this -> data['specifications'] = $this -> specifications -> get_all();  
        //echo '<pre>'; print_r($this -> data['specifications']); exit();
        $this -> data['mode'] = 'all';    
		$this->load->view('template',$this -> data);
	}

	public function view($id)
	{    
	    $this -> data['specification'] = $this -> specifications -> get($id);
	    $this-> data['spec'] = $id; 
	    $this -> data['specifications_values'] = $this -> specifications_values-> spec_values($id);
	    //echo '<pre>'; print_r($this -> data['specifications_values']); exit();
        $this -> data['mode'] = 'view';                    
		$this ->load -> view ('template', $this -> data);
		
	}


	public function edit()
	{
		$page = array(
			'name' => $this ->input->post ('name'),
			'mandatory' => $this ->input->post ('mandatory'),
			'attribute_type' => $this ->input->post ('attribute_type'),
			'data_type' => $this ->input->post ('data_type'),
			'orderby' => $this ->input->post ('orderby'),
			'areatype' => $this ->input->post ('areatype')
		);
				
		$id=$this ->input-> post ('id');
		if($id!='')
		{
			$result = $this -> specification -> update ($id,$page);
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		redirect($this -> input -> post('curl'));
	}

	public function add_new()
	{
		//echo '<pre>'; print_r($_POST); exit;
		$spec_name = $this ->input->post ('name');
		$post = array(
				'name' => $this ->input->post ('name'),
				'mandatory' => $this ->input->post ('mandatory'),
				'attribute_type' => $this ->input->post ('attribute_type'),
				'data_type' => $this ->input->post ('data_type'),
				'orderby' => $this ->input->post ('orderby'),
				'areatype' => $this ->input->post ('areatype')
			);
		
		$id=$this ->input-> post ('id');
		if($id!='')
		{
			$result = $this -> specifications -> update ($id,$post);
			$this->session->set_flashdata('message', 'Successfully Updated');
		} else {
			if($this -> specifications -> count_all_results(array('name'=>$spec_name)) == 0)
			{
				$result = $this -> specifications -> insert ($post);
				$this->session->set_flashdata('message', 'Successfully Added');
			} else {
				$this->session->set_flashdata('message', 'Already Added');
			}
			
		}
		redirect(site_url().admin.'specifications');
	}	
	public function del($id)
	{
		$result = $this -> specifications_values -> delete($id);
		$this->session->set_flashdata('message', 'Successfully Deleted');
	}

	public function duplicatenamecheck()
	{
		if($_POST['name']!='')
		{
			$checkname = array('name'=> $this -> input -> post('name'));
			if($this -> specifications->count_all_results($checkname))
			{  
				echo 1;
			}
		}  
		else echo 0;
	}

}

