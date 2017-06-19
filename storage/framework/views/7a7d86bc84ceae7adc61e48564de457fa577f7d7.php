<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Select Blood Group</label>

                  <div class="col-md-2">
                    <select name="blood_group" class="form-control">
                        <option value="A+">A+</option>
                        <option value="AB+">AB+</option>
                        <option value="B+">B+</option>
                        <option value="O+">O+</option>
                        <option value="A-">A-</option>
                        <option value="AB-">AB-</option>
                        <option value="B-">B-</option>
                        <option value="O-">O-</option> 
                    </select>
                  </div>
                </div>  
                  <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Division</label>
                        <div class="col-md-2">
                            <select name="division" class="divisions form-control">

                                <?php $__currentLoopData = $data['division']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($row->id); ?>"><?php echo e($row->division_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </select>
                        </div> 
                        <label for="email" class="col-md-2 control-label">District</label>

                        <div class="col-md-2">
                            <select name="district" id="districts" class="districts form-control"> 
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Upazilla</label>

                        <div class="col-md-2">
                            <select name="upazila" id="upazillas" class="form-control"> 
                            </select>

                        </div>

                        <label class="col-md-2 control-label">Post Code</label>
                        <div class="col-md-2">
                            <input type="number" class="form-control" name="post_code" placeholder="Post Code">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">Location</label>

                        <div class="col-md-6" style="height: 150px;">
                            <input name="location" id="pac-input" class=" form-control" type="text" placeholder="Search Box">
                            <div id="map" style="overflow: hidden;"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Blood Group</label>

                        <div class="col-md-2">
                           

                        </div> 
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Donor ID</th> 
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <tr>
                                    <td>1</td> 
                                    <td> 
                                        <a href="<?php echo e(url('/donor')); ?>/1/edit" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-edit"></i> </a>
                                        <a href="<?php echo e(url('/donor')); ?>/1/destroy" class="btn  btn-danger btn-xs"><i class="fa fa-fw fa-remove"></i></a>
                                        <a href="#" class="btn  btn-info btn-xs"><i class="fa fa-fw fa-print"></i></a>
                                        <a href="<?php echo e(url('/donor/')); ?>/1" class="btn  btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </td>

                                </tr>
 
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