<!-- Fixed Banner Part Start -->
<style>
.info li {
  position: relative;
}

.info li:nth-child(odd) {
  text-align: left;
  padding-right: 10px; /* Adjust as needed */
}

.info li:nth-child(even) {
  text-align: left;
  /* Adjust as needed */
}
#alr{
    float:right !important;
    text-align:right !important;
        top: 50px !important;
}

@media (max-width: 767px) {
  /* Mobile-specific CSS */
  .info li {
    text-align: center;
  /* Adjust as needed */
    position: static; /* Remove positioning for mobile */
  }
}
</style>
<section id="slider-fixed" class="bg_img_4 overlay_1 hidden-xs">
   <div class="vertical_center w-100">
      <div class="container">
         <div class="slider-search-2">
            <h3 class="title text_white">Find Your Dream Home</h3>
            <div class="property_search_form m-b30 p-4 m-t30 bg_white">
               <form id="search-form" method="post" class="property_filter_input" action="<?php echo base_url('property/mainsearch'); ?>">  
               
                  <div class="row">
                     <div class="col-lg-2 col-sm-6 p-tb8">
                        <?php  
                   
                    $options = ' id="ptypes" data-placeholder="Choose a Property Type..." class="form-control" tabindex="2"';
                    echo form_dropdown('propertytype', $propertytype, '',$options);?>
                     </div>
                     <div class="col-lg-2 col-sm-6 p-tb8">
                        <span id="pro_none" class="">
                           <select id="option-droup-demo" id="category" name="category[]" multiple="multiple">
                      <?php
                      foreach ($productmenu as $smkey => $smvalue) {
                      $mainmenu = explode("@", $smkey);
                      $subcatcount = count($smvalue);
                      ?>
                      <optgroup label="<?php echo $mainmenu[1]; ?>">
                      <?php
                      if(is_array($smvalue) && count($smvalue)){
                          foreach ($smvalue as $key1 => $value1) {
                            $sm_subpart = explode("@", $key1);
                            ?>
                            <option value="<?php echo $sm_subpart[1]; ?>"><?php echo $sm_subpart[1]; ?></option>
                           
                            <?php
                          }
                      }
                      ?></optgroup>
                    <?php } ?> 
                    </select>
                        </span>
                     </div>
                     <div class="col-lg-2 col-sm-6 p-tb8">
                        <?php  
                    $ownershiptype[''] = "Posted By";
                    $options = ' id="ownershiptype" data-placeholder="Choose a Property Type..." class="form-control" tabindex="2"';
                    echo form_dropdown('ownershiptype', $ownershiptype, '',$options);?>
                     </div>
                     <div class="col-lg-4 col-sm-8 p-tb8">
                        <input type="text" id="cityname" name="cityname" class="form-control cityname" placeholder="Search for City/Localities...">
                         
               
                     </div>
                      
                        
               <img src="<?php echo base_url(IMAGES); ?>/nearme.png"  class="mapsearch" style="margin-left: -65px !important;z-index:14; height:25px;width:25px;margin-top: 15px;" />
               
                     
                     <div class="col-lg-2 col-sm-4 se_topsa">
                        <input type="submit" name="search" value="Search" class="theme-btn btn-style-four w-100 text-center">
                        <!-- <a href="search-property.php" >Search</a> -->
                     </div>
                  </div>
               </form>
            </div>
            <span class="h4 text_white">We have listed over 100000+ property in our database</span>
         </div>
      </div>
   </div>
</section>


