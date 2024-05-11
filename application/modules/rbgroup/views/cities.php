<?php if(isset($mode) && $mode == 'all'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      City Name
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo site_url().admin?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">City Name</li>
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
                              <h3 class="box-title pull-left"><i class="fa fa-list"></i> City Name</h3>
                           </div>
                           <div class="col-md-6">
                           
                              <h3 class="box-title pull-right" style="margin-right:15px"><a href="<?php echo site_url().admin?>cities/add" ><i class="fa fa-plus white model_form" aria-hidden="true"></i></a></h3>
                           </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
              <th>#</th>
              <th>State Name</th>
              <th>Name</th>              
              <th>Image</th> 
              <th>Actions</th>
            </tr> 
                              </thead>
                              <tbody>
                                 <tr>
                                    <?php if(isset($cities) && is_array($cities) && count($cities)): $i=1;?>
            <?php foreach ($cities as $key => $cities) { ?>
              <?php if((substr($cities->image, 0, 7 ) === "http://") ||(substr($cities->image, 0, 8) === "https://")) : 
                        $src=$cities->image;
                      else :
                          $src=base_url('uploads/cities').'/'.$cities->image;
                      endif;
                  ?>         
              <tr id="row_<?php echo $cities->id;?>">
                <td> <?php echo $i++; ?> </td>       
                <td> <?php echo $cities->statename;?> </td>         
                <td> <?php echo $cities->city;?> </td>                                       
                                                            
                <td> <a href="<?php echo $src;?>" class="lightbox" title="<?php echo $cities->city?>">
                          <img src="<?php echo $src;?>" style="width: 100px;height: 50px;" alt="" class="img-media"/>
                       </a>  </td>
                <td>
                
                <div class="icons-group"> 
                  
                  <a href="<?php echo site_url().admin.'cities/edit/'.$cities->id ?>" title="Edit" class="tip btn btn-link btn"><i class="fa fa-edit"></i></a>
                 
                   <a href="<?php echo site_url().admin.'cities/delete/'.$cities->id ?>" title="Delete " class="tip btn  btn-link btn" onclick="return confirm('Are you sure to delete')"><i class="fa fa-times"></i></a> 
                  
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
<li><a href="<?php echo base_url(admin."cities"); ?>"><i class="fa fa-dashboard"></i> City Name</a></li>
<li class="active">Add</li>
</ol>
<h1>
Add City Name
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
<a href="<?php echo site_url().admin.'cities';?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php echo form_open_multipart(admin."cities/add_cities",'class="form-horizontal form-bordered .validate"');?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-menu"></i>Add City Name</h6>
          </div>

          <div class="panel-body">  
          
            <div class="form-group">
              <label class="col-sm-2 control-label">State Name <span class="error">*</span></label>
              <div class="col-sm-10">
                <?php  $states [''] = 'Select an option';
                $options =' id="sid" data-placeholder="Choose a name..." class="form-control required" tabindex="2"';
                echo form_dropdown('sid',$states,'',$options);?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Name <span class="error">*</span></label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control required ">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Image <span class="error">*</span></label>
              <div class="col-sm-10">
                <input type="file" class="styled form-control required" id="report-screenshot" name="image">
                <span class="help-block">Accepted formats: jpg, png, gif. Max file size <?php echo IMAGE_DISPLAY_SIZE; ?></span>
              </div>
            </div>

                 
            <input type="hidden" name="curl" value="<?php echo site_url().admin.'cities';?>">       
            <div class="form-actions text-right">
            <a class="btn btn-warning" href="<?php echo site_url().admin.'cities';?>">Cancel</a>
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
<li><a href="<?php echo base_url(admin."cities"); ?>"><i class="fa fa-dashboard"></i> City Name</a></li>
<li class="active">Edit</li>
</ol>
<h1>
Edit City Name
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
<a href="<?php echo site_url().admin.'cities';?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php echo form_open_multipart(admin."cities/add_cities",'class="form-horizontal form-bordered .validate"');?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-menu"></i>Edit City Name</h6>
          </div>

          <div class="panel-body">  
          
            <div class="form-group">
              <label class="col-sm-2 control-label">State Name <span class="error">*</span></label>
              <div class="col-sm-10">
                <?php  $states [''] = 'Select an option';
                $options =' id="sid" data-placeholder="Choose a name..." class="form-control required" tabindex="2"';
                echo form_dropdown('sid',$states,$cities->state,$options);?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Name <span class="error">*</span></label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control required " value="<?php echo $cities->city;?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Image <span class="error">*</span></label>
              <div class="col-sm-10">
                <input type="file" class="styled form-control required" id="report-screenshot" name="image">
                <input type="hidden" value="<?= $cities->image?>" name="old_image1">
                <span class="help-block">Accepted formats: jpg, png, gif. Max file size <?php echo IMAGE_DISPLAY_SIZE; ?></span>
                 <?php if($cities ->image!="") : ?>
                  <?php if((substr($cities->image, 0, 7 ) === "http://") ||(substr($cities->image, 0, 8) === "https://")) : 
                        $src=$cities->image;
                      else :
                          $src=base_url('uploads/cities').'/'.$cities->image;
                      endif;
                  ?>  
                  <a href="<?php echo $src;?>" class="lightbox" title="<?php echo $cities->name?>">
                    <img src="<?php echo $src;?>" width="100" height="100" />
                  </a>
                <?php else: ?>
                     <img src="<?php echo base_url().'uploads/cities/no-image-available.png'?>" width="100" height="100" />
                <?php endif; ?>
              </div>
            </div>

            
            <input type="hidden" name="id" value="<?php echo $cities->id;?>">     
            <input type="hidden" name="curl" value="<?php echo site_url().admin.'cities';?>">       
            <div class="form-actions text-right">
            <a class="btn btn-warning" href="<?php echo site_url().admin.'cities';?>">Cancel</a>
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