<?php if(isset($mode) && $mode == 'all'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Members Details
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo site_url().admin?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Members Details</li>
   </ol>
</section>
<?php if($this->session->flashdata('message')){?>
<div class="alert alert-success fade in block-inner">            
<button type="button" class="close" data-dismiss="alert">×</button>
<i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('message')?> </div>
<?php } ?>
<?php if($this->session->flashdata('error')){?>
<div class="alert alert-danger fade in block-inner">
<button type="button" class="close" data-dismiss="alert">×</button>
<i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('error')?> </div>
<?php } ?>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-xs-12">
                     <div class="box">
                        <div class="box-header">
                           <div class="col-md-6 ">
                              <h3 class="box-title pull-left"><i class="fa fa-list"></i> Members Details</h3>
                           </div>
                           <div class="col-md-6">
                           
                              <h3 class="box-title pull-right" style="margin-right:15px"><a href="<?php echo site_url().admin?>members/create_user" ><i class="fa fa-plus white model_form" aria-hidden="true"></i></a></h3>
                           </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
              <th>#</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Username</th>
              <th>Email Id</th>
              <th>Phone</th>  
              <th>Status</th>          
              <th>Actions</th>
            </tr> 
                              </thead>
                              <tbody>
                                 <tr>
                                    <?php if(isset($members) && is_array($members) && count($members)): $i=1;?>
            <?php foreach ($members as $key => $memDtl) { ?>
                      
              <tr id="row_<?php echo $memDtl->id;?>">
                <td> <?php echo $i++; ?> </td>       
                <td><?php echo $memDtl->first_name; ?></td>
                <td><?php echo $memDtl->last_name; ?></td>
                <td><?php echo $memDtl->username; ?></td>
                <td><?php echo $memDtl->email; ?></td>
                <td><?php echo $memDtl->phone; ?></td>
                <td><i data="<?php echo $memDtl->id;?>" class="status_checks btn icon-<?php echo ($memDtl -> active!=0)? 'checkmark btn-success' : 'close btn-danger'?>"></i>  </td>
                <td>
                
                <div class="icons-group"> 
                  
                  <a href="<?php echo site_url(admin).'members/edit_user/'.$memDtl->id ?>" title="Edit" class="tip btn btn-link btn"><i class="fa fa-edit"></i></a>
                
                </td>
              </tr>
            <?php } ?>
          <?php endif; ?>
                              </tbody>
                           </table>
                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.box -->
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </aside>
         <!-- /.right-side -->
<?php elseif(isset($mode) && $mode == 'add'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
<ol class="breadcrumb">
<li><a href="<?php echo base_url(admin); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="<?php echo base_url(admin."members"); ?>"><i class="fa fa-dashboard"></i> Members Details</a></li>
<li class="active">Add</li>
</ol>
<h1>
Add Members Details
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
<h3 class="box-title"><b> <i class="fa fa-edit" style="font-size:17px;"></i> Add Content</b></h3>
<div class="box-tools pull-right">
<a href="<?php echo site_url().admin.'members';?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php echo form_open(admin."/members/create_user",'class="clr-form clr-form-compact" id="membercreateform"');?>
      <div class="clr-form-control clr-row">
          <?php echo lang('create_user_fname_label', 'first_name *','class="clr-control-label clr-col-12 clr-col-md-2"');?>
          <div class="clr-control-container clr-col-12 clr-col-md-10">
              <div class="clr-input-wrapper">
                  <?php echo form_input($first_name);?>
              </div>
          </div>
      </div>
      <div class="clr-form-control clr-row">
          <?php echo lang('create_user_lname_label', 'last_name *','class="clr-control-label clr-col-12 clr-col-md-2"');?>
          <div class="clr-control-container clr-col-12 clr-col-md-10">
              <div class="clr-input-wrapper">
                  <?php echo form_input($last_name);?>
              </div>
          </div>
      </div>
      <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</p>';
      }
      ?>
      <div class="clr-form-control clr-row">
          <?php echo lang('create_user_email_label', 'email *','class="clr-control-label clr-col-12 clr-col-md-2"');?>
          <div class="clr-control-container clr-col-12 clr-col-md-10">
              <div class="clr-input-wrapper">
                  <?php echo form_input($email);?>
              </div>
          </div>
      </div>
      <div class="clr-form-control clr-row">
          <?php echo lang('create_user_phone_label', 'phone *','class="clr-control-label clr-col-12 clr-col-md-2"');?>
          <div class="clr-control-container clr-col-12 clr-col-md-10">
              <div class="clr-input-wrapper">
                  <?php echo form_input($phone);?>
              </div>
          </div>
      </div>
      <div class="clr-form-control clr-row">
          <?php echo lang('create_user_password_label', 'password *','class="clr-control-label clr-col-12 clr-col-md-2"');?>
          <div class="clr-control-container clr-col-12 clr-col-md-10">
              <div class="clr-input-wrapper">
                  <?php echo form_input($password);?>
              </div>
          </div>
      </div>
      <div class="clr-form-control clr-row">
          <?php echo lang('create_user_password_confirm_label', 'password_confirm *','class="clr-control-label clr-col-12 clr-col-md-2"');?>
          <div class="clr-control-container clr-col-12 clr-col-md-10">
              <div class="clr-input-wrapper">
                  <?php echo form_input($password_confirm);?>
              </div>
          </div>
      </div>
      <div class="clr-form-control clr-row">
          <label></label>
          <div class="clr-control-container clr-col-12 clr-col-md-10">
              <div class="clr-input-wrapper">
                  <?php echo form_submit('submit', lang('create_user_submit_btn'),'class="btn btn-primary"');?>
                  <a href="<?php echo site_url().admin?>members">
                    <button type="button" class="btn btn-warning">Cancel</button>
                  </a>
              </div>
          </div>
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
<?php elseif(isset($mode) && $mode == 'edit'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
<ol class="breadcrumb">
<li><a href="<?php echo base_url(admin); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="<?php echo base_url(admin."members"); ?>"><i class="fa fa-dashboard"></i> Members Details</a></li>
<li class="active">Edit</li>
</ol>
<h1>
Edit Members Details
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
<a href="<?php echo site_url().admin.'members';?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
  <div id="infoMessage"><?php echo ($message)?$message:'';?></div>
<?php echo form_open(uri_string(),'class="clr-form clr-form-compact" id="edituserform"');?>
      <div class="clr-form-control clr-row">
          <?php echo lang('edit_user_fname_label', 'first_name *','class="clr-control-label clr-col-12 clr-col-md-2"');?>
          <div class="clr-control-container clr-col-12 clr-col-md-10">
              <div class="clr-input-wrapper">
                  <?php echo form_input($first_name);?>
              </div>
          </div>
      </div>
      <div class="clr-form-control clr-row">
          <?php echo lang('edit_user_lname_label', 'last_name *','class="clr-control-label clr-col-12 clr-col-md-2"');?>
          <div class="clr-control-container clr-col-12 clr-col-md-10">
              <div class="clr-input-wrapper">
                  <?php echo form_input($last_name);?>
              </div>
          </div>
      </div>
      <div class="clr-form-control clr-row">
          <?php echo lang('edit_user_phone_label', 'phone *','class="clr-control-label clr-col-12 clr-col-md-2"');?>
          <div class="clr-control-container clr-col-12 clr-col-md-10">
              <div class="clr-input-wrapper">
                  <?php echo form_input($phone);?>
              </div>
          </div>
      </div>
      <div class="clr-form-control clr-row">
          <?php echo lang('edit_user_password_label', 'password','class="clr-control-label clr-col-12 clr-col-md-2"');?>
          <div class="clr-control-container clr-col-12 clr-col-md-10">
              <div class="clr-input-wrapper">
                  <?php echo form_input($password);?>
              </div>
          </div>
      </div>
      <div class="clr-form-control clr-row">
          <?php echo lang('edit_user_password_confirm_label', 'password_confirm','class="clr-control-label clr-col-12 clr-col-md-2"');?>
          <div class="clr-control-container clr-col-12 clr-col-md-10">
              <div class="clr-input-wrapper">
                  <?php echo form_input($password_confirm);?>
              </div>
          </div>
      </div>

     <!--  <?php if ($this->ion_auth->is_admin()): ?>
     
         <h3><?php echo lang('edit_user_groups_heading');?></h3>
         <?php foreach ($groups as $group):?>
             <label class="checkbox">
             <?php
                 $gID=$group['id'];
                 $checked = null;
                 $item = null;
                 foreach($currentGroups as $grp) {
                     if ($gID == $grp->id) {
                         $checked= ' checked="checked"';
                     break;
                     }
                 }
             ?>
             <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
             <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
             </label>
         <?php endforeach?> -->

      <?php endif ?>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>
      <div class="clr-form-control clr-row">
          <label></label>
          <div class="clr-control-container clr-col-12 clr-col-md-10">
              <div class="clr-input-wrapper">
                  <?php echo form_submit('submit', lang('edit_user_submit_btn'),'class="btn btn-primary"');?>
                  <a href="<?php echo site_url().admin?>members">
                    <button type="button" class="btn btn-warning">Cancel</button>
                  </a>
              </div>
          </div>
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

<?php endif; ?>
      </div>
<input type="hidden" id="siteurl_data" value="<?php echo site_url(admin); ?>">
<script type="text/javascript">
  $(document).ready(function(){
    $('#memberstab').addClass('active');
    
    $('#membercreateform').validate({
       rules: {
            first_name: "required",
            last_name: "required",
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            },
            password_confirm: {
                required: true,
                minlength: 8,
                equalTo: "#password"
            },
            phone: {
                required: true,
                digits:true,
                minlength: 7
            }
        },
        messages: {
            first_name: "Please enter your firstname",
            last_name: "Please enter your lastname",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 8 characters"
            },
            email: "Please enter a valid email address",
            phone: "Please enter a valid phone number"
        }
    });
    //---------------------------
    $('#edituserform').validate({
       rules: {
            first_name: "required",
            last_name: "required",
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                digits:true,
                minlength: 10
            }
        },
        messages: {
            first_name: "Please enter your firstname",
            last_name: "Please enter your lastname",
            email: "Please enter a valid email address",
            phone: "Please enter a valid phone number"
        }
    });
    //----------------------------
    $(document).on('change', '#email', function() {
       var siteurl = $("#siteurl_data").val();
       var url = siteurl+"members/emailduplicatecheck";
       $.ajax({
           type: "POST",
           url: url,
           data: $("#email").serialize(), // serializes the form's elements.
           success: function(data) {
               if (data == '1') {
                  alert('This email id already registered with us');
                  $('#email').val('');
                  return false;
               }
           }
       });
       return false;
    });
    //-----------------------------
     $(document).on('click','.status_checks',function(){
      var status = ($(this).hasClass("btn-success")) ? '0' : '1';
      var msg = (status=='0')? 'Deactivate' : 'Activate';
      if(confirm("Are you sure to "+ msg)){
        var current_element = $(this);
        url = "<?php echo site_url().admin;?>/members/active_status";
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
    //-----------------------------
  });
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
};
function alphaOnly(event) {
    if (event.charCode!=0) {
        var regex = new RegExp("^[a-zA-Z]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
};
function validatePassword() {
    var p = document.getElementById('userpassword').value,
        errors = [];
    if (p.length < 8) {
        errors.push("Your password must be at least 8 characters"); 
    }
    if (p.search(/[a-z]/i) < 0) {
        errors.push("Your password must contain at least one letter.");
    }
    if (p.search(/[0-9]/) < 0) {
        errors.push("Your password must contain at least one digit."); 
    }
    if (errors.length > 0) {
        $('#vpdisplay_message_error').html(errors.join("\n"));
        $('#fixed_error_red').parent().delay('1200').fadeIn('slow');
        setTimeout(function(){
            $('#fixed_error_red').parent().fadeOut('slow');
            //location.reload();
        }, 5000);

        return false;
    }
    return true;
}
</script>