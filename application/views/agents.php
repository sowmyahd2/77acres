<!--Page Title-->
<section class="page-title" style="background-image:url(<?php echo base_url(IMAGES); ?>/fixed-slider.png);">
	<div class="auto-container">
		<div class="inner-container clearfix">
			<h1>RB Consultants</h1>
			<ul class="bread-crumb clearfix">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>RB Consultants</li>
			</ul>
		</div>
	</div>
</section>
<!--End Page Title-->


<section class="property-section m-tb50">
	<div class="auto-container">
	<div class="row">
		<div class="sec-title col-md-6">
			<span class="title">MEET OUR</span>
			<h2>RB Consultants</h2>
		</div>
		<div class="col-md-6 ond ondss">
		<div class="subscribe-form">
		<form method="post" action="">
                     <div class="form-group">
                        <input type="email" name="email" value="" placeholder="Search by Area or Name" required="">
                        <button type="submit" class="theme-btn btn-style-four">Search</button>
                     </div>
                  </form>
		</div></div>
		</div>


		<div class="row team-all padding">
			<?php 
            if(is_array($dealers) && count($dealers)){
            foreach ($dealers as $key => $dealers) { ?>
			<div class="col-lg-3 col-md-6 team-pro hover-effect">
				<div class="team-wrap">
					<div class="team-img">
					    
					    <?php   if($dealers-> image!='' && file_exists('./uploads/regusers/'.$dealers->image)) $src = base_url().'uploads/regusers/'.$dealers->image; else $src = base_url(IMAGES).'/no-image-available.png'; ?>
					   
						<img src="<?php echo base_url('uploads/regusers');?>/<?php echo !empty($dealers->image)?$dealers->image:"dummy_agent.jpg";?>" alt="">
					</div>
					<div class="team-content">
						<div class="team-info">
							<h3><?php echo ucfirst($dealers->fname);?> <?php echo ucfirst($dealers->lname);?></h3>
							<p>RB Consultant</p>
							<span><a href="<?php echo base_url('agents/details/').preg_replace('/[^a-zA-Z0-9\-]/', '-',$dealers->fname).'/'.$dealers->id; ?>" class="">View Profile</a></span>
						</div>
					</div>
				</div>
			</div>
			<?php } } else {
				?>
				<div class="col-lg-12 col-md-12 team-pro hover-effect" align="center"><img src="<?php echo base_url(IMAGES)."/no-record-found.png"; ?>"></div>
				<?php
			} ?>
			
		</div>
	</div>
</section>
