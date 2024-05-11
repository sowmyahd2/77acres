<?php if(isset($mode) && $mode == 'all'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Property Ads
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo site_url().admin?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Property Ads</li>
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
                              <h3 class="box-title pull-left"><i class="fa fa-list"></i> Property Ads</h3>
                           </div>
                           <div class="col-md-6">
                           
                              <h3 class="box-title pull-right" style="margin-right:15px">
                                <a id="add_cats" role="button" class="btn btn-link btn-icon tip" title="Add Property Ads"><i class="fa fa-plus white"></i></a>
    
                                </h3>
                           </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
              <th>#</th>
              <th>Image</th>
              <th>Name</th>
              <th>Actions</th>
            </tr> 
                              </thead>
                              <tbody>
                                 <tr>
              <?php if(isset($propertyads) && is_array($propertyads) && count($propertyads)): $i=1;?>
            <?php foreach ($propertyads as $key => $main_propertyadss) { 
                
               ?>
               <?php if((substr($main_propertyadss->image, 0, 7 ) === "http://") ||(substr($main_propertyadss->image, 0, 8) === "https://")) : 
                        $src=$main_propertyadss->image;
                      else :
                          $src=base_url('uploads/property_ads').'/'.$main_propertyadss->image;
                      endif;
                  ?>         
                <tr id="row_<?php echo $main_propertyadss -> id?>">
                <td> <?php echo $i++; ?> </td>
                <td> <a href="<?php echo $src;?>" class="lightbox" title="<?php echo $main_propertyadss->name?>">
                          <img src="<?php echo $src;?>" style="width: auto; height: 25%" alt="" class="img-media"/>
                       </a>    
                  </td>
                <td> <?php echo ucfirst($main_propertyadss -> name); ?> </td>
                <td>
                <div class="icons-group"> 
                  <a href="<?php echo site_url().admin?>propertyads/update/<?php echo $main_propertyadss -> id?>" title="Edit" class="tip"><i class="fa fa-edit"></i></a> 
                  <a href="<?php echo site_url().admin?>propertyads/delete/<?php echo $main_propertyadss -> id?>" title="Delete" class="tip" onclick="return confirm('Are you sure to delete')"><i class="fa fa-times"></i></a>
                  </div>
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
<!-- Form modal -->
    <div id="form_modal" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close closeform" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> <span>Edit</span> Property Ads</h4>
          </div>
          <!-- Form inside modal -->
          <?php echo form_open_multipart(base_url().admin."propertyads/add",'role="form" class="validate" id="cat_form"');?>
            <div class="modal-body with-padding">
              <div class="form-group">
            <div class="row">
              <label class="col-sm-10 control-label"> Category</label>
              <div class="col-sm-12">
                  <?php  $categories [''] = 'Select Categories name';
          $options =' id="catt_id" data-placeholder="Choose a country name..." class="form-control required" tabindex="2"';
          echo form_dropdown('c_id',$categories,'',$options);?>
              </div>
            </div>
          </div>
          <div id="subcat">
            <div class="form-group">
              <div class="row">
                <label class="col-sm-10 control-label"> Sub Category</label>
                <div class="col-sm-12">
                  <select id="subb_id" name="sub_id" data-placeholder="Choose a Subcategory..." class="form-control" tabindex="2">
                  <option value=""></option>
                  </select>
                </div>
              </div>
            </div>
           <!--  <div class="form-group">
             <div class="row">
               <label class="col-sm-10 control-label"> Subsub Category</label>
                 <div class="col-sm-12">
                   <select id="subb_subid" name="cat_name" data-placeholder="Choose a course sub subcategory..." class="form-control" tabindex="2">
                   <option value=""></option>
                   </select>
                 </div>
               </div>
           </div> -->
          </div>
              <div class="form-group">
                <div class="row">
                  
                  <div class="col-sm-6">
                    <label>Name:</label>
                    <input type="text" id="name" name="name" class="form-control required">
                  </div>
                  <div class="col-sm-6">
                    <label>Image:</label>
                    <input type="file" id="image" name="image" class="form-control required" onchange="validateProImage(this.name)">
                  </div>
                  
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  
                  <div class="col-sm-6">
                    <label>URL:</label>
                    <input type="text" id="url" name="url" class="form-control required">
                  </div>
                  <div class="col-sm-6">
                    <label>Package:</label>
                    <?php
                    $package = array('0' => "Normal" ,"1" => "Premium");
                    $options =' id="package" data-placeholder="Choose a package..." class="form-control required" tabindex="2"';
                    echo form_dropdown('package',$package,'',$options);
                    ?>
                  </div>
                  
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-6">
                    <label>Property Type:</label>
                    <?php  
                    $options = ' id="propertytype" data-placeholder="Choose a Property Type..." class="form-control required" tabindex="2"';
                    echo form_dropdown('propertytype', $propertytype, '',$options);?>
                  </div>
                  <div class="col-sm-6">
                    <label>Quantity:</label>
                    <input type="number" min="0" id="qty" name="qty" class="form-control required" onkeypress="return isNumber(event)">
                  </div>
                  
                  
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning closeform" data-dismiss="modal">Close</button>
              <span id="add">
                <button type="submit" class="btn btn-primary" id="add_cate" >Add New</button>
              </span>
              
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /form modal -->
<?php elseif(isset($mode) && $mode == 'edit'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
<ol class="breadcrumb">
<li><a href="<?php echo base_url(admin); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="<?php echo base_url(admin."propertyads"); ?>"><i class="fa fa-dashboard"></i> Property Ads</a></li>
<li class="active">Edit</li>
</ol>
<h1>
Edit Property Ads
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
<a href="<?php echo site_url().admin.'propertyads';?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php echo form_open_multipart(admin."/propertyads/update",'class="validate"');?>
        <input type="hidden" name="id" value="<?php echo $propertyads->id?>">
        <div class="panel-body">
        <h1></h1>
          <div class="form-group">
            <div class="row">
              <label class="col-sm-10 control-label"> Category</label>
              <div class="col-sm-12">
                  <?php  $categories [''] = 'Select Categories name';
          $options =' id="catt_id" data-placeholder="Choose a country name..." class="form-control required" tabindex="2"';
          echo form_dropdown('c_id',$categories,'',$options);?>
              </div>
            </div>
          </div>
          <div id="subcat">
            <div class="form-group">
              <div class="row">
                <label class="col-sm-10 control-label"> Sub Category</label>
                <div class="col-sm-12">
                  <select id="subb_id" name="sub_id" data-placeholder="Choose a Subcategory..." class="form-control" tabindex="2">
                  <option value=""></option>
                  </select>
                </div>
              </div>
            </div>
            <!-- <div class="form-group">
              <div class="row">
                <label class="col-sm-10 control-label"> Subsub Category</label>
                  <div class="col-sm-12">
                    <select id="subb_subid" name="cat_name" data-placeholder="Choose a course sub subcategory..." class="form-control" tabindex="2">
                    <option value=""></option>
                    </select>
                  </div>
                </div>
            </div> -->
          </div>  
          <div class="form-group">
            <label class="col-sm-2 control-label"> Name</label>
            <div class="col-sm-4">
              <input type="text" id="name" name="name" value="<?php echo $propertyads->name; ?>" class="form-control required">
            </div>
            <label class="col-sm-2 control-label">Image *</label>
              <div class="col-sm-4">
                <input type="file" class="styled form-control" id="report-screenshot" name="image" onchange="validateProImage(this.name)"> 
                <span class="help-block">Accepted formats: jpg, png, gif. Max file size <?php echo IMAGE_DISPLAY_SIZE; ?></span>
                <input type="hidden" value="<?= $propertyads->image;?>" id="report-screenshot" name="old_image">
                <?php if($propertyads ->image!="") : ?>
                <?php if((substr($propertyads->image, 0, 7 ) === "http://") ||(substr($propertyads->image, 0, 8) === "https://")) : 
                        $src=$propertyads->image;
                      else :
                          $src=base_url('uploads/property_ads').'/'.$propertyads->image;
                      endif;
                  ?>         
                  <a href="<?php echo $src;?>" class="lightbox" title="<?php echo $propertyads->name?>">
                    <img src="<?php echo $src;?>" width="100" height="100" />
                  </a>
                <?php else: ?>
                     <img src="<?php echo base_url(IMAGES).'/no-image-available.png'?>" width="100" height="100" />
                <?php endif; ?>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"> URL</label>
            <div class="col-sm-4">
              <input type="text" id="url" name="url" value="<?php echo $propertyads->url; ?>" class="form-control required">
            </div>
            <label class="col-sm-2 control-label"> Package</label>
            <div class="col-sm-4">
              <?php
                  $package = array('0' => "Normal" ,"1" => "Premium");
                  $options =' id="package" data-placeholder="Choose a package..." class="form-control required" tabindex="2"';
                  echo form_dropdown('package',$package,$propertyads->package,$options);
                  ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"> Property Type</label>
            <div class="col-sm-4">
              <?php  
              $options = ' id="propertytype" data-placeholder="Choose a Property Type..." class="form-control required" tabindex="2"';
              echo form_dropdown('propertytype', $propertytype, $propertyads->propertytype,$options);?>
            </div>
            <label class="col-sm-2 control-label"> Quantity</label>
            <div class="col-sm-4">
              <input type="number" min="0" id="qty" name="qty" value="<?php echo $propertyads->qty; ?>" class="form-control required" onkeypress="return isNumber(event)">
            </div>
            
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

<script>
  $(document).ready(function(){
    var edit_link='<div class="icons-group"><a data="" role="button" class="btn btn-link btn-icon tip edit_cats" title="Edit Image"><i class="icon-pencil"></i></a>';
    edit_link +='<a href="<?php echo site_url().admin?>/propertyads/delete/" title="Delete Image" class="tip" onclick="return confirm(\'Are you sure to delete\')"><i class="icon-close"></i></a>';
    edit_link +='<a href="" title="Sub Categories" class="tip" ><i class="icon-tree3"></i></a></div>';
    var add_status = '<i data="" class="status_check btn icon-close btn-danger"></i>';
    $(document).on('click','#add_cats',function(){
      $('#form_modal').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      $('label.error').hide();
      $('#propertyads_image').attr('value','');
      $('#cat_keyword').attr('value','');
      
      $('#form_modal .modal-header span').html('Add');
      $('#form_modal .modal-footer span#edit').hide();
      $('#form_modal .modal-footer span#add').show();
    });


    

  $('#propertyads').addClass('active');
    $('#propertyads a').attr('id','second-level');
    $('#propertyads li a').each(function() {
       if($(this).attr('href') == '<?php echo current_url();?>' )
        $(this).closest('li').addClass('active');
    });    
  
    $(document).on('change','#catt_id',function(){
      var value = $(this).val();
      var url = "<?php echo site_url().admin?>products/subcategory/"+value;
      $.ajax({
         url: url,
         success: function(data)
         {
             if(data) $('#subb_id').html(data); 
                       $('#subcat').show();

         }
       });
      $('#subb_id').select2("val","");
   });
   $(document).on('change','#subb_id',function(){
      var value = $(this).val();
      var url = "<?php echo site_url().admin?>products/sub_subcategory/"+value;
      $.ajax({
         url: url,
         success: function(data)
         {
            if(data != "EMPTY"){
                $('#subb_subid').html(data); 
            } else {
                var url = "<?php echo site_url().admin?>products/product_subcategory/"+value;
                $.ajax({
                   url: url,
                   success: function(data)
                   {
                       if(data) $('#product').html(data); 
                   }
                 });
                $('#product').select2("val","");
            }
         }
       });
      $('#subb_subid').select2("val","");
    });
   $(document).on('change','#subb_subid',function(){
      var value = $(this).val();
      var url = "<?php echo site_url().admin?>products/product_subcategory/"+value;
      $.ajax({
         url: url,
         success: function(data)
         {
             if(data) $('#product').html(data); 
         }
       });
      $('#product').select2("val","");
    });
  });
</script>