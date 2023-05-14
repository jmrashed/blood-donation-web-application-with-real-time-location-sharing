@include('user/header')

@if (isset($data))
    @include('user/bannercontainer')
    @include('user/featured')
@endif

@yield('content')
 


