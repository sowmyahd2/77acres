
<div class="dashboard">
	<div class="container-fluid">
		<div class="content-area">
			<div class="dashboard-content">
				<div class="dashboard-header clearfix">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<h4>Submit Project</h4>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="breadcrumb-nav">
								<ul>
									<li><a href="<?php echo base_url(); ?>">Index</a></li>
									<li class="active">Submit Project</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="column col-lg-12">
						<div class="properties-box">
							<div class="inner-container">

								<form action="#" method="post" class="property-submit-form" id="postproperties_form">
									<div id="wizard">
										<h2>Basic Details</h2>
										<section>
											<div class="row">
												<!-- Form Group -->
												<div class="form-group col-lg-3 col-md-6 col-sm-12">
													<label>Project Title</label>
													<input type="text" name="text" placeholder="Project Title" required>
												</div>


												<div class="col-md-3 col-sm-3 col-xs-12 form-group">
													<label>Project Type</label>
													<select name="main_id" data-placeholder="Choose a category name..." class="form-control required error main_category">
														<option value="zero" selected="selected" disabled="disabled">Select Category name</option>
														<option value="residential">Residential</option>
														<option value="commercial">Commercial</option>
													</select>
													<label for="main_id" class="error"></label>
												</div>
												<!--col-md-6 ended-->
												<!--col-md-6 ended-->
												<div class="col-md-3 col-sm-3 col-xs-12 form-group">
													<label>Project Type Filter</label>
													<select name="cat_id" data-placeholder="Choose a Category..." class="form-control required error sub_category">
														<option value="">Select Property Type</option>

													</select>
													<label for="sub_categoty" class="error"></label>
												</div>



												<!--col-md-6 ended-->
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="form-group">
														<label>Rera Status</label>
														<select class="form-control" name="rerastatus" id="rerastatus" required="required">
															<option value="" disabled selected>Rera Status</option>
															<option value="yes">Yes</option>
															<option value="no">No</option>
															<option value="notapplicable">Not applicable</option>
														</select>
														<label for="name" class="error"></label>
													</div>
												</div>
												<!--col-md-6 ended-->

												<!--col-md-6 ended-->
												<div class="col-md-3 col-sm-3 col-xs-12" id="basic_reraid" style="display: none;">
													<div class="form-group">
														<label>Rera ID</label>
														<input type="text" class="form-control" name="reraid" id="reraid" placeholder="RERA ID">
														<span class="error" id="reraiderror"></span>
													</div>
												</div>
												<!--col-md-6 ended-->
												<!--col-md-6 ended-->
												<div class="col-md-3 col-sm-3 col-xs-12" id="basic_reraurl" style="display: none;">
													<div class="form-group">
														<label>Rera URL</label>
														<input type="text" class="form-control" name="reraurl" id="reraurl" placeholder="RERA URL">
														<span class="error" id="reraurlerror"></span>
													</div>
												</div>
												<!--col-md-6 ended-->

												<!-- Form Group -->
												<div class="form-group col-lg-3 col-md-6 col-sm-12 project-category">
													<label>Project Category</label>
													<select class="">
														<option>Ready to Move</option>
														<option>Under Construction</option>
													</select>
												</div>

												<!-- Form Group -->
												<div class="form-group col-lg-3 col-md-6 col-sm-12 project-category">
													<label>Project Updated By</label>
													<div class="">
														<div class="radio_owner">
															<label class="radio-inline radio-btn">
																<input type="radio" name="person_details" value="owner" checked="checked"> Owner
																<span class="checkmark"></span>
															</label>
															<label class="radio-inline radio-btn">
																<input type="radio" name="person_details" value="rbconsultant "> RB Consultant
																<span class="checkmark"></span>
															</label>
															<label class="radio-inline radio-btn">
																<input type="radio" name="person_details" value="builder"> Builder
																<span class="checkmark"></span>
															</label>
															<label class="radio-inline radio-btn">
																<input type="radio" name="person_details" value="developer"> Developer
																<span class="checkmark"></span>
															</label>
														</div>
													</div>
												</div>
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="form-group">
														<label>Possession Date</label>
														<div class="input-group date" data-date-format="dd.mm.yyyy">
															<input placeholder="Possession Date" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')">
														</div>
													</div>
												</div>
												<!-- Form Group -->
												<div class="form-group col-lg-3 col-md-6 col-sm-12 project-category">
													<label>Gated Community</label>
													<select class="">
														<option>Yes</option>
														<option>No</option>
													</select>
												</div>
											</div>
										</section>

										<h2>Location</h2>
										<section>

											<div class="row">
												<!-- Form Group -->
												<div class="form-group col-lg-12 col-md-12 col-sm-12">
													<label>Address</label>
													<textarea name="text" placeholder="Address" required></textarea>
												</div>

												<!-- Form Group -->
												<div class="form-group col-lg-3 col-md-6 col-sm-12">
													<label>Country</label>
													<select class="" required>
														<option class="disabled">Country</option>
														<option>India</option>
														<option>Lorem Ipsum</option>
														<option>Lorem Ipsum</option>
														<option>Lorem Ipsum</option>
														<option>Lorem Ipsum</option>
													</select>
												</div>

												<!-- Form Group -->
												<div class="form-group col-lg-2 col-md-6 col-sm-12">
													<label>State</label>
													<select class="" required>
														<option class="disabled">State</option>
														<option>Karnataka</option>
														<option>Tamil Nadu</option>
													</select>
												</div>

												<!-- Form Group -->
												<div class="form-group col-lg-2 col-md-6 col-sm-12">
													<label>City</label>
													<select class="" required>
														<option>Select A City</option>
														<option>Bangalore</option>
														<option>Hydrabad</option>
													</select>
												</div>

												<!-- Form Group -->
												<div class="form-group col-lg-3 col-md-6 col-sm-12">
													<label>Select Locality</label>
													<select class="" required>
														<option>Locality 1</option>
														<option>Locality 2</option>
														<option>Locality 3</option>
														<option>Locality 4</option>
													</select>
												</div>

												<!-- Form Group -->
												<div class="form-group col-lg-2 col-md-6 col-sm-12">
													<label>Pincode</label>
													<input type="text" name="text" placeholder="Area Pincode" required>
												</div>
											</div>
										</section>

										<h2>Property Features</h2>
										<section>
											<div class="row">
												<!-- Form Group -->
												<div class="form-group col-lg-12">
													<textarea name="detail" placeholder="Detailed Information"></textarea>
												</div>

												<!-- Form Group -->
												<div class="form-group col-lg-2 col-md-6 col-sm-12">
													<label>Min Price</label>
													<input type="number" name="" placeholder="Min Price" required>
												</div>

												<!-- Form Group -->
												<div class="form-group col-lg-3 col-md-6 col-sm-12">
													<label>Total Project area (in acre)</label>
													<input type="number" name="" placeholder="Total Area" required>
												</div>

												<div class="col-md-2 col-sm-3 col-xs-12">
													<div class="form-group">
														<label>Total No. of floors</label>
														<select class="form-control" name="totalfloor">
															<option value="" selected disabled>Total No. of floors</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
															<option value="20+">20+</option>
														</select>
													</div>
												</div>
												<!-- Form Group -->
												<div class="form-group col-lg-2 col-md-6 col-sm-12">
													<label>Number Of Units</label>
													<input type="number" name="" placeholder="Units" required>
												</div>

												<!-- Form Group -->
												<div class="form-group col-lg-3 col-md-6 col-sm-12">
													<label>Approval Authority</label>
													<select class="">
														<option value="">Approval Authority</option>
														<option value="BDA">BDA</option>
														<option value="BMRDA">BMRDA</option>
														<option value="BBMP">BBMP</option>
														<option value="BIAPPA">BIAPPA</option>
														<option value="MUDA">MUDA</option>
														<option value="others">Others</option>
													</select>
												</div>


												<!--col-md-4 ended-->
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="form-group">
														<div class="col-md-12">
															<div class="row">
																<div class="col-md-8 col-sm-8 col-xs-8 col-8 no-paddding">
																	<input type="text" class="form-control required valid" placeholder="Super-Builtup Area" name="superbuiltup">
																</div>
																<div class="col-md-4 col-sm-4 col-xs-4 col-4 no-paddding">
																	<select class="form-control select-padding" name="areunit">
																		<option value="" selected disabled>Unit</option>
																		<option value="sqft">sq.ft</option>
																		<option value="sqyards">sq.yards</option>
																		<option value="sqm">sq.m</option>
																		<option value="acres">acres</option>
																		<option value="gunta">gunta</option>
																	</select>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!--col-md-4 ended-->
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="form-group">
														<div class="col-md-12">
															<div class="row">
																<div class="col-md-8 col-sm-8 col-xs-8 col-8 no-paddding">
																	<input type="text" class="form-control required valid" placeholder="Builtup Area" name="builtup">
																</div>
																<div class="col-md-4 col-sm-4 col-xs-4 col-4 no-paddding">
																	<select class="form-control select-padding" name="areunit">
																		<option value="" selected disabled>Unit</option>
																		<option value="sqft">sq.ft</option>
																		<option value="sqyards">sq.yards</option>
																		<option value="sqm">sq.m</option>
																		<option value="acres">acres</option>
																		<option value="gunta">gunta</option>
																	</select>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!--col-md-4 ended-->
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="form-group">
														<div class="col-md-12">
															<div class="row">
																<div class="col-md-8 col-sm-8 col-xs-8 col-8 no-paddding">
																	<input type="text" class="form-control" placeholder="Carpet Area" name="carpet">
																</div>

																<div class="col-md-4 col-sm-4 col-xs-4 col-4 no-paddding">
																	<select class="form-control select-padding" name="areunit">
																		<option value="" selected disabled>Unit</option>
																		<option value="sqft">sq.ft</option>
																		<option value="sqyards">sq.yards</option>
																		<option value="sqm">sq.m</option>
																		<option value="acres">acres</option>
																		<option value="gunta">gunta</option>
																	</select>
																</div>
															</div>
														</div>
													</div>
												</div>


											</div>
											<div class="row">
												<div class="form-group col-lg-3 col-md-6 col-sm-12">
													<div class="check-box">
														<input type="checkbox" name="shipping-option" id="service-1">
														<label for="service-1">24/7 water</label>
													</div>
												</div>

												<div class="form-group col-lg-3 col-md-6 col-sm-12 ">
													<div class="check-box">
														<input type="checkbox" name="shipping-option" id="service-2">
														<label for="service-2">STP</label>
													</div>
												</div>


												<div class="form-group col-lg-3 col-md-6 col-sm-12 ">
													<div class="check-box">
														<input type="checkbox" name="shipping-option" id="service-4">
														<label for="service-4">Drainage system</label>
													</div>
												</div>

												<div class="form-group col-lg-3 col-md-6 col-sm-12 ">
													<div class="check-box">
														<input type="checkbox" name="shipping-option" id="service-5">
														<label for="service-5">Security</label>
													</div>
												</div>



												<div class="form-group col-lg-3 col-md-6 col-sm-12 ">
													<div class="check-box">
														<input type="checkbox" name="shipping-option" id="service-7">
														<label for="service-7">Garden</label>
													</div>
												</div>

												<div class="form-group col-lg-3 col-md-6 col-sm-12 ">
													<div class="check-box">
														<input type="checkbox" name="shipping-option" id="service-8">
														<label for="service-8">Gas pipeline</label>
													</div>
												</div>

												<div class="form-group col-lg-3 col-md-6 col-sm-12 ">
													<div class="check-box">
														<input type="checkbox" name="shipping-option" id="service-9">
														<label for="service-9">Club house</label>
													</div>
												</div>

											</div>
										</section>

										<h2>Gallery</h2>
										<section>
											<h5>Upload a Project images</h5><br />
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<label>Add Your Video URL</label>
													<div class="form-group">
														<input type="text" class="form-control" placeholder="Type or Paste your video url here" name="url" id="url">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 text-center">
													<form role="form" action="" method="post" enctype="multipart/form-data">
														<div class="row">
															<div class="col-xs-12 col-md-12">
																<div class="col-md-12 col-lg-12 col-xs-12" id="columns">
																	<h3 class="form-label">Select the images</h3>
																	<div class="desc">
																		<p class="text-center">or drag to box</p>
																	</div>
																	<div id="uploads">
																		<!-- Upload Content -->
																	</div>
																</div>
																<div class="clearfix"></div>
																<button class="btn btn-danger btn-lg pull-left" id="reset" type="button"><i class="fa fa-history"></i> Clear</button>
																<small class="smfonts_s">Your First image will be an exterior image of your property.</small><button class="btn btn-primary btn-lg pull-right" type="submit"><i class="fa fa-upload"></i> Upload </button>
															</div>
														</div>
													</form>
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
<script>
    $(document).ready(function() {
        var pincode = "12345"; // Replace with the desired pincode

        $.ajax({
            url: "get_coordinates.php",
            type: "GET",
            data: {pincode: pincode},
            success: function(response) {
                // Display the latitude and longitude
                $("#result").html("Latitude: " + response.latitude + "<br>Longitude: " + response.longitude);
            },
            error: function() {
                alert("Error occurred while retrieving coordinates.");
            }
        });
    });
    </script>
