<table class="table table-bordered table-striped">
  <thead>
  <tr>
    <th>S.NO</th>
    <th>ITEM DESCRIPTION</th>                   
    <th>QTY</th>     
    <th>RATE(Rs)</th>     
    <th>AMOUNT(Rs)</th>
  </tr>                    
  </thead>
  <tbody>
  <?php if(isset($product_list) && is_array($product_list) && count($product_list)): $i=1;?>
  <?php
  $totalAmount = 0;
  foreach ($product_list as $key => $user) { ?>
    <tr>
      <td> <?php echo $i++; ?> </td>
      <td> <?php echo $user ->  product_name; ?></a> </td>
     <td> <?php echo $user ->  qty; ?> </td> 
      <td> <?php echo price_format($user ->  price); ?> </td>                             
      <td> 
        <?php
        $proPrice = $user ->  qty * $user -> price;
        echo price_format($proPrice); ?> </td>
    </tr>
  <?php $totalAmount += $proPrice;
  } ?>
    <!-- <tr><td colspan="4">Delivery charge : </td><td>Rs.<?php echo $order_details->delivery_charge; ?></td></tr> -->
    <tr><td colspan="4">Grand total </td><td>Rs.<?php echo price_format($totalAmount); ?></td></tr>
  <?php endif; ?>
  </tbody>
</table>