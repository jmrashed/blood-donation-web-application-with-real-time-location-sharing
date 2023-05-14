<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo e(@$page_title or "Blood Donation"); ?></title>
    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo e(asset("public/user/images/resources/favicon.png")); ?>" sizes="16x16">
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
                    <li><a href="mailto:jmrashed@gmail.com"> <i class="fa fa-envelope-o"> jmrashed@gmail.com </i></a></li>
                    <li><a href="callto:8801711996655"> <i class="fa fa-phone-square"> +8801734446514 </i></a></li>
                </ul>
            </div>
            <!-- /.social-icons -->
            <div class="social-icons pull-right">
                <ul><li>
                        <form class="form-inline" action="<?php echo e(url('/user/login')); ?>" method="post">
                          <input type="text" class="form-control top-bar-input" name="username" placeholder="Email" autocomplete="off">  
                          <input type="password" class="form-control top-bar-input" name="password" placeholder="Password"  autocomplete="off">
                          <input type="submit" class="form-control top-bar-select" name="submit" value="Login">
                        </form> 
                    </li>
                    
                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
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
                                <img src="<?php echo e(asset ("public/images/logo.png")); ?>" alt="save-life-logo" />
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
                                <h3>ইমেইল </h3>
                                <p>jmrashed@gmail.com</p>
                            </div>
                        </div>
                        <div class="single-header-info">
                            <div class="icon-box">
                                <div class="inner-box">
                                    <i class="flaticon-telephone"></i>
                                </div>
                            </div>
                            <div class="content">
                                <h3>  কল করুন </h3>
                                <p><b> +8801734446514</b></p>
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
                                    <a href="<?php echo e(url('/')); ?>">হোম পেজ </a>
                                </li>
                              <li class="dropdown">
                                    <a href="<?php echo e(url('/aboutus')); ?>">আমাদের কথা </a>
                                    <ul class="submenu">
                                        <li><a href="<?php echo e(url('/WhoWeAre')); ?>">আমরা কারা </a></li>
                                        <li><a href="<?php echo e(url('/vmv')); ?>">ভিশন ও মিশন </a></li>
                                        <li><a href="<?php echo e(url('/speech-of-CEO')); ?>">প্রতিষ্ঠাতার বাণী </a></li>
                                        <li><a href="<?php echo e(url('/our-policy')); ?>">আমাদের পলিসি </a></li>
                                        <li><a href="<?php echo e(url('/FAQ')); ?>">জিজ্ঞাসা </a></li>
                                    </ul>
                                </li>  
                                <li><a href="<?php echo e(url('/gallery')); ?>">গ্যালারি </a></li>
                                <li><a href="<?php echo e(url('/donate')); ?>">রক্ত দান </a></li>
                                <li><a href="<?php echo e(url('/contact')); ?>">যোগাযোগ </a></li>
                                <li><a href="<?php echo e(url('/login')); ?>">লগিন </a></li>
                             
                                <li><a href="<?php echo e(url('/Blogs')); ?>">Blog </a></li>
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
    <!-- /.mainmenu-area --><?php /**PATH C:\laragon\www\bloodd\resources\views/user/header.blade.php ENDPATH**/ ?>