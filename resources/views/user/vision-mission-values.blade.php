@extends('layouts.app')


@section('title', 'Vision-Mission-Values')


@section('pageTitle', 'Vision-Mission-Values')


@section('parentTitle', 'Home')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="full-sec-content">
                <h3 class="pb-10"> Donating Blood Saves Lives </h3>
                {{ foreach ($posts as $posts) {
    echo $posts->post_title;
}

                }} 

                <p style="font-weight:bold; text-align:justify;">
                    Consider the individuals in the hospital needing a blood transfusion. A gunshot or accident victim. Any person needing an ample supply of blood while in surgery. These people need us, and what they ask for is very little. Just imagine what a few pints of blood can do and how many lives it can save.
                </p>
            </div>
        </div>
    </div>
</div> 



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

