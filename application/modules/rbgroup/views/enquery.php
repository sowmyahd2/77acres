<?php if(isset($mode) && $mode == 'all'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Enquery Lists
   </h1>
   <ol class="breadcrumb">
      <li><a href="<?php echo site_url().admin?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Enquery Lists</li>
   </ol>
</section>

            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-xs-12">
                     <div class="box">
                        <div class="box-header">
                           <div class="col-md-6 ">
                              <h3 class="box-title pull-left"><i class="fa fa-list"></i> Enquery Lists</h3>
                           </div>
                           <div class="col-md-6">
                           
                              <h3 class="box-title pull-right" style="margin-right:15px"><a href="<?php echo site_url()?>export/enquery" ><img src="<?php echo base_url(); ?>assets/img/excel.jpg" /></a></h3>
                           </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                           <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                 <tr>
              <th>#</th>
              <th>EnqType</th>
              <th>Name</th>              
              <th>Email Id</th>
              <th>Phone Number</th>
              <th>Message</th>
              <th>Location</th>                         
              <th>Actions</th>
            </tr> 
                              </thead>
                              <tbody>
                                 <tr>
                                    <?php if(isset($enquery) && is_array($enquery) && count($enquery)): $i=1;?>
            <?php foreach ($enquery as $key => $enquery) { ?>
                
              <tr id="row_<?php echo $enquery->id;?>">
                <td> <?php echo $i++; ?> </td>                
                <td> <?php echo $enquery->enqType;?> </td>                                       
                <td> <?php echo $enquery->fname." ".$enquery->lname;?></td>                                            
                <td> <?php echo $enquery->emailid;?></td>
                <td> <?php echo $enquery->phoneNumber;?></td>
                <td> <?php echo $enquery->message;?></td>
                <td> <?php echo $enquery->location;?></td> 
                <td>
                
                <div class="icons-group"> 
                  <a href="<?php echo site_url().admin.'enquery/view/'.$enquery->id ?>" title="View" class="tip btn  btn-link btn"><i class="fa fa-eye"></i></a>
                  
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
<?php elseif(isset($mode) && $mode == 'view'): ?>
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
<ol class="breadcrumb">
<li><a href="<?php echo base_url(admin); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="<?php echo base_url(admin."enquery"); ?>"><i class="fa fa-dashboard"></i> Enquery Lists</a></li>
<li class="active">View</li>
</ol>
<h1>
View Enquery Lists
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
<h3 class="box-title"><b> <i class="fa fa-edit" style="font-size:17px;"></i> View Content</b></h3>
<div class="box-tools pull-right">
<a href="<?php echo site_url().admin.'enquery';?>">  <button class="btn bg-navy btn-social" style="margin-top:5px;"><span><i class="fa fa-step-backward" aria-hidden="true"></i>  Back</span></button></a>
</div>
</div>
<!-- /.box-header -->
<div class="box-body">
<table class="table table-striped">
        <tbody>
            <tr>
            <tr><th>EnqType</th> <td><?php echo $enquery ->enqType;?> </td></tr>
            <tr><th>Name</th> <td> <?php echo $enquery->fname." ".$enquery->lname;?> </td></tr>
            <tr><th>Emailid</th> <td><?php echo $enquery ->emailid;?> </td></tr>
            <tr><th>Phone Number</th> <td><?php echo $enquery ->phoneNumber;?> </td></tr>
            <tr><th>Message</th> <td><?php echo $enquery ->message;?> </td></tr>
            <tr><th>Location</th> <td><?php echo $enquery ->location;?> </td></tr>
            <tr><th>Requested On</th> <td><?php echo $enquery ->createdOn;?> </td></tr>
         </tbody>
      </table>
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
   
    $('#enquerytab').addClass('active');
    $('#enquerytab a').attr('id','second-level');
    $('#enquerytab li a').each(function() {
       if($(this).attr('href') == '<?php echo current_url();?>' )
        $(this).closest('li').addClass('active');
    });

 
  });
</script>