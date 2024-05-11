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
   .dashboard-header .breadcrumb-nav ul li {
    position: relative;
    display: inline-block;
    font-size: 16px;
    line-height: 1.2em;
    margin: 0 0 0 15px;
    color: #222222;
    font-weight: 500;
    background-color:"#00C0FF";
    margin-bottom:10px;
}
   .dashboard-header .breadcrumb-nav ul li a:hover {

    color: black;
    
</style>
<div class="dashboard">
   <div class="container-fluid">
      <div class="content-area">
         <div class="dashboard-content">
            <div class="dashboard-header clearfix">
               <div class="row">
                  <div class="col-md-4 col-sm-12">
                     <h4>Edit Property</h4>
                  </div>
                  <!--   <div class="col-md-8 col-sm-12">
                     <div class="breadcrumb-nav">
                        <ul>
                           <li class="active_olk" style="background: #00C0FF;"><a href="<?php echo base_url('users/myshortlisted'); ?>">My Shortlists</a></li>
                           <li class="active_olk" style="background: #00C0FF;"><a href="<?php echo base_url('users/profile'); ?>">My Profile</a></li>
                           <?php if($userType !="user"){ ?>
                           <li class="active_olk" style="background: #00C0FF;"><a href="<?php echo base_url('property'); ?>">Submit Project</a></li>
                           <li class="active_olk" style="background: #00C0FF;"><a href="<?php echo base_url('users/myproperties'); ?>">My Properties</a></li>
                           <li class="active_olk" style="background: #00C0FF;"><a href="<?php echo base_url('users/myenquires'); ?>">My Enquiries</a></li>
                           <?php } ?>
                        </ul>
                     </div>
                  </div> -->
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
<?php echo form_open_multipart("property/edit_property", 'id="postproperties_form"','class="form-horizontal"');?>
<input type="hidden" name="pid" id="propertyeid" value="<?php echo $products->id; ?>">
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
                                 <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                       <label>Your Name</label>
                                        <input type="text" name="name" id="name" class="form-control" disabled='disabled' placeholder="Your Name*" required="required" onkeypress="return alphaOnly(event)" value="<?php echo $fname; ?>">
                                       <label for="name" class="error"></label>
                                    </div>
                                 </div>
                                 <!--col-md-4 ended-->
                                 <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                       <label>Email Id</label>
                                       <input type="email" name="pemailid" id="pemailid" class="form-control" disabled='disabled' placeholder="Email" required="required" <?php echo ($email)?"disabled='disabled'":""; ?>  value="<?php echo $email; ?>">
                                       <label for="pemailid" class="error"></label>
                                    </div>
                                 </div>
                                 <!--col-md-4 ended-->
                                 <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                       <label>Mobile No</label>
                                       <input type="text" class="form-control" name="contact" id="contact"  disabled='disabled' maxlength="10" placeholder="Mobile No" value="<?php echo $phone; ?>" onkeypress="return isNumber(event)">
                                       <label for="contact" class="error"></label>
                                    </div>
                                 </div>
                                 <?php
                           $owner_disable = $dealer_disable = $builder_disable = "";
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
                                    <?php } else {?>
                                       <div class="radio_owner">
                                          <label class="radio-inline radio-btn">
                                          <input type="radio" class="property_typecheck" id="sells" name="propertytype" value="1" <?php echo ($products->propertytype == "1")?"checked='checked' ":""; ?>> Sell
                                          <span class="checkmark"></span>
                                          </label>
                                          <label class="radio-inline radio-btn">
                                          <input type="radio" class="property_typecheck" id="rents" name="propertytype" value="2" <?php echo ($products->propertytype == "2")?"checked='checked' ":""; ?>> Rent
                                          <span class="checkmark"></span>
                                          </label>
                                          <label class="radio-inline radio-btn">
                                          <input type="radio" class="property_typecheck" id="lease" name="propertytype" value="3" <?php echo ($products->propertytype == "3")?"checked='checked' ":""; ?>> Lease
                                          <span class="checkmark"></span>
                                          </label>
                                       </div>
                                       <?php } ?>
                                    </div>
                                 </div>
                                 <!--col-md-6 ended-->
                                 <div class="col-md-12 row">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                       <div class="form-group">
                                          <label>Category Name</label>
                                          <?php  $main_categories [''] = 'Select Category name';
                $options =' id="main_id" data-placeholder="Choose a category name..." class="form-control required" ';
                echo form_dropdown('main_id',$main_categories,$maincatid,$options);?>
                                          <label for="main_id" class="error"></label>
                                       </div>
                                    </div>
                                    <!--col-md-6 ended-->
                                    <!--col-md-6 ended-->
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                       <div class="form-group">
                                          <label>Sub Category Name</label>
                                          <?php if(isset($sub_categories) && count($sub_categories) && is_array($sub_categories)){
                                          
                                          $sub_categories [''] = 'Select Sub Category name';
                $options =' id="sub_categoty" data-placeholder="Choose a category name..." class="form-control required" ';
                echo form_dropdown('cat_id',$sub_categories,$products->cat_id,$options);

                                       } else {
                                          ?>
                                          <select id="sub_categoty" name="cat_id" data-placeholder="Choose a Category..." class="form-control required" >
                                       <option value="">Select Sub Category</option>
                                       </select>
                                          <?php
                                       }
                                       ?>
                                          <label for="sub_categoty" class="error"></label>
                                       </div>
                                    </div>
                                    <!--col-md-6 ended-->
                                    <?php
                                    $basic_resale = $rera_status = "";
                                    if($products->propertytype != "1"){
                                          $basic_resale = $rera_status = " style='display: none;' ";
                                          
                                    }
                                    ?>
                                    <!--col-md-6 ended
                                    <div class="col-md-3 col-sm-3 col-xs-12" id="basic_resale" <?php echo $basic_resale; ?>>
                                       <div class="">
                                          <div class="radio_owner">
                                             <label>Sell Type</label>
                                             <div class="cleafix"></div>
                                             <label class="radio-inline radio-btn">
                                             <input type="radio" name="resale" value="Resale"  echo ($products->resale == "Resale")?"checked='checked' ":""; ?>> Resale
                                             <span class="checkmark"></span>
                                             </label>
                                             <label class="radio-inline radio-btn">
                                             <input type="radio" name="resale" value="New"  echo ($products->resale == "New")?"checked='checked' ":""; ?>> New
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
                                           $propertystatus [''] = 'Select Status';
                $options =' id="propertystatus" data-placeholder="Choose a option name..." class="form-control required" ';
                echo form_dropdown('propertystatus',$propertystatus,$products->propertystatus,$options);?>
                                          <label for="propertystatus" class="error"></label>
                                       </div>
                                    </div>-->
                                    <!--col-md-6 ended-->
                                    <div class="cleafix"></div>
                                    <!--col-md-6 ended
                                    <div class="col-md-3 col-sm-3 col-xs-12" id="basic_propertyage">
                                       <div class="form-group">
                                          <label>Age</label>
                                            $propertyage [''] = 'Age of Property';
                $options =' id="propertyage" data-placeholder="Choose a option name..." class="form-control required" ';
                echo form_dropdown('propertyage',$propertyage,$products->propertyage,$options);?>
                                          <label for="name" class="error"></label>
                                       </div>
                                    </div>-->
                                    <!--col-md-6 ended-->
                                    <!--col-md-6 ended-->
                                     <!-- <div class="col-md-3 col-sm-3 col-xs-12" id="rera_status" echo $rera_status; ?>>
                                     <div class="form-group">
                                          <label>Rera Status</label>
                                       <  $rerastatus = array(''=>'Rera Status','yes'=>'Yes','no'=>'No');
                $options =' id="rerastatus" data-placeholder="Choose a option name..." class="form-control required" ';
                echo form_dropdown('rerastatus',$rerastatus,$products->rerastatus,$options); -->
                                          <!-- <select class="form-control" name="rerastatus" id="rerastatus" required="required">
                                             <option value="" disabled selected>Rera Status</option>
                                             <option value="yes" echo ($products->rerastatus == "yes")?"selected":""; ?>>Yes</option>
                                             <option value="no"  echo ($products->rerastatus == "no")?"selected":""; ?>>No</option>
                                          </select>
                                          <label for="name" class="error"></label>
                                       </div>
                                    </div> -->
                                    <!--col-md-6 ended-->
                                    <!--col-md-6 ended-->
                                    <!--
                                    <div class="col-md-3 col-sm-3 col-xs-12" id="basic_reraid" echo ($products->rerastatus == "no")?"style='display: none;' ":""; ?>  echo $rera_status; ?>>
                                       <div class="form-group">
                                          <label>Rera Id</label>
                                          <input type="text" class="form-control" name="reraid" id="reraid" placeholder="RERA ID" value=" echo $products->reraid; ?>">
                                          <span class="error" id="reraiderror"></span>
                                       </div>
                                    </div> -->
                                    <!--col-md-6 ended-->
                                    <!--col-md-6 ended-->
                                    <!--
                                    <div class="col-md-3 col-sm-3 col-xs-12" id="basic_reraurl"  echo ($products->rerastatus == "no")?"style='display: none;' ":""; ?>  echo $rera_status; ?>>
                                       <div class="form-group">
                                          <label>Rera URL</label>
                                          <input type="text" class="form-control" name="reraurl" id="reraurl" placeholder="RERA URL" value=" echo $products->reraurl; ?>">
                                          <span class="error" id="reraurlerror"></span>
                                       </div>
                                    </div> -->
                                    <!--col-md-6 ended-->
                                 </div>
                                 <!--col-md-12 ended-->
                              </div>
                              <a class="btn theme-btn btn-style-one btnNext1 pull-right">Next</a>
                           </div>
                           <div class="tab-pane fade p-3" id="two" role="tabpanel">
                              <div class="row seprate-row">
                                  <div class="col-md-12">
                                     <label>Project/House Name</label>
                                 </div>
                                 <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                       <input type="text" class="form-control" placeholder="Project Name" name="projectname" id="projectname"  value="<?php echo $products->name; ?>" onkeypress="return alphaOnly(event)">
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
                                
                                 <!--col-md-4 ended-->
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                 <div class="form-group">
                                    <label>Pin code</label>
                                    
                                    <input type="number" class="form-control" placeholder="" pattern="[0-9]{6}" required="required" value="<?php echo $products->pincode; ?>" name="pincode" id="pincode" onkeypress="return isNumber(event)" minlength="6" maxlength="6">
                                 </div>
                              </div>
                              <div class="col-md-3 col-sm-3 ">
                                 <div class="form-group">
                                    <label>State</label>
                                     <input  type="text" class="form-control" placeholder="statename" value="<?= $products->statename ?>" name="statename" id="statename1" >
                                    
                                 </div>
                              </div>
                                     <div class="col-md-3 col-sm-3 ">
                                 <div class="form-group">
                                    <label>City</label>
                                     <input  type="text" class="form-control" value="<?php echo $products->cityname;?>" placeholder="cityname" name="cityname" id="cityname1" >
                                    
                                 </div>
                              </div>
                             <div class="col-md-3 col-sm-3 col-xs-12">
                                       <div class="form-group">
                                          <label>Locatlity </label>
                                          <?php if(isset($area) && count($area) && is_array($sub_categories)){
                                          
                                          $sub_categories [''] = 'Select Sub Category name';
                $options =' id="sub_categoty" data-placeholder="Choose a category name..." class="form-control required" ';
                echo form_dropdown('cat_id',$areaname->area,$options);

                                       } else {
                                          ?>
                                          <select id="localityname1" name="localityname" data-placeholder="Choose a Category..." class="form-control required" >
                                             
                                              
                                       <option value="<?php echo $areaname->area?>"><?php echo $areaname->area?></option>
                                       </select>
                                          <?php
                                       }
                                       ?>
                                          <label for="sub_categoty" class="error"></label>
                                       </div>
                                    </div>
                             <div class="col-md-3 col-sm-3 col-xs-12">
                                      <div class="form-group">
                                       <label>Sub Locality</label>
                                       <input type="text" class="form-control" placeholder="" name="landmark" id="landmark" value="<?php echo $products->landmark; ?>" onkeypress="return alphaOnly(event)">
                                    </div>
                                 </div>
                                 <!--col-md-4 ended-->
                          
                                 <!--col-md-4 ended-->
                        
                            
                                 <!--col-md-4 ended-->
                           
                                 <!--col-md-4 ended-->
                           
                                 <!--col-md-4 ended-->
                               
                                 <!--col-md-4 ended-->
                                 <!--col-md-4 ended-->
                                 <div class="col-md-3 col-sm-3 col-xs-12">
                                  
                                 </div>
                                 <!--col-md-4 ended-->
                                 <!--col-md-4 ended-->
                                 <div class="col-md-3 col-sm-3 col-xs-12">
                                   
                                 </div>
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
  <div class="row">
     <?php 
