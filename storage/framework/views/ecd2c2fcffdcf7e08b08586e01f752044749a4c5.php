<?php echo $__env->make('user/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(isset($data)): ?>
    <?php echo $__env->make('user/bannercontainer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('user/featured', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php echo $__env->yieldContent('content'); ?>
 


<?php /**PATH C:\laragon\www\bloodd\resources\views/user/layouts.blade.php ENDPATH**/ ?>