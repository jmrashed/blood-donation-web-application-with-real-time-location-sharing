<?php $__env->startSection('content'); ?>
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

        <?php
    if (isset($_GET['type'])) {
        if ($_GET['type'] == "donor") {
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
                        <h3 class="box-title">Donor List</h3>
                    </div>
                    <a class="btn btn-success pull-right" href="<?php echo e(url('/user?type=ranking&value=yes')); ?>">Donor Ranking</a>
                                
                                
                            
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Blood Group</th>
                                            <th>Last Donate</th>
                                            <th>Total Donate</th>
                                            <th>Donor Rank</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Nazmus Sakib</td>
                                            <td>Sakib@yahoo.com</td>
                                            <td>01738719951</td>
                                            <td>B+</td>
                                            <td>09/02/17</td>
                                            <td>1</td>
                                            <td>4</td>
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
    } if (isset($_GET['type'])) {
        if ($_GET['type'] == "ranking") {
            ?>

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
                        <h3 class="box-title">Donor Ranking</h3>
                    </div>
                    
                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div class="box box-info">
                                        <!-- /.box-header -->
                                        <!-- form start -->
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">Donor Name</label>

                                                    <div class="col-sm-10">
                                                        <select class="form-control">
                                                            <option value="sakib">Sakib</option>
                                                            <option value="sakib">Mahedi</option>
                                                            <option value="sakib">Mohin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">Blood Group</label>

                                                    <div class="col-sm-10">
                                                        <select class="form-control">
                                                            <option value="">--Select Blood Group--</option>
                                                            <option value="A+">A+</option>
                                                            <option value="B+">B+</option>
                                                            <option value="O+">O+</option>
                                                            <option value="AB+">AB+</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">Number of Donation</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" id="inputEmail3" placeholder="Number of Donation">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">Last Donate</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" name="" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">Rank</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" name="" class="form-control">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <!-- /.box-body -->
                                            <div class="box-footer">
                                                <button type="submit" class="btn btn-success pull-right">Set Rank</button>
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
            <?php
        }
    }
    ?>


</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.myapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>