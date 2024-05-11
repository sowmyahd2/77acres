<!-- Main Footer -->
<style>
   .footer-widget .list li{
      padding:0 0 0 30px !important;
   }
   </style>
<footer class="main-footer hidden-xs" style="background-image: url(<?php echo base_url(IMAGES); ?>/fixed-slider.png);">
   <div class="auto-container">
      <div class="upper-box">
         <div class="row">
            <!-- Upper column -->
            <div class="upper-column col-lg-3 col-md-12 col-sm-12">
               <div class="footer-logo">
                  <figure class="image"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(IMAGES); ?>/logo.png" alt="RB Group"></a></figure>
               </div>
            </div>
            <!-- Upper column -->
            <div class="upper-column col-lg-6 col-md-12 col-sm-12">
               <div class="subscribe-form">
                  <form method="post" id="subscribe-form" action="<?php echo base_url(); ?>">
                     <div class="form-group">
                        <input type="email" name="subscribeemail" id="subscribe" placeholder="Enter Your Email" required="">
                        <button type="submit" class="theme-btn btn-style-four">Submit</button>
                     </div>
                  </form>
               </div>
            </div>
            <!-- Upper column -->
            
            <div class="upper-column col-lg-3 col-md-12 col-sm-12">
               
            <div class="social-links">
                  <ul class="social-icon-two" style="display:INLINE-FLEX">
                     <li><a href="<?php echo FACEBOOKWEBLINK; ?>" target="_blank"><i class="la la-facebook"></i></a></li>
                     <li><a href="<?php echo TWITTERWEBLINK; ?>" target="_blank"><i class="la la-twitter"></i></a></li>
                     <li><a href="<?php echo GOOGLEWEBLINK; ?>" target="_blank"><i class="la la-google-plus"></i></a></li>
                     <li><a href="<?php echo LINKEDWEBLINK; ?>" target="_blank"><i class="la la-dribbble"></i></a></li>
                     <li><a href="<?php echo LINKEDWEBLINK; ?>" target="_blank"><i class="la la-pinterest-p"></i></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!--Widgets Section-->
      <div class="widgets-section">
         <div class="row">
            <!--Big Column-->
            <div class="big-column col-xl-4 col-lg-12 col-md-12 col-sm-12">
               <div class="row">
                  <!--Footer Column-->
                  <div class="footer-column col-xl-12 col-lg-6 col-md-6 col-sm-12">
                     <div class="footer-widget cities-widget">
                        <h2 class="widget-title">PROPERTY CITIES</h2>
                        <div class="widget-content">
                           <ul class="list clearfix">
                              <?php if(is_array($footerCity) && count($footerCity)){
                              foreach ($footerCity as $key => $footerCity) { 
                              ?>
                              <li><a href="<?php echo base_url('property/location/'.$footerCity -> id); ?>"><?php echo ucfirst($footerCity -> city)?></a></li>
                              <?php } } ?>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--Big Column-->
            <div class="big-column col-xl-8 col-lg-12 col-md-12 col-sm-12">
               <div class="row clearfix">
                  <!--Footer Column-->
                  <div class="footer-column col-xl-4 col-lg-6 col-md-6 col-sm-12">
                     <div class="footer-widget links-widget">
                        <h2 class="widget-title">QUICK LINKS</h2>
                        <div class="widget-content">
                           <ul class="list clearfix">
                              <li><a href="<?php echo base_url('property/showcase'); ?>">Showcase Your Properties</a></li>
                              <li><a href="<?php echo base_url(); ?>">Home</a></li>
                              <li><a href="<?php echo base_url('aboutus'); ?>">About</a></li>
                              <li><a href="<?php echo base_url('agents'); ?>">RB Team</a></li>
                              <li><a href="">Blogs</a></li>
                              <li><a href="<?php echo base_url('contactus'); ?>">Contact</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <!--Footer Column-->
                  <div class="footer-column col-xl-4 col-lg-6 col-md-6 col-sm-12">
                     <div class="footer-widget links-widget">
                        <h2 class="widget-title">Top Areas</h2>
                        <div class="widget-content">
                           <ul class="list clearfix">
                              <?php if(is_array($footerArea) && count($footerArea)){
                              foreach ($footerArea as $key => $footerArea) { 
                              ?>
                              <li><a href="<?php echo base_url('property/location/'.$footerArea -> city.'/'.$footerArea -> id); ?>"><?php echo ucfirst($footerArea -> area)?></a></li>
                              <?php } } ?>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <!--Footer Column-->
                  <div class="footer-column col-xl-4 col-lg-6 col-md-6 col-sm-12">
                     <div class="footer-widget contact-widget">
                        <h2 class="widget-title">Get in Touch</h2>
                        <div class="widget-content">
                           <ul class="contact-list">
                              <li><span class="la la-map-marker"></span> <?php echo $contactus->address; ?></li>
                              <li><span class="la la-phone"></span><?php echo $contactus->mobile; ?>, <?php echo $contactus->landline; ?></li>
                              <li><span class="la la-envelope"></span><a href="javascript:void(0);"><?php echo $contactus->emailid; ?></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--Footer Bottom-->
   <div class="footer-bottom">
      <div class="auto-container">
         <!--Scroll to top-->
         <div class="scroll-to-top scroll-to-target" data-target="html"><span class="la la-angle-double-up"></span></div>
         <div class="inner-container clearfix">
            <div class="footer-nav">
               <ul class="clearfix">
                  <li><a href="<?php echo base_url('privacypolicy'); ?>">Privacy Policy</a></li>
                  <li><a href="<?php echo base_url('termsandconditions'); ?>">Terms &amp; Conditions</a></li>
               </ul>
            </div>
            <div class="copyright-text">
               <p>© Copyright <?php echo date("Y"); ?> All rights reserved – Design By <a href="https://www.furecs.com" target="_blank">Future Revolution</a></p>
            </div>
         </div>
      </div>
   </div>
