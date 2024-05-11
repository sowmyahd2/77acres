<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_assign extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this ->load->model('Categories_model','cats');
		$this ->load->model('Products_model','products');
		$this ->load->model('Home_product_model','home_products');
		$this ->load->model('Specifications_model','spes');
		$this ->load->model('Specifications_model','spes');
		$this ->load->model('Product_specifications_model','svalue');
		$this ->load->model('Product_assign_model','product_assign');
		$this ->load->model('Category_specification_values_model','catspecvals');
		$this ->data['page'] = 'product_assign';
	}

	public function index($url_name="")
	{		
		if($url_name!='' && $this -> cats -> count_all_results(array('url_name'=>$url_name))) :			
			$this -> data['category'] = $this -> cats -> get('url_name',$url_name);				
			$this -> data['categories'] = $this-> cats->custom_dropdown('id', 'name', array('parent_id' => 0,'type'=>'main'));
			$this -> data['sub_cat'] = $this-> cats->custom_dropdown('id', 'name', array('parent_id' =>$this -> data['category']->id));
			//echo $this->db->last_query();
			//echo '<pre>'; print_r($this -> data['sub_cat']);exit();			
			$this -> data['products'] = $this -> product_assign -> product_list($this -> data['category']->id);			
		    //echo '<pre>'; print_r($this -> data['products']); exit;
			$this -> data['mode'] = 'all';
			$this-> load -> view('template', $this->data);			
		else:
			show_404();
		endif;		
	}
	public function products($cat_id="")
	{
		$this->db->group_by('style');
		$this->db->order_by('last_updated','DESC');
		$this->data['products']= $this-> products ->get_all('cat_id',$cat_id);
		//print_r($this->data['products']); exit;
		$products=$this-> load -> view('table/assign_products', $this->data);
		echo $products;
	}
	public function product_add()
	{
		//echo '<pre>';print_r($_POST); exit;
		$product_add=array();
		$p_id=$this -> input -> post ('p_id');
		$cat_id=$this -> input -> post ('sub_cat');
		$sub_id=$this -> input -> post ('cat_name');
		$j=0;		
		foreach ($p_id as $key => $p_ids) {			
				$product_add[$j]['p_id'] = $p_ids ;
				$product_add[$j]['cat_id'] = $cat_id;
				$product_add[$j]['sub_cat'] = $sub_id;
				$j++;
			}
		//print_r($product_add); exit;
		$this -> db -> insert_batch('product_assign',$product_add);
		redirect($this -> input -> post('curl'));
	}
	public function delete($id='')
	{	
		$this -> product_assign -> delete($id);
		$this->session->set_flashdata('message', 'Successfully Deleted');
	}	
	

}