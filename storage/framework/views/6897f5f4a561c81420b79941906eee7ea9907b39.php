
  <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('leftsidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  
   <?php echo $__env->yieldContent('content'); ?>
  
  
  
  
  <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php /**PATH C:\laragon\www\bloodd\resources\views/layouts/myapp.blade.php ENDPATH**/ ?>