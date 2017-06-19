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
                    <a href="<?php echo e(url('/admin')); ?>" class="">      
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
                        <form method="post" class="form-horizontal" action="<?php echo e(url('/admin/update')); ?>" >
                            <?php echo csrf_field(); ?>

                            <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" value="<?php echo e($data->name); ?>" class="form-control" name="name" required autofocus>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" value="<?php echo e($data->email); ?>" name="email"  required>


                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
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