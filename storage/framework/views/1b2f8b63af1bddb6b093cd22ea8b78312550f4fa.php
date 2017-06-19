
<!--Start call to action Area-->
<div class="footer-call-to-action">
    <div class="container">
        <div class="row">

            <div class="col-md-4 sm-text-center">
                <h3>Sign up for Updates </h3>
                <p>By subscribing to our mailing list you will always be updated. </p>
            </div>
            <div class="col-md-8 text-right sm-text-center">
                <input type="text" name="name" placeholder="Full Name">
                <input type="text" name="email" placeholder="Email Address">
                <a href="#" class="thm-btn inverse mt-sm-15">Subscribe Now</a>
            </div>

        </div>
    </div>
</div>

   <!--Footer div-->
   <!--Footer div-->
    <footer class="footer sec-padding" style=" padding:55px 0;">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="footer-widget about-widget">
                        <a href="index-2.html">
                            <img src="<?php echo e(asset ("public/user/images/resources/footer-logo.png")); ?>" alt="Awesome Image" />
                        </a>
                        <ul class="contact">
                            <li><i class="fa fa-map-marker"></i> <span>00 Monroe Ave, Roseland, NJ, 07068 </span></li>
                            <li><i class="fa fa-phone"></i> <span>(973) 226-6181</span></li>
                            <li><i class="fa fa-phone"></i> <span>(973) 226-6181</span></li>
                            <li><i class="fa fa-envelope-o"></i> <span>info@example.com</span></li>
                        </ul>
                        <ul class="social">
                            <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6  col-md-2">
                    <div class="footer-widget quick-links">
                        <h3 class="title">Navigation</h3>
                        <ul>
                            <li><a href="index-2.html">Home Page</a></li>
                            <li><a href="who-we-are.html">About Us</a></li>
                            <li><a href="global-projects.html">Global Projects</a></li>
                            <li><a href="global-projects.html">Local Projects </a></li>
                            <li><a href="gallery.html">Gallery</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="events.html">News & Events</a></li>
                                   
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 latest-post col-md-3">
                    <div class="footer-widget latest-post">
                        <h3 class="title">Latest News</h3>
                        <ul>
                            <li>
                                <span class="border"></span>
                                <div class="content">
                                    <a href="events.html">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</a>
                                    <span>jan 1, 2017</span>
                                </div>
                            </li>
                            <li>
                                <span class="border"></span>
                                <div class="content">
                                    <a href="events.html">Sed ut perspiciatis unde omnis iste natus error sit voluptatem...</a>
                                    <span>jan 1, 2017</span>
                                </div>
                            </li>
                            <li>
                                <span class="border"></span>
                                <div class="content">
                                    <a href="events.html">Sed ut perspiciatis unde omnis iste natus error sit voluptatem ... </a>
                                    <span>jan 1, 2017</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="footer-widget contact-widget">
                        <h3 class="title">Contact Form</h3>
                        <form action="https://demo.servehuman.theme.spidertrixcons.net/submit.php" class="contact-form" id="footer-cf">
                            <input type="text" name="name" placeholder="Full Name">
                            <input type="text" name="email" placeholder="Email Address">
                            <textarea name="message" placeholder="Your Message"></textarea>
                            <button type="submit">Send</button>
                        </form>
                        <div id="result"></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="footer-bottom">
        <div class="container text-center">
            <p>মানুষের প্রতি ভালবাসা আছে বলেই আমরা আজও আছি । আসুন মানুষ কে ভালবাসি , মানুষের পাশে থাকি ।</p>
            <p>© 2017 Blood Donation - ALL RIGHTS RESERVED</p>
        </div>
    </div>
    <div class="modal fade" id="be_donor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog style-one" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Register as Donor</h4>
                </div>
                <div class="modal-body">
                    <div class="donation-form-outer">
                        <form action="#" method="post">
                            <!--Form Portlet-->
                            <div class="form-portlet">
                                <h3 class="text-thm">Name</h3>
                                <div class="row clearfix">
                                    <div class="form-group col-xs-12 clearfix">
                                        
                                    
                                        <div class="switch-field">
                                          <input type="radio" id="donateAmount10" name="donateAmount" checked>
                                          <label for="donateAmount10">$10</label>
                                          <input type="radio" id="donateAmount25" name="donateAmount">
                                          <label for="donateAmount25">$25</label>
                                                <input type="radio" id="donateAmount50" name="donateAmount">
                                          <label for="donateAmount50">$50</label>
                                                <input type="radio" id="donateAmount100" name="donateAmount">
                                          <label for="donateAmount100">$100</label>
                                          <input type="radio" id="donateAmount150" name="donateAmount">
                                          <label for="donateAmount150">$150</label>
                                          <input type="radio" id="donateAmount200" name="donateAmount">
                                          <label for="donateAmount200">$200</label>
                                          <div class="radio-select">
                                            OR
                                        </div>
                                        </div>     
                                       
                                    </div>

                                    <div class="form-group  col-xs-12 padd-top-20">
                                        <input type="text" placeholder="Other Amount" value="" name="other-amount">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!--Form Portlet-->
                            <div class="form-portlet">
                                <h3>Billing Information</h3>
                                <div class="row clearfix">
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <div class="field-label">Card Number <span class="required">*</span></div>
                                        <input type="text" required="" placeholder="Card Number" value="" name="name">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <div class="field-label">Security Code (CVC) <span class="required">*</span></div>
                                        <input type="text" required="" placeholder="Security Code" value="" name="name">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <div class="field-label">Name <span class="required">*</span></div>
                                        <input type="text" required="" placeholder="First Name" value="" name="name">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <div class="field-label">Email <span class="required">*</span></div>
                                        <input type="email" required="" placeholder="Email" value="" name="name">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <div class="field-label">Phone <span class="required">*</span></div>
                                        <input type="text" required="" placeholder="Phone" value="" name="name">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <div class="field-label">Address <span class="required">*</span></div>
                                        <input type="text" required="" placeholder="Address 1" value="" name="name">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <div class="field-label">City <span class="required">*</span></div>
                                        <select>
                                            <option>City</option>
                                            <option>City Name</option>
                                            <option>City Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <div class="field-label">Zip / Postal Code <span class="required">*</span></div>
                                        <input type="text" required="" placeholder="Zip Code" value="" name="name">
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <button class="thm-btn mt-30 mb-30" type="submit">Donate Now</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!--Form Portlet-->
                            <div class="form-portlet">
                                <h3>Online Payment Information</h3>
                                <div class="payment-option-logo"><img alt="" src="<?php echo e(asset ("public/user/images/resources/payment-logos.png")); ?>" class="img-responsive"></div>
                                <br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal: donate now Ends -->


    <div class="modal fade" id="user_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog style-one" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Login Form</h4>
                </div>
                <div class="modal-body">
                    <div class="donation-form-outer">
                        <form action="#" method="post">
                            
                            <!--Form Portlet-->
                            <div class="form-portlet">
                                <h3>Login Form</h3>
                                <div class="row clearfix">
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <div class="field-label">Email <span class="required">*</span></div>
                                        <input type="text" required="" placeholder="Email" value="" name="email">
                                    </div> 
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <div class="field-label">Password <span class="required">*</span></div>
                                        <input type="password" required="" placeholder="Password" value="" name="password">
                                    </div> 
                                    <hr>
                                    <div class="text-center">
                                        <button class="thm-btn mt-30 mb-30" type="submit">Login Now</button>
                                    </div>
                                </div>
                            </div>
                            <hr> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal: donate now Ends -->


    
    
    <!-- switch color -->
    <div class="config open">
        <div class="config-options">
            <h4>Colors</h4>
            <ul>
                <li><a style="background: #37aecc;color: #37aecc" class="changecolor blue-text" href="#" title="Blue color">---</a></li> 
                <li><a style="background: #FF7619;color: #FF7619" class="changecolor orange-text" href="#" title="Orange color">---</a></li> 
            </ul>
        </div>
        <a class="show-theme-options" href="#"><i class="fa fa-cog"></i></a>
    </div>

    
    <!--Scroll to top-->
    <div class="scroll-to-top"><span class="fa fa-arrow-up"></span></div>

    <!-- main jQuery -->
    <script src="<?php echo e(asset ("public/user/js/jquery-1.12.4.min.js")); ?>"></script>
    <!-- bootstrap -->
    <script src="<?php echo e(asset ("public/user/js/bootstrap.min.js")); ?>"></script>
    <!-- bx slider -->
    <script src="<?php echo e(asset ("public/user/js/jquery.bxslider.min.js")); ?>"></script>
    <!-- owl carousel -->
    <script src="<?php echo e(asset ("public/user/js/owl.carousel.min.js")); ?>"></script>
    <!-- validate -->
    <script src="<?php echo e(asset ("public/user/js/jquery-parallax.js")); ?>"></script>
    <!-- validate -->
    <script src="<?php echo e(asset ("public/user/js/validate.js")); ?>"></script>
    <!-- mixit up -->
    <script src="<?php echo e(asset ("public/user/js/jquery.mixitup.min.js")); ?>"></script>
    <!-- fancybox -->
    <script src="<?php echo e(asset ("public/user/js/jquery.fancybox.pack.js")); ?>"></script>
    <!-- easing -->
    <script src="<?php echo e(asset ("public/user/js/jquery.easing.min.js")); ?>"></script>
    <!-- circle progress -->
    <script src="<?php echo e(asset ("public/user/js/circle-progress.js")); ?>"></script>
    <!-- appear js -->
    <script src="<?php echo e(asset ("public/user/js/jquery.appear.js")); ?>"></script>
    <!-- count to -->
    <script src="<?php echo e(asset ("public/user/js/jquery.countTo.js")); ?>"></script>
    <!-- gmap helper -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzS7kYaXQy0aJGMMArSfa2dDYTyuOzYUc"></script>
    <!-- gmap main script -->
    <script src="<?php echo e(asset ("public/user/js/gmap.js")); ?>"></script>
    <!-- isotope script -->
    <script src="<?php echo e(asset ("public/user/js/isotope.pkgd.min.js")); ?>"></script>
    <!-- jQuery ui js -->
    <script src="<?php echo e(asset ("public/user/js/jquery-ui-1.11.4/jquery-ui.js")); ?>"></script>
    <!-- revolution scripts -->
    <script src="<?php echo e(asset ("public/user/revolution/js/jquery.themepunch.tools.min.js")); ?>"></script>
    <script src="<?php echo e(asset ("public/user/revolution/js/jquery.themepunch.revolution.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset ("public/user/revolution/js/extensions/revolution.extension.actions.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset ("public/user/revolution/js/extensions/revolution.extension.carousel.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset ("public/user/revolution/js/extensions/revolution.extension.kenburn.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset ("public/user/revolution/js/extensions/revolution.extension.layeranimation.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset ("public/user/revolution/js/extensions/revolution.extension.migration.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset ("public/user/revolution/js/extensions/revolution.extension.navigation.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset ("public/user/revolution/js/extensions/revolution.extension.parallax.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset ("public/user/revolution/js/extensions/revolution.extension.slideanims.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset ("public/user/revolution/js/extensions/revolution.extension.video.min.js")); ?>"></script>
    <!-- thm custom script -->
    <script src="<?php echo e(asset ("public/user/js/custom.js")); ?>"></script>

  
    <!-- For demo purposes – can be removed on production -->
    <script src="<?php echo e(asset ("public/user/switchstylesheet/switchstylesheet.js")); ?>"></script>
    
    <script>
        $(document).ready(function(){ 
            $(".changecolor").switchstylesheet( { seperator:"color"} );
            $('.show-theme-options').click(function(){
                $(this).parent().toggleClass('open');
                return false;
            });
        });

        $(window).bind("load", function() {
           $('.show-theme-options').delay(2000).trigger('click');
        });
    </script>
</body>


 </html>