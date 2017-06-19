@extends('layouts.myapp')


@section('content')
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    
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
                        <h3 class="box-title">Send Message</h3>
                    </div>
                    
                    <div class="box-body">
                        
                                        <!-- form start -->
                                        <form class="form-horizontal">
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">Donor Name</label>

                                                    <div class="col-sm-10">
                                                        <select name="category" class="form-control">
                                                            <option value="Blood Donor">Blood Donor</option>
                                                            <option value="Blood Recever">Blood Receiver</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">Donor Name</label>

                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-2 control-label">Message</label>

                                                    <div class="col-sm-10">
                                                        <textarea class="form-control">
                                                        </textarea> 
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                            <div class="box-footer">
                                                <button type="submit" class="btn btn-success pull-right">Send</button>
                                            </div>
                                            <!-- /.box-footer -->
                                        </form>
 
                    </div>
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->

            
        
</div>
<!-- /.content-wrapper -->
@endsection 