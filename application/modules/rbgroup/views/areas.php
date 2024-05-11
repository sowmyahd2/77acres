<?php if(isset($mode) && $mode == 'all'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Areas Name
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo site_url().admin?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Areas Name</li>
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
                              <h3 class="box-title pull-left"><i class="fa fa-list"></i> Areas Name</h3>
                           </div>
                           <div class="col-md-6">
                           
                              <h3 class="box-title pull-right" style="margin-right:15px"><a href="<?php echo site_url().admin?>areas/add" ><i class="fa fa-plus white model_form" aria-hidden="true"></i></a></h3>
                           </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
              <th>#</th>
              <th>State Name</th>
              <th>City Name</th>
              <th>Name</th>              
              <th>Actions</th>
            </tr> 
                              </thead>
                              <tbody>
                                 <tr>
                                    <?php if(isset($areas) && is_array($areas) && count($areas)): $i=1;?>
            <?php foreach ($areas as $key => $areas) { ?>
                      
              <tr id="row_<?php echo $areas->id;?>">
                <td> <?php echo $i++; ?> </td>       
                <td> <?php echo $areas->statename;?> </td>
                <td> <?php echo $areas->cityname;?> </td>         
                <td> <?php echo $areas->area;?> </td>
                <td>
                
                <div class="icons-group"> 
                  
                  <a href="<?php echo site_url().admin.'areas/edit/'.$areas->id ?>" title="Edit" class="tip btn btn-link btn"><i class="fa fa-edit"></i></a>
                 
                   <a href="<?php echo site_url().admin.'areas/delete/'.$areas->id ?>" title="Delete " class="tip btn  btn-link btn" onclick="return confirm('Are you sure to delete')"><i class="fa fa-times"></i></a> 
                  
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
<li><a href="<?php echo base_url(admin."areas"); ?>"><i class="fa fa-dashboard"></i> Areas Name</a></li>
<li class="active">Add</li>
</ol>
<h1>
Add Areas Name
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
<a href="<?php echo site_url().admin.'areas';?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php echo form_open_multipart(admin."areas/add_areas",'class="form-horizontal form-bordered .validate"');?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-menu"></i>Add Areas Name</h6>
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
          

                 
            <input type="hidden" name="curl" value="<?php echo site_url().admin.'areas';?>">       
            <div class="form-actions text-right">
            <a class="btn btn-warning" href="<?php echo site_url().admin.'areas';?>">Cancel</a>
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
<li><a href="<?php echo base_url(admin."areas"); ?>"><i class="fa fa-dashboard"></i> Areas Name</a></li>
<li class="active">Edit</li>
</ol>
<h1>
Edit Areas Name
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
<a href="<?php echo site_url().admin.'areas';?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php echo form_open_multipart(admin."areas/add_areas",'class="form-horizontal form-bordered .validate"');?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h6 class="panel-title"><i class="icon-menu"></i>Edit Areas Name</h6>
          </div>

          <div class="panel-body">  
          
            <div class="form-group">
              <label class="col-sm-2 control-label">State Name <span class="error">*</span></label>
              <div class="col-sm-10">
                <?php  $states [''] = 'Select an option';
                $options =' id="sid" data-placeholder="Choose a name..." class="form-control required" tabindex="2"';
                echo form_dropdown('sid',$states,$areas->state,$options);?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label"> City Name</label>
              <div class="col-sm-10">
                <?php  $cities [''] = 'Select City Name';
                $options = ' id="all_cities" data-placeholder="Choose a City..." class="form-control required" tabindex="2"';
                echo form_dropdown('cid', $cities, $areas->city,$options);?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Name <span class="error">*</span></label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control required " value="<?php echo $areas->area;?>">
              </div>
            </div>
            
            

            
            <input type="hidden" name="id" value="<?php echo $areas->id;?>">     
            <input type="hidden" name="curl" value="<?php echo site_url().admin.'areas';?>">       
            <div class="form-actions text-right">
            <a class="btn btn-warning" href="<?php echo site_url().admin.'areas';?>">Cancel</a>
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

    // country - state
    $(document).on('change','#country_id',function(){
      var value = $(this).val();
      var url = "<?php echo site_url().admin?>/areas/cities/"+value;
      $.ajax({
         url: url,
         success: function(data)
         {
             if(data) $('#all_cities').html(data); 
         }
       });
      $('#all_cities').select2("val","");
    });
 
  });
</script>