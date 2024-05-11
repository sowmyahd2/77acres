<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>RB Group - Real Estate Order Summary</title>
</head>

<body>
    <div style="width:100%;height:100%;margin:10px auto;padding:0;background-color:#f1f2f3;font-family:'Roboto-Regular',Arial,Tahoma,Verdana,sans-serif;font-weight:300;font-size:13px;text-align:center">
        <table width="100%" cellspacing="0" cellpadding="0" height="60">
            <tbody>
                <tr style="background:#2175ff">
                    <td>
                        <table width="100%" style="max-width:600px;margin:0 auto">
                            <tbody>
                                <tr>
                                    <td style="width:50%;text-align:left;padding-left:16px"> <a style="text-decoration:none;outline:none;color:#ffffff;font-size:13px" href="https://rbgroup.com"> <img border="0" height="30" src="<?php echo base_url(IMAGES); ?>/logo.png" alt="" style="border:none" class="CToWUd"></a> </td>
                                    <td style="width:50%;text-align:right;color:rgba(255,255,255,0.8);font-family:'Roboto-Medium',sans-serif;font-size:14px;font-style:normal;font-stretch:normal;padding-right:16px"> Order Summary </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;padding:10px;background-color:#f1f2f3">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:600px;background:#ffffff">
                            <tbody>
                                <tr>
                                    <td align="left" valign="top" class="m_4440374863163978786container" style="display:block;margin:0 auto;clear:both;padding:0px 40px">
                                        <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:600px;background:#ffffff">
                                            <tbody>
                                                <tr>
                                                    <td align="left" valign="top" class="m_4440374863163978786container" style="color:#212121;display:block;margin:0 auto;clear:both;padding:3px 0 0 0">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td id="m_4440374863163978786journey" valign="top" align="left" style="float:right;background-color:#fafafa;padding:0;text-align:center;vertical-align:middle"> <img border="0" src="<?php echo base_url()?>resources/img/order_placed.png" alt="Order Jouney" style="border:none;width:80%" class="CToWUd"></td>
                                                                    <td valign="top" align="left" style="float:left;vertical-align:middle">
                                                                        <p style="font-family:'Roboto-Medium',sans-serif;font-size:16px;font-weight:normal;font-style:normal;line-height:1.5;font-stretch:normal;color:#212121;margin:16px 0px">Hi <?php echo $orders->username; ?>,</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;padding:30px 0 0 0;max-width:600px;background:#ffffff" border="0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="table-layout:fixed;border-spacing:0;border-collapse:collapse;width:100%;max-width:260px;border:none;margin-right:30px">
                                                            <tbody>
                                                                <tr style="color:#212121;display:block;margin:0 auto;clear:both;padding:0">
                                                                    <td align="left" valign="top" class="m_4440374863163978786container">
                                                                        <p style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif">Your order has been confirmed.</p>
                                                                         <p>you placed on <?php echo date('d-m-Y h:i:s',strtotime($orders->order_date)) ?></p>
                                                                         <br>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="top" class="m_4440374863163978786container" style="color:#212121;display:block;margin:0 auto;clear:both;padding:0px 0 24px 0">
                                                                        <p style="padding:0;margin:0;font-size:12px;font-family:'Roboto',sans-serif;font-weight:400;line-height:20px;padding-bottom:0"> We are pleased to inform you that <?php echo $orders->total_no_products; ?> item from your order <?php echo $orders->order_number; ?> has been confirmed! </p> <a href="<?php echo site_url('users/order_status'); ?>/<?php echo $orders->order_uniq; ?>" class="m_4440374863163978786fk-email-button" style="font-family:'Roboto-Medium',sans-serif;box-sizing:border-box;text-decoration:none;background-color:rgb(41,121,251);color:#fff;min-width:160px;padding:7px 16px;border-radius:2px;margin-top:18px;text-align:center;display:inline-block;font-size:12px" target="_blank">Track your Order Soon</a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="border-spacing:0;border-collapse:collapse;width:100%;max-width:220px;border:none;margin-bottom:24px">
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="top" align="left" style="border-left:1px solid #f4f4f4;padding-left:15px">
                                                                        <p style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif;color:#212121;margin-bottom:12px">Delivery Address</p>
                                                                        <p style="padding:0;margin:0;font-size:12px;font-family:'Roboto',sans-serif;line-height:20px;padding-right:35px;color:#212121"> </p>
                                                                        <p style="padding:0;margin:0;font-size:12px;font-family:'Roboto',sans-serif;line-height:20px;color:#212121"><?php echo $orders->username; ?></p>
                                                                        <p style="padding:0;margin:0;font-size:12px;font-family:'Roboto',sans-serif;line-height:20px;color:#212121"><?php echo $orders->shipping_address; ?> <?php echo $orders->shipping_city; ?></p>
                                                                        <p style="padding:0;margin:0;font-size:12px;font-family:'Roboto',sans-serif;line-height:20px;color:#212121">Bangalore - <?php echo $orders->shipping_postcode; ?></p>
                                                                        <p style="padding:0;margin:0;font-size:12px;font-family:'Roboto',sans-serif;line-height:20px;color:#212121">Karnataka</p>
                                                                        <p style="padding:0;margin:0;font-size:12px;font-family:'Roboto',sans-serif;line-height:20px;color:#212121">Mob. <?php echo $orders->shipping_phone; ?></p>
                                                                        <p></p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:600px;background:#ffffff">
                                            <tbody>
                                                <tr>
                                                    <td align="left" valign="top" class="m_4440374863163978786container" style="color:#212121;display:block;margin:0 auto;clear:both;border-bottom:solid 1px #f0f0f0;padding:10px 0">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                            	<?php 
	if(isset($orderlist) && is_array($orderlist) && count($orderlist)){
		$i=1; 
		foreach($orderlist as $product) {		  
														                     ?> 
                                                                <tr>
                                                                    <td width="120" valign="top" align="left"> <a style="color:#027cd8;text-decoration:none;outline:none;color:#ffffff;font-size:13px;display:block;width:100px" href="https://rbgroup.com"> <img border="0" src="<?php echo base_url('uploads/products'); ?>/<?php echo $product->proimage;?>" style="border:none;width:fit-content;margin-left:auto;margin-right:auto;display:block;width: 100px;height: 100px;" class="CToWUd"> </a> </td>
                                                                    <td width="8"></td>
                                                                    <td valign="top" align="left">
                                                                        <p style="margin-bottom:13px"><a href="https://rbgroup.com" style="font-family:'Roboto',sans-serif;font-size:16px;font-weight:normal;font-style:normal;font-stretch:normal;line-height:1.25;color:#2175ff;text-decoration:none"><?php echo $product->product_name;?>
                                                                            <?php echo empty($product->product_color)?"":" (".$product->product_color.")";?>
                                                                        </a></p> <span style="font-family:'Roboto-Medium',sans-serif;font-size:12px;font-weight:normal;font-style:normal;line-height:1.5;font-stretch:normal;color:#878787;margin:0px 0px;border:1px solid #dfdfdf;display:inline;border-radius:3px;padding:3px 10px">Qty: <?php echo $product->qty;?></span>
                                                                    </td>
                                                                </tr>
                                                                <?php
                   $i++; }
                   
		    }
		?>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td height="1" style="background-color:#f0f0f0;font-size:0px;line-height:0px" bgcolor="#f0f0f0"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="top" class="m_4440374863163978786container" style="color:#212121;display:block;margin:0 auto;clear:both;border-bottom:solid 1px #f0f0f0;text-align:justify;padding:0 40px">
                        <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;padding:30px 0 0 0;max-width:600px;background:#ffffff" border="0">
                            <tbody>
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="border-spacing:0;border-collapse:collapse;width:100%;max-width:220px;border:none;margin-bottom:24px">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" align="left">
                                                        <table width="100%">
                                                            <tbody>
                                                                <tr width="50%">
                                                                    <td>
                                                                        <p style="padding:10px 10px 0;margin:0;font-size:12px;font-family:'Roboto-Medium',sans-serif;color:#212121">Total Delivery chrages</p>
                                                                    </td>
                                                                    <td>
                                                                        <p style="padding:10px 10px 0;margin:0;font-size:12px;font-family:'Roboto';font-weight:400;color:#212121">₹<?php echo $orders->delivery_charge?></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <p style="padding:10px 10px 0;margin:0;font-size:12px;font-family:'Roboto-Medium',sans-serif;color:#212121">Total Amount</p>
                                                                    </td>
                                                                    <td>
                                                                        <p style="padding:10px 10px 0;margin:0;font-size:12px;font-family:'Roboto',sans-serif;font-weight:400;color:#212121">₹<?php echo $orders->grand_total?></p>
                                                                    </td>
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td height="1" style="background-color:#f0f0f0;font-size:0px;line-height:0px" bgcolor="#f0f0f0"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:600px;margin-top:24px">
            <tbody>
                <tr>
                    <td align="left" valign="top" class="m_4440374863163978786container" style="color:#2c2c2c;display:block;line-height:20px;font-weight:300;margin:0 auto;clear:both;background-color:transparent">
                        <table class="m_4440374863163978786body-wrapper">
                            <tbody>
                                <tr>
                                    <td style="width:75%;text-align:left"> <a style="color:#027cd8;text-decoration:none;outline:none;color:#ffffff;font-size:13px" href="https://rbgroup.com"> <img border="0" height="24" src="<?php echo base_url(IMAGES); ?>/logo.png" alt="" style="border:none" class="CToWUd"> </a> </td>
                                    <td style="width:15%;text-align:left"> <a style="text-decoration:none;outline:none;color:#ffffff;font-size:13px" href="https://rbgroup.com"> <img border="0" height="24" src="https://ci6.googleusercontent.com/proxy/3QE9kvI6a_sNZY1yz9h1e9UTtBEe6bvUPfsokYVFhigLrmrCJxcv1_CZk0b5cJWyTHa1prcEfHSGUl1QMcg36fPaTs0H7MVxDk0pgC8ujoEedjfg26Rdff_eNArN9_s=s0-d-e1-ft#http://img6a.flixcart.com/www/promos/new/20160910-183744-google-play-min.png" alt="" style="border:none" class="CToWUd"> </a> </td>
                                    <td style="width:10%;text-align:right"> <a style="text-decoration:none;outline:none;color:#ffffff;font-size:13px" href="https://rbgroup.com"> <img border="0" height="24" src="https://ci4.googleusercontent.com/proxy/QypvFRQDLBLrj10OMzTKLzSZQuMK2CfotEga4oOV9lbsjq3-KGtkoYz3K2w-hbkiqilkj7EORpiOpODCSSxAgpHd-y3FC1hCd2g7ocbGtAcBgHC1Xdyzc1tRoePbQXA=s0-d-e1-ft#http://img5a.flixcart.com/www/promos/new/20160910-183649-apple-store-min.png" alt="" style="border:none" class="CToWUd"> </a> </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <img style="width:1px;height:1px" src="<?php echo base_url(IMAGES); ?>/logo.png">
        <div class="yj6qo"></div>
        <div class="adL">
        </div>
    </div>
</body>

</html>