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
                    <a href="{{url('/donor')}}" class="">      
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
                        <form method="post" class="form-horizontal" action="{{url('/donor/update')}}" >
                            {!! csrf_field() !!}
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Full Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="fullname" value="{{$data->fullname}}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Email</label>
                                <div class="col-md-6">
                                    <input id="name" type="email" class="form-control" value="{{$data->email}}" name="email" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Gender</label>
                                <div class="col-md-6">
                                    
                                    <?php $ch= $data->gender;?>
                                    <input <?php if($ch=='male') {echo 'checked="checked"';} ?> id="name" type="radio" name="gender" value="male">Male &nbsp;&nbsp;&nbsp;
                                    <input <?php if($ch=='female') {echo 'checked="checked"';} ?> id="name" type="radio" name="gender" value="female">Female
                                    <input type="hidden" value="67890" name="donner_id">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Date of Birth</label>
                                <div class="col-md-2">
                                    <input id="name" type="date" class="form-control" value="{{$data->date_of_birth}}" name="date_of_birth" required autofocus>
                                </div> 
                                <label for="name" class="col-md-2 control-label">Last Donate</label>
                                <div class="col-md-2">
                                    <input id="name" type="date" class="form-control" value="{{$data->last_donate_date}}" name="last_donate_date" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Phone</label>
                                <div class="col-md-6">
                                    <input id="name" type="number" class="form-control" value="{{$data->phone}}" name="phone" required autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">District</label>
                                <div class="col-md-2">
                                    <select name="district" class="form-control">
                                        <option value="{{$data->district}}">{{$data->district}}</option>
                                        <option value="Rajshahi">Rajshahi</option>
                                        <option value="Khulna">Khulna</option>
                                    </select>
                                </div> 
                                <label for="email" class="col-md-2 control-label">Upazila</label>
                                <div class="col-md-2">
                                    <select name="upazila" class="form-control">
                                        <option value="{{$data->upazila}}">{{$data->upazila}}</option>
                                        <option value="Ramna">Ramna</option>
                                        <option value="Rampura">Rampura</option>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Location</label>

                                <div class="col-md-6">
                                    <input id="password" type="text" class="form-control" value="{{$data->location}}" name="location" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Blood Group</label>

                                <div class="col-md-2">
                                    <select name="blood_group" class="form-control">
                                        <option value="{{$data->blood_group}}">{{$data->blood_group}}</option>
                                        <option value="A+">A+</option>
                                        <option value="B+">B+</option>
                                        <option value="AB+">AB+</option>
                                        <option value="O+">O+</option>
                                        <option value="A-">A-</option>
                                        <option value="B-">B-</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O-">O-</option>
                                    </select>

                                </div> 
                                <label for="email" class="col-md-2 control-label">Profile Photo</label>

                                <div class="col-md-2">
                                    <input type="file" class="form-control" value="{{$data->profile_photo}}"  name="profile_photo" required/>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Web Url</label>

                                <div class="col-md-6">

                                    <input id="password" type="text" class="form-control" value="{{$data->web_url}}" name="web_url" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">FB Url</label>

                                <div class="col-md-6">
                                    <input id="password" type="text" class="form-control" value="{{$data->fb_url}}" name="fb_url" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Rank</label>

                                <div class="col-md-2">

                                    <input id="password" type="text" class="form-control" value="{{$data->rank}}" name="rank" required>
                                </div> 
                                <label for="email" class="col-md-2 control-label">Status</label>

                                <div class="col-md-2">
                                    <input type="text" class="form-control" value="{{$data->status}}"  name="status" required/>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Number of Donate</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" value="{{$data->number_of_donate}}"  name="number_of_donate" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Donor
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