$attrs =' id="multi-select-demo" multiple="multiple" '; 
$attr ='class="form-control"'; 
//$spcno=count($specifications);
//print_r($specifications);
if(isset($specifications) && is_array($specifications) && count($specifications)){
   $i=0;?>
  <?php foreach ($specifications as $key => $specification) { $k = $i;
    $mandatorycheck = ($specification['mandatory']=="1")?' required="required"':'';
    ?>
    <div class="col-md-3 col-sm-3 col-xs-12">
    <div class="form-group">
    <?php
    if(count($specification['values']) && $specification['type'] =='1') { ?>
      <label><?php echo $specification['name'] ?></label> 
      <div class="multiselect2"> 
        <?=form_dropdown("specification[$key][]", $specification['values'], (isset($psv[$key])) ? $psv[$key] : '',$attrs.$mandatorycheck);?>
      </div>    
                      
  <?php  $i++; } elseif(count($specification['values']) && $specification['type'] =='2'){ ?>
      <label><?php echo $specification['name'] ?></label> 
      
      <?php 
      $empty_value[''] = $specification['name']; 
      $formdropdownlist = $empty_value + $specification['values'];
      ?>
      <?php 
      //print_r($specification['values']);
      echo form_dropdown("specification[$key][]", $formdropdownlist,(isset($psv[$key])) ? $psv[$key][0] : '',$attr.$mandatorycheck);
      ?>            
  <?php  $i++; } else{ ?> 
      <label><?php echo $specification['name'] ?></label> 
        <?php
        $fieldidvalue = ($specification['name']=="Built-up Area" ||$specification['name']=="Total Area" )?" id='plotarea'":"";
        if($specification['datatype'] == 1){
          ?>
          <div class="col-md-12">
            <div class="row">
              <?php $classdiv = ($specification['areatype'] == "1")?"col-md-8 col-sm-8 col-xs-8 col-8":"col-md-12 col-sm-12 col-xs-12 col-12"; 
              ?>
              
              <div class="<?php echo $classdiv; ?> no-paddding ">
              <input type="number" min="0" name="specification[<?=$key?>][]" class="form-control required" onkeypress="return isNumber(event)" placeholder="<?php echo $specification['name']; ?>" <?php echo $fieldidvalue; ?> <?php echo $mandatorycheck; ?> value="<?= (isset($psv[$key])) ? $psv[$key][0] : ''?>"/>
              </div>
              <?php if($specification['areatype'] == "1"){ ?>
              <div class="col-md-4 col-sm-4 col-xs-4 col-4 no-paddding ">
                <?php 
                $propertyareatype [0] = 'Unit';
                $options =' id="propertyareatype" data-placeholder="Choose a type..." class="form-control required" tabindex="2"';
                echo form_dropdown('propertyareatype['.$key.'][]',$propertyareatype,(isset($psvtype[$key])) ? $psvtype[$key][0] : '',$options);
                ?>
              </div>
            <?php } ?>
            </div>
          </div>
          
          <?php 
        } else if($specification['datatype'] == 2){
        ?>
        <input type="text" name="specification[<?=$key?>][]" class="form-control" placeholder="<?php echo $specification['name'] ?>" <?php echo $fieldidvalue; ?> <?php echo $mandatorycheck; ?> value="<?= (isset($psv[$key])) ? $psv[$key][0] : ''?>"/>
        <?php
        } else if($specification['datatype'] == 3){
        ?>
        <input type="date" name="specification[<?=$key?>][]" id="specification[<?=$key?>][]" data-fid="specification[<?=$key?>][]" data-id="<?php echo $specification['name'] ?>" class="specificclick form-control" placeholder="<?php echo $specification['name'] ?>" <?php echo $fieldidvalue; ?> <?php echo $mandatorycheck; ?> value="<?= (isset($psv[$key])) ? $psv[$key][0] : ''?>" />
        <?php
        }
        ?> 
        
        
                  
  <?php $i++; } //echo ($i%2==0 && $i!= $spcno && $k!=$i)? '</div><div class="form-group">':''; 
  ?>
</div> 
</div>
<script src="<?php echo base_url(JS); ?>/bootstrap-multiselect.js"></script>
<script type="text/javascript">
 // $(document).ready(function() {  
        $('#multi-select-demo').multiselect();
  //});
</script>
  <?php
    }


   } else {
      ?>
      <div class="col-md-12"> 
         <span align="center" class="mar-bt-20">Please select the category in previous first tab</span>
      </div> <!--col-md-12 ended-->
      <?php
   }
   ?>
  </div>