</footer>
<!-- End Main Footer -->
<!-- cityModal modal -->
<input type="hidden" name="userlocationstatus" id="userlocationstatus" value="<?php echo ($this ->session -> userdata('citysession'))?"YES":"NO"; ?>">
<div class="modal fade" id="cityModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="lineModalLabel">Select Your City</h5>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
         </div>
         <div class="modal-body">
            <!-- content goes here -->
            <div class="auto-container">
               <div class="row">
                  <?php if(is_array($majorcity) && count($majorcity)){
                  foreach ($majorcity as $key => $majorcity) { 
                  ?>
                  <div class="col-sm-6 text-center">
                     <a href="javascript:void(0);" data-id="<?php echo ucfirst($majorcity -> city)?>" class="majorcity-session">
                     <img src="<?php echo base_url().'uploads/city/'.$majorcity->image; ?>" width="100%" />
                     <h5 class="bold"><?php echo ucfirst($majorcity -> city)?></h5>
                     </a>
                  </div>
                  <?php
                  } } ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- loginModal modal -->
<div class="modal fade" id="newloginmodal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="lineModalLabel">Login</h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
         </div>
         <div class="modal-body">
         <img style="height:150px; width:150px;margin-left:75px" src="<?php echo base_url(IMAGES); ?>/loginimage.jpg" width="100%">  
         <p><strong style="font-weight: bolder;
    font-family: math;
    font-weight: 42px;
    font-size: 14px;
    font-palette: revert;
    font-variant-position: revert-layer;
    font-style: oblique;
    word-wrap: normal;
    word-break: inherit;
    font-stretch: revert-layer;
    font-palette: unset;
    position: relative; 
    text-transform:capitalize,
    top: -10px!important;">Log in to browse properties for buying and selling</strong></p>
         <div class="input-group form-group">
         <form action="#" method="post" id="rbgroup_phoneloginform">
                     <input type="text" class="form-control" placeholder="Enter Your Phone Number" name="loginphonenumber" id="userloginphonenumber" required="required" minlength="7" maxlength="12" onkeypress="return isNumber(event)">
                        
                     <div class="clearfix"></div>
                     <span id="phoneerror" class="error"></span>
                  </div>
                  <button style="width:100%" class="btn btn-default sush_blue generateotpbutton" id="generateotp_button" data-idvalue = "userloginphonenumber" type="button">
                        Generate OTP
                        </button>
                  <div class="form-group" id="otpmodel">
                     <input type="text" class="form-control" name="phoneotp" id="userloginphoneotp" minlength="4" maxlength="4" placeholder="Enter Generated OTP" required="required" onkeypress="return isNumber(event)" autocomplete="off">
                     <span id="otperror" class="error"></span>
                  </div>
         </div>
         <div class="modal-footer">
                     <div class="btn-group" role="group" aria-label="group button" id="subb">
                        <div class="btn-group" role="group">
                           <button type="submit" style="width:100%" id="userphoneloginsubmit" class="theme-btn btn-style-four">LOGIN</button>
                        </div>
                     </div>
                  </div>
               </form>
               
         <a data-toggle="modal" id="newuser" style="border: 1px solid #00c0ff;
    text-align: center;
    padding: 10px;
    margin-left: 10px;
    margin-right: 10px;
    bottom: 10;
    position: relative;
    bottom: 10px;" data-target="#signupModal" data-backdrop="false" class="">New user?</a>            

                        
      </div>
   </div>
