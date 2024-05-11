
<div class="dashboard">
	<div class="container-fluid">
		<div class="content-area">
			<div class="dashboard-content">
				<div class="dashboard-header clearfix">
					<div class="row">
						<div class="col-md-4 col-sm-12">
							<h4>Submit Property</h4>
						</div>
						<div class="col-md-8 col-sm-12">
							<div class="breadcrumb-nav">
								<ul>
								 	<li class="active_olk"><a href="<?php echo base_url('users/myshortlisted'); ?>">My Shortlists</a></li>
									<li class="active_olk"><a href="<?php echo base_url('users/profile'); ?>">My Profile</a></li>
									<?php if($userType !="user"){ ?>
									<li class="active_olk"><a href="<?php echo base_url('property'); ?>">Submit Project</a></li>
									<li class="active_olk"><a href="<?php echo base_url('users/myproperties'); ?>">My Properties</a></li>
									<li class="active_olk"><a href="<?php echo base_url('users/myenquires'); ?>">My Enquiries</a></li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="column col-lg-12">
						<div class="properties-box">
							<div class="inner-container">
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
									<div id="wizard">
										<h2>Basic Details</h2>
										<section id="tab_default_1">
											<div class="row">
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="form-group">
														<input type="text" name="name" id="name" class="form-control" placeholder="Your Name*" required="required" value="<?php echo $fname; ?>">
														<label for="name" class="error"></label>
													</div>
												</div>
												<!--col-md-4 ended-->
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="form-group">
														<input type="email" name="pemailid" id="pemailid" class="form-control" placeholder="Email" required="required" <?php echo ($email)?"disabled='disabled'":""; ?>  value="<?php echo $email; ?>">
														<label for="pemailid" class="error"></label>
													</div>
												</div>
												<!--col-md-4 ended-->
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="form-group">
														<input type="text" class="form-control" name="contact" id="contact" maxlength="10" placeholder="Mobile No" value="<?php echo $phone; ?>">
														<label for="contact" class="error"></label>
													</div>
												</div>
												<!--col-md-4 ended-->
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="">
									<?php
									$owner_disable = $dealer_disable = $builder_disable = "";
									if($type == "owner"){
										$owner_disable = "";
										$dealer_disable = " disabled='disabled' ";
										$builder_disable = " disabled='disabled' ";
										$developer_disable = " disabled='disabled' ";
									} else if($type == "rbconsultant"){
										$owner_disable = " disabled='disabled' ";
										$dealer_disable = "";
										$builder_disable = " disabled='disabled' ";
										$developer_disable = " disabled='disabled' ";
									} else if($type == "builder"){
										$owner_disable = " disabled='disabled' ";
										$dealer_disable = " disabled='disabled' ";
										$developer_disable = " disabled='disabled' ";
									 	$builder_disable = "";
									} else if($type == "developer"){
										$owner_disable = " disabled='disabled' ";
										$dealer_disable = " disabled='disabled' ";
										$builder_disable = " disabled='disabled' ";
										$developer_disable = "";
									}
									?>
														<div class="radio_owner">
															<label class="radio-inline radio-btn">
																<input type="radio" name="user_type" value="owner" <?php echo $owner_disable; ?> <?php echo empty($type)?"checked='checked'":""; ?> <?php echo ($type == "owner")?"checked='checked'":""; ?> > Owner
																<span class="checkmark"></span>
															</label>
															<label class="radio-inline radio-btn">
																<input type="radio" name="user_type" value="rbconsultant" <?php echo $dealer_disable; ?> <?php echo ($type == "rbconsultant")?"checked='checked'" :""; ?>> RB Consultant
																<span class="checkmark"></span>
															</label>
															<label class="radio-inline radio-btn">
																<input type="radio" name="user_type" value="builder" <?php echo $builder_disable; ?> <?php echo ($type == "builder")?"checked='checked'":""; ?> > Builder
																<span class="checkmark"></span>
															</label>
															<label class="radio-inline radio-btn">
																<input type="radio" name="user_type" value="developer" <?php echo $developer_disable; ?> <?php echo ($type == "developer")?"checked='checked'":""; ?> > Developer
																<span class="checkmark"></span>
															</label>
														</div>
													</div>
												</div>
												<!--col-md-6 ended-->
												<div class="cleafix"></div>
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="">
														<div class="radio_owner">
															<label class="radio-inline radio-btn">
																<input type="radio" class="property_typecheck" id="sells" name="propertytype" value="1" checked="checked">  Sell
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
													</div>
												</div>
												<!--col-md-6 ended-->
												<div class="col-md-12 row">
													<div class="col-md-3 col-sm-3 col-xs-12">
														<div class="form-group">
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
															<select id="sub_categoty" name="cat_id" data-placeholder="Choose a Category..." class="form-control required" >
                                      <option value="">Select Sub Category</option>
                                    </select>
															<label for="sub_categoty" class="error"></label>
														</div>
													</div>
													<!--col-md-6 ended-->
													<!--col-md-6 ended-->
													<div class="col-md-3 col-sm-3 col-xs-12 basic_resale">
														<div class="">
															<div class="radio_owner">
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
													</div>
													<!--col-md-6 ended-->
													<!--col-md-6 ended-->
													<div class="col-md-3 col-sm-3 col-xs-12 basic_status">
														<div class="form-group">
															<?php  $propertystatus [''] = 'Select Status';
                $options =' id="propertystatus" data-placeholder="Choose a option name..." class="form-control required" ';
                echo form_dropdown('propertystatus',$propertystatus,'',$options);?>
															<label for="propertystatus" class="error"></label>
														</div>
													</div>
													<!--col-md-6 ended-->
													<div class="cleafix"></div>
													<!--col-md-6 ended-->
													<div class="col-md-3 col-sm-3 col-xs-12 basic_age">
														<div class="form-group">
															<?php  $propertyage [''] = 'Age of Property';
                $options =' id="propertyage" data-placeholder="Choose a option name..." class="form-control required" ';
                echo form_dropdown('propertyage',$propertyage,'',$options);?>
															<label for="name" class="error"></label>
														</div>
													</div>
													<!--col-md-6 ended-->
													<!--col-md-6 ended-->
													<div class="col-md-3 col-sm-3 col-xs-12">
														<div class="form-group">
															<select class="form-control" name="rerastatus" id="rerastatus" required="required">
                                          <option value="" disabled selected>Rera Status</option>
                                          <option value="yes">Yes</option>
                                          <option value="no">No</option>
                                       </select>
															<label for="name" class="error"></label>
														</div>
													</div>
													<!--col-md-6 ended-->
													<!--col-md-6 ended-->
													<div class="col-md-3 col-sm-3 col-xs-12 basic_reraid" style="display: none;">
														<div class="form-group">
															<input type="text" class="form-control" name="reraid" id="reraid" placeholder="RERA ID">
															<span class="error" id="reraiderror"></span>
														</div>
													</div>
													<!--col-md-6 ended-->
													<!--col-md-6 ended-->
													<div class="col-md-3 col-sm-3 col-xs-12 basic_reraurl" style="display: none;">
														<div class="form-group">
															<input type="text" class="form-control" name="reraurl" id="reraurl" placeholder="RERA URL">
															<span class="error" id="reraurlerror"></span>
														</div>
													</div>
													<!--col-md-6 ended-->


												</div>

												<div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="pull-right">
                                                        <a href="#" class="btn btn-danger" id="tabnext"> NEXT <i class="fa fa-angle-double-right"></i></a>
                                                    </div>
                                                </div>
												<!--col-md-12 ended-->
											</div>
										</section>

										<h2>Location</h2>
										<section id="tab_default_2">
											<div class="row seprate-row">
												<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
													<div class="form-group">
														<input type="text" class="form-control" placeholder="Project Name" name="projectname" id="projectname" required="required">
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
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="form-group">
														<label>House No/ Bldg./Apt</label>
														<input type="text" class="form-control" name="house" id="house" >
													</div>
												</div>
												<!--col-md-4 ended-->
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="form-group">
														<label>Street/Road/Lane</label>
														<input type="text" class="form-control" name="street" id="street">
													</div>
												</div>
												<!--col-md-4 ended-->
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="form-group">
														<label>Landmark</label>
														<input type="text" class="form-control" placeholder="" name="landmark" id="landmark">
													</div>
												</div>
												<!--col-md-4 ended-->
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="form-group">
														<label>State</label>
														<?php  
                        $statedtl [''] = 'Select State Name';
                        $options = ' id="state_id" data-placeholder="Choose a State Name" class="form-control" ';
                        echo form_dropdown('statename', $statedtl, '',$options);?>
													</div>
												</div>
												<!--col-md-4 ended-->
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="form-group">
														<label>City</label>
														<select id="city_id" name="cityname" data-placeholder="Choose a City..." class="form-control" >
                        <option value="">Select City</option>
                        </select>
													</div>
												</div>
												<!--col-md-4 ended-->
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="form-group">
														<label>Locality</label>
														<select id="locality_id" name="localityname" data-placeholder="Choose a Locality..." class="form-control" >
                        <option value="">Select Locality</option>
                        </select>
													</div>
												</div>
												<!--col-md-4 ended-->
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="form-group">
														<label>Pin code</label>
														<input type="text" class="form-control" placeholder="" name="pincode" id="pincode">
													</div>
												</div>
												<!--col-md-4 ended-->
												<!--col-md-4 ended-->
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="form-group">
														<label>Map coordinates </label>
														<input type="text" class="form-control" placeholder="Enter Latitude" name="latitude" id="latitude">
														<input type="text" class="form-control" placeholder="Enter Longitude" name="longitude" id="longitude">
													</div>
												</div>
												<!--col-md-4 ended-->
												<div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <div class="pull-left">
                                                        <a href="#"  class="btn btn-default" name="previous" id="tab2pre"><i class="fa fa-angle-double-left"></i> PREVIOUS</a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <div class="pull-right">
                                                        <a href="#" class="btn btn-danger" name="next" id="tab2next">NEXT <i class="fa fa-angle-double-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
											</div>
										</section>

										<h2>Property Details</h2>
										<section id="tab_default_3">

											<span>
												<div class="row">
													<!--col-md-4 ended-->
<div class="" id="product_specification">
   <div class="col-md-12"> 
      <span align="center" class="mar-bt-20">Please select the category in previous first tab</span>
   </div> <!--col-md-12 ended-->
   <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<!-- New static section starts here for property details -->
<div class="col-md-3 col-sm-3 col-xs-12">
   <div class="form-group">
      <?php
      $pricetype = array('' => "Select Price Type" ,'Feet' => "Feet" ,"Meter" => "Meter","Yard" => "Yard","Acre" => "Acre","Gunta" => "Gunta");
      $options =' id="pricetype" data-placeholder="Choose a Price Type..." class="form-control" ';
      echo form_dropdown('pricetype',$pricetype,"",$options);
      ?>
   </div>
</div>
<div class="col-md-3 col-sm-3 col-xs-12">
   <div class="form-group">
      <input type="text" class="form-control" name="priceper" id="priceper" placeholder="Price Per" >
   </div>
</div> 
<div class="col-md-3 col-sm-3 col-xs-12">
   <div class="form-group">
      <input type="text" class="form-control datepicker" placeholder="Enter Position Date" name="available_from" id="available_from" >
   </div>
</div>
<div class="col-md-3 col-sm-3 col-xs-12">
   <div class="form-group">
      <?php
      $negotiable = array("" => "Negotiable" ,"Yes" => "Yes" ,"No" => "No");
      $options =' id="negotiable" data-placeholder="Choose a Price Type..." class="form-control" ';
      echo form_dropdown('negotiable',$negotiable,"",$options);
      ?>
   </div>
</div>
<div class="col-md-3 col-sm-3 col-xs-12">
   <div class="form-group">
      <input type="text" class="form-control" placeholder="Price" name="price" id="price" readonly="readonly" >
      <span id="pricecalerror" class="error"></span>
   </div>
</div> 
<div class="col-md-3 col-sm-3 col-xs-12">
   <div class="form-group">
      <input  type="text" class="form-control" placeholder="Project Video" name="video1" id="video1" >
      <span class="help-block">Youtube Video Id</span>
   </div>
</div> 
<div class="col-md-3 col-sm-3 col-xs-12">
   <div class="form-group">
      <input  type="file" class="form-control" placeholder="brochure" name="brochure" id="brochure">
      <span class="help-block">Brochure Accepted only pdf formats</span>
   </div>
</div>
<div class="clearfix"></div>
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="form-group">
      <textarea class="form-control mb-20" placeholder="Description" name="description" cols="50" rows="4" id="description"></textarea>
   </div>
</div>
<!-- New static section ends here -->
										<div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <div class="pull-left">
                                                    <a href="#"  class="btn btn-default" name="previous" id="tab3pre"> <i class="fa fa-angle-double-left"></i> PREVIOUS</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <div class="pull-right">
                                                   <a href="#"  class="btn btn-danger" name="next" id="tab3next">NEXT <i class="fa fa-angle-double-right"></i></a>
                                                </div>
                                            </div>
                                        </div>	
													<!--col-md-4 ended-->
												</div>
											</span>

										</section>

										<h2>Gallery</h2>
										<section id="tab_default_4">
											<h5>Upload a Property images</h5>
											<small class="smfonts_s">Note: Your First image will be an exterior image of your property.</small>
											<div class="row">
												<div class="col-md-12 text-center">
													
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<div class="col-md-12 col-lg-12 col-xs-12" id="columns">
				<h3 class="form-label">Select the images</h3>
				<div class="desc">
					<p class="text-center"></p>
				</div>
				<div id="uploads">
					<!-- Upload Content -->
				</div>
			</div>
			<div class="clearfix"></div>
			<button class="btn btn-danger btn-lg pull-left" id="reset" type="button"><i class="fa fa-history"></i> Clear</button>
			<button class="btn btn-primary btn-lg pull-right" type="submit"><i class="fa fa-upload"></i> Upload </button>
		</div>
	</div>
													
												</div>
												<div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <div class="pull-left">
                                                    <a href="#" class="btn btn-default" name="previous" id="tab4pre"><i class="fa fa-angle-double-left"></i> PREVIOUS</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <div class="pull-right">
                                                   <input type="submit" name="post_properties_form" class="btn btn-danger" value="SUBMIT" >
                                                    <!-- <a href="#" class="btn btn-danger" id="form_submit" type="submit">SUBMIT <i class="fa fa-angle-double-right"></i></a> -->
                                                </div>
                                            </div>
                                        </div>
											</div>

										</section>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

