<?php if(isset($mode) && $mode == 'all'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Authority
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo site_url().admin?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Authority</li>
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
                              <h3 class="box-title pull-left"><i class="fa fa-list"></i> Authority</h3>
                           </div>
                           <div class="col-md-6">
                           
                              <h3 class="box-title pull-right" style="margin-right:15px">
<a id="add_cats" role="button" class="btn btn-link btn-icon tip" title="Add Authority"><i class="fa fa-plus white"></i></a>
</h3>
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
             <?php if(isset($authority) && is_array($authority) && count($authority)): $i=1;?>
            <?php foreach ($authority as $key => $main_authoritys) { 
                
               ?>
                <tr id="row_<?php echo $main_authoritys -> id?>">
                <td> <?php echo $i++; ?> </td>
                <td> <?php echo ucfirst($main_authoritys -> name); ?> </td>
                <td>
                <div class="icons-group"> 
                  <a href="<?php echo site_url().admin?>authority/update/<?php echo $main_authoritys -> id?>" title="Edit" class="tip"><i class="fa fa-edit"></i></a> 
                  <a href="<?php echo site_url().admin?>authority/delete/<?php echo $main_authoritys -> id?>" title="Delete" class="tip" onclick="return confirm('Are you sure to delete')"><i class="fa fa-times"></i></a>
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
            <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> <span>Edit</span> Authority</h4>
          </div>
          <!-- Form inside modal -->
          <?php echo form_open_multipart(base_url().admin."authority/add",'role="form" class="validate" id="authoritysubmitform"');?>
            <div class="modal-body with-padding">
              <div class="form-group">
                <div class="row">
                  
                  <div class="col-sm-12">
                    <label>Name:</label>
                    <input type="tet" id="authorityname" name="name" class="form-control required">
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
<li><a href="<?php echo base_url(admin."authority"); ?>"><i class="fa fa-dashboard"></i> Authority</a></li>
<li class="active">Edit</li>
</ol>
<h1>
Edit Authority
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
<a href="<?php echo site_url().admin.'authority';?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<?php echo form_open_multipart(admin."/authority/update",'class="validate" id="authoritysubmitform"');?>
        <input type="hidden" name="id" value="<?php echo $authority->id?>">
        <div class="panel-body">
        <h1></h1>
          
          <div class="form-group">
            <label class="col-sm-2 control-label"> Name</label>
            <div class="col-sm-10">
              <input type="text" id="authorityname" name="name" value="<?php echo $authority->name; ?>" class="form-control required">
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
<input type="hidden" id="siteurl_data" value="<?php echo site_url(admin); ?>">
<script>
  $(document).ready(function(){
        //-----------------------------
$(document).on('change', '#authorityname', function() {
   var siteurl = $("#siteurl_data").val();
   var url = siteurl+"authority/duplicatenamecheck";
   $.ajax({
       type: "POST",
       url: url,
       data: $("#authoritysubmitform").serialize(), // serializes the form's elements.
       success: function(data) {
           if (data == '1') {
                alert("This name already exists");
               $('#authorityname').val('');
               return false;
           } 
       }
   });
   return false;
});
//------------------------
    var edit_link='<div class="icons-group"><a data="" role="button" class="btn btn-link btn-icon tip edit_cats" title="Edit Image"><i class="icon-pencil"></i></a>';
    edit_link +='<a href="<?php echo site_url().admin?>/authority/delete/" title="Delete Image" class="tip" onclick="return confirm(\'Are you sure to delete\')"><i class="icon-close"></i></a>';
    edit_link +='<a href="" title="Sub Categories" class="tip" ><i class="icon-tree3"></i></a></div>';
    var add_status = '<i data="" class="status_check btn icon-close btn-danger"></i>';
    $(document).on('click','#add_cats',function(){
      $('#form_modal').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      $('label.error').hide();
      $('#authority_image').attr('value','');
      $('#cat_keyword').attr('value','');
      
      $('#form_modal .modal-header span').html('Add');
      $('#form_modal .modal-footer span#edit').hide();
      $('#form_modal .modal-footer span#add').show();
    });


    
$('#property_cms').addClass('active');
    $('#property_cms a').attr('id','second-level');
    $('#property_cms li a').each(function() {
       if($(this).attr('href') == '<?php echo current_url();?>' )
        $(this).closest('li').addClass('active');
    });

  

  });
</script>