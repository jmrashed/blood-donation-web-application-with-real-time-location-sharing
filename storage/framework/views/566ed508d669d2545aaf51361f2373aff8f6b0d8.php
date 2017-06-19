<?php $__env->startSection('content'); ?>
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title text-center text-uppercase">Grading System</h3>
                <div class="pull-right">
                    <a class="btn btn-xs btn-success" href="<?php echo e(url('/gradingSystem?add=yes')); ?>"><i class="fa fa-plus"> </i> Add New</a>
                    <a class="btn btn-xs btn-success" href="<?php echo e(url('/gradingSystem')); ?>"><i class="fa fa-tasks"> </i> View</a>

                </div>
            </div>
            <!-- /.box-header -->  
            <!-- form start -->
            <div class="box-body">
                <?php if (isset($_GET['add'])) { ?>
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Designation</label>
                            <div class=" col-sm-10">
                                <select class="form-control">
                                    <option>Commissioner</option>
                                    <option>DC</option>
                                    <option>SP</option>
                                    <option>Assistant SP</option>
                                    <option>Employee</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Power Order</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword3" name="power-order" placeholder="1">
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-md-12 pull-right">
                                <a href="greadingSystem.php" class="btn btn-danger">Cancel</a>  
                                <input type="submit" class="btn btn-info  pull-right" name="submit" value="Save">
                            </div>
                        </div>
                    </form> 
                <?php } else { ?>
                    <!--p class="title text-primary">All Grading List</p-->
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Designation</th>
                                <th>Order</th> 
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>DC</td>
                                <td>3</td>  
                                <td> 
                                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-edit"></i> </a>
                                    <a href="#" class="btn  btn-danger btn-xs"><i class="fa fa-fw fa-remove"></i></a>
                                    <a href="#" class="btn  btn-info btn-xs"><i class="fa fa-fw fa-print"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Commisioner</td>
                                <td>1</td>  
                                <td> 
                                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-edit"></i> </a>
                                    <a href="#" class="btn  btn-danger btn-xs"><i class="fa fa-fw fa-remove"></i></a>
                                    <a href="#" class="btn  btn-info btn-xs"><i class="fa fa-fw fa-print"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>SP</td>
                                <td>2</td>  
                                <td> 
                                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-edit"></i> </a>
                                    <a href="#" class="btn  btn-danger btn-xs"><i class="fa fa-fw fa-remove"></i></a>
                                    <a href="#" class="btn  btn-info btn-xs"><i class="fa fa-fw fa-print"></i></a>
                                </td>
                            </tr>

                        </tbody> 
                    </table>
                <?php } ?>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            </div>
            <!-- /.box-footer -->


        </div>  


    </section>
    <!-- /.content --> 

</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.myapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>