<!--Page Title-->
<section class="page-title" style="background-image:url(<?php echo base_url(IMAGES); ?>/fixed-slider.png);">
	<div class="auto-container">
		<div class="inner-container clearfix">
			<h1>RB Consultant</h1>
			<ul class="bread-crumb clearfix">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>Details</li>
			</ul>
		</div>
	</div>
</section>
<!--End Page Title-->


<section class="inner-pages m-tb50">
	<div class="auto-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="agent agent-row shadow-hover">
					<a href="#" class="agent-img">
						<div class="img-fade"></div>
						<div class="button alt agent-tag"><?php echo $propertyCount; ?> Properties</div>
						<img src="<?php echo base_url('uploads/regusers');?>/<?php echo !empty($dealers->image)?$dealers->image:"dummy_agent.jpg";?>" alt="">
					</a>
					<div class="agent-content">
						<div class="agent-details">
						<?php if($this -> session -> userdata('user')){ ?>	
							<h4><a href="#"><?php echo ucfirst($dealers->fname);?> <?php echo ucfirst($dealers->lname);?></a></h4>
							<p><i class="la la-tag icon"></i>Selling Agent</p>
							<p><i class="la la-envelope icon"></i><?php echo $dealers->email;?></p>
							<p><i class="la la-phone icon"></i><?php echo $dealers->phone;?></p>
						<?php } else { ?>
							<h4><a href="#">
								<?php 
								$delarName = ucfirst($dealers->fname);?> <?php echo ucfirst($dealers->lname);
								echo maskUserData($delarName);
								?>
									
							</a></h4>
							<p><i class="la la-tag icon"></i>Selling Agent</p>
							<p><i class="la la-envelope icon"></i><?php echo maskUserData($dealers->email);?></p>
							<p><i class="la la-phone icon"></i><?php echo maskUserData($dealers->phone);?></p>
						<?php } ?>
						</div>
						<div class="agent-text">
							<p><?php echo maskUserData($dealers->address1);?></p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php if(is_array($products) && count($products)){ ?>
<!-- Recent Section -->
<section class="property-section m-tb50">
	<div class="auto-container">
		<div class="sec-title">
			<span class="title">ASSIGNED</span>
			<h2>PROPERTIES</h2>
		</div>

		<div class="row">
			<!-- Property Block -->
<?php 
foreach ($products as $key => $products) { 
$url_statename = !empty($products->sname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$products->sname):"nill";
$url_cityname = !empty($products->cname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$products->cname):"nill";
?>
			<div class="property-block col-lg-3 col-md-6 col-sm-12">
				<div class="inner-box">
					<div class="image-box">
						<div class="single-item-carousel owl-carousel owl-theme">
							<?php
                     $imga = array('image','image1','image2','image3','image4','image5','image6','image7','image8','image9','image10');
                     $fim = 1;
                     foreach ($imga as $eimg) { 
                         if($products-> $eimg!='' && file_exists('./uploads/products/'.$products->$eimg)){
                           $src = base_url().'uploads/products/'.$products->$eimg;
                           ?><figure class="image"><img src="<?php echo $src; ?>" alt=""></figure><?php
                           } else if($fim==1){
                              $src = base_url(IMAGES).'/no-image-available.png';
                               ?><figure class="image"><img src="<?php echo $src; ?>" alt=""></figure><?php
                           }
                        $fim++; } ?>
							
						</div>
						<span class="for">FOR <?php echo strtoupper($products->protype); ?></span>
						<?php echo ($products->feature=="YES")?"<span class='featured'>FEATURED</span>":""; ?>
						<ul class="info clearfix">
							<li><a href="">&#8377; <?php echo price_format($products->price);?></a></li>
						</ul>
					</div>
					<div class="lower-content">
						<ul class="tags">
							<li><a href="<?php echo site_url('property/overview/').$products->url_name.'/'.$url_statename.'/'.$url_cityname.'/'.$products->sku_id;?>"><?php echo $products->catagory;?></a></li>
							<li><a href="<?php echo site_url('property/overview/').$products->url_name.'/'.$url_statename.'/'.$url_cityname.'/'.$products->sku_id;?>"><?php echo $products->subcat;?></a></li>
						</ul>
						<h3><a href="<?php echo site_url('property/overview/').$products->url_name.'/'.$url_statename.'/'.$url_cityname.'/'.$products->sku_id;?>"><?php echo $products->name;?></a></h3>
						<div class="lucation"><i class="la la-map-marker"></i> <?php echo ucfirst($products->sname).", ".ucfirst($products->cname);?></div>

						<div class="property-price clearfix">
							<div class="read-more"><a href="<?php echo site_url('property/overview/').$products->url_name.'/'.$url_statename.'/'.$url_cityname.'/'.$products->sku_id;?>" class="theme-btn">More Detail</a></div>
							<div class="price"><a class="propertyenqbutton" data-id="<?php echo $products->id;?>">Call</a></div>
						</div>
					</div>
				</div>
			</div>
<?php } ?>
			


		</div>

		<!-- <div class="load-more-btn text-center">
			<a href="#" class="theme-btn btn-style-four">Load More</a>
		</div> -->
	</div>
</section>
<!--End Property Section -->
<?php } ?>