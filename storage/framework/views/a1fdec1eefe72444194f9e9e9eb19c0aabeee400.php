<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header with-border">
                        <h3 class="box-title"> </h3>

                        <div class="box-tools pull-right">
                            <a href="<?php echo e(url('/search')); ?>" class="">      
                                <i class="fa fa-undo" aria-hidden="true"></i> back
                            </a>

                        </div>
                        <h3 class="box-title">User Details</h3>

                    </div> 
                    <div class="box-body">
                        <div class="row">
                            <?php $__currentLoopData = $data['donor_single']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <div>
                                    <img class="img img-responsive img-thumbnail" src="<?php echo e(asset('/public/images')); ?>/<?php echo e($row->profile_photo); ?>" />
                                </div>
                                <h3><?php echo e($row->fullname); ?></h3>
                                <h4><b>Blood Group: </b><?php echo e($row->blood_group); ?></h4>
                                <h4><b>Last Donate: </b><?php echo e($row->last_donate_date); ?></h4>
                                <h4><b>Any Disease: </b><?php echo e($row->is_physically_disble); ?></h4>
                                <h4><b>Email: </b><?php echo e($row->email); ?></h4>
                                <h4><b>Phone: </b><?php echo e($row->phone); ?></h4>
                                <h4><b>Location: </b><?php echo e($row->location); ?></h4>
                                <a class="btn btn-success form-control" href=""><i class="fa fa-comments" aria-hidden="true"></i> Send Message</a>
                                <a class="btn btn-info form-control" href=""><i class="fa fa-envelope" aria-hidden="true"></i> Send Email</a>
                                <a class="btn btn-success form-control" href=""><i class="fa fa-phone" aria-hidden="true"></i> Call</a>
                                <div style="margin-top: 15px; font-size: 35px">
                                    <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                                    <a href=""><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                                    <a href=""><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                                    <a href=""><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="col-md-8">

                                <table id=" " class="table table-bordered table-hover">
                                    <tr>
                                        <td><b>Member Status</b></td>                                   
                                        <td>
                                            <?php if ($row->status == 1)
                                                echo'Active';
                                            else
                                                echo 'Inactive';
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Member Rank</b></td>                                   
                                        <td><?php echo e($row->rank); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Smoker?</b></td>                                   
                                        <td><?php echo e($row->fullname); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Drud Adicted?</b></td>                                   
                                        <td><?php echo e($row->fullname); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Last Donate Date</b></td>                                   
                                        <td><?php echo e($row->last_donate_date); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Gender</b></td>                                   
                                        <td><?php echo e($row->gender); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Contact No.</b></td>                                   
                                        <td><?php echo e($row->phone); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Weight</b></td>                                   
                                        <td><?php echo e($row->weight); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Date of Birth</b></td>                                   
                                        <td><?php echo e($row->date_of_birth); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Living District</b></td>                                   
                                        <td><?php echo e($row->district); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Home District</b></td>                                   
                                        <td><?php echo e($row->district); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Home Country</b></td>                                   
                                        <td><?php echo e($row->fullname); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Web Site</b></td>                                   
                                        <td><?php echo e($row->web_url); ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Present Address</b></td>                                   
                                        <td><?php echo e($row->web_url); ?></td>
                                    </tr>
                                </table>

                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

                        </div>
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