</div>
<div class="modal fade" id="registrationform" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="lineModalLabel">Login</h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
         </div>
         <div class="modal-body">
            
            <ul class="tabsa">
              
            <li class="tab-link" data-tab="tab-2">  <a data-toggle="modal" data-target="#signupModal" data-backdrop="false" onclick="closeloginmodal();"> New User Login  </a></li>
            <li class="tab-link current" data-tab="tab-1"> Registered Login</li>
            </ul>
            <div id="tab-1" class="tab-content current">
               <form action="#" method="post" id="rbgroup_phoneloginform">
                  <div class="input-group form-group">
                     <input type="text" class="form-control" placeholder="Enter Your Phone Number" name="loginphonenumber" id="userloginphonenumber" required="required" minlength="7" maxlength="12" onkeypress="return isNumber(event)">
                     <div class="input-group-btn">
                        <button class="btn btn-default sush_blue generateotpbutton" id="generateotp_button" data-idvalue = "userloginphonenumber" type="button">
                        Generate OTP
                        </button>
                     </div>
                     <div class="clearfix"></div>
                     <span id="phoneerror" class="error"></span>
                  </div>
                  <div class="form-group" id="otpmodel">
                     <input type="text" class="form-control" name="phoneotp" id="userloginphoneotp" minlength="4" maxlength="4" placeholder="Enter Generated OTP" required="required" onkeypress="return isNumber(event)" autocomplete="off">
                     <span id="otperror" class="error"></span>
                  </div>
               <!--   <div class="row">
                     <div class="col-md-8">
                        <p>Don't have an account ? <a data-toggle="modal" data-target="#signupModal" data-backdrop="false" onclick="closeloginmodal();"> Create  account </a> </p>
                     </div>
                     <div class="col-md-4">
                        <p class="float-right"> <a data-toggle="modal" data-target="#forgotModal" data-backdrop="false" onclick="closeloginmodal();"> Forgot Password ? </a> </p>
                     </div>
                  </div> -->
                  <div class="modal-footer">
                     <div class="btn-group btn-group-justified" role="group" aria-label="group button" id="subb">
                        <div class="btn-group" role="group">
                           <button type="submit" id="userphoneloginsubmit" class="theme-btn btn-style-four">LOGIN</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <div id="tab-2" class="tab-content">
               <!--<form action="#" method="post" id="rbgroup_loginform">-->
               <!--   <div class="form-group">-->
               <!--      <input type="email" name="email" id="userloginemail" class="form-control" placeholder="Enter Email address" required="required">-->
               <!--      <span id="emailerror" class="error"></span>-->
               <!--   </div>-->
               <!--   <div class="form-group">-->
               <!--      <input type="password" class="form-control" id="userreg_password" name="password" placeholder="Password" required="required">-->
               <!--      <span id="passworderror" class="error"></span>-->
                      
               <!--   </div>-->
               <!--  <span id="loginerror" class="error"></span>-->
               <!--   <div class="row">-->
               <!--      <div class="col-md-8">-->
               <!--         <p>Don't have an account ? <a data-toggle="modal" data-target="#signupModal" data-backdrop="false" onclick="closeloginmodal();"> Create a account </a> </p>-->
               <!--      </div>-->
               <!--      <div class="col-md-4">-->
               <!--         <p class="float-right"> <a data-toggle="modal" data-target="#forgotModal" data-backdrop="false" onclick="closeloginmodal();"> Forgot Password ? </a> </p>-->
               <!--      </div>-->
               <!--   </div>-->
               <!--   <div class="modal-footer">-->
               <!--      <div class="btn-group btn-group-justified" role="group" aria-label="group button">-->
               <!--         <div class="btn-group" role="group">-->
               <!--            <button  id="userloginsubmit" class="theme-btn btn-style-four">LOGIN</button>-->
               <!--         </div>-->
               <!--      </div>-->
               <!--   </div>-->
               <!--</form>-->
            </div>
         </div>
         
      </div>
   </div>
