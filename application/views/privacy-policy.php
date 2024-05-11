
<!--Page Title-->
<section class="page-title" style="background-image:url(<?php echo base_url(IMAGES); ?>/fixed-slider.png);">
	<div class="auto-container">
		<div class="inner-container clearfix">
			<h1>Privacy Policy</h1>
			<ul class="bread-crumb clearfix">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>Privacy Policy</li>
			</ul>
		</div>
	</div>
</section>
<!--End Page Title-->

<?php if(is_array($privacy) && count($privacy)){
    foreach ($privacy as $key => $privacy) { ?>
    <section class="at-plan-sec m-tb10">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div>
					<!-- Title Column -->
					<div class="title-column m-tb20">
						<h2><b><?php echo $privacy->name?></b></h2>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php echo $privacy->description?>
			</div>
		</div>

	</div>
</section>
    <?php
    }  
} ?>


