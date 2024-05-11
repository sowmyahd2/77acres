<html>
<body style="background:#e2e2e2;">
<div style="margin:0 auto;width:820px;background:#fff;height:auto;padding:20px;">
	<header>
	<div style="width:255px;float:left;">
		<img style="width:150px;height:67px;" src="<?php echo base_url()?>resources/img/logo.png"/>
	</div>
	<div style="width:465px;float:left">
		<h3 style="margin-top: 23px;color:#1492de;">fruit order return request.</h3>
	</div>
	</header>
	<div style="border-bottom:1px solid #e2e2e2;clear:both;padding-top:20px;">
	</div>
	<!--second-->
	<p>
		Dear <?= $user_email->username; ?>,	<br>		
			 Thank you for visiting fruit.com, your order return request has been received. We look forward to serve you better in your next visit.<br>	
		<div style="clear:both;">
		</div>
		<div style="clear:both;">
		</div>
		<div style="border-bottom:1px solid #e2e2e2;clear:both;padding-top:20px;">
		</div>
		<p style="color:#1492de;margin-bottom:0px;text-align:center;">
			Copyright <?php echo date('Y'); ?> &copy; fruit
		</p>
	</div>
</div>
</body>
</html>