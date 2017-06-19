<?php $__env->startSection('title', 'Our Policy'); ?>


<?php $__env->startSection('pageTitle', 'Our Policy'); ?>


<?php $__env->startSection('parentTitle', 'About Us'); ?>

<?php $__env->startSection('content'); ?>

 

 <div class=" ">
 	<div class="container">
	 	<div class="row">
<h2>Blood Donors</h2>
<table class="table table-bordered" id="example">
	<thead>
		<th>SL</th><th>Name</th><th>Email</th><th>Phone</th><th>Blood Group</th><th>Last Donate</th><th>Number of Donation</th><th>Action</th>
	</thead>
	<tbody>
	 	<?php $__currentLoopData = $data['donor']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

	 	<tr><td><?php echo e($row->id); ?></td><td><?php echo e($row->fullname); ?></td><td><?php echo e($row->email); ?></td><td><?php echo e($row->phone); ?></td><td><?php echo e($row->blood_group); ?></td><td><?php echo e($row->last_donate_date); ?></td><td><?php echo e($row->number_of_donate); ?></td><td><a href="#" class="btn btn-sm btn-info">Edit</a> <a href="#" class="btn btn-sm btn-danger">Delete</a> </td>
</tr>
	 	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


	</tbody>

</table>

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