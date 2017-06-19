<?php $__env->startSection('title', 'Page Title'); ?>
 
<?php $__env->startSection('content'); ?>
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('user/layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>