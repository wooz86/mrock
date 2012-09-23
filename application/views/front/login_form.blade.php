@layout('front.master')

@section('content')
	<header>
		<h1>Laravel</h1>
		<h2>A Framework For Web Artisans</h2>
		<p class="intro-text" style="margin-top: 45px;"></p>
	</header>

	@if (Session::has('login_errors'))
        <span class="error">Username or password incorrect.</span>
    @endif

	<h1>Login</h1>
	{{ Form::open('login', 'POST') }}
	{{ Form::text('email', Input::old('email')) }}
	{{ Form::password('password') }}<br>
	{{ Form::submit('Login') }}<br>
	{{ Form::token() }}<br>
	{{ Form::close() }}<br>

@endsection
