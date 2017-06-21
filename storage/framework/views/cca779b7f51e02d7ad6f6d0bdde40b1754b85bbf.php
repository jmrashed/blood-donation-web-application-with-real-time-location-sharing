<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header with-border">
                        <h3 class="box-title"> </h3>

                        <div class="box-tools pull-right">
                        </div>
                        <h3 class="box-title">Search</h3>

                    </div>
                    <div class="box-body">

                        <form action="/admin/donor/search" method="post">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <div class="col-md-3">
                                    <select class="form-control divisions" name="division">
                                        <option value="0">Select Hospital</option>
                                        <?php $__currentLoopData = $data['hospital']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($row->id); ?>"><?php echo e($row->hospital_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control divisions" name="division">
                                        <option value="0">Select Specialist</option>
                                        <?php $__currentLoopData = $data['specility']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control divisions" name="division">
                                        <option value="0">Select Location</option>
                                        <?php $__currentLoopData = $data['location']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($row->id); ?>"><?php echo e($row->preasent_address); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                
                                
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary pull-right"> Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box">

                    <div class="box-header with-border">
                        <h3 class="box-title"> </h3>

                        <div class="box-tools pull-right">



                        </div>
                        <h3 class="box-title">Search Result</h3>

                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">

                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Blood Group</th>
                                    <th>Last Donate Date</th>
                                    <th>Number Of Donation</th>
                                    <th>Location</th>
                                    <th>Any Disease</th> 
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody> 
                                
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