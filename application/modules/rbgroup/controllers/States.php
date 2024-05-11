<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class States extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('States_model','states');
	}

	public function index($mode='')
	{	
		$this -> data['states'] = $this -> states -> get_all();
		$this -> data['page'] = 'states';	
		$this -> data['mode'] = 'all';					
		$this->load->view('template',$this->data, FALSE);		
	}

	public function add()
	{	
		$this -> data['page'] = 'states';	
		$this -> data['mode'] = 'add';	
		$this-> load -> view('template', $this->data);			
		
	}
	public function edit($p_id='')
	{	
		$this->data['states']=$this-> states ->get('id',$p_id);
		$this -> data['mode'] = 'edit';
		$this -> data['page'] = 'states';	
		$this-> load -> view('template', $this->data);			
	}
	public function view($p_id='')
	{	
		$this->data['states']=$this-> states ->get('id',$p_id);
		$this -> data['mode'] = 'view';
		$this -> data['page'] = 'states';	
		$this-> load -> view('template', $this->data);			
	}

	public function add_states()
	{
		$pro_name = $this -> input -> post ('name');
		$product_details = array(
				'state' => $pro_name	
			);
		
		if($this -> input -> post('id'))
		{
			$product_id = $this -> input -> post('id');
			$this -> states -> update($product_id,$product_details);	
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		else
		{
			$this -> states -> insert($product_details);
			$product_id=$this->db->insert_id();
			$this->session->set_flashdata('message', 'Successfully Added');
		}
		redirect($this -> input -> post('curl'));
	}

	public function delete($id)
	{
		$product=$this -> states -> get($id);
		$imga = array('image');
              foreach ($imga as $key => $eimg) { 
                 if($product->$eimg!='' && file_exists('./uploads/states/'.$product->$eimg))
                    unlink($this -> states ->original_path.'/states/'.$product->$eimg);                
                }		
		$this -> states -> delete($id);		
		$this->session->set_flashdata('message', 'Successfully Deleted');
		redirect(admin."states");
	}

}

/* End of file states.php */
/* Location: ./application/modules/pv_admin/controllers/states.php */