<!-- Slider Part End -->
<?php if(is_array($featuredproduct) && count($featuredproduct)){ ?>   
<!-- Recent Section -->
<section class="property-section m-tb50">
   <div class="auto-container">
      <div class="sec-title">
         <span class="title">FIND YOUR HOUSE IN YOUR CITY</span>
         <h2>FEATURED PROPERTIES</h2>
      </div>
      <div class="row">
         <?php 
         if(is_array($featuredproduct) && count($featuredproduct)){
         foreach ($featuredproduct as $key => $featuredproduct) { 
         $url_statename = !empty($featuredproduct->sname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$featuredproduct->sname):"nill";
         $url_cityname = !empty($featuredproduct->cname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$featuredproduct->cname):"nill";
         ?>
         <!-- Property Block -->
         <div class="property-block col-lg-3 col-md-6 col-sm-12">
            <div class="inner-box">
               <div class="image-box">
                  <div class="single-item-carousel owl-carousel owl-theme">
                     <?php
                     $imga = array('image','image1','image2','image3','image4');
                     $fimgcount = 1;
                     foreach ($imga as $eimg) { 
                        if($featuredproduct-> $eimg!='' && file_exists('./uploads/products/'.$featuredproduct->$eimg)){
                           $src = base_url().'uploads/products/'.$featuredproduct->$eimg;
                           ?><figure class="image"><img src="<?php echo $src; ?>" alt="" class="imagesnwe1"></figure><?php
                           } else if($fimgcount==1){
                              $src = base_url(IMAGES).'/no-image-available.png';
                               ?><figure class="image"><img src="<?php echo $src; ?>" alt="" class="imagesnwe1"></figure><?php
                           }
                     ?>
                     
                     <?php $fimgcount++; } ?>
                  </div>
                  <span class="for"> <?php echo strtoupper($featuredproduct->protype); ?></span>
                  <?php echo ($featuredproduct->feature=="YES")?"<span class='featured'>FEATURED</span>":""; ?>
                  <ul class="info clearfix">
                     <li><a href="#"> &#8377; <?php echo price_format($featuredproduct->price);?></a></li>
                  </ul>
               </div>
               <div class="lower-content">
                  <ul class="tags">
                     <li><a href="<?php echo  site_url('property/type/z/'.$featuredproduct->url_name)?>"><?php echo $featuredproduct->catagory;?></a>,</li>
                     <li><a href="#"><?php echo $featuredproduct->subcat;?></a></li>
                  </ul>
                  <h3><a href="<?php echo site_url('property/overview/').$featuredproduct->id.'/'.$url_statename.'/'.$url_cityname.'/'.$featuredproduct->sku_id;?>"><?php echo $featuredproduct->name;?></a></h3>
                  <div class="lucation"><i class="la la-map-marker"></i> <?php echo ucfirst($featuredproduct->sname).", ".ucfirst($featuredproduct->cname);?> </div>
                  <div class="property-price clearfix">
                     <div class="read-more"><a href="<?php echo site_url('property/overview/').$featuredproduct->id.'/'.$url_statename.'/'.$url_cityname.'/'.$featuredproduct->sku_id;?>" class="theme-btn">More Detail</a></div>
                     <div><a data-toggle="modal" data-target="#contactModal" data-backdrop="false">Call</div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Property Block -->
         <?php 
         }  } ?>  
         
      </div>
         
</section>
<!--End Property Section -->
<?php } ?>
<!-- Call To Action -->
<section class="call-to-action hidden-xs" style="background-image: url(<?php echo base_url(IMAGES); ?>/fixed-slider.png);">
   <div class="auto-container">
      <div class="clearfix">
         <!-- Title Column -->
         <div class="title-column">
            <div class="sec-title light">
               <span class="title">IN FEW SECONDS WITH WILLES</span>
               <h2>BUY OR SALE YOUR HOUSE</h2>
            </div>
         </div>
         <!-- Button Column -->
         <div class="button-column">
            <a href="tel:+918884755555" class="theme-btn btn-style-four">Call: <?php echo $contactus->mobile; ?></a>
         </div>
      </div>
   </div>
</section>
<!--End Call To Action -->

<!-- Recent Section -->
<section class="page-title1">
   <div class="auto-container1">
      <div class="inner-container1 clearfix">
       <ul class="bread-crumb1 clearfix">
          
            <li><h3>FIND PROPERTIES<h3></li>
         </ul>
      </div>
   </div>
