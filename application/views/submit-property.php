<style>
   .avatar-upload {
   position: relative;
   margin-bottom: 21px;
   }
  
   .avatar-upload .avatar-edit {
   position: absolute;
   z-index: 1;
   left: 154px;
   top: -14px;
   }
   .avatar-upload .avatar-edit input {
   display: none;
   }
 @media all and (max-width: 767px) {
   .col-xs-12{
      margin-bottom: -2px !important;
   }
}
   .avatar-upload .avatar-edit input + label {
   display: inline-block;
   width: 34px;
   height: 34px;
   margin-bottom: 0;
   border-radius: 100%;
   background: #FFFFFF;
   border: 1px solid transparent;
   box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
   cursor: pointer;
   font-weight: normal;
   transition: all 0.2s ease-in-out;
   }
   .avatar-upload .avatar-edit input + label:hover {
   background: #f1f1f1;
   border-color: #d6d6d6;
   }
   .avatar-upload .avatar-edit input + label:after {
   content: "\2710";
   font-family: 'FontAwesome';
   color: #757575;
   position: absolute;
   top: 2px;
   left: 0;
   right: 0;
   text-align: center;
   margin: auto;
   }
   .avatar-upload .avatar-preview {
   width: 176px;
   height: 170px;
   position: relative;
   /* border-radius: 100%; */
   padding: 12px 20px;
   border: 2px dashed #525252;
   box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
   }
   .avatar-upload .avatar-preview > div {
   width: 100%;
   height: 100%;
   background-size: cover;
   background-repeat: no-repeat;
   background-position: center;
   }
   
