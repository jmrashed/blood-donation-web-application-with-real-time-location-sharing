@extends('layouts.app')


@section('title', 'FAQ')


@section('pageTitle', 'FAQ')


@section('parentTitle', 'Home')

@section('content')
    <div class="overlay-white parallax-section" style="padding:20px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 promote-project text-center">
                    <h2 style="color:#813d00;">FAQ'S</h2>
                    <p>আপনার প্রেশ্নের উত্ত্র </p>
                </div>
            </div>
        </div>
    </div>

    <div class="sec-padding faq-home faq-page">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-push-1">
                    <div class="accrodion-grp faq-accrodion" data-grp-name="faq-accrodion">


                        <div class="accrodion active">
                            <div class="accrodion-title">
                                <h4>
									<span class="decor">
										<span class="inner"></span>
									</span>
                                    <span class="text">1. How organization work?</span>
                                </h4>
                            </div>
                            <div class="accrodion-content" style="display: block;">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>


                        @foreach($data['post'] as $row)
                            <div class="accrodion ">
                                <div class="accrodion-title">
                                    <h4>
									<span class="decor">
										<span class="inner"></span>
									</span>
                                        <span class="text">{{$row->id}}. {{$row->question}}</span>
                                    </h4>
                                </div>
                                <div class="accrodion-content" style="display: none;">
                                    <p>
                                        {{$row->answer}}
                                    </p>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection





