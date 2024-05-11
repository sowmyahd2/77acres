<?php if(isset($mode) && $mode == 'all'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Affordable Plan Details
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo site_url().admin?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Affordable Plan Details</li>
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
                              <h3 class="box-title pull-left"><i class="fa fa-list"></i> Affordable Plan Details</h3>
                           </div>
                           <div class="col-md-6">
                           
                              <h3 class="box-title pull-right" style="margin-right:15px">
                                <a href="<?php echo site_url().admin?>affordableplandetails/add" ><i class="fa fa-plus white model_form" aria-hidden="true"></i></a>

                               

                              </h3>
                           </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
              <th>#</th>
              <th>Plan Name</th>
              <th>Name</th>
              <!-- <th>Description</th>     -->          
              <th>Actions</th>
            </tr> 
                              </thead>
                              <tbody>
                                 <tr>
                                    <?php if(isset($affordableplandetails) && is_array($affordableplandetails) && count($affordableplandetails)): $i=1;?>
            <?php foreach ($affordableplandetails as $key => $affordableplandetails) { ?>
             
              <tr id="row_<?php echo $affordableplandetails->id;?>">
                <td> <?php echo $i++; ?> </td>       
                <td> <?php echo $affordableplandetails->constype;?> </td>         
                <td> <?php echo $affordableplandetails->name;?> </td>
                <!-- <td> <?php echo $affordableplandetails->description;?> </td> -->
                <td>
                
                <div class="icons-group"> 
                  
                  <a href="<?php echo site_url().admin.'affordableplandetails/edit/'.$affordableplandetails->id ?>" title="Edit" class="tip btn btn-link btn"><i class="fa fa-edit"></i></a>
                 
                   <a href="<?php echo site_url().admin.'affordableplandetails/delete/'.$affordableplandetails->id ?>" title="Delete " class="tip btn  btn-link btn" onclick="return confirm('Are you sure to delete')"><i class="fa fa-times"></i></a> 
                  
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
<li><a href="<?php echo base_url(admin."affordableplandetails"); ?>"><i class="fa fa-dashboard"></i> Affordable Plan Details</a></li>
<li class="active">Add</li>
</ol>
<h1>
Add Affordable Plan Details
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
<a href="<?php echo site_url().admin.'affordableplandetails';?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php echo form_open_multipart(admin."affordableplandetails/add_affordableplandetails",'class="form-horizontal form-bordered .validate"');?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-menu"></i>Add Affordable Plan Details</h6>
          </div>

          <div class="panel-body">  
          
            <div class="form-group">
              <label class="col-sm-2 control-label">Plan Type <span class="error">*</span></label>
              <div class="col-sm-10">
                <?php  $affordableplan [''] = 'Select an option';
                $options =' id="cid" data-placeholder="Choose a name..." class="form-control required" tabindex="2"';
                echo form_dropdown('cid',$affordableplan,'',$options);?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Name <span class="error">*</span></label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control required ">
              </div>
            </div>
            
            <!-- <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="editor textarea" name="description" id="desc" style="width:100%" placeholder="Enter text ..." rows="10" cols="80"></textarea>
                </div>
            </div> -->
                 
            <input type="hidden" name="curl" value="<?php echo site_url().admin.'affordableplandetails';?>">       
            <div class="form-actions text-right">
            <a class="btn btn-warning" href="<?php echo site_url().admin.'affordableplandetails';?>">Cancel</a>
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
<li><a href="<?php echo base_url(admin."affordableplandetails"); ?>"><i class="fa fa-dashboard"></i> Affordable Plan Details</a></li>
<li class="active">Edit</li>
</ol>
<h1>
Edit Affordable Plan Details
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
<a href="<?php echo site_url().admin.'affordableplandetails';?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php echo form_open_multipart(admin."affordableplandetails/add_affordableplandetails",'class="form-horizontal form-bordered .validate"');?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-menu"></i>Edit Affordable Plan Details</h6>
          </div>

          <div class="panel-body">  
          
            <div class="form-group">
              <label class="col-sm-2 control-label">Plan Type <span class="error">*</span></label>
              <div class="col-sm-10">
                <?php  $affordableplan [''] = 'Select an option';
                $options =' id="cid" data-placeholder="Choose a name..." class="form-control required" tabindex="2"';
                echo form_dropdown('cid',$affordableplan,$affordableplandetails->cid,$options);?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Name <span class="error">*</span></label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control required " value="<?php echo $affordableplandetails->name;?>">
              </div>
            </div>
           
            <!-- <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="editor textarea" name="description" id="desc" style="width:100%" placeholder="Enter text ..." rows="10" cols="80"><?= $affordableplandetails->description?></textarea>
                </div>
            </div> -->
            
            <input type="hidden" name="id" value="<?php echo $affordableplandetails->id;?>">     
            <input type="hidden" name="curl" value="<?php echo site_url().admin.'affordableplandetails';?>">       
            <div class="form-actions text-right">
            <a class="btn btn-warning" href="<?php echo site_url().admin.'affordableplandetails';?>">Cancel</a>
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

<?php endif; ?>
      </div>

<script>
  $(document).ready(function(){   
   
    $('#homecontent').addClass('active');
    $('#homecontent a').attr('id','second-level');
    $('#homecontent li a').each(function() {
       if($(this).attr('href') == '<?php echo current_url();?>' )
        $(this).closest('li').addClass('active');
    });

 
  });
</script>