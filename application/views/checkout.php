<!--End Main Header -->
<section class="m-t50">
   <div class="container">
      <div class="row">
         <div class="sec-title">
            <span class="title">Checkout</span>
            <h2>consectetur adipisicing elit</h2>
         </div>
      </div>
      <div class="profile-form">
         <form method="post" action="<?php echo site_url('buyproducts/checkoutbuysubmit'); ?>">
            <input type="hidden" name="productsku" value="<?php echo $prosku; ?>">
            <div class="row">
               <!-- Form Group -->
               <div class="form-group col-lg-4">
                  <input type="text" name="name" value="<?php echo $rguser_details->name; ?>" placeholder="Client Name" readonly>
               </div>
               <div class="form-group col-lg-4">
                  <input type="text" name="emailid" value="<?php echo $rguser_details->email; ?>" placeholder="cleint@gmail.com" readonly>
               </div>
               <div class="form-group col-lg-4">
                  <input type="text" name="phonenumber" value="<?php echo $rguser_details->phone; ?>" readonly>
               </div>
               <div class="col-lg-12">
                  <br>
                  <h6 class="dark_blueclr"><b>Select what all properties has to showcase</b></h6>
                  <br>
                  <div class="row">
                     <div class="col-md-6">
                  <?php
                  if(is_array($products) && count($products)){
                  $pro=0; foreach ($products as $key => $buyproducts) {  
                  ?>
                  <label class="containerdm"><?php echo $buyproducts->name;?> | <span> <i class="la la-map-marker"></i> <?php echo ucfirst($buyproducts->sname).", ".ucfirst($buyproducts->cname);?></span>
                  <input type="checkbox" name="projectid[]" id="projectid<?php echo $buyproducts->id; ?>" value="<?php echo $buyproducts->id; ?>" >
                  <span class="checkmarksa"></span>
                  </label>
               <?php } } ?>
                 
                  </div>
                  
</div>
               </div>
               <div class="form-group col-lg-12" style="margin-bottom:0">
                  <br>
                  <h6 class="dark_blueclr"><b>Select Duration</b></h6>
                  <br>
                  <label class="containerq">Three Months
                  <input type="radio" checked="checked"  name="durations" id="durations1" value="3" required="required">
                  <span class="checkmarkq"></span>
                  </label>
                  <label class="containerq">Six Months
                  <input type="radio" name="durations" id="durations2" value="6" required="required">
                  <span class="checkmarkq"></span>
                  </label>
                  
               </div>
               <!-- Form Group -->
               <div class="col-md-12 rad_tops">
                  <?php
                  $gstamount = $amspecification->price * $amspecification->gst/100;
                  $totalAmount = $amspecification->price+$gstamount;
                  ?>
                  <h5 class="pull-left marginrght"><b>GST <i class="la la-rupee"></i><?php echo price_format($gstamount); ?> <i class="la la-arrow-right" aria-hidden="true"></i> Total Amount: <i class="la la-rupee"></i><?php echo price_format($totalAmount); ?></b></h5> <button type="submit" class="theme-btn btn-style-one pull-left">Pay Now</button>
               </div>
                 
                
              
            </div>
         </form>
      </div>
   </div>
</section>
<br><br>
