<?php if(isset($mode) && $mode == 'all'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Major Cities
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo site_url().admin?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Major Cities</li>
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
                              <h3 class="box-title pull-left"><i class="fa fa-list"></i> Major Cities</h3>
                           </div>
                           <div class="col-md-6">
                           
                              <h3 class="box-title pull-right" style="margin-right:15px"><a href="<?php echo site_url().admin?>majorcities/add" ><i class="fa fa-plus white model_form" aria-hidden="true"></i></a></h3>
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
                    <th>Image</th>
              <th>Actions</th>
            </tr> 
                              </thead>
                              <tbody>
                                 <tr>
             <?php if(isset($city) && is_array($city) && count($city)): $i=1;?>
                  <?php foreach ($city as $key => $city) { ?>
                    <tr>
                      <td> <?php echo $i++; ?> </td>
                      <td> <?php echo ucfirst($states[$city -> state])?> </td>
                      <td> <?php echo ucfirst($city -> city)?> </td>
                      <td>
                        <?php 
                         if($city->image!='' && file_exists('./uploads/city/'.$city->image))
                           $src = base_url().'uploads/city/'.$city->image;
                         else
                           $src = base_url().'uploads/city/default.png';
                       ?>
                          <a href="<?php echo $src?>" class="lightbox" title="<?php echo $city -> city?>">
                            <img src="<?php echo $src?>" alt="" class="img-media">
                          </a>
                        </td>
                      <td>
                      <div class="icons-group"> 
                        <a href="<?php echo site_url().admin?>majorcities/edit/<?php echo $city -> id?>" title="Edit" class="tip"><i class="fa fa-edit"></i></a> 
                        <a href="<?php echo site_url().admin?>majorcities/delete/<?php echo $city -> id?>" title="Delete" class="tip" onclick="return confirm('Are you sure to delete')"><i class="fa fa-times"></i></a>
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
<li><a href="<?php echo base_url(admin."majorcities"); ?>"><i class="fa fa-dashboard"></i> Major Cities</a></li>
<li class="active">Add</li>
</ol>
<h1>
Add Major Cities
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
<a href="<?php echo site_url().admin.'majorcities';?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php echo form_open_multipart(admin."majorcities/add",'class="form-horizontal form-bordered .validate"');?>
        <div class="panel-body">
        <h1></h1>
          <div class="form-group">
            <label class="col-sm-2 control-label"> State Name</label>
            <div class="col-sm-10">
              <?php  $states [''] = 'Select State';
              $options = ' id="country_id" data-placeholder="Choose a State..." class="select-full form-control required" tabindex="2"';
              echo form_dropdown('state_name', $states, '',$options);?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"> City Name</label>
            <div class="col-sm-10">
              <select id="all_majorcities" name="city_name" data-placeholder="Choose a City..." class="form-control select-full" tabindex="2">
                <option value=""></option>
              </select>
              
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"> Image</label>
            <div class="col-sm-10">
            <input type="file" class="styled form-control" id="report-screenshot" name="city_image">
              <span class="help-block">Accepted formats: jpg, png, gif. Max file size <?php echo IMAGE_DISPLAY_SIZE; ?></span>
              <input type="hidden" name="old_image" value=""></div>
          </div>
          <div class="form-actions text-right">
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
<li><a href="<?php echo base_url(admin."majorcities"); ?>"><i class="fa fa-dashboard"></i> Major Cities</a></li>
<li class="active">Edit</li>
</ol>
<h1>
Edit Major Cities
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
<a href="<?php echo site_url().admin.'majorcities';?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php echo form_open_multipart(admin."/major_majorcities/edit",'class="form-horizontal form-bordered .validate"');?>
        <input type="hidden" name="id" value="<?php echo $city->id?>">
        <div class="panel-body">
        <h1></h1>
          <div class="form-group">
            <label class="col-sm-2 control-label"> State Name</label>
            <div class="col-sm-10">
              <?php  $states [''] = 'Select State Name';
              $options = ' id="country_id" data-placeholder="Choose a State..." class="select-full form-control required" tabindex="2"';
              echo form_dropdown('state_name', $states, $city->state,$options);?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"> Major Cities</label>
            <div class="col-sm-10">
              <?php  $majorcities [''] = 'Select Major Cities';
              $options = ' id="all_majorcities" data-placeholder="Choose a City..." class="select-full form-control required" tabindex="2"';
              echo form_dropdown('city_name', $majorcities, $city->city,$options);?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"> Image</label>
            <div class="col-sm-10">
            <input type="file" class="styled form-control" id="report-screenshot" name="city_image">
              <span class="help-block">Accepted formats: jpg, png, gif. Max file size <?php echo IMAGE_DISPLAY_SIZE; ?></span>
              <img src="<?php echo base_url().'uploads/city/'.$city->image?>" height="50px"/>
              <input type="hidden" name="old_image" value="<?php echo $city->image?>"></div>
          </div>
          
          <div class="form-actions text-right">
          <?php echo form_submit('submit', 'Update','class="btn btn-primary"');?>
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

  <script type="text/javascript">
  $(document).ready(function(){ 
    $('form').validate({
    rules: {
        course_image:{ required: false, extension: "gif|jpeg|jpg|png"}
        },
        errorPlacement: function(error, element) {
        if (element.next().hasClass("filename")) {
           error.insertAfter(element.parent().next('.help-block'));
        }else{
           error.insertAfter(element);
        }
    }
    });
    // country - state
    $(document).on('change','#country_id',function(){
      var value = $(this).val();
      var url = "<?php echo site_url().admin?>majorcities/cities/"+value;
      $.ajax({
         url: url,
         success: function(data)
         {
             if(data) $('#all_majorcities').html(data); 
         }
       });
      $('#all_majorcities').select2("val","");
    });
  });
</script>
<script type="text/javascript">

 $('#locationtab').addClass('active');
   $('#locationtab a').attr('id','second-level');
   $('#locationtab li a').each(function() {
      if($(this).attr('href') == '<?php echo current_url();?>' )
       $(this).closest('li').addClass('active');
   });
</script> 