</div>
<div class="clearfix"></div>
<div class="" id="product_specification1">
  <div class="row">
     <?php 
$attrs =' id="multi-select-demo" multiple="multiple" '; 
$attr ='class="form-control"'; 
//$spcno=count($specifications);
//print_r($specifications);
if(isset($subspecifications) && is_array($subspecifications) && count($specifications)){
   $i=0;?>
  <?php foreach ($subspecifications as $key => $specification) { $k = $i;
    $mandatorycheck = ($specification['mandatory']=="1")?' required="required"':'';
    ?>
    <div class="col-md-3 col-sm-3 col-xs-12">
    <div class="form-group">
    <?php
    if(count($specification['values']) && $specification['type'] =='1') { ?>
      <label><?php echo $specification['name'] ?></label> 
      <div class="multiselect2"> 
        <?=form_dropdown("specification[$key][]", $specification['values'], (isset($psv[$key])) ? $psv[$key] : '',$attrs.$mandatorycheck);?>
      </div>    
                      
  <?php  $i++; } elseif(count($specification['values']) && $specification['type'] =='2'){ ?>
      <label><?php echo $specification['name'] ?></label> 
      
      <?php 
      $empty_value[''] = $specification['name']; 
      $formdropdownlist = $empty_value + $specification['values'];
      ?>
      <?php 
      //print_r($specification['values']);
      echo form_dropdown("specification[$key][]", $formdropdownlist,(isset($psv[$key])) ? $psv[$key][0] : '',$attr.$mandatorycheck);
      ?>            
  <?php  $i++; } else{ ?> 
      <label><?php echo $specification['name'] ?></label> 
        <?php
        $fieldidvalue = ($specification['name']=="Built-up Area" ||$specification['name']=="Total Area" )?" id='plotarea'":"";
        if($specification['datatype'] == 1){
          ?>
          <div class="col-md-12">
            <div class="row">
              <?php $classdiv = ($specification['areatype'] == "1")?"col-md-8 col-sm-8 col-xs-8 col-8":"col-md-12 col-sm-12 col-xs-12 col-12"; 
              ?>
              
              <div class="<?php echo $classdiv; ?> no-paddding ">
              <input type="number" min="0" name="specification[<?=$key?>][]" class="form-control required" onkeypress="return isNumber(event)" placeholder="<?php echo $specification['name']; ?>" <?php echo $fieldidvalue; ?> <?php echo $mandatorycheck; ?> value="<?= (isset($psv[$key])) ? $psv[$key][0] : ''?>"/>
              </div>
              <?php if($specification['areatype'] == "1"){ ?>
              <div class="col-md-4 col-sm-4 col-xs-4 col-4 no-paddding ">
                <?php 
                $propertyareatype [0] = 'Unit';
                $options =' id="propertyareatype" data-placeholder="Choose a type..." class="form-control required" tabindex="2"';
                echo form_dropdown('propertyareatype['.$key.'][]',$propertyareatype,(isset($psvtype[$key])) ? $psvtype[$key][0] : '',$options);
                ?>
              </div>
            <?php } ?>
            </div>
          </div>
          
          <?php 
        } else if($specification['datatype'] == 2){
        ?>
        <input type="text" name="specification[<?=$key?>][]" class="form-control" placeholder="<?php echo $specification['name'] ?>" <?php echo $fieldidvalue; ?> <?php echo $mandatorycheck; ?> value="<?= (isset($psv[$key])) ? $psv[$key][0] : ''?>"/>
        <?php
        } else if($specification['datatype'] == 3){
        ?>
        <input type="date" name="specification[<?=$key?>][]" id="specification[<?=$key?>][]" data-fid="specification[<?=$key?>][]" data-id="<?php echo $specification['name'] ?>" class="specificclick form-control" placeholder="<?php echo $specification['name'] ?>" <?php echo $fieldidvalue; ?> <?php echo $mandatorycheck; ?> value="<?= (isset($psv[$key])) ? $psv[$key][0] : ''?>" />
        <?php
        }
        ?> 
        
        
                  
  <?php $i++; } //echo ($i%2==0 && $i!= $spcno && $k!=$i)? '</div><div class="form-group">':''; 
  ?>
</div> 
</div>
<script src="<?php echo base_url(JS); ?>/bootstrap-multiselect.js"></script>
<script type="text/javascript">
 // $(document).ready(function() {  
        $('#multi-select-demo').multiselect();
  //});
</script>
  <?php
    }


   } else {
      ?>
      <div class="col-md-12"> 
         <span align="center" class="mar-bt-20">Please select the category in previous first tab</span>
      </div> <!--col-md-12 ended-->
      <?php
   }
   ?>
  </div>
