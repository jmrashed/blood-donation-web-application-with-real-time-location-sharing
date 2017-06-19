<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="box box-body">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">New Content</h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo e(url('/content')); ?>" class="">      
                        <i class="fa fa-undo" aria-hidden="true"></i> back
                    </a>

                </div>
            </div>
            <div class="box-body">
                <!-- form start -->
                <!-- form method="post" action="<?php echo e(url('/content/store')); ?>" class="form-horizontal" -->
                    <?php echo Form::open(['route'=>'content.store', 'method'=>'post', 'files'=>'true','class' => 'form-horizontal']); ?>

                    <?php echo csrf_field(); ?>


                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Title</label>
                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control" name="title" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Description</label>
                        <div class="col-md-8">
                            <textarea id="ckeditor" name="description" class="form-control ckeditor"> </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Content Type</label>

                        <div class="col-md-8">
                            <select class="form-control" name="content_type" multiple="true"> 
                                <option value="Page">Page</option>
                                <option value="Post">Post</option>
                                <option value="Notice">Notice</option>
                                <option value="Events">Events</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Content Page</label>

                        <div class="col-md-8">
                            <select class="form-control" name="content_page" > 
                                <option value="Home">Home</option>
                                <option value="About">About</option>
                                <option value="Donor">Donor</option>
                                <option value="Contact">Contact</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">
                                Create
                            </button>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                    <!-- form close -->
            </div>  
        </div>  
    </div> 

</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.myapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>