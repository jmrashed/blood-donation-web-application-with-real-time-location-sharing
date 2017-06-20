<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header with-border">
                        <h3 class="box-title">Donor List</h3>
                        <div class="box-tools pull-right">
                            <a href="<?php echo e(url('/donor/create')); ?>" class="">      
                                <i class="fa fa-plus" aria-hidden="true"></i> Add Donor
                            </a>

                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">

                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Donor ID</th>
                                    <th>Donor Name</th>
                                    <th>Donor Gender</th>
                                    <th>Last Donate</th>
                                    <th>Phone</th>
                                    <th>District</th>
                                    <th>Upazila</th>
                                    <th>Location</th>
                                    <th>Blood Group</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data['donor']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($row->id); ?></td>
                                    <td><?php echo e($row->fullname); ?></td>
                                    <td><?php echo e($row->gender); ?></td> 
                                    <td><?php echo e($row->last_donate_date); ?></td> 
                                    <td><?php echo e($row->phone); ?></td> 
                                    <td><?php echo e($row->district); ?></td> 
                                    <td><?php echo e($row->upazila); ?></td> 
                                    <td><?php echo e($row->location); ?></td> 
                                    <td><?php echo e($row->blood_group); ?></td> 
                                    <td> 
                                        <a href="<?php echo e(url('/donor')); ?>/<?php echo e($row->id); ?>/edit" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-edit"></i> </a>
                                        <a href="<?php echo e(url('/donor')); ?>/<?php echo e($row->id); ?>/destroy" class="btn  btn-danger btn-xs"><i class="fa fa-fw fa-remove"></i></a>
                                        <a href="#" class="btn  btn-info btn-xs"><i class="fa fa-fw fa-print"></i></a>
                                        <a href="<?php echo e(url('/donor/')); ?>/<?php echo e($row->id); ?>" class="btn  btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i>
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
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.myapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>