</section> 
<section class="property-section m-tb50">
   <div class="auto-container">
     <!-- <div class="sec-title">
         <span class="title">FIND YOUR HOUSE IN YOUR CITY</span>
         <h2>RECENT PROPERTIES</h2>
      </div> -->
      <div class="row" id="searchdata">
         <?php 
         if(is_array($products) && count($products)){
         $pro_active=0; $pro=0; foreach ($products as $key => $products) { 
         $url_statename = !empty($products->sname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$products->sname):"nill";
         $url_cityname = !empty($products->cname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$products->cname):"nill";
         ?>
         <!-- Property Block -->
         <div class="property-block col-lg-3 col-md-6 col-sm-12">
            <div class="inner-box">
               <div class="image-box ">
                  <div class="single-item-carousel owl-carousel owl-theme">
                     <?php
                     $rimgcount = 1;
                     $imga = array('image','image1','image2','image3','image4');
                     foreach ($imga as $eimg) { 
                        if($products-> $eimg!='' && file_exists('./uploads/products/'.$products->$eimg)){
                           $src = base_url().'uploads/products/'.$products->$eimg;
                           ?><figure class="image"><img src="<?php echo $src; ?>" alt="" class="imagesnwe1"></figure><?php
                           } else if($rimgcount==1){
                              $src = base_url(IMAGES).'/no-image-available.png';
                              ?><figure class="image"><img src="<?php echo $src; ?>" alt="" class="imagesnwe1"></figure><?php
                           }
                     ?>
                     
                     <?php $rimgcount++; } ?>
                  </div>
                  <span class="for"><?php echo strtoupper($products->protype); ?></span>
                  <?php echo ($products->feature=="YES")?"<span class='featured'>FEATURED</span>":""; ?>
                  
                  <ul style="position: absolute;
                  bottom: 10px;
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
                  <li style="left:-167px;bottom:0px;color:#ffffff;padding:0px 5px 0px 5px !important"> &#8377;<?php echo price_format($products->price);?> </li>
                  <li style="left:-180px;bottom:0px;color:#ffffff;padding:0px 5px 0px 5px !important">Total Area</li>
                  <li style="left:-167px;bottom:0px;color:#ffffff;padding:0px 5px 0px 5px !important"> <?php echo price_format($products->totalarea)." ".$products->areatype;?> </li>
                  </ul>
               </div>
               <div class="lower-content">
                 <ul class="tags">
                     <strong> <?php echo $products->subcat;?>,</strong>
                     <strong>   <?php echo $products->catagory;?></strong>
                  </ul>
                  
                  <h3><a href="<?php echo site_url('property/overview/').$products->id.'/'.$url_statename.'/'.$url_cityname.'/'.$products->sku_id;?>"><?php echo $products->name;?></a></h3>
                  <div class="lucation">  <i class="la la-map-marker"></i> <?php  if($products->aname!=""){ echo  ucfirst($products->aname).","; } ?><?php if($products->landmark!=""){ echo  ucfirst($products->landmark).","; }?>
                  <?php   if($products->cname!=""){echo ucfirst($products->cname).","; }  if($products->sname!=""){echo ucfirst($products->sname).'-'.$products->pincode; } ?></div>
               
                  
                  <div class="property-price clearfix">
                     <div class="read-more"><a href="<?php echo site_url('property/overview/').$products->id.'/'.$url_statename.'/'.$url_cityname.'/'.$products->sku_id;?>" class="theme-btn">More Detail</a></div>
                     <a class="propertyenqbutton1"  data-id="<?php echo $products->id;?>"> <div class="price">Call</div></a>
                  </div>
               </div>
            </div>
         </div>
         <!-- Property Block -->
         <?php  } } ?>
      </div>
       <div id="loadmoredata">
           </div>
      <div class="load-more-btn text-center">
         <button class="loadmore theme-btn btn-style-four">Load More</button>
      </div>
   </div>
</section>
<!--End Property Section -->
<?php  if(is_array($premiumproduct) && count($premiumproduct)){ ?>
<!-- premium Section -->
<section class="property-section m-tb50">
   <div class="auto-container">
   <div class="sec-title">
      <span class="title">FIND YOUR HOUSE IN YOUR CITY</span>
      <h2>PREMIUM PROPERTIES</h2>
   </div>
   <div class="row">
      <?php 
         if(is_array($premiumproduct) && count($premiumproduct)){
         foreach ($premiumproduct as $key => $premiumproduct) { 
         $url_statename = !empty($premiumproduct->sname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$premiumproduct->sname):"nill";
         $url_cityname = !empty($premiumproduct->cname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$premiumproduct->cname):"nill";
         ?>
         <!-- Property Block -->
         <div class="property-block col-lg-3 col-md-6 col-sm-12">
            <div class="inner-box">
               <div class="image-box">
                  <div class="single-item-carousel owl-carousel owl-theme">
                     <?php
                     $imga = array('image','image1','image2','image3','image4');
                     $pimgcount =1;
                     foreach ($imga as $eimg) { 
                        if($premiumproduct-> $eimg!='' && file_exists('./uploads/products/'.$premiumproduct->$eimg)){
                           $src = base_url().'uploads/products/'.$premiumproduct->$eimg;
                           ?><figure class="image"><img src="<?php echo $src; ?>" alt="" class="imagesnwe1"> </figure><?php
                           } else if($pimgcount==1){
                              $src = base_url(IMAGES).'/no-image-available.png';
                              ?><figure class="image"><img src="<?php echo $src; ?>" alt="" class="imagesnwe1"></figure><?php
                           }
                     ?>
                     
                     <?php $pimgcount++; } ?>
                  </div>
                  <span class="for"> <?php echo strtoupper($premiumproduct->protype); ?></span>
                  <?php echo ($premiumproduct->feature=="YES")?"<span class='featured'>FEATURED</span>":""; ?>
                  <ul class="info clearfix">
                     <li><a href="#"> &#8377; <?php echo price_format($premiumproduct->price);?></a></li>
                  </ul>
               </div>
               <div class="lower-content">
                  <ul class="tags">
                     <li><a href="#"><?php echo $premiumproduct->catagory;?></a>,</li>
                     <li><a href="#"><?php echo $premiumproduct->subcat;?></a></li>
                  </ul>
                  <h3><a href="<?php echo site_url('property/overview/').$premiumproduct->id.'/'.$url_statename.'/'.$url_cityname.'/'.$premiumproduct->sku_id;?>"><?php echo $premiumproduct->name;?></a></h3>
                  <div class="lucation"><i class="la la-map-marker"></i> <?php echo ucfirst($premiumproduct->sname).", ".ucfirst($premiumproduct->cname);?></div>
                  <div class="property-price clearfix">
                     <div class="read-more"><a href="<?php echo site_url('property/overview/').$premiumproduct->id.'/'.$url_statename.'/'.$url_cityname.'/'.$premiumproduct->sku_id;?>" class="theme-btn">More Detail</a></div>
                     <div class="price"><a data-toggle="modal" data-target="#contactModal" data-backdrop="false">Call</a></div>
                  </div>
               </div>
            </div>
         </div>
         
         <!-- Property Block -->
         <?php 
         }  } ?> 
         

</section>
<?php } ?>

   

