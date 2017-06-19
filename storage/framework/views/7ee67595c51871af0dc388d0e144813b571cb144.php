<?php $__env->startSection('content'); ?>
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <?php
    if (isset($_GET['type'])) {
        if ($_GET['type'] == "add") {
            ?>
            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">

                                    <div class="box box-info">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">New Admin</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <!-- form start -->
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">Admin Name</label>

                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-2 control-label">Admin Email</label>

                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" id="inputPassword3" placeholder="Email">
                                                    </div>
                                                </div> 

                                                <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-2 control-label">Admin Password</label>

                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" id="inputPassword3" placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                            <div class="box-footer">
                                                <a class="btn btn-danger pull-left" href="<?php echo e(url('/basicInformation?type=view&value=yes')); ?>">Cancle</a>
                                                <button type="submit" class="btn btn-success pull-right">Add Admin</button>
                                            </div>
                                            <!-- /.box-footer -->
                                        </form>
                                    </div>
                                </div> <!-- /.tab-pane -->
                            </div>
                        </div>
 
                    </div>
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->

            <?php
        }
    }if (isset($_GET['type'])) {
        if ($_GET['type'] == "view") {
            ?>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            
                                <div class="box-header with-border">
                        <h3 class="box-title"> </h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                        <h3 class="box-title">Admin List</h3>
                                
                    </div>
                    <a class="btn btn-success pull-right" href="<?php echo e(url('/basicInformation?type=add&value=yes')); ?>"><i class="fa fa-plus"></i> Add Admin</a>
                                
                            
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
                                        <tr>
                                            <td>1</td>
                                            <td>Nazmus Sakib</td>
                                            <td>Sakib@yahoo.com</td>
                                            <td> 
                                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-edit"></i> </a>
                                                <a href="#" class="btn  btn-danger btn-xs"><i class="fa fa-fw fa-remove"></i></a>
                                                <a href="#" class="btn  btn-info btn-xs"><i class="fa fa-fw fa-print"></i></a>
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

            <?php
        }
    }
    ?>
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.myapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>