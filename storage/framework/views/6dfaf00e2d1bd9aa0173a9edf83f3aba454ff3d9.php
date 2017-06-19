<!DOCTYPE html>
<html lang="en">


 <head>
    <meta charset="UTF-8">
    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo e(isset($page_title) ? $page_title : "Blood Donation | user"); ?></title>
    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo e(asset ("public/user/images/resources/favicon.png")); ?>" sizes="16x16">
    <!-- master stylesheet -->
    <link rel="stylesheet" href="<?php echo e(asset("public/user/css/style.css")); ?>">
    <link href="<?php echo e(asset ("public/user/css/orange.css")); ?>" rel="stylesheet" title="Orange color"> 
    <link rel="stylesheet" href="<?php echo e(asset("public/user/css/blue.css")); ?>" > 
    <link rel="stylesheet" href="<?php echo e(asset ("public/user/css/config.css")); ?>"> 
    <link href="<?php echo e(asset ("public/user/css/orange.css")); ?>" rel="alternate stylesheet" title="Orange color">      
    <link rel="stylesheet" href="<?php echo e(asset ("public/user/css/responsive.css")); ?>"> 
    <link rel="stylesheet" href="<?php echo e(asset ("public/user/css/bootstrap-margin-padding.css")); ?>">
</head>

<body>
<div class="se-pre-con"></div>
 <div class="top-bar hidden-xs ">
        <div class="container">
            <div class="social-icons pull-left">
                <ul>
                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
                </ul>
            </div>
            <!-- /.social-icons -->
            <div class="social-icons pull-right">
                <ul><li>
                        <form class="form-inline" action="" method="post">
                          <input type="text" class="form-control" name="username" placeholder="Email">  
                          <input type="password" class="form-control" name="password" placeholder="Password">
                          <input type="submit" class="form-control" name="submit" value="Login">
                        </form> 
                    </li>
                    <li><a href="<?php echo e(url('/project')); ?>">Support</a></li>
                    <li><a href=<?php echo e(url('/FAQ')); ?>>Faq</a></li>
                    <li><a href="<?php echo e(url('/project')); ?>">Help</a></li>
                    <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                </ul>
            </div>
            <!-- /.left-text -->
        </div>
    </div> 
    <!-- /.top-bar -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <a href="<?php echo e(url('/')); ?>">
                        <div class="logo">
                                <img src="<?php echo e(asset ("public/user/images/resources/logo.png")); ?>" alt="Awesome Image" />
                        </div>  
                    </a>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 hidden-xs ">
                    <div class="header-right-info pull-right sm-pull-none clearfix">
                        <div class="single-header-info pb-sm-20">
                            <div class="icon-box">
                                <div class="inner-box">
                                    <i class="flaticon-interface-2"></i>
                                </div>
                            </div>
                            <div class="content">
                                <h3>EMAIL</h3>
                                <p>info@example.com</p>
                            </div>
                        </div>
                        <div class="single-header-info">
                            <div class="icon-box">
                                <div class="inner-box">
                                    <i class="flaticon-telephone"></i>
                                </div>
                            </div>
                            <div class="content">
                                <h3>Call Now</h3>
                                <p><b> 00 1111 2222</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- /.header -->

    <nav class="mainmenu-area stricky">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="navigation">
                        <div class="nav-header pull-left">
                            <ul>
                                <li class="dropdown">
                                    <a href="<?php echo e(url('/')); ?>">Home</a>
                                </li>
                              <li class="dropdown">
                                    <a href="<?php echo e(url('/aboutus')); ?>">About Us</a>
                                    <ul class="submenu">
                                        <li><a href="<?php echo e(url('/who-we-are')); ?>">Who we are</a></li>
                                        <li><a href="<?php echo e(url('/vmv')); ?>">Vision, Mission, Values</a></li>
                                        <li><a href="#">Message from our CEO</a></li>
                                        <li><a href="#">Our Donation Policy</a></li>
                                        <li><a href="<?php echo e(url('/FAQ')); ?>">FAQ’s</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo e(url('/project')); ?>">Projects</a></li>
                                <li><a href="<?php echo e(url('/gallery')); ?>">Galleries</a></li>
                                <li><a href="<?php echo e(url('/donate')); ?>">Donate</a></li>
                                <li><a href="<?php echo e(url('/contact')); ?>">Contact</a></li>
                                <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="donate-col col-xs-12 col-sm-12 col-lg-3 col-md-3">
                    <div class="donate-btn clearfix">
                        <!-- Modal: donate now Starts -->
                        <a style="margin-right: 2px;" class="thm-btn pull-right" data-toggle="modal" href="#be_donor"><i class="fa fa-user-plus"></i></a>
                       

                        <div class="nav-footer pull-left">
                            <button class="pull-left"><i class="fa fa-bars"></i></button>
                            <a class="thm-btn"  data-toggle="modal" href="#user_login"><i class="fa fa-lock"></i></a> 

                        </div>
                        
                                                
                    </div>
                </div>
                
            </div>
        </div>
    </nav>
    <!-- /.mainmenu-area -->