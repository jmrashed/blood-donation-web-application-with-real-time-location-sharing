@extends('user/layouts')

@section('title', $data['title'])

@section('content')
    @include('user/section')
    @include('user/events')


    @include('user.donation')


    @include('user.gallery')

    @include('user.clients')



    @include('user/footer')
@endsection
