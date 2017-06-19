@extends('layouts.myapp')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">New Gallery </h3>

                <div class="box-tools pull-right">
                    <a href="{{url('/admin/viewGallery')}}" class="">      
                        <i class="fa fa-undo" aria-hidden="true"></i> back
                    </a>

                </div>
            </div>

            <div class="box-body">
                <!-- form start -->
                <form class="form-horizontal" action="{{url('/admin/storeGallery')}}" method="post"> 
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Page Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="page_name" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Gallery Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="gallery_name" required autofocus>
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


@endsection 