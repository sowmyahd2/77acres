<script>
  function tablePrint()
  {
    var display_setting="toolbar=yes,location=yes,directories=yes,menubar=yes,";
    display_setting+="scrollbars=yes,width=921, height=519";

    var content_innerhtml = document.getElementById("reportsummary").innerHTML;
    var document_print=window.open("","",display_setting);
    document_print.document.open();
    document_print.document.write('<html><head><title></title></head>');
    document_print.document.write('<body onLoad="self.print();self.close();" >');
    document_print.document.write(content_innerhtml);
    document_print.document.write('</body></html>');
    document_print.print();
    document_print.document.close();
    return false;
  }
</script>
 <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">RETAIL INVOICE</h4>
          </div>
          <!-- New invoice template -->
          <div id="reportsummary">
          <div id="dvContainer" class="panel">
              <table class="table">
                <tr class="invoice-header">
                  <td>
                    <h3><?=$user_info->name;?></h3>
                    <span><?=$product->shipping_phone;?></span> <br>
                    <span><?=$product->email;?></span>
                  </td>
                  <td>
                    <table class="table">
                      <tr>
                        <td class="text-right" style="padding: 2px 0px;">Invoice No.</td>
                        <td class="text-left" style="padding: 2px 0 5px 10px;width: 125px;"><strong class="text-danger"><?=$product->order_number;?></strong></td>
                      </tr>
                      <tr>
                        <td class="text-right" style="padding: 2px 0px;">Date of Invoice:</td>
                        <td class="text-left" style="padding: 2px 0 5px 10px;width: 125px;"><strong><?php echo date('M-d-Y',strtotime($product->order_date)) ?></strong></td>
                      </tr>
                      <tr>
                        <td class="text-right" style="padding: 2px 0px;">Delivery date:</td>
                        <td class="text-left" style="padding: 2px 0 5px 10px;width: 125px;">
                          <strong>
                          <?php  echo date('M-d-Y',strtotime($product ->delivery_date));?></strong>
                        </td>
                      </tr>
                    </table>
                  </td>                
                </tr>
              </table>
              <table class="table">
                <tr class="invoice-header">
                  <td>
                    <h5>Shipping Address:</h5>
                    <p style="text-transform: capitalize;"><?=$product->shipping_address;?>,<br/>
                    <?=$product->shipping_city;?> - <?=$product->shipping_postcode;?><br>
                    <?=isset($state_name->name)?$state_name->name:"";?></p>
                  </td>
                </tr>
              </table>
              <table class="table table-bordered table-striped" style="border-top: 1px solid #ddd;">
                <thead>
                  <tr>
                    <th>S.NO</th>
                    <th>ITEM DESCRIPTION</th>                   
                    <th>QTY</th>     
                    <th class="text-right">PRICE(Rs)</th>     
                    <th class="text-right">AMOUNT(Rs)</th>
                  </tr>                    
                </thead>
                <tbody>
                <?php if(isset($product_list) && is_array($product_list) && count($product_list)): $i=1;?>
                  <?php foreach ($product_list as $key => $user) { ?>
                    <tr>
                      <td> <?php echo $i++; ?> </td>
                      <td> <?php echo $user ->  product_name ?></a> </td>
                      
                      <td> <?php echo $user ->  qty ?> </td> 
                      <td class="text-right"> <?php echo $user ->  price ?> </td>                             
                      <td class="text-right"> <?php echo $user ->  qty * $user -> price; ?> </td>
                    </tr>
                  <?php } ?>
                <?php endif; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="3" class="print_noborder" style="border-bottom: 0;"></th>
                    <th colspan="2" class="text-center">Price Details</th>
                  </tr>
                  <tr>
                    <th colspan="3" class="print_noborder" style="border: 0;"></th>
                    <th>Subtotal:</th>
                    <td class="text-right">Rs.<?=$product->grand_total - $product->delivery_charge;?></td>
                  </tr>
                  <tr>
                    <th colspan="3" class="print_noborder" style="border: 0;"></th>
                    <th>Delivery charge:</th>
                    <td class="text-right">Rs.<?=$product->delivery_charge?></td>
                  </tr>
                  <?php
                  if($product->coupon_amount!=0){
                    ?>
                      <tr>
                        <th colspan="3" class="print_noborder" style="border: 0;"></th>
                        <th>Coupon (<?php echo $product->coupon_code; ?>):</th>
                        <td class="text-right">Rs.<?=$product->coupon_amount?></td>
                      </tr>
                    <?php
                  }
                  ?>
                  <tr>
                    <th colspan="3">Payment Method: <strong class="pull-right">
                        <?php echo ($product -> payment_type=='cod') ? 'Cash on delivery' :'Online payment'; ?>
                      </strong></th>
                    <th>Total:</th>
                    <td class="text-right text-danger"><strong>Rs.<?=$product->grand_total?></strong></td>
                  </tr>
                </tfoot>
              </table>
            <div class="panel-body">
              <h6>DESCRIPTION:</h6>
                We declare that this invoice shows actual price of the good described inclusive of taxes and that all particular are true and correct. 
             </div>
          </div>
          </div>
          <!-- /new invoice template -->
          <div class="modal-footer">         
            <!-- <a href="#" onclick="tablePrint();" id="btnPrint" class="btn btn-primary"><i class="icon-print2"></i> Print</a> -->
            <a href="#"  onclick="invoicePrint()" id="btnPrint" class="btn btn-primary"><i class="icon-print2"></i> Print</a>
          </div>
        </div>
      </div>