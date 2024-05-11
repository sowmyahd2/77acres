<?php $this -> load -> view('includes/header.php') ?>
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
	<link href="<?php echo base_url(CSS); ?>/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url(CSS); ?>/bootstrap-select.min.css" rel="stylesheet">
	<link href="<?php echo base_url(CSS); ?>/bootstrap-multiselect.css" rel="stylesheet">
	<link href="<?php echo base_url(PLUGINS); ?>/revolution/css/settings.css" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
	<link href="<?php echo base_url(PLUGINS); ?>/revolution/css/layers.css" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
	<link href="<?php echo base_url(PLUGINS); ?>/revolution/css/navigation.css" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->
	<link href="<?php echo base_url(CSS); ?>/jquery.steps.css" rel="stylesheet">
	<link href="<?php echo base_url(CSS); ?>/dashboard-style.css" rel="stylesheet">
	<link href="<?php echo base_url(CSS); ?>/style.css" rel="stylesheet">
	<link href="<?php echo base_url(CSS); ?>/stylev.css" rel="stylesheet">
	<link href="<?php echo base_url(CSS); ?>/responsive.css" rel="stylesheet">
	<link href="<?php echo base_url(CSS); ?>/slick.min.css" rel="stylesheet">
	<link href="<?php echo base_url(CSS); ?>/otherproperty.css" rel="stylesheet"> 
	
	<style>
	.del{
	    padding-right:50px;
	}
	</style>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
<ol class="breadcrumb">
<li><a href="<?php echo base_url(admin); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="<?php echo site_url().admin.'products/index/'.$category->url_name;?>"><?php echo $category->name; ?></a></li>
<li class="active">Edit <?php echo $product->name; ?></li>
</ol>
<h1>
Edit Property Details 
</h1>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title"><b> <i class="fa fa-edit" style="font-size:17px;"></i> Edit Content</b></h3>
<div class="box-tools pull-right">
<a href="<?php echo site_url().admin.'products/index/'.$category->url_name;?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->

