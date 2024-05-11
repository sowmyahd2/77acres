<!-- ./wrapper -->
      <!-- add new calendar event modal -->
      <!-- jQuery 2.0.2 -->
<script type="text/javascript">
$(document).ready(function(){  
      $("form").validate();
});
</script>   
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
      <!-- Bootstrap -->
      <script src="<?php echo base_url(AJS); ?>/
bootstrap.min.js" type="text/javascript"></script>
      <!-- Morris.js charts -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
      <script src="<?php echo base_url(AJS); ?>/
plugins/morris/morris.min.js" type="text/javascript"></script>
      <!-- Sparkline -->
      <script src="<?php echo base_url(AJS); ?>/
plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
      <!-- jvectormap -->

</script>
<!--       <script src="<?php echo base_url(AJS); ?>/
plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script> -->
      <!-- fullCalendar -->
      <script src="<?php echo base_url(AJS); ?>/
plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
      <!-- jQuery Knob Chart -->
      <script src="<?php echo base_url(AJS); ?>/
plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
      <!-- daterangepicker -->
      <script src="<?php echo base_url(AJS); ?>/
plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
      <!-- Bootstrap WYSIHTML5 -->
      <script src="<?php echo base_url(AJS); ?>/
plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
      <!-- iCheck -->
      <script src="<?php echo base_url(AJS); ?>/
plugins/iCheck/icheck.min.js" type="text/javascript"></script>
      <!-- AdminLTE App -->
      <script src="<?php echo base_url(AJS); ?>/
AdminLTE/app.js" type="text/javascript"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script type="text/javascript" src="<?php echo base_url(AJS)?>/plugins/forms/validate.min.js"></script>
      <script src="<?php echo base_url(AJS); ?>/
AdminLTE/dashboard.js" type="text/javascript"></script>  
<script src="<?php echo base_url(AJS); ?>/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<input type="hidden" id="maxsizedisplay" value="<?php echo IMAGE_DISPLAY_SIZE; ?>">
<input type="hidden" id="maxsizefileupload" value="<?php echo IMAGE_SIZE; ?>">
<script src="<?php echo base_url(AJS); ?>/rbgroup.js" type="text/javascript"></script>
<script type="text/javascript">
      $(function() {
            $("#example1").dataTable();
            $('#example2').dataTable({
                  "bPaginate": true,
                  "bLengthChange": false,
                  "bFilter": false,
                  "bSort": true,
                  "bInfo": true,
                  "bAutoWidth": false
            });
      });
</script>
<script type="text/javascript">
$(function() {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor');
      //bootstrap WYSIHTML5 - text editor
      //$(".textarea").wysihtml5();
});
</script>      
   </body>
</html>