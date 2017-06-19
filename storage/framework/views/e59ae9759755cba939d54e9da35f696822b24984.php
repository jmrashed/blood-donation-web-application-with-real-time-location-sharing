
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
<!-- /.content-wrapper -->
<script type="text/javascript">
    $(document).ready(function () {
        $(".divisions").change(function () {
            var classid = $(this).val();
           // alert(classid);
            $("#districts").html('');
            $.ajax({
                url: "<?php echo e(url('admin/donor/get_district')); ?>" + '/' + classid,
                type: "GET",
                dataType: "html",
                success: function (data) {
               //    alert(data);
                    $("#districts").append(data);
                }
            });
        });
    });
    
    
    $(document).ready(function () {
        $(".districts").change(function () {
            var classid = $(this).val();
           // alert(classid);
            $("#upazillas").html('');
            $.ajax({
                url: "<?php echo e(url('admin/donor/get_upazilla')); ?>" + '/' + classid,
                type: "GET",
                dataType: "html",
                success: function (data) {
                 // alert(data);
                    $("#upazillas").append(data);
                }
            });
        });
    });
    
</script>
</body>
</html>
