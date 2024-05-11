<style type="text/css">
  .thumb_hover{
    padding:11px 40px;
  }
.right-side > .content-header > .breadcrumb {
      float:left;
      left:10px;
      top:5px;
      font-size:20px;
  }
</style>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
   
      
      <?php  $da=explode('-',$grpid);?>
   
   <ol class="breadcrumb">
      <?php if($countl = count($catsl)){ $i=1; ?>
      <li><a href="<?=site_url().admin?>categories/"><?= ucfirst($da[0])?></a></li>
      <?php foreach($catsl as $key => $catl){ if($countl != $i){?>
        <li><a href="<?=site_url().admin?>/categories/detail/<?=$grpid."/".$catl['url_name']?>"><?=ucfirst($da[1])?></a></li>
    <?php } $i++; }} ?>
      <li class="active"><?=isset($category) ? $category->name: 'Category'; ?></li>
   </ol>
</section>



<!-- Success Message -->
 
 
<!-- Error Message -->
<section class="content">
               <div class="row">
                  <div class="col-xs-12">
                     <div class="box">
<!-- Page Content -->
  <?php //echo $category->leaf." ".$category->standard;
  $tabs = (isset($category) && $category->leaf && $category->standard)? TRUE : FALSE ; if($tabs){?>
    <div class="tabbable page-tabs">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tcategories" data-toggle="tab"><i class="icon-paragraph-justify2"></i> Category </a></li>
        <li><a href="#specifications" data-toggle="tab"><i class="icon-images"></i> specification </a></li>        
      </ul>
      <div class="tab-content">
        <!-- first tab -->
        <div class="tab-pane active fade in" id="tcategories">
          <?php } if(!isset($category) || $category->leaf){ ?>
        <!-- Categories List -->        
          <div class="panel panel-default">
            <!-- ####################################### Pannel Header ######################################## -->
            <div class="box-header">
               <div class="col-md-6 ">
                  <h3 class="box-title pull-left"><i class="fa fa-list"></i> <?=(isset($category))? $category->name: ''?> <?= $type ."  -"?> Category list</h3>
               </div>
               <div class="col-md-6">
               
                  <h3 class="box-title pull-right" style="margin-right:15px"><?php $abuilder = array('id'=>'','name'=>'');?>              
                <a data="builder_0" role="button" class="btn btn-link btn-icon model_form tip" title="Add category"><i class="fa fa-plus white"></i></a></h3>
               </div>
            </div>
            
            <!-- ####################################### /Pannel Header ######################################## -->
            <!-- ####################################### Pannel Body ######################################## -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>  <th>Category Name</th>             
                    <th>Status</th> <th>Action</th>
                  </tr>                    
                </thead>
                <tbody>
                <?php if(isset($categories) && is_array($categories) && count($categories)): $i=1;?>
                  <?php foreach ($categories as $key => $cat) { ?>
                    <tr id="row_<?php echo $cat->id;?>">
                      <td><?php echo $i++; ?></td>               
                      <td><?php if($cat->standard || !$cat->leaf) {?>
						  <a href="<?php echo site_url().admin.'categories/detail/'.$grpid."/".$cat->url_name;?>"><?php echo $cat->name;?></a>
						  <?php } else { echo $cat->name; }?>
					  </td>  
                      <td><i data="<?php echo $cat->id;?>" class="status_checkc btn icon-<?php echo ($cat -> status!=0)? 'checkmark btn-success' : 'close btn-danger'?>"></i> </td> 
                      <td>
                          <script>var cat_<?=$cat->id?> = <?=json_encode($cat);?></script>
                          <a data="<?='cat_'.$cat->id?>" role="button" class="btn btn-link btn-icon model_form tip" title="Edit"><i class="fa fa-edit"></i></a>                              
                      </td>
                    </tr>
                  <?php } ?>
                <?php endif; ?>
                </tbody>
              </table>
            </div>
            <!-- ####################################### /Pannel Body ######################################## -->
          </div>
          <?php } if($tabs) {?>
        </div>
        <!-- /first tab -->
        <!-- Second tab -->
        <div class="tab-pane fade" id="specifications">
          <?php } if(isset($category) && $category->standard) { ?>
          <div class="panel panel-default">
            <div class="box-header">
               <div class="col-md-6 ">
                  <h3 class="box-title pull-left"><i class="fa fa-list"></i> <?=$category->name?> Specification & Values</h3>
               </div>
                <?php if(count($specs) != count($specifications)) {?>
               <div class="col-md-6">
               
                  <h3 class="box-title pull-right" style="margin-right:15px">
                    <?php $abuilder = array('id'=>'','name'=>'');?>              
                  <a data="builder_0" role="button" class="btn btn-link btn-icon specific_form tip" title="Add specification"><i class="fa fa-plus white"></i></a>
                  </h3>
               </div>
               <?php }?>
            </div>
            
            <div class="panel-body">
              <?php if(!empty($specs)){ $i=0;
                foreach ($specs as $key => $spec) { echo ($i%2==0)? '<div class="row">':'';?>
                <div class="col-md-6">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h6 class="panel-title"><i class="icon-list"></i> <?=$spec['name']?></h6>
                      <div class="panel-icons-group"> <?php $spec_temp = array('id'=>'','name'=>'','spec_id'=>$key); $spec_temp = (object) $spec_temp; ?>
                          <script>var spec_<?=$key?> = <?=json_encode($spec_temp)?>;</script>                                                 
                        <a role="button" data="spec_<?=$key?>" class="btn btn-link btn-icon spce_value tip" title="Add <?=$spec['name']?>"><i class="fa fa-plus"></i></a>
                        <a data-sid="<?=$key?>" data-cid="<?=(isset($category))? $category->id : ''; ?>" role="button" class="btn btn-link btn-icon delete_specific tip" title="Delete specification"><i class="fa fa-times"></i></a>
                      </div>
                    </div>
                    <div class="panel-body">
                      <?php if(count($spec['values'])){ 
                              foreach ($spec['values'] as $vid => $val) { ?> 
                                <div class="thumbnail thumbnail-boxed col-sm-4">
                                  <div class="thumb">                   
                                   <div class="col-sm-12 thumb_hover"><?=$val?></div>
                                   <div class="thumb-options">
                                      <span>
                                        <?php $spec_temps = array('id'=>$vid,'name'=>$val,'spec_id'=>$key); $spec_temps = (object) $spec_temps; ?>
                                        <script>var specific_<?=$vid?> = <?php echo json_encode($spec_temps);?></script>
                                        <a href="#" data="specific_<?=$vid?>" title="Edit" class="btn btn-icon btn-success spce_value"><i class="fa fa-edit"></i></a> 
                                        <a href="#" data="<?php echo $vid ?>" title="Delete" class="btn btn-icon btn-success delete_speci"><i class="fa fa-times"></i></a> 
                                      </span>
                                   </div>
                                  </div>
                                </div>
                      <?php } }?>
                    </div>
                   
                  </div>
                </div>
              <?php $i++; echo ($i%2==0)? '</div> <div class="row"></br></div>':''; } } ?>
            </div>
          </div>
          <?php } if($tabs) { ?>
        </div>
        <!-- /second tab -->       
      </div>
    </div>
    <?php } ?>
    <!-- /tabs -->


