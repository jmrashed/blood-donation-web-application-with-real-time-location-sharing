
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    
    </div>
    <strong>Copyright &copy; 2017 <a href="#">Blood Donation</a>.</strong> All rights
    reserved.
  </footer>
 
</div>
<!-- ./wrapper --> 
<!-- jQuery 2.2.3 -->
<script src="<?php echo e(asset('public/AdminLTE/plugins/ckeditor/ckeditor.js')); ?>"></script>
<script src="<?php echo e(asset('public/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js')); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo e(asset('public/AdminLTE/bootstrap/js/bootstrap.min.js')); ?>"></script>
 
<!-- DataTables -->
<script src="<?php echo e(asset('public/AdminLTE/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
 <script src="<?php echo e(asset('public/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js')); ?>"></script>
  
<!-- SlimScroll -->
 <script src="<?php echo e(asset('public/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js')); ?>"></script> 
 
<!-- FastClick -->
 <script src="<?php echo e(asset('public/AdminLTE/plugins/fastclick/fastclick.js')); ?>"></script>  
 
 
<!-- AdminLTE App -->
 <script src="<?php echo e(asset('public/AdminLTE/dist/js/app.min.js')); ?>"></script>   
 
 
<!-- AdminLTE for demo purposes -->
 <script src="<?php echo e(asset('public/AdminLTE/dist/js/demo.js')); ?>"></script>   
  
              
	
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

</body>
</html>
