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

                        <form action="{{url('/')}}/donor/search" method="post">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <div class="col-md-2">
                                    <select class="form-control divisions" name="division">
                                        <option value="0">Any Divisions</option>
                                        @foreach($data['division'] as $row)
                                        <option value="{{$row->id}}">{{$row->division_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="district" id="districts" class="districts form-control"> 
                                        <option value="0">Any district</option>
                                    </select>

                                </div>
                                <div class="col-md-2">
                                    <select name="upazila" id="upazillas" class="form-control"> 
                                        <option value="0">Any upazila</option>
                                    </select>

                                </div>
                                <div class="col-md-2">
                                    <select name="blood_group" class="form-control">
                                        <option value="0">Any Group</option>
                                        <option value="A+">A+</option>
                                        <option value="AB+">AB+</option>
                                        <option value="B+">B+</option>
                                        <option value="O+">O+</option>
                                        <option value="A-">A-</option>
                                        <option value="AB-">AB-</option>
                                        <option value="B-">B-</option>
                                        <option value="O-">O-</option> 
                                    </select>

                                </div>
                                <div class="col-md-4">
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
                                <?php if (isset($data['result'])) { ?>
                                    @foreach($data['result'] as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>                                   
                                        <td>{{$row->fullname}}</td>
                                        <td>{{$row->email}}</td>                                    
                                        <td>{{$row->phone}}</td>
                                        <td>{{$row->blood_group}}</td>
                                        <td>{{$row->last_donate_date}}</td>
                                        <td>{{$row->number_of_donate}}</td>
                                        <td>{{$row->location}}</td>
                                        <td>{{$row->is_physically_disble}}</td> 
                                        <td><a class="btn btn-sm btn-success" href="{{url('/')}}/donor/viewprofile/{{$row->id}}">view </a> </td>




                                    </tr>
                                    @endforeach 
                                <?php } ?>
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