
<!--Page Title-->
<section class="page-title" style="background-image:url(<?php echo base_url(IMAGES); ?>/fixed-slider.png);">
	<div class="auto-container">
		<div class="inner-container clearfix">
			<h1>Terms &amp; Conditions</h1>
			<ul class="bread-crumb clearfix">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>Terms &amp; Conditions</li>
			</ul>
		</div>
	</div>
</section>
<!--End Page Title-->



<?php if(is_array($terms_condition) && count($terms_condition)){
    foreach ($terms_condition as $key => $terms_condition) { ?>
    <section class="at-plan-sec m-tb10">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div>
					<!-- Title Column -->
					<div class="title-column m-tb20">
						<h2><b><?php echo $terms_condition->name?></b></h2>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php echo $terms_condition->description?>
			</div>
		</div>

	</div>
</section>
    <?php
    }  
} ?>

