@extends('layouts.app')


@section('title', 'Our Policy')


@section('pageTitle', 'Our Policy')


@section('parentTitle', 'About Us')

@section('content')

 

 <div class=" ">
 	<div class="container">
	 	<div class="row">
<h2>Blood Donors</h2>
<table class="table table-bordered" id="example">
	<thead>
		<th>SL</th><th>Name</th><th>Email</th><th>Phone</th><th>Blood Group</th><th>Last Donate</th><th>Number of Donation</th><th>Action</th>
	</thead>
	<tbody>
	 	@foreach($data['donor'] as $row) 

	 	<tr><td>{{$row->id}}</td><td>{{$row->fullname}}</td><td>{{$row->email}}</td><td>{{$row->phone}}</td><td>{{$row->blood_group}}</td><td>{{$row->last_donate_date}}</td><td>{{$row->number_of_donate}}</td><td><a href="#" class="btn btn-sm btn-info">Edit</a> <a href="#" class="btn btn-sm btn-danger">Delete</a> </td>
</tr>
	 	@endforeach


	</tbody>

</table>

	 	</div>
	 </div>
    
</div>

 
	<!--Start call to action Area-->
       <!--Start call to action Area-->
    <div class="footer-call-to-action">
        <div class="container">
            <div class="row">
                
				<div class="col-md-4 sm-text-center">
                    <h3>Sign up for Updates </h3>
                    <p>By subscribing to our mailing list you will always be updated. </p>
                </div>
				<div class="col-md-8 text-right sm-text-center">
                            <input type="text" name="name" placeholder="Full Name">
                            <input type="text" name="email" placeholder="Email Address">
					<a href="#" class="thm-btn inverse mt-sm-15">Subscribe Now</a>
                </div>
                
            </div>
        </div>
    </div>
	
@endsection 