<div class="box-body" style="-webkit-box-shadow: 0 0 10px rgb(34, 34, 34);">
<?php echo form_open_multipart(admin."products/add_product",'class="form-horizontal form-bordered .validate"');?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-menu"></i>Edit <?php echo $product->name; ?></h6>
          </div>
          <div class="panel-body"> 
          <?php 
            echo "<input type='hidden' name='cat_id' value='".$product->cat_id."'>";
            ?>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <label>Owner Name</label>
                    <input type="text" name="owner name" disabled class="form-control required" value="<?php echo $dealer->name; ?>">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <label>Email</label>
                    <input type="text" name="emailaddress" disabled class="form-control required " value="<?php echo $dealer->email; ?>">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <label>Phone</label>
                    <input type="text" name="phone" disabled class="form-control required " value="<?php echo $dealer->phone; ?>">
                </div>
            </div>
            <div class="cleafix"></div>
            <div class="row">
                <?php
      
                $type=$dealer->type;
                 if($type == 1){
                                    $owner_disable = "";
                                    $dealer_disable = " disabled='disabled' ";
                                    $builder_disable = " disabled='disabled' ";
                                    $developer_disable = " disabled='disabled' ";
                                 } else if($type == 4){
                                    $owner_disable = " disabled='disabled' ";
                                    $dealer_disable = "";
                                    $builder_disable = " disabled='disabled' ";
                                    $developer_disable = " disabled='disabled' ";
                                 } else if($type == 2){
                                    $owner_disable = " disabled='disabled' ";
                                    $dealer_disable = " disabled='disabled' ";
                                    $developer_disable = " disabled='disabled' ";
                                    $builder_disable = "";
                                 } else if($type == 3){
                                    $owner_disable = " disabled='disabled' ";
                                    $dealer_disable = " disabled='disabled' ";
                                    $builder_disable = " disabled='disabled' ";
                                    $developer_disable = "";
                                 }
                                 
                           ?>
                
                <div class="col-md-6 col-sm-6 col-xs-6">
                        <label class="control-label">User Type <span class="error">*</span></label>
                        <div class="radio_owner">
                          <label class="radio-inline radio-btn">
         
                                       <input required="required" type="radio" name="user_type" value="1"  <?php echo $owner_disable; ?> <?php echo empty($type)?"checked='checked'":""; ?> <?php echo ($type == "owner")?"checked='checked'":""; ?> > Owner
                                       <span class="checkmark"></span>
                                       </label>
                                       <label class="radio-inline radio-btn">
                                       <input type="radio" name="user_type" value="4" <?php echo $dealer_disable; ?> <?php echo ($type ==4)?"checked='checked'" :""; ?>> RB Consultant
                                       <span class="checkmark"></span>
                                       </label>
                                       <label class="radio-inline radio-btn">
                                       <input type="radio" name="user_type" value="2" <?php echo $builder_disable; ?> <?php echo ($type == 2)?"checked='checked'":""; ?> > Builder
                                       <span class="checkmark"></span>
                                       </label>
                                       <label class="radio-inline radio-btn">
                                       <input type="radio" name="user_type" value="3" <?php echo $developer_disable; ?> <?php echo ($type == 3)?"checked='checked'":""; ?> > Developer
                                       <span class="checkmark"></span>
                                       </label>
                        </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                        <label class="control-label">Property Type <span class="error">*</span></label>
                              <div class="radio_owner">
                                          <label class="radio-inline radio-btn">
                                          <input type="radio" class="property_typecheck" id="sells" name="propertytype" value="1" <?php echo ($product->propertytype == "1")?"checked='checked' ":""; ?>> Sell
                                          <span class="checkmark"></span>
                                          </label>
                                          <label class="radio-inline radio-btn">
                                          <input type="radio" class="property_typecheck" id="rents" name="propertytype" value="2" <?php echo ($product->propertytype == "2")?"checked='checked' ":""; ?>> Rent
                                          <span class="checkmark"></span>
                                          </label>
                                          <label class="radio-inline radio-btn">
                                          <input type="radio" class="property_typecheck" id="lease" name="propertytype" value="3" <?php echo ($product->propertytype == "3")?"checked='checked' ":""; ?>> Lease
                                          <span class="checkmark"></span>
                                          
                                          </label>
                                       </div>
                </div>
               
                </div>
            <div class="cleafix"></div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label">Category Name <span class="error">*</span></label>       
                    <?php  $main_categories [''] = 'Select Category name';
                    $options =' id="main_id" data-placeholder="Choose a category name..." class="form-control required" ';
                    echo form_dropdown('main_id',$main_categories,$category->parent_id,$options);?>
                    <label for="main_id" class="error"></label>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <label class="control-label">Sub Category  Name <span class="error">*</span></label>
                    <?php if(isset($sub_categories) && count($sub_categories) && is_array($sub_categories)){
                    $sub_categories [''] = 'Select Sub Category name';
                    $options =' id="sub_categoty" data-placeholder="Choose a category name..." class="form-control required" ';
                    echo form_dropdown('cat_id',$sub_categories,$product->cat_id,$options);

                    } else {
                    ?>
                    <select id="sub_categoty" name="cat_id" data-placeholder="Choose a Category..." class="form-control required" >
                    <option value="">Select Sub Category</option>
                    </select>
                    <?php
                    }
                    ?>
                    <label for="sub_categoty" class="error"></label>
                    <?php
                    $basic_resale = $rera_status = "";
                    if($product->propertytype != "1"){
                    $basic_resale = $rera_status = " style='display: none;' ";

                    }
                    ?>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                      <label class="control-label">Rera Status <span class="error">*</span></label>
                        <div class="" id="rera_status" <?php echo $rera_status; ?>>
                        <?php  $rerastatus = array(''=>'Rera Status','yes'=>'Yes','no'=>'No');
                        $options =' id="rerastatus" data-placeholder="Choose a option name..." class="form-control required" ';
                        echo form_dropdown('rerastatus',$rerastatus,$product->rerastatus,$options);?>
                        <label for="name" class="error"></label>
                        </div>
                    </div>
                </div>
                <div class="cleafix"></div>     
                <div class="row">    
                        <!--col-md-6 ended-->
                        <div class="col-md-3 col-sm-3 col-xs-12" id="basic_reraid" <?php echo ($product->rerastatus == "no")?"style='display: none;' ":""; ?> <?php echo $rera_status; ?>>
                              <label>Rera Id</label>
                              <input type="text" class="form-control" name="reraid" id="reraid" placeholder="RERA ID" value="<?php echo $products->reraid; ?>">
                              <span class="error" id="reraiderror"></span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12" id="basic_reraurl" <?php echo ($product->rerastatus == "no")?"style='display: none;' ":""; ?> <?php echo $rera_status; ?>>
                              <label>Rera URL</label>
                              <input type="text" class="form-control" name="reraurl" id="reraurl" placeholder="RERA URL" value="<?php echo $product->reraurl; ?>">
                              <span class="error" id="reraurlerror"></span>
                        </div>
                      
                      <div class="col-md-6 hidden-xs"></div>
                </div>
                <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label">Project Name <span class="error">*</span></label>
                          <input type="text" class="form-control" placeholder="Project Name" name="projectname" id="projectname"  value="<?php echo $product->name; ?>" onkeypress="return alphaOnly(event)">
                        </div>
                    </div>
                <div class="cleafix"></div>  
                <div class="row">
             
                
                 <div class="col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label">Address <span class="error">*</span></label>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                                   
                                   <label>Pin code</label>
                                   <input type="text" class="form-control" placeholder="" pattern="[0-9]{6}" maxlength="6" minlength="6" name="pincode" id="pincode" value="<?php echo $product->pincode; ?>" onkeypress="return isNumber(event)" >
                               
                             </div>
                    <!--col-md-4 ended-->
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label>State</label>
                      <input  type="text" class="form-control" placeholder="statename" value="<?= $product->statename ?>" name="statename" id="statename1" >
                                    
                      </div>                              
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label>City</label>
                     
                       <input  type="text" class="form-control" value="<?php echo $product->cityname;?>" placeholder="cityname" name="cityname" id="cityname1" >
                      
                    </div>
                    <!--col-md-4 ended-->
                        <div class="col-md-3 col-sm-3 col-xs-12">
                        <label>Locality</label>
                        <?php
                        if(!empty($product->cityname)){
                        $localitydtl [''] = 'Select Locality';
                        $options = ' id="localityname1" data-placeholder="Choose a Locality" class="form-control" ';
                        echo form_dropdown('localityname', $localitydtl, $product->localityname,$options);
                        } else {
                        ?>
                        <select id="localityname1" name="localityname" data-placeholder="Choose a Locality..." class="form-control" >
                        <option value=""> Locality</option>
                        </select>
                        <?php
                        }
                        ?>

                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                      <label>Sub Locality</label>
                      <input type="text" class="form-control" placeholder="" name="landmark" id="landmark" value="<?php echo $product->landmark; ?>" onkeypress="return alphaOnly(event)">
                    </div>
                    <!--col-md-4 ended-->
                                    <div class="cleafix"></div>
                                  
                                
                                 <!--col-md-4 ended-->
                                 <!--col-md-4 ended-->
                                 <div class="col-md-3 col-sm-3 col-xs-12">
                                    
                                       <label>Enter Map Latitude  coordinates </label>
                                       <input  type="text" class="form-control" placeholder="Latitude" name="latitude" id="latitude" value="<?php echo $product->latitude; ?>">
                                    
                                 </div>
                                 <!--col-md-4 ended-->
                                 <!--col-md-4 ended-->
                                 <div class="col-md-3 col-sm-3 col-xs-12">
                                    
                                       <label>Enter Map Longitude  coordinates </label>
                                       <input  type="text" class="form-control" placeholder="Longitude" name="longitude" id="longitude" value="<?php echo $product->longitude; ?>">
                                   
                                 
                                 
                          </div>       
                                 
            
               </div>
            
             <label class="col-sm-12"><h1>Project Specification</h1></label>
            <div class="" id="product_specification">
  <div class="row form-group">
         
              <?php 
              $attrs ='multiple="multiple" class="form-control multi-select" tabindex="2"'; 
              $attr ='tabindex="2" class="form-control"'; 
              $spcno=count($specifications);
              if(isset($specifications) && is_array($specifications) && count($specifications)): $i=0;?>
                <?php foreach ($specifications as $key => $specification) { $k = $i;
                  $mandatorycheck = ($specification['mandatory']=="1")?' required="required"':'';
                    if(count($specification['values']) && $specification['type'] =='1') { ?>
                    <label class="col-sm-2 control-label"><?php echo $specification['name'] ?></label>
                    <div class="col-sm-4"> <?=form_dropdown("specification[$key][]", $specification['values'], (isset($psv[$key])) ? $psv[$key] : '',$attrs);?></div>                
                <?php  $i++; } elseif(count($specification['values']) && $specification['type'] =='2'){ ?>
                    <label class="col-sm-2 control-label"><?php echo $specification['name']; ?></label>
                    <div class="col-sm-4"> <?=form_dropdown("specification[$key][]", $specification['values'], (isset($psv[$key])) ? $psv[$key][0] : '',$attr);?></div>                
                <?php  $i++; } else{ ?> 
                    <label class="col-sm-2 control-label"><?php echo $specification['name']; ?></label>
                    <?php if($specification['datatype'] =='1'){ 
                      $areadivvalue = ($specification['areatype']=="1")?'2':'4';
                    ?>
                    <div class="col-sm-<?php echo $areadivvalue; ?>"> <input type="number" min="0" name="specification[<?=$key?>][]" class="form-control" onkeypress="return isNumber(event)" value="<?php echo (isset($psv[$key])) ? $psv[$key][0] : ''?>"></div> 
                    <?php if($specification['areatype'] == "1"){ ?>
                      <div class="col-sm-2"> 
                      <?php  $propertyareatype [''] = 'Select Type';
                      $options =' id="specareatype" data-placeholder="Choose a type..." class="form-control required" tabindex="2"';
                      echo form_dropdown('specareatype['.$key.'][]',$propertyareatype,(isset($psvtype[$key])) ? $psvtype[$key][0] : '',$options);?>
                      </div>
                    <?php } } else { ?>
                    <div class="col-sm-4"> <input type="text" name="specification[<?=$key?>][]" class="form-control" value="<?php echo (isset($psv[$key])) ? $psv[$key][0] : ''?>"></div>
                    <?php } ?> 

                <?php $i++; } echo ($i%2==0 && $i!= $spcno && $k!=$i)? '</div><div class="form-group">':''; }?>
              <?php endif; ?>
              </div>   
              
                </div>   
          <div class="cleafix"></div>
             <div class="row form-group">
                 
            
              <label class="col-sm-2 control-label">Total Area</label>
              <div class="col-sm-2">
                <input type="text" name="totalarea" id="plotarea" class="form-control " required="required" value="<?php echo $product->totalarea; ?>">
              </div>
                 <div class="col-sm-2">
                <?php  
                $options = ' id="proareatype" data-placeholder="Choose a Property Area..." class="form-control required" tabindex="2"';
                echo form_dropdown('proareatype', $propertyareatype, $product->areatype,$options);?>
              </div>
                 <label class="col-sm-2 control-label">Price <span class="error">*</label>
              <div class="col-sm-4">
        <input type="text" id="price" value="<?php echo $product->price;?>" name="totlalprice" class="form-control required number" required="required">      
              </div>
               
            
             </div> 
                  <div class="row form-group">
                 
            
               <label class="col-sm-2 control-label"> Price Per<span class="error">*</span></label>
              <div class="col-sm-4">
                 <input type="text" id="priceper" value="<?php echo $product->priceper;?>" name="priceper" class="form-control required number" required="required"> 
              </div>
                
                <label class="col-sm-2 control-label">Product Video 1</label>
              <div class="col-sm-4">
         <input type="text" name="video1" value="<?php echo $product->video1; ?>" id="video1" class="form-control">
                 <span class="help-block">This will take only youtube video id</span> </div>     
              </div>
               
                   <div class="row form-group">
                 
            
               <label class="col-sm-2 control-label"> Brouchure<span class="error">*</span></label>
              <div class="col-sm-2">
                <input  type="file" class="form-control" placeholder="brochure" name="brochure" id="brochure" onchange="validateBrochure(this.name)">
      <span class="help-block">Brochure Accepted only pdf formats</span>
              </div>
                
               
              </div>
             </div> 
             <div class="row">
        
        
              
           <!-- <label class="col-sm-2 control-label">Feature Property</label>
              <div class="col-sm-4">
                 <?php
               /* $feature = array('NO' => "NO" ,"YES" => "YES");
                $options =' id="feature" data-placeholder="Choose a Option..." class="form-control required" tabindex="2"';
                echo form_dropdown('feature',$feature,$product->feature,$options);*/
                ?>               
              </div> -->
            </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Product Description</label>
                <div class="col-sm-10">
                    <textarea class="editor textarea" id='sample-editor' name="description" id="desc" style="width:100%" placeholder="Enter text ..." rows="10" cols="80" required="required"><?=$product->description; ?></textarea>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Image *</label>
              <div class="col-sm-4">
                <input type="file" class="styled form-control" id="image" name="image" onchange="validateProImage(this.name)">
                <span class="help-block">Accepted formats: jpg, png, gif. Max file size <?php echo IMAGE_DISPLAY_SIZE; ?></span>
                <input type="hidden" value="<?php echo $product->image;?>" id="report-screenshot" name="old_image">
                <?php if($product ->image!="") : ?>
                <?php if((substr($product->image, 0, 7 ) === "http://") ||(substr($product->image, 0, 8) === "https://")) : 
                        $src=$product->image;
                      else :
                          $src=base_url('uploads/products').'/'.$product->image;
                      endif;
                  ?>         
                  <a href="<?php echo $src;?>" class="lightbox" title="<?php echo $product->name?>">
                    <img   id="imagePreview" src="<?php echo $src;?>" width="100" height="100" />
                  </a>
                <?php else: ?>
                     <img  id="imagePreview" src="<?php echo base_url(IMAGES).'/no-image-available.png'?>" width="100" height="100" />
                <?php endif; ?>
              </div>
            
            </div>
              <div class="form-actions del text-right">
                   <button class="btn-lg btn-danger" type="button" OnClick="Remove_0();">delete</button>
           
         </div>
         
            <div class="form-group">
              <label class="col-sm-2 control-label">Product sub image 1</label>
              <div class="col-sm-10">
                <input type="file" class="styled form-control" id="image1" name="image1" onchange="validateProImage(this.name)">
                <input type="hidden" value="<?php echo $product->image1?>" name="old_image1">
                <span class="help-block">Accepted formats: jpg, png, gif. Max file size <?php echo IMAGE_DISPLAY_SIZE; ?></span>
                 <?php if($product ->image1!="") : ?>
                  <?php if((substr($product->image1, 0, 7 ) === "http://") ||(substr($product->image1, 0, 8) === "https://")) : 
                        $src=$product->image1;
                      else :
                          $src=base_url('uploads/products').'/'.$product->image1;
                      endif;
                  ?>  
                  <a href="<?php echo $src;?>" class="lightbox" title="<?php echo $product->name?>">
                    <img   id="imagePreview1"src="<?php echo $src;?>" width="100" height="100" />
                  </a>
                <?php else: ?>
                     <img  id="imagePreview1" src="<?php echo base_url(IMAGES).'/no-image-available.png'?>" width="100" height="100" />
                <?php endif; ?>
                
              </div>
                <div class="row">
              
              </div>
               <div class="form-actions del text-right">
                   <button class="btn-lg btn-danger" type="button" OnClick="Remove_1();">delete</button>
           
         </div>
            </div>
         
            <div class="form-group">
              <label class="col-sm-2 control-label">Product sub image 2</label>
              <div class="col-sm-10">
                <input type="file" class="styled form-control" id="image2" name="image2" onchange="validateProImage(this.name)">
                <input type="hidden" value="<?php echo $product->image2?>" name="old_image2">
                <span class="help-block">Accepted formats: jpg, png, gif. Max file size <?php echo IMAGE_DISPLAY_SIZE; ?></span>
                 <?php if($product ->image2!="") : ?>
                  <?php if((substr($product->image2, 0, 7 ) === "http://") ||(substr($product->image2, 0, 8) === "https://")) : 
                        $src=$product->image2;
                      else :
                          $src=base_url('uploads/products').'/'.$product->image2;
                      endif;
                  ?>  
                  <a href="<?php echo $src?>" class="lightbox" title="<?php echo $product->name?>">
                    <img  id="imagePreview2" src="<?php echo $src?>" width="100" height="100" />
                  </a>
                <?php else: ?>
                     <img id="imagePreview2" src="<?php echo base_url(IMAGES).'/no-image-available.png'?>" width="100" height="100" />
                <?php endif; ?>
              </div>
                <div class="form-actions del text-right">
                   <button class="btn-lg btn-danger" type="button" OnClick="Remove_2();">delete</button>
           
         </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Product sub image 3</label>
              <div class="col-sm-10">
                <input type="file" class="styled form-control" id="image3" name="image3" onchange="validateProImage(this.name)">
                <input type="hidden" value="<?php echo $product->image3?>" name="old_image3">
                <span class="help-block">Accepted formats: jpg, png, gif. Max file size <?php echo IMAGE_DISPLAY_SIZE; ?></span>
                 <?php if($product ->image3!="") : ?>
                  <?php if((substr($product->image3, 0, 7 ) === "http://") ||(substr($product->image3, 0, 8) === "https://")) : 
                        $src=$product->image3;
                      else :
                          $src=base_url('uploads/products').'/'.$product->image3;
                      endif;
                  ?>  
                  <a href="<?php echo $src?>" class="lightbox" title="<?php echo $product->name?>">
                    <img  id="imagePreview3" src="<?php echo $src?>" width="100" height="100" />
                  </a>
                <?php else: ?>
                     <img id="imagePreview3" src="<?php echo base_url(IMAGES).'/no-image-available.png'?>" width="100" height="100" />
                <?php endif; ?>
              </div>
              <div class="form-actions del text-right">
                   <button class="btn-lg btn-danger" type="button" OnClick="Remove_3();">delete</button>
           
         </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Product sub image 4</label>
              <div class="col-sm-10">
                <input type="file" class="styled form-control" id="image4" name="image4" onchange="validateProImage(this.name)">
                <input type="hidden" value="<?php echo $product->image4?>" name="old_image4">
                <span class="help-block">Accepted formats: jpg, png, gif. Max file size <?php echo IMAGE_DISPLAY_SIZE; ?></span>
                 <?php if($product ->image4!="") : ?>
                  <?php if((substr($product->image4, 0, 7 ) === "http://") ||(substr($product->image4, 0, 8) === "https://")) : 
                        $src=$product->image4;
                      else :
                          $src=base_url('uploads/products').'/'.$product->image4;
                      endif;
                  ?>  
                  <a href="<?php echo $src?>" class="lightbox" title="<?php echo $product->name?>">
                    <img  id="imagePreview4" src="<?php echo $src?>" width="100" height="100" />
                  </a>
                <?php else: ?>
                     <img id="imagePreview4" src="<?php echo base_url(IMAGES).'/no-image-available.png'?>" width="100" height="100" />
                <?php endif; ?>
              </div>
              <div class="form-actions del text-right">
                   <button class="btn-lg btn-danger" type="button" OnClick="Remove_4();">delete</button>
           
         </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Product sub image 5</label>
              <div class="col-sm-10">
                <input type="file" class="styled form-control" id="image5" name="image5" onchange="validateProImage(this.name)">
                <input type="hidden" value="<?php echo $product->image5?>" name="old_image5">
                <span class="help-block">Accepted formats: jpg, png, gif. Max file size <?php echo IMAGE_DISPLAY_SIZE; ?></span>
                 <?php if($product ->image5!="") : ?>
                  <?php if((substr($product->image5, 0, 7 ) === "http://") ||(substr($product->image5, 0, 8) === "https://")) : 
                        $src=$product->image5;
                      else :
                          $src=base_url('uploads/products').'/'.$product->image5;
                      endif;
                  ?>  
                  <a href="<?php echo $src?>" class="lightbox" title="<?php echo $product->name?>">
                    <img  id="imagePreview5" src="<?php echo $src?>" width="100" height="100" />
                  </a>
                <?php else: ?>
                     <img  id="imagePreview5"src="<?php echo base_url(IMAGES).'/no-image-available.png'?>" width="100" height="100" />
                <?php endif; ?>
              </div>
              <div class="form-actions del text-right">
                   <button class="btn-lg btn-danger" type="button" OnClick="Remove_5();">delete</button>
           
         </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Product sub image 6</label>
              <div class="col-sm-10">
                <input type="file" class="styled form-control" id="image6" name="image6" onchange="validateProImage(this.name)">
                <input type="hidden" value="<?php echo $product->image6?>" name="old_image6">
                <span class="help-block">Accepted formats: jpg, png, gif. Max file size <?php echo IMAGE_DISPLAY_SIZE; ?></span>
                 <?php if($product ->image6!="") : ?>
                  <?php if((substr($product->image6, 0, 7 ) === "http://") ||(substr($product->image6, 0, 8) === "https://")) : 
                        $src=$product->image6;
                      else :
                          $src=base_url('uploads/products').'/'.$product->image6;
                      endif;
                  ?>  
                  <a href="<?php echo $src?>" class="lightbox" title="<?php echo $product->name?>">
                    <img src="<?php echo $src?>" width="100" height="100" />
                  </a>
                <?php else: ?>
                     <img src="<?php echo base_url(IMAGES).'/no-image-available.png'?>" width="100" height="100" />
                <?php endif; ?>
              </div>
              <div class="form-actions del text-right">
                   <button class="btn-lg btn-danger" type="button" OnClick="Remove_6();">delete</button>
           
         </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Product sub image 7</label>
              <div class="col-sm-10">
                <input type="file" class="styled form-control" id="image7" name="image7" onchange="validateProImage(this.name)">
                <input type="hidden" value="<?php echo $product->image7?>" name="old_image7">
                <span class="help-block">Accepted formats: jpg, png, gif. Max file size <?php echo IMAGE_DISPLAY_SIZE; ?></span>
                 <?php if($product ->image7!="") : ?>
                  <?php if((substr($product->image7, 0, 7 ) === "http://") ||(substr($product->image7, 0, 8) === "https://")) : 
                        $src=$product->image7;
                      else :
                          $src=base_url('uploads/products').'/'.$product->image7;
                      endif;
                  ?>  
                  <a href="<?php echo $src?>" class="lightbox" title="<?php echo $product->name?>">
                    <img src="<?php echo $src?>" width="100" height="100" />
                  </a>
                <?php else: ?>
                     <img src="<?php echo base_url(IMAGES).'/no-image-available.png'?>" width="100" height="100" />
                <?php endif; ?>
              </div>
              <div class="form-actions del text-right">
                   <button class="btn-lg btn-danger" type="button" OnClick="Remove_7();">delete</button>
           
         </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Product sub image 8</label>
              <div class="col-sm-10">
                <input type="file" class="styled form-control" id="image8" name="image8" onchange="validateProImage(this.name)">
                <input type="hidden" value="<?php echo $product->image8?>" name="old_image8">
                <span class="help-block">Accepted formats: jpg, png, gif. Max file size <?php echo IMAGE_DISPLAY_SIZE; ?></span>
                 <?php if($product ->image8!="") : ?>
                  <?php if((substr($product->image8, 0, 7 ) === "http://") ||(substr($product->image8, 0, 8) === "https://")) : 
                        $src=$product->image8;
                      else :
                          $src=base_url('uploads/products').'/'.$product->image8;
                      endif;
                  ?>  
                  <a href="<?php echo $src?>" class="lightbox" title="<?php echo $product->name?>">
                    <img src="<?php echo $src?>" width="100" height="100" />
                  </a>
                <?php else: ?>
                     <img src="<?php echo base_url(IMAGES).'/no-image-available.png'?>" width="100" height="100" />
                <?php endif; ?>
              </div>
              <div class="form-actions del text-right">
                   <button class="btn-lg btn-danger" type="button" OnClick="Remove_8();">delete</button>
           
         </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Product sub image 9</label>
              <div class="col-sm-10">
                <input type="file" class="styled form-control" id="image9" name="image9" onchange="validateProImage(this.name)">
                <input type="hidden" value="<?php echo $product->image9?>" name="old_image9">
                <span class="help-block">Accepted formats: jpg, png, gif. Max file size <?php echo IMAGE_DISPLAY_SIZE; ?></span>
                 <?php if($product ->image9!="") : ?>
                  <?php if((substr($product->image9, 0, 7 ) === "http://") ||(substr($product->image9, 0, 8) === "https://")) : 
                        $src=$product->image9;
                      else :
                          $src=base_url('uploads/products').'/'.$product->image9;
                      endif;
                  ?>  
                  <a href="<?php echo $src?>" class="lightbox" title="<?php echo $product->name?>">
                    <img src="<?php echo $src?>" width="100" height="100" />
                  </a>
                <?php else: ?>
                     <img src="<?php echo base_url(IMAGES).'/no-image-available.png'?>" width="100" height="100" />
                <?php endif; ?>
              </div>
              <div class="form-actions del text-right">
                   <button class="btn-lg btn-danger" type="button" OnClick="Remove_9();">delete</button>
           
         </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Product sub image 10</label>
              <div class="col-sm-10">
                <input type="file" class="styled form-control" id="image10" name="image10" onchange="validateProImage(this.name)">
                <input type="hidden" value="<?php echo $product->image10?>" name="old_image10">
                <span class="help-block">Accepted formats: jpg, png, gif. Max file size <?php echo IMAGE_DISPLAY_SIZE; ?></span>
                 <?php if($product ->image10!="") : ?>
                  <?php if((substr($product->image10, 0, 7 ) === "http://") ||(substr($product->image10, 0, 8) === "https://")) : 
                        $src=$product->image10;
                      else :
                          $src=base_url('uploads/products').'/'.$product->image10;
                      endif;
                  ?>  
                  <a href="<?php echo $src?>" class="lightbox" title="<?php echo $product->name?>">
                    <img src="<?php echo $src?>" width="100" height="100" />
                  </a>
                <?php else: ?>
                     <img src="<?php echo base_url(IMAGES).'/no-image-available.png'?>" width="100" height="100" />
                <?php endif; ?>
              </div>
                   <div class="form-actions del text-right">
                   <button class="btn-lg btn-danger" type="button" OnClick="Remove_10();">delete</button>
           
         </div>  
            </div>
       

            
            
            
           
                  
         
          </div>
           <input type="hidden" name="curl" value="<?php echo site_url().admin.'products/index/'.$category->url_name;?>">       
            <input type="hidden" name="id" value="<?php echo $product->id;?>">       
            <div class="form-actions text-right">
            <a class="btn-lg btn-warning" href="<?php echo site_url().admin.'products/index/'.$category->url_name;?>">Cancel</a>
            <?php echo form_submit('submit', 'update','class="btn-lg btn-primary"');?> 
         </div>
         
        <?php echo form_close();?>
        
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
</div>
</div>
</div>
</section>
<!-- /.content -->
</aside> 
<input type="hidden" id="siteurl_data" value="<?php echo base_url(); ?>">
<input type="hidden" name="pid" id="propertyeid" value="<?php echo $product->id; ?>">
<script>

    function Remove_0() {
       
        document.getElementById("imagePreview").style.backgroundImage="url(<?php echo base_url(IMAGES).'/dummy-image.png'; ?>)";
        var propertyid = $("#propertyeid").val();
        removeImageFromServer('image',propertyid);
    }
    function Remove_1() {
        document.getElementById("imagePreview1").style.backgroundImage="url(<?php echo base_url(IMAGES).'/dummy-image.png'; ?>)";
        var propertyid = $("#propertyeid").val();
        removeImageFromServer('image1',propertyid);
    }
     function Remove_2() {
        document.getElementById("imagePreview2").style.backgroundImage="url(<?php echo base_url(IMAGES).'/dummy-image.png'; ?>)";
        var propertyid = $("#propertyeid").val();
        removeImageFromServer('image2',propertyid);
    }
     function Remove_3() {
        document.getElementById("imagePreview3").style.backgroundImage="url(<?php echo base_url(IMAGES).'/dummy-image.png'; ?>)";
        var propertyid = $("#propertyeid").val();
        removeImageFromServer('image3',propertyid);
    }
     function Remove_4() {
        document.getElementById("imagePreview4").style.backgroundImage="url(<?php echo base_url(IMAGES).'/dummy-image.png'; ?>)";
        var propertyid = $("#propertyeid").val();
        removeImageFromServer('image4',propertyid);
    }
     function Remove_5() {
        document.getElementById("imagePreview5").style.backgroundImage="url(<?php echo base_url(IMAGES).'/dummy-image.png'; ?>)";
        var propertyid = $("#propertyeid").val();
        removeImageFromServer('image5',propertyid);
    }
     function Remove_6() {
        document.getElementById("imagePreview6").style.backgroundImage="url(<?php echo base_url(IMAGES).'/dummy-image.png'; ?>)";
        var propertyid = $("#propertyeid").val();
        removeImageFromServer('image6',propertyid);
    }
     function Remove_7() {
        document.getElementById("imagePreview7").style.backgroundImage="url(<?php echo base_url(IMAGES).'/dummy-image.png'; ?>)";
        var propertyid = $("#propertyeid").val();
        removeImageFromServer('image7',propertyid);
    }
     function Remove_8() {
        document.getElementById("imagePreview8").style.backgroundImage="url(<?php echo base_url(IMAGES).'/dummy-image.png'; ?>)";
        var propertyid = $("#propertyeid").val();
        removeImageFromServer('image8',propertyid);
    }
     function Remove_9() {
        document.getElementById("imagePreview9").style.backgroundImage="url(<?php echo base_url(IMAGES).'/dummy-image.png'; ?>)";
        var propertyid = $("#propertyeid").val();
        removeImageFromServer('image9',propertyid);
    }
     function Remove_10() {
        document.getElementById("imagePreview10").style.backgroundImage="url(<?php echo base_url(IMAGES).'/dummy-image.png'; ?>)";
        var propertyid = $("#propertyeid").val();
        removeImageFromServer('image10',propertyid);
    }

   function removeImageFromServer(img,proid)
   {
         var siteurl = $("#siteurl_data").val(); 
         alert(proid);
         $.ajax({
            type: "POST",
            url:siteurl+"property/deleteProImage/"+img+"/"+proid,          
            success: function(data)
            {
               //alert(data);
            }
         });
   }