<!-- Category form modal -->
  <div id="form_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> Category </h4>
        </div>
        <?php echo form_open_multipart(site_url().admin.'categories/add_edit', 'id="categorysubmitform"');?>
          <div class="modal-body with-padding">
            <div class="form-group">
              <div class="row">
                <div class="col-sm-6">
                <input type="hidden" name="property_type" value="<?= $property_type?>">
                <input type="hidden" name="grpid" value="<?= $grpid?>">
                <input type="hidden" name="ptype" value="<?= $ptype?>">
                
                  <label>Category Name: *</label>
                  <input type="text" id="categoryname" name="name" title="Please enter Category name" class="form-control required" value="" >
                  <span>Please Enter valid category name</span>
                </div>
                <div class="col-sm-6">
                  <label>Category Node: *</label>
                  <?php
                  $nodetype = array('1' => "Main Node" ,"2" => "Leaf Node");
                  $options =' id="nodetype" data-placeholder="Choose a Type..." class="form-control required" tabindex="2"';
                  echo form_dropdown('nodetype',$nodetype,"",$options);
                  ?>
                  <span>If the Category has a child node then select "Leaf Node" else if category don't have an child node then select  "Main Node"</span>
                </div>
                <!-- <div class="col-sm-6">
                  <label>Url name: *</label>
                  <input type="text" id="url_name" name="url_name" title="Please enter Category name" class="form-control required" value="">
                </div> -->
              </div>
            </div>
            
                                     
          </div>                        
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
              <input type="hidden" name="id" value="" id="id">
              <input type="hidden" name="curl" value="<?=current_url()?>">
              <input type="hidden" name="parent_id" value="<?=(isset($category))? $category->id : ''; ?>">
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- / Category form modal --> 