</div>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="lineModalLabel">Login</h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
         </div>
         <div class="modal-body">
            
            <ul class="tabsa">
              
            <li class="tab-link" data-tab="tab-2">  <a data-toggle="modal" data-target="#signupModal" data-backdrop="false" onclick="closeloginmodal();"> New User Login  </a></li>
            <li class="tab-link current" data-tab="tab-1"> Registered Login</li>
            </ul>
            <div id="tab-1" class="tab-content current">
               <form action="#" method="post" id="rbgroup_phoneloginform">
                  <div class="input-group form-group">
                     <input type="text" class="form-control" placeholder="Enter Your Phone Number" name="loginphonenumber" id="userloginphonenumber" required="required" minlength="7" maxlength="12" onkeypress="return isNumber(event)">
                     <div class="input-group-btn">
                        <button class="btn btn-default sush_blue generateotpbutton" id="generateotp_button" data-idvalue = "userloginphonenumber" type="button">
                        Generate OTP
                        </button>
                     </div>
                     <div class="clearfix"></div>
                     <span id="phoneerror" class="error"></span>
                  </div>
                  <div class="form-group" id="otpmodel">
                     <input type="text" class="form-control" name="phoneotp" id="userloginphoneotp" minlength="4" maxlength="4" placeholder="Enter Generated OTP" required="required" onkeypress="return isNumber(event)" autocomplete="off">
                     <span id="otperror" class="error"></span>
                  </div>
               <!--   <div class="row">
                     <div class="col-md-8">
                        <p>Don't have an account ? <a data-toggle="modal" data-target="#signupModal" data-backdrop="false" onclick="closeloginmodal();"> Create  account </a> </p>
                     </div>
                     <div class="col-md-4">
                        <p class="float-right"> <a data-toggle="modal" data-target="#forgotModal" data-backdrop="false" onclick="closeloginmodal();"> Forgot Password ? </a> </p>
                     </div>
                  </div> -->
                  <div class="modal-footer">
                     <div class="btn-group btn-group-justified" role="group" aria-label="group button" id="subb">
                        <div class="btn-group" role="group">
                           <button type="submit" id="userphoneloginsubmit" class="theme-btn btn-style-four">LOGIN</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <div id="tab-2" class="tab-content">
               <!--<form action="#" method="post" id="rbgroup_loginform">-->
               <!--   <div class="form-group">-->
               <!--      <input type="email" name="email" id="userloginemail" class="form-control" placeholder="Enter Email address" required="required">-->
               <!--      <span id="emailerror" class="error"></span>-->
               <!--   </div>-->
               <!--   <div class="form-group">-->
               <!--      <input type="password" class="form-control" id="userreg_password" name="password" placeholder="Password" required="required">-->
               <!--      <span id="passworderror" class="error"></span>-->
                      
               <!--   </div>-->
               <!--  <span id="loginerror" class="error"></span>-->
               <!--   <div class="row">-->
               <!--      <div class="col-md-8">-->
               <!--         <p>Don't have an account ? <a data-toggle="modal" data-target="#signupModal" data-backdrop="false" onclick="closeloginmodal();"> Create a account </a> </p>-->
               <!--      </div>-->
               <!--      <div class="col-md-4">-->
               <!--         <p class="float-right"> <a data-toggle="modal" data-target="#forgotModal" data-backdrop="false" onclick="closeloginmodal();"> Forgot Password ? </a> </p>-->
               <!--      </div>-->
               <!--   </div>-->
               <!--   <div class="modal-footer">-->
               <!--      <div class="btn-group btn-group-justified" role="group" aria-label="group button">-->
               <!--         <div class="btn-group" role="group">-->
               <!--            <button  id="userloginsubmit" class="theme-btn btn-style-four">LOGIN</button>-->
               <!--         </div>-->
               <!--      </div>-->
               <!--   </div>-->
               <!--</form>-->
            </div>
         </div>
         
      </div>
   </div>
</div>
<!-- forgotModal modal -->
<div class="modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="lineModalLabel">Forgot Passsword</h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
         </div>
         <?php echo form_open_multipart(site_url()."users/forgotpassword_submit",'class="clearfix marginTop validate" id="forgotemail-form"');?>
         <div class="modal-body">
            <div class="form-group">
               <label for="exampleInput">Email address* </label>
               <input type="text" id="email" name="email" class="form-control" placeholder="Enter Enail Address*" required="required">
            </div>
            <!--<p>Already have an account ? <a data-toggle="modal" data-target="#loginModal" data-backdrop="false" onclick="closeforgotmodal();"> Sign in account </a> </p> -->
         </div>
         <div class="modal-footer">
            <div class="btn-group btn-group-justified" role="group" aria-label="group button">
               <div class="btn-group" role="group">
                  <input name="forgotsubmit" class="theme-btn btn-style-four" value="Submit" type="submit">
               </div>
            </div>
         </div>
         <?php echo form_close();?>
      </div>
   </div>
