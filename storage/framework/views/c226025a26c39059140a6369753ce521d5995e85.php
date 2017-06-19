<!DOCTYPE html>
<html>
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
        <link rel="stylesheet" href="<?php echo e(public_path('AdminLTE/plugins/datatables/dataTables.bootstrap.css')); ?>">
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
    <body class="hold-transition skin-blue fixed sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>P</b>S</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Pro</b>Soft</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <?php if(Auth::guest()): ?>
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                            <?php else: ?>
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo e(asset('public/AdminLTE/dist/img/user2-160x160.jpg')); ?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->

                                    <li class="user-header">
                                        <img src="<?php echo e(asset('public/AdminLTE/dist/img/user2-160x160.jpg')); ?>" class="img-circle" alt="User Image">

                                        <p>
                                            <?php echo e(Auth::user()->name); ?> - Assistant commissioner
                                            <small>Join since May 2016</small>
                                        </p>
                                    </li>

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-primary btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">

                                            <a class="btn btn-danger" href="<?php echo e(route('logout')); ?>"
                                               onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                <?php echo e(csrf_field()); ?>

                                            </form> 
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <?php endif; ?>
                        </ul>
                    </div>
                </nav>
            </header>

