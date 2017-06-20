<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> </h3>

                <div class="box-tools pull-right">
                    <a href="<?php echo e(url('/blog/content')); ?>" class="">      
                        <i class="fa fa-undo" aria-hidden="true"></i> back
                    </a>

                </div>
            </div>
            <div class="box-body"> 
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">New Admin</h3>
                    </div>
                    <div class="box-body">
                        <!-- form start -->
                        <form action="<?php echo e(url('/blog/saveBlog')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>


                            <div class="form-group">
                                <label for="name" class="col-md-2 control-label">Category</label>

                                <div class="col-md-4">
                                    <select name="blog_category_id" class="form-control">
                                        <option value="">-- Select Category --</option>
                                        <?php $__currentLoopData = $data['category_list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <option value="<?php echo e($row->id); ?>"> <?php echo e($row->category_name); ?>  </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-2 control-label">Title</label>

                                <div class="col-md-4">
                                    <input id="name" type="text" class="form-control" name="title" required autofocus>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-2 control-label">Description</label>

                                <div class="col-md-4">
                                    <input id="name" type="text" class="form-control" name="description" required autofocus>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-2 control-label">Image</label>

                                <div class="col-md-4">
                                    <input id="name" type="file" class="form-control" name="image" required autofocus>

                                </div>
                            </div>
                            <div class="form-group pull-right">
                                <div class="col-md-12  t">
                                    <button type="submit" class="btn btn-primary">
                                        Add Blog
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- form close -->
                    </div> 
                </div>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.myapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>