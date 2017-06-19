@extends('layouts.app')


@section('title', 'Our Policy')


@section('pageTitle', 'Our Policy')


@section('parentTitle', 'About Us')

@section('content')

 

 <div class="gryShadow">
 	<div class="container">
	 	<div class="row">

	 	@foreach($data['OurPolicy'] as $row) 

		 	<div class="col-md-12 subdiv">
		 		<h3 class="pageTitle text-center"><i class="fa fa-clock"></i> {{$row->title}}</h3>
		 		<p align="justify">{{$row->description}}</p>
		 		<a class="pull-right btn btn-danger" href="#">Read More</a>
		 	</div> 

	 	@endforeach
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

