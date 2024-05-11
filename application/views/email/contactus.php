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
      <h3>Dear Admin,</h3>
      <p>Welcome to RB Group - Real Estate!</p>
      <p>Thank you for your valuable feedback email:</p>
      <p>Customer Name: <?php echo $customername; ?></p>
      <p>EmailID: <?php echo $emailid; ?></p>
      <p>Phone: <?php echo $phonenumber; ?></p>
      <p>Subject: <?php echo $subject; ?></p>
      <p>Feedback: <?php echo $content; ?></p>
     
      <div style="font-size:13px;color:#555;">
     
      <h5 style="margin-bottom:0px;">Disclaimer</h5>
      <p  style="margin-top:0px;">Your rbgroup.com account may contain sensitive information and should be protected in the same way you would protect any private information. rbgroup.com will never ask for your username and password.</p>
      
      </div>
    </div>
    <!-- /content -->
    <!-- footer -->
    <div style="padding:10px 20px;margin:0;color:#10213F;background: #616161;font-size: 18px;border-top:3px solid #E67715;border-bottom:3px solid #0b0b0b;">
       <a href='<?php echo base_url(); ?>' style="color:#ffffff">
      RB Group - Real Estate
      </a>
      <span style="clear:both;"></span>
    </div>
    <!-- /footer -->
  </div>
  </body>
</html>