<!--Page Title-->
<style>
   body{
      color:"black";
   }
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
}
</style>
<section class="page-title" style="background-image:url(<?php echo base_url(IMAGES); ?>/fixed-slider.png);">
   <div class="auto-container">
      <div class="inner-container clearfix">
         <h1><?php echo ucfirst($protype); ?> Search Property</h1>
         <ul class="bread-crumb clearfix">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><?php echo ucfirst($protype); ?> Search Property</li>
         </ul>
      </div>
   </div>
</section>
<!--End Page Title-->
<!-- Property Search Section -->
<section class="property-search-section">
   <div class="auto-container">
      <div class="property-search-tabs tabs-box">
         <ul class="tab-buttons">
            <li data-tab="#buy" class="tab-btn active-btn">Search More Properties</li>
         </ul>
         <div class="tabs-content">
            <!--Tab / Active Tab-->
              <form id="search-form" method="post" class="property_filter_input" action="<?php echo base_url('property/'.$search); ?>">  
               
                  <div class="row">
                     <div class="col-lg-2 col-sm-6 p-tb8">
                        <?php  
                    $propertytype[''] = "Type"; ?>
                
                       <select id="propertytype" name="propertytype" data-placeholder="Choose a Property Type..." class="form-control" tabindex="2"'>
                        <option value="type"> Type</option>
                <?php  foreach ($option as  $value) { ?>
                <option value ="<?php echo $value->id?>"><?php echo $value->protype?></option>
                <?php } ?>
                    </select>
                     </div>
                     
                 
                     <div class="col-lg-2 col-sm-4 se_topsa">
                        <input type="submit" name="search" value="Search" class="theme-btn btn-style-four w-100 text-center">
                        <!-- <a href="search-property.php" >Search</a> -->
                     </div>
                  </div>
               </form>
            <!--Tab -->
            <div id="mySidenav" class="sidenav">
               <!-- Categories -->
               <div class="sidebar-widget search-properties">
                  <div class="property-search-form style-three">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="la la-times"></i></a>
                   	  <div class="property_search_form m-b30 p-4 m-t30 bg_white">
             
            </div>
                  </div>
                  <!-- End Form -->
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End Property Search Section -->
<div class="sidebar-page-container">
   <div class="auto-container">
      <div class="row clearfix">
         <!--Content Side-->
         <?php if(is_array($products) && count($products)){ 
         $proadsdiv = "col-lg-12";
         if(is_array($propertyads) && count($propertyads)){
         ?>
         <div class="content-side main-left col-lg-3 col-md-12 col-sm-12">
            <section class="popular-places-section">
               <div class="auto-container">
                  <div class="masonry-items-container clearfix">
                     <!-- Portfolio Item -->
                     <?php 
                        foreach ($propertyads as $key => $propertyads) { 
                        if($propertyads-> image!='' && file_exists('./uploads/property_ads/'.$propertyads->image)) $src = base_url().'uploads/property_ads/'.$propertyads->image; else $src = base_url(IMAGES).'/ads.jpg';
                        ?>
                     <div class="popular-item masonry-item small-item">
                        <div class="image-box">
                           <figure class="image"><img src="<?php echo $src; ?>" alt=""></figure>
                           <div class="info-box">
                              <span class="category"><?php echo $propertyads->subcat;?> <?php echo $propertyads->catagory;?></span>
                              <h3 class="place"><a href=""><?php echo $propertyads->name;?></a></h3>
                              <div class="properties"><a href="<?php echo base_url('property/type/'.strtolower($propertyads->protype)); ?>"><?php echo $propertyads->qty;?> Properties</a></div>
                              <div class="view-all"><a href="<?php echo base_url('property/type/'.strtolower($propertyads->protype)); ?>">View All</a></div>
                           </div>
                        </div>
                     </div>
                     <?php  } ?>
                  </div>
               </div>
            </section>
         </div>
         <?php $proadsdiv = "col-lg-9"; } ?>
         <div class="content-side <?php echo $proadsdiv; ?> col-md-12 col-sm-12">
            <div class="property-list-view">
               <div class="upper-box clearfix">
                  <div class="sec-title">
                     <!-- <span class="title">FIND YOUR HOUSE IN YOUR CITY</span> -->
                     <h3><?php echo ucfirst($protype); ?> </h3>
                  </div>
               </div>
               <!-- Property Block -->
               <div id="filtercontent">
                  <?php 
                     $pro=0; foreach ($products as $key => $products) { 
                     $url_statename = !empty($products->sname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$products->sname):"nill";
                     $url_cityname = !empty($products->cname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$products->cname):"nill";
                     if($products-> image!='' && file_exists('./uploads/products/'.$products->image)) $src = base_url().'uploads/products/'.$products->image; else $src = base_url(IMAGES).'/dummy.png';
                     ?>
                  <div class="property-block">
                     <div class="inner-box">
                        <div class="row clearfix">
                           <div class="column col-xl-4 col-lg-12 col-md-12 col-sm-12">
                              <div class="image-box">
                                 <figure class="image"><img src="<?php echo $src;?>" alt="<?php echo $products->name;?>" class="imagesnwe"></figure>
                                 <span class="for  new_buycode"><?php echo strtoupper($products->protype); ?></span>
                                 <?php echo ($products->feature=="YES")?"<span class='featured'>FEATURED</span>":""; ?>
                                        
                                <ul style="position: absolute;
    bottom: 30px;
    width: 100%;
    padding: 0;
    z-index: 99;background:#F5F5F;">
                                      
                                      
                                       <li style="bottom:-10px; float:right;margin-top:20px;position:relative;color:#ffffff;padding:0px 5px 0px 5px !important"> &#8377;<?php echo price_format($products->priceper)."/". $products->areatype;?></li>
                                        <li style="left:-180px;bottom:0px;color:#ffffff;padding:0px 5px 0px 5px !important">PRICE</li>
                                        
                                        <?php 
                                                         
                                        $this->db->from('product_specification');
                                        $this->db->where('product_id',$products->id);
                                        $this->db->where('spec_id',35);
                                        $query = $this->db->get()->row();
                                        ?>
                                     <li style="left:-167px;bottom:0px;color:#ffffff;padding:0px 5px 0px 5px !important"> &#8377; <?php echo price_format($products->price);?> </li>
                                      <li style="left:-180px;bottom:0px;color:#ffffff;padding:0px 5px 0px 5px !important">Total Area</li>
                                  <li style="left:-167px;bottom:0px;color:#ffffff;padding:0px 5px 0px 5px !important"> <?php echo price_format($products->totalarea)." ".$products->areatype;?> </li>
                                  
                                  </ul>
                              </div>
                           </div>
                           <div class="column col-xl-8 col-lg-12 col-md-12 col-sm-12">
                              <div class="lower-content">
                              <ul class="tags">
                      <a href="<?php echo  site_url('property/type/'.$products->protype.'/'.$products->url_name)?>"><?php echo $products->subcat;?>,</a>
                     <a href="<?php echo  site_url('property/type/'.$products->protype.'/'.$products->url_name)?>"><?php echo $products->catagory;?></a>
                    
                  </ul>
													<h3><a href="<?php echo site_url('property/overview/').$products->id.'/'.$url_statename.'/'.$url_cityname.'/'.$products->sku_id;?>"><?php echo $products->name;?></a></h3> <div class="column col-xl-7 col-lg-12 col-md-12 col-sm-12">
												<div class="content-box">
                          	
													
													<div class="location"><i class="la la-map-marker"></i> 

														<?php
														$proaddress = "";
		                     
		                  
		                     $proaddress .= ($products->aname)?$products->aname.", ":'';
		                        $proaddress .= ($products->landmark)?$products->landmark.", ":'';
		                         $proaddress .= ($products->cname)?$products->cname.", ":'';
		                  
		                     $proaddress .= ($products->sname)?$products->sname."-":'';
		                    
		                      $proaddress .= ($products->pincode)?$products->pincode.", ":'';
														 echo rtrim($proaddress,', ');
														 ?></div>
									
													<div class="form-group">
												<!--	<input type="button" data-id="<?php echo $products->id;?>" class="theme-btn btn-style-one propertyenqbutton" value="Enquire Now">
												-->	<!-- <a class=" "  ></a>  -->
													</div>
												</div>
											</div>
                                 
                                 <div class="property-price clearfix">
                                    <div class="read-more"><a href="<?php echo site_url('property/overview/').$products->id.'/'.$url_statename.'/'.$url_cityname.'/'.$products->sku_id;?>" class="theme-btn">More Detail</a></div>
                                    <div class="price"><a class="propertyenqbutton" data-id="<?php echo $products->id;?>">Call</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="option-box">
													<div class="posted-date"><span>Posted Date:</span> <?php echo date("d-m-Y", strtotime($products->last_updated));?></div>
													<ul class="action-list">
													
														<a href="<?php echo base_url('property/edit/'.$products->id.'/'.$products->sku_id); ?>" data-id="<?php echo $products->id;?>"><i class="la la-edit"></i> Edit</a>
														<?php if($products->status == 0)
														{ ?>
													<a href="<?php echo base_url('property/changestatus/'.$products->id.'/'.$products->sku_id.'/1'); ?>"><i class="la la-eye-slash"></i>Un Hide</a>
													<?php } else { ?>
												<a href="<?php echo base_url('property/changestatus/'.$products->id.'/'.$products->sku_id.'/0'); ?>"><i class="la la-eye-slash"></i> Hide</a>
													<?php } if($products->status == 1)
														{ ?>
													<a href="<?php echo base_url('property/deletepro/'.$products->id.'/'.$products->sku_id.'/2'); ?>" onclick="return confirm('Are you sure to delete')"><i class="la la-trash-o"></i> Delete</a>
													<?php } ?>
													</ul>
												</div>
                  </div>
                     </div>
                     <div class="column col-xl-2 col-lg-12 col-md-12 col-sm-12">
											
                  </div>
                  
                  <?php } ?>
                  <!-- Pagination -->
                  <!-- <div class="styled-pagination">
                     <ul class="clearfix">
                        <li class="prev"><a href="#"><span>Prev</span></a></li>
                        <li><a href="#"><span>1</span></a></li>
                        <li class="active"><a href="#"><span>2</span></a></li>
                        <li><a href="#"><span>3</span></a></li>
                        <li><a href="#"><span>4</span></a></li>
                        <li class="next"><a href="#"><span>Next</span></a></li>
                     </ul>
                     </div> -->
               </div>
               
            </div>
            
            <!--Sidebar Side-->
            <?php } else { ?>
            <div class="content-side col-lg-9 col-md-12 col-sm-12">
               <div class="property-list-view">
                  <div class="property-block">
                     <div class="inner-box">
                        <div class="row clearfix">
                           <div class="column col-xl-12 col-lg-12 col-md-12 col-sm-12">
                              <img src="<?php echo base_url(IMAGES); ?>/noProperty.png" width="100%">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php } ?>
         </div>
      </div>
      
   </div>