</div>
<!-- signUpModal modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" >
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="lineModalLabel">Register</h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
         </div>
         <div class="modal-body">
         <!--   <h5 class="dark_blueclr text-center"><b>SIGN UP WITH</b></h5>
            <ul class="reg_social list-inline">
               <li><a href="#" class="btn  facebook"><i class="la la-facebook" aria-hidden="true"></i> Facebook</a></li>
               <li><a href="#" class="btn  google"><i class="la la-google-plus" aria-hidden="true"></i> Google+</a></li>
            </ul>
            <div class="onl_loginOr">
               <hr class="onl_hrOr">
               <span class="onl_spanOr">or</span>
            </div> -->
            <p class="text-center dark_blueclr"><b>Please fill out the form below to create a new account.</b></p>
            <br>
            <?php echo form_open_multipart("users/userregistration", 'id="userregistration_form"','class="form_validation"');?>
               <div class="container">
                  <div class="row">
                     <div class="form-group col-sm-6">
                        <label for="exampleInput">User Name *</label>
                        <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First Name" required="required" maxlength="80" onkeypress="return alphaOnly(event)">
                     </div>
                     <div class="form-group col-sm-6">
                        <label for="exampleInput">Last Name *</label>
                        <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" maxlength="80" required="required" onkeypress="return alphaOnly(event)">
                     </div>
                     <div class="form-group col-sm-6">
                        <label for="exampleInput">User Type *</label>
                        <select class="form-control" name="usertype" required="required">
                           <option value="" disabled selected hidden>User Type</option>
                          
                           <option value="1">Owner</option>
                           <option value="4">RB consultant</option>
                           <option value="3">Developer</option>
                           <option value="2">Builder</option>
                        </select>
                     </div>
                       <div class="form-group col-sm-6">
                        <label for="exampleInput">Select Gender <span style="color:red">(optional)</span></label>
                        <div class="radio_owner">
                           <label class="radio-inline radio-btn">
                           <input type="radio" name="gender" id="male" value="male" checked="checked"> Male
                           <span class="checkmark"></span>
                           </label>
                           <label class="radio-inline radio-btn">
                           <input type="radio" name="gender" id="female" value="female"> Female
                           <span class="checkmark"></span>
                           </label>
                        </div>
                     </div>
                 
                     <div class="form-group col-sm-6">
                        <label for="exampleInput">Phone Number *</label>
                        <input type="text" name="phonenumber" minlength="10" maxlength="10" class="form-control" placeholder="Enter Phone" id="registernumber" required="required" onkeypress="return isNumber(event)">
                         <span id="vpdisplay_message_error3" style="color:red;font-size:12px"></span>
                        
                     </div>
                     <div class="form-group col-sm-6">
                         <label for="exampleInput"> OTP</label>
                     <input type="text" class="form-control" name="phoneotp" id="userloginphoneotp1" minlength="4" maxlength="4" placeholder="Enter Generated OTP" required="required" onkeypress="return isNumber(event)" autocomplete="off">
                     <span id="otperror" class="error"></span>
                  </div> 
                            <div class="form-group col-sm-6">
                        <button class="btn btn-default sush_blue generateotpbutton" id="generateotp_button1" data-idvalue = "userloginphonenumber" type="button">
                        Generate OTP
                        </button>
                     </div> 
                    <!-- <div class="form-group col-sm-6">
                        <label for="exampleInput">Date of Birth *</label>
                        <input type="text" name="dob" id="userdob" class="form-control" placeholder="Date of Birth" autocomplete="off" required="required">
                        <span id="DOBlblError"></span>
                     </div> -->
                      <!--    <div class="form-group col-sm-6">
                        <label for="exampleInput">Email Address<span style="color:red">(optional)</span></label>
                        <input type="email" name="emailid" id="useremailid" class="form-control" placeholder="Enter email">
                     </div>-->
                    <!-- <div class="form-group col-sm-6">
                        <label for="exampleInput">Create Password <span style="color:red">(optional)</span></label>
                        <input type="password" id="userpassword" name="password" class="form-control" placeholder="Password"  onfocusout="return validatePassword(event)">
                       <a id="show-password">Show Password</a>
                     </div>-->
                     
                
                      <!-- <div class="form-group col-sm-6">
                        <label for="exampleInput">Select a State<span style="color:red">(optional)</span></label>
                         
        $statedtl [''] = 'Select a State';
        $options = ' id="state_id" data-placeholder="Choose a State Name" class="form-control" ';
        echo form_dropdown('statename', $statedtl, '',$options);?>
                     </div>
                     <div class="form-group col-sm-6">
                        <label for="">Select a City <span style="color:red">(optional)</span></label>
                        <select id="city_id" name="cityname" data-placeholder="Choose a City..." class="form-control">
                           <option value="">Select a City</option>
                        </select>
                     </div>
                     <div class="form-group col-sm-12">
                      <!--  <label for="">Upload Profile Picture</label>
                        <input class="form-control" type="file" name="user_image" id="user_image" placeholder="upload images" onchange="validateImage()">
                    </div>-->
                  </div>
               </div>
            
          <!--  <p style="padding-left:15px;">Already have an account ? <a data-toggle="modal" data-target="#loginModal" data-backdrop="false" onclick="closesignupmodal();"> Sign in account </a> </p> -->
         </div>
         <div class="modal-footer">
            <div class="btn-group btn-group-justified" role="group" aria-label="group button">
               <div class="btn-group" role="group">
                  <input type="submit" class="theme-btn btn-style-four" value="Submit">
                  <!-- <a data-toggle="modal" data-target="#otpModal" data-backdrop="false" class="theme-btn btn-style-four" onclick="closesignupmodal();">Submit</a> -->
               </div>
            </div>
         </div>
         <?php echo form_close();?>
      </div>
   </div>
