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
                        <h3 class="box-title">Gallery List</h3>
                        <div class="box-tools pull-right">
                            <a href="{{url('/admin/addGallery')}}" class="">      
                                <i class="fa fa-plus" aria-hidden="true"></i> Add Gallery
                            </a>

                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">

                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> ID</th>
                                    <th>Page Name</th>
                                    <th>Gallery Name</th> 
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['gallery'] as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->page_name}}</td>
                                    <td>{{$row->gallery_name}}</td>  
                                    <td> 
                                        <a href="{{url('/donor')}}/{{$row->id}}/edit" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-edit"></i> </a>
                                        <a href="{{url('/donor')}}/{{$row->id}}/destroy" class="btn  btn-danger btn-xs"><i class="fa fa-fw fa-remove"></i></a>
                                        <a href="#" class="btn  btn-info btn-xs"><i class="fa fa-fw fa-print"></i></a>
                                        <a href="{{url('/donor/')}}/{{ $row->id }}" class="btn  btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </td>

                                </tr>

                                @endforeach
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