<!--premium End Property Section -->


    

   </div>   
    <div class="modal fade" id="ownerdetails" tabindex="-1" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="lineModalLabel">Owner Detail</h5>
            
           <button type="button" data-target="#ownerdetails" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
         </div>
         <div class="modal-body padtbs" id="proenqownerdetail">
            
         </div>
      </div>
   </div>
</div>  
<input type="hidden" name="siteurl_data" id="siteurl_data" value="<?php echo base_url(); ?>">
<input type="hidden" name="total" id="total" value="<?php echo $totalproduct; ?>">
<script>
 var limit = 4; // Number of items to load per request
  var offset =4;
  var tot = $("#total").val();
$(document).on('click', '.loadmore', function() {
     
   var siteurl = $("#siteurl_data").val();
     
 
 
   

     

        var siteurl = $("#siteurl_data").val();
        var p_data =
        {
            limit,
            offset,
        };
        $.ajax({
            url:siteurl+"welcome/load_more",
            type: "POST",
            data: p_data,
            success: function(data)
            { 
               
                $('#searchdata').append(data);
               offset += limit;
                if(offset>=tot){
                    $('.loadmore').css('display','none'); 
            }
            }
        });
    
 
   
});
</script>
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

<script>
$(document).on('click', '.mapsearch', function() {
  if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            // Location access is granted, handle the location data
            showLocation(position);
        }, function(error) {
            // Handle permission denial or errors here
            if (error.code === error.PERMISSION_DENIED) {
                // Location access is blocked or denied, display a message with a button to request permission
                alert('Location access for this website is blocked or denied. Please click the button below to allow access.');
                // Show the button
                var requestPermissionButton = document.createElement('button');
                requestPermissionButton.textContent = 'Request Permission';
                requestPermissionButton.addEventListener('click', function() {
                    // Request permission again
                    navigator.geolocation.getCurrentPosition(function(position) {
                        // Location access is granted, handle the location data
                        showLocation(position);
                    }, function(error) {
                        // Handle permission denial or errors after the second request
                        alert('Error getting location: ' + error.message);
                    });
                });
              //  document.body.appendChild(requestPermissionButton);
            } else {
                // Handle other errors
                alert('Error getting location: ' + error.message);
            }
        });
    } else {
        alert('Geolocation is not supported by your browser.');
    }
});
    function showLocation(position){
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
     var siteurl = $("#siteurl_data").val();
     var p_data =
        {
            latitude,
            longitude,
        };
        
         $.ajax({
            url:siteurl+"welcome/getlocation",
            type: "POST",
            data: p_data,
            success: function(data)
            { 
                $(".cityname").val(data);
               
             var p_data =
        {
            city:data,
           
        };
          $.ajax({
            url:siteurl+"welcome/mapsearch",
            type: "POST",
            data: p_data,
            success: function(data)
            { 
               
                $('#searchdata').html(data);
               
            }
        });     
             
            }
            
        });
      
   
}
</script>

