@extends('layouts.myapp')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <?php
 //   if (isset($_GET['type'])) {
     //   if ($_GET['type'] == "add") {
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
                                        <!-- form start -->
                                        {!! Form::open(['route'=>'addAdmin.store', 'method'=>'post', 'files'=>'true','class' => 'form-horizontal']) !!}
                                        {!! csrf_field() !!}

                                        <div class="form-group">
                                            <label for="name" class="col-md-4 control-label">Name</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" required autofocus>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email"  required>


                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password" class="col-md-4 control-label">Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Register
                                                </button>
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                        <!-- form close -->
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
       // }
    //}if (isset($_GET['type'])) {
      //  if ($_GET['type'] == "view") {
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
                            <a class="btn btn-success pull-right" href="{{ url('/admin?type=add&value=yes') }}"><i class="fa fa-plus"></i> Add Admin</a>

                            <!-- /.box-header -->
                            <div class="box-body">

                                <table id="example1" class="table table-bordered table-hover">
                                    <thead></thead>
                                    <tbody>
                                        @foreach($data as $row)
                                        <tr>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>
                                                <a href="#">Complete</a> | <a href="#">Edit</a> | <a href="#">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
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
      //  }
  //  }
    ?>
</div>
<!-- /.content-wrapper -->
@endsection 