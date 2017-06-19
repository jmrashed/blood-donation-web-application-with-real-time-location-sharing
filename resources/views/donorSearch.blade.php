@extends('layouts.myapp')


@section('content')
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
@endsection 