</script>
<script>

    CKEDITOR.replace('description');
  </script>
<script type="text/javascript">


          $(".property_typecheck").change(function(){ 
    var siteurl = $("#siteurl_data").val();

        if( $(this).is(":checked") ){ 
            var val = $(this).val(); 
            if(val == "1"){
                $("#basic_resale").show();
                $("#rera_status").show();
            } else {
                $("#basic_resale").hide();
                $("#rera_status").hide();
            }
            $('#main_id').select('destroy');
            var p_data =
    {
        val: val
    };
            $.ajax({
                url:siteurl+"users/getgroupcategory",
                type: "POST",
                data: p_data,
                success: function(message)
                { 
                
               
                 $('#main_id').html(message);
                }
                
              });
       
            return false;
        }
    });
      $(document).on('change','#main_id',function(){
    var siteurl = $("#siteurl_data").val(); 
    var value = $(this).val();
    $.ajax({
        type: "POST",
        url:siteurl+"property/subcategory/"+value,          
        success: function(data)
        {
            if(data) $('#sub_categoty').html(data); 
            //--------------------
            $.ajax({
                type: "POST",
                url:siteurl+"property/prospecification/"+value,          
                success: function(specdata)
                {
                    if(data) $('#product_specification').html(specdata); 
                    
                }
            });
            //---------------------
            
        }
    });
    return false;
});
  $(document).ready(function(){
     
    
      
  $('#products').addClass('active');
  $('#result').hide();
    $('#products a').attr('id','second-level');
    $('#products li a').each(function() {
       if($(this).attr('href') == '<?php echo current_url();?>' )
        $(this).closest('li').addClass('active');
    });  

    
  $(document).on('click','.delete',function(){
      if(confirm('Are you sure to delete')){
        $.ajax({url:"<?php echo site_url().admin?>products/delete/"+$(this).attr('data'), 
          success:function(data){window.location.reload(true);}});
      }
    });

    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
    } 
    $('.nav-tabs a').on('shown', function (e) {
        window.location.hash = e.target.hash;
    })
  
    $(document).on('click','.status_check1',function(){
      if(confirm("Are you sure to do this action")){
        var current_element = $(this);
        if($(this).hasClass("btn-success")) var status = 0;
        else var status = 1;
        url = "<?php echo site_url().admin?>/products/status";
        $.ajax({
          type:"POST",
          url: url,
          data: {ct_id:$(current_element).attr('data'),status:status},
          success: function(data)
          {   
            if(status) $(current_element).addClass('btn-success icon-checkmark').removeClass('btn-danger icon-close');
            else $(current_element).removeClass('btn-success icon-checkmark').addClass('btn-danger icon-close');
          }
        });
      }
      
    });    
  
  $('#prode').addClass('active');
  //---------------------------------
      $(document).on('change','#state_id',function(){
          var siteurl = $("#siteurl_data").val(); 
          var value = $(this).val();
          $.ajax({
              type: "POST",
              url:siteurl+"property/cityselect/"+value,          
              success: function(data)
              {
                  if(data) $('#city_id').html(data); 
                  
              }
          });
          return false;
      });
      //---------------------------------
      $(document).on('change','#city_id',function(){
          var siteurl = $("#siteurl_data").val(); 
          var value = $(this).val();
          $.ajax({
              type: "POST",
              url:siteurl+"property/areaselect/"+value,          
              success: function(data)
              {
                  if(data) $('#locality_id').html(data); 
                  
              }
          });
          return false;
      });
// country - state
  

  $(document).on('change','#sub_categoty',function(){
    var siteurl = $("#siteurl_data").val(); 
    var value = $(this).val();
    var mainid= $("#main_id").val();
    
            
            //--------------------
            $.ajax({
                type: "POST",
                url:siteurl+"property/prosubspecification/"+value+"/"+mainid,          
                success: function(specdata)
                {
                    if(specdata) $('#product_specification').html(specdata); 
                    
                }
            });
            //---------------------
            
        
    
    return false;
});
});
</script>
<script>
  
    $(document).on('change','#catt_id',function(){
      var value = $(this).val();
     
      var url = "<?php echo site_url().admin?>/products/subcategory/"+value;
      $.ajax({
         url: url,
         success: function(data)
         {
             if(data) $('#subb_id').html(data); 
         }
       });
      $('#subb_id').select2("val","");
    });

    /*$(document).on('change','#subb_id',function(){
      var value = $(this).val();
     
      var url = "<?php echo site_url().admin?>/product_details/sub_subcategory/"+value;
      $.ajax({
         url: url,
         success: function(data)
         {
             if(data) $('#subb_subid').html(data); 
         }
       });
      $('#subb_subid').select2("val","");
    });*/
    $(document).on('change','#subb_id',function(){
      var value = document.getElementById("subb_id").value;;
    
      var url = "<?php echo site_url().admin?>/products/specification/"+value;
       //alert(url);
      $.ajax({
         url: url,
         success: function(data)
         {
         //alert(data);                                                                                                     alert(data);
             if(data) $('#size_id').html(data); 
         }
       });
      $('#size_id').select2("val","");
    });

    $(document).on('click','.status_checks',function(){
      var status = ($(this).hasClass("btn-success")) ? '1' : '0';
      var msg = (status=='1')? 'Deactivate' : 'Activate';
      if(confirm("Are you sure to "+ msg)){
        var current_element = $(this);
        url = "<?php echo site_url().admin;?>/products/active_status";
        $.ajax({
          type:"POST",
          url: url,
          data: {abs_id:$(current_element).attr('data'),status:status},
          success: function(data)
          {   
            location.reload();
          }
        });
      }      
    });
    $(document).on('click','.status_checkc',function(){
      var status = ($(this).hasClass("btn-success")) ? '0' : '1';
      var msg = (status=='0')? 'Deactivate' : 'Activate';
      if(confirm("Are you sure to "+ msg)){
        var current_element = $(this);
        url = "<?php echo site_url().admin;?>/products/coupon_update";
        $.ajax({
          type:"POST",
          url: url,
          data: {abs_id:$(current_element).attr('data'),status:status},
          success: function(data)
          {   
            location.reload();
          }
        });
      }      
    });
   
    $(document).on('change', '#plotarea', function() {
   
 
 
        var pp = $("#price").val();
        var ba = $("#plotarea").val();
        if(pp == "" || pp == "0"){
            $("#pricecalerror").html("Please enter price per area");
            $("#price").focus();
            return false;
        }
        if(ba == "" || ba == "0"){
            $("#pricecalerror").html("Please enter Total area");
            $("#plotarea").focus();
            return false;
        }
        $("#pricecalerror").html("");
        var priceper = parseInt(pp);
        var plotarea = parseInt(ba);
        var totalprice =   priceper/plotarea;
        $("#priceper").val(parseInt(totalprice));
         $("#pricepervalue").val(parseInt(totalprice));
    
    
});
$(document).on('change', '#price', function() {
     var propertytype = $('input[name="propertytype1"]:checked').val();
   
        var pp = $("#price").val();
        
        var ba = $("#plotarea").val();
        if(pp == "" || pp == "0"){
            $("#pricecalerror").html("Please enter price per area");
            $("#price").focus();
            return false;
        }
        if(ba == "" || ba == "0"){
            $("#pricecalerror").html("Please enter Total area");
            $("#plotarea").focus();
            return false;
        }
        $("#pricecalerror").html("");
        var priceper = parseInt(pp);
        var plotarea = parseInt(ba);
        var totalprice =   priceper/plotarea;
        $("#priceper").val(parseInt(totalprice));
        $("#pricepervalue").val(parseInt(totalprice));
    
   
    
   
});

    
    $(document).on('click','.status_checkf',function(){
      var status = ($(this).hasClass("btn-success")) ? '0' : '1';
      var msg = (status=='0')? 'Deactivate' : 'Activate';
      if(confirm("Are you sure to "+ msg)){
        var current_element = $(this);
        url = "<?php echo site_url().admin;?>/products/friend_update";
        $.ajax({
          type:"POST",
          url: url,
          data: {abs_id:$(current_element).attr('data'),status:status},
          success: function(data)
          {   
            location.reload();
          }
        });
      }      
    });


    function showColor()
    {
      var value = document.getElementById("subb_id").value;
      var url = "<?php echo site_url().admin?>/products/specificationcolor/"+value;
       //alert(value);
      $.ajax({
         url: url,
         success: function(data)
         {
         //alert(data);                                                                                                     alert(data);
             if(data) $('#colo_id').html(data); 
         }
       });
      $('#colo_id').select2("val","");

    }

    
    function validateProImage(name) {
      
        var formData = new FormData();
     
        var file = document.getElementById(name).files[0];
      
     
        formData.append("Filedata", file);
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
            alert("Please select a valid image file");
            document.getElementById(name).value = '';
            return false;
        }
        if (file.size > 1024000) {
            alert("Max Upload size is 1MB only");
            document.getElementById(name).value = '';
            return false;
        }
        return true;
    }

    //---------------validateBrochure
    function validateBrochure(name) {
        var formData = new FormData();
     
        var file = document.getElementById(name).files[0];
     
        formData.append("Filedata", file);
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "pdf") {
            alert("Please select a valid Brochure file");
            document.getElementById(name).value = '';
            return false;
        }
        if (file.size > 2048000) {
            alert("Max Upload size is 2MB only");
            
            document.getElementById(name).value = '';
            return false;
        }
        return true;
    }
    $(document).on('change','#rerastatus',function(){
    var val = $(this).val(); 

    if(val == "yes"){
        $("#basic_reraid").css('display',"block");
        $("#basic_reraurl").css('display',"block");
    } else {
        $("#basic_reraid").css('display',"none");
        $("#basic_reraurl").css('display',"none");
    }
});
    
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    };
</script>
<script>

$(document).on('keyup', '#pincode', function() {
if(value = ($(this).val().length==6)) {
  
var siteurl = $("#siteurl_data").val();

     var siteurl = $("#siteurl_data").val(); 
    var value = $(this).val();
    $.ajax({
        type: "POST",
        dataType : "json",
        url:siteurl+"property/getcitystate/"+value,          
        success: function(data)
        {
              
            $("#statename1").val(data.state);
       $("#cityname1").val(data.city);
       $("#localityname1").html(data.area);
          
            //---------------------
            
        }
    
    });
    return false;   
}
   
});
</script>