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
                    <a href="{{url('/blog/content')}}" class="">      
                        <i class="fa fa-undo" aria-hidden="true"></i> back
                    </a>

                </div>
            </div>
            <div class="box-body"> 
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">New Admin</h3>
                    </div>
                    <div class="box-body">
                        <!-- form start -->
                        <form action="{{url('/blog/saveBlog')}}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label for="name" class="col-md-2 control-label">Category</label>

                                <div class="col-md-4">
                                    <select name="blog_category_id" class="form-control">
                                        <option value="">-- Select Category --</option>
                                        @foreach($data['category_list'] as $row)

                                        <option value="{{$row->id}}"> {{$row->category_name}}  </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-2 control-label">Title</label>

                                <div class="col-md-4">
                                    <input id="name" type="text" class="form-control" name="title" required autofocus>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-2 control-label">Description</label>

                                <div class="col-md-4">
                                    <input id="name" type="text" class="form-control" name="description" required autofocus>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-2 control-label">Image</label>

                                <div class="col-md-4">
                                    <input id="name" type="file" class="form-control" name="image" required autofocus>

                                </div>
                            </div>
                            <div class="form-group pull-right">
                                <div class="col-md-12  t">
                                    <button type="submit" class="btn btn-primary">
                                        Add Blog
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- form close -->
                    </div> 
                </div>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
@endsection 