</style>
  
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
<div class="dashboard" >
   <div class="container-fluid">
      <div class="content-area">
         <div class="dashboard-content">
            
               <div class="row">
                  <div class="col-md-4 col-sm-12">
                     <h4>Submit Property</h4>
                  </div>
               </div>
            
            <div class="row">
               <div class="column col-lg-12">
                  <div class="newstyle_card mt-3 tab-card">
             <?php
                        $fname = $phone = $address1 = $address2 = $city='';
                        $lname = $state = $zipcode = $email = $type = '';
                        
                        if($this ->session -> userdata('user'))
                        {   
                         
                           $fname = $rguser_details->name;
                           $phone = $rguser_details->phone;
                           $type = $rguser_details->type; 
                           $email = $rguser_details->email; 
                           $lname = $rguser_details->lname;       
                           $zipcode = $rguser_details->zip_code; 
                           $address1 = $rguser_details->address1;
                           $state = $rguser_details->state_id;
                           $city = $rguser_details->city_id;
                           $loginstatus = "YES";
                        } else { $loginstatus = "NO"; }
                        ?>
                     <input type="hidden" id="userloginstatus" value="<?php echo $loginstatus; ?>" >
            <?php echo form_open_multipart("property/add_property", 'id="postproperties_form"','class="property-submit-form"');?>
                     <?php
                     if (isset($products) && is_object($products)) {
                        ?>
                         <input type="hidden" name="pid" value="<?php echo $products->id; ?>">  
                        <?php
                     }
                     ?>
                     
                     <div class="tab-card-header">
                        <ul class="nav nav-tabs card-header-tabs testtabs newtablist" id="myTab" role="tablist">
                           <li class="nav-item active" id="1t" style="position:relative">
                              <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">1. Basic Details</a>
                              <div style="position:absolute;top:0;width:100%;height:100%"></div>
                           </li>
                           <li class="nav-item" id="2t" style="position:relative">
                              <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">2. Location</a>
                              <div style="position:absolute;top:0;width:100%;height:100%"></div>
                           </li>
                           <li class="nav-item" id="3t" style="position:relative">
                              <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">3. Property Details</a>
                              <div style="position:absolute;top:0;width:100%;height:100%"></div>
                           </li>
                           <li class="nav-item" id="4t" style="position:relative">
                              <a class="nav-link" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="four" aria-selected="false">4. Gallery</a>
                              <div style="position:absolute;top:0;width:100%;height:100%"></div>
                           </li>
                        </ul>
                     </div>
                     <div class="tab-content newdetailtab" id="myTabContent" style="display:block">
                        <div class="tab-pane fade show active p-3" id="one" role="tabpanel">
                           <div class="row">
                               
                              <div class="col-md-3 col-sm-6 col-xs-12 ">
                                 <div class="">
                                     <label>Your Name</label>
                                    <input type="text" name="name" id="name" disabled='disabled'  class="form-control" disabled='disabled' placeholder="Your Name*" required="required" onkeypress="return alphaOnly(event)" value="<?php echo $fname; ?>">
                                    <label for="name" class="error"></label>
                                 </div>
                              </div>
                              
                              <!--col-md-4 ended-->
                              <div class="col-md-3 col-sm-6 col-xs-12">
                                 <div class="">
                                     
                                 	<label>Email</label>
                                    <input type="email" name="pemailid" id="pemailid" disabled='disabled' class="form-control" disabled='disabled' placeholder="Email" required="required" <?php echo ($email)?"disabled='disabled'":""; ?>  value="<?php echo $email; ?>">
                                    <label for="pemailid" class="error"></label>
                                 </div>
                              </div>
                              <!--col-md-4 ended-->
                              <div class="col-md-3 col-sm-6 col-xs-12">
                                 <div class="">
                                 	<label>Mobile No</label>
                                    <input type="text" class="form-control" name="contact" id="contact" maxlength="10" disabled='disabled' placeholder="Mobile No" value="<?php echo $phone; ?>" onkeypress="return isNumber(event)">
                                    <label for="contact" class="error"></label>
                                 </div>
                              </div>
                              <?php
                                 $owner_disable = $dealer_disable = $builder_disable = "";$developer_disable="";
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
                                 
                              <!--col-md-4 ended-->
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                 <div class="">
                                    <div class="radio_owner">
                                    	<label>User Type</label>
                                    	<div class="cleafix"></div>
                                       <label class="radio-inline radio-btn">
         
                                       <input required="required" type="radio" name="user_type" value="1"  <?php echo $owner_disable; ?> <?php echo empty($type)?"checked='checked'":""; ?> <?php echo ($type == 1)?"checked='checked'":""; ?> > Owner
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
                              </div>
                              <!--col-md-6 ended-->
                              <div class="cleafix"></div>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                 <div class="">
                                     <?php if($type=="developer" || $type =="Builder"){?>
                                              <div class="radio_owner">
                                       <label class="radio-inline radio-btn">
                                       <input type="radio" class="property_typecheck" id="Project" name="propertytype" value="4" checked="checked"> Project
                                       <span class="checkmark"></span>
                                       </label>
                                      
                                    </div>
                                    <?php } else { ?>
                              
                                    <div class="radio_owner">
                                       <label class="radio-inline radio-btn">
                                       <input type="radio" class="property_typecheck" id="sells" name="propertytype" value="1" checked="checked"> Sell
                                       <span class="checkmark"></span>
                                       </label>
                                       <label class="radio-inline radio-btn">
                                       <input type="radio" class="property_typecheck" id="rents" name="propertytype" value="2"> Rent
                                       <span class="checkmark"></span>
                                       </label>
                                       <label class="radio-inline radio-btn">
                                       <input type="radio" class="property_typecheck" id="lease" name="propertytype" value="3"> Lease
                                       <span class="checkmark"></span>
                                       </label>
                                    </div>
                                    <?php } ?>
                                 </div>
                              </div>
                              <!--col-md-6 ended-->
                              <div class="col-md-12 row">
                                 <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="">
                                    	<label>Category Name</label>
                                       <?php  $main_categories [''] = 'Select Category name';
                                          $options =' id="main_id" data-placeholder="Choose a category name..." class="form-control required" ';
                                          echo form_dropdown('main_id',$main_categories,'',$options);?>
                                       <label for="main_id" class="error"></label>
                                    </div>
                                 </div>
                                 <!--col-md-6 ended-->
                                 <!--col-md-6 ended-->
                                 <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                    	<label>Sub Category Name</label>
                                       <select id="sub_categoty" name="cat_id" data-placeholder="Choose a Category..." class="form-control required" >
                                          <option value="">Select Sub Category</option>
                                       </select>
                                       <label for="sub_categoty" class="error"></label>
                                    </div>
                                 </div>
                                 <!--col-md-6 ended-->
                                 <!--col-md-6 ended
                                 <div class="col-md-3 col-sm-3 col-xs-12" id="basic_resale">
                                    <div class="">
                                       <div class="radio_owner">
                                       	  <label>Sell Type</label>
                                       	  <div class="cleafix"></div>
                                          <label class="radio-inline radio-btn">
                                          <input type="radio" name="resale" value="Resale" checked="checked"> Resale
                                          <span class="checkmark"></span>
                                          </label>
                                          <label class="radio-inline radio-btn">
                                          <input type="radio" name="resale" value="New"> New
                                          <span class="checkmark"></span>
                                          </label>
                                       </div>
                                    </div>
                                 </div>-->
                                 <!--col-md-6 ended-->
                                 <!--col-md-6 ended
                                 <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                    	<label>Property Status</label>
                                       <?php  $propertystatus [''] = 'Select Status';
                                          $options =' id="propertystatus" data-placeholder="Choose a option name..." class="form-control required" ';
                                          echo form_dropdown('propertystatus',$propertystatus,'',$options);?>
                                       <label for="propertystatus" class="error"></label>
                                    </div>
                                 </div>-->
                                 <!--col-md-6 ended-->
                                 <div class="cleafix"></div>
                                 <!--col-md-6 ended
                                 <div class="col-md-3 col-sm-3 col-xs-12" id="basic_propertyage">
                                    <div class="form-group">
                                    	<label>Age</label>
                                       <?php  $propertyage [''] = 'Not Applicable';
                                          $options =' id="propertyage" data-placeholder="Choose a option name..." class="form-control required" ';
                                          echo form_dropdown('propertyage',$propertyage,'',$options);?>
                                       <label for="name" class="error"></label>
                                    </div>
                                 </div>-->
                                 <!--col-md-6 ended
                                 
                                 <div class="col-md-3 col-sm-3 col-xs-12" id="rera_status">
                                    <div class="form-group">
                                    	<label>Rera Status</label>
                                       <select class="form-control" name="rerastatus" id="rerastatus" required="required">
                                          <option value="" disabled selected>Rera Status</option>
                                          <option value="yes">Yes</option>
                                          <option value="no">No</option>
                                       </select>
                                       <label for="name" class="error"></label>
                                    </div>
                                 </div>-->
                                 <!--col-md-6 ended-->
                                 <!--col-md-6 ended-->
                                 <div class="col-md-3 col-sm-3 col-xs-12" id="basic_reraid" style="display: none;">
                                    <div class="">
                                    	<label>Rera Id</label>
                                       <input type="text" class="form-control" name="reraid" id="reraid" placeholder="RERA ID">
                                       <span class="error" id="reraiderror"></span>
                                    </div>
                                 </div>
                                 <!--col-md-6 ended-->
                                 <!--col-md-6 ended-->
                                 <div class="col-md-3 col-sm-3 col-xs-12" id="basic_reraurl" style="display: none;">
                                    <div class="">
                                    	<label>Rera URL</label>
                                       <input type="text" class="form-control" name="reraurl" id="reraurl" placeholder="RERA URL">
                                       <span class="error" id="reraurlerror"></span>
                                    </div>
                                 </div>
                                 <!--col-md-6 ended-->
                              </div>
                              <!--col-md-12 ended-->
                           </div>
                           <a class="btn theme-btn btn-style-one btnNext1 pull-right">Next</a>
                        </div>
                        <div class="tab-pane fade p-3" id="two" role="tabpanel">
                           <div class="row seprate-row">
                              <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
                                 <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Project Name" name="projectname" required="required" id="projectname"  >
                                 </div>
                              </div>
                              <!--col-md-12 ended-->
                              <div class="col-md-6 hidden-xs"></div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <h3 class="red">Address:</h3>
                              </div>
                              <!--col-md-12 ended-->
                              <!--col-md-4 ended-->
                            <!--  <div class="col-md-3 col-sm-3 col-xs-12">
                                 <div class="form-group">
                                    <label>House No/ Bldg./Apt</label>
                                    <input type="text" class="form-control" name="house" id="house" required="required" >
                                 </div>
                              </div>
                              
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                 <div class="form-group">
                                    <label>Street/Road/Lane</label>
                                    <input type="text" class="form-control" name="street" id="street" required="required">
                                 </div>
                              </div>-->
                              <!--col-md-4 ended-->
                            
                              <!--col-md-4 ended-->
                               <div class="col-md-3 col-sm-3 col-xs-12">
                                 <div class="form-group">
                                    <label>Pin code</label>
                                    
                                    <input type="number" class="form-control" placeholder="" pattern="[0-9]{6}" required="required" name="pincode" id="pincode" onkeypress="return isNumber(event)" minlength="6" maxlength="6">
                                 </div>
                              </div>
                              <div class="col-md-3 col-sm-3 ">
                                 <div class="form-group">
                                    <label>State</label>
                                     <input  type="text" class="form-control" placeholder="statename" name="statename" id="statename1" >
                                    
                                 </div>
                              </div>
                                     <div class="col-md-3 col-sm-3">
                                 <div class="form-group">
                                    <label>City</label>
                                     <input  type="text" class="form-control" placeholder="cityname" name="cityname" id="cityname1" >
                                    
                                 </div>
                              </div>
                                <div class="col-md-3 col-sm-3">
                                 <div class="form-group">
                                    <label>Locality</label>
                                        <select id="localityname1" name="localityname" data-placeholder="Choose a area..." class="form-control" >
                                       <option value="">Select area</option>
                                    </select>
                                    
                                    
                                 </div>
                              </div>
                              <!--col-md-4 ended-->
                           
                              <!--col-md-4 ended-->
                            
                             
                                 
                                   
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                 <div class="form-group">
                                    <label>Sub Locality</label>
                                    <input type="text" class="form-control" placeholder=""  name="landmark" id="landmark" onkeypress="return alphaOnly(event)">
                                 </div>
                              </div>
                              <!--col-md-4 ended-->
                             
                              <!--col-md-4 ended-->
                              <!--col-md-4 ended-->
                           
                              <!--col-md-4 ended-->
                           </div>
                           <div class="pull-right">
                              <a class="btn theme-btn btn-style-one btnPrevious1">Previous</a>
                              <a class="btn theme-btn btn-style-one btnNext2">Next</a>
                           </div>
                        </div>
                        <div class="tab-pane fade p-3" id="three" role="tabpanel">
                           <section>
                              <div class="" id="product_specification">
                                 <div class="col-md-12"> 
                                    <span align="center" class="mar-bt-20">Please select the category in previous first tab</span>
                                 </div>
                                 <!--col-md-12 ended-->
                                 <div class="clearfix"></div>
                              </div>
                              <div class="clearfix"></div>
                              <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="row">
                                    <div class="form-group">
                                    <label>Total Area</label>
                  <input type="number" min="0" id="plotarea" name="totalarea" class="form-control required" onkeypress="return isNumber(event)" placeholder="Totalarea"  required/>
                  <!-- <span class="input-group-addon">Feet</span> -->
                </div>   <div class="col-md-4 col-sm-4 col-xs-4 col-4 no-paddding ">
                <label>Unit</label>
                <?php 
                $propertyareatype [''] = 'Unit';
                $options =' id="areatype" data-placeholder="Choose a type..." class="form-control required" tabindex="2"';
                echo form_dropdown('areatype',$propertyareatype,'',$options);
                ?>
              </div></div>
                                   
                                 </div>  
                                 
                                 <!-- New static section starts here for property details 
                                 <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                    	<label>Price Type</label>
                                       
                                          $pricetype = array('' => "Select Price Type" ,'Feet' => "Feet" ,"Meter" => "Meter","Yard" => "Yard","Acre" => "Acre","Gunta" => "Gunta",'Sq Feet' => "Sq Feet" ,);
                                          $options ='required="required" id="pricetype" data-placeholder="Choose a Price Type..." class="form-control" ';
                                          echo form_dropdown('pricetype',$pricetype,"",$options);
                                          
                                    </div>
                                 </div>-->
                               <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                    	<label>Price</label>
                                       <input type="text" class="form-control" placeholder="Price" required="required" name="price" id="price" onkeypress="return isNumber(event)" >
                                       <span id="pricecalerror" class="error"></span>
                                    </div>
                                 </div>
                                    <!--  <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                    	<label>Available From</label>
                                       <input type="text" class="form-control" placeholder="Available From" name="available_from" required="required" id="available_from" autocomplete="off" >
                                    </div>
                                 </div>
                                 <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                    	<label>Negotiable</label>
                                      
                                          $negotiable = array("" => "Negotiable" ,"Yes" => "Yes" ,"No" => "No");
                                          $options =' id="negotiable" data-placeholder="Choose a Price Type..." class="form-control required" ';
                                          echo form_dropdown('negotiable',$negotiable,"",$options);
                                          
                                    </div>
                                 </div> -->
                                     <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                    	<label>Price Per</label>
                                       <input type="text" class="form-control" name="pricepervalue"  value="" placeholder="Price Per" 
                                       readyonly="readyonly" id="pricepervalue" required="required" adonly" disabled="disabled"
                                       onkeypress="return isNumber(event)">
                                    </div>
                                    <input type="hidden" id="priceper" name="priceper" value="">
                                 </div>
                               
                                 <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                    	<label>Youtube Video Id</label>
                                       <input  type="text" class="form-control" placeholder="Project Video" name="video1" id="video1" >
                                       <span class="help-block">Youtube Video Id</span>
                                    </div>
                                 </div>
                                 <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                    	<label>Brouchure</label>
                                       <input  type="file" class="form-control" placeholder="brochure" name="brochure" id="brochure" onchange="validateBrochure(this.name)">
                                       <span class="help-block">Brochure Accepted only pdf formats</span>
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    	<label>Description</label>
                                       <textarea class="form-control mb-20" placeholder="Description"  name="description" cols="50" rows="4" id="description"></textarea>
                                    </div>
                                 </div>
                                 <!-- New static section ends here -->
                              </div>
                           </section>
                           <div class="pull-right">
                              <a class="btn theme-btn btn-style-one btnPrevious2">Previous</a>
                              <a class="btn theme-btn btn-style-one btnNext3">Next</a>
                           </div>
                        </div>
                        <div class="tab-pane fade  p-3" id="four" role="tabpanel">
                           <div class="row newbo">
                              <div class="col-md-12">
                                 <h5>Upload a Property images</h5>
                                 <small class="smfonts_s">Note: Your First image will be an exterior image of your property.</small>
                              </div>
                           </div>
                           <br>
                           <div class="col-md-12 text-center">
                              <div class="row">
                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image" id="image" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" required />
                                          <label for="image" id="edit_0"></label>
                                          <button class="btn-close lko" type="button" OnClick="Remove_0();" id="remove_0" style="display:none">X</button>
                                       </div>
                                       <div class="avatar-preview">
                                          <div id="imagePreview" style="background-image: url(https://static.thenounproject.com/png/348334-200.png);" >
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image1" id="image1" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" />
                                          <label for="image1" id="edit_1"></label>
                                           <button class="btn-close lko" type="button" OnClick="Remove_1();" id="remove_1"  style="display:none">X</button>
                                       </div>
                                       <div class="avatar-preview">
                                          <div id="imagePreview1" style="background-image: url(https://static.thenounproject.com/png/348334-200.png);">
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image2" id="image2" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" />
                                          <label for="image2" id="edit_2"></label>
                                           <button class="btn-close lko" type="button" OnClick="Remove_2();" id="remove_2"  style="display:none">X</button>
                                       </div>
                                       <div class="avatar-preview">
                                          <div id="imagePreview2" style="background-image: url(https://static.thenounproject.com/png/348334-200.png);">
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image3" id="image3" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" />
                                          <label for="image3" id="edit_3"></label>
                                           <button class="btn-close lko" type="button" OnClick="Remove_3();" id="remove_3"  style="display:none">X</button>
                                       </div>
                                       <div class="avatar-preview">
                                          <div id="imagePreview3" style="background-image: url(https://static.thenounproject.com/png/348334-200.png);">
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image4" id="image4" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" />
                                          <label for="image4" id="edit_4"></label>
                                           <button class="btn-close lko" type="button" OnClick="Remove_4();" id="remove_4"  style="display:none">X</button>
                                       </div>
                                       <div class="avatar-preview">
                                          <div id="imagePreview4" style="background-image: url(https://static.thenounproject.com/png/348334-200.png);">
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image5" id="image5" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" />
                                          <label for="image5" id="edit_5"></label>
                                           <button class="btn-close lko" type="button" OnClick="Remove_5();" id="remove_5"  style="display:none">X</button>
                                       </div>
                                       <div class="avatar-preview">
                                          <div id="imagePreview5" style="background-image: url(https://static.thenounproject.com/png/348334-200.png);">
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image6" id="image6" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" />
                                          <label for="image6" id="edit_6"></label>
                                           <button class="btn-close lko" type="button" OnClick="Remove_6();" id="remove_6"  style="display:none">X</button>
                                       </div>
                                       <div class="avatar-preview">
                                          <div id="imagePreview6" style="background-image: url(https://static.thenounproject.com/png/348334-200.png);">
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image7" id="image7" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" />
                                          <label for="image7" id="edit_7"></label>
                                           <button class="btn-close lko" type="button" OnClick="Remove_7();" id="remove_7"  style="display:none">X</button>
                                       </div>
                                       <div class="avatar-preview">
                                          <div id="imagePreview7" style="background-image: url(https://static.thenounproject.com/png/348334-200.png);">
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image8" id="image8" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" />
                                          <label for="image8" id="edit_8"></label>
                                           <button class="btn-close lko" type="button" OnClick="Remove_8();" id="remove_8" style="display:none">X</button>
                                       </div>
                                       <div class="avatar-preview">
                                          <div id="imagePreview8" style="background-image: url(https://static.thenounproject.com/png/348334-200.png);">
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image9" id="image9" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" />
                                          <label for="image9" id="edit_9"></label>
                                           <button class="btn-close lko" type="button" OnClick="Remove_9();" id="remove_9" style="display:none">X</button>
                                       </div>
                                       <div class="avatar-preview">
                                          <div id="imagePreview9" style="background-image: url(https://static.thenounproject.com/png/348334-200.png);">
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image10" id="image10" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" />
                                          <label for="image10" id="edit_10"></label>
                                           <button class="btn-close lko" type="button" OnClick="Remove_10();" id="remove_10" style="display:none">X</button>
                                       </div>
                                       <div class="avatar-preview">
                                          <div id="imagePreview10" style="background-image: url(https://static.thenounproject.com/png/348334-200.png);">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                               
                                 
                              </div>
                           </div>
                           <div class="pull-right">
                              <a class="btn theme-btn btn-style-one btnPrevious3">Previous</a>
                              <button type="submit" class="btn theme-btn btn-style-one " id="upload">Submit</button>
                           </div>
                        </div>
                     </div>
                     </form>
                     </div>
                     </div>
               </div>
         </div>
      </div>
   </div>