<!-- Specification form modal -->
  <div id="specification_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> <span>All</span> Specification </h4>
        </div>
        <!-- Form inside modal -->
        <?php echo form_open_multipart(site_url().admin.'categories/add_specifications', '');?>
          <div class="modal-body with-padding">             
            <div class="form-group">
              <div class="row">              
                 <?php if(isset($specifications) && is_array($specifications) && count($specifications)): $i=1;?>
                    <?php foreach ($specifications as $key => $specification) { if(!array_key_exists($key, $specs)) {?>
                      <div class="col-sm-6">
                        <div class="block-inner">
                          <label class="checkbox-inline checkbox-info">
                            <input name="speci[]" <?=(array_key_exists($key, $specs))? 'checked = "checked"' : '' ?> value="<?=$key?>"  type="checkbox" class="styled"> <?=$specification?>
                          </label>
                          <!-- <label class="checkbox-inline checkbox-info"><input  type="checkbox" class="styled"> Leaf category</label>   -->                
                        </div>
                      </div>
                    <?php } }?>
                  <?php endif; ?>          
              </div>
            </div>                          
          </div>                        
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
              <input type="hidden" name="id" value="" id="id">
              <input type="hidden" name="cat_id" value="<?=(isset($category))? $category->id:'';?>" id="cat_id">
			        <input type="hidden" name="curl" value="<?=current_url()?>#specifications">
              <button type="submit" class="btn btn-primary" >Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- /Specification form modal --> 
<!-- Add specification form modal -->
  <div id="spce_value_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><i class="icon-paragraph-justify2"></i>Add new specification value</h4>
        </div>
        <?php echo form_open_multipart(site_url().admin.'categories/specific_values', ' id="specification_add"');?>
          <div class="modal-body with-padding">
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label>Specification value: *</label>
                  <input type="text" id="s_name" name="name"  class="form-control required" value="">
                </div>                
              </div>
            </div>                                    
          </div>                        
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
              <input type="hidden" name="id" value="" id="s_id">
              <input type="hidden" id="spec_id" name="spec_id" value="">
              <input type="hidden" name="curl" value="<?=current_url()?>#specifications">
              <input type="hidden" name="cat_id" value="<?=(isset($category))? $category->id : ''; ?>">              
              <button type="submit" class="btn btn-primary" id="sub_speci">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- / Add specification form modal -->


</div>
                     <!-- /.box -->
  <div>
  <p>Note:</p>
  <p>Adding Listing Type Instruction</p>
  <ol>
    <li>If the Category has a child node then select "Leaf Node" else if category don't have an child node then select  "Main Node"</li>
    
  </ol>
</div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </aside>