</div>
<div class="row">
     <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="row">
                                    <div class="form-group">
                                    <label>Total Area</label>
                  <input type="number" min="0" id="plotarea" name="totalarea" class="form-control required" onkeypress="return isNumber(event)" placeholder="Total area"  value="<?php echo $products->totalarea; ?>" required/>
                  <!-- <span class="input-group-addon">Feet</span> -->
                </div>   <div class="col-md-4 col-sm-4 col-xs-4 col-4 no-paddding ">
                <label>Unit</label>
                <?php 
                $propertyareatype [''] = 'Unit';
                $options =' id="areatype" data-placeholder="Choose a type..." class="form-control required" tabindex="2"';
                echo form_dropdown('areatype',$propertyareatype,$products->areatype,$options);
                ?>
              </div></div>
                                   
                                 </div>
<!-- New static section starts here for property details 
<div class="col-md-3 col-sm-3 col-xs-12">
   <div class="form-group">
       <label>Price Type</label>
      
      $pricetype = array('' => "Select Price Type" ,'Feet' => "Feet" ,"Meter" => "Meter","Yard" => "Yard","Acre" => "Acre","Gunta" => "Gunta");
      $options =' id="pricetype" data-placeholder="Choose a Price Type..." class="form-control" ';
      echo form_dropdown('pricetype',$pricetype,$products->pricetype,$options);
      ?>
   </div>
