<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Add Photo into Gallery </h3>

                <div class="box-tools pull-right">
                    <a href="<?php echo e(url('/admin/viewGallery')); ?>" class="">      
                        <i class="fa fa-undo" aria-hidden="true"></i> back
                    </a>

                </div>
            </div>

            <div class="box-body">
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo e(url('/admin/storePhoto')); ?>" method="post" enctype="multipart/form-data"> 
                    <?php echo csrf_field(); ?>


                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Select Gallery</label>
                        <div class="col-md-6">
                            <select class="form-control" name="gallery_id">
                                <option value="">-- Select Gallery --</option>
                                <?php $__currentLoopData = $data['gallery']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <option value="<?php echo e($row->id); ?>"> <?php echo e($row->gallery_name); ?>  </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>                        
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Upload Photo</label>
                        <div class="col-md-6">
                            <input id="name" type="file" class="form-control" name="photo_name" multiple="true">
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <div class="col-md-12 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Add Photo
                            </button>
                        </div>
                    </div>
                </form>
                <!-- form close -->
            </div> 
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

</div>


<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.myapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>