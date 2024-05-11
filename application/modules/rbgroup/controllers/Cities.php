<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cities extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cities_model','cities');
		$this->load->model('States_model','states');
		$this -> data['states'] = $this-> states->dropdown('id', 'state');
	}

	public function index($mode='')
	{	
		$this -> data['cities'] = $this -> cities -> getCities();
		$this -> data['page'] = 'cities';	
		$this -> data['mode'] = 'all';					
		$this->load->view('template',$this->data, FALSE);		
	}

	public function add()
	{	
		$this -> data['page'] = 'cities';	
		$this -> data['mode'] = 'add';	
		$this-> load -> view('template', $this->data);			
		
	}
	public function edit($p_id='')
	{	
		$this->data['cities']=$this-> cities ->get('id',$p_id);
		$this -> data['mode'] = 'edit';
		$this -> data['page'] = 'cities';	
		$this-> load -> view('template', $this->data);			
	}
	public function view($p_id='')
	{	
		$this->data['cities']=$this-> cities ->get('id',$p_id);
		$this -> data['mode'] = 'view';
		$this -> data['page'] = 'cities';	
		$this-> load -> view('template', $this->data);			
	}

	public function add_cities()
	{
		$pro_name = $this -> input -> post ('name');
		$product_details = array(
				'state' => $this -> input -> post ('sid'),
				'city' => $pro_name	
			);
		//print_r($_FILES); 
		$imga = array('image');
		foreach ($imga as $eimg) {
			if(isset($_FILES[$eimg]) && $_FILES[$eimg]['error'] != '4'){
				$image = $this -> cities -> do_upload_image($eimg,163,245);
				if(is_array($image)){
					$this->session->set_flashdata('error', $image['upload_error']);
					echo $image['upload_error'];
				}else
				{
					$product_details[$eimg] = $image;
				}
			}
		}
		if($this -> input -> post('id'))
		{
			$product_id = $this -> input -> post('id');
			$this -> cities -> update($product_id,$product_details);	
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		else
		{
			$this -> cities -> insert($product_details);
			$product_id=$this->db->insert_id();
			$this->session->set_flashdata('message', 'Successfully Added');
		}
		redirect($this -> input -> post('curl'));
	}

	public function delete($id)
	{
		$product=$this -> cities -> get($id);
		$imga = array('image');
              foreach ($imga as $key => $eimg) { 
                 if($product->$eimg!='' && file_exists('./uploads/cities/'.$product->$eimg))
                    unlink($this -> cities ->original_path.'/cities/'.$product->$eimg);                
                }		
		$this -> cities -> delete($id);		
		$this->session->set_flashdata('message', 'Successfully Deleted');
		redirect(admin."cities");
	}

}

/* End of file cities.php */
/* Location: ./application/modules/pv_admin/controllers/cities.php */