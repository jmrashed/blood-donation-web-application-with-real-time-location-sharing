@include('user.header')

@if( isset($data['is_home_page']) && $data['is_home_page'] )
 @include('user/bannercontainer')
    @include('user/featured') 
@endif
 
     @if( !isset($data['is_home_page']) ) 
        @include('user/page_general_section') 
    @endif 
     
@yield('content')
 

@include('user.events')   


@include('user.donation')




@include('user.clients')


 
@include('user.footer')

