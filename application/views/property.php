<style>
    .image-box ul li{
        color:"white !important";
    }
    .carousel-indicators,.slick-dots{
        display:none !important;
    }
    .property-block-three .property-info li {
 
    width: 100%; 
  
}

.property-block-three .property-info li i {
    position: absolute;
    left: 0;
    top: 17px;
    font-size: 24px;
    color: #00c0ff;
    line-height: 40px;
}
</style>
<!--Page Title-->
<!-- <section class="page-title hidden-xs" >
   <div class="auto-container">
      <div class="inner-container clearfix">
         <h1><?php echo ucfirst($protype); ?> Properties</h1>
         <ul class="bread-crumb clearfix">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><?php echo ucfirst($protype); ?> Properties</li>
         </ul>
      </div>
   </div>
</section> -->

<section class="page-title1">
   <div class="auto-container1">
      <div class="inner-container1 clearfix">
       <ul class="bread-crumb1 clearfix">
	   		<li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><?php echo ucfirst($protype); ?> Properties</li>
        </ul>
      </div>
   </div>
</section> 

<!--End Page Title-->
<!-- Property Search Section -->
<section class="property-search-section hidden-xs">
   <div class="auto-container">
      <div class="property-search-tabs tabs-box"> 
         <!-- <ul class="tab-buttons">
            <li data-tab="#buy" class="tab-btn active-btn">Search More Properties</li>
         </ul> -->
         <div class="tabs-content">
            <!--Tab / Active Tab-->
            <?php include 'includes/search_box.php';?>
            <!--Tab -->
            <div id="mySidenav" class="sidenav">
               <!-- Categories -->
               <div class="sidebar-widget search-properties">
                  <div class="property-search-form style-three">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="la la-times"></i></a>
                     <?php include 'includes/buy_filter.php';?>
                  </div>
                  <!-- End Form -->
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
 <div class="row clearfix"></div>
