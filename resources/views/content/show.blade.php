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

                            <a href="{{url('/content')}}" class="">      
                                <i class="fa fa-undo" aria-hidden="true"></i> back
                            </a>

                        </div>
                        <h3 class="box-title">{{$data->name}}</h3>

                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Content Page</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->description}}</td>
                                    <td>{{$data->content_page}}</td>
                                    <td> 
                                        <a href="{{url('/content')}}/{{$data->id}}/edit" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-edit"></i> </a>
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