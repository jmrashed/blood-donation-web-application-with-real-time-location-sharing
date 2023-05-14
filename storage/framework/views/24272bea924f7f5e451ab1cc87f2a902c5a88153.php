


<?php $__env->startSection('title', @$data['title']); ?>


<?php $__env->startSection('pageTitle', 'About Us'); ?>


<?php $__env->startSection('parentTitle', 'Home'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">



        <?php $__currentLoopData = $data['post']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h2 class="text-uppercase"> <?php echo e($row->post_title); ?></h2>
            <p class="text-justify"> <?php $b = html_entity_decode($row->post_content);
            echo $b; ?> </p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>


    <div class="sec-padding about-content full-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="full-sec-content">
                        <h3 class="pb-10">জেনে রাখা উচিত</h3>
                        <p style=" text-align:justify;">রক্ত কৃত্তিমভাবে তৈরী করা যায় না, শুধুমাত্র
                            একজন মানুষই পারে আরেকজন মানুষকে বাঁচাতে। কিন্তু
                            দুঃখের ব্যাপার, প্রতিবছর বহুসংখ্যক মানুষ মারা যাচ্ছে জরুরি মুহুর্তে প্রয়োজনীয় রক্তের অভাবে।
                            বর্তমানে বাংলাদেশে প্রতি বছর রক্তের প্রয়োজন মাত্র ৯ লাখ ব্যাগ। অথচ জনবহুল এই দেশে এখনো মানুষ
                            মারা যাচ্ছে রক্তের অভাবে। রক্তের এই চাহিদা খুব সহজেই পূরণ করা সম্ভব হবে যদি আমাদের দেশের সকল
                            প্রান্তের পূর্ণবয়স্ক মানুষদের রক্তদানের প্রয়োজনীয়তা এবং সুফলতা বুঝিয়ে সচেতন করা যায়। একজন
                            মুমূর্ষু রোগীকে তার প্রিয়জনের মাঝে সুস্থভাবে ফিরিয়ে আনা থেকে আনন্দের আর কিছু হতে পারে না।
                            জরুরি
                            রক্তের প্রয়োজনে মুমূর্ষু রোগীদের পাশে থাকুন। যারা রক্তদানে ইচ্ছুক, দয়া করে এই ওয়েবসাইটটিতে
                            রক্তদাতা হিসাবে রেজিস্ট্রেশন করুন। জরুরি রক্তের প্রয়োজনে রোগীরাই আপনাকে খুঁজে নিবে। হ্যাপি
                            ব্লাড
                            ডোনেটিং।</p>


                        <h3 class="pb-10"> রকত দানে জীবন বাচান </h3>


                        <p style="text-align:justify;">
                            রক্ত প্রয়োজন হাসপাতালে ব্যক্তি বিবেচনা করুন। গুলির বা দুর্ঘটনার শিকার।
                            কোন ব্যক্তি সার্জারি রক্ত যখন একজন প্রশস্ত সরবরাহ প্রয়োজন।
                            এই ব্যক্তিরা আমাদের প্রয়োজন, এবং তারা কি জন্য অনুরোধ খুব সামান্য নয়। শুধু কল্পনা রক্ত
                            কয়েক পাইট কি করতে পারেন এবং এটি কত জীবন বাঁচাতে পারি।
                        </p>
                        <h3 class="pb-10"> দান রক্তে কলেস্টেরলের মাত্রা আপনার নিজস্ব সচেতনতা বাড়ে </h3>

                        <p style=" text-align:justify;">
                            রক্ত দান যোগ বেনিফিট এক কলেস্টেরলের মাত্রা অ্যাক্সেস করতে সমস্যা আছে। তাই আপনি জামিন করতে
                            পারেন কি আপনার খাদ্য পরিবর্তন করতে হবে, অথবা আপনি শুধু সুস্থ মাত্রা বজায় রাখতে চাইতে পারেন
                            ফলাফল অনলাইনে আপনার কাছে সহজেই পাওয়া যায়।
                        </p>

                        <h3 class="pb-10"> The Health Benefits from Donating Blood </h3>

                        <p style=" text-align:justify;"> Donating blood has many health benefits. Not
                            only will you help someone in need of blood, but you will also help optimize your health and
                            wellness. Here are the top three health benefits from donating blood. </p>
                        <p style=" text-align:justify;"> contentBody4 </p>

                        <h3 class="pb-10">সতর্কতা</h3>
                        <p style=" text-align:justify;">রক্তদান হবে বিনামূল্যে এবং সেচ্ছায়, এক্ষেত্রে
                            আর্থিক লেনদেন করা হবে না। রক্তদাতারা রক্তদানের
                            পূর্বে রোগীকে দেখে নিবেন এবং সরাসরি রোগী এবং রোগীর আত্মীয়কে জানিয়ে দিবেন যে আপনি বিনামূল্যে
                            রক্তদান করছেন। এতে হাসপাতাল কর্তৃপক্ষ বা তৃতীয় কোনো পক্ষ দুর্নীতি করার সুযোগ পাবে না।</p>
                        <a href="contact.html" class="thm-btn inverse mt-15">Join Us</a>
                    </div>
                </div>
                <div class="col-md-6 hidden-md text-right">
                    <img src="<?php echo e(asset('public/user/images/resources/about-1.jpg')); ?>" alt="Serve Humanity Foundation" />
                    <br><br>
                    <img src="<?php echo e(asset('public/user/images/resources/about-2.jpg')); ?>" alt="Serve Humanity Foundation" />
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <!--Start call to action Area-->
    <div class="footer-call-to-action" style="background:#813d00;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center sm-text-center">
                    <a href="#" class="thm-btn inverse mt-sm-15">Lorem ipsum</a>
                </div>
                <div class="col-md-8 sm-text-center">
                    <h3>Lorem ipsum dolor sit amet</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="fact-counter-wrapper layer-overlay overlay-white-8 parallax-section bg-parallax"
        data-bg-img="images/bg/1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="charity-info">
                        <!--Start Single charity info-->
                        <div class="col-xs-12 col-sm-6 col-md-3 sm-text-left">
                            <div class="single-charity-info pb-sm-30">
                                <div class="fix charity-count alignleft">
                                    <h1 class="timer" data-from="1" data-to="350" data-speed="5000"
                                        data-refresh-interval="50">350</h1>
                                </div>
                                <div class="fix charity-text pl-20">
                                    <p>Total Awards</p>
                                </div>
                            </div>
                        </div>
                        <!--Start Single charity info-->
                        <div class="col-xs-12 col-sm-6 col-md-3 sm-text-left">
                            <div class="single-charity-info pb-sm-30">
                                <div class="fix charity-count alignleft">
                                    <h1 class="timer" data-from="10" data-to="3150" data-speed="5000"
                                        data-refresh-interval="50">3150</h1>
                                </div>
                                <div class="fix charity-text pl-20">
                                    <p>Total Volunteer</p>
                                </div>
                            </div>
                        </div>
                        <!--Start Single charity info-->
                        <div class="col-xs-12 col-sm-6 col-md-3 sm-text-left">
                            <div class="single-charity-info pb-sm-30">
                                <div class="fix charity-count alignleft">
                                    <h1 class="timer" data-from="10" data-to="1220" data-speed="5000"
                                        data-refresh-interval="50">1220</h1>
                                </div>
                                <div class="fix charity-text pl-20">
                                    <p>Total Projects</p>
                                </div>
                            </div>
                        </div>
                        <!--Start Single charity info-->
                        <div class="col-xs-12 col-sm-6 col-md-3 sm-text-left">
                            <div class="single-charity-info pb-sm-30">
                                <div class="fix charity-count alignleft">
                                    <h1 class="timer" data-from="10" data-to="65" data-speed="5000"
                                        data-refresh-interval="50">65</h1>
                                </div>
                                <div class="fix charity-text pl-20">
                                    <p>Running Projects</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\bloodd\resources\views/user/aboutus.blade.php ENDPATH**/ ?>