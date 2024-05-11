<?php include_once("includes/header.php"); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<h1><?php echo lang('create_group_heading');?></h1>
<p><?php echo lang('create_group_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_group");?>

      <p>
            <?php echo lang('create_group_name_label', 'group_name');?> <br />
            <?php echo form_input($group_name);?>
      </p>

      <p>
            <?php echo lang('create_group_desc_label', 'description');?> <br />
            <?php echo form_input($description);?>
      </p>

      <p><?php echo form_submit('submit', lang('create_group_submit_btn'));?></p>

<?php echo form_close();?>
</section>
    <!-- /.content -->
  </div>
<?php include_once("includes/footer.php"); ?>
<script type="text/javascript">

 $('#master').addClass('active');
   $('#master a').attr('id','second-level');
   $('#master li a').each(function() {
      if($(this).attr('href') == '<?php echo current_url();?>' )
       $(this).closest('li').addClass('active');
   });
</script> 