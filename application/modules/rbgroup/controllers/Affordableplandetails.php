<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Affordableplandetails extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Affordableplandetails_model','affordableplandetails');
		$this->load->model('Affordableplan_model','affordableplan');
		$this -> data['affordableplan'] = $this-> affordableplan->dropdown('id', 'name');
	}

	public function index($mode='')
	{	
		$this -> data['affordableplandetails'] = $this -> affordableplandetails -> getaffordableplandetails();
		$this -> data['page'] = 'affordableplandetails';	
		$this -> data['mode'] = 'all';					
		$this->load->view('template',$this->data, FALSE);		
	}

	
	public function add()
	{	
		$this -> data['page'] = 'affordableplandetails';	
		$this -> data['mode'] = 'add';	
		$this-> load -> view('template', $this->data);			
		
	}
	public function edit($p_id='')
	{	
		$this->data['affordableplandetails']=$this-> affordableplandetails ->get('id',$p_id);
		$this -> data['mode'] = 'edit';
		$this -> data['page'] = 'affordableplandetails';	
		$this-> load -> view('template', $this->data);			
	}
	public function view($p_id='')
	{	
		$this->data['affordableplandetails']=$this-> affordableplandetails ->get('id',$p_id);
		$this -> data['mode'] = 'view';
		$this -> data['page'] = 'affordableplandetails';	
		$this-> load -> view('template', $this->data);			
	}

	public function add_affordableplandetails()
	{
		$pro_name = $this -> input -> post ('name');
		$product_details = array(
				'cid' => $this -> input -> post ('cid'),
				'name' => $pro_name
			);
		
		if($this -> input -> post('id'))
		{
			$product_id = $this -> input -> post('id');
			$this -> affordableplandetails -> update($product_id,$product_details);	
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		else
		{
			$this -> affordableplandetails -> insert($product_details);
			$product_id=$this->db->insert_id();
			$this->session->set_flashdata('message', 'Successfully Added');
		}
		redirect($this -> input -> post('curl'));
	}

	public function delete($id)
	{
		$product=$this -> affordableplandetails -> get($id);
		$imga = array('image');
              foreach ($imga as $key => $eimg) { 
                 if($product->$eimg!='' && file_exists('./uploads/affordableplandetails/'.$product->$eimg))
                    unlink($this -> affordableplandetails ->original_path.'/affordableplandetails/'.$product->$eimg);                
                }		
		$this -> affordableplandetails -> delete($id);		
		$this->session->set_flashdata('message', 'Successfully Deleted');
		redirect(admin."affordableplandetails");
	}

}

/* End of file affordableplandetails.php */
/* Location: ./application/modules/pv_admin/controllers/affordableplandetails.php */