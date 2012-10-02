@layout('front.master')

@section('content')
	<div role="main" class="main">

		<div class="sixteen columns content-text">
			<img src="img/band.jpg" />

			@if (Session::has('login_errors'))
		        <span class="error">Username or password incorrect.</span>
		    @endif

			<h1>Login</h1>
			{{ Form::open('login', 'POST') }}
			{{ Form::text('email', Input::old('email')) }}
			{{ Form::password('password') }}<br>
			{{ Form::submit('Login') }}<br>
			{{ Form::close() }}<br>
		</div>

	</div>
@endsection
