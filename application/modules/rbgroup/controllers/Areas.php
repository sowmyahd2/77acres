<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Areas extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Areas_model','areas');
		$this->load->model('States_model','states');
		$this->load->model('Cities_model','cities');
		$this -> data['states'] = $this-> states->dropdown('id', 'state');
	}

	public function index($mode='')
	{	
		$this -> data['areas'] = $this -> areas -> getAreas();
		$this -> data['page'] = 'areas';	
		$this -> data['mode'] = 'all';					
		$this->load->view('template',$this->data, FALSE);		
	}

	public function cities($state_id)
	{
		$options = $this-> cities->custom_dropdown('id','city',array('state'=>$state_id));
		$result = '<option value="" selected="selected">Select City</option>';
		foreach ($options as $key => $value) {
			$result.='<option value="'.$key.'">'.$value.'</option>';
		}
		echo $result;
	}

	public function add()
	{	
		$this -> data['page'] = 'areas';	
		$this -> data['mode'] = 'add';	
		$this-> load -> view('template', $this->data);			
		
	}
	public function edit($p_id='')
	{	
		$this->data['areas']=$this-> areas ->get('id',$p_id);
		$this->data['cities'] = $this -> cities -> custom_dropdown('id','name',array('sid'=>$this->data['areas']->sid));
		$this -> data['mode'] = 'edit';
		$this -> data['page'] = 'areas';	
		$this-> load -> view('template', $this->data);			
	}
	public function view($p_id='')
	{	
		$this->data['areas']=$this-> areas ->get('id',$p_id);
		$this -> data['mode'] = 'view';
		$this -> data['page'] = 'areas';	
		$this-> load -> view('template', $this->data);			
	}

	public function add_areas()
	{
		$pro_name = $this -> input -> post ('name');
		$product_details = array(
				'state' => $this -> input -> post ('sid'),
				'city' => $this -> input -> post ('cid'),
				'area' => $pro_name	
			);
		
		if($this -> input -> post('id'))
		{
			$product_id = $this -> input -> post('id');
			$this -> areas -> update($product_id,$product_details);	
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		else
		{
			$this -> areas -> insert($product_details);
			$product_id=$this->db->insert_id();
			$this->session->set_flashdata('message', 'Successfully Added');
		}
		redirect($this -> input -> post('curl'));
	}

	public function delete($id)
	{
		$product=$this -> areas -> get($id);
			
		$this -> areas -> delete($id);		
		$this->session->set_flashdata('message', 'Successfully Deleted');
		redirect(admin."areas");
	}

}

/* End of file areas.php */
/* Location: ./application/modules/pv_admin/controllers/areas.php */