<html>
  <head>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
  </head>
  <body style="margin:0; padding:0;font-family: 'Source Sans Pro', sans-serif;max-width:100%;">
  <div style="width:600px;max-width:100%;border:1px solid #e8e8e8;">
    <!-- header -->
    <div style="margin:0;color:#fff; background: #616161;border-bottom:4px solid #E67715;border-top:4px solid #0b0b0b;">
      <a href='<?php echo base_url(); ?>'>
      <img src='<?php echo base_url(IMAGES); ?>/logo.png'>
      </a>
    </div>
    <!-- /header -->
    <!-- content -->
    <div style="padding:5px 20px;font-size: 14px;background: #FFFFFF;">
      <h3>Dear <?php echo $orders->name; ?>,</h3>
      <p>Thanks for order</p>
      <p>Our support team will contact you shortly and tag will be dispached soon:</p>
      <p>Amount Paid: <?php echo $orders->grand_total; ?></p>
      <p>Phone: <?php echo $orders->shipping_phone; ?></p>
      <p>Address: <?php echo $orders->shipping_address; ?></p>
      <p>Pincode: <?php echo $orders->shipping_postcode; ?></p>
    </div>
    <!-- /content -->
    <!-- footer -->
    <div style="padding:10px 20px;margin:0;color:#10213F;background: #616161;font-size: 18px;border-top:3px solid #E67715;border-bottom:3px solid #0b0b0b;">
       <a href='<?php echo base_url(); ?>' style="color:#ffffff">
      rbgroup Admin
      </a>
      <span style="clear:both;"></span>
    </div>
    <!-- /footer -->
  </div>
  </body>
</html>