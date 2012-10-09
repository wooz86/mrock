@layout('front.master')

@section('content')
		<div class="container">
			<div class="sixteen columns content-text">

				@if (Session::has('login_errors'))
			        <span class="error">Username or password incorrect.</span>
			    @endif

				<h1>Login</h1>
				{{ Form::open('login', 'POST') }}
				{{ Form::text('email', Input::old('email'), array('placeholder' => 'Email')) }}
				{{ Form::password('password', array('placeholder' => 'Password')) }}<br>
				{{ Form::submit('Login') }}<br>
				{{ Form::close() }}<br>
			</div>
		</div>

@endsection
