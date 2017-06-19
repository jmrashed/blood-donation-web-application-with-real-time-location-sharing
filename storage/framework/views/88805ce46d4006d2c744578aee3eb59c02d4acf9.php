 


<?php $__env->startSection('title', 'Gallery'); ?>


<?php $__env->startSection('pageTitle', 'Gallery'); ?>


<?php $__env->startSection('parentTitle', 'Home'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('user.gallery', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>