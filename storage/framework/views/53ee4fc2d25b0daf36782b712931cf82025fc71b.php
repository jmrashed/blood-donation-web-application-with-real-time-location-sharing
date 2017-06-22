<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header with-border">
                        <h3 class="box-title">Blood Request List</h3>
                        <div class="box-tools pull-right">
                            <a href="<?php echo e(url('bloodrequest/create')); ?>" class="">      
                                <i class="fa fa-plus" aria-hidden="true"></i> Add Blood Request
                            </a>

                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">

                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>User Name</th>
                                    <th>Requested Blood Group</th>
                                    <th>Patient Name</th>
                                    <th>Patient Phone</th>
                                    <th>Patient Place</th>
                                    <th>Number of Blood Bag</th>
                                    <th>Any Disease?</th>
                                    <th>Relation</th>
                                    <th>Operation Time</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data['request_list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($row->id); ?></td>
                                    <td><?php echo e($row->user_id); ?></td>
                                    <td><?php echo e($row->request_blood_group); ?></td>
                                    <td><?php echo e($row->patient_name); ?></td>
                                    <td><?php echo e($row->patient_phone); ?></td>
                                    <td><?php echo e($row->patient_place); ?></td>
                                    <td><?php echo e($row->number_blood_bag); ?></td>
                                    <td><?php echo e($row->disease); ?></td>
                                    <td><?php echo e($row->relation); ?></td>
                                    <td><?php echo e($row->opration_time); ?></td>
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