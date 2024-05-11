<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proenquiry extends Admin_Controller {
	
   public function __construct()
	{
		parent::__construct();
		$this ->load -> model ('Proenquiry_model','proenquiry');
	    $this -> data['page']='proenquiry';
			
	}
          
	public function index()
	{  		
		$this -> data['proenquiry'] = $this -> proenquiry -> get_all();  
        //echo '<pre>'; print_r($this -> data['specifications']); exit();
        $this -> data['mode'] = 'all';    
		$this->load->view('template',$this -> data);
	}

	public function view($id)
	{    
	    $this -> data['proenquiry_values'] = $this -> proenquiry -> get($id);
	    //$this-> data['regs'] = $id; 
	    //echo '<pre>'; print_r($this -> data['proenquiry_values']); exit();
        $this -> data['mode'] = 'view';                    
		$this ->load -> view ('template', $this -> data);
		
	}


	public function edit(){
		$page = array(
			'name' => $this ->input->post ('name')
		);
				
		$id=$this ->input-> post ('id');
		if($id!='')
		{
			$result = $this -> specification -> update ($id,$page);
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		redirect($this -> input -> post('curl'));
	}

	public function edit_rec(){

		$pages = array(
			'name'=>$this ->input->post('name')
					
		);
				
		$id=$this ->input-> post ('id');
		if($id!='')
		{
			$result = $this -> car_zzw_recommend -> update ($id,$pages);
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		redirect($this -> input -> post('curl'));
	}

	public function add_new()
	{
		$post = array(
				'name' => $this -> input ->post('name')
			);
		
		$result = $this -> specifications -> insert ($post);
		$this->session->set_flashdata('message', 'Successfully Added');
		redirect(site_url().admin.'specifications');
	}

	public function add()
	{

		$post = array(
				'spec_id' => $this ->input ->post('spec_id'),
				'name' => $this -> input ->post('name'),
				'other' => $this -> input ->post('other')
			);
		
		$result = $this -> specifications_values -> insert ($post);
		$this->session->set_flashdata('message', 'Successfully Added');
		redirect($this -> input -> post('curl'));
	}

	// public function del($id)
	// {
	// 	$result = $this -> specifications_values -> delete($id);
	// 	$this->session->set_flashdata('message', 'Successfully Deleted');
	// }

	public function active_status()
	{		
		$data = array('status' => $this -> input -> post ('status') );
		$id=$this -> input -> post ('abs_id');
	    $result = $this -> proenquiry ->update ($id,$data);	   
		echo ($result) ? 1 : 0 ;
	}

	public function delete($id)
	{		
		$this -> proenquiry -> delete($id);
		$this->session->set_flashdata('message', 'Successfully Deleted');
	}

}

