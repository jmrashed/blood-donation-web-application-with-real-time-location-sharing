
@include('user/header')

@if( isset($data))
 @include('user/bannercontainer')
    @include('user/featured') 
@endif

<div class="container">
            @yield('content')
</div>

@include('user/section')  
@include('user/events')   


@include('user.donation')


@include('user.gallery')

@include('user.clients')


 
@include('user/footer')

