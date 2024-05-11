
<!--End Main Header -->
<section class="m-t50">
   <div class="container">
      <div class="row">
         <div class="sec-title">
            <span class="title">Packages</span>
            <h2>To showcase your properties</h2>
         </div>
      </div>
      <div class="row">
         <?php 
         if(is_array($showcaseproperty) && count($showcaseproperty)){
         foreach ($showcaseproperty as $key => $showcaseproperty) { 
            if($showcaseproperty-> image!='' && file_exists('./uploads/pages/'.$showcaseproperty->image)) $src = base_url().'uploads/pages/'.$showcaseproperty->image; else $src = base_url(IMAGES).'/technology_icon.png';
         ?>
         <div class="col-md-4">
            <div class="showcase_card">
               <center><img src="<?php echo $src; ?>" class="img-responsive"></center>
               <br>
               <h4 class="text-center bluecolor margbot10"><b><?php echo $showcaseproperty->name; ?></b></h4>
               <p class="text-center word-breakup"><?php echo $showcaseproperty->description; ?></p>
            </div>
         </div>
         <?php } } ?>
         
      </div>
   </div>
</section>
<section class="at-plan-sec m-tb50">
   <div class="container">
      <div class="row">
         <div class="col-md-8">
            <div class="m-b30">
               <!-- Title Column -->
               <div class="title-column">
                  <div class="sec-title">
                     <span class="title">What all Benfits</span>
                     <h2 style="font-size:19px">you will get to showcasing  your properties</h2>
                  </div>
               </div>
               <?php 
               if(is_array($showcasebenifts) && count($showcasebenifts)){
               foreach ($showcasebenifts as $key => $showcasebenifts) { 
               ?>
               <p class="text-justify "><?php echo $showcasebenifts->description; ?></p>
               <br>
               <?php } } ?>
               <!-- <div class="row">
                  <div class="col-md-6">
                     <div class="at-plan-box at-col-default-mar">
                        <ul>
                           <li>Lorem Ipsum is simply.</li>
                           <li>Lorem Ipsum is simply.</li>
                           <li>Lorem Ipsum is simply.</li>
                           <li>Lorem Ipsum is simply.</li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="at-plan-box at-col-default-mar">
                        <ul>
                           <li>Lorem Ipsum is simply.</li>
                           <li>Lorem Ipsum is simply.</li>
                           <li>Lorem Ipsum is simply.</li>
                           <li>Lorem Ipsum is simply.</li>
                        </ul>
                     </div>
                  </div>
               </div> -->
            </div>
         </div>
         <div class="col-md-4">
         <div class="contact_agent sidebar-widget">
         <h4 class="author_name dark_blueclr"><b><i class="la la-envelope"></i> For More Enquire</b></h4><br>
					<?php echo form_open_multipart(site_url()."contactus/contactusform",' id="contact-form" class="validate"');?>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
                           <input type="text" name="customername" id="customername" placeholder="Name" required="required" class="form-control" onkeypress="return alphaOnly(event)">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
                           <input type="email" class="form-control" name="emailid" id="emailid" placeholder="Email" required="required">
								</div>
							</div>
							
						<div class="col-md-12">
                  <div class="form-group">
                     <input type="text" class="form-control" name="phonenumber" id="phonenumber" minlength="7" maxlength="10"  placeholder="Mobile No" required="required" onkeypress="return isNumber(event)">
                  </div>
						</div>
                  <div class="col-md-12">
								<div class="form-group">
									<textarea class="form-control" name="yourmessage" placeholder="Message" rows="5"></textarea>
								</div>
							</div>
							<div class="col-md-12">
                     <button type="submit" class="theme-btn btn-style-four pull-right" name="submit">Send</button>
							</div>
						</div>
					</form>
				</div>
         </div>
      </div>
   </div>
