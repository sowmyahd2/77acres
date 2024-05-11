<?php
$usernamedata = $rguser_details->fname;
if ($usernamedata) {
    $namedata = $rguser_details->fname;
} else {
    $emailuser_data = explode("@", $rguser_details->email);
    $namedata = isset($emailuser_data[0]) ? $emailuser_data[0] : "User";
    if (strlen($namedata) > 9) {
        $namedata = substr($namedata, 0, 9) . "..";
    }
}
?>
		<div class="dashboard">
			<div class="container-fluid">
				<div class="content-area">
					<div class="dashboard-content">
					
<div class="row">
<div class="column col-lg-12">
<div class="properties-box">
<div class="inner-container">
<div class="title">
	<h3>Profile Details</h3>
</div>
<div class="profile-form">
	<div class="row">
		<div class="col-lg-4 col-md-12 col-sm-12">
			<!-- Edit profile photo -->
<?php echo form_open_multipart("users/updatedtl",'class="form-horizontal"');?>
<input type="hidden" name="userid" value="<?php echo $rguser_details->id; ?>">
<input type="hidden" name="usertype" id="usertype" class="form-control" placeholder="<?php echo $rguser_details->type; ?>" value="<?php echo $rguser_details->type; ?>">
				<div class="row">
					<div class="col-xs-12 col-md-12">
						<div class="col-md-12 col-lg-12 col-xs-12" id="columns">
							<h3 class="form-label text-center">Select the images</h3><br/>
							<div class="customFile" data-controlMsg="Choose a file">
								<span class="selectedFile">No file selected</span>
								<input type="file" name="user_image" id="user_image" class="widthPreview" onchange="validateImage()">
							</div>
							<div class="previewContainer">
								<?php  if($rguser_details-> image!='' && file_exists('./uploads/regusers/'.$rguser_details->image)) $src = base_url().'uploads/regusers/'.$rguser_details->image; else $src = base_url(IMAGES).'/no-image-available.png'; ?>
								<img class="preview" src="<?php echo $src; ?>" alt="Image preview..." />
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			
		</div>

		<div class="col-lg-8 col-md-12 col-sm-12">
			
				<div class="row">
					<!-- Form Group -->
					<div class="form-group col-lg-6 col-md-6 col-sm-12">
						<label>Your First Name</label>
						<input type="text" class="form-control" id="firstname" required="" name="firstname" onkeypress="return alphaOnly(event)" value="<?php echo $rguser_details->fname; ?>">
					</div>

					<!-- Form Group -->
					<div class="form-group col-lg-6 col-md-6 col-sm-12">
						<label>Your Last Name</label>
						<input type="text" class="form-control" id="lastname" name="lastname" required="" onkeypress="return alphaOnly(event)" value="<?php echo $rguser_details->lname; ?>">
					</div>

					<!-- Form Group -->
					<div class="form-group col-lg-6 col-md-6 col-sm-12">
						<label>Phone #</label>
						<input type="text" class="form-control" minlength="10" maxlength="12" id="mobile" name="mobile" onkeypress="return isNumber(event)" value="<?php echo $rguser_details->phone; ?>" required>
					</div>

					<!-- Form Group -->
					<div class="form-group col-lg-6 col-md-6 col-sm-12">
						<label>Your Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="<?php echo $rguser_details->email; ?>" disabled>
					</div>

					<!-- Form Group -->
					<div class="form-group col-lg-6 col-md-6 col-sm-12">
						<label>Select A Gender</label>
						<?php
$gender = array("Male" => "Male" ,"Female" => "Female" );
$options =' id="gender" data-placeholder="Choose a Price Type..." class="form-control" ';
echo form_dropdown('gender',$gender,$rguser_details->gender,$options);
?>
						
					</div>
				<!--	<div class="form-group col-lg-6 col-md-6 col-sm-12">
						<label>Date Of Birth</label>
						<input type="text" class="form-control" name="dob" id="userdob" autocomplete="off" value=" echo $rguser_details->dob; ?>">
						<span id="DOBlblError"></span>
					</div> -->
					

					<!-- Form Group -->
					<div class="form-group text-right col-lg-12 col-md-12 col-sm-12">
						<button type="submit" class="theme-btn btn-style-one">Update Profile</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
</div>
</div>
	<!--
							<div class="column col-lg-6 col-md-12">
								<div class="properties-box">
									<div class="inner-container">
										<div class="title">
											<h3>Change Password</h3>
										</div>
										<div class="profile-form">
											<form id="forgotemail-form" method="post" action="<?php echo base_url('users/password_change'); ?>">
												<input type="hidden" name="user_id" value="<?php echo $rguser_details->id; ?>">
												<div class="row">
													
													<div class="form-group col-lg-12">
														<label>Current Password</label>
														<input type="text" id="cpassword" name="cpassword" placeholder="Current Password" required>
													</div>

												
													<div class="form-group col-lg-12">
														<label>New Password</label>
														<input type="text" id="password" onfocusout="return validateResetPassword(event)" name="password" placeholder="New Password" required>
													</div>

													
													<div class="form-group col-lg-12">
														<label>Confirm New Password</label>
														<input type="text" id="cpassword" equalTo="#password" name="cpassword" placeholder="Confirm New Password" required>
													</div>

												
													<div class="form-group col-lg-12">
														<button type="submit" class="theme-btn btn-style-one">Update Password</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>-->

							<div class="column col-lg-6 col-md-12">
								<div class="properties-box">
									<div class="inner-container">
										<div class="title">
											<h3>Address Details</h3>
										</div>
										<div class="profile-form">
											<form method="post" action="<?php echo base_url('users/updateaddress'); ?>">
												<input type="hidden" name="userid" value="<?php echo $rguser_details->id; ?>">
												<div class="row">
													<!-- Form Group -->
													<div class="form-group col-lg-12">
														<label>Address</label>
														<textarea name="useraddress" id="address" rows="2" required="required"><?php echo $rguser_details->address1; ?></textarea>
													</div>
	<div class="form-group col-lg-6">
																<label>State</label>
																<?php  
        $statedtl [''] = 'Select State Name';
        $options = ' id="state_id" data-placeholder="Choose a State Name" class="form-control required" tabindex="2"';
        echo form_dropdown('statename', $statedtl, $rguser_details->state_id,$options);?>
															</div>
															<div class="form-group col-lg-6">
																<label>City</label>
																<?php  
       if(!empty($rguser_details->city_id)){
        $options = ' id="city_id" data-placeholder="Choose a City Name..." class="form-control required" tabindex="2"';
        echo form_dropdown('cityname', $citydtl, $rguser_details->city_id,$options);
       } else {
        ?>
        <select id="city_id" name="cityname" data-placeholder="Choose a City..." class="form-control required" tabindex="2">
        <option value="">Select City</option>
        </select>
        <?php
       }
       ?>
															</div>
													<!-- Form Group -->
													

													
													<!-- Form Group -->
													<div class="form-group col-lg-12">
														<button type="submit" class="theme-btn btn-style-one">Save Changes</button>
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
			</div>
		</div>

