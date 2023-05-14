
<!--Start call to action Area-->
<div class="footer-call-to-action">
  
    <div class="p-40">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p align="center" style="padding-bottom: 20px; font-size: 24px">Our recent donors </p> 

                    <div class="clients-carousel owl-carousel owl-theme">
                        <div class="item">
                        1
                        </div>
                        <div class="item">
                        2
                        </div>
                        <div class="item">
                        3
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!--Start Our Gallery Areas-->
    <div class="gallery-section full-width pb_2">
        <div class="container">
            <div class="sec-title text-center" style="margin-bottom:20px;">
                <span class="double-line"></span> &ensp;
                <h2>রক্ত দাতা </h2> &ensp; <span class="double-line"></span>
                <p align="justify">প্রতিটি জীবিত মানুষ জন্মগত সূত্রে শরীরে রক্ত নিয়ে জন্মায়। কিন্তু প্রতিটি মানুষের শরীরের ধরন সর্বার্থে এক হয় না। বিজ্ঞানীরা রক্তের উপাদানগত বৈশিষ্ট্যের বিচারে রক্তকে বিভিন্ন শ্রেণিতে ভাগ করেছেন। রক্তের এই শ্রেণিবিন্যাসকে ব্লাড গ্রুপ (Blood Group) বলা হয়। ১৯০১ খ্রিষ্টাব্দে জীববিজ্ঞানী কার্ল ল্যান্ডস্টেইনার প্রথম মানুষের রক্তের শ্রেণিবিন্যাস করেন। এই শ্রেণীবিন্যাসকে সংক্ষেপে ABO ব্লাড গ্রুপ বা সংক্ষেপে ব্লাড গ্রুপ বলা হয়।</p>
            </div>
            <!--Filter-->
            <div class="filters">
                <ul class="filter-tabs style-one clearfix anim-3-all">
                    <li class="filter" data-role="button" data-filter="all">সকল </li>
                    <li class="filter" data-role="button" data-filter=".child">ক্যাম্পাস </li>
                    <li class="filter" data-role="button" data-filter=".charity">হাসপাতাল </li>
                    <li class="filter" data-role="button" data-filter=".my_gallery">ব্লাড ক্যাম্প </li>
                    <li class="filter" data-role="button" data-filter=".home_gallery">স্বেচ্ছায় </li>
                </ul>
            </div>
        </div>
        
        <div class="images-container">
            <div class="filter-list clearfix">
                <!--Image Box >
                <?php $__currentLoopData = $data['gallery']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php //print_r($gallery->photo_name); ?>
                <div class="image-box mix mix_all charity sponsorship <?php echo e($gallery->gallery_name); ?>">
                    <div class="inner-box"> 
                        <figure class="image">
                            <a href="<?php echo e(url('/public/user/images/gallery')); ?>/<?php echo e($gallery->photo_name); ?>" class="lightbox-image"><img src="<?php echo e(url('/public/user/images/gallery')); ?>/<?php echo e($gallery->photo_name); ?>" alt=""></a>
                        </figure>
                        <a href="<?php echo e(url('/public/images/user/gallery')); ?>/<?php echo e($gallery->photo_name); ?>" class="lightbox-image btn-zoom" title="Image Title Here"><span class="icon fa fa-search"></span></a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <-->
                 <div class="image-box mix mix_all charity sponsorship <?php echo e($gallery->gallery_name); ?>">
                    <div class="inner-box"> 
                        <figure class="image">
                            <a href="<?php echo e(url('/public/user/images/gallery')); ?>/1.jpg" class="lightbox-image"><img src="<?php echo e(url('/public/user/images/gallery')); ?>/1.jpg" alt=""></a>
                        </figure>
                        <a href="<?php echo e(url('/public/user/images/gallery')); ?>/1.jpg" class="lightbox-image btn-zoom" title="Image Title Here"><span class="icon fa fa-search"></span></a>
                    </div>
                </div>
                 <div class="image-box mix mix_all charity sponsorship my_gallery">
                    <div class="inner-box"> 
                        <figure class="image">
                            <a href="<?php echo e(url('/public/user/images/gallery')); ?>/6.jpg" class="lightbox-image"><img src="<?php echo e(url('/public/user/images/gallery')); ?>/6.jpg" alt=""></a>
                        </figure>
                        <a href="<?php echo e(url('/public/user/images/gallery')); ?>/6.jpg" class="lightbox-image btn-zoom" title="Image Title Here"><span class="icon fa fa-search"></span></a>
                    </div>
                </div>
                 <div class="image-box mix mix_all charity sponsorship <?php echo e($gallery->gallery_name); ?>">
                    <div class="inner-box"> 
                        <figure class="image">
                            <a href="<?php echo e(url('/public/user/images/gallery')); ?>/7.jpg" class="lightbox-image"><img src="<?php echo e(url('/public/user/images/gallery')); ?>/7.jpg" alt=""></a>
                        </figure>
                        <a href="<?php echo e(url('/public/user/images/gallery')); ?>/7.jpg" class="lightbox-image btn-zoom" title="Image Title Here"><span class="icon fa fa-search"></span></a>
                    </div>
                </div>
                 <div class="image-box mix mix_all charity sponsorship my_gallery">
                    <div class="inner-box"> 
                        <figure class="image">
                            <a href="<?php echo e(url('/public/user/images/gallery')); ?>/5.jpg" class="lightbox-image"><img src="<?php echo e(url('/public/user/images/gallery')); ?>/5.jpg" alt=""></a>
                        </figure>
                        <a href="<?php echo e(url('/public/user/images/gallery')); ?>/5.jpg" class="lightbox-image btn-zoom" title="Image Title Here"><span class="icon fa fa-search"></span></a>
                    </div>
                </div>








                 <div class="image-box mix mix_all charity sponsorship home_gallery">
                    <div class="inner-box"> 
                        <figure class="image">
                            <a href="<?php echo e(url('/public/user/images/gallery')); ?>/1.jpg" class="lightbox-image"><img src="<?php echo e(url('/public/user/images/gallery')); ?>/1.jpg" alt=""></a>
                        </figure>
                        <a href="<?php echo e(url('/public/user/images/gallery')); ?>/1.jpg" class="lightbox-image btn-zoom" title="Image Title Here"><span class="icon fa fa-search"></span></a>
                    </div>
                </div>
                 <div class="image-box mix mix_all charity sponsorship home_gallery">
                    <div class="inner-box"> 
                        <figure class="image">
                            <a href="<?php echo e(url('/public/user/images/gallery')); ?>/2.jpg" class="lightbox-image"><img src="<?php echo e(url('/public/user/images/gallery')); ?>/2.jpg" alt=""></a>
                        </figure>
                        <a href="<?php echo e(url('/public/user/images/gallery')); ?>/2.jpg" class="lightbox-image btn-zoom" title="Image Title Here"><span class="icon fa fa-search"></span></a>
                    </div>
                </div>
                 <div class="image-box mix mix_all charity sponsorship home_gallery">
                    <div class="inner-box"> 
                        <figure class="image">
                            <a href="<?php echo e(url('/public/user/images/gallery')); ?>/3.jpg" class="lightbox-image"><img src="<?php echo e(url('/public/user/images/gallery')); ?>/3.jpg" alt=""></a>
                        </figure>
                        <a href="<?php echo e(url('/public/user/images/gallery')); ?>/3.jpg" class="lightbox-image btn-zoom" title="Image Title Here"><span class="icon fa fa-search"></span></a>
                    </div>
                </div>
                 <div class="image-box mix mix_all charity sponsorship home_gallery">
                    <div class="inner-box"> 
                        <figure class="image">
                            <a href="<?php echo e(url('/public/user/images/gallery')); ?>/4.jpg" class="lightbox-image"><img src="<?php echo e(url('/public/user/images/gallery')); ?>/4.jpg" alt=""></a>
                        </figure>
                        <a href="<?php echo e(url('/public/user/images/gallery')); ?>/4.jpg" class="lightbox-image btn-zoom" title="Image Title Here"><span class="icon fa fa-search"></span></a>
                    </div>
                </div>


            </div>
        </div>
    </div><?php /**PATH C:\laragon\www\bloodd\resources\views/user/gallery.blade.php ENDPATH**/ ?>