</div>

<script src="<?php echo base_url(JS); ?>/submitproperty.js"></script>
<script>
   function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreview').css('background-image', 'url('+e.target.result +')');
              $('#imagePreview').hide();
              $('#imagePreview').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
      }
   }
   $("#image").change(function() {
      readURL(this);
      document.getElementById('edit_0').style.display="none";
      document.getElementById('remove_0').style.display="block";
   });
   //-------------
   function readURL1(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreview1').css('background-image', 'url('+e.target.result +')');
              $('#imagePreview1').hide();
              $('#imagePreview1').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
      }
   }
   $("#image1").change(function() {
      readURL1(this);
      document.getElementById('edit_1').style.display="none";
      document.getElementById('remove_1').style.display="block";
   });
   //-------------
   function readURL2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreview2').css('background-image', 'url('+e.target.result +')');
              $('#imagePreview2').hide();
              $('#imagePreview2').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
      }
   }
   $("#image2").change(function() {
      readURL2(this);
      document.getElementById('edit_2').style.display="none";
      document.getElementById('remove_2').style.display="block";
   });
   //-------------
   function readURL3(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreview3').css('background-image', 'url('+e.target.result +')');
              $('#imagePreview3').hide();
              $('#imagePreview3').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
      }
   }
   $("#image3").change(function() {
      readURL3(this);
      document.getElementById('edit_3').style.display="none";
      document.getElementById('remove_3').style.display="block";
   });
   //-------------
   function readURL4(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreview4').css('background-image', 'url('+e.target.result +')');
              $('#imagePreview4').hide();
              $('#imagePreview4').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
      }
   }
   $("#image4").change(function() {
      readURL4(this);
      document.getElementById('edit_4').style.display="none";
      document.getElementById('remove_4').style.display="block";
   });
   //-------------
   function readURL5(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreview5').css('background-image', 'url('+e.target.result +')');
              $('#imagePreview5').hide();
              $('#imagePreview5').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
      }
   }
   $("#image5").change(function() {
      readURL5(this);
      document.getElementById('edit_5').style.display="none";
      document.getElementById('remove_5').style.display="block";
   });
   //-------------
   function readURL6(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreview6').css('background-image', 'url('+e.target.result +')');
              $('#imagePreview6').hide();
              $('#imagePreview6').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
      }
   }
   $("#image6").change(function() {
      readURL6(this);
      document.getElementById('edit_6').style.display="none";
      document.getElementById('remove_6').style.display="block";
   });
   //-------------
   function readURL7(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreview7').css('background-image', 'url('+e.target.result +')');
              $('#imagePreview7').hide();
              $('#imagePreview7').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
      }
   }
   $("#image7").change(function() {
      readURL7(this);
      document.getElementById('edit_7').style.display="none";
      document.getElementById('remove_7').style.display="block";
   });
   //-------------
   function readURL8(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreview8').css('background-image', 'url('+e.target.result +')');
              $('#imagePreview8').hide();
              $('#imagePreview8').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
      }
   }
   $("#image8").change(function() {
      readURL8(this);
      document.getElementById('edit_8').style.display="none";
      document.getElementById('remove_8').style.display="block";
   });
   //-------------
   function readURL9(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreview9').css('background-image', 'url('+e.target.result +')');
              $('#imagePreview9').hide();
              $('#imagePreview9').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
      }
   }
   $("#image9").change(function() {
      readURL9(this);
      document.getElementById('edit_9').style.display="none";
      document.getElementById('remove_9').style.display="block";
   });
   //-------------
   function readURL10(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreview10').css('background-image', 'url('+e.target.result +')');
              $('#imagePreview10').hide();
              $('#imagePreview10').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
      }
   }
   $("#image10").change(function() {
      readURL10(this);
      document.getElementById('edit_10').style.display="none";
      document.getElementById('remove_10').style.display="block";
   });
