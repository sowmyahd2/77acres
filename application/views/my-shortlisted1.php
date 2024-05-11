
<!--End Page Title-->
<!-- Sidebar Page Container -->
<style>
@media only screen and (max-width: 680px) {
	.theme-btn {
    width: 100%;
    margin-top: 30px;
    text-align: center;
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
    li:hover {
        padding:2px !important;
       -webkit-box-pack: initial !important;
    }
</style>
  <div class="dashboard">
    <div class="row">
					<div class="column col-lg-12">
						<div class="properties-box">
							<div class="title">
								<h3>Shortlisted Properties</h3>
							</div>
							<div class="inner-container">
				<?php 
				if(is_array($products) && count($products)){
               	$pro=0; foreach ($products as $key => $products) { 
               	$url_statename = !empty($products->sname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$products->sname):"null";
               	$url_cityname = !empty($products->cname)?preg_replace('/[^a-zA-Z0-9\-]/', '-',$products->cname):"nill";
               	if($products-> image!='' && file_exists('./uploads/products/'.$products->image)) $src = base_url().'uploads/products/'.$products->image; else $src = base_url(IMAGES).'/dummy.png';
               	?>
               	
               	        
								<!-- Property Block -->
								<div class="property-block">
									<div class="inner-box clearfix">
										<div class="row clearfix">
											<div class="column col-xl-3 col-lg-12 col-md-12 col-sm-12">
											<div class="image-box">
											    
                                 <figure class="image"><img src="<?php echo $src;?>" alt="<?php echo $products->name;?>" class="imagesnwe" ></figure>
                                 <span class="for  new_buycode"><?php echo strtoupper($products->protype); ?></span>
                                 <?php echo ($products->feature=="YES")?"<span class='featured'>FEATURED</span>":""; ?>
                                         
                        <ul style="position: absolute;
    bottom: 10px;
    width: 100%;
    padding: 0;
    z-index: 99;background:#F5F5F;">
                                      
                                      
                                       <li style="bottom:-10px; float:right;margin-top:20px;position:relative;color:#ffffff;padding:10px 5px 0px 5px !important"> &#8377;<?php echo price_format($products->priceper)."/". $products->areatype;?></li>
                                        <li style="left:-180px;bottom:0px;color:#ffffff;padding:10px 5px 0px 5px !important">PRICE</li>
                                        
                                        <?php 
                                                         
                                        $this->db->from('product_specification');
                                        $this->db->where('product_id',$products->id);
                                        $this->db->where('spec_id',35);
                                        $query = $this->db->get()->row();
                                        ?>
                                     <li style="left:-167px;bottom:0px;color:#ffffff;padding:10px 5px 0px 5px !important"> &#8377; <?php echo price_format($products->price);?> </li>
                                      <li style="left:-180px;bottom:0px;color:#ffffff;padding:10px 5px 0px 5px !important">Total Area</li>
                                  <li style="left:-167px;bottom:0px;color:#ffffff;padding:10px 5px 0px 5px !important"> <?php echo price_format($products->totalarea)."".$products->areatype;?> </li>
                                  
                                  </ul>
                     </ul>
                   			
                               
                              </div>
												
											</div>

											<div class="column col-xl-7 col-lg-12 col-md-12 col-sm-12">
												<div class="content-box">
												    <br>
												    <div class="column col-xl-7 col-lg-12 col-md-12 col-sm-12">
                                                    <ul class="tags">
                      <a href="<?php echo  site_url('property/type/'.$products->protype.'/'.$buyproducts->url_name)?>"><?php echo $products->subcat;?>,</a>
                     <a href="<?php echo  site_url('property/type/'.$products->protype.'/'.$buyproducts->url_name)?>"><?php echo $products->catagory;?></a>
                    
                  </ul>
													<h3><a style="font-weight:bold" href="<?php echo site_url('property/overview/').$products->id.'/'.$url_statename.'/'.$url_cityname.'/'.$products->sku_id;?>"><?php echo $products->name;?></a></h3>
													</div>
													
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
													<input type="hidden" id="userloginstatus" value="YES"/>
													 <a class="theme-btn btn-style-one propertyenqbutton1"  data-id="<?php echo $products->id;?>"   >Enquire Now</a> 
													</div>
												</div>
											</div>

											<div class="column col-xl-2 col-lg-12 col-md-12 col-sm-12">
												<div class="option-box">
												 
													
													<ul class="action-list">
													
														<a  href="<?php echo site_url('property/overview/').$products->id.'/'.$url_statename.'/'.$url_cityname.'/'.$products->sku_id;?>"
										><i class="la la-eye"></i> More Details</a>
                                        <a href="#" onclick="wishListDelete(<?php echo $products->wishid; ?>)"><i class="la la-trash-o"></i> Delete</a>			
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php } } else { ?>
								<div class="property-block">
									<div class="inner-box clearfix">
										<img src="<?php echo base_url(IMAGES); ?>/noProperty.png" width="100%">
									</div>
								</div>
								<?php }?>

								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
        $('#propertyAppoinmentModel').modal('toggle'); 
    }
    //$('.modal-backdrop').remove();
});
</script>
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