@include('front.plugins.social')
@if ( Auth::guest() )
    {{ HTML::link('login', 'Login') }}
@endif