</div>-->
<div class="col-md-3 col-sm-3 col-xs-12">
   <div class="form-group">
       	<label>Price</label>
      <input type="text" class="form-control" placeholder="Price" name="price" id="price"  onkeypress="return isNumber(event)" value="<?php echo $products->price; ?>" >
   </div>
</div> 
<!-- <div class="col-md-3 col-sm-3 col-xs-12">
   <div class="form-group">
       	<label>Available From</label>
      <input type="text" class="form-control datepicker" placeholder="Enter Position Date" name="available_from" id="available_from" autocomplete="off" value=" echo $products->available_from; " >
   </div>
</div>
<div class="col-md-3 col-sm-3 col-xs-12">
   <div class="form-group">
       <label>Negotiable</label>
      <
      $negotiable = array("" => "Negotiable" ,"Yes" => "Yes" ,"No" => "No");
      $options =' id="negotiable" data-placeholder="Choose a Price Type..." class="form-control" ';
      echo form_dropdown('negotiable',$negotiable,$products->negotiable,$options);
      
   </div>
</div> -->
<div class="col-md-3 col-sm-3 col-xs-12">
   <div class="form-group">
       	<label>Price Per</label>
       	<input type="text" class="form-control" name="pricepervalue" id="pricepervalue" placeholder="Price Per" readonly="readonly" disabled="disabled" value="<?php echo $products->priceper; ?>" >
     <input type="hidden" id="priceper" name="priceper" value="<?php echo $products->priceper; ?>">
      <span id="pricecalerror" class="error"></span>
   </div>
