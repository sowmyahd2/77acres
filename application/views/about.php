<!--Page Title-->
<!-- <section class="page-title" style="background-image:url(<?php echo base_url(IMAGES); ?>/fixed-slider.png);">
	<div class="auto-container">
		<div class="inner-container clearfix">
			<h1>About Us</h1>
			<ul class="bread-crumb clearfix">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>About Us</li>
			</ul>
		</div>
	</div>
</section> -->
<section class="page-title1">
   <div class="auto-container1">
      <div class="inner-container1 clearfix">
       <ul class="bread-crumb1 clearfix">
		<li><a href="<?php echo base_url(); ?>">Home</a></li>
		<li>About Us</li>
        </ul>
      </div>
   </div>
</section> 
<!--End Page Title-->

<!-- About start from here -->
<section class="m-t50">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-12">
				<div class="at-about-col at-col-default-mar">
					<!-- Title Column -->
					<!-- <div class="title-column">
						<div class="sec-title">
							<span class="title">RB GROUP</span>
							<h2>About Us</h2>
						</div>
					</div> -->
					<div class=" tt_p">
					<?php if(is_array($aboutus) && count($aboutus)){
    				foreach ($aboutus as $key => $aboutus) { ?>
					<p class="text-justify"><?php echo $aboutus->description; ?></p> <br>
					<?php } } ?>
					</div>
				</div>
			</div>
			<div class="col-lg-5 hidden-md">
				<div class="">
					<img src="<?php echo base_url(IMAGES); ?>/person.png" alt="">
				</div>
			</div>
		</div>
	</div>
</section>
<!-- About End -->

<!-- Call start from here -->
<section class="at-Call-sec jarallax at-over-layer-black">
	<div class="at-Call-both-side clearfix">
		<div class="at-Call-left">
			<div class="at-inside-Call">
				<h5>BOOK YOUR</h5>
				<h2>APPARTMENT OR HOUSE</h2>
			</div>
		</div>
		<div class="at-Call-right">
			<div class="at-Call-right-inside">
				<h2>we are ready to receive your call</h2>
				<div class="at-short-line"></div>
				<h3>CALL US : <span><?php echo $contactus->mobile; ?></span></h3>
			</div>
		</div>
	</div>
</section>
<!-- Call End -->


<!-- Why choose us section Start -->

<section class="at-plan-sec m-tb50">
	<div class="container">
		<?php if(is_array($whychooseus) && count($whychooseus)){
		foreach ($whychooseus as $key => $whychooseus) { 
		if($whychooseus-> image!='' && file_exists('./uploads/pages/'.$whychooseus->image)) $src = base_url().'uploads/pages/'.$whychooseus->image; else $src = base_url(IMAGES).'/fixed-slider.png'; ?>
		<div class="row">
			<div class="col-md-6">
				<div class="m-b30">
					<!-- Title Column -->
					<div class="title-column">
						<div class="sec-title">
							<h2>Why Choose Us</h2>
						</div>
					</div>
					<p class="text-justify"><?php echo $whychooseus->name; ?></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="at-plan-box at-col-default-mar">
					<?php echo $whychooseus->description; ?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="at-col-default-mar">
					<img src="<?php echo $src; ?>" alt="">
				</div>
			</div>
		</div>
		<?php } } ?>
	</div>
</section>
<!-- Why Choose Us section end -->


<!-- App section Start -->
<section class="app-section" style="background-image: url(<?php echo base_url(IMAGES); ?>/17.jpg);">
	<div class="auto-container">
		<div class="row">
			<!-- Image Box -->
			<div class="image-column order-last col-lg-5 col-md-12 col-sm-12">
				<div class="inner-column">
					<div class="image-box">
						<figure class="image"><img src="<?php echo base_url(IMAGES); ?>/image-6.png" alt=""></figure>
					</div>
				</div>
			</div>

			<!-- Content Box -->
			<div class="content-column col-lg-7 col-md-12 col-sm-12">
				<div class="inner-column">
					<h2>Property Find On Your <br>Finger Tip</h2>
					<div class="text">consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </div>
					<div class="link-box">
						<a href="#"><img src="<?php echo base_url(IMAGES); ?>/app-store.png" alt=""></a>
						<a href="#"><img src="<?php echo base_url(IMAGES); ?>/google-play.png" alt=""></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- App section end -->


<!--Clients Section-->
<!--<section class="clients-section style-two alternate">
	<div class="auto-container">
		<div class="sponsors-outer">
			<!--Sponsors Carousel
			 <ul class="sponsors-carousel owl-carousel owl-theme">
				<li class="slide-item">
					<figure class="image-box"><a href="#"><img src="https://via.placeholder.com/200x60?text=LOGO" alt="logo" alt=""></a></figure>
				</li>
				<li class="slide-item">
					<figure class="image-box"><a href="#"><img src="https://via.placeholder.com/200x60?text=LOGO" alt="logo" alt=""></a></figure>
				</li>
				<li class="slide-item">
					<figure class="image-box"><a href="#"><img src="https://via.placeholder.com/200x60?text=LOGO" alt="logo" alt=""></a></figure>
				</li>
				<li class="slide-item">
					<figure class="image-box"><a href="#"><img src="https://via.placeholder.com/200x60?text=LOGO" alt="logo" alt=""></a></figure>
				</li>
				<li class="slide-item">
					<figure class="image-box"><a href="#"><img src="https://via.placeholder.com/200x60?text=LOGO" alt="logo" alt=""></a></figure>
				</li>
				<li class="slide-item">
					<figure class="image-box"><a href="#"><img src="https://via.placeholder.com/200x60?text=LOGO" alt="logo" alt=""></a></figure>
				</li>
				<li class="slide-item">
					<figure class="image-box"><a href="#"><img src="https://via.placeholder.com/200x60?text=LOGO" alt="logo" alt=""></a></figure>
				</li>
				<li class="slide-item">
					<figure class="image-box"><a href="#"><img src="https://via.placeholder.com/200x60?text=LOGO" alt="logo" alt=""></a></figure>
				</li>
			</ul>
		</div> 
	</div>
</section>-->
<!--End Clients Section
