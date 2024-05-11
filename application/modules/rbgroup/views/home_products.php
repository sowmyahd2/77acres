<?php if(isset($mode) && $mode == 'all'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      <?php echo $PageTitleType; ?>
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo site_url().admin?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active"><?php echo $PageTitleType; ?></li>
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
                              <h3 class="box-title pull-left"><i class="fa fa-list"></i> <?php echo $PageTitleType; ?></h3>
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
              <th>Image</th>               
                <th>Name</th>
                <th>Sku id</th>
                <th>Updated on</th>              
              <th>Actions</th>
            </tr> 
                              </thead>
                              <tbody>
                                 <tr>
                                    <?php if(isset($home_products) && is_array($home_products) && count($home_products)): $i=1;?>
              <?php foreach ($home_products as $key => $product) { ?>
                <tr>
                  <td> <?php echo $i++; ?> </td>  
                  <?php if((substr($product->image, 0, 7 ) === "http://") ||(substr($product->image, 0, 8) === "https://")) : 
                        $src=$product->image;
                        $main=$product->image;
                      else :
                          $src=base_url('uploads/products').'/'.$product->image;
                          $main=base_url('uploads/products').'/'.$product->image;
                      endif;
                  ?>                 
                  <td> <a href="<?php echo $src;?>" class="lightbox" title="<?php echo $product->name?>">
                          <img src="<?php echo $src;?>" style="width: 92px; height: 80px;" alt="" class="img-media"/>
                       </a>    
                  </td>
                  <td> <?php echo $product -> pname?> </td> 
                  <td> <?php echo $product -> sku_id?> </td>
                  <td> <?php echo $product -> dates?> </td>
                  <td>
                      <script>var subcat_<?php echo $product->id ?> = <?php echo json_encode($product);?></script>
                       <a title="Delete <?php echo $product -> name?>" class="tip delete" data="<?php echo $product->id?>"><i class="fa fa-times"></i></a>                       
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

            <!-- /form modal -->
 <div id="model_form" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> <span>Add</span> <?php echo $PageTitleType; ?></h4>
          </div>
          <!-- Form inside modal -->
          <?php echo form_open_multipart(site_url().admin.'products/homepage_add', 'id="cat_form" class=".validate"');?>
          <input type="hidden" name="typeid" value="<?php echo isset($typeid)?$typeid:1; ?>">
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
                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-10 control-label"> Product</label>
                      <div class="col-sm-12">
                        <select id="product" name="p_id" data-placeholder="Select product" class="form-control required" tabindex="2">
                        <option value=""></option>
                        </select>
                      </div>
                    </div>
                </div>
               </div>
             
          </div>            
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
              <input type="hidden" name="cat_id" value="<?php echo isset($category->id)?$category->id:""; ?>" id="id">
              <input type="hidden" name="curl" value="<?=current_url()?>">
              <button type="submit" class="btn btn-primary" id="add_city">Submit</button>
          </div>
          </form>
        </div>
      </div>
 </div>
<!-- /form modal -->
            <!-- /.content -->
         </aside>
         <!-- /.right-side -->
<?php elseif(isset($mode) && $mode == 'title'): ?>


<?php endif; ?>
      </div>

<script type="text/javascript">

  $(document).ready(function(){
  $('#products').addClass('active');
    $('#products a').attr('id','second-level');
    $('#products li a').each(function() {
       if($(this).attr('href') == '<?php echo current_url();?>' )
        $(this).closest('li').addClass('active');
    });  
  $('form').validate({
  
  ignore: ":hidden:not(textarea)",  
    rules: {
           cust_image:{ required: true, extension: "gif|jpeg|jpg|png"},
       old_image:{ required: true, extension: "gif|jpeg|jpg|png"},
           cust_details:{required:true} 
           //rec_image:{ required: true}       
       
        },
        messages: {
          rec_image:{ extension:"File must be in gif / jpeg / jpg / png formats"},
      
        },
        errorPlacement: function(error, element) {
        if (element.next().hasClass("filename")) {
           error.insertAfter(element.parent().next('.help-block'));
        }else{
           error.insertAfter(element);
        }
    }
  
    });
  
  $(document).on('click','.delete',function(){
      if(confirm('Are you sure to delete ?')){
        $.ajax({url:"<?php echo site_url().admin?>products/home_page_delete/"+$(this).attr('data'), 
          success:function(data){window.location.reload(true);}});
      }
    });
  $(document).on('click','.model_form',function(){
      $('#model_form').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      $('label.error').hide();
      var data = eval($(this).attr('data'));
      return false;
  });
  $(document).on('click','.view_form',function(){
      $('#view_form').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      $('label.error').hide();
      var data = eval($(this).attr('data'));
      $('#sid').val(data.id);
      $('#sname').val(data.name);
      return false;
  });

  
    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
    } 
    $('.nav-tabs a').on('shown', function (e) {
        window.location.hash = e.target.hash;
    })

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