</div> 
<div class="col-md-3 col-sm-3 col-xs-12">
   <div class="form-group">
       <label>Youtube Video Id</label>
      <input  type="text" class="form-control" placeholder="Project Video" name="video1" id="video1" value="<?php echo $products->video1; ?>">
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
          
      <textarea class="form-control mb-20" placeholder="Description" name="description" cols="50" rows="4" id="description"><?php echo strip_tags($products->description); ?></textarea>
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
                                          <input type='file' name="image" id="image" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" required="required" />
                                          <label for="image"></label>
                                          <?php //if(!empty($products->image)){
                                             ?>
                                              <button class="btn-close lko" type="button" OnClick="Remove_0();">X</button>
                                             <?php
                                         // } ?>
                                       </div>
                                       <div class="avatar-preview">
                     <?php
                     if($products->image!='' && file_exists('./uploads/products/'.$products->image)) $src = base_url().'uploads/products/'.$products->image; else $src = base_url(IMAGES).'/dummy-image.png';
                     ?>
                     <div id="imagePreview" style="background-image: url(<?php echo $src; ?>);">
                     </div>
                                          
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image1" id="image1" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" />
                                          <label for="image1"></label>
                                          <?php // if(!empty($products->image1)){
                                             ?>
                                              <button class="btn-close lko" type="button" OnClick="Remove_1();">X</button>
                                             <?php
                                         // } ?>
                                       </div>
                                       <div class="avatar-preview">
                                       <?php
                     if($products->image1!='' && file_exists('./uploads/products/'.$products->image1)) $src = base_url().'uploads/products/'.$products->image1; else $src = base_url(IMAGES).'/dummy-image.png';
                     ?>
                     <div id="imagePreview1" style="background-image: url(<?php echo $src; ?>);">
                     </div>
                                          
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image2" id="image2" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" />
                                          <label for="image2"></label>
                                          <?php // if(!empty($products->image2)){
                                             ?>
                                              <button class="btn-close lko" type="button" OnClick="Remove_2();">X</button>
                                             <?php
                                          //} ?>
                                       </div>
                                       <div class="avatar-preview">
                                          <?php
                     if($products->image2!='' && file_exists('./uploads/products/'.$products->image2)) $src = base_url().'uploads/products/'.$products->image2; else $src = base_url(IMAGES).'/dummy-image.png';
                     ?>
                     <div id="imagePreview2" style="background-image: url(<?php echo $src; ?>);">
                     </div>
                                         
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image3" id="image3" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" />
                                          <label for="image3"></label>
                                          <?php // if(!empty($products->image3)){
                                             ?>
                                              <button class="btn-close lko" type="button" OnClick="Remove_3();">X</button>
                                             <?php
                                          //} ?>
                                       </div>
                                       <div class="avatar-preview">
                                          <?php
                     if($products->image3!='' && file_exists('./uploads/products/'.$products->image3)) $src = base_url().'uploads/products/'.$products->image3; else $src = base_url(IMAGES).'/dummy-image.png';
                     ?>
                     <div id="imagePreview3" style="background-image: url(<?php echo $src; ?>);">
                     </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image4" id="image4" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" />
                                          <label for="image4"></label>
                                          <?php // if(!empty($products->image4)){
                                             ?>
                                              <button class="btn-close lko" type="button" OnClick="Remove_4();">X</button>
                                             <?php
                                          //} ?>
                                       </div>
                                       <div class="avatar-preview">
                                          <?php
                     if($products->image4!='' && file_exists('./uploads/products/'.$products->image4)) $src = base_url().'uploads/products/'.$products->image4; else $src = base_url(IMAGES).'/dummy-image.png';
                     ?>
                     <div id="imagePreview4" style="background-image: url(<?php echo $src; ?>);">
                     </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image5" id="image5" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" />
                                          <label for="image5"></label>
                                          <?php // if(!empty($products->image5)){
                                             ?>
                                              <button class="btn-close lko" type="button" OnClick="Remove_5();">X</button>
                                             <?php
                                          //} ?>
                                       </div>
                                       <div class="avatar-preview">
                                          <?php
                     if($products->image5!='' && file_exists('./uploads/products/'.$products->image5)) $src = base_url().'uploads/products/'.$products->image5; else $src = base_url(IMAGES).'/dummy-image.png';
                     ?>
                     <div id="imagePreview5" style="background-image: url(<?php echo $src; ?>);">
                     </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image6" id="image6" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" />
                                          <label for="image6"></label>
                                          <?php // if(!empty($products->image6)){
                                             ?>
                                              <button class="btn-close lko" type="button" OnClick="Remove_6();">X</button>
                                             <?php
                                         // } ?>
                                       </div>
                                       <div class="avatar-preview">
                                          <?php
                     if($products->image6!='' && file_exists('./uploads/products/'.$products->image6)) $src = base_url().'uploads/products/'.$products->image6; else $src = base_url(IMAGES).'/dummy-image.png';
                     ?>
                     <div id="imagePreview6" style="background-image: url(<?php echo $src; ?>);">
                     </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image7" id="image7" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" />
                                          <label for="image7"></label>
                                          <?php // if(!empty($products->image7)){
                                             ?>
                                              <button class="btn-close lko" type="button" OnClick="Remove_7();">X</button>
                                             <?php
                                         // } ?>
                                       </div>
                                       <div class="avatar-preview">
                                          <?php
                     if($products->image7!='' && file_exists('./uploads/products/'.$products->image7)) $src = base_url().'uploads/products/'.$products->image7; else $src = base_url(IMAGES).'/dummy-image.png';
                     ?>
                     <div id="imagePreview7" style="background-image: url(<?php echo $src; ?>);">
                     </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image8" id="image8" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" />
                                          <label for="image8"></label>
                                          <?php // if(!empty($products->image8)){
                                             ?>
                                              <button class="btn-close lko" type="button" OnClick="Remove_8();">X</button>
                                             <?php
                                          //} ?>
                                       </div>
                                       <div class="avatar-preview">
                                          <?php
                     if($products->image8!='' && file_exists('./uploads/products/'.$products->image8)) $src = base_url().'uploads/products/'.$products->image8; else $src = base_url(IMAGES).'/dummy-image.png';
                     ?>
                     <div id="imagePreview8" style="background-image: url(<?php echo $src; ?>);">
                     </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image9" id="image9" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" />
                                          <label for="image9"></label>
                                          <?php // if(!empty($products->image9)){
                                             ?>
                                              <button class="btn-close lko" type="button" OnClick="Remove_9();">X</button>
                                             <?php
                                          //} ?>
                                       </div>
                                       <div class="avatar-preview">
                                          <?php
                     if($products->image9!='' && file_exists('./uploads/products/'.$products->image9)) $src = base_url().'uploads/products/'.$products->image9; else $src = base_url(IMAGES).'/dummy-image.png';
                     ?>
                     <div id="imagePreview9" style="background-image: url(<?php echo $src; ?>);">
                     </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-2">
                                    <div class="avatar-upload">
                                       <div class="avatar-edit">
                                          <input type='file' name="image10" id="image10" onchange="validateProImage(this.name)" accept=".png, .jpg, .jpeg" />
                                          <label for="image10"></label>
                                          <?php // if(!empty($products->image10)){
                                             ?>
                                              <button class="btn-close lko" type="button" OnClick="Remove_10();">X</button>
                                             <?php
                                          //} ?>
                                       </div>
                                       <div class="avatar-preview">
                                          <?php
                     if($products->image10!='' && file_exists('./uploads/products/'.$products->image10)) $src = base_url().'uploads/products/'.$products->image10; else $src = base_url(IMAGES).'/dummy-image.png';
                     ?>
                     <div id="imagePreview10" style="background-image: url(<?php echo $src; ?>);">
                     </div>
                                       </div>
                                    </div>
                                 </div>
                               
                                 
                              </div>
                           </div>
                              <div class="pull-right">
                                 <a class="btn theme-btn btn-style-one btnPrevious3">Previous</a>
                                 <button type="submit" class="btn theme-btn btn-style-one ">Submit</button>
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
<input type="hidden" id="siteurl_data" value="<?php echo site_url(); ?>">
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
   });
   //-------------
   function readURL6(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreview6').css('background-image', 'url('+e.target.result +')');
              $('#imagePreview6').hide();
              $('#imagePreview6').fadeIn(660);
          }
          reader.readAsDataURL(input.files[0]);
      }
   }
   $("#image6").change(function() {
      readURL6(this);
   });
   //-------------
   function readURL7(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreview7').css('background-image', 'url('+e.target.result +')');
              $('#imagePreview7').hide();
              $('#imagePreview7').fadeIn(770);
          }
          reader.readAsDataURL(input.files[0]);
      }
   }
   $("#image7").change(function() {
      readURL7(this);
   });
   //-------------
   function readURL8(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreview8').css('background-image', 'url('+e.target.result +')');
              $('#imagePreview8').hide();
              $('#imagePreview8').fadeIn(880);
          }
          reader.readAsDataURL(input.files[0]);
      }
   }
   $("#image8").change(function() {
      readURL8(this);
   });
   //-------------
   function readURL9(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreview9').css('background-image', 'url('+e.target.result +')');
              $('#imagePreview9').hide();
              $('#imagePreview9').fadeIn(990);
          }
          reader.readAsDataURL(input.files[0]);
      }
   }
   $("#image9").change(function() {
      readURL9(this);
   });
   //-------------
   function readURL10(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreview10').css('background-image', 'url('+e.target.result +')');
              $('#imagePreview10').hide();
              $('#imagePreview10').fadeIn(10100);
          }
          reader.readAsDataURL(input.files[0]);
      }
   }
   $("#image10").change(function() {
      readURL10(this);
   });
</script>
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

