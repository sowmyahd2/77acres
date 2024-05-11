<!--Page Title-->
<!-- <section class="page-title hidden-xs" style="background-image:url(<?php echo base_url(IMAGES); ?>/fixed-slider.png);">
	<div class="auto-container">
		<div class="inner-container clearfix">
			<h1>Contact Us</h1>
			<ul class="bread-crumb clearfix">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>Contact Us</li>
			</ul>
		</div>
	</div>
</section> -->
<section class="page-title1">
   <div class="auto-container1">
      <div class="inner-container1 clearfix">
       <ul class="bread-crumb1 clearfix">
	   		<li><a href="<?php echo base_url(); ?>">Home</a></li>
			<li>Contact Us</li>
        </ul>
      </div>
   </div>
</section> 
<!--End Page Title-->


<section class="contact-section style-two">
	<div class="auto-container">
		<div class="row">
			<!-- Form Column -->
			<div class="form-column col-lg-8 col-md-6 col-sm-12">
				<div class="inner-column">
					<div class="title-box">
						<span class="title">How To</span>
						<h2>Contact Us</h2>
						<div class="text">Don’t Hesitate to Contact with us for any kind of information</div>
					</div>

					<!-- Contact Form -->
					<div class="contact-form">
						<?php echo form_open_multipart(site_url()."contactus/contactusform",' id="contact-form" class="validate"');?>
							<div class="form-group">
								<input type="text" name="customername" id="customername" placeholder="Name" required="required" onkeypress="return alphaOnly(event)">
							</div>

							<div class="form-group">
								<input type="email" name="emailid" id="emailid" placeholder="Email" required="required">
							</div>

							<div class="form-group">
								<input type="text" name="phonenumber" id="phonenumber" minlength="7" maxlength="10"  placeholder="Mobile No" required="required" onkeypress="return isNumber(event)">
							</div>
	
							<div class="form-group">
								<input type="text" name="subject" id="subject" placeholder="Subject" required="required" onkeypress="return alphaOnly(event)">
							</div>

							<div class="form-group">
								<textarea id="yourmessage"  name="yourmessage" placeholder="Your Message*" required="required"></textarea>
							</div>

							<div class="form-group">
								<button class="theme-btn btn-style-one" type="submit" type="submit" name="contact_submit" id="contact_submit">Send Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Info Column -->
			<div class="info-column col-lg-4 col-md-6 col-sm-12">
				<div class="inner-column">
					<!-- Info Box -->
					<div class="contact-info-box">
						<div class="inner-box">
							<span class="icon la la-phone"></span>
							<h4>Phones</h4>
							<ul>
								<li><?php echo $contactus->mobile; ?></li>
								<li><?php echo $contactus->landline; ?></li>
							</ul>
						</div>
					</div>

					<!-- Info Box -->
					<div class="contact-info-box">
						<div class="inner-box">
							<span class="icon la la-envelope-o"></span>
							<h4>Emails</h4>
							<ul>
								<li><?php echo $contactus->emailid; ?></li>
								<li><?php echo $contactus->alt_emailid; ?></li>
							</ul>
						</div>
					</div>

					<!-- Info Box -->
					<div class="contact-info-box">
						<div class="inner-box">
							<span class="icon la la-globe"></span>
							<h4>Address</h4>
							<ul>
								<li><?php echo $contactus->address; ?></li>
							</ul>
						</div>
					</div>

					<!-- Info Box -->
					<div class="contact-info-box follow-us">
						<div class="inner-box">
							<h4>Follow Us:</h4>
							<ul class="social-icon-three">
								<li><a href="<?php echo FACEBOOKWEBLINK; ?>"><span class="la la-facebook-f"></span></a></li>
								<li><a href="<?php echo TWITTERWEBLINK; ?>"><span class="la la-twitter"></span></a></li>
								<li><a href="<?php echo GOOGLEWEBLINK; ?>"><span class="la la-google-plus"></span></a></li>
								<li><a href="<?php echo LINKEDWEBLINK; ?>"><span class="la la-dribbble"></span></a></li>
								<li><a href="<?php echo LINKEDWEBLINK; ?>"><span class="la la-pinterest"></span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