</div>
<!-- OTP modal -->
<div class="modal fade" id="otpModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="lineModalLabel">Verification Code</h5>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
         </div>
         <div class="modal-body">
            <!-- content goes here -->
            <form>
               <div class="container">
                  <div class="row">
                     <div class="form-group col-sm-12">
                        <img src="<?php echo base_url(IMAGES); ?>/otp.gif" width="100%">
                     </div>
                     <div class="form-group col-sm-12">
                        <input type="text" class="form-control" placeholder="Enter OTP Here" onkeypress="return isNumber(event)">
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <div class="btn-group btn-group-justified" role="group" aria-label="group button">
               <div class="btn-group" role="group">
                  <a href="#" id="saveImage" class="theme-btn btn-style-four" role="button">Verify</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- contactModal modal -->
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="lineModalLabel">User Detail</h5>
           <button type="button" data-target="#contactModal" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
         </div>
         <form id="search-form1" method="post" class="property_filter_input" action="<?php echo base_url('users/usermobileregistaion'); ?>">  
         <div class="modal-body padtbs" id="proenqownerdetails">
                 <div class="form-group">
               <span style="color:red"> * Please fill your details to get phone number. Your number will not be disclosed.<span>
                  <input type="text" name="name" class="form-control" id="cname" placeholder="Enter Your Full Name" required="required" onkeypress="return alphaOnly(event)">
              <p id="vpdisplay_messages_error" style="color:red"><p>
               </div>
             <!--   <div class="form-group">
                  <input type="email" name="emailid" class="form-control" id="cemail" placeholder="Enter Your Email Address" required="required">
               </div>
              <div class="form-group">
                  <input type="text" name="message" class="form-control" id="message" placeholder="Enter Your Message" required="required">
               </div> -->
               <div class="input-group form-group">
                  <input type="text" class="form-control" id="userphonenumber" name="phonenumber" placeholder="Enter Your Phone Number" required="required" minlength="10" maxlength="10" onkeypress="return isNumber(event)">
                  <p id="vpdisplay_message_error" style="color:red"><p>
                  <div class="input-group-btn">
                     <button class="btn btn-default sush_blue generateotpbutton" id="geneatetop" type="button" data-idvalue = "userphonenumber">
                     Generate OTP
                     </button>
                     <input type="hidden" id="motps" value=""/>
                  </div>
               </div>
               <div class="form-group">
                  <input type="text" class="form-control" name="motp" id="motp" placeholder="Enter Generated OTP" required="required" onkeypress="return isNumber(event)">
               </div>
               <p id="vpdisplays_message_error" style="color:red"><p>
               
             <div class="modal-footer">
            <div class="btn-group btn-group-justified" role="group" aria-label="group button">
               <div class="btn-group" role="group">
                  <button type="submit"  class="btn btn-dark rado b2" >Submit</button>
               </div>
               </form>
            </div>
         </div>
        
         </div>
      </div>
   </div>
</div>