</script>
<script>
    function Remove_0() {
        document.getElementById("imagePreview").style.backgroundImage="url(https://static.thenounproject.com/png/348334-200.png)";
        document.getElementById('image').value=('');
        document.getElementById('edit_0').style.display="block";
        document.getElementById('remove_0').style.display="none";
    }
    function Remove_1() {
        document.getElementById("imagePreview1").style.backgroundImage="url(https://static.thenounproject.com/png/348334-200.png)";
        document.getElementById('image1').value=('');
        document.getElementById('edit_1').style.display="block";
        document.getElementById('remove_1').style.display="none";
    }
     function Remove_2() {
        document.getElementById("imagePreview2").style.backgroundImage="url(https://static.thenounproject.com/png/348334-200.png)";
        document.getElementById('image2').value=('');
        document.getElementById('edit_2').style.display="block";
        document.getElementById('remove_2').style.display="none";
    }
     function Remove_3() {
        document.getElementById("imagePreview3").style.backgroundImage="url(https://static.thenounproject.com/png/348334-200.png)";
        document.getElementById('image3').value=('');
        document.getElementById('edit_3').style.display="block";
        document.getElementById('remove_3').style.display="none";
    }
     function Remove_4() {
        document.getElementById("imagePreview4").style.backgroundImage="url(https://static.thenounproject.com/png/348334-200.png)";
        document.getElementById('image4').value=('');
        document.getElementById('edit_4').style.display="block";
        document.getElementById('remove_4').style.display="none";
    }
     function Remove_5() {
        document.getElementById("imagePreview5").style.backgroundImage="url(https://static.thenounproject.com/png/348334-200.png)";
        document.getElementById('image5').value=('');
        document.getElementById('edit_5').style.display="block";
        document.getElementById('remove_5').style.display="none";
    }
     function Remove_6() {
        document.getElementById("imagePreview6").style.backgroundImage="url(https://static.thenounproject.com/png/348334-200.png)";
        document.getElementById('image6').value=('');
        document.getElementById('edit_6').style.display="block";
        document.getElementById('remove_6').style.display="none";
    }
     function Remove_7() {
        document.getElementById("imagePreview7").style.backgroundImage="url(https://static.thenounproject.com/png/348334-200.png)";
        document.getElementById('image7').value=('');
        document.getElementById('edit_7').style.display="block";
        document.getElementById('remove_7').style.display="none";
    }
     function Remove_8() {
        document.getElementById("imagePreview8").style.backgroundImage="url(https://static.thenounproject.com/png/348334-200.png)";
        document.getElementById('image8').value=('');
        document.getElementById('edit_8').style.display="block";
        document.getElementById('remove_8').style.display="none";
    }
     function Remove_9() {
        document.getElementById("imagePreview9").style.backgroundImage="url(https://static.thenounproject.com/png/348334-200.png)";
        document.getElementById('image9').value=('');
        document.getElementById('edit_9').style.display="block";
        document.getElementById('remove_9').style.display="none";
    }
     function Remove_10() {
        document.getElementById("imagePreview10").style.backgroundImage="url(https://static.thenounproject.com/png/348334-200.png)";
        document.getElementById('image10').value=('');
        document.getElementById('edit_10').style.display="block";
        document.getElementById('remove_10').style.display="none";
    }
</script>

<script type="text/javascript">
$(document).ready(function() {

    $('#upload').bind("click",function() 
    { 
        var imgVal = $('#image').val(); 
        if(imgVal=='') 
        { 
            alert("kindly upload atleast one image for submit your property."); 
            return false; 
        } 


    }); 
   
});
</script> 
