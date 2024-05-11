<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyproducts extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load -> library('form_validation');
		$this->load->model('rbgroup/Contents_model','contents');
		$this->load->model('Common_model','common_model');
		$this->load->model('rbgroup/Products_model','products');
		$this->load->model('rbgroup/Regusers_model', 'users');
		$this->load->model('rbgroup/Showcase_model','ordershowcase');
		$this->load->model('rbgroup/Affordableplan_model','affordableplan');
		$this->load->library('cart');
	}

	public function index()
	{
		$this -> data['page_title']="Rbgroup | Checkout";
		$this->data['page'] = 'checkout';
		if($user_details=$this -> session -> userdata('user'))
		{
			$this -> data['rguser_details'] = $this ->users->get($user_details->id);
		}
		$this->load->view('template', $this->data, FALSE);
	}

	

	public function generatePIN($digits = 8){
	    $i = 0; //counter
	    $pin = ""; //our default pin is blank.
	    while($i < $digits){
	        //generate a random number between 0 and 9.
	        $pin .= mt_rand(0, 9);
	        $i++;
	    }
	    return $pin;
	}

	public function generateTransId(){
		$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		$org_txnid = $this->checkTransId($txnid); //checking the transaction id
		return $org_txnid;
	}

	public function checkTransId($txnid){
    	if($this -> ordershowcase->count_all_results(array("transaction_id" => $txnid)))
		{
			$extraid = $this -> generatePIN();
			$txnid = $txnid.$extraid;
			return $txnid;

		} else {
			return $txnid;
		}
    }

    public function checkOrderId($orderId){
    	if($this -> ordershowcase->count_all_results(array("id" => $orderId)))
		{
			$orderId = $orderId+1;
			return $orderId;

		} else {
			return $orderId;
		}
    }

	public function checkoutbuysubmit()
	{
		$sku_rand = 0;
		
			$user_details = $this -> session -> userdata('user');

			$email = $user_details->email;
			$name = $user_details->name;
			$phonenumber = $user_details->phone;
			$user_id = $user_details->id;

			$prosku = $this -> input -> post('productsku');
			$duration = $this -> input -> post('durations');
			$proprice = $this-> affordableplan ->get('sku_id',$prosku);
			//print_r($proprice); exit;
			$gstamount = $proprice->price * $proprice->gst/100;
            $finalAmount = $proprice->price+$gstamount;
			
			$sku_rand = $this -> generatePIN();

			$sku_rand = $this->checkOrderId($sku_rand);
			$date=date('Y-m-d H:i:s');
          	$txnid = $this->generateTransId();
          	
      		$order = array(
				'user_id' => $user_id,
				'name' => $name,
				'email' => $email,
				'grand_total' => $finalAmount,
				'payamount' => $finalAmount,
				'phonenumber' =>$phonenumber,
				'duration' =>$duration,
				'order_number'=>$sku_rand,
				'payment_status' => '0',
				'status'=>'0',
				'payment_errors' => 'Transaction Initiated',
				'transaction_id'=>$txnid,
				'order_uniq' => md5(uniqid(rand(), true)),
				'order_date' => $date,
				'gst' => '0'
			);	
			$this->ordershowcase->insert($order);

			$last_id = $this->db->insert_id();
			//-------updating the order-----------------
			/*$order_items = array();
			$final_price = $final_discount_amount = $final_gst_amount = $final_delivery_charge = 0;
			$numProducts = $this->cart->total_items();
			
			foreach ($this->cart->contents() as $items){ 
				$order_items= array(
					'order_id' => $last_id,
					'product_id' => $items['p_id'],
					'qty' => $items['qty'],
					'price' => $items['price'],
					'SKUID'=>$items['SKUID'],
					'orderType'=>$items['Ctype'],
					'discount'=>$items['discount_amount'],
					'delivery'=>$items['delivery_charge'],
					'product_name' => $items['name']
				);
				
				$this -> orderproducts -> insert($order_items);	
				//print_r($order_items); exit;
				$final_price += $items['price'];
				$final_delivery_charge += $items['delivery_charge'];
				$final_discount_amount += $items['discount_amount'];
				
				//$this -> products-> remove_qty($items['p_id'],$items['qty']);
			}*/
			$order_uniq = $order['order_uniq'];
			
			redirect(site_url("buyproducts/paynow/".$last_id), 'refresh');
	}

	
	public function paynow($orderId='')
	{
		$orderdetails = $this -> ordershowcase -> get('id',$orderId);
		$txnid = $orderdetails->transaction_id;
		$this->razorpay($txnid);
	}

	public function razorpay($txnid)
	{
		//get the booking details for getting person count
		$OrderDetails = $this ->ordershowcase-> get('transaction_id',$txnid);
		$this -> data['orderdetails'] = $OrderDetails;
		//get ends here 
		$this -> data['payment'] = array(
			'key_id' => RAZOR_KEY_ID,
			'total' => $OrderDetails->payamount,
			'name' => $OrderDetails->name,
			'merchant_order_id' => $OrderDetails->id,
			'currency_code' => 'INR',
			'card_holder_name' => 'RBGroup',
			'email' => $OrderDetails->email,
			'phone' => $OrderDetails->phonenumber,
			'txnid' => $OrderDetails->transaction_id

		);
		$this->data['page'] = 'razorpaypaymentlink';
		$this->load->view('template',$this->data,FALSE);
	}

	public function order_mail($orderuniq,$tableName)
	{
		$order['orders'] = $this -> orders -> orderemailtmp($orderuniq);
		$orde_d=$order['orders'];
		$order['orderlist'] = $this -> orderproducts -> orderproduct_details($orde_d->id);

		$message = $this -> load -> view('email/order_email',$order,TRUE);
		$email_result = $this -> common_model -> send_mail(admin_email,$order['orders']->email,'You have sucessfully placed a order',$message);

		//Admin email --
		$email_result = $this -> common_model -> send_mail(admin_email,admin_email,'Customer placed a order',$message);
	}

	

	public function thankyou($orderId='',$tableName='orders')
	{
		$this->data['page'] = 'thankyou';
		$this->data['orderdetails'] = $this -> $tableName -> get('id',$orderId);
		//print_r($this->data['orderdetails']); exit;
		$this->load->view('template', $this->data, FALSE);
	}

}
