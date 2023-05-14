


<?php $__env->startSection('title', 'Speech of CEO'); ?>


<?php $__env->startSection('pageTitle', 'Speech of CEO'); ?>


<?php $__env->startSection('parentTitle', 'About Us'); ?>

<?php $__env->startSection('content'); ?>

<div class="speech-section">
	 <div class="container">
	 <?php $__currentLoopData = $data['speech']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	 
	 	<h2 class="title">Speech of CEO</h2>
	 	<div class="row">
	 		<div class="col-md-4">
	 		<img src="<?php echo e(asset('\public\user\images\user.png')); ?>" class="img img-responsive">
	 		<span><?php echo e($row->name); ?></span>

	 		</div>
	 		<div class="col-md-8">
	 			<p align="justify">
	 			Bismillahhir Rahmanir Rahim. <br>
	 			<?php echo e($row->description); ?>

	 			</p>

	 		</div>

	 	</div>

	 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	 </div>
</div>


 <div class="gryShadow">
 	<div class="container">
	 	<div class="row">
		 	<div class="col-md-3 subdiv">
		 		<h3 class="pageTitle text-center"><i class="fa fa-clock"></i></h3>
		 		<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequatLorem ipsum</p>
		 		<a class="pull-right btn btn-danger" href="#">Read More</a>
		 	</div>
		 	<div class="col-md-3 subdiv">
		 		<h3 class="pageTitle text-center">Advance 2</h3>
		 		<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequatLorem ipsum</p>
		 		<a class="pull-right  btn-danger btn " href="#">Read More</a>
		 	</div>
		 	<div class="col-md-3 subdiv">
		 		<h3 class="pageTitle  text-center">Advance 3</h3>
		 		<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequatLorem ipsum</p>
		 		<a class="pull-right  btn-danger btn " href="#">Read More</a>
		 	</div>
		 	<div class="col-md-3 subdiv">
		 		<h3 class="pageTitle  text-center">Advance 4</h3>
		 		<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequatLorem ipsum</p>
		 		<a class="pull-right  btn-danger btn " href="#">Read More</a>
		 	</div>
	 	</div>
	 </div>
    
</div>

 
	<!--Start call to action Area-->
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
	
<?php $__env->stopSection(); ?> 


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\bloodd\resources\views/user/speech.blade.php ENDPATH**/ ?>