<?php if(isset($mode) && $mode == 'all'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Property Enquery
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo site_url().admin?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Property Enquery</li>
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
                              <h3 class="box-title pull-left"><i class="fa fa-list"></i> Property Enquery</h3>
                           </div>
                           <div class="col-md-6">
                           
                             <!--  <h3 class="box-title pull-right" style="margin-right:15px"><a href="<?php echo site_url().admin?>proenquiry/add" ><i class="fa fa-plus white model_form" aria-hidden="true"></i></a></h3> -->
                           </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
              <th>#</th>
              <th>Name</th>
                <th>Email</th>
                <th>Phone</th>             
              <th>Actions</th>
            </tr> 
                              </thead>
                              <tbody>
                                 <tr>
                         <?php if(isset($proenquiry) && is_array($proenquiry) && count($proenquiry)): $i=1;?>
              <?php foreach ($proenquiry as $key => $reg) { ?>
                <tr>
                  <td> <?php echo $i++; ?> </td>
                  <td> <?php echo $reg -> name; ?> </td>
                  <td> <?php echo $reg -> emailid?> </td>
                  <td> <?php echo $reg -> phonenumber?> </td>
                  
                  <td>
                  <div class="icons-group"> 
                    <a href="<?php echo site_url().admin?>proenquiry/view/<?php echo $reg->id?>" title="View" class="tip btn btn-link"><i class="fa fa-eye"></i></a> 
                    <a title="Delete" class="tip delete" data="<?php echo $reg->id?>"><i class="fa fa-times"></i></a>
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
<?php elseif(isset($mode) && $mode == 'view'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
<ol class="breadcrumb">
<li><a href="<?php echo base_url(admin); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="<?php echo base_url(admin."proenquiry"); ?>"><i class="fa fa-dashboard"></i> Property Enquery</a></li>
<li class="active">View</li>
</ol>
<h1>
Property Enquery Details
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
<h3 class="box-title"><b> <i class="fa fa-edit" style="font-size:17px;"></i> View Details</b></h3>
<div class="box-tools pull-right">
<a href="<?php echo site_url().admin?>proenquiry">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<table class="table table-striped">
                  <tbody>
                    <tr><th style="width:200px">Name</th> <td><?php echo $proenquiry_values->name;?></td></tr>
                    <tr><th style="width:200px">Email</th> <td><?php echo $proenquiry_values->emailid;?></td></tr>
                    <tr><th style="width:200px">Phone</th> <td><?php echo $proenquiry_values->phonenumber;?></td></tr>
                    <tr><th style="width:200px">Message</th> <td><?php echo $proenquiry_values->message;?></td></tr>
                    <tr><th style="width:200px">Proect Name</th> <td><?php echo $proenquiry_values->pname;?></td></tr>
                    <tr><th style="width:200px">Product ID</th> <td><?php echo $proenquiry_values->pid;?></td></tr>
                    <tr><th style="width:200px">Product SKU</th> <td><?php echo $proenquiry_values->psku;?></td></tr>
                    <tr><th style="width:200px">User Type</th> <td><?php echo $proenquiry_values->user_type;?></td></tr>
                    <tr><th style="width:200px">Property Type</th> <td><?php echo $proenquiry_values->propertytype;?></td></tr>
                    <tr><th style="width:200px">Category ID</th> <td><?php echo $proenquiry_values->cat_id;?></td></tr>
                    <tr><th style="width:200px">Sub Category</th> <td><?php echo $proenquiry_values->subcat_id;?></td></tr>
                    <tr><th style="width:200px">Resalse</th> <td><?php echo $proenquiry_values->resale;?></td></tr>
                    <tr><th style="width:200px">Property Satus</th> <td><?php echo $proenquiry_values->propertystatus;?></td></tr>
                    <tr><th style="width:200px">Property Age</th> <td><?php echo $proenquiry_values->propertyage;?></td></tr>
                    <tr><th style="width:200px">Rara Status</th> <td><?php echo $proenquiry_values->rerastatus;?></td></tr>
                    <tr><th style="width:200px">Rara ID</th> <td><?php echo $proenquiry_values->reraid;?></td></tr>
                    <tr><th style="width:200px">Rera URL</th> <td><?php echo $proenquiry_values->reraurl;?></td></tr>
                    <tr><th style="width:200px">Requested ON</th> <td><?php echo $proenquiry_values->updatedon;?></td></tr>
                   </tbody>
                </table>
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

 <!--Add Form model-->
    <div id="models_form" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> <span>Add</span></h4>
          </div>
          <!-- Form inside modal -->
          <?php echo form_open_multipart(site_url().admin.'specifications/add', 'id="cat_form" class=".validate"');?>
            <div class="modal-body with-padding">
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                    <label>Name: <span class="error">*</span></label>
                    <input type="text" id="name" name="name" title="Please enter category name" class="form-control required" value="">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                    <label>Other: <span class="error">*</span></label>
                    <input type="text" id="other" name="other" title="Please enter category name" class="form-control required" value="">
                  </div>
                </div>
              </div>
          </div>            
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            <span id="add">
              <input type="hidden" name="id" value="" id="id">
              <input type="hidden" name="spec_id" value="<?php echo $spec ?>" id="spec_id">
              <input type="hidden" name="curl" value="<?php echo current_url()?>" id="id">                
              <button type="submit" class="btn btn-primary" id="add_city">Submit</button>
            </span>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!--End add form model-->
<script>
  
  $(document).ready(function(){      

    $('form').validate();

    var url = document.location.toString();
    $(document).on('click','.model_form',function(){      
      $('#model_form').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      $('label.error').hide();
      var data = eval($(this).attr('data'));
      $('#id').val(data.id);
      $('#price').val(data.price);
      $('#zzw_price').val(data.zzw_price);
      $('#price_exp_date').val(data.price_exp_date);
      $('#delivery_date').val(data.delivery_date);
    });

    $(document).on('click','.models_form',function(){
      $('#models_form').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      $('label.error').hide();
      var data = eval($(this).attr('data'));
      $('#id').val(data.id);
      $('#name').val(data.name);
      $('#other').val(data.other);
    });

    $(document).on('click','.modalcar_form',function(){
      $('#modalcar_form').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      $('label.error').hide();
    });

    $(document).on('click','.status_checks',function(){
      var status = ($(this).hasClass("btn-success")) ? '0' : '1';
      var msg = (status=='0')? 'Deactivate' : 'Activate';
      if(confirm("Are you sure to "+ msg)){
        var current_element = $(this);
        url = "<?php echo site_url().admin;?>/proenquiry/active_status";
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

    $(document).on('click','.delete',function(){
      if(confirm('Are you sure to delete')){
        $.ajax({url:"<?php echo site_url().admin?>proenquiry/delete/"+$(this).attr('data'), 
          success:function(data){window.location.reload(true);}});
      }
    });
    // $(document).on('click','.del',function(){ 
    //   if(confirm("Are you sure to delete."))
    //   {       
    //     var url = "<?php echo site_url().admin?>specifications/del/"+$(this).attr('data-id'); 
    //     $.ajax({
    //       type: "POST",
    //       url: url,
    //       success: function(data)
    //       {
    //         //alert(data); // show response from the php script.
    //         location.reload();
    //       }
    //    });
    //   }
    //   return false;
    // });

    $('#enquerytab').addClass('active');
    $('#enquerytab a').attr('id','second-level');
    $('#enquerytab li a').each(function() {
       if($(this).attr('href') == '<?php echo current_url();?>' )
        $(this).closest('li').addClass('active');
    });
  });
</script>