<!--End pagewrapper-->
<div class="modal fade" id="ownerdetail" tabindex="-1" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="lineModalLabel">Owner Detail</h5>
            
           <button type="button" data-target="#ownerdetail" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
         </div>
         <div class="modal-body padtbs" id="proenqownerdetail">
            <h6><b><i class="la la-user" aria-hidden="true"></i> Name:Admin</b></h6>
            <h6><b><i class="la la-phone" aria-hidden="true"></i> Contact Number:</b> <?php echo $contactus->mobile; ?></h6>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="propertyAppoinmentModel" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Contact Us</h5>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
         </div>
         <div class="modal-body">
            <!-- content goes here -->
          <span style="color:red">  * Please  fill  your details to get contact  number. Your number will not be disclosed.<span>
            <form method="post" id="appoinmentform" action="#">
               <input type="hidden" id="appoinmentpropertyid" name="appoinmentpropertyid" value="">
               <div class="form-group">
                  <input type="text" name="name" class="form-control" id="cname" placeholder="Enter Your Full Name" required="required" onkeypress="return alphaOnly(event)">
               </div>
             <!--   <div class="form-group">
                  <input type="email" name="emailid" class="form-control" id="cemail" placeholder="Enter Your Email Address" required="required">
               </div>
              <div class="form-group">
                  <input type="text" name="message" class="form-control" id="message" placeholder="Enter Your Message" required="required">
               </div> -->
               <div class="input-group form-group">
                  <input type="text" class="form-control" id="userphonenumber" name="phonenumber" placeholder="Enter Your Phone Number" required="required" minlength="10" maxlength="10" onkeypress="return isNumber(event)">
                  <div class="input-group-btn">
                     <button class="btn btn-default sush_blue generateotpbutton" type="button" data-idvalue = "userphonenumber">
                     Generate OTP
                     </button>
                  </div>
               </div>
               <div class="form-group">
                  <input type="text" class="form-control" name="motp" id="motp" placeholder="Enter Generated OTP" required="required" onkeypress="return isNumber(event)">
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <div class="btn-group btn-group-justified" role="group" aria-label="group button">
               <div class="btn-group" role="group">
                  <button type="button" id="proenquerysubmit" class="btn btn-dark rado b2" >Submit</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

</div>
<input type="hidden" id="maxsizedisplay" value="<?php echo IMAGE_DISPLAY_SIZE; ?>">
<input type="hidden" id="maxsizefileupload" value="<?php echo IMAGE_SIZE; ?>">
<input type="hidden" name="siteurl_data" id="siteurl_data" value="<?php echo base_url(); ?>">
<script src="<?php echo base_url(JS); ?>/popper.min.js"></script>
<script src="<?php echo base_url(JS); ?>/bootstrap.min.js"></script>
<script src="<?php echo base_url(JS); ?>/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(JS); ?>/bootstrap-multiselect.js"></script>
<!--Revolution Slider-->
<script src="<?php echo base_url(PLUGINS); ?>/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?php echo base_url(PLUGINS); ?>/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="<?php echo base_url(PLUGINS); ?>/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="<?php echo base_url(PLUGINS); ?>/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="<?php echo base_url(PLUGINS); ?>/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="<?php echo base_url(PLUGINS); ?>/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="<?php echo base_url(PLUGINS); ?>/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="<?php echo base_url(PLUGINS); ?>/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="<?php echo base_url(PLUGINS); ?>/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="<?php echo base_url(PLUGINS); ?>/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="<?php echo base_url(PLUGINS); ?>/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="<?php echo base_url(JS); ?>/main-slider-script.js"></script>
<!--End Revolution Slider-->
<script src="<?php echo base_url(JS); ?>/jquery-ui.js"></script>
<script src="<?php echo base_url(JS); ?>/jquery.fancybox.js"></script>
<script src="<?php echo base_url(JS); ?>/owl.js"></script>
<script src="<?php echo base_url(JS); ?>/wow.js"></script>
<script src="<?php echo base_url(JS); ?>/isotope.js"></script>
<script src="<?php echo base_url(JS); ?>/appear.js"></script>
<script src="<?php echo base_url(JS); ?>/jquery.steps.js"></script>
<script src="<?php echo base_url(JS); ?>/uploadHBR.min.js"></script>
<script src="<?php echo base_url(JS); ?>/modernizr.min.js"></script>
<script src="<?php echo base_url(JS); ?>/readmore.js"></script>
<script src="<?php echo base_url(JS); ?>/script.js"></script> <!-- Color Setting -->
<script src="<?php echo base_url(JS); ?>/jquery.mn-file.js"></script>
<script src="<?php echo base_url(JS); ?>/rbgroup.js"></script>
<script>
      $(document).ready(function() {
        $('#show-password').click(function() {
          var passwordField = $('#userpassword');
       var passwordFieldtxt = $('#userpassword').val();
          var passwordFieldType = passwordField.attr('type');
          if (passwordFieldType == 'password') {
            passwordField.attr('type', 'text');
            passwordField.val(passwordFieldtxt);
            
            $(this).text('Hide Password');
          } else {
            passwordField.attr('type', 'password');
            $(this).text('Show Password');
            passwordField.val(passwordFieldtxt);
          }
        });
      });
    </script>
