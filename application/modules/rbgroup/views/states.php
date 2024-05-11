<?php if(isset($mode) && $mode == 'all'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      State Name
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo site_url().admin?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">State Name</li>
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
                              <h3 class="box-title pull-left"><i class="fa fa-list"></i> State Name</h3>
                           </div>
                           <div class="col-md-6">
                           
                              <h3 class="box-title pull-right" style="margin-right:15px"><a href="<?php echo site_url().admin?>states/add" ><i class="fa fa-plus white model_form" aria-hidden="true"></i></a></h3>
                           </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
              <th>#</th>
              <th>Name</th> 
              <th>Actions</th>
            </tr> 
                              </thead>
                              <tbody>
                                 <tr>
                                    <?php if(isset($states) && is_array($states) && count($states)): $i=1;?>
            <?php foreach ($states as $key => $states) { ?>
            
              <tr id="row_<?php echo $states->id;?>">
                <td> <?php echo $i++; ?> </td>                
                <td> <?php echo $states->state;?> </td>                                       
                                                            
              
                <td>
                
                <div class="icons-group"> 
                  
                  <a href="<?php echo site_url().admin.'states/edit/'.$states->id ?>" title="Edit" class="tip btn btn-link btn"><i class="fa fa-edit"></i></a>
                 
                   <a href="<?php echo site_url().admin.'states/delete/'.$states->id ?>" title="Delete " class="tip btn  btn-link btn" onclick="return confirm('Are you sure to delete')"><i class="fa fa-times"></i></a> 
                  
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
<li><a href="<?php echo base_url(admin."states"); ?>"><i class="fa fa-dashboard"></i> State Name</a></li>
<li class="active">Add</li>
</ol>
<h1>
Add State Name
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
<a href="<?php echo site_url().admin.'states';?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php echo form_open_multipart(admin."states/add_states",'class="form-horizontal form-bordered .validate"');?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-menu"></i>Add State Name</h6>
          </div>

          <div class="panel-body">  
          

            <div class="form-group">
              <label class="col-sm-2 control-label">Name <span class="error">*</span></label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control required ">
              </div>
            </div>
            

                 
            <input type="hidden" name="curl" value="<?php echo site_url().admin.'states';?>">       
            <div class="form-actions text-right">
            <a class="btn btn-warning" href="<?php echo site_url().admin.'states';?>">Cancel</a>
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
<li><a href="<?php echo base_url(admin."states"); ?>"><i class="fa fa-dashboard"></i> State Name</a></li>
<li class="active">Edit</li>
</ol>
<h1>
Edit State Name
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
<a href="<?php echo site_url().admin.'states';?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php echo form_open_multipart(admin."states/add_states",'class="form-horizontal form-bordered .validate"');?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-menu"></i>Edit State Name</h6>
          </div>

          <div class="panel-body">  
          

            <div class="form-group">
              <label class="col-sm-2 control-label">Name <span class="error">*</span></label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control required " value="<?php echo $states->name;?>">
              </div>
            </div>
            
            
            <input type="hidden" name="id" value="<?php echo $states->id;?>">     
            <input type="hidden" name="curl" value="<?php echo site_url().admin.'states';?>">       
            <div class="form-actions text-right">
            <a class="btn btn-warning" href="<?php echo site_url().admin.'states';?>">Cancel</a>
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
   
    $('#locationtab').addClass('active');
    $('#locationtab a').attr('id','second-level');
    $('#locationtab li a').each(function() {
       if($(this).attr('href') == '<?php echo current_url();?>' )
        $(this).closest('li').addClass('active');
    });

 
  });
</script>