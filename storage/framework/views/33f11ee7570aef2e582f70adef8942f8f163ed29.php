<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'ProSoft')); ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo e(asset('public/AdminLTE/bootstrap/css/bootstrap.min.css')); ?>"> 
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style --><!-- DataTables -->
        <link rel="stylesheet" href="<?php echo e(asset('public/AdminLTE/plugins/datatables/dataTables.bootstrap.css')); ?>">
        <!--  Admin Tempalte -->
        <link rel="stylesheet" href="<?php echo e(asset('public/AdminLTE/dist/css/AdminLTE.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/AdminLTE/dist/css/skins/_all-skins.min.css')); ?>"> 
        <script>
            window.Laravel = <?php echo json_encode([
                    'csrfToken' => csrf_token(),
            ]); ?>

            ;
        </script>
       
    </head>
    <body class="hold-transition login-page" data-gr-c-s-loaded="true">
         <!--div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(Auth::check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(url('/login')); ?>">Login</a>
                        <a href="<?php echo e(url('/register')); ?>">Register</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
 
        </div-->
        <?php echo $__env->make('auth.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!--div class="login-box">
            <div class="login-logo">
                <a href="index.php"><b>Pro</b>Soft</a>
            </div> 
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="index.php" method="post">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" pattern="[^ @]*@[^ @]*" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback" required="true"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback" name="password1" required="true"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Confirm Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback" name="password2" required="true"></span>
                    </div>

                    <div class="row">
                        <div class="col-xs-8">

                        </div> 
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div> 
                    </div>
               
 </form>
                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                        Facebook</a>
                    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                        Google+</a>
                    <a class="btn btn-block btn-social btn-linkedin">
                        <i class="fa fa-linkedin"></i> Sign in with LinkedIn
                    </a>
                </div> 

                <a href="#">I forgot my password</a><br>
                <a href="register.php" class="text-center">Register a new membership</a>

            </div> 
        </div-->
        <!-- /.login-box -->
  
 
</div>
<!-- ./wrapper --> 
<!-- jQuery 2.2.3 -->
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
   

</body>
</html>
