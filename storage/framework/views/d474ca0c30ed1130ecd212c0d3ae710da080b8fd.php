 


<?php $__env->startSection('title', 'Gallery'); ?>


<?php $__env->startSection('pageTitle', 'Gallery'); ?>


<?php $__env->startSection('parentTitle', 'Home'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('user.gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\bloodd\resources\views/user/galleryPage.blade.php ENDPATH**/ ?>