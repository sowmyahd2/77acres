<style>
@media only screen and (max-width: 680px) {
	.theme-btn {
    width: 100%;
    margin-bottom: 10px;
}
.property-block .property-info li {
    position: relative;
    float: left;
    width: 100%;
     padding-left: 10px; 
    font-size: 14px;
    line-height: 45px;
    color: #777777;
    cursor: default;
    font-weight: 400;
}
.property-block .lower-content{
	padding-bottom:0px;
	padding-top:0px;
}
.option-box{
	padding:0px;
}
}
</style>
<section class="page-title1">
   <div class="auto-container1">
      <div class="inner-container1 clearfix">
       <ul class="bread-crumb1 clearfix">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><?php echo $product->protype;?> My Properties</li>
         </ul>
      </div>
   </div>
</section> 
<div class="dashboard">
	<div class="container-fluid">
		<div class="content-area">
			<div class="dashboard-content">
				<div class="row">
					<div class="column col-lg-12">
						<form id="search-form" method="post" class="property_filter_input" action="<?php echo base_url('property/mypropertysearch'); ?>">  
							<div class="row">
							<div class="col-lg-2 col-sm-6 p-tb8">
								<?php  
								$propertytype[''] = "Type";
								$op=array("buy","rent"); 
								?>
								<select id="propertytype"  name="propertytype" data-placeholder="Choose a Property Type..." class="form-control" tabindex="2"'>
								<option value="type"> Type</option>
								<?php  foreach ($option as  $value) { ?>
								<option value ="<?php echo $value->id?>"><?php echo $value->protype?></option>
								<?php } ?>
								</select>
							</div>
							<div class="col-lg-2 col-sm-4 se_topsa">
							<input type="submit" name="search" value="Search" class="theme-btn btn-style-four w-100 text-center">
							</div>
						</div>
					</form>
               
			<div class="properties-box">
				<div class="title">
					<h3>My Properties List</h3>
				</div>
				<div class="inner-container">
				<?php 
                if(is_array($buyproducts) && count($buyproducts)){
                $pro=0; foreach ($buyproducts as $key => $buyproducts) { 
                $url_statename = !empty($buyproducts->sname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$buyproducts->sname):"nill";
                $url_cityname = !empty($buyproducts->cname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$buyproducts->cname):"nill";
                if($buyproducts-> image!='' && file_exists('./uploads/products/'.$buyproducts->image)) $src = base_url().'uploads/products/'.$buyproducts->image; else $src = base_url(IMAGES).'/no-image-available.png';
                ?>
                
								<!-- Property Block -->
								<div class="property-block">
									<div class="inner-box clearfix">
										<div class="row clearfix">
											<div class="column col-xl-3 col-lg-12 col-md-12 col-sm-12">
												<div class="image-box">
												 <div class="single-item-carousel owl-carousel owl-theme">
													<?php
													$rimgcount = 1;
													$imga = array('image','image1','image2','image3','image4');
													foreach ($imga as $eimg) { 
														if($buyproducts-> $eimg!='' && file_exists('./uploads/products/'.$buyproducts->$eimg)){
														$src = base_url().'uploads/products/'.$buyproducts->$eimg;
														?><figure class="image"><img src="<?php echo $src; ?>" alt="" class="imagesnwe1"></figure><?php
														} else if($rimgcount==1){
															$src = base_url(IMAGES).'/no-image-available.png';
															?><figure class="image"><img src="<?php echo $src; ?>" alt="" class="imagesnwe1"></figure><?php
														}
													?>
													
													<?php $rimgcount++; } ?>
												</div>
												
											  <span class="for  new_buycode"><?php echo strtoupper($buyproducts->protype); ?></span>
                                 <?php echo ($buyproducts->feature=="YES")?"<span class='featured'>FEATURED</span>":""; ?>
                                  
				<ul style="position: absolute;
				bottom: 30px;
				width: 100%;
				padding: 0;
				z-index: 99;background:#F5F5F;">
				<li style="bottom:-10px; float:right;margin-top:20px;position:relative;color:#ffffff;padding:0px 5px 0px 5px !important"> &#8377;<?php echo price_format($buyproducts->priceper)."/". $buyproducts->areatype;?></li>
				<li style="left:-180px;bottom:0px;color:#ffffff;padding:0px 5px 0px 5px !important">PRICE</li>
				<?php 
				$this->db->from('product_specification');
				$this->db->where('product_id',$buyproducts->id);
				$this->db->where('spec_id',35);
				$query = $this->db->get()->row();
				?>
				<li style="left:-167px;bottom:0px;color:#ffffff;padding:0px 5px 0px 5px !important"> &#8377; <?php echo price_format($buyproducts->price);?> </li>
				<li style="left:-180px;bottom:0px;color:#ffffff;padding:0px 5px 0px 5px !important">Total Area</li>
				<li style="left:-167px;bottom:0px;color:#ffffff;padding:0px 5px 0px 5px !important"> <?php echo price_format($buyproducts->totalarea)."".$buyproducts->areatype;?> </li>

				</ul>

												</div>
												
											</div>

											<div class="column col-xl-7 col-lg-12 col-md-12 col-sm-12">
												<div class="lower-content">
												<ul class="tags">
													<a href="<?php echo  site_url('property/type/'.$buyproducts->protype.'/'.$buyproducts->url_name)?>"><?php echo $buyproducts->subcat;?>,</a>
													<a href="<?php echo  site_url('property/type/'.$buyproducts->protype.'/'.$buyproducts->url_name)?>"><?php echo $buyproducts->catagory;?></a>
													
												</ul>
													<h3><a href="<?php echo site_url('property/overview/').$buyproducts->id.'/'.$url_statename.'/'.$url_cityname.'/'.$buyproducts->sku_id;?>"><?php echo $buyproducts->name;?></a></h3>
													<div class="lucation"><i class="la la-map-marker"></i> 

														<?php
														$proaddress = "";
		                     
		                  
		                     $proaddress .= ($buyproducts->aname)?$buyproducts->aname.", ":'';
		                        $proaddress .= ($buyproducts->landmark)?$buyproducts->landmark.", ":'';
		                         $proaddress .= ($buyproducts->cname)?$buyproducts->cname.", ":'';
		                  
		                     $proaddress .= ($buyproducts->sname)?$buyproducts->sname."-":'';
		                    
		                      $proaddress .= ($buyproducts->pincode)?$buyproducts->pincode.", ":'';
														 echo rtrim($proaddress,', ');
														 ?></div>
														<a href="<?php echo site_url('property/overview/').$buyproducts->id.'/'.$url_statename.'/'.$url_cityname.'/'.$buyproducts->sku_id;?>"><input type="button" data-id="<?php echo $products->id;?>" class="theme-btn btn-style-one" value="MORE  DETAIL">
												</a>	
						
												</div>
											</div>

											<div class="column col-xl-2 col-lg-12 col-md-12 col-sm-12">
												<div class="option-box">
													<div class="posted-date"><span>Posted Date:</span> <?php echo date("d-m-Y", strtotime($buyproducts->last_updated));?></div>
													<ul class="action-list">
													
														<a href="<?php echo base_url('property/edit/'.$buyproducts->id.'/'.$buyproducts->sku_id); ?>" data-id="<?php echo $buyproducts->id;?>"><i class="la la-edit"></i> Edit</a>
														<?php if($buyproducts->status == 0)
														{ ?>
													<a href="<?php echo base_url('property/changestatus/'.$buyproducts->id.'/'.$buyproducts->sku_id.'/1'); ?>"><i class="la la-eye-slash"></i>Un Hide</a>
													<?php } else { ?>
												<a href="<?php echo base_url('property/changestatus/'.$buyproducts->id.'/'.$buyproducts->sku_id.'/0'); ?>"><i class="la la-eye-slash"></i> Hide</a>
													<?php } if($buyproducts->status == 1)
														{ ?>
													<a href="<?php echo base_url('property/deletepro/'.$buyproducts->id.'/'.$buyproducts->sku_id.'/2'); ?>" onclick="return confirm('Are you sure to delete')"><i class="la la-trash-o"></i> Delete</a>
													<?php } ?>
													</ul>
												</div>
												
											</div>
										</div>
										
									</div>
									
								</div>
				 <?php } $pro++; } else {
                    ?>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                    <div class="card col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <center><img src="<?php echo base_url('uploads/products/english.svg'); ?>"></center>
                    </div>
                    </div>
                    <?php
                } ?>				
							

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
