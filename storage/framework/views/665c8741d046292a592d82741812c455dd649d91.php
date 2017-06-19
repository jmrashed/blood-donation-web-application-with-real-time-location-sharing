<?php $__env->startSection('title', 'Our Policy'); ?>


<?php $__env->startSection('pageTitle', 'Our Policy'); ?>


<?php $__env->startSection('parentTitle', 'About Us'); ?>

<?php $__env->startSection('content'); ?>

 

 <div class="gryShadow">
 	<div class="container">
	 	<div class="row">

	 	<?php $__currentLoopData = $data['OurPolicy']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

		 	<div class="col-md-12 subdiv">
		 		<h3 class="pageTitle text-center"><i class="fa fa-clock"></i> <?php echo e($row->title); ?></h3>
		 		<p align="justify"><?php echo e($row->description); ?></p>
		 		<a class="pull-right btn btn-danger" href="#">Read More</a>
		 	</div> 

	 	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>