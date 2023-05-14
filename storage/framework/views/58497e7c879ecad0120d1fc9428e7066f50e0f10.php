


<?php $__env->startSection('title', 'FAQ'); ?>


<?php $__env->startSection('pageTitle', 'FAQ'); ?>


<?php $__env->startSection('parentTitle', 'Home'); ?>

<?php $__env->startSection('content'); ?>
    <div class="overlay-white parallax-section" style="padding:20px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 promote-project text-center">
                    <h2 style="color:#813d00;">FAQ'S</h2>
                    <p>আপনার প্রেশ্নের উত্ত্র </p>
                </div>
            </div>
        </div>
    </div>

    <div class="sec-padding faq-home faq-page">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-push-1">
                    <div class="accrodion-grp faq-accrodion" data-grp-name="faq-accrodion">


                        <div class="accrodion active">
                            <div class="accrodion-title">
                                <h4>
									<span class="decor">
										<span class="inner"></span>
									</span>
                                    <span class="text">1. How organization work?</span>
                                </h4>
                            </div>
                            <div class="accrodion-content" style="display: block;">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>


                        <?php $__currentLoopData = $data['post']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="accrodion ">
                                <div class="accrodion-title">
                                    <h4>
									<span class="decor">
										<span class="inner"></span>
									</span>
                                        <span class="text"><?php echo e($row->id); ?>. <?php echo e($row->question); ?></span>
                                    </h4>
                                </div>
                                <div class="accrodion-content" style="display: none;">
                                    <p>
                                        <?php echo e($row->answer); ?>

                                    </p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>






<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\bloodd\resources\views/user/faq.blade.php ENDPATH**/ ?>