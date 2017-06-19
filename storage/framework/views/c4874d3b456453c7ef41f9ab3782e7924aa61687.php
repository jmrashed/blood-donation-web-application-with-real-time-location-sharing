
  <?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('leftsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
  
   <?php echo $__env->yieldContent('content'); ?>
  
  
  
  
  <?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
