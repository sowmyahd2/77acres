
<style>
    li{
        justify-content:flex-start !important;
    }
    	.sidebar-page-container {
		padding: 0px 0 40px;
	}
	/* .upper-info-box .property-info li {
 
     margin-right: 0px; 
   
} */
.property_listing.sidebar-widget li{
   text-wrap:nowrap !important;
 }
.slick-dots{
    display:none !important;
}
</style>
 <section class="page-title1">
   <div class="auto-container1">
      <div class="inner-container1 clearfix">
       <ul class="bread-crumb1 clearfix">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><?php echo $product->protype;?> Property Detail</li>
         </ul>
      </div>
   </div>
</section> 
<!--End Page Title-->
<!-- Sidebar Page Container -->

<div class="sidebar-page-container mt-3">
   <div class="auto-container">
      <div class="upper-info-box">
          <div class="row">
            <div class="about-property col-md-10 col-sm-12">
               <h2><?php echo $product->name;?></h2>
               <div class="location"><i class="la la-map-marker"></i> 
                  <?php 
                     $proaddress = "";
                     $proaddress .= ($product->aname)?$product->aname.", ":'';
                     $proaddress .= ($product->landmark)?$product->landmark.", ":'';
                     
                     $proaddress .= ($product->cname)?$product->cname.", ":'';
                     $proaddress .= ($product->sname)?$product->sname.",-":'';
                     $proaddress .= ($product->pincode)?$product->pincode.", ":'';

                     //$proaddress =($product->house)?$product->house.", ":''.($product->street)?$product->street.", ":''.$product->Localityaddress.", ".ucfirst($product->sname).", ".ucfirst($product->cname);
                     echo rtrim($proaddress,', ');
                     ?> 
               </div>
               <ul class="property-info whishlist clearfix">
                  <?php  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
                  <li title="whishlist"><a href="#" class=" prowishlist" data-id="<?php echo $product->id; ?>" data-did="<?php echo $product->dealersId; ?>" data-userid="<?php echo $this -> session -> userdata('user')->id; ?>"><i class="la la-heart-o" id="heart<?php echo $product->id; ?>"></i>Add To Whishlist</a>  </li>
                  <li title="share"><i class="la la-share" style="font-size:25px"></i><a href="whatsapp://send?text=<?= $actual_link?>" data-action="share/whatsapp/share"> Share Property</a></li>
               </ul>
            </div>
            <div class="price-column col-md-2 col-sm-12 hidden-xs visible-md visible-lg">
                
               <div class="btn-box d-inline">
                  <a data-toggle="modal" data-target="<?php echo $this->session->userdata('user')->id ? '#ownerdetails' : '#contactModal'; ?>" data-id="<?php echo $product->id; ?>" class="theme-btn btn-style-four detail_full_width_but">
                     <i class="la la-phone"></i> Call
                  </a>
               </div>
            </div>
         </div>
      </div>
      <div class="row clearfix">
         <!--Content Side-->
         <div class="content-side col-lg-8 col-md-12 col-sm-12">
            <div class="property-detail">
               <div class="upper-box">
                  <div class="carousel-outer">
                     <ul class="image-carousel owl-carousel owl-theme">
                        <?php
                           $pro_p_images = array('image','image1','image2','image3','image4','image5','image6','image7','image8','image9','image10');
                           $fims = 1;
                           foreach ($pro_p_images as $key => $pimgs) { 
                               if($product-> $pimgs!='' && file_exists('./uploads/products/'.$product->$pimgs)){
                                   $src = base_url().'uploads/products/'.$product->$pimgs;
                                   ?>
                        <li><a href="<?php echo $src; ?>"  class="lightbox-image" title="Image Caption Here"><img  style="width: 500px; height: 200px;"  src="<?php echo $src; ?>" alt="<?php echo $product->name; ?>"></a></li>
                        <?php
                           } else if($fims==1){
                           	$src = base_url(IMAGES).'/no-image-available.png';
                                  ?>
                        <li><a href="<?php echo $src; ?>" class="lightbox-image" title="Image Caption Here"><img class="rbgp_prop"   src="<?php echo $src; ?>" alt="<?php echo $product->name; ?>"></a></li>
                        <?php
                           }
                           $fims++;
                           }   
                           ?>
                     </ul>
                     <ul class="thumbs-carousel owl-carousel owl-theme">
                        <?php
                           $pro_p_images = array('image','image1','image2','image3','image4','image5','image6','image7','image8','image9','image10');
                           foreach ($pro_p_images as $key => $pimgs) { 
                               if($product-> $pimgs!='' && file_exists('./uploads/products/'.$product->$pimgs)){
                                   $src = base_url().'uploads/products/'.$product->$pimgs;
                                   ?>
                        <li><img src="<?php echo $src; ?>" style="width: 170px; height: 103px;" alt=""></li>
                        <?php
                           }
                           }   
                           ?>
                     </ul>
                  </div>
               </div>
               <div class="price-column col-md-12 col-sm-12 visible-xs hidden-md hidden-lg">
                  
                  <div class="btn-box d-inline"><a data-toggle="modal"  data-target="<?php echo $this->session->userdata('user')->id ? '#ownerdetails' : '#contactModal'; ?>" data-id="<?php echo $product->id;?>" data-backdrop="false" class="theme-btn btn-style-four mainprocontactus">Call</a></div>
               </div>
               <div class="lower-content">
                  <span class="js-readMore">
                     <h3>Description</h3>
                     <p><?php echo $product->description; ?></p>
                  </span>
             
               <div class="row">
                  <div class="col-md-4">
                     
                     <hr>
                     <p><b> youtube link:</b> <br> 
                     
                        <?php
                        $youtubestatus = false;
                        if(!empty($product->video1)){ 
                           ?>
                           <a target="_blank" href="<?php echo $product->video1;?>"> View Vedio</a>
                         <!--  <iframe width="560" height="315" src="<?= $product->video1?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                       <!--    <a target="_blank" href="https://www.youtube.com/watch?v=< echo $product->video1; ?>">https://www.youtube.com/watch?v=< echo $product->video1; ?></a> -->
                           <?php
                           $youtubestatus = true;
                        } 
                        if(!empty($product->video2)){
                           ?>
                           <a target="_blank" href="<?php echo $product->video2; ?>"> View Vedio</a>
                         <!--  <iframe width="560" height="315" src="<?= $product->video2?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                         <a target="_blank" href="https://www.youtube.com/watch?v= echo $product->video2; ?>">https://www.youtube.com/watch?v= echo $product->video2; ?></a>
                         -->  <?php
                           $youtubestatus = true;
                        } 
                        if(!$youtubestatus){
                           echo "N/A";
                        }
                        ?>
                        </p>
                  </div>
                  <div class="col-md-4">
                     
                     <hr>
                     <?php
                        if(!empty($product->brochure)){
                           $brochureURL = site_url('uploads/products/'.$product->brochure);
                           ?>
                     <p><b>PDF brouchure</b>:<br> 
                        
                           <a target="_blank" href="<?php echo $brochureURL; ?>" download><span class="la la-download"></span> Download PDF</a>
                           <?php
                        } else {
                           echo "N/A";
                        } ?>
                        </p>
                  </div>
                  <div class="col-md-4">
                     
             
                  </div>
               </div>
                 </div>
               <div class="property_sidebar visible-xs hidden-md hidden-lg">
                  <div class="property_listing sidebar-widget">
                     <h4 class="widget-title text-center p-tb10"><b>Property Summary</b></h4>
                     <ul>
                        <li><span>Property ID :</span>&nbsp;<?php echo $product->sku_id;?></li>
                  
                        <li><span>Listing Type :</span>&nbsp; <?php echo $product->protype;?></li>
                        <?php
                           echo !empty($product->catagory)?"<li><span>Property Type :</span> &nbsp;".$product->subcat." ".$product->catagory."</li>":""; 
                           echo !empty($product->propstatus)?"<li><span>Property Status :</span>&nbsp;".$product->propstatus."</li>":""; 
                           echo !empty($product->propage)?"<li><span>Age of property :</span>&nbsp; ".$product->propage."</li>":"";
                           echo ($product->rerastatus!='no' && $product->reraid!="")?"<li><span>Rera Id :</span>&nbsp; ".$product->reraid."</li>":""; 
                          
                           echo !empty($product->price)?"<li><span>Price :</span> &nbsp;&#8377; ".price_format($product->price)."</li>":"";
                            echo !empty($product->totalarea)?"<li><span>Total Area :</span> &nbsp;".$product->totalarea." ".$product->areatype."</li>":""; 
                         
                           if(isset($prosummary) && is_array($prosummary) && count($prosummary)) {
                           	foreach ($prosummary as $key => $mprosum) { 
                               						if($mprosum->specificationvalue!="" || $mprosum->spec_val!=""){
                               							$spec_value = ($mprosum->type==1 || $mprosum->type==2) ? $mprosum->specificationvalue :$mprosum->spec_val; 
                            								$specvalue = (!empty($spec_value)) ? $spec_value :$mprosum->spec_val;

                           
                               							?>
                        <li><span><?php echo $mprosum->specificationname; ?> :</span> &nbsp;<?php echo empty($specvalue)?"--":$specvalue; ?>  </li>
                        <?php
                           } }
                           }
                           ?>
                     </ul>
                  </div>
               </div>
               <!-- if(isset($specification) && is_array($specification) && count($specification)) { ?>
               <div class="property-features">
                  <h3>Furnishing Amenities</h3>
                  <ul class="list-style-one">
                     < 
                        //echo "<pre>"; print_r($specification);
                        foreach ($specification as $key => $specific) { 
                        if($specific->specificationvalue!="" || $specific->spec_val!=""){
                        ?>
                     <li>
                        < //if($key!=19){ ?>
                        <span class="pro-text">
                         echo $specific->specificationname; ?> :
                        </span>
                         $spec_value = ($specific->type==1 || $specific->type==2) ? $specific->specificationvalue :$specific->spec_val; 
                           $specvalue = (!empty($spec_value)) ? $spec_value :$specific->spec_val; 
                           echo empty($specvalue)?"--":$specvalue;
                           echo ($specific->areaType!='0')?" ".$specific->areaType:'';
                           } ?>
                     </li>
                      } ?>
                  </ul>
               </div> } -->
               <?php if(isset($amspecification) && is_array($amspecification) && count($amspecification)) { ?>
               <div class="property-features">
                  <h3>Amenities</h3>
                  <ul class="list-style-one">
                     <?php 
                        //echo "<pre>"; print_r($amspecification);
                        foreach ($amspecification as $key => $specific) { 
                        $spec_value = ($specific->type==1 || $specific->type==2) ? $specific->specificationvalue :$specific->spec_val; 
                         $specvalue = (!empty($spec_value)) ? $spec_value :$specific->spec_val; 
                             if(!empty($specvalue)){
                                $specvalue_array = explode(',', $specvalue);
                                foreach ($specvalue_array as $key => $value) {
                                    ?>
                     <li><?php
                        echo $value;
                        ?></li>
                     <?php
                        }
                        }
                        ?>
                     <?php } ?>
                  </ul>
               </div>
               <?php } if(!empty($product->latitude) && !empty($product->longitude)){ ?>
               <div class="property-features ">
                  <h6>Approximate  location within 1 KM</h6>
                  <div id="map" style="width:100%;height:500px;"></div>  
                  <!-- 						<iframe 
                     width="100%" height="350" frameborder="0" style="border:2px solid;" 
                     scrolling="no" 
                     marginheight="0" 
                     marginwidth="0" 
                     src="https://maps.google.com/maps?q=<?php echo $product->latitude; ?>,<?php echo $product->longitude; ?>&hl=es;z=14&amp;output=embed"
                     >
                     </iframe> -->
                      <!-- <iframe width="100%" height="350" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCPz503b8Th2oQGXGsqAVA21jrESJf4c4Q
                     &q= echo ucfirst($product->latitude).", ".ucfirst($product->longitude);  allowfullscreen> </iframe>-->
                  <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d497698.660081175!2d77.35073622180907!3d12.954517007995705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1670c9b44e6d%3A0xf8dfc3e8517e4fe0!2sBengaluru%2C+Karnataka!5e0!3m2!1sen!2sin!4v1563962188666!5m2!1sen!2sin" width="100%" height="350" frameborder="0" allowfullscreen></iframe> -->
               </div>
               <?php } ?>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="property_sidebar hidden-xs visible-md visible-lg">
               <div class="property_listing sidebar-widget">
                  <h4 class="widget-title text-center p-tb10"><b>Property Summary</b></h4>
                  <ul>
                     <li><span>Property ID :</span> <?php echo $product->sku_id;?></li>
                     <li><span>Listing Type :</span> <?php echo $product->protype;?></li>
                     <?php
                        echo !empty($product->catagory)?"<li><span>Property Type :</span> ".$product->subcat." ".$product->catagory."</li>":""; 
                        echo !empty($product->propstatus)?"<li><span>Property Status :</span> ".$product->propstatus."</li>":""; 
                        echo !empty($product->propage)?"<li><span>Age of property :</span> ".$product->propage."</li>":"";
                         echo ($product->rerastatus!='no' && $product->reraid!="")?"<li><span>Rera Id :</span> ".$product->reraid."</li>":""; 
                      
                        echo !empty($product->price)?"<li><span>Price :</span> &#8377; ".price_format($product->price)."</li>":"";
                      echo !empty($product->totalarea)?"<li><span>Total Area :</span> ".($product->totalarea." ".$product->areatype)."</li>":"";
                      
                        if(isset($mprosummary) && is_array($mprosummary) && count($mprosummary)) {
                        	//print_r($mprosummary); 
                        	foreach ($mprosummary as $key => $prosum) { 
                            						if($prosum->specificationvalue!="" || $prosum->spec_val!=""){
                            							$spec_value = ($prosum->type==1 || $prosum->type==2) ? $prosum->specificationvalue :$prosum->spec_val; 
                         								$specvalue = (!empty($spec_value)) ? $spec_value :$prosum->spec_val;
                         								?>
                     <li><span><?php echo $prosum->specificationname; ?> :</span> <?php echo empty($specvalue)?"--":$specvalue; ?> <?php echo ($prosum->areaType!='0')?$prosum->areaType:''; ?></li>
                     <?php
                        } }
                        }
                        ?>
                  </ul>
               </div>
            </div>
              <!--<div class="contact_agent sidebar-widget">
               <div class="author_img">
                  
                     $pro_p_images = array('image');
                     foreach ($pro_p_images as $key => $pimgs) { 
                         if($product->$pimgs!=''){
                             $src = base_url().'uploads/products/'.$product->$pimgs;
                             ?>
                  <img src="echo $src; ?>" alt="">
                  
                     }
                     }   
                     
                   <!-- <div class="agent_info">
                     <h5 class="author_name">For More Enquire</h5>
                     <br>
                     <!--<span> Call +( 91 ) 1234567890 or Fill the below form</span>
                  </div>-->
               </div>
               <!-- <form id="appoinmentform" action="<?php echo base_url('property/appoinment'); ?>" method="post">
                  <input type="hidden" name="appoinmentpropertyid" value="<?php echo $product->id;?>">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <input type="text" class="form-control" name="name" id="appoinmentname" placeholder="Your Name*" required="required">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <input type="text" class="form-control" name="emailid" id="appoinmentemailid" placeholder="Your Email*" required="required">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="input-group form-group">
                           <input type="text" class="form-control" placeholder="Enter Your Phone Number" name="phonenumber" id="appoinmentphonenumber" required="required">
                           <div class="input-group-btn">
                              <button class="btn btn-default sush_blue generatedetailsotp" data-idvalue = "appoinmentphonenumber" type="button">
                              Generate OTP
                              </button>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <input type="email" class="form-control" id="cphone" placeholder="Enter Generated OTP" required="required">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <button type="submit" class="btn btn-black  pull-right" name="submit"><i class="la la-envelope"></i> SUBMIT</button>
                     </div>
                  </div>
                  <input type="hidden" name="message" value="">
               </form
            </div>
         </div>>-->
      </div>
      <div class="row clearfix">
      </div>
      <?php if(is_array($realted_products) && count($realted_products)){ ?>
   <div class="">
   <div class="auto-container">
      <div class="sec-title">
         <span class="title">CHECK OUR LATEST PROPERTIES</span>
         <h2>OTHER PROPERTIES</h2>
      </div>
      <div class="Modern-Slider">
<?php 
foreach ($realted_products as $key => $featuredproduct) { 
$url_statename = !empty($featuredproduct->sname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$featuredproduct->sname):"null";
$url_cityname = !empty($featuredproduct->cname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$featuredproduct->cname):"null";
?>
         <div class="item" > 
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
                                <figure class="image"> <img src="<?php echo $src; ?>" ></figure>
                              </div><?php
                           } else if($fim==1){
                              $src = base_url(IMAGES).'/no-image-available.png';
                               ?><div class="carousel-item <?php echo ($fim==1)?'active inu_imgs':''; ?>">
                                  <figure class="image">  <img src="<?php echo $src; ?>" ></figure>
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
                  padding:5px; color:white;
                  z-index: 99;background-color:#91b1bb33">
                  <li style=" float:right;padding:0px 5px 0px 0px   "> &#8377;<?php echo price_format($featuredproduct->priceper)."/". $featuredproduct->areatype;?></li>
                  <li >PRICE</li>
                  <li > &#8377; <?php echo price_format($featuredproduct->price);?> </li>
                  <li >Total Area</li>
                  <li > <?php echo price_format($featuredproduct->totalarea)." ".$featuredproduct->areatype;?> </li>
                  </ul>

               </div>
                        
                   <div class="lower-contents" style="height:300px">
                      <?php echo $featuredproduct->catagory;?>, <?php echo $featuredproduct->subcat;?>
                      <h3><a href="<?php echo site_url('property/overview/').$featuredproduct->id.'/'.$url_statename.'/'.$url_cityname.'/'.$featuredproduct->sku_id;?>"><?php echo $featuredproduct->name;?></a></h3>
                     <div class="lucation" style="height:150px"><i class="la la-map-marker"></i> 
                     <?php  
                      if($featuredproduct->localityname!=""){ echo  ucfirst($featuredproduct->aname).","; } 
                      if($featuredproduct->landmark!=""){ echo  ucfirst($featuredproduct->landmark).","; }
                     if($featuredproduct->cname!=null){
                        echo ucfirst($featuredproduct->cname).",";
                     }
                     if($featuredproduct->sname!=null){
                     echo ucfirst($featuredproduct->sname).'-';
                     }
                     if($featuredproduct->pincode!=null){
                        echo $featuredproduct->pincode;
                     }?>
                  </div>
                  <div class="property-price clearfix" style="bottom:10px;">
                                    <div class="read-more"><a href="<?php echo site_url('property/overview/').$featuredproduct->id.'/'.$url_statename.'/'.$url_cityname.'/'.$featuredproduct->sku_id;?>" class="theme-btn">More Detail</a></div>
                                    <a class="propertyenqbutton" data-id="<?php echo $featuredproduct->id;?>"> <div class="price">Call</div></a>
                                 </div>
                      
                  </div>
            </div>
         </div>
<?php } ?>
      </div>
   </div>
</div>
<?php } ?>
   </div>
 </div>
 <!-- Sidebar Page Container -->
 </div>
 <div class="modal fade" id="ownerdetails" tabindex="-1" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="lineModalLabel">Owner Detail</h5>
            
           <button type="button" data-target="#ownerdetails" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
         </div>
         <div class="modal-body padtbs" id="proenqownerdetail">
            <h6><b><i class="la la-user" aria-hidden="true"></i> Name:<?php echo $product->ownername?></b></h6>
            <h6><b><i class="la la-phone" aria-hidden="true"></i> Contact Numbder:</b> <?php echo $product->ownerphone; ?></h6>
         </div>
      </div>
   </div>
 </div>
<script>  
function Map123() {  
var lattitude="<?php echo $product->latitude?>";
var longitude="<?php echo $product->longitude?>";
var myLatlng = new google.maps.LatLng(lattitude,longitude);
var mapOptions = {
  zoom: 16,
  center: myLatlng
}
var map = new google.maps.Map(document.getElementById("map"), mapOptions);

var marker = new google.maps.Marker({
    position: myLatlng,
    title:"Hello World!"
});

// To add the marker to the map, call setMap();
var circle=new google.maps.Circle({
   center: myLatlng,
    radius:100,
    fillColor: '#AA0000',
    fillOpacity: 0.3,
  strokeColor: '#AA0000',
  strokeOpacity: 0.8,
  strokeWeight: 2,
});
marker.setMap(map);
circle.setMap(map);
}  
</script>  
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPz503b8Th2oQGXGsqAVA21jrESJf4c4Q&callback=Map123"></script>  