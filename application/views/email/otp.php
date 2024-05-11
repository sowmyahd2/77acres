<html>
  <head>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
  </head>
  <body style="margin:0; padding:0;font-family: 'Source Sans Pro', sans-serif;max-width:100%;">
  <div style="width:600px;max-width:100%;border:1px solid #e8e8e8;">
    <!-- header -->
    <div style="margin:0;color:#fff; background: #616161;border-bottom:4px solid #E67715;border-top:4px solid #0b0b0b;">
      
    </div>
    <!-- /header -->
    <!-- content -->
    <div style="padding:5px 20px;font-size: 14px;background: #FFFFFF;">
      <h3>Hi User,</h3>
      <p>Welcome to RB Group</p>
      <p>Validating your account via OTP:</p>
      <p>Phone: <?php echo $phonenumber; ?></p>
      <p>OTP: <?php echo $otp; ?></p>
      <div style="font-size:13px;color:#555;">
      <p>&copy; <?php echo date("Y"); ?> RB Group - Bangalore, Karnataka, India</p>
      <h5 style="margin-bottom:0px;">Disclaimer</h5>
      <p  style="margin-top:0px;">Your account may contain sensitive information and should be protected in the same way you would protect any private information. RB Group will never ask for your username and password.</p>
      
      </div>
    </div>
    <!-- /content -->
    <!-- footer -->
    <div style="padding:10px 20px;margin:0;color:#10213F;background: #616161;font-size: 18px;border-top:3px solid #E67715;border-bottom:3px solid #0b0b0b;">
       <a href='<?php echo base_url(); ?>' style="color:#ffffff">
      RB Group
      </a>
      <span style="clear:both;"></span>
    </div>
    <!-- /footer -->
  </div>
  </body>
</html>