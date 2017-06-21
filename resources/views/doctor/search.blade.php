@extends('layouts.myapp')


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-header with-border">
                        <h3 class="box-title"> </h3>

                        <div class="box-tools pull-right">
                        </div>
                        <h3 class="box-title">Search</h3>

                    </div>
                    <div class="box-body">

                        <form action="{{url('/')}}/admin/doctor/search" method="post">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <div class="col-md-3">
                                    <select class="form-control divisions" name="division">
                                        <option value="0">Select Hospital</option>
                                        @foreach($data['hospital'] as $row)
                                        <option value="{{$row->id}}">{{$row->hospital_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control divisions" name="division">
                                        <option value="0">Select Specialist</option>
                                        @foreach($data['specility'] as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control divisions" name="division">
                                        <option value="0">Select Location</option>
                                        @foreach($data['location'] as $row)
                                        <option value="{{$row->id}}">{{$row->preasent_address}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary pull-right"> Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box">

                    <div class="box-header with-border">
                        <h3 class="box-title"> </h3>

                        <div class="box-tools pull-right">



                        </div>
                        <h3 class="box-title">Search Result</h3>

                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">

                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Blood Group</th>
                                    <th>Last Donate Date</th>
                                    <th>Number Of Donation</th>
                                    <th>Location</th>
                                    <th>Any Disease</th> 
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            
                            <tbody> 
                                <tr>
                                    <th>
                                        @if(isset($data['result']))
                                @foreach($data['result'] as $row)
                                    {{$row->name}}  
                                    @endforeach
                                    @endif
                                 </th>
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