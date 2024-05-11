<?php if(isset($mode) && $mode == 'all'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Specification Details
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo site_url().admin?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Specification Details</li>
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
                              <h3 class="box-title pull-left"><i class="fa fa-list"></i> Specification Details</h3>
                           </div>
                           <div class="col-md-6">
                            <?php $abuilder = array('id'=>'','name'=>'');?>
          <script>var builder_0 = <?php echo json_encode($abuilder)?></script>
          <h3 class="box-title pull-right" style="margin-right:15px">
            <a data="builder_0" role="button" class="btn btn-link btn-icon model_form tip" title="Add Specification"><i class="fa fa-plus white" aria-hidden="true"></i></a>
            </h3>
                              <!-- <h3 class="box-title pull-right" style="margin-right:15px"><a href="<?php echo site_url().admin?>areas/add" ><i class="fa fa-plus white model_form" aria-hidden="true"></i></a></h3> -->
                           </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
              <th>#</th>
                <th>Name</th>
                <th>Mandatory</th>
                <th>Attribute Type</th>
                <th>Data Type</th>
                <th>Order BY</th> 
              <th>Actions</th>
            </tr> 
                              </thead>
                              <tbody>
                                 <tr>
                                  <?php 
                                  $data_array = array('1' => "INT" ,"2" => "VARCHAR","3" => "DATE");
                                  $attribute_array = array('1' => "Multiple Dropdown" ,"2" => "Single Dropdown","3" => "Text Box");
                                  if(isset($specifications) && is_array($specifications) && count($specifications)): $i=1;?>
              <?php foreach ($specifications as $key => $spec) { ?>
                <tr>
                  <td> <?php echo $i++; ?> </td>
                  <td> <?php echo $spec -> name?> </td>
                  <td> <?php echo ($spec -> mandatory==0)?'NO':'YES'; ?> </td>
                  <td> <?php echo isset($attribute_array[$spec -> attribute_type])?$attribute_array[$spec -> attribute_type]:'N/A'; ?> </td>
                  <td> <?php echo isset($data_array[$spec -> data_type])?$data_array[$spec -> data_type]:'N/A'; ?> </td>
                  <td> <?php echo $spec -> orderby?> </td>
                  <td>
                  <div class="icons-group">
                    <script>var spec_<?php echo $spec -> id?> = <?=json_encode($spec)?>;</script>  
                    <a data="spec_<?php echo $spec -> id?>" href="#" title="View" class="tip model_form"><i class="fa fa-edit"></i></a>
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
<div id="model_form" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> <span>Add</span> Specification Value </h4>
          </div>
          <!-- Form inside modal -->
          <?php echo form_open_multipart(site_url().admin.'specifications/add_new', 'id="cat_form" class=".validate"');?>
            <div class="modal-body with-padding">
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-4">
                    <label>Specification Name: <span class="error">*</span></label>
                    <input type="text" id="sname" name="name" title="Please enter category name" class="form-control required" value="">
                  </div>
                  <div class="col-sm-4">
                    <label>Order By: <span class="error">*</span></label>
                    <input type="number" min="0" id="orderby" name="orderby" title="Please enter Order BY" class="form-control required" value="" onkeypress="return isNumber(event)">
                  </div>
                  <div class="col-sm-4">
                    <label>Mandatory: <span class="error">*</span></label>
                      <select id="mandatory"  name="mandatory" class="select-full form-control" >
                        <option value="1">Yes</option>
                        <option selected value="0">No</option>
                      </select>
                  </div>
                </div>
              </div>              
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-4">
                    <label>Attribute Type: <span class="error">*</span></label>
                    <?php
                    $attribute_type = array('1' => "Multiple Dropdown" ,"2" => "Single Dropdown","3" => "Text Box");
                    $options =' id="attribute_type" data-placeholder="Choose a Type..." class="form-control required" tabindex="2"';
                    echo form_dropdown('attribute_type',$attribute_type,"",$options);
                    ?>
                  
                  </div>
                  <div class="col-sm-4">
                    <label>Data Type: <span class="error">*</span></label>
                    <?php
                  $data_type = array('1' => "INT" ,"2" => "VARCHAR","3" => "DATE");
                  $options =' id="data_type" data-placeholder="Choose a Type..." class="form-control required" tabindex="2"';
                  echo form_dropdown('data_type',$data_type,"",$options);
                  ?>
                     <span>This Applies only for Text Box Attribute Type</span>
                  </div>
                  <div class="col-sm-4">
                    <label>Supporting Type:</label>
                      <?php
                      $areatype = array('0' => "Not required" ,"1" => "Required");
                      $options =' id="areatype" data-placeholder="Choose a Type..." class="form-control required" tabindex="2"';
                      echo form_dropdown('areatype',$areatype,"",$options);
                      ?>
                      <span>Please select this option only for "INT" Data type and for creating dropdown for area type(Feet,Sq Feet,Acres). For rest it wil be ignored</span>
                  </div>
                </div>
              </div>
              
          </div>            
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            <span id="add">
              <input type="hidden" name="id" value="" id="id">
              <button type="submit" class="btn btn-primary" id="add_city">Submit</button>
            </span>
          </div>
          </form>
        </div>
      </div>
    </div>
            </section>
            <!-- /.content -->
         </aside>
         <!-- /.right-side -->
<?php elseif(isset($mode) && $mode =='view'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
<ol class="breadcrumb">
<li><a href="<?php echo base_url(admin); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="<?php echo base_url(admin."areas"); ?>"><i class="fa fa-dashboard"></i> Specification Details</a></li>
<li class="active"><?php echo $specification -> name?></li>
</ol>
<h1>
All Specification Details
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
<h3 class="box-title"><b> <i class="fa fa-edit" style="font-size:17px;"></i> All Content</b></h3>
<div class="box-tools pull-right">
  <?php $abuilder = array('id'=>'','name'=>'');?>
                  <script>var builder_0 = <?php echo json_encode($abuilder)?></script>
                  <a data="builder_0" role="button" class="btn btn-link btn-icon models_form tip" title="Add "><i class="fa fa-step-backward"></i></a>

</div>
</div>
<!-- /.box-header -->
<div class="box-body">
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
                                  <?php if(isset($specifications_values) && is_array($specifications_values) && count($specifications_values)): $i=1;?>
              <?php foreach ($specifications_values as $key => $specs) { ?>
                <tr>
                  <td> <?php echo $i++; ?> </td>
                  <td> <?php echo $specs -> name?> </td>
                  <!-- <td> <?php echo $specs -> other?> </td> -->
                  <td>
                  <div class="icons-group">
                    <a data-id='<?php echo $specs->id?>' role="button" class="btn btn-link btn-icon del tip" title="Delete" data-name="del"><i class="icon-close"></i></a> 
                    <!-- <a href="<?php echo site_url().admin?>specifications/view/<?php echo $spec->id?>" title="View" class="tip"><i class="icon-eye"></i></a>  -->
                  </td>
                </tr>
              <?php } ?>
            <?php endif; ?>
                              </tbody>
                           </table>
                        </div>


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
$(document).on('change', '#sname', function() {
   var siteurl = $("#siteurl_data").val();
   var url = siteurl+"specifications/duplicatenamecheck";
   $.ajax({
       type: "POST",
       url: url,
       data: $("#cat_form").serialize(), // serializes the form's elements.
       success: function(data) {
           if (data == '1') {
                alert("This name already exists");
               $('#sname').val('');
               return false;
           } 
       }
   });
   return false;
});
//------------------------    
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
      $('#sname').val(data.name);
      $('#orderby').val(data.orderby);
      $("#attribute_type").val(data.attribute_type);
      $("#data_type").val(data.data_type);
      $("#areatype").val(data.areatype);
      
      $("#mandatory").val(data.mandatory);
    return false;
  });
    $('#specification').addClass('active');
  });
</script>
