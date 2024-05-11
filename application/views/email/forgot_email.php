<html>
  
   <body style="background:#e2e2e2;">
      <div style="margin:0 auto;width:820px;background:#fff;height:auto;padding:20px;">
	  <header>
	   <div style="width:255px;float:left;">
               <img style="width:150px;height:67px;" src="<?php echo base_url(IMAGES); ?>/logo.png"/>
            </div>
            <div style="width:465px;float:left">
               <h3 style="margin-top: 23px;color:#1492de;text-transform:uppercase;margin-left:25px;">Password Recovery Link</h3>
            </div>
            <!-- <div style="width:100px;float:left;">
               <img style="width:81px;height:70px;" src="http://delivertomyhome.com.au/resources/images/email.jpg"/>
            </div> -->
	  </header>  
	 <div style="border-bottom:1px solid #e2e2e2;clear:both;padding-top:20px;"></div>	  
	<!--second-->
	
	<p>Dear Customer, </p>
	<p>Greetings from RB Group - Real Estate!</p>
	<p>You received this email because you filled out a form on www.rbrealestate.in indicatting that you have forgotten your password.</p>
	<p>Click on the following link to set a new password.</p>
	<p><a href="<?php echo $link ?>" target="_blank"><?php echo $link ?></a></p>
	<p>Please ignore the email if it wasn't you who requested help with your password - your current password will remain unchanged.</p>
	<p>Please contact us should you have any questions or need further assistance.</p>
	<p>Thank you for Shopping with us!</p>

	<div style="clear:both;"></div>	
	<!--second end-->	  
		
	
	  <div style="border-bottom:1px solid #e2e2e2;clear:both;padding-top:20px;"></div>
         <p style="color:#1492de;margin-bottom:0px;text-align:center;">Copyright <?php echo date('Y'); ?> &copy; RB Group - Real Estate</p>
      </div>
	 
	 
	  
      </div>
   </body>
</html>


