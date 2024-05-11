<?php if(isset($mode) && $mode == 'all'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      RB Consultants
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo site_url().admin?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">RB Consultants</li>
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
                              <h3 class="box-title pull-left"><i class="fa fa-list"></i> RB Consultants</h3>
                           </div>
                           <div class="col-md-6">
                           
                              <h3 class="box-title pull-right" style="margin-right:15px"><a href="<?php echo site_url().admin?>dealers/add" ><i class="fa fa-plus white model_form" aria-hidden="true"></i></a></h3>
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
              <th>Status</th>          
              <th>Actions</th>
            </tr> 
                              </thead>
                              <tbody>
                                 <tr>
                <?php if(isset($dealers) && is_array($dealers) && count($dealers)): $i=1;?>
              <?php foreach ($dealers as $key => $reg) { ?>
                <tr>
                  <td> <?php echo $i++; ?> </td>
                  <td> <?php echo $reg -> first_name." ".$reg -> last_name; ?> </td>
                  <td> <?php echo $reg -> email?> </td>
                  <td> <?php echo $reg -> phone?> </td>
                  <td><i data="<?php echo $reg->id;?>" class="status_checks btn icon-<?php echo ($reg -> status!=0)? 'checkmark btn-success' : 'close btn-danger'?>"></i>  </td>
                  <td>
                  <div class="icons-group"> 
                    <a href="<?php echo site_url().admin?>dealers/view/<?php echo $reg->id?>" title="View" class="tip btn btn-link"><i class="icon-eye"></i></a> 
                    <!-- <a title="Delete" class="tip delete" data="<?php echo $reg->id?>"><i class="icon-close"></i></a> -->
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
<li><a href="<?php echo base_url(admin."dealers"); ?>"><i class="fa fa-dashboard"></i> RB Consultants</a></li>
<li class="active">Add</li>
</ol>
<h1>
Add RB Consultants
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
<a href="<?php echo site_url().admin.'dealers';?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php echo form_open_multipart(admin."dealers/add_dealers",'class="form-horizontal form-bordered .validate"');?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-menu"></i>Add RB Consultants</h6>
          </div>

          <div class="panel-body">  
          
            <div class="form-group">
              <label class="col-sm-2 control-label">State Name <span class="error">*</span></label>
              <div class="col-sm-10">
                <?php  $states [''] = 'Select an option';
                $options =' id="country_id" data-placeholder="Choose a name..." class="form-control required" tabindex="2"';
                echo form_dropdown('sid',$states,'',$options);?>
              </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label"> City Name</label>
            <div class="col-sm-10">
              <select id="all_cities" name="cid" data-placeholder="Choose a City..." class="form-control" tabindex="2">
                <option value=""></option>
              </select>
              
            </div>
          </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Name <span class="error">*</span></label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control required ">
              </div>
            </div>
          

                 
            <input type="hidden" name="curl" value="<?php echo site_url().admin.'dealers';?>">       
            <div class="form-actions text-right">
            <a class="btn btn-warning" href="<?php echo site_url().admin.'dealers';?>">Cancel</a>
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
<li><a href="<?php echo base_url(admin."dealers"); ?>"><i class="fa fa-dashboard"></i> RB Consultants</a></li>
<li class="active">Edit</li>
</ol>
<h1>
Edit RB Consultants
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
<a href="<?php echo site_url().admin.'dealers';?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<tbody>
                    <tr><th style="width:200px">Username</th> <td><?php echo $dealers_values->username;?></td></tr>
                    <tr><th style="width:200px">Email</th> <td><?php echo $dealers_values->email;?></td></tr>
                    <tr><th style="width:200px">Phone</th> <td><?php echo $dealers_values->phone;?></td></tr>
                    <tr><th style="width:200px">Address</th> <td><?php echo $dealers_values->address;?></td></tr>
                    <tr><th style="width:200px">State</th> <td><?php echo $dealers_values->statename;?></td></tr>
                    <tr><th style="width:200px">City</th> <td><?php echo $dealers_values->cityname;?></td></tr>
                    <tr><th style="width:200px">Company</th> <td><?php echo $dealers_values->company;?></td></tr>
                    <tr><th style="width:200px">Registered ON</th> <td><?php echo $dealers_values->created_on;?></td></tr>
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
      </div>

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
        url = "<?php echo site_url().admin;?>/dealers/active_status";
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
        $.ajax({url:"<?php echo site_url().admin?>dealers/delete/"+$(this).attr('data'), 
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

    $('#regdealers').addClass('active');
  });
</script>