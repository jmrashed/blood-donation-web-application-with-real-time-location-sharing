@extends('layouts.app')


@section('title', 'Speech of CEO')


@section('pageTitle', 'Speech of CEO')


@section('parentTitle', 'About Us')

@section('content')

<div class="speech-section">
	 <div class="container">
	 @foreach($data['speech'] as $row)
	 
	 	<h2 class="title">Speech of CEO</h2>
	 	<div class="row">
	 		<div class="col-md-4">
	 		<img src="{{asset('\public\user\images\user.png')}}" class="img img-responsive">
	 		<span>{{$row->name}}</span>

	 		</div>
	 		<div class="col-md-8">
	 			<p align="justify">
	 			Bismillahhir Rahmanir Rahim. <br>
	 			{{$row->description}}
	 			</p>

	 		</div>

	 	</div>

	 @endforeach
	 </div>
</div>


 <div class="gryShadow">
 	<div class="container">
	 	<div class="row">
		 	<div class="col-md-3 subdiv">
		 		<h3 class="pageTitle text-center"><i class="fa fa-clock"></i></h3>
		 		<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequatLorem ipsum</p>
		 		<a class="pull-right btn btn-danger" href="#">Read More</a>
		 	</div>
		 	<div class="col-md-3 subdiv">
		 		<h3 class="pageTitle text-center">Advance 2</h3>
		 		<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequatLorem ipsum</p>
		 		<a class="pull-right  btn-danger btn " href="#">Read More</a>
		 	</div>
		 	<div class="col-md-3 subdiv">
		 		<h3 class="pageTitle  text-center">Advance 3</h3>
		 		<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequatLorem ipsum</p>
		 		<a class="pull-right  btn-danger btn " href="#">Read More</a>
		 	</div>
		 	<div class="col-md-3 subdiv">
		 		<h3 class="pageTitle  text-center">Advance 4</h3>
		 		<p align="justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequatLorem ipsum</p>
		 		<a class="pull-right  btn-danger btn " href="#">Read More</a>
		 	</div>
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

