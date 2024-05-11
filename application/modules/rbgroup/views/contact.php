<aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <h1>
                  Contact Us
               </h1>
               <ol class="breadcrumb">
                  <li><a href="<?php echo site_url().admin?>"><i class="fa fa-home"></i> Home</a></li>
                  <li class="active">Contact Us</li>
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
                              <h3 class="box-title pull-left"><i class="fa fa-list"></i> Contact Us</h3>
                           </div>
                           <div class="col-md-6">
                            <?php $acontact = array('id'=>'','image'=>'','name'=>'','email'=>'','gmail'=>'','address'=>'','facebook'=>'','twitter'=>'','youtube'=>'','skype'=>'');?>
          <script>var page_0 = <?php echo json_encode($acontact)?></script>
                              <h3 class="box-title pull-right" style="margin-right:15px"><a href="#" data-toggle="modal" data-target="#add-modal"><i data="page_0" class="fa fa-plus white model_form" aria-hidden="true"></i></a></h3>
                           </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
              <th>#</th>
              <th>Name</th>              
              <th>Email</th>
              <th>Address</th>                         
              <th>Actions</th>
            </tr> 
                              </thead>
                              <tbody>
                                 <tr>
                                    <?php if(isset($contact) && is_array($contact) && count($contact)): $i=1;?>
            <?php foreach ($contact as $key => $contacts) { ?>
              <tr id="row_<?php echo $contacts->id;?>">
                <td> <?php echo $i++; ?> </td>                
                <td> <?php echo $contacts->name;?> </td>                                       
                <td> <?php echo $contacts->emailid;?></td>                                            
                <td> <?php echo $contacts->address;?></td> 
                <td>
                <script>var contacts_<?php echo $contacts->id ?> = <?php echo json_encode($contacts);?></script>
                <div class="icons-group"> 
                  <a data="<?php echo 'contacts_'.$contacts->id ?>" 
                  role="button" class="btn btn-link btn-icon model_form tip" title="Edit"><i class="fa fa-edit"></i></a>
                  
                  <a href="<?php echo site_url().admin?>contact/delete/<?php echo $contacts -> id; ?>" title="Delete " class="tip" onclick="return confirm('Are you sure to delete')"><i class="fa fa-times"></i></a> 
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
      </div>
    <!-- Form modal -->
    <div id="form_modal" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header blue_bg">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title white"><i class="fa fa-pencil-square-o"></i> Contact details </h4>
          </div>
          <!-- Form inside modal -->
          <?php echo form_open_multipart(site_url().admin.'contact/add_edit', 'id="cat_form" class=".validate"');?>
            <div class="modal-body with-padding">   
            <div class="form-group">
                  <div class="row">
                  <div class="col-sm-12">
                    <label>Name:</label>
                     <input type="text" name="name" id="name" class="form-control required">
                  </div>
                </div>
              </div>  
              <div class="form-group">
                  <div class="row">
                  <div class="col-sm-12">
                    <label>Email :</label>
                     <input type="text" name="email" id="email" class="form-control required">
                  </div>
                </div>
              </div>        
             
               <div class="form-group">
                  <div class="row">
                  <div class="col-sm-12">
                    <label>Address:</label>
                    <textarea class="textarea" rows="10" cols="80" name="address" id="address" placeholder="Enter text ..." style="width: 100%;"></textarea>
                  </div>
                </div>
              </div> 
               <div class="form-group">
                  <div class="row">
                  <div class="col-sm-12">
                    <label>Phone :</label>
                     <input type="text" name="phone" id="phone" minlength="10" maxlength="12" class="form-control required" onkeypress="return isNumber(event)">
                  </div>
                </div>
              </div>
               
                     
            </div>           
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
              <span id="add">
                <input type="hidden" name="id" value="" id="id">                
                <input type="hidden" name="curl" value="<?php echo current_url()?>" id="id">                
                <button type="submit" class="btn btn-primary" id="add_city">Submit</button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /form modal -->
<script>
  $(document).ready(function(){   
   
    $(document).on('click','.model_form',function(){
      $('#form_modal').modal({
        keyboard: false,
        show:true,
        backdrop:'static'
      });
      $('label.error').hide();
      var data = eval($(this).attr('data'));
      $('#id').val(data.id);
      $('#name').val(data.name);
      $('#email').val(data.emailid);
      $('#address').val(data.address);
      $('#phone').val(data.mobile);  
      editor.setValue(data.address);   

    });
    $('#contactus').addClass('active');
    $('#contactus a').attr('id','second-level');
    $('#contactus li a').each(function() {
       if($(this).attr('href') == '<?php echo current_url();?>' )
        $(this).closest('li').addClass('active');
    });

   /* $(document).on('change','#owner_id',function(){
        drivers($('#owner_id').val());
    });  */   
  });
  function isNumber(evt) {
      evt = (evt) ? evt : window.event;
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
          return false;
      }
      return true;
  };
</script>