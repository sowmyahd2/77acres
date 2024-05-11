<?php include_once("includes/header.php"); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<h1><?php echo lang('reset_password_heading');?></h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open('auth/reset_password/' . $code);?>

	<p>
		<label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
		<?php echo form_input($new_password);?>
	</p>

	<p>
		<?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
		<?php echo form_input($new_password_confirm);?>
	</p>

	<?php echo form_input($user_id);?>
	<?php echo form_hidden($csrf); ?>

	<p><?php echo form_submit('submit', lang('reset_password_submit_btn'));?></p>

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