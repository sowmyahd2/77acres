<?php 
if(is_array($products) && count($products)){
$pro=0; foreach ($products as $key => $products) { 
$url_statename = !empty($products->sname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$products->sname):"nill";
$url_cityname = !empty($products->cname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$products->cname):"nill";
if($products-> image!='' && file_exists('./uploads/products/'.$products->image)) $src = base_url().'uploads/products/'.$products->image; else $src = base_url(IMAGES).'/dummy.png';
?>
<div class="property-block-three">
  <div class="inner-box">
     <div class="row clearfix">
        <div class="column col-xl-4 col-lg-12 col-md-12 col-sm-12">
           <div class="image-box">
              <figure class="imagesnwe"><img src="<?php echo $src;?>" alt="<?php echo $products->name;?>"></figure>
              <span class="for  new_buycode"><?php echo strtoupper($products->protype); ?></span>
              <?php echo ($products->feature=="YES")?"<span class='featured'>FEATURED</span>":""; ?>
            
            <ul style="position: absolute;
            bottom: 10px;
            width: 100%;
            padding: 0 20px; color:white;
            z-index: 99;background: #0006;background: #0006;">
            <li style="bottom:-10px; float:right;margin-top:20px;position:relative"> &#8377;<?php echo price_format($products->priceper)."/". $products->areatype;?></li>
            <li style="left:-180px;bottom:0px">PRICE</li>
            <?php 
            $this->db->from('product_specification');
            $this->db->where('product_id',$products->id);
            $this->db->where('spec_id',35);
            $query = $this->db->get()->row();
            ?>
            <li style="left:-167px;bottom:0px"> &#8377; <?php echo price_format($products->price);?> </li>
            <li style="left:-180px;bottom:0px">Total Area</li>
            <li style="left:-167px;bottom:0px"> <?php echo $products->totalarea."/".$products->areatype;?> </li>

            </ul>
           </div>
        </div>
        <div class="column col-xl-8 col-lg-12 col-md-12 col-sm-12">
           <div class="lower-content">
              <h3><a href="<?php echo site_url('property/overview/').$products->url_name.'/'.$url_statename.'/'.$url_cityname.'/'.$products->sku_id;?>"><?php echo $products->name;?></a> <button class="shortlist-icon"><i class="la la-heart-o"></i></button></h3>
             <div class="lucation"><i class="la la-map-marker"></i> <?php  if($products->localityname!=""){ echo  ucfirst($products->aname).","; } ?><? if($products->landmark!=""){ echo  ucfirst($products->landmark).","; }?>
                  <?php echo ucfirst($products->cname).", ".ucfirst($products->sname).'-'.$products->pincode;?></div>
              <ul class="property-info clearfix">
                 <?php
                                    echo !empty($products->catagory)?"<li><i class='flaticon-bed'></i> ".$products->subcat." ".$products->catagory."</li>":""; 
                                    ?>
              </ul>
              <div class="property-price clearfix">
                 <div class="read-more"><a href="<?php echo site_url('property/overview/').$products->url_name.'/'.$url_statename.'/'.$url_cityname.'/'.$products->sku_id;?>" class="theme-btn">More Detail</a></div>
                 <div class="price"><a data-toggle="modal" data-target="#contactModal" data-backdrop="false">Call</a></div>
              </div>
           </div>
        </div>
     </div>
  </div>
</div>
<?php } } else { ?>
 <div class="col-sm-12 col-md-9 col-lg-9 col-xs-12">
    <div class="card col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <center><img src="<?php echo base_url('uploads/products/english.svg'); ?>"></center>
    </div>
    </div>
<?php } ?>