<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">

                    <div class="box-header with-border ">
                        <h3 class="box-title">Search </h3>


                    </div> 
                    <div class="box-body">
                        <form class="form-horizontal" action="<?php echo e(url('/search/donor')); ?>" method="post">
                            <?php echo csrf_field(); ?>



                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Country</label>

                                <div class="col-md-2">
                                    <select class="form-control" name="content_page" > 
                                        <option value="Home">Home</option>
                                        <option value="About">About</option>
                                        <option value="Donor">Donor</option>
                                        <option value="Contact">Contact</option>
                                    </select>
                                </div>

                                <label for="email" class="col-sm-2 control-label">Division</label>

                                <div class="col-md-2">
                                    <select class="form-control" name="content_page" > 
                                        <option value="Home">Home</option>
                                        <option value="About">About</option>
                                        <option value="Donor">Donor</option>
                                        <option value="Contact">Contact</option>
                                    </select>
                                </div> 


                                <label for="email" class="col-sm-2 control-label">District</label>

                                <div class="col-md-2">
                                    <select class="form-control" name="content_page" > 
                                        <option value="Home">Home</option>
                                        <option value="About">About</option>
                                        <option value="Donor">Donor</option>
                                        <option value="Contact">Contact</option>
                                    </select>
                                </div> 

                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Upazilla</label>

                                <div class="col-md-2">
                                    <select class="form-control" name="content_page" > 
                                        <option value="Home">Home</option>
                                        <option value="About">About</option>
                                        <option value="Donor">Donor</option>
                                        <option value="Contact">Contact</option>
                                    </select>
                                </div>

                                <label for="email" class="col-sm-2 control-label">Union/Post Off.</label>

                                <div class="col-md-2">
                                    <select class="form-control" name="content_page" > 
                                        <option value="Home">Home</option>
                                        <option value="About">About</option>
                                        <option value="Donor">Donor</option>
                                        <option value="Contact">Contact</option>
                                    </select>
                                </div> 
                                <label for="email" class="col-sm-2 control-label text-red">Select Blood group</label>

                                <div class="col-md-2">
                                    <select class="form-control" name="content_page" > 
                                        <option value="Home">A+</option>
                                        <option value="About">AB+</option>
                                        <option value="Donor">B+</option>
                                        <option value="Contact">AB-</option>
                                    </select>
                                </div> 



                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary  pull-right">
                                        Search
                                    </button>
                                </div>
                            </div> 

                        </form>
                    </div>
                </div>

            </div>
            <!-- /.box -->

        </div> 
        <!-- /.row -->
    </section>
    <!-- /.content --> 
    
    
    
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">

                    <div class="box-header with-border ">
                        <h3 class="box-title">Search </h3>


                    </div> 
                    <div class="box-body">  
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Blood Group</th>
                                    <th>Last Donation</th>
                                    <th>Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mr. Karim</td>
                                    <td>Mr. Karim</td>
                                    <td>Mr. Karim</td>
                                    <td>Mr. Karim</td>
                                </tr>
                                <tr>
                                    <td>Mr. Karim</td>
                                    <td>Mr. Karim</td>
                                    <td>Mr. Karim</td>
                                    <td>Mr. Karim</td>
                                </tr>
                                <tr>
                                    <td>Mr. Karim</td>
                                    <td>Mr. Karim</td>
                                    <td>Mr. Karim</td>
                                    <td>Mr. Karim</td>
                                </tr>
                                <tr>
                                    <td>Mr. Karim</td>
                                    <td>Mr. Karim</td>
                                    <td>Mr. Karim</td>
                                    <td>Mr. Karim</td>
                                </tr>
                                <tr>
                                    <td>Mr. Karim</td>
                                    <td>Mr. Karim</td>
                                    <td>Mr. Karim</td>
                                    <td>Mr. Karim</td>
                                </tr>
                        </tbody>
                        
                        </table>
                    </div>
                </div>

            </div>
            <!-- /.box -->

        </div> 
        <!-- /.row -->
    </section>
    <!-- /.content --> 
    
    
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.myapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>