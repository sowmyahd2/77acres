<!--Page Title-->
<section class="page-title" style="background-image:url(<?php echo base_url(IMAGES); ?>/fixed-slider.png);">
   <div class="auto-container">
      <div class="inner-container clearfix">
         <h1>Reset Password</h1>
         <ul class="bread-crumb clearfix">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li>Reset Password</li>
         </ul>
      </div>
   </div>
</section>
<!--End Page Title-->


<!-- About start from here -->
<section class="m-t50">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-12">
            <div class="at-about-col at-col-default-mar">
               <!-- Title Column -->
               <div class="title-column">
                  <div class="sec-title">
                     <span class="title">Reset Password</span>
                     <p>If you already have an account with us, please login at the login page.</p>
                  </div>
               </div>
               <form id="resetemail-form" method="post" action="<?php echo base_url('users/password_change'); ?>">
                              <div class="form-group">
                                 <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="password" name="password" placeholder="Enter your New Password here..." class="form-control required" type="password" required="required" onfocusout="return validateResetPassword(event)">
                                    <input type="hidden" name="user_id" value="<?php echo $user_info->id;?>" >
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input id="confirm_password" equalTo="#password" type="password"  name="confirm_password" class="form-control required" placeholder="Enter your Confirm Password here..." required="required">
                                 </div>
                              </div>
                               
                              <div class="form-group">
                                 <input name="reset" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                              </div>
                           </form>
               
            </div>
         </div>
         
      </div>
   </div>
</section>
<script>
      $(document).ready(function() {
        $('#show-password').click(function() {
          var passwordField = $('#confirm_password');
          var passwordFieldType = passwordField.attr('type');
          if (passwordFieldType == 'password') {
            passwordField.attr('type', 'text');
            $(this).text('Hide Password');
          } else {
            passwordField.attr('type', 'password');
            $(this).text('Show Password');
          }
        });
      });
    </script>
<!-- About End -->