<!-- End Property Search Section -->
<div class="sidebar-page-container">
   <div class="auto-container">
      <div class="row clearfix">
         <!--Content Side-->
         <?php if(is_array($products) && count($products)){ 
         $proadsdiv = "col-lg-12";
         if(is_array($propertyads) && count($propertyads)){
         ?>
         <div class=" main-left col-lg-3 col-md-12 col-sm-12">
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
                           <figure class="image transp2"><img src="<?php echo $src; ?>" class="sliders_allfit" alt=""></figure>
                           <div class="info-box">
                              <span class="category"><?php echo $propertyads->subcat;?> <?php echo $propertyads->catagory;?></span>
                              <h3 class="place"><a href=""><?php echo $propertyads->name;?></a></h3>
                              <div class="properties"><a href="<?php echo base_url('property/type/'.strtolower($propertyads->protype)); ?>"><?php echo $propertyads->qty;?> Properties</a></div>
                              <div class="view-all"><a href="<?php echo base_url('property/type/'.strtolower($propertyads->protype)); ?>" style="color:#fff;">View All</a></div>
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                  </div>
               </div>
            </section>
         </div>
         <?php $proadsdiv = "col-lg-9"; } ?>
         <div class=" <?php echo $proadsdiv; ?> col-md-12 col-sm-12">
            <div class="property-list-view">
              <!-- <div class="upper-box clearfix">
                  <div class="sec-title">
                     <span class="title">FIND YOUR HOUSE IN YOUR CITY</span>
                     <h2><?php echo ucfirst($protype); ?> LIST</h2>
                  </div>
               </div>
                Property Block -->
               <div id="filtercontent">
                  <?php 
                     $pro=0; foreach ($products as $key => $products) { 
                     $url_statename = !empty($products->sname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$products->sname):"nill";
                     $url_cityname = !empty($products->cname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$products->cname):"nill";
                     if($products-> image!='' && file_exists('./uploads/products/'.$products->image)) $src = base_url().'uploads/products/'.$products->image; else $src = base_url(IMAGES).'/no-image-available.png';
                     ?>
                  <div class="property-block-three">
                     <div class="inner-box">
                        <div class="row clearfix">
                           <div class="column col-xl-4 col-lg-12 col-md-12 col-sm-12">
                              <div class="image-box">
                                 <figure class="image"><img src="<?php echo $src;?>" alt="<?php echo $products->name;?>" class="imagesnwe" ></figure>
                                 <span class="for  new_buycode"><?php echo strtoupper($products->protype); ?></span>
                                 <?php echo ($products->feature=="YES")?"<span class='featured'>FEATURED</span>":""; ?>
                                 <!--<ul class="info clearfix">-->
                                 <!--   <li><a>&#8377; <?php echo price_format($products->price);?></a></li>--> 
                                 <!--</ul>-->
                                 <ul style="position: absolute;
                                 bottom: 10px;
                                 width: 100%;
                                 padding: 0;
                                 z-index: 99;">
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
                              <ul class="property-info clearfix"> 
                               
                                <?php
                                echo !empty($products->catagory)?"<li> <strong><a href='".site_url('property/type/'.$products->protype.'/'.$products->url_name)."'> ".$products->subcat.",".$products->catagory."</a></strong></li>":""; 
                                ?>
                                
                             </ul>
                                 <h3><a href="<?php echo site_url('property/overview/').$products->id.'/'.$url_statename.'/'.$url_cityname.'/'.$products->sku_id;?>"><?php echo $products->name;?></a> <button class="shortlist-icon prowishlist" data-id="<?php echo $products->id; ?>"><i class="la la-heart-o" id="heart<?php echo $products->id; ?>"></i></button></h3>
                                       <div class="lucation"><i class="la la-map-marker"></i> 
                                          <?php  
                                          if($products->aname!=""){ echo  ucfirst($products->aname).","; }
                                          if($products->landmark!=""){ echo ucfirst($products->landmark).","; }
                                          if($products->cname!=""){ echo  ucfirst($products->cname).","; }
                                          if($products->sname!=""){ echo  ucfirst($products->sname)."-"; }
                                          if($products->pincode!=""){ echo  ucfirst($products->pincode); }
                                          ?>
                                       </div>
                               
                               
                                 <div class="property-price clearfix">
                                    <div class="read-more"><a href="<?php echo site_url('property/overview/').$products->id.'/'.$url_statename.'/'.$url_cityname.'/'.$products->sku_id;?>" class="theme-btn">More Detail</a></div>
                                    <a class="propertyenqbutton1" data-id="<?php echo $products->id;?>"> <div class="price">Call</div></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
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
                  <div class="property-block-three">
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
                  
               <div style="float:left">
               <ul style="position: absolute;
               top: 100px;
               width: 100%;
               padding: 0 20px; color:white;
               z-index: 99;background: #0006;">
               <li style=" float:right;color:#ffffff;padding:0px 5px 0px 5px !important"> &#8377;<?php echo price_format($featuredproduct->priceper)."/". $featuredproduct->areatype;?></li>
               <li style=" color:#ffffff;padding:0px 5px 0px 5px !important">PRICE</li>
               <li style=" color:#ffffff;padding:0px 5px 0px 5px !important"> &#8377; <?php echo price_format($featuredproduct->price);?> </li>
               <li style=" color:#ffffff;padding:0px 5px 0px 5px !important">Total Area</li>
               <li style=" color:#ffffff;padding:0px 5px 0px 5px !important"> <?php echo price_format($featuredproduct->totalarea)." ".$featuredproduct->areatype;?> </li>
               </ul>

               </div>
                        
                   <div class="lower-contents">
                      <a href="<?php echo site_url('property/type/').$featuredproduct->protype.'/'.$featuredproduct->url_name?>" class="light-lower"><?php echo $featuredproduct->catagory;?>, <?php echo $featuredproduct->subcat;?></a>
                      <h3><a href="<?php echo site_url('property/overview/').$featuredproduct->id.'/'.$url_statename.'/'.$url_cityname.'/'.$featuredproduct->sku_id;?>"><?php echo $featuredproduct->name;?></a></h3>
                                    <div class="lucation"><i class="la la-map-marker"></i> <?php  if($featuredproduct->aname!=""){ echo  ucfirst($featuredproduct->aname).","; } ?><?php if($featuredproduct->landmark!=""){ echo  ucfirst($featuredproduct->landmark).","; }?>
                  <?php 
                  if($featuredproduct->cname!=null){
                     echo ucfirst($featuredproduct->cname).",";
                  }
                  if($featuredproduct->sname!=null){
                    echo ucfirst($featuredproduct->sname).'-';
                  }
                  if($featuredproduct->pincode!=null){
                     echo $featuredproduct->pincode;
                  }
                  ?></div>
                      <div class="property-price clearfix">
                        <div class="read-more"><a href="<?php echo site_url('property/overview/').$featuredproduct->id.'/'.$url_statename.'/'.$url_cityname.'/'.$featuredproduct->sku_id;?>" class="theme-btn">More Detail</a></div>
                        <div class="price"><a class="propertyenqbutton1" data-id="<?php echo $featuredproduct->id;?>">Call</a></div>
                        </div>
                  </div>
            </div>
         </div>
<?php } ?>
      </div>
   </div>
</div>
<?php } ?>

<!-- Main Footer -->
</div>
<script>
$(document).on('click', '.propertyenqbutton1', function() {
    var proid = $(this).attr('data-id');
    var userloginstatus = $("#userloginstatus").val();

    if(userloginstatus == "YES"){
        var siteurl = $("#siteurl_data").val();
        var p_data =
        {
            productid:$(this).attr('data-id')
        };
        $.ajax({
            url:siteurl+"property/propertyowner",
            type: "POST",
            data: p_data,
            success: function(data)
            { 
                
               
                $('#ownerdetails').modal('show'); 
                 $("#proenqownerdetail").html(data);
            }
            
        });
        
        //$('body').removeClass('modal-open');
       // $('.modal-backdrop').remove();

    } else {
        $("#appoinmentpropertyid").val(proid);
        $('#contactModal').modal('toggle'); 
    }
    //$('.modal-backdrop').remove();
});
</script>