<input type="hidden" id="siteurl_data" value="<?php echo site_url(admin); ?>">
<script>
  $(document).ready(function(){   
    $('form').validate(); 
    $('#categories').addClass('active');
    //-----------------------------
$(document).on('change', '#categoryname', function() {
   var siteurl = $("#siteurl_data").val();
  
   var url = siteurl+"categories/duplicategorynamecheck";
   $.ajax({
       type: "POST",
       url: url,
       data: $("#categorysubmitform").serialize(), // serializes the form's elements.
       success: function(data) {
           if (data == '1') {
                alert("This category name already exists");
               $('#categoryname').val('');
               return false;
           } 
       }
   });
   return false;
});
    //-----------------------------------------
    $(document).on('click','.model_form',function(){
      $('#form_modal').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      $('label.error').hide();
      var data = eval($(this).attr('data'));
      $('#categoryname').val(data.name);
      //$('#url_name').val(data.url_name);
      $('#id').val(data.id); 
      if(data.standard!='' && data.standard!='0'){
        $('#nodetype').val(1);
        //$('#standard').prop('checked',true);
      }
      if(data.leaf!='' && data.leaf!='0'){
        $('#nodetype').val(2);
        //$('#leaf').prop('checked',true);
      }
      //$('#type').val(data.type);
      $.uniform.update();
    });
    $(document).on('click','#sub_speci',function(){
      $('#specification_add').validate(); 
    });
    $(document).on('click','.specific_form',function(){
      $('#specification_modal').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      $('label.error').hide();
      var data = eval($(this).attr('data'));
      $('#name').val(data.name);
      $('#id').val(data.id);  
    }); 
    $(document).on('click','.spce_value',function(){
      $('#spce_value_modal').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      $('label.error').hide();
      var data = eval($(this).attr('data'));
      $('#s_name').val(data.name);
      $('#s_id').val(data.id);  
      $('#spec_id').val(data.spec_id);
      return false;  
    });       
    $(document).on('click','.status_checkc',function(){
      var status = ($(this).hasClass("btn-success")) ? '0' : '1';
      var msg = (status=='0')? 'Deactivate' : 'Activate';
      if(confirm("Are you sure to "+ msg)){
        var current_element = $(this);
        url = "<?php echo site_url().admin;?>/categories/status";
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
    $(document).on('click','.status_check',function(){
      if(confirm("Are you sure to delete data")){
        var current_element = $(this);
        url = "<?php echo site_url().admin?>/categories/delete";
        $.ajax({
        type:"POST",
        url: url,
        data: {ct_id:$(current_element).attr('data')},
        success: function(data)
          {
           location.reload();
          }
        });
      }
    });  
    $(document).on('click','.delete_speci',function(){
        if(confirm("Are you sure to delete this specifications value")){
          var current_element = $(this);
          url = "<?php echo site_url().admin?>categories/speci_delete";
          $.ajax({
          type:"POST",
          url: url,
          data: {spec_id:$(current_element).attr('data')},
          success: function(data)
            {  
              location.reload();            
              window.location.href = '<?=current_url()?>#specifications';
            }
          });
        }
        return false;
      });
    $(document).on('click','.delete_specific',function(){
        if(confirm("Are you sure to delete this specifications")){
          var current_element = $(this);
          url = "<?php echo site_url().admin?>categories/cspecifi_delete";
          $.ajax({
          type:"POST",
          url: url,
          data: {spec_id:$(current_element).attr('data-sid'),c_id:$(current_element).attr('data-cid')},
          success: function(data)
            {  
              location.reload();            
              window.location.href = '<?=current_url()?>#specifications';
            }
          });
        }
        return false;
      });
    });
</script>
<script type="text/javascript">   
  $(document).ready(function(){ 
    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
    } 
    $('.nav-tabs a').on('shown', function (e) {
        window.location.hash = e.target.hash;
    })
    $('#specifications').addClass('active');  

  });
  function alphaOnly(event) {
    if (event.charCode!=0) {
        var regex = new RegExp("^[a-zA-Z]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
};
</script>

