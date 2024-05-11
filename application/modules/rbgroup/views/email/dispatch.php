<html>
<body style="background:#e2e2e2;">
<div style="margin:0 auto;width:820px;background:#fff;height:auto;padding:20px;">
	<header>
	<div style="width:255px;float:left;">
		<img style="width:150px;height:67px;" src="<?php echo base_url()?>resources/img/logo.png"/>
	</div>
	<div style="width:465px;float:left">
		<h3 style="margin-top: 23px;color:#1492de;">Your fruit order has been Shipped 
			<a href="<?php echo base_url().'users/order_status/'.$user_email->order_uniq;?>" target="_blank" ><?=$user_email->order_id;?></a>
		</h3>
	</div>
	</header>
	<div style="border-bottom:1px solid #e2e2e2;clear:both;padding-top:20px;">
	</div>
	<!--second-->
	<p>
		Dear <?= $user_email->username; ?>,
		<p>We thought you'd like to know that <?= $user_email->courier; ?> dispatched your item(s).
		 Your order is on the way. If you need to return an item from this shipment or manage other orders,
		 please visit Your Orders on <a href="http://www.fruit.com/">fruit.com</a><br>
		<a href="<?php echo site_url().'users/order_status/'.$user_email->order_uniq;?>" target="_blank" ><input type="button" value="Track your order" /></a>	
		 
		</p>
		<p>
				
		</p>
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