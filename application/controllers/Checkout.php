<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load -> library('form_validation');
		$this->load->model('rbgroup/Regusers_model', 'users');
		$this->load->model('rbgroup/Products_model','products');
		$this->load->model('rbgroup/Affordableplan_model','affordableplan');
		/*$this ->load->model('rbgroup/Products_model','products');		
		$this->load->model('rbgroup/States_model','states');
		$this->load->model('rbgroup/Cities_model', 'cities');
		$this -> data['states'] = $this-> states->dropdown('id', 'name');*/
		$this->load->library('cart');
	}

	public function index($skuid='')
	{
		$this -> data['page_title']="RBGroup | Checkout";
		$this->data['page'] = 'checkout';
		$this -> data['cities'] = array();
		if($user_details=$this -> session -> userdata('user'))
		{
			$user_id = $user_details->id;
			$this -> data['prosku'] = $skuid;
			$this -> data['rguser_details'] = $this ->users->get($user_details->id);
			$this->data['amspecification'] = $this-> affordableplan ->get('sku_id',$skuid);
			$this -> data['products'] = $this-> products ->getdealerProductList($user_id);
			$this->load->view('template',$this->data,FALSE);
		} else {
			$this->session->set_flashdata('error_message', 'Please login');
           	redirect(site_url());
		}
		
	}

	public function subscriptionaddcart()
	{
		$this->load->library('cart');
		if ($this->cart->total_items()>0) {
			echo "subscriptionerror";
			exit;
		}
		$id = $this -> input -> post('productid');
		$quantityid = $this -> input -> post('quantity');
		$subduration = $this -> input -> post('subduration');
		$startdate = date("Y-m-d", strtotime($this -> input -> post('startdate')));
		//$subdeliveryqty = $this -> input -> post('subdeliveryqty');
		//date('Y-m-d',strtotime($this ->input->post ('startDate')));
		if(!empty($id) && $id!=0)
		{
			$pro_dtl = $this -> products -> get(array('id'=>$id));
			//------------------- Price Calculation ------
			if($pro_dtl->discounttype == "0"){
				$offer_cost = $pro_dtl->discount; 
			} else {
				$offer_cost = $pro_dtl->price * ($pro_dtl->discount/100); 
			}
			$baseprice = $pro_dtl->price - $offer_cost;
			//-------------------------

			$subscription = $this -> subscription -> get(array('pid'=>$id));

			$subqty = $this->subscriptionqty->get('id',$quantityid);
			$quantity = $subqty->quantity;
			$finalprice = $baseprice;
			
			$data = array(             
				'id'              => $id."-MKD",
				'qty'             => $quantity,
				'price'           => $finalprice,
				'name'            => preg_replace('/[^A-Za-z0-9\_\" "]/', '', $pro_dtl->name), 
				'SKUID'           => $pro_dtl->sku_id,
				'image'           => $pro_dtl->image,
				'delivery_charge' => $pro_dtl->delivery_charges,
				'discount_amount' => $offer_cost,
				'subduration' 	  => $subduration,
				'startdate'       => $startdate,
				'subdeliveryqty'  => "0",
				'subQtyId'        => $quantityid,
				'Ctype'       	  => "subscription",
				'p_id'            => $id                
			);
			//print_r($data);
			$insert_id=$this->cart->insert($data);
			//echo $this->db->last_query(); exit;
			if(isset($insert_id))
			{
				echo $this->cart->total_items();
			} else {
				echo "error";
			}
		} else {
			echo "error";
		}

	}

	public function add_cart()
	{
		extract($_POST);
		if ($this->cart->total_items()>0) {
			foreach ($this->cart->contents() as $items) {
				$cartprotype = $items['Ctype'];
				if($cartprotype == "subscription"){
					echo "ordererror";
					exit;
				}
			}
		}
		$id = $this -> input -> post('productid');
		$quantity = !empty($this -> input -> post('productqty'))?$this -> input -> post('productqty'):'1';
		
		//date('Y-m-d',strtotime($this ->input->post ('startDate')));
		if(!empty($id) && $id!=0)
		{
			$pro_dtl = $this -> products -> get(array('id'=>$id));
			//------------------- Price Calculation ------
			if($pro_dtl->discounttype == "0"){
				$offer_cost = $pro_dtl->discount; 
			} else {
				$offer_cost = $pro_dtl->price * ($pro_dtl->discount/100); 
			}
			$baseprice = $pro_dtl->price - $offer_cost;
			//$finalprice = ($baseprice*$quantity)+$pro_dtl->delivery_charges;
			$finalprice = $baseprice;
			//---------- Price Calculation ends here -------
			$data = array(             
				'id'              => $id."-MKD",
				'qty'             => $quantity,
				'price'           => $finalprice,
				'name'            => preg_replace('/[^A-Za-z0-9\_\" "]/', '', $pro_dtl->name), 
				'SKUID'           => $pro_dtl->sku_id,
				'image'           => $pro_dtl->image,
				'delivery_charge' => $pro_dtl->delivery_charges,
				'discount_amount' => $offer_cost,
				'subduration' 	  => 'Product',
				'startdate'       => date("Y-m-d"),
				'subdeliveryqty'  => '0',
				'subQtyId'        => '0',
				'Ctype'       	  => "orders",
				'p_id'            => $id                
			);
			$insert_id=$this->cart->insert($data);
			//echo $this->db->last_query(); exit;
			if(isset($insert_id))
			{
				echo $this->cart->total_items();
			} else {
				echo "error";
			}
		} else {
			echo "error";
		}

	}

	

	public function get_cartcount()
	{
		echo $this->cart->total_items();
	}

	public function cart_update($rowid)
	{
		$id=$this->input->post('productid');
		$qty =$this->input->post('qty');
		$product_details = $this -> products -> get($id);
		if( $product_details->qty < $qty)
		{
			echo "error";
		} else {
			$data=$this->cart->update(array(
			'rowid'=>$rowid,
			'qty'=> $this->input->post('qty')   
			));
			$this->cart->update($data);
			echo $this->cart->total_items();
		}
	}

	public function view_cart_delete($rowid)
	{   
		$data=$this->cart->update(array(
		'rowid'=>$rowid,
		'qty'=> $this->input->post('qty')   
		));

		$this->cart->update($data);   
		echo $this->cart->total_items();
	}


	
	
}
