<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">New Donor </h3>

                <div class="box-tools pull-right">
                    <a href="<?php echo e(url('/donor')); ?>" class="">      
                        <i class="fa fa-undo" aria-hidden="true"></i> back
                    </a>

                </div>
            </div>

            <div class="box-body">
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo e(url('/donor/store')); ?>" method="post"> 
                    <?php echo csrf_field(); ?>


                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Full Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="fullname" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Email</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="email" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Password</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="password" required autofocus>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Gender</label>
                        <div class="col-md-6">
                            <input id="name" type="radio" name="gender" value="male" >Male &nbsp;&nbsp;&nbsp;
                            <input id="name" type="radio" name="gender" value="female" >Female
                            <input type="hidden" value="67890" name="donner_id">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Date of Birth</label>
                        <div class="col-md-2">
                            <input id="name" type="date" class="form-control" name="date_of_birth" required autofocus>
                        </div> 
                        <label for="name" class="col-md-2 control-label">Last Donate</label>
                        <div class="col-md-2">
                            <input id="name" type="date" class="form-control" name="last_donate_date" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Phone</label>
                        <div class="col-md-6">
                            <input id="name" type="number" class="form-control" name="phone" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">District</label>
                        <div class="col-md-2">
                            <select name="district" class="form-control">
                                <option value="dhaka">Dhaka</option>
                                <option value="dhaka">Dhaka</option>
                            </select>
                        </div> 
                        <label for="email" class="col-md-2 control-label">Upazila</label>

                        <div class="col-md-2">
                            <select name="upazila" class="form-control">
                                <option value="ramna">Ramna</option>
                                <option value="rampura">Rampura</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">Location</label>

                        <div class="col-md-6">
                            <input id="password" type="text" class="form-control" name="location" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Blood Group</label>

                        <div class="col-md-2">
                            <select name="blood_group" class="form-control">
                                <option value="a+">A+</option>
                                <option value="b+">B+</option>
                            </select>

                        </div> 
                        <label for="email" class="col-md-2 control-label">Profile Photo</label>

                        <div class="col-md-2">
                            <input type="file" class="form-control"  name="profile_photo" required/>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Web Url</label>

                        <div class="col-md-6">

                            <input id="password" type="text" class="form-control" name="web_url" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">FB Url</label>

                        <div class="col-md-6">
                            <input id="password" type="text" class="form-control" name="fb_url" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Rank</label>

                        <div class="col-md-2">

                            <input id="password" type="text" class="form-control" name="rank" required>
                        </div> 
                        <label for="email" class="col-md-2 control-label">Status</label>

                        <div class="col-md-2">
                            <input type="text" class="form-control"  name="status" required/>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Number of Donate</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control"  name="number_of_donate" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Add Donor
                            </button>
                        </div>
                    </div>
                </form>
                <!-- form close -->
            </div> 
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.myapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>