<script type="text/javascript">
   $(document).ready(function(){
    
   
     $(".b2").click(function(){
       $(".b1").modal('hide');
      
     });
   });
   
</script>
<script>
   $(document).ready(function(){
   	   	$(document).on('change', '#ptypes', function() {

      
p_data=$("#ptypes").val()

var siteurl = $("#siteurl_data").val();
var p_data =
    {
        number: $("#ptypes").val()
    };
    $('#option-droup-demo').multiselect('destroy');
   $.ajax({
  url:siteurl+"users/getpropertype",
  type: "POST",
  data: p_data,
  success: function(message)
  { 
  
   $("#option-droup-demo").html(message);
   $('#option-droup-demo').multiselect({
			enableClickableOptGroups: true
		});
  }
  
});
return false;
});
   	$('ul.tabsa li').click(function(){
   		var tab_id = $(this).attr('data-tab');
   
   		$('ul.tabsa li').removeClass('current');
   		$('.tab-content').removeClass('current');
   
   		$(this).addClass('current');
   		$("#"+tab_id).addClass('current');
   	})
   	$("#geneatetop").click(function(){
   	    
   	     if($("#userphonenumber").val().length!=10){
          $("#phoneerror").text("Invalid Phone Number");
      }
      else{
          
          $("#phoneerror").text("");
         
   var siteurl = $("#siteurl_data").val();
   
    var p_data =
    {
        number: $("#userphonenumber").val()
    };
     $.ajax({
        url:siteurl+"users/setGenerateOTP/CallusDetails",
        type: "POST",
        data: p_data,
        success: function(data)
        { 
            
            if(data==0){
                
                alert("This Number is Already Registered with Us please login");
               location.reload(); 
            }
            else{
                 $.ajax({
        url:siteurl+"users/sendotp1/",
        type: "POST",
        data: p_data,
        success: function(data)
        { 
            
            $("#phoneerror").text(data);
            $("#motps").val(data);
        }
    });
            }
            //$("#proenqownerdetails").html(data);
            $("#userloginphoneotp").focus();
        }
    });
   
  $("#otpmodel").css("display","block");
   $("#subb").css("display","block");
      $("#generateotp_button").css("display","none");
     $("#userloginphonenumber").css("display","none");
    
      }
   	})
   $("#generateotp_button1").click(function(){
      
      
      if($("#registernumber").val().length!=10){
          $("#phoneerror").text("Invalid Phone Number");
      }
      else{
          
          $("#phoneerror").text("");
         
   var siteurl = $("#siteurl_data").val();
   
    var p_data =
    {
        number: $("#registernumber").val()
    };
    $.ajax({
        url:siteurl+"users/sendotp1/",
        type: "POST",
        data: p_data,
        success: function(data)
        { 
            
            $("#phoneerror").text(data);
        }
    });
  $("#otpmodel1").css("display","block");
   $("#subb").css("display","block");
      $("#generateotp_button1").css("display","none");
     $("#userloginphonenumber1").css("display","none");
    
      }
   });
      $("#generateotp_button").click(function(){
      
      if($("#userloginphonenumber").val().length!=10){
          $("#phoneerror").text("Invalid Phone Number");
      }
      else{
          
          $("#phoneerror").text("");
         
   var siteurl = $("#siteurl_data").val();
   
    var p_data =
    {
        number: $("#userloginphonenumber").val()
    };
    $.ajax({
        url:siteurl+"users/sendotp/",
        type: "POST",
        data: p_data,
        success: function(data)
        { 
            $("#phoneerror").text(data);
        }
    });
  $("#otpmodel").css("display","block");
   $("#subb").css("display","block");
      $("#generateotp_button").css("display","none");
     $("#userloginphonenumber").css("display","none");
    
      }
   });
   })
</script>
<!-- Color Setting -->
    <script src="<?php echo base_url(JS); ?>/slick.min.js"></script>
    
    
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
$(document).ready(function(){
  
  $(".Modern-Slider").slick({
    autoplay:true,
    autoplaySpeed:10000,
    speed:600,
    slidesToShow:4,
    slidesToScroll:1,
    pauseOnHover:false,
    dots:true,
    pauseOnDotsHover:true,
    cssEase:'linear',
   // fade:true,
    draggable:false,
    prevArrow:'<button class="PrevArrow"></button>',
    nextArrow:'<button class="NextArrow"></button>',
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
  });
  
})
    </script>
  
</body>
</html>