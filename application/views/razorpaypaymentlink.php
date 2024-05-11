<?php

$keyId = RAZOR_KEY_ID;
$keySecret = RAZOR_KEY_SECRET;
$displayCurrency = 'INR';
//These should be commented out in production
// This is for error reporting
// Add it to config.php to report any errors
error_reporting(0);
ini_set('display_errors', 1);
require('razorpay-php/Razorpay.php');
//session_start();

// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => $payment['txnid'],
    'amount'          => $payment['total'] * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];
$this->session->set_userdata('razorpay_order_id', $razorpayOrderId);
$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

$image = base_url(IMAGES)."/logo.png";

$data = [
    "key"               => $keyId,
    "amount"            => $payment['total'],
    "name"              => $payment['name'],
    "description"       => "RB Group",
    "image"             => base_url(IMAGES)."/logo.png",
    "prefill"           => [
      "name"              => $payment['name'],
      "email"             => $payment['email'],
      "contact"           => $payment['phone'],
    ],
    "notes"             => [
      "address"           => "Hello World",
      "merchant_order_id" => $payment['merchant_order_id'],
    ],
    "theme"             => [
    "color"             => ""
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

?>
<style type="text/css">
  .razorpay-payment-button {
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.3333333;
        color: #fff;
        background-color: #337ab7;
        border-color: #2e6da4;

        display: inline-block;
        
        border: 1px solid transparent;
  }
</style>
<!-- <section class="at-plan-sec m-tb50">
   <div class="container">
<div class="text-center">
         <span class="smpk_font bluecolor">Your Packages</span>
         <h3 class=" letter-space">Confirmation Payment</h3>
      </div>
      <br>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
      <br>
      <center>
          <a class="btn btn-danger btnclr"><i class='la la-close' ></i> Cancel</a> &nbsp;
          <a class="btn btn-primary btnclr"><i class='la la-check'></i> Pay Now</a>
      </center>
   </div>
</section> -->
<div class="container-fluid  grtop clearfix" style="margin-top:30px;margin-bottom:50px">
   <div class="container">
      <div class="row">
         <div class="col-md-2"></div>
         <div class="col-md-8">
            <h1 class="text-center font46">Confirm Payment</h1>
            <br>
           <!--  <h4 class="text-center">Your Product will be dispatched to below mentioned address on your confirmation.</h4><br> -->
            <h4 class="text-center"><b>Order Id: <?php echo $payment['merchant_order_id']; ?></b></h4>
            <br>
            <div class="col-md-12 bbbot">
               <center>
                  <address class="text-uppercase add_cont">
                     <?php echo $payment['name']; ?><br>
                     <?php echo $payment['email']; ?><br>
                     <br>
                     <b>Contact Number: </b><?php echo $payment['phone']; ?><br>
                     
                       
                       
                     
                  </address>
                  
               </center>
            </div>
            <div class="clearfix h99">
            
               <div class="confrm_left">
                   <center>
                <div class="lefts">
                  <a href="<?php echo base_url(); ?>">
                  <button class="btn btn-danger btn-lg mrst confrt"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button></a>
                </div>
                <div class="lefts"> 
                   <form action="<?php echo site_url().'razorpay/response/'.$payment['merchant_order_id']; ?>" method="POST">
                  <script
                  src="https://checkout.razorpay.com/v1/checkout.js"
                  data-key="<?php echo $data['key']?>"
                  data-amount="<?php echo $data['amount']?>"
                  data-currency="INR"
                  data-name="<?php echo $data['name']?>"
                  data-image="<?php echo $data['image']?>"
                  data-description="<?php echo $data['description']?>"
                  data-prefill.name="<?php echo $data['prefill']['name']?>"
                  data-prefill.email="<?php echo $data['prefill']['email']?>"
                  data-prefill.contact="<?php echo $data['prefill']['contact']?>"
                  data-notes.shopping_order_id="<?php echo $payment['txnid']; ?>"
                  data-order_id="<?php echo $data['order_id']?>"
                  <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
                  <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
                >
                </script>
                <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                <input type="hidden" name="shopping_order_id" value="<?php echo $payment['txnid']; ?>">

                </form>
                </div>
                </center>
                 <!--  <button class="btn btn-primary btn-lg"><i class="fa fa-check" aria-hidden="true"></i> Confirm</button> -->
               </div>
            </div>
         </div>
         <div class="col-md-2"></div>
      </div>
   </div>
</div>