</div>
      
<?php if(is_array($featuredproduct) && count($featuredproduct)){ ?>
<div class="">
   <div class="auto-container">
      <div class="sec-title">
         <span class="title">CHECK OUR LATEST PROPERTIES</span>
         <h2>OTHER PROPERTIES</h2>
      </div>
      <div class="Modern-Slider">
<?php 
foreach ($featuredproduct as $key => $featuredproduct) { 
$url_statename = !empty($featuredproduct->sname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$featuredproduct->sname):"nill";
$url_cityname = !empty($featuredproduct->cname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$featuredproduct->cname):"nill";
?>
         <div class="item"> 
            <div class="img-fill inner-boxsh">
               <div id="demo" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ul class="carousel-indicators">
                     <?php
                     $imga = array('image','image1','image2','image3','image4','image5','image6','image7','image8','image9','image10');
                     $fims = 1;
                     foreach ($imga as $eimg) { 
                        if($featuredproduct-> $eimg!='' && file_exists('./uploads/products/'.$featuredproduct->$eimg)){
                           $src = base_url().'uploads/products/'.$featuredproduct->$eimg;
                     ?>
                     <li data-target="#demo<?php echo $featuredproduct->sname; ?>" data-slide-to="<?php echo $fims;?>" class="<?php echo ($fims==1)?'active':''; ?>"></li>
                     <?php $fims++; } } ?>
                  </ul>
                  <!-- The slideshow -->
                  <div class="carousel-inner">
                     <?php
                     $imga = array('image','image1','image2','image3','image4','image5','image6','image7','image8','image9','image10');
                     $fim = 1;
                     foreach ($imga as $eimg) { 
                         if($featuredproduct-> $eimg!='' && file_exists('./uploads/products/'.$featuredproduct->$eimg)){
                           $src = base_url().'uploads/products/'.$featuredproduct->$eimg;
                           ?><div class="carousel-item <?php echo ($fim==1)?'active inu_imgs':''; ?>">
                                 <img src="<?php echo $src; ?>" >
                              </div><?php
                           } else if($fim==1){
                              $src = base_url(IMAGES).'/no-image-available.png';
                               ?><div class="carousel-item <?php echo ($fim==1)?'active inu_imgs':''; ?>">
                                    <img src="<?php echo $src; ?>" >
                                 </div><?php
                           }
                        $fim++; } ?>
                  </div>
               </div>
                  <span class="for"><?php echo strtoupper($featuredproduct->protype); ?></span>
                   <span class="forinrs"><i class="la la-rupee"></i> <?php echo price_format($featuredproduct->price);?></span>
                   <div class="lower-contents">
                      <a href="<?php echo site_url('property/overview/').$featuredproduct->id.'/'.$url_statename.'/'.$url_cityname.'/'.$featuredproduct->sku_id;?>" class="light-lower"><?php echo $featuredproduct->catagory;?>, <?php echo $featuredproduct->subcat;?></a>
                      <h3><a href="<?php echo site_url('property/overview/').$featuredproduct->id.'/'.$url_statename.'/'.$url_cityname.'/'.$featuredproduct->sku_id;?>"><?php echo $featuredproduct->name;?></a></h3>
                      <div class="lucation"><i class="la la-map-marker"></i> <?php echo ucfirst($featuredproduct->sname).", ".ucfirst($featuredproduct->cname);?></div>
                      <div class="property-price clearfix">
                        <div class="read-more"><a href="<?php echo site_url('property/overview/').$featuredproduct->url_name.'/'.$url_statename.'/'.$url_cityname.'/'.$featuredproduct->sku_id;?>" class="theme-btn">More Detail</a></div>
                        <div class="price"><a class="propertyenqbutton" data-id="<?php echo $featuredproduct->id;?>">Call</a></div>
                        </div>
                  </div>
            </div>
         </div>
<?php } ?>
      </div>
   </div>
</div>
<?php } ?><!-- Main Footer -->
</div>
