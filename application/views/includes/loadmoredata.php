   <div class="row">
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
                  
                      <div style="float:left;text-align:left;">
                          <ul class="info clearfix" style="background: #0006;">
              
                             <li style="float:left;text-align:left;">PRICE</li>
                           
                     <li style="float:left;text-align:left;"><a href=""> &#8377; <?php echo price_format($products->price);?> </a></li>
                    <li style="float:left;text-align:left;">Total Area</li>
                  <li style="float:left;text-align:left;"><a href="">  <?php echo $products->totalarea."/".$products->areatype;?> </a></li>
                  
                  </ul>
                    </div>
                    <div style="">
                          <ul class="info clearfix" style="background: #0006;">
                       
                       <li style="position: relative;top:-25px"><a href="">  &#8377;<?php echo price_format($products->priceper)."/". $products->areatype;?> </a></li>
              
                            
                  
                  </ul>
                    </div>
                  
                  </div>
             
               <div class="lower-content" style="height:260px">
                  <ul class="tags">
                     <li><a href=""><?php echo $products->catagory;?></a>,</li>
                     <li><a href=""><?php echo $products->subcat;?></a></li>
                  </ul>
                  <h3 style="height:25px ;overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;"><a href="<?php echo site_url('property/overview/').$products->id.'/'.$url_statename.'/'.$url_cityname.'/'.$products->sku_id;?>"><?php echo $products->name;?></a></h3>
                  <div class="lucation"><i class="la la-map-marker"></i> <?php  if($products->localityname!=""){ echo  ucfirst($products->aname).","; } ?><? if($products->landmark!=""){ echo  ucfirst($products->landmark).","; }?>
                  <?php echo ucfirst($products->cname).", ".ucfirst($products->sname).'-'.$products->pincode;?></div>
               
                  
                  <div class="property-price clearfix">
                     <div class="read-more"><a href="<?php echo site_url('property/overview/').$products->id.'/'.$url_statename.'/'.$url_cityname.'/'.$products->sku_id;?>" class="theme-btn">More Detail</a></div>
                     <div class="price"><a data-toggle="modal" data-target="#contactModal" data-backdrop="false">Call</a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Property Block -->
         <?php  } } ?>
      </div>