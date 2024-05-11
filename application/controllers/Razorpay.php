<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * @package Razorpay :  CodeIgniter Razorpay Gateway
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 *   
 * Description of Razorpay Controller
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Razorpay extends User_Controller {
    // construct
    public function __construct() {
        parent::__construct();   
        $this->load->model('Common_model','common_model');
        $this->load->model('rbgroup/Showcase_model','ordershowcase');
        $this->load->model('rbgroup/Affordableplan_model','affordableplan');
        $this->load->model('rbgroup/Regusers_model', 'users');
        $this->load->library('cart');
    }
    // index page
    public function index() {
        $data['title'] = 'Razorpay | RBGroup';  
        //$data['productInfo'] = $this->site->getProduct();           
        $this->load->view('razorpay/index', $data);
    }

    public function order_mail($orderuniq)
    {
        $order['orders'] = $this -> orders -> orderemailtmp($orderuniq);
        //$this -> $tableName -> get('order_uniq',$orderuniq);
        $order['orders'] = $this -> orders -> orderemailtmp($orderuniq);
        $orde_d=$order['orders'];
        $order['orderlist'] = $this -> orderproducts -> orderproduct_details($orde_d->id);

        $message = $this -> load -> view('email/order_email',$order,TRUE);
        $email_result = $this -> common_model -> send_mail(admin_email,$order['orders']->email,'You have sucessfully placed a order',$message);

        //Admin email --
        $email_result = $this -> common_model -> send_mail(admin_email,admin_email,'Customer placed a order',$message);
    }

    
    public function response($id='') 
    {
        
        $success = true;
        $error = "Payment Failed";
        
        if (empty($_POST['razorpay_payment_id']) === false)
        {
            $keyId = RAZOR_KEY_ID;
            $keySecret = RAZOR_KEY_SECRET;
            $displayCurrency = 'INR';
            $api = new Api($keyId, $keySecret);
            
            try
            {
                // Please note that the razorpay order ID must
                // come from a trusted source (session here, but
                // could be database or something else)
                $attributes = array(
                    'razorpay_order_id' => $_SESSION['razorpay_order_id'],
                    'razorpay_payment_id' => $_POST['razorpay_payment_id'],
                    'razorpay_signature' => $_POST['razorpay_signature']
                );

                $api->utility->verifyPaymentSignature($attributes);

                //------------------------------------
                $this -> ordershowcase -> update ($id,$attributes);
            }
            catch(SignatureVerificationError $e)
            {
                $success = false;
                $error = 'Razorpay Error : ' . $e->getMessage();
            }
        }
        $makepaymentDtl = $this -> ordershowcase -> get('id',$id);
        if ($success === true)
        {
            $pay_update = array(
                'status'=>'1',
                'payment_status'=>'1',
                'payment_errors'=>"success"
            );
            $this -> ordershowcase -> update ($id,$pay_update);
            
            //$this ->order_mail($makepaymentDtl->order_uniq);
           // $this->cart->destroy();
            
             
           // $this->session->set_flashdata('success_message', 'Thanks for the payment, your Payment ID:'.$_POST['razorpay_payment_id'].', Our team will contact soon');
            redirect(site_url('buyproducts/thankyou/'.$makepaymentDtl->id));
        }
        else
        {
            $pay_update = array(
                'status'=>'0',
                'payment_status'=>'0',
                'payment_errors'=>$error
            );
            $this -> ordershowcase -> update ($id,$pay_update);
            $this->session->set_flashdata('error_message', 'Invalid Transaction. '.$error);
            redirect(site_url('checkout'));
        }
        
    }  
    
}
?>