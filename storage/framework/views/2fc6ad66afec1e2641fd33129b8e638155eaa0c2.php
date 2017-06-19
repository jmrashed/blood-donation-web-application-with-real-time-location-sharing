<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <?php
    //   if (isset($_GET['type'])) {
    //   if ($_GET['type'] == "add") {
    ?>
    <!-- Main content -->

    <!-- /.content -->

    <?php
    // }
    //}if (isset($_GET['type'])) {
    //  if ($_GET['type'] == "view") {
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header with-border">
                        <h3 class="box-title"> </h3>

                        <div class="box-tools pull-right">

                            <a class="btn btn-success pull-right" href="<?php echo e(url('/admin/create')); ?>"><i class="fa fa-plus"></i> Add Admin</a>

                        </div>
                        <h3 class="box-title">Admin List</h3>

                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">

                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Admin ID</th>
                                    <th>Admin Name</th>
                                    <th>Admin Email</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($row->id); ?></td>
                                    <td><?php echo e($row->name); ?></td>
                                    <td><?php echo e($row->email); ?></td> 
                                    <td> 
                                        <a href="<?php echo e(url('/admin')); ?>/<?php echo e($row->id); ?>/edit" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-edit"></i> </a>
                                        <a href="<?php echo e(url('/admin')); ?>/<?php echo e($row->id); ?>/destroy" class="btn  btn-danger btn-xs"><i class="fa fa-fw fa-remove"></i></a>
                                        <a href="#" class="btn  btn-info btn-xs"><i class="fa fa-fw fa-print"></i></a>
                                        <a href="<?php echo e(url('/admin/')); ?>/<?php echo e($row->id); ?>" class="btn  btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </td>

                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <?php
    //  }
    //  }
    ?>
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.myapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>