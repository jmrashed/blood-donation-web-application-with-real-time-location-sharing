
<?php echo $__env->make('user/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if( isset($data)): ?>
 <?php echo $__env->make('user/bannercontainer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user/featured', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php endif; ?>

<div class="container">
            <?php echo $__env->yieldContent('content'); ?>
</div>

<?php echo $__env->make('user/section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
<?php echo $__env->make('user/events', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   


<?php echo $__env->make('user.donation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->make('user.gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('user.clients', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


 
<?php echo $__env->make('user/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH C:\laragon\www\bloodd\resources\views/user/layouts.blade.php ENDPATH**/ ?>