@extends('layouts.app')


@section('title', 'Contact Us')


@section('pageTitle', 'Contact Us')


@section('parentTitle', 'Home')

@section('content')

 <div class="container">
 
    
    
@foreach($data['post'] as $row)
   <h2 class="text-uppercase"> {{$row->post_title}}</h2>
   <p class="text-justify"> {{$row->post_content}} </p>
 
            <a href="#">Complete</a> | <a href="#">Edit</a> | <a href="#">Delete</a>
         
@endforeach 
</div>

<div class="contact-content sec-padding" style="padding-top:50px;">
        <div class="container">
            <div class="sec-title text-center">
                <p style="font-weight:bold; margin:0;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
            </div>
            <div class="google-map" id="contact-page-google-map" data-icon-path="" data-map-lat="41.85" data-map-lng=" -87.65" data-map-zoom="10" data-map-title="Envato HQ"></div>
            <div class="row">
                <div class="col-md-4">
                    <h2>Address</h2>
                    <ul class="contact-info">
                        <li>
                            <div class="icon-box">
                                <div class="inner">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                            </div>
                            <div class="content-box">
                                <h4>Address</h4>
                                <p>H 00, 11-22 Avenue, <br>
								example, country </p>
                            </div>
                        </li>
                        <li>
                            <div class="icon-box">
                                <div class="inner">
                                    <i class="fa fa-phone"></i>
                                </div>
                            </div>
                            <div class="content-box">
                                <h4>Phone</h4>
                                <p>00 1111 2222 <br>Mobile: 00 111 222 333 </p>
                            </div>
                        </li>
                        <li>
                            <div class="icon-box">
                                <div class="inner">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                            </div>
                            <div class="content-box">
                                <h4>Email</h4>
                                <p>info@example <br> donate@example</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8">
                    <h2>Contact Form</h2>
                    <form action="#" class="contact-form row" id="contact-page-contact-form">
                        <div class="col-md-6">
                            <input type="text" name="name" placeholder="Name">
                            <input type="text" name="email" placeholder="Email">
                            <input type="text" name="phone" placeholder="Phone">
                        </div>
                        <div class="col-md-6">
                            <textarea name="message" placeholder="Message" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-md-12">
                            <button class="thm-btn" type="submit">Send</button>
                        </div>
                    </form>
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

