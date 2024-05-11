<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Affordableplan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Affordableplan_model','affordableplan');
	}

	public function index($mode='')
	{	
		$this -> data['affordableplan'] = $this -> affordableplan -> get_all();
		$this -> data['page'] = 'affordableplan';	
		$this -> data['mode'] = 'all';					
		$this->load->view('template',$this->data, FALSE);		
	}

	public function add()
	{	
		$this -> data['page'] = 'affordableplan';	
		$this -> data['mode'] = 'add';	
		$this-> load -> view('template', $this->data);			
		
	}
	public function edit($p_id='')
	{	
		$this->data['affordableplan']=$this-> affordableplan ->get('id',$p_id);
		$this -> data['mode'] = 'edit';
		$this -> data['page'] = 'affordableplan';	
		$this-> load -> view('template', $this->data);			
	}
	public function view($p_id='')
	{	
		$this->data['affordableplan']=$this-> affordableplan ->get('id',$p_id);
		$this -> data['mode'] = 'view';
		$this -> data['page'] = 'affordableplan';	
		$this-> load -> view('template', $this->data);			
	}

	public function generatePIN($digits = 6){
	    $i = 0; //counter
	    $pin = ""; //our default pin is blank.
	    while($i < $digits){
	        //generate a random number between 0 and 9.
	        $pin .= mt_rand(0, 9);
	        $i++;
	    }
	    return $pin;
	}

	public function SKUCodeGenerator($Name,$ranID){
		$skuCode = '';

		$y = explode(' ',$Name);

		foreach($y AS $k){
			$skuCode .= strtoupper(substr($k,0,1));
		}

		$skuCode = preg_replace('/[^A-Za-z0-9\-]/', '', $skuCode);
		return $skuCode.$ranID;
	}

	public function add_affordableplan()
	{
		$sku_rand = $this -> generatePIN();
		$pro_name = $this -> input -> post ('name');
		$product_details = array(
				'gst' => $this -> input -> post ('gst'),
				'name' => $this -> input -> post ('name'),
				'price' => $this -> input -> post ('price')	
			);
		
		if($this -> input -> post('id'))
		{
			$product_id = $this -> input -> post('id');
			$this -> affordableplan -> update($product_id,$product_details);	
			$this->session->set_flashdata('message', 'Successfully Updated');
		}
		else
		{
			$product_details['sku_id'] = $this->SKUCodeGenerator($pro_name,$sku_rand);
			$this -> affordableplan -> insert($product_details);
			$product_id=$this->db->insert_id();
			$this->session->set_flashdata('message', 'Successfully Added');
		}
		redirect($this -> input -> post('curl'));
	}

	public function delete($id)
	{
		$product=$this -> affordableplan -> get($id);
		$imga = array('image');
              foreach ($imga as $key => $eimg) { 
                 if($product->$eimg!='' && file_exists('./uploads/affordableplan/'.$product->$eimg))
                    unlink($this -> affordableplan ->original_path.'/affordableplan/'.$product->$eimg);                
                }		
		$this -> affordableplan -> delete($id);		
		$this->session->set_flashdata('message', 'Successfully Deleted');
		redirect(admin."affordableplan");
	}

}

/* End of file affordableplan.php */
/* Location: ./application/modules/pv_admin/controllers/affordableplan.php */