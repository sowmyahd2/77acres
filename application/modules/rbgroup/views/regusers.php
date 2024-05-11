<?php if(isset($mode) && $mode == 'all'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->


<section class="content-header">
   <h1>
      Users List
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo site_url().admin?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Users List</li>
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
                              <h3 class="box-title pull-left"><i class="fa fa-list"></i> Users List</h3>
                           </div>
                           <div class="col-md-6">
                           
                              <h3 class="box-title pull-right" style="margin-right:15px"><a href="<?php echo site_url()?>export/userdetails" ><img src="<?php echo base_url(); ?>assets/img/excel.jpg" /></a></h3>
                              <h3 class="box-title pull-right" style="margin-right:15px"><a href="<?php echo site_url().admin?>regusers/add" ><i class="fa fa-plus white model_form" aria-hidden="true"></i></a></h3>
                           </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                                                    <!-- Search ilter starts here -->
<?php echo form_open_multipart(admin."regusers",'class="form-horizontal form-bordered .validate"');?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-menu"></i>Filter</h6>
          </div>

          <div class="panel-body">  
          
            <div class="form-group">
              <label class="col-sm-2 control-label">Search User <span class="error">*</span></label>
              <div class="col-sm-10">
                <input type="text" required="required" name="userid" id="userid" value="<?php echo $userid; ?>" class="form-control " placeholder="Search by User name. email. phone">
              </div>
              
            </div>
          
                 
            <input type="hidden" name="curl" value="<?php echo site_url().admin.'reports';?>">       
            <div class="form-actions text-right">
              <input type="button" class="btn btn-info" id="search" value="Search"/>        
            </div>
          </div>
         </div>
        <?php echo form_close();?>
<!-- Search filter ends here -->
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
             <th>#</th>
                <th>Name</th>
                <th>Email</th>
               <th>User Type</th>
                <th>Phone</th>
                <th>Status</th>
                <th class="team-links">Actions</th>
            </tr> 
                              </thead>
                              <tbody id="tb">
                                 <tr>
                                   
            <?php if(isset($regusers) && is_array($regusers) && count($regusers)): $i=1;?>
              <?php foreach ($regusers as $key => $reg) { ?>
                <tr>
                  <td> <?php echo $i++; ?> </td>
                  <td> <?php echo $reg -> name; ?> </td>
                  <td> <?php echo $reg -> email; ?> </td>
                  <td><?= $reg->ownership ?></td>
                  <td> <?php echo $reg -> phone; ?> </td>
                  <td><i data="<?php echo $reg->id;?>" class="status_checks btn icon-<?php echo ($reg -> status!=0)? 'checkmark btn-success' : 'close btn-danger'?>"></i>  </td>
                  <td>
                  <div class="icons-group"> 
                    <a href="<?php echo site_url().admin?>regusers/view/<?php echo $reg->id?>" title="View" class="tip btn btn-link"><i class="fa fa-eye"></i></a> 
                    <a href="<?php echo site_url().admin.'regusers/edit/'.$reg->id ?>" title="Edit" class="tip btn btn-link btn"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo site_url().admin?>regusers/delete/<?php echo $reg -> id; ?>" title="Delete " class="tip" onclick="return confirm('Are you sure to delete')"><i class="fa fa-times"></i></a> 
                    
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
<li><a href="<?php echo base_url(admin."regusers"); ?>"><i class="fa fa-dashboard"></i> Users List</a></li>
<li class="active">Add</li>
</ol>
<h1>
Add Users List
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
<a href="<?php echo site_url().admin.'regusers';?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php echo form_open_multipart(admin."regusers/add_regusers",'class="form-horizontal form-bordered" id="membercreateform" ');?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-menu"></i>Add Users List</h6>
          </div>

          <div class="panel-body">  
          
            <div class="form-group">
              <label class="col-sm-2 control-label">First Name <span class="error">*</span></label>
              <div class="col-sm-4">
                <input name="fname" required="required" id="fname" class="form-control" placeholder="First Name*" type="text" onkeypress="return alphaOnly(event)">
              </div>
              <label class="col-sm-2 control-label">Last Name <span class="error">*</span></label>
              <div class="col-sm-4">
                <input name="lname" required="required" id="lname" class="form-control" placeholder="Last Name*" type="text" onkeypress="return alphaOnly(event)">
              </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label"> Phone Number <span class="error">*</span></label>
            <div class="col-sm-4">
              <input name="phonenumber" required="required" id="phonenumber" class="form-control" placeholder="Contact Number*" minlength="7" maxlength="15" type="text" onkeypress="return isNumber(event)">
            </div>
            <label class="col-sm-2 control-label"> Email Id <span class="error">*</span></label>
            <div class="col-sm-4">
              <input name="emailid" required="required" id="emailid" class="form-control" placeholder="Email*" type="email">
            </div>
          </div>
            <div class="form-group">
              
              <label class="col-sm-2 control-label">Address <span class="error">*</span></label>
              <div class="col-sm-10">
                <textarea class="editor textarea" style="width:100%" rows="10" cols="80" name="address" required="required" placeholder="Enter Address here">
                              </textarea>
              </div>
            </div>
            

                 
            <input type="hidden" name="curl" value="<?php echo site_url().admin.'regusers';?>">       
            <div class="form-actions text-right">
            <a class="btn btn-warning" href="<?php echo site_url().admin.'regusers';?>">Cancel</a>
            <?php echo form_submit('submit', 'Add','class="btn btn-primary"');?>          
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
<li><a href="<?php echo base_url(admin."regusers"); ?>"><i class="fa fa-dashboard"></i> Edit Users</a></li>
<li class="active">Edit</li>
</ol>
<h1>
Edit Users
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
<a href="<?php echo site_url().admin.'regusers';?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php echo form_open_multipart(admin."regusers/add_regusers",'class="form-horizontal form-bordered" id="edituserform"');?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-menu"></i>Edit Users List</h6>
          </div>

          <div class="panel-body">  
          
            <div class="form-group">
              <label class="col-sm-2 control-label">First Name <span class="error">*</span></label>
              <div class="col-sm-4">
                <input name="fname" required="required" id="fname" class="form-control" placeholder="First Name*" value="<?php echo $regusers->fname;?>" type="text" onkeypress="return alphaOnly(event)">
              </div>
              <label class="col-sm-2 control-label">Last Name <span class="error">*</span></label>
              <div class="col-sm-4">
                <input name="lname" required="required" id="lname" class="form-control" placeholder="Last Name*" value="<?php echo $regusers->lname;?>" type="text" onkeypress="return alphaOnly(event)">
              </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label"> Phone Number <span class="error">*</span></label>
            <div class="col-sm-4">
              <input name="phonenumber" required="required" id="phonenumber" class="form-control" placeholder="Contact Number*" value="<?php echo $regusers->phone;?>" minlength="7" maxlength="15" type="text" onkeypress="return isNumber(event)">
            </div>
            <label class="col-sm-2 control-label"> Email Id <span class="error">*</span></label>
            <div class="col-sm-4">
              <input name="emailid" required="required" id="emailid" class="form-control" placeholder="Email*" value="<?php echo $regusers->email;?>" type="email">
            </div>
          </div>
            <div class="form-group">
              
              <label class="col-sm-2 control-label">Address <span class="error">*</span></label>
              <div class="col-sm-10">
                <textarea class="editor textarea" style="width:100%" rows="10" cols="80" name="address" required="required" placeholder="Enter Address here"><?php echo $regusers->address1;?></textarea>
              </div>
            </div>

            
            <input type="hidden" name="id" value="<?php echo $regusers->id;?>">     
            <input type="hidden" name="curl" value="<?php echo site_url().admin.'regusers';?>">       
            <div class="form-actions text-right">
            <a class="btn btn-warning" href="<?php echo site_url().admin.'regusers';?>">Cancel</a>
            <?php echo form_submit('submit', 'Add','class="btn btn-primary"');?>          
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

<?php elseif(isset($mode) && $mode == 'view'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
<ol class="breadcrumb">
<li><a href="<?php echo base_url(admin); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="<?php echo base_url(admin."regusers"); ?>"><i class="fa fa-dashboard"></i> View Users Details</a></li>
<li class="active">View</li>
</ol>
<h1>
View Users Details
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
<h3 class="box-title"><b> <i class="fa fa-edit" style="font-size:17px;"></i> View Content</b></h3>
<div class="box-tools pull-right">
<a href="<?php echo site_url().admin.'regusers';?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<h3 class="box-title pull-left"><i class="fa fa-list"></i> Users Details</h3>
<table class="table table-striped">
  <thead>
    <tr>
    <th>Name</th>
    <th>Emailid</th>              
    <th>Phone Number</th>
    <th>Address</th>
    <th>Location</th>
    <th>Requested On</th>
    </tr> 
  </thead>
  <tbody id="tb">
    <tr>
      <td><?php echo $regusers_values->name;?></td>
      <td><?php echo $regusers_values ->email;?></td>
      <td><?php echo $regusers_values ->phone;?></td>
      <td><?php echo !empty($regusers_values ->address1)?$regusers_values ->address1:'N/A';?></td>
      <td><?php echo !empty($regusers_values ->statename)?$regusers_values ->statename." - ".$regusers_values ->cityname:'N/A';?></td>
      <td><?php echo $regusers_values ->last_updated;?></td>
    </tr>
  </tbody>
</table>

<div style="padding: 15px;"></div>



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

<script>
  $(document).ready(function(){   
   
    //----------------------------

function fetchdata(){
var ser=$('#userid').val();
 
    if(ser.length>0){
       if(ser.length>=3){
         
    
        url = "<?php echo site_url().admin;?>/regusers/filterdata";
        $.ajax({
          type:"POST",
          url: url,
          data: {search:ser},
          success: function(data)
          {   
             
            $('#tb').html(data);
          }
        });
     }  
    }
    else{
     location.reload();   
    }
    
}
    $('#regusers').addClass('active');
    $('#regusers a').attr('id','second-level');
    $('#regusers li a').each(function() {
       if($(this).attr('href') == '<?php echo current_url();?>' )
        $(this).closest('li').addClass('active');
    });

$(document).on('keyup','#userid',function(){
    var ser=$('#userid').val();
 
    
      
        fetchdata();   
       
    
});
$(document).on('click','#search',function(){
   fetchdata(); 
});
    $(document).on('click','.status_checks',function(){
      var status = ($(this).hasClass("btn-success")) ? '0' : '1';
      var msg = (status=='0')? 'Deactivate' : 'Activate';
      if(confirm("Are you sure to "+ msg)){
        var current_element = $(this);
        url = "<?php echo site_url().admin;?>/regusers/active_status";
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
 
  $('#membercreateform').validate({
       rules: {
            fname: "required",
            lname: "required",
            emailid: {
                required: true,
                email: true
            },
            phonenumber: {
                required: true,
                digits:true,
                minlength: 10
            }
        },
        messages: {
            fname: "Please enter your firstname",
            lname: "Please enter your lastname",
            emailid: "Please enter a valid email address",
            phonenumber: "Please enter a valid phone number"
        }
    });
    //---------------------------
    $('#edituserform').validate({
       rules: {
            fname: "required",
            lname: "required",
            emailid: {
                required: true,
                email: true
            },
            phonenumber: {
                required: true,
                digits:true,
                minlength: 10
            }
        },
        messages: {
            fname: "Please enter your firstname",
            lname: "Please enter your lastname",
            emailid: "Please enter a valid email address",
            phonenumber: "Please enter a valid phone number"
        }
    });
    //----------------------------
    $(document).on('change', '#emailid', function() {
       var siteurl = $("#siteurl_data").val();
       var url = siteurl+"regusers/emailduplicatecheck";
       $.ajax({
           type: "POST",
           url: url,
           data: $("#emailid").serialize(), // serializes the form's elements.
           success: function(data) {
               if (data == '1') {
                  alert('This email id already registered with us');
                  $('#emailid').val('');
                  return false;
               }
           }
       });
       return false;
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