</section>
<section class="at-plan-sec m-tb50">
   <div class="container">
      <div class="text-center">
         <span class="smpk_font bluecolor">Package Plans</span>
         <h3 class=" letter-space" >Choose Affordable Prices</h3>
      </div>
      <div class="row">
      <?php if(is_array($amspecification) && count($amspecification)){
      foreach ($amspecification as $key => $amspecification) { ?>    
      <div class="table-responsive  m-tb50 col-md-4">
         <table class="table  bxes">
            <thead>
               <tr class="table_font text-center">
                  <th class="dark_blueclr"><?php echo $amspecification['name']; ?></th>
                  
               </tr>
            </thead>
            <tbody class="text-center">
              <?php if(is_array($amspecification['Plandetails']) && count($amspecification['Plandetails'])){
              foreach ($amspecification['Plandetails'] as $key => $specdtl) { ?> 
               <tr>
                  <td><?php echo $specdtl->name; ?> </td>
                 
               </tr>
               <?php } } ?>
               <tr>
                  <td>
                      <center>
                      <a href="#" class="bxesdy">Rs <?php echo $amspecification['price']; ?>/-</a>
                      <?php if($this -> session -> userdata('user')){ 
                        $redirecturl = base_url('checkout/index/'.$amspecification['sku_id']);
                        ?>
                        <a href="<?php echo $redirecturl; ?>">
                        <?php
                      } else {
                        ?>
                        <a href="#" data-toggle="modal" data-target="#loginModal" data-backdrop="false" class="">
                        <?php
                      } ?>
                      

                        <button class="theme-btn btn-style-one btnpads" type="submit" name="submit-form">Pay Now</button></a></td>
                 </center>
               </tr>
            </tbody>
         </table>
      </div>
      <?php } } ?>
       <!-- <div class="table-responsive  m-tb50 col-md-4">
         <table class="table  bxes">
            <thead>
               <tr class="table_font text-center">
                  <th class="dark_blueclr">Standard Packages</th>
                  
               </tr>
            </thead>
            <tbody class="text-center">
               <tr>
                  <td>Shows in property detail page </td>
                 
               </tr>
               <tr>
                  <td>Shows in property detail page </td>
               
               </tr>
             <tr>
                  <td>Shows in property detail page </td>
               
               </tr>
               <tr>
                  <td>Shows in property detail page </td>
               
               </tr>
               <tr>
                  <td>
                      <center>
                      <a href="#" class="bxesdy">Rs 2000/-</a>
                      <a href="<?php echo base_url('checkout'); ?>"><button class="theme-btn btn-style-one btnpads" type="submit" name="submit-form">Pay Now</button></a></td>
                 </center>
               </tr>
            </tbody>
         </table>
      </div>
       
       <div class="table-responsive  m-tb50 col-md-4">
         <table class="table  bxes">
            <thead>
               <tr class="table_font text-center">
                  <th class="dark_blueclr">Premium Packages</th>
                  
               </tr>
            </thead>
            <tbody class="text-center">
               <tr>
                  <td>Shows in property detail page </td>
                 
               </tr>
               <tr>
                  <td>Shows in property detail page </td>
               
               </tr>
             <tr>
                  <td>Shows in property detail page </td>
               
               </tr>
               <tr>
                  <td>Shows in property detail page </td>
               
               </tr>
               <tr>
                  <td>
                      <center>
                      <a href="#" class="bxesdy">Rs 2000/-</a>
                      <a href="<?php echo base_url('checkout'); ?>"><button class="theme-btn btn-style-one btnpads" type="submit" name="submit-form">Pay Now</button></a></td>
                 </center>
               </tr>
            </tbody>
         </table>
      </div> -->
       
      </div>
   </div>
</section>




<!-- <section class="at-plan-sec m-tb50">
   <div class="container">
<div class="text-center">
         <span class="smpk_font bluecolor">Your Packages</span>
         <h3 class=" letter-space">Confirmation Payment</h3>
      </div>
      <br>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
      <br>
      <center>
          <a class="btn btn-danger btnclr"><i class='la la-close' ></i> Cancel</a> &nbsp;
          <a class="btn btn-primary btnclr"><i class='la la-check'></i> Pay Now</a>
